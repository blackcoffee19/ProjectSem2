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
        $orthers = Order::with('library.product')->paginate(50); //paginate(5)
        $products = Product::all();
        $status = Order::all();
        return view('admin.pages.Order.index', compact('orthers', 'products', 'status'));
    }

    public function findByNameO(Request $request)
    {
        $order_code = $request->order_code;
        $status = $request->status;
        $orthers = Order::where('order_code', 'like', '%' . $order_code . '%')
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })->get();
        $status = Order::all();
        return view('admin.pages.Order.index', compact('orthers', 'status'));
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
            ->join('library', 'cart.id_product', '=', 'library.id_product')
            ->select('cart.*', 'library.image')
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
