<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $cats = TypeProduct::all(); //paginate(10)
        return view('admin.pages.Categories.index', compact('cats'));
    }

    // public function findByName(Request $request)
    // {
    //     $type = $request->type;
    //     $cats = TypeProduct::where('type', 'like', '%' . $type . '%')->get();
    //     return view('admin.pages.Categories.index', compact('cats'));
    // }
    public function findByName(Request $request)
    {
        $type = $request->type;
        $status = $request->status;
        $cats = TypeProduct::where('type', 'like', '%' . $type . '%')
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->get();
        return view('admin.pages.Categories.index', compact('cats'));
    }



    public function create()
    {
        
        return view('admin.pages.Categories.create');
    }

    public function store(Request $request)
    {
        $item = $request->all();
        $check = count(TypeProduct::where('type','=',$request['type'])->get());
        if($check >0){
            return redirect()->back()->with('error','Category exited');
        }
        if ($request->hasFile('photo')) { // kiểm tra xem có file hình tồn tại chưa
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png') {
                return redirect('admin/category');
            }
            $imageFile = $file->getClientOriginalName();
            $file->move("images/category", $imageFile);
        } else {
            $imageFile = null;
        }

        $item['image'] = $imageFile;
        TypeProduct::create($item);
        return redirect('admin/category');
    }

    public function show(TypeProduct $id_type)
    {
        return view('admin.pages.Categories.detail', compact('id_type'));
    }

    public function edit(TypeProduct $id_type)
    {
        return view('admin.pages.Categories.update', compact('id_type'));
    }

    public function update(Request $request, $id_type)
    {
        $cats = TypeProduct::findOrFail($id_type);
        $check = count(TypeProduct::where('type','=',$request['type'])->get());
        if($check >0){
            return redirect()->back()->with('error','Category exited');
        }
        $cats->type = $request->input('type');
        $cats->created_at = $request->input('created_at');
        $cats->status = $request->input('status');

        if ($request->hasFile('photo')) {
            // Xóa hình ảnh hiện tại của sản phẩm
            unlink(public_path('images/category/' . $cats->image));

            // Lưu tệp tin mới vào thư mục lưu trữ hình ảnh
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            $file->move('images/category', $filename);

            // Cập nhật tên tệp tin mới cho sản phẩm
            $cats->image = $filename;
        }

        $cats->save();

        return redirect()->route('adminCategories');
    }

    public function delete($id_type)
    {
        {
            $products = Product::where('id_type', $id_type)->get();
    
            if ($products->count() > 0) {
                // Trả về thông báo lỗi hoặc chuyển hướng người dùng trở lại trang trước đó.
                return redirect()->back()->with('error', 'Không thể xóa loại sản phẩm này vì có sản phẩm thuộc loại này.');
            }
    
            TypeProduct::find($id_type)->delete();
            return redirect()->route('adminCategories');
        }
    }
}
