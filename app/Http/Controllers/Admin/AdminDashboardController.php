<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Expense;
use App\Models\User;
class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        $recent_orders = Order::orderBy('created_at','desc')->limit(5)->get();
        foreach($recent_orders as $order){
            $total =0;
            foreach($order->Cart as $cart){
                $total += $cart->sale >0 ? $cart->price*(1-$cart->sale /100)*($cart->amount/1000) : $cart->price*($cart->amount/1000);
            };
            $total = $order->code_coupon ? ($order->Coupon->discount <=100? $total*(1-$order->Coupon->discount/100): $total - $order->Coupon->discount): $total + 0;
            $total += $order->shipping_fee;
            $order->total = $total;
        }
        $year = isset($req['y'])? intval($req['y']): date('Y');
        $month  = isset($req['y']) &&  intval($req['y']) <date('Y') ? 12 :intval(date('m'));
        $income = array();
        $expense = array();
        for($i = 1; $i<=$month;$i++){
            $month_orders = Order::whereYear("created_at",$year)->whereMonth('updated_at','=',$i)->where('status','=','finished')->get();
            $total =0;
            $costs_m =0;
            $month_expense = Expense::whereYear("created_at",$year)->whereMonth('created_at', '=', $i)->get();
            foreach($month_expense as $exp){
                $costs_m += $exp->costs;
            };
            array_push($expense,$costs_m);
            foreach($month_orders as $order){
                foreach($order->Cart as $cart){
                    $total += $cart->sale >0 ? $cart->price*(1-$cart->sale /100)*($cart->amount/1000) : $cart->price*($cart->amount/1000);
                    
                };
                $total = $order->code_coupon ? ($order->Coupon->discount <=100? $total*(1-$order->Coupon->discount/100): $total - $order->Coupon->discount): $total + 0;
            }
            array_push($income,$total);
        }
        $order_y = count(Order::whereYear("created_at",$year)->get());
        $sale_pro = count(Product::where('sale','>',0)->get());

        $users = count(User::all());
        $customer = count(User::where('admin','!=','2')->get()) +count(Order::where('id_user','=',null)->get());
        $arr_order = [
            count(Order::where('status','=','finished')->get()),
            count(Order::where('status','=','cancel')->get()),
            count(Order::where('status','=','transaction failed')->get()),
            count(Order::where('status','=','unconfirmed')->orWhere('status','=','delivery')->get()),
        ];
        return view('admin.Dashboard',compact('recent_orders','income','expense','order_y','sale_pro','users','customer','year','arr_order'));
    }
}
