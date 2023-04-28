<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Cart;
use App\Models\Coupon;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class PayPalController extends Controller
{
      /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return view('user.pages.paypal.test');
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $req)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        if(Str::length($req['instruction'])>0){
            Session::put('instructions',$req['instruction']);
        };
        Session::put('shipfee',$req['shipfee']);
        if(Auth::check()){
            Session::put('select_add',intval($req['select_address']));
            $total = 0;
            foreach(Cart::where('id_user','=',Auth::user()->id_user)->where('order_code','=',null)->get() as $cart){
                $total += $cart->sale > 0 ? $cart->price*(1-$cart->sale/100)*($cart->amount/1000) :$cart->price *($cart->amount/1000); 
            }
            $total += intval($req['shipfee']);
            
            if(Str::length($req['coupon'])>0){
                $coupon = Coupon::where('code','=',$req['coupon'])->first();
                $total = $coupon->discount <=100 ? $total*(1-$coupon->discount/100) : $total-$coupon->discount;
            }
            $total*=0.000043;
            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('successTransaction'),
                    "cancel_url" => route('cancelTransaction'),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => round($total,2),
                        ]
                    ]
                ]
            ]);
        }else{
            Session::put('name',$req['name']);
            Session::put('phone',$req['phone']);
            Session::put('email',$req['email']);
            Session::put('province',$req['province']);
            Session::put('district',$req['district']);
            Session::put('address',$req['address']);
            Session::put('ward',$req['ward']);
            
            $value = 0;
            foreach(Session::get('cart') as $key=> $cart){
                $value += $cart['sale']>0?$cart['per_price']*(1-$cart['sale']/100)*($cart['amount']/1000):$cart['per_price']*($cart['amount']/1000);
            
            }
            $value+=intval($req['shipfee']);
            $value*=0.000043;
            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('successTransaction'),
                    "cancel_url" => route('cancelTransaction'),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => round($value,2)
                        ]
                    ]
                ]
            ]);
            // $response2 = $provider->createOrder([
            //     "intent" => "CAPTURE",
            //     "application_context" => [
            //         "return_url" => route('successTransaction'),
            //         "cancel_url" => route('cancelTransaction'),
            //     ],
            //     "purchase_units" => $purchase
            // ]);
            // dd($response1,$response2);
        }
        
        if (isset($response['id']) && $response['id'] != null) {

            foreach ($response['links'] as $links) {
                
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect('index')
                ->with('error', 'Something went wrong.');

        } else {
            dd($response);
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */


public function successTransaction(Request $request)
{
    $provider = new PayPalClient;
    $provider->setApiCredentials(config('paypal'));
    $provider->getAccessToken();
    $response = $provider->capturePaymentOrder($request['token']);
    // dd($response);
    if (isset($response['status']) && $response['status'] == 'COMPLETED') {
         Session::put('success_paypal', true);
        return redirect()
            ->route('checkout')
            ->with('paypal_success', 'Transaction complete.');
    } else {
        return redirect()
            ->route('checkout')
            ->with('paypal_error', $response['message'] ?? 'Something went wrong.');
    }
}

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('checkout')
            ->with('paypal_error', $response['message'] ?? 'You have canceled the transaction.');
    }
}
