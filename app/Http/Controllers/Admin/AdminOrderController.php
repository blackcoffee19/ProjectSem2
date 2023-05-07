<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Library;
use App\Models\Product;
use App\Models\Cart;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orthers = Order::with('library.product')->orderBy('created_at','desc')->paginate(10); //paginate(5)
        $products = Product::all();
        $status = Order::all();
        foreach($orthers as $order){
            $amount = 0;
            foreach($order->Cart as $cart){
                $amount += $cart->price*(1-$cart->sale/100)*($cart->amount/1000);
            }
            $amount = $order->code_coupon ?
            ($order->Coupon->discount <=100? $amount *(1-$order->Coupon->discount/100):$amount-$order->Coupon->discount) : $amount;
            $amount += $order->shipping_fee;
            $order->total = $amount;
        }
        return view('admin.pages.Order.index', compact('orthers', 'products', 'status'));
    }

    public function findByNameO(Request $request)
    {
        $search = $request->order_code;
        $status = $request->status;
        $orthers = Order::where('order_code', 'like', '%' . $search . '%')
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })->paginate(10);
        $status = Order::all();
        foreach($orthers as $order){
            $amount = 0;
            foreach($order->Cart as $cart){
                $amount += $cart->price*(1-$cart->sale/100)*($cart->amount/1000);
            }
            $order->total = $amount;
        }
        return view('admin.pages.Order.index', compact('orthers', 'status','search'));
    }

    public function list()
    {
    }

    public function single()
    {
        return view('admin.pages.Order.single');
    }

    public function show(Order $id_order)
    {
        $orderCode = $id_order->order_code;

        $id_order = Order::where('order_code', $orderCode)->first();

        $cartItems = Cart::where('order_code', $orderCode)
            ->get();

        return view('admin.pages.Order.single', compact('id_order', 'cartItems'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
