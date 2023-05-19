<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\News;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->stateless()->user();
            $user = User::where('google_id', '=', $google_user->getId())->orWhere('email', '=', $google_user->getEmail())->first();
            if (!$user) {
                $new_user = new User();
                $new_user->name = $google_user->getName();
                $new_user->email = $google_user->getEmail();
                $new_user->google_id = $google_user->getId();
                if ($google_user->getAvatar()) {
                    $file = file_get_contents($google_user->getAvatar());
                    File::put("images/avatar/gguser_" . $google_user->getId() . ".jpg", $file);
                    $new_user->avatar = "gguser_" . $google_user->getId() . ".jpg";
                }
                $new_user->email_verified = true;
                $new_user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
                $new_user->created_at = Carbon::now()->format('Y-m-d H:i:s');
                $new_user->save();
                if (Session::has("cart")) {
                    $cart_session = Session::get("cart");
                    $user = User::where('google_id', '=', $google_user->getId())->first();
                    foreach ($cart_session as $key => $value) {
                        $product_ck = Product::find(intval($value["id_product"]));
                        if($product_ck && $product_ck->status){
                            $addToUserCart = new Cart();
                            $addToUserCart->id_user = $user->id_user;
                            $addToUserCart->id_product = $value["id_product"];
                            $addToUserCart->amount = $value["amount"];
                            $addToUserCart->price = $product_ck->price;
                            $addToUserCart->sale = $product_ck->sale;
                            $addToUserCart->save();
                        } 
                    }
                    Session::forget("cart");
                };
                $news = new News();
                $news->title = "Please take the last step to activate account";
                $news->link = "accountsetting";
                $news->created_at = Carbon::now()->format('Y-m-d H:i:s');
                $news->id_user = $new_user->id_user;
                $news->save();
                Auth::login($new_user);
                return redirect('/');
            } else {
                if (!$user->google_id) {
                    $user->google_id = $google_user->getId();
                    $user->save();
                }
                if (!$user->email_verified) {
                    $user->email_verified = true;
                    $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
                    $user->save();
                };
                if (Session::has("cart")) {
                    $cart_session = Session::get("cart");
                    foreach ($cart_session as $key => $value) {
                        $foundPro = $user->Cart->where('id_product', '=', $value["id_product"])->first();
                        $product = Product::find(intval($value["id_product"]));
                        if ($foundPro != null && $product && $product->status) {
                            if (($foundPro->amount + $value["amount"]) >= $value['max']) {
                                $foundPro->amount = $user->Cart->where('id_product', '=', $value["id_product"])->first()->Product->quantity;
                            } else {
                                $foundPro->amountt += $value["amount"];
                            };
                            $foundPro->price = $value['per_price'];
                            $foundPro->sale = $value['sale'];
                            $foundPro->save();
                        } else{
                            $addToUserCart = new Cart();
                            $addToUserCart->id_user = $user->id_user;
                            $addToUserCart->id_product = $value["id_product"];
                            $addToUserCart->amount = $value["amount"];
                            $addToUserCart->price = $product->price;
                            $addToUserCart->sale = $product->sale;
                            $addToUserCart->save();
                        }
                    }
                    Session::forget("cart");
                };
                Auth::login($user);
                return redirect('/');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
