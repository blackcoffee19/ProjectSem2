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
        return view('user.pages.Products.index', compact('prods', 'rate','cats'));
    }

   

    public function findByNamePro(Request $request)
    {
        $name = $request->name;
        $prods = Product::where('name', 'like', '%' . $name . '%')->get();

        return view('user.pages.Products.index', compact('prods', 'name'));
    }

   

    public function searchPrice(Request $request)
    {
        $form = $request->form;
        $to = $request->to;
        $type = $request->type;
        $cats = TypeProduct::all();
        $prods = Product::where('id_type', '=', $type)
                ->where(function($query) use ($form, $to) {
                    $query->where(function($query) use ($form, $to) {
                                $query->where('sale', '>', 0)
                                      ->whereRaw('price * (1 - sale/100) >= ?', [$form])
                                      ->whereRaw('price * (1 - sale/100) <= ?', [$to]);
                            })
                          ->orWhere(function($query) use ($form, $to) {
                                $query->where('sale', '=', 0)
                                      ->whereRaw('price >= ?', [$form])
                                      ->whereRaw('price <= ?', [$to]);
                            });
                })
                ->get();
        
        return view('user.pages.Products.index', compact('prods','cats'));
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
