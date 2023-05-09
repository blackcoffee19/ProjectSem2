<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class AdminCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); // này là cho 1 biến users tìm kiếm tát cả dữ liệu trong model Usẻ, model nó liên kết với bảng user á
        return view('admin.pages.Customers.index', compact('users')); // này nó trả về trang index và nó đẩy biến đó ra index
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
