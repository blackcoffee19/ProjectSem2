<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\TypeProduct;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Library;
use App\Models\News;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminProductController extends Controller
{
    public function index()
    {
        $prods = Product::paginate(10);
        $types = TypeProduct::all();
        $pagination = true;
        return view('admin.pages.Products.index', compact('prods', 'types','pagination'));
    }

    public function findByNameP(Request $request)
    {
        $name = $request->name;
        $type_product = $request->type_product;
        $status_sl = $request->status_sl;
        $prods = Product::when($type_product, function ($query, $type_product) {
            return $query->where('id_type', '=',$type_product);})->when($name, function ($query, $name) {
                return $query->where('name','LIKE', '%'.$name.'%');})->when($status_sl, function($query,$status_sl) {
                    return $query->where('status',$status_sl);
                })->paginate(10);
             
        $types = TypeProduct::all();
        return view('admin.pages.Products.index', compact('prods', 'types','type_product','status_sl'));
    }

    public function create()
    {
        $types = TypeProduct::all();
        return view('admin.pages.Products.create', compact('types'));
    }
    public function check_name(Request $req){
        $product = Product::where('name','=',$req['name'])->first();
        $id = null;
        if($product){
            $id = $product->id_product;
            echo route('adminShowProduct',$id);
        }else{
            echo $id;
        }
    }
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->id_type = $request->id_type;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sale = $request->sale;
        $product->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $product->save();
        $productId = $product->id_product;
        $expense = new Expense();
        $expense->id_product = $productId;
        $expense->costs =  $request->original_price;
        $expense->quantity =$request->quantity;
        $expense->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $expense->save();
        $news_pro = new News();
        $news_pro->title = "New Product";
        $news_pro->link = "products-details";
        $news_pro->attr = $productId;
        $news_pro->created_at=Carbon::now()->format('Y-m-d H:i:s');
        $news_pro->save();
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
        $import_pro = 0;
        $product = Product::findOrFail($id_product);
        $import_pro = intval($request->quantity)- $product->quantity; 
        $product->name = $request->name;
        $product->id_type = $request->id_type;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sale = $request->sale;
        if(!isset($request->status)){
            $product->status = false;
            $carts = Cart::where('order_code','=',null)->where("id_product",'=',$id_product)->get();
            foreach($carts as $cart){
                $cart->delete();
            }
        }else{
            $product->status = true;
        }
        $product->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $product->save();
        if(isset($request->remove_image)){
            for($i =0;$i<count($product->Library);$i++ ){
                if(in_array($i,$request->remove_image)){
                    $product->Library[$i]->delete();
                }
            }
        }
        if($import_pro  >0){
            $new_expense = new Expense();
            $new_expense->id_product = $id_product;
            $new_expense->costs = $request->original_price;
            $new_expense->quantity = $import_pro;
            $new_expense->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $new_expense->save();
        }
        $productId = $product->id_product;
        if ($request->hasFile('photos')) {
            $images = $request->file('photos');
            foreach ($images as $key=> $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('images/products'), $imageName);
                if(count($product->Library) > $key ){
                    for($i =0; $i<count($product->Library);$i++){
                        if($i == $key){
                            $product->Library[$i]->image = $imageName;
                            $product->Library[$i]->save();
                        }
                    }
                }else{
                    $img = new Library();
                    $img->id_product = $productId;
                    $img->image = $imageName;
                    $img->save();
                }
            }
        }
        return redirect()->route('adminProduct');
    }

    public function delete($id_product)
    {
       

        if(count(Cart::where('order_code','<>',null)->where('id_product','=',$id_product)->get())==0){


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
        }else{
            return redirect()->back()->with('error', 'This product type cannot be deleted because it has already been ordered.');
        }

        return redirect()->route('adminProduct');
    }
}