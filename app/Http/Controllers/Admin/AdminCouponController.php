<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class AdminCouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.pages.Coupon.index', compact('coupons'));
    }

    public function create()
    {
        return view('admin.pages.Coupon.create');
    }

    // public function store(Request $request)
    // {
    //     $item = $request->all();

    //     // Kiểm tra nếu mã phiếu giảm giá đã tồn tại
    //     $existingCoupon = Coupon::where('code', $request->input('code'))->first();
    //     if ($existingCoupon) {
    //         return back()->withErrors(['code' => 'Mã phiếu giảm giá đã tồn tại']);
    //     }

    //     Coupon::create($item);

    //     return redirect('admin/coupon')->with('success', 'Bạn đã thêm 1 phiếu giảm giá mới');
    // }
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'discount' => 'required|numeric|min:1',
            'max' => 'required|numeric|min:1|max:100',
        ], [
            'discount.min' => 'Discount phải lớn hơn 0 và không được âm',
            'max.min' => 'Max phải lớn hơn 0 và không được âm',
        ]);

        // Kiểm tra nếu mã phiếu giảm giá đã tồn tại
        $existingCoupon = Coupon::where('code', $request->input('code'))->first();
        if ($existingCoupon) {
            return back()->withErrors(['code' => 'Mã phiếu giảm giá đã tồn tại']);
        }

        Coupon::create($request->all());

        return redirect('admin/coupon')->with('success', 'Bạn đã thêm 1 phiếu giảm giá mới');
    }


    public function edit(Coupon $id_coupon)
    {
        return view('admin.pages.Coupon.update', compact('id_coupon'));
    }

    public function update(Request $request, $id_coupon)
    {
        $coupons = Coupon::findOrFail($id_coupon);

        // Validate input
        $request->validate([
            'discount' => 'required|numeric|min:1',
            'max' => 'required|numeric|min:1',
        ], [
            'discount.min' => 'Discount phải lớn hơn 0 và không được âm',
            'max.min' => 'Max phải lớn hơn 0 và không được âm',
        ]);

        $coupons->title = $request->input('title');
        $coupons->code = $request->input('code');
        $coupons->discount = $request->input('discount');
        $coupons->max = $request->input('max');
        $coupons->status = $request->input('status');
        $coupons->created_at = $request->input('created_at');

        $coupons->save();

        return redirect()->route('adminCoupon')->with('success', 'Cập nhật phiếu giảm giá thành công');
    }




    public function delete($id_coupon)
    {
        Coupon::find($id_coupon)->delete();
        return redirect()->route('adminCoupon')->with('success', 'Xoá phiếu giảm giá thành công');
    }
}
