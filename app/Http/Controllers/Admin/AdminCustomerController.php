<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Coupon;
use Illuminate\Http\Request;


class AdminCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        foreach ($users as $user) {
            $user->sum = 0;
            $user_orders = Order::where('id_user', '=', $user->id_user)->where('status', '=', 'finished')->get();
            foreach ($user_orders as $order) {
                $order_total = 0;
                foreach ($order->Cart as $cart) {
                    $order_total += $cart->price * (1 - $cart->sale / 100) * ($cart->amount / 1000);
                }
                $coupon_discount = optional($order->Coupon)->discount ?? 0;
                $order_total = $coupon_discount <= 100 ? $order_total * (1 - $coupon_discount / 100) : $order_total - $coupon_discount;
                $order_total += $order->shipment_fee;
                $user->sum += $order_total;
            };
        };

        // Truyền biến $users và $order_total vào view
        return view('admin.pages.Customers.index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function findByName(Request $request)
    {
        $type = $request->type;
        $status = $request->status;
        $users = User::where('type', 'like', '%' . $type . '%')
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->get();
        return view('admin.pages.Customers.index', compact('users'));
    }

    public function create()
    {
        return view('admin.pages.Customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $users = new User();
        $users->name = $request->name;
        $users->phone = $request->phone;
        $users->avatar = $request->avatar;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->admin = $request->admin;
        // $users->spent = $request->spent;



        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $file->move('images/avatar', $filename);
            $users->avatar = $filename;
        }

        $users->save();

        return redirect()->route('adminCustomers');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $id_user)
    {
        return view('admin.pages.Customers.detail', compact('id_user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $id_user)
    {
        return view('admin.pages.Customers.update', compact('id_user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_user)
    {
        $users = User::findOrFail($id_user);
        $users->name = $request->input('name');
        $users->phone = $request->input('phone');
        $users->email = $request->input('email');
        $users->password = bcrypt($request->input('password'));
        $users->admin = $request->input('admin');
        // $users->spent = $request->spent;



        if ($request->hasFile('photo')) {

            // Lưu tệp tin mới vào thư mục lưu trữ hình ảnh
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            $file->move('images/avatar', $filename);

            // Cập nhật tên tệp tin mới cho sản phẩm
            $users->avatar = $filename;
        }

        $users->save();

        return redirect()->route('adminCustomers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id_user)
    {
        User::find($id_user)->delete();
        return redirect()->route('adminCustomers');
    }
}
