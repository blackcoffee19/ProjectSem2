<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeProduct;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = TypeProduct::all();
        return view('admin.pages.Categories.index', compact('cats'));
    }

    public function findByName(Request $request)
    {
        $type = $request->type;
        $cats = TypeProduct::where('type', 'like', '%' . $type . '%')->get();
        return view('admin.pages.Categories.index', compact('cats'));
    }

    public function create()
    {
        return view('admin.pages.Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item = $request->all();

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

    /**
     * Display the specified resource.
     */
    // public function show(Request $request, $id_type)
    // {
    //     $cats = TypeProduct::findOrFail($id_type);
    //     return view('admin.pages.Categories.detail', compact('cats'));
    // }
    public function show(TypeProduct $id_type)
    {
        return view('admin.pages.Categories.detail', compact('id_type'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeProduct $id_type)
    {
        return view('admin.pages.Categories.update', compact('id_type'));
    }

    public function update(Request $request, $id_type)
    {
        $cats = TypeProduct::findOrFail($id_type);
        $cats->type = $request->input('type');
        $cats->created_at = $request->input('created_at');
        $cats->status = $request->input('status');
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            $file->move('images/category', $filename);
            $cats->image = $filename;
        }
        $cats->save();
        return redirect()->route('adminCategories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id_type)
    {
        TypeProduct::find($id_type)->delete();
        return redirect()->route('adminCategories');
    }
}
