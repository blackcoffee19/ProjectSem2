<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Library;
use Illuminate\Http\Request;
use App\Models\TypeProduct;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = TypeProduct::all();
        $prods = Product::with('libraries')->paginate(15);
        return view('user.index', compact('cats', 'prods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $id_product)
    {
        // Truy vấn dữ liệu các sản phẩm cùng loại
        // $related_products = Product::where('id_type', $id_product->typeproduct->id_type)
        //     ->where('id_product', '<>', $id_product->id_product)
        //     ->take(5) // chỉ hiện 5 sản phẩm
        //     ->get();

        // return view('user.pages.ProductDetails.index', compact('id_product', 'related_products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
