<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Product;
use App\Models\Library;
use App\Models\Banner;
use App\Models\Slide;
use App\Models\Order;
use App\Models\Favourite;
use App\Models\Coupon;
use App\Models\TypeProduct;
use App\Models\Cart;
use App\Models\News;
use App\Models\Groupmessage;
use App\Models\Message;
use App\Models\User;
use App\Models\Comment;
use App\Models\Address;
use App\Models\ResetPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use App\Mail\VerificationEmail;
use App\Mail\ResetPasswordMail;
class UserSignController extends Controller
{
    public function get_signUp(){
        $site= "Signup";
        return view('user.pages.Signup.index',compact('site'));
    }
    public function post_signUp(Request $req){
        $new_user = new User();
        $new_user->name = $req["register_name"];
        $new_user->email = $req["register_email"];
        $new_user->password = bcrypt($req["register_password"]);
        $new_user->phone = $req["register_phone"];
        if($req->hasFile('register_avatar')){
            $file = $req->file('register_avatar');
            $type = $file->getClientOriginalExtension();
            if($type != "jpg" && $type != "png" && $type != "jpeg" && $type!= "webp"){
                return redirect()->back()->with('error','File image must be jpg,png,jpeg,webp');
            }
            $name = $file->getClientOriginalName();
            $num=0;
            $image_user = "user_".$num."_".$name;
            while(file_exists('images/avatar/'.$image_user)){
                $num++;
                $image_user = "user_".$num."_".$name;
            };
            $file->move('images/avatar/',$image_user);
            $new_user->avatar = $image_user;
        }else{
            $new_user->avatar= null;
        };
        $new_user->email_verification_token =Str::random(32);
        $new_user->created_at= Carbon::now()->format('Y-m-d H:i:s');
        $new_user->save();
        $mailData = [
            'title' => 'Mail to Verification',
            'url' => route('verify',$new_user->email_verification_token)
        ];
        Mail::to($new_user->email)->send(new VerificationEmail($mailData));
        $vali = ["email"=>$new_user->email,"password"=>$req["register_password"]];
        if(Auth::attempt($vali)){
            if(Session::has("cart")){
                $cart_session = Session::get("cart");
                foreach($cart_session as $key => $value){
                    $addToUserCart = new Cart();
                    $addToUserCart->order_code = null;
                    $addToUserCart->id_user = $new_user->id_user;
                    $addToUserCart->id_product = $value["id_product"];
                    $addToUserCart->price = $value["per_price"];
                    $addToUserCart->sale = $value["sale"];
                    $addToUserCart->amount = $value["amount"];
                    $addToUserCart->created_at = Carbon::now()->format('Y-m-d H:i:s');
                    $addToUserCart->save();
                }
                Session::forget("cart");
            };
            return redirect('/signup/confirm')->with('success_signup','Congratulation! You signed up successfully');
        }else{
            return redirect()->back()->with('error','Sign up failue. Try again');
        }
    }
    public function get_signupconfirm(){
        return view('user/pages/Signup/success');
    }
    public function send_verifyEmail(){
        $user = User::find(Auth::user()->id_user);
        $user->email_verification_token =Str::random(32);
        $user->save();
        $mailData = [
            'title' => 'Mail to Verification',
            'url' => route('verify',$user->email_verification_token)
        ];
        try {
            Mail::to($user->email)->send(new VerificationEmail($mailData));
        } catch (\Throwable $th) {
            echo "Send verify email unsuccessfully";
        }
        echo "Mail has been sending please check your email to verified the account";
    }
    public function verifyEmail($token = null){
        if($token == null) {
    		return redirect('signin')->with('verified_error', 'Invalid Login attempt');
        }
        $user = User::where('email_verification_token',$token)->first();
        if(!$user){
            return redirect('signin')->with('verified_error', 'Invalid Login attempt');
        }
        $user->email_verified = true;
        $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->email_verification_token = '';
        $user->save();
        return redirect('/')->with('verified', 'Your account is activated, you can log in now');
    }
    public function get_signIn(){
        $site = "Signin";
        return view('user.pages.Signup.index',compact('site'));
    }
    public function post_signIn(Request $req){
        $arr_vali = ["email"=>$req["email"],"password"=>$req["password"]];
        if(Auth::attempt($arr_vali)){
            if(Session::has("cart") && Auth::user()->admin == '0'){
                $cart_session = Session::get("cart");
                foreach($cart_session as $key => $value){
                    $foundPro = Auth::user()->Cart->where('id_product','=',$value["id_product"])->where('order_code','=',null)->first();
                    if($foundPro){
                        if(($foundPro->amount + $value["amount"]) >= Auth::user()->Cart->where('id_product','=',$value["id_product"])->first()->Product->quantity){
                            $foundPro->amount = Auth::user()->Cart->where('id_product','=',$value["id_product"])->first()->Product->quantity;
                        }else{
                            $foundPro->amount += $value["amount"];
                        };
                        $foundPro->price = $value["per_price"];
                        $foundPro->sale = $value["sale"];
                        $foundPro->save();
                    }else{
                        $addToUserCart = new Cart();
                        $addToUserCart->order_code = null;
                        $addToUserCart->id_user = Auth::user()->id_user;
                        $addToUserCart->id_product = $value["id_product"];
                        $addToUserCart->price = $value["per_price"];
                        $addToUserCart->sale = $value["sale"];
                        $addToUserCart->amount = $value["amount"];
                        $addToUserCart->created_at = Carbon::now()->format('Y-m-d H:i:s');
                        $addToUserCart->save();
                    }
                }
                Session::forget("cart");
            };
            return redirect('/');
        }else{
            return redirect()->back()->with(["error"=>"Sign in failue. Password or username incorrect"]);
        };
    }
    public function signOut(){
        Session::forget('coupon');
        Session::forget('compare');
        Session::forget('cart');
        Auth::logout();
        return redirect('/');
    }
    public function get_forgotpass(){
        $site = "send";
        return view('user.pages.Signup.reset_password',compact('site'));
    }
    public function send_ressetmail(Request $req){
        $req->validate([
            "email_resset"=>"required|email",
        ],[
            "email_resset.required" =>"Email is required",
            "email_resset.email" =>"Email is invalid",
        ]);
        $email = $req['email_resset'];
        $user = User::where('email','=',$email)->first();

        if(!$user){
            return redirect()->back()->with('reset_error','Email hasn\'t signed up in Freshshop');
        }
        if(ResetPassword::find($email)){
            $token_reset = ResetPassword::find($email);
            $token_reset->updated_at =Carbon::now()->format('Y-m-d H:i:s');
        }else{
            $token_reset = new ResetPassword();
            $token_reset->email = $email;
            $token_reset->created_at = Carbon::now()->format('Y-m-d H:i:s');
        }
        $token_reset->token = Str::random(32);
        $token_reset->save();
        $mailData = [
            'title' => 'Reset Password',
            'url' => route('reset_password',$token_reset->token)
        ];
        try {
            Mail::to($email)->send(new ResetPasswordMail($mailData));
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('reset_error','Send mail to reset password unsuccessfully');
        }
        return redirect()->back()->with(['success'=>'Check your email to reset your password','email'=>$email]);
    }
    public function reset_newpassword($token = null){
        if($token == null) {
    		return redirect('/forgot_password')->with('reset_error', 'Something wrong! Try again');
        }
        $find_email = ResetPassword::where('token',$token)->first();
        $email = $find_email->email;
        if(!$find_email){
            return redirect('/forgot_password')->with('verified_error', 'Invalid Login attempt');
        }
        $site = 'create';
        return view('user.pages.Signup.reset_password',compact('site','email'));
    }
    public function create_newpassword(Request $req){
        $user = User::where('email','=',$req['account_email'])->first();
        $user->password = bcrypt($req['new_password2']);
        $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->save();
        $find_email = ResetPassword::find($req['account_email'])->first();
        $find_email->delete();
        return redirect('/signin')->with('message_reset','Reset Password successfully. Now you can signin');
    }
}
