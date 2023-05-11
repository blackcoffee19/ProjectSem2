<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Library;
use App\Models\TypeProduct;
use App\Models\Comment;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail; // Thêm dòng này để sử dụng đối tượng Mail

class UserController extends Controller
{
    public function index()
    {
        $prods = Product::all();
        $rate = Comment::all();
        $cats = TypeProduct::all();
        return view('user.pages.Products.index', compact('prods', 'rate', 'cats'));
    }



    public function findByNamePro(Request $request)
    {
        $name = $request->name;
        $prods = Product::where('name', 'like', '%' . $name . '%')->get();

        $cats = TypeProduct::all();
        return view('user.pages.Products.index', compact('prods', 'name', 'cats'));
    }

    public function categoryById()
    {
        $prods = Product::whereIn('id_type', request('category'))->get();
        $rate = Comment::all(); 
        $type = TypeProduct::whereIn('id_type', request('category'))->get();
        $cats = TypeProduct::all();
        
        return view('user.pages.Products.index', compact('type', 'prods', 'rate', 'cats'));
    }

    public function searchPrice(Request $request)
    {
        $form = $request->form;
        $to = $request->to;
        $type = (array)$request->type;
        $cats = TypeProduct::all();
        
       
        $allProds = Product::whereIn('id_type', $type)->get(); 
        

        $prods = $allProds->filter(function ($product) use ($form, $to) {
            if ($product->sale > 0) {
                $price = $product->price * (1 - $product->sale / 100);
            } else {
                $price = $product->price;
            }

            return $price >= $form && $price <= $to;
        });

        return view('user.pages.Products.index', compact('prods', 'cats'));
    }

    public function sendMail(Request $request)
    {
        // Lấy dữ liệu từ form
        $name = $request->input('fname');
        $title = $request->input('title');
        $email = $request->input('emailContact');
        $phone = $request->input('phone');
        $comments = $request->input('comments');

        // Gửi email
        try {
            Mail::to('freshshopt12206m1@gmail.com')->send(new ContactFormMail($name, $title, $email, $phone, $comments));
            // Hiển thị thông báo gửi email thành công
            return redirect()->back()->with('status', 'Email sent successfully!');
        } catch (\Exception $e) {
            // Hiển thị thông báo lỗi nếu gửi email thất bại
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function Contact()
    {
        return view('user.pages.Contact.index');
    }

    public function Mail()
    {
        return view('user.pages.Contact.mail');
    }

    public function AboutUs()
    {
        return view('user.pages.AboutUs.index');
    }
}