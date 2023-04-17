<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeProduct;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Library;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{
    public function index()
    {
        // $prods = Product::all();
        // dd($prods);
        // $array = [
        //     'products' => $prods,
        // ];
        // return view('admin.pages.Products.index')->with($array);

        // $prods = Product::all();
        $prods = Product::paginate(10);

        return view('admin.pages.Products.index', compact('prods'));
    }

    public function create()
    {
        $types = TypeProduct::all();
        return view('admin.pages.Products.create', compact('types'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->id_type = $request->id_type;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->original_price = $request->original_price;
        $product->price = $request->price;
        $product->sale = $request->sale;
        $product->save();
        $productId = $product->id_product;

        if ($request->hasFile('photos')) {
            $images = $request->file('photos');
            $imageNames = [];
            foreach ($images as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('images/products'), $imageName);
                $imageNames[] = $imageName;
            }
            foreach ($imageNames as $imageName) {
                $library = new Library();
                $library->image = $imageName;
                $library->id_product = $productId;
                $library->save();
            }
        }
        return redirect()->route('adminProduct');
    }

    public function show(Product $id_product)
    {
        return view('admin.pages.Products.detail', compact('id_product'));
    }

    public function edit(Product $id_product)
    {
        $types = TypeProduct::all();
        return view('admin.pages.Products.update', compact('id_product', 'types'));
    }

    public function update(Request $request, $id_product)
    {
        $product = Product::findOrFail($id_product);
        $product->name = $request->name;
        $product->id_type = $request->id_type;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->original_price = $request->original_price;
        $product->price = $request->price;
        $product->sale = $request->sale;
        $product->save();
        $productId = $product->id_product;
        DB::table('library')->where('id_product', $id_product)->delete();
        if ($request->hasFile('photos')) {
            $images = $request->file('photos');
            $imageNames = [];
            foreach ($images as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('images/products'), $imageName);
                $imageNames[] = $imageName;
            }
            foreach ($imageNames as $imageName) {
                $library = new Library();
                $library->image = $imageName;
                $library->id_product = $productId;
                $library->save();
            }
        }
        return redirect()->route('adminProduct');
    }

    public function delete($id_product)
    {
        // Lấy tất cả các ảnh của sản phẩm trong bảng thư viện
        $images = Library::where('id_product', $id_product)->pluck('image');

        // Xoá tất cả các thông tin của sản phẩm trong bảng thư viện
        Library::where('id_product', $id_product)->delete();

        // Xoá thông tin của sản phẩm trong bảng sản phẩm
        $product = Product::findOrFail($id_product);
        $product->delete();

        // Xoá tất cả các ảnh trong thư mục images/products
        foreach ($images as $image) {
            $image_path = public_path('images/products/' . $image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        return redirect()->route('adminProduct');
    }
}
