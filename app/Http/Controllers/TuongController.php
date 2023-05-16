<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
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
class TuongController extends Controller
{
    public function home_page(){
        if(Auth::check() && Auth::user()->phone != null){
            $check_orders = Order::where('id_user','=',null)->where('phone','=',Auth::user()->phone)->get();
        }else{
            $check_orders = null;
        }
        $cats = TypeProduct::all();
        $products = Product::where('quantity','>',0)->where('status','=',true)->inRandomOrder()->limit(10)->get();
        $product_hot = Product::where('quantity','>',0)->where('sale','>',0)->where('status','=',true)->inRandomOrder()->limit(3)->get();
        $banners = Banner::all();
        $sliders = Slide::all();
        // dd($check_orders);
        return view('user.index',compact('products','product_hot','banners','check_orders','cats','sliders'));
    }
    public function get_signUp(){
        $site= "Signup";
        return view('user.pages.Signup.index',compact('site'));
    }
    public function get_order(){
        if(Session::has('coupon')){
            $coupon =Coupon::find(Session::get('coupon')); 
            $coupon->freeship = Coupon::where('id_coupon','=',Session::get('coupon'))->where('code','LIKE','%FREESHIP%')->first() ? true :false;
        }else{
            $coupon = null;
        }
        if(Auth::check()){
            $carts = Cart::where('id_user','=',Auth::user()->id_user)->where('order_code','=',null)->get();
        }else{
            $carts = Session::get('cart');
        }
        return view('user.pages.Orders.index',compact('carts','coupon'));
    }
    public function add_address(Request $req){
        $newAdd = new Address();
        $newAdd->id_user =Auth::user()->id_user;
        $newAdd->receiver = $req['nameReciever'];
        $newAdd->address = $req['addressReciever'];
        $newAdd->ward = $req['ward'];
        $newAdd->district = $req['district']; 
        $newAdd->province = $req['province'];
        $newAdd->phone = $req['phoneReciever'];
        $newAdd->email = $req['emailReciever'];
        $newAdd->district_id = intval($req['district_id']);
        $newAdd->ward_id = intval($req['ward_id']);
        $newAdd->province_id = intval($req['province_id']);
        if(isset($req['saveAddress'])){
            $defautlAddress = Address::where('id_user','=',Auth::user()->id_user)->where('default','=',true)->first();
            if($defautlAddress){
                $defautlAddress->default = false;
                $defautlAddress->save();
            }
            $newAdd->default = true;
        };
        $newAdd->save();
        return redirect()->back();
    }
    public function remove_address($id){
        $add = Address::where('id_address','=',$id)->first();
        $add->delete();
        $address = Address::where('id_user','=',Auth::user()->id_user)->first();
        $address->default = true;
        $address->save();
        return redirect()->back()->with('message','Delete Address successfully');
    }
    public function get_addressdetail($id){
        $address = Address::find($id);
        echo $address;
    }
    public function check_email($email){
        $checkEmail = User::where('email','=',$email)->get();
        $msg = "";
        if(count($checkEmail)>0){
            $msg = "existed";
        }
        echo $msg;
    }
    public function check_phone($phone){
        $checkPhone = User::where('phone','=',$phone)->get();
        $msg = "";
        if(count($checkPhone)>0){
            $msg = "existed";
        }
        echo $msg;
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
        $orders = Order::where('id_user','=',null)->where('phone','=',$new_user->phone)->get();
        $num=0;
        foreach($orders as $order){
            $cr_order_code = "USR".$new_user->id_user."_".$num;
            foreach($order->Cart as $cart){
                $cart->order_code = $cr_order_code;
                $cart->id_user = $new_user->id_user;
                $cart->save();
            }
            $order->order_code = $cr_order_code;
            $order->id_user = $new_user->id_user;
            $order->save();
            $num++;
        }
        $comment = Comment::where('phone','=',$req["register_phone"])->where('name','=','Guest')->get();
        foreach($comment as $cmt){
            $cmt->name=null;
            $cmt->id_user = $new_user->id_user;
            $cmt->phone = null;
            $cmt->save();
        }
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
            if(Session::has("cart")){
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
    public function product_detail($id = null){
        if($id == null){
            return redirect('/not_found')->with("error","Product Not Found");
        }else{
            $product = Product::find($id);
            $related_products = Product::where('id_type', $product->id_type)->where('id_product', '<>', $id)
                ->take(5)
                ->get();
            $comments= Comment::where('id_product','=',$id)->get();
            return view('user.pages.ProductDetails.index',compact('product','related_products','comments'));
        }
    }
    public function post_comment(Request $req){
        $comment = new Comment();
        $comment->id_user = Auth::user()->id_user;
        $comment->id_product = $req['id_product'];
        $comment->context = $req['comment'];
        $comment->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $comment->save();
        return redirect()->back();
    }
    public function editCmt(Request $req,$id){
        $cmt = Comment::find($id);
        if(isset($req['rating_cmt'])){
            $cmt->rating = $req['rating_cmt'];
        };
        $cmt->context = $req['content_cmt'];
        $cmt->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $cmt->save();
        return redirect()->back(); 
    }
    public function deleteCmt($id){
        $comt = Comment::find($id);
        $comt->delete();
        return redirect()->back();
    }
    public function get_checkout(){
        if(Session::has('coupon')){
            $coupon =Coupon::find(Session::get('coupon')); 
            $coupon->freeship = Coupon::where('id_coupon','=',Session::get('coupon'))->where('code','LIKE','%FREESHIP%')->first() ? true :false;
        }else{
            $coupon = null;
        }
        if(Auth::check()){
            $cart = Cart::where('id_user','=',Auth::user()->id_user)->where('order_code','=',null)->get();
            $address = Auth::user()->Address->sortByDesc('default');
        }else{
            $cart = Session::get('cart');
            $address = null;
        }
        return view('user.pages.Orders.checkout',compact('cart','address','coupon'));
    }
    public function ghn_getservice(Request $req){
        $district = $req['district'];
        $data = array(
            "shop_id" => 124157,
            "from_district" => 1444,
            "to_district"=>intval($district)
        );
        $payload = json_encode( $data );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/available-services",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Token: ea19c297-efa4-11ed-943b-f6b926345ef9", 
            ),
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS     => $payload, 
        ));        
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }
    public function gtn_servicefee (Request $req){
        $ward = $req['ward'];
        $service_id = intval($req['service_id']);
        $district = intval($req['district']);
        $total_weight = isset($req['weight']) ? intval($req['weight']): 0;
        if(Auth::check() && $total_weight ==0){
            $carts = Cart::where('id_user','=',Auth::user()->id_user)->where('order_code','=',null)->get();
            foreach($carts as $cart){
                $total_weight+=$cart->amount;
            }
        }else if($total_weight ==0){
            $carts = Session::get('cart');
            foreach($carts as $cart){
                $total_weight+=$cart['amount'];
            }
        }
        $data = array(
            "from_district_id" => 1444,
            "service_id" => $service_id,
            "service_type_id"=> null,
            "to_district_id" => $district,
            "to_ward_code"=>$ward,
            "weight" => $total_weight,
        );
        $payload = json_encode( $data );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Token: ea19c297-efa4-11ed-943b-f6b926345ef9", 
                "ShopId: 124157",
            ),
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS     => $payload, 
        ));        
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }
    public function ghtk_servicefee(Request $req){
        $province = $req['province'];
        $district = $req['district'];
        $method = $req['method'];
        $total_weight = 0;
        $subtotal=0;
        if(Auth::check()){
            $carts = Cart::where('id_user','=',Auth::user()->id_user)->where('order_code','=',null)->get();
            foreach($carts as $cart){
                $total_weight+=$cart->amount;
                $subtotal += $cart->price*(1-$cart->sale/100)*($cart->amount/1000);
            }
        }else{
            $carts = Session::get('cart');
            foreach($carts as$cart){
                $total_weight+=$cart['amount'];
                $subtotal += $cart['per_price']*(1-$cart['sale']/100)*($cart['amount']/1000);
            }
        }
        //api GHTK
        $arr_deliver = array();
        $data = array(
            "pick_province" => "Hồ Chí Minh",
            "pick_district" => "Quận 3",
            "pick_ward"=> "Phường 14",
            "province" => $province,
            "district" => $district,
            "weight" => $total_weight,
            "value" => $subtotal,
            "transport" => "fly",
            "deliver_option" => "none",
            "tags"=>[7]
        );
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/fee?" . http_build_query($data),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => array(
                "Token: 1830630245Ca1E494982d10B95FaFFbe6bF78641",
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        if($method == 'fly' || !$method){
            array_push($arr_deliver,$response);
        }

        $data2 = array(
            "pick_province" => "Hồ Chí Minh",
            "pick_district" => "Quận 3",
            "pick_ward"=> "Phường 14",
            "province" => $province,
            "district" => $district,
            "weight" => $total_weight,
            "value" => $subtotal,
            "transport" => "road",
            "deliver_option" => "none",
            "tags"=>[7]
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/fee?" . http_build_query($data2),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => array(
                "Token: 1830630245Ca1E494982d10B95FaFFbe6bF78641",
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        if($method == 'road'||!$method){
            array_push($arr_deliver,$response);
        };

        $data3 = array(
            "pick_province" => "Hồ Chí Minh",
            "pick_district" => "Quận 3",
            "pick_ward"=> "Phường 14",
            "province" => $province,
            "district" => $district,
            "weight" => $total_weight,
            "value" => $subtotal,
            "transport" => "fly",
            "deliver_option" => "xteam",
            "tags"=>[7]
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://services.giaohangtietkiem.vn/services/shipment/fee?" . http_build_query($data3),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => array(
                "Token: 1830630245Ca1E494982d10B95FaFFbe6bF78641",
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        if($method == 'xteam' || !$method){
            array_push($arr_deliver,$response);
        };
        echo json_encode($arr_deliver);
        // dd($data,$response);
    }
    public function post_checkout(Request $req){
        $order = new Order();
        if(Auth::check()){
            $order->id_user = Auth::user()->id_user;
            $order_code = "USR".Auth::user()->id_user."_".count(Auth::user()->Order);
            $order->order_code = $order_code;
            $address = Address::find($req['select_address']);
            $order->receiver = $address['receiver']; 
            $order->phone = $address['phone'];
            $order->email = $address['email'];
            $order->address = $address['address'].", ".$address['ward'].", ".$address['district'].", ".$address['province'];
            $order->code_coupon = $req['code_coupon'];
            $order->instruction = $req['delivery_instructions'];
            foreach(Cart::where('order_code','=',null)->where('id_user','=',Auth::user()->id_user)->get() as $cart){
                $cart->Product->quantity-=$cart->amount;
                $cart->Product->updated_at = Carbon::now()->format('Y-m-d H:i:s');
                $cart->Product->save();
                $cart->order_code = $order_code;
                $cart->price = $cart->Product->price;
                $cart->sale = $cart->Product->sale;
                $cart->updated_at = Carbon::now()->format('Y-m-d H:i:s');
                $cart->save();
            }
        }else{
            $nnum = count(Order::where('order_code','LIKE','%GUT%')->get());
            $order_code = "GUT_".$nnum;
            while(Order::where('order_code','=',$order_code)->first()){
                $nnum++;
                $order_code ="GUT_".$nnum;
            }
            $current_guest_cart = Session::get('cart');
            foreach($current_guest_cart as $key => $value){
                $guest_cart = new Cart();
                $guest_cart->order_code=$order_code;
                $guest_cart->id_product= $value["id_product"];
                $guest_cart->price = $value["per_price"];
                $guest_cart->sale = $value["sale"];
                $guest_cart->amount = $value["amount"];
                $guest_cart->created_at = Carbon::now()->format('Y-m-d H:i:s');
                $guest_cart->updated_at = Carbon::now()->format('Y-m-d H:i:s');
                $guest_cart->save();
                $product = Product::where('id_product','=',$value["id_product"])->first();
                $product->quantity -=$value["amount"];
                $product->updated_at = Carbon::now()->format('Y-m-d H:i:s');
                $product->save();
            }
            
            $order->order_code = $order_code;
            $order->instruction = $req['delivery_instructions'];
            $order->receiver = $req['nameReciever'];
            $order->phone = $req['phoneReciever'];
            $order->email = $req['emailReciever'];
            $order->address = $req['addressReciever'].", ".$req['ward'].", ".$req['district']. ", ".$req['province'];
            $order->code_coupon = $req['code_coupon'];
        }
        $order->method = $req['order_method'];
        $order->delivery_method = $req['delivery_method'];
        $order->shipping_fee = $req['shipment_fee'];
        $order->status = 'unconfirmed';
        $order->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $order->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $order->save();
        Session::forget("cart");
        return redirect('/')->with('order_mess',"Order Successfully, plz wait for Admin Confirm");
    }
    public function admin_cate(){
        $products = Product::all();
        return view('admin.pages.Categories.index',compact('products'));
    }
    public function addToCart(Request $req, $id=null){
        $foundPro =[];
        $req->validate([
            "quan" => "required"
        ],[
            "quan.required"=>"You need choose at least 1 item",
        ]);
        $product = Product::where('id_product','=',$req["id_pro"])->first();
        $maxQuan = $product->quantity;
        $amount = intval($req["quan"]);
        if(intval($req["quan"]) >$maxQuan){
            $amount = $maxQuan;
        }
        $price = $product->price;
        $name = $product->name;
        $imgPro = $product->Library[0]->image;
        // dd($imgPro);
        if(Auth::check()){
            $foundPro = Auth::user()->Cart->where('id_product','=',$req["id_pro"])->where('order_code','=',null)->first();
            if($foundPro){
                $sum_quant = $amount+ $foundPro->amount; 
                if($sum_quant > $maxQuan){
                    $sum_quant = $maxQuan;
                };
                $foundPro->amount  = $sum_quant;
                $foundPro->save();
            }else{
                $cart = new Cart();
                $cart->id_user = Auth::user()->id_user;
                $cart->order_code = null;
                $cart->id_product = $req->id_pro;
                $cart->price = $price;
                $cart->sale =  $product->sale;
                $cart->amount = $amount;
                $cart->created_at = Carbon::now()->format('Y-m-d H:i:s');
                $cart->save();
            }
        }else if(Session::has("cart")){
            $check = true;
            $arr_cart = Session::get("cart");
            $arr_new = [];
            foreach($arr_cart as $key => $value){
                if($value["id_product"] == $req["id_pro"]){
                    $addQuan = ($value["amount"]+$amount) > $maxQuan ? $maxQuan : $value["amount"]+$amount;
                    array_push($arr_new,["id_product" => $value["id_product"],"amount"=>$addQuan,"per_price"=>$value["per_price"],"name"=>$value["name"],"max"=>$value["max"],"image"=>$imgPro,'sale'=>$value['sale']]);
                    $check = false;
                }else{
                    array_push($arr_new,$value);
                }
            }
            if($check){
                $new = ["id_product"=>$req["id_pro"],"amount"=>$amount,"per_price"=>$price,"name"=>$name,"max"=>$maxQuan,"image"=>$imgPro,'sale'=>$product->sale];
                Session::push("cart",$new);
            }else{
                Session::put("cart",$arr_new);
            }
        }else{
            $cart_session = ["id_product"=>$req["id_pro"],"amount"=>$amount,"per_price"=>$price,"name"=>$name,"max"=>$maxQuan,"image"=>$imgPro,'sale'=>$product->sale];
            Session::push("cart",$cart_session);
        };
        return redirect()->back()->with(["message_addtocart"=>"Add to cart successfull"]);
    }
    public function addToCart2($id){
        $product= Product::find($id);
        $num =0;
        if(Auth::check()){
            $foundPro = Auth::user()->Cart->where('id_product','=',$id)->where('order_code','=',null)->first();
            if($foundPro){
                if($foundPro->amount == $foundPro->Product->quantity){
                    return redirect()->back()->with(["warning"=>"Add to cart failue! You got maximum"]);
                }else{
                    $newAmount = ($foundPro->amount + 100)>$product->quantity ? $product->quantity : $foundPro->amount + 100;
                    $foundPro->amount = $newAmount;
                    $foundPro->save();
                }
            }else{
                $cart = new Cart();
                $cart->id_user = Auth::user()->id_user;
                $cart->order_code = null;
                $cart->price = $product->price;
                $cart->sale = $product->sale;
                $cart->id_product = $id;
                $cart->amount = $product->quantity < 100 ? $product->quantity:100;
                $cart->created_at = Carbon::now()->format('Y-m-d H:i:s');
                $cart->save();
            };
            $num = count(Auth::user()->Cart->where('order_code','=',null))+ 1;
        }else if(Session::has("cart")){
            $check = true;
            $arr_cart = Session::get("cart");
            $arr_new = [];
            foreach($arr_cart as $key => $value){
                if($value["id_product"] == $id){
                    $addQuan = ($value["amount"]+100) > $product->quantity ? $product->quantity : $value["amount"]+100;
                    array_push($arr_new,["id_product" => $value["id_product"],"amount"=>$addQuan,"per_price"=>$value["per_price"],"name"=>$value["name"],"max"=>$value["max"],"image"=>$value["image"],'sale'=>$value['sale']]);
                    $check = false;
                }else{
                    array_push($arr_new,$value);
                }
            }
            if($check){
                $new = ["id_product"=>$id,"amount"=>100,"per_price"=>$product->price,"name"=>$product->name,"max"=>$product->quantity,"image"=>$product->Library[0]->image,'sale'=>$product->sale];
                $num = count($arr_cart)+1;
                array_push($arr_new,$new);
                Session::put("cart",$arr_new);
            }else{
                $num = count($arr_cart);
                Session::put("cart",$arr_new);
            }
        }else{
            $num+=1;
            $cart_session = ["id_product"=>$id,"amount"=>100,"per_price"=>$product->price,"name"=>$product->name,"max"=>$product->quantity,"image"=>$product->Library[0]->image,'sale'=>$product->sale];
            Session::push("cart",$cart_session);
        };
        echo $num;
    }
    public function minusOne($id){
        if(Auth::check()){
            $product = Cart::find($id);
            if($product->amount ==100){
                $product->delete();
            }else{
                $product->amount -=100;
                $product->save();
            }
        }else{
            $session_cart = Session::get("cart");
            $new_session = [];
            for($i = 0; $i<count($session_cart);$i++){
                if($i == $id){
                    $minus = $session_cart[$i]["amount"]-100;
                    if($minus>0){
                        array_push($new_session,["id_product"=>$session_cart[$i]["id_product"],"amount"=>$minus,"per_price"=>$session_cart[$i]["per_price"],"name"=>$session_cart[$i]["name"],"max"=>$session_cart[$i]["max"],"image"=>$session_cart[$i]["image"],'sale'=>$session_cart[$i]['sale']]);
                    }
                }else{
                    array_push($new_session,["id_product"=>$session_cart[$i]["id_product"],"amount"=>$session_cart[$i]["amount"],"per_price"=>$session_cart[$i]["per_price"],"name"=>$session_cart[$i]["name"],"max"=>$session_cart[$i]["max"],"image"=>$session_cart[$i]["image"],'sale'=>$session_cart[$i]['sale']]);
                }
            };
            Session::put("cart",$new_session);
        }
        return redirect()->back();
    }
    public function addMore($id){
        if(Auth::check()){
            $product = Cart::find($id);
            if($product->Product->quantity > $product->amount){
                $newAmount = $product->Product->quantity > ($product->amount +100)? $product->amount +100 : $product->Product->quantity;
                $product->amount = $newAmount;
                $product->save();
            }
        }
        else{
            $session_cart = Session::get("cart");
            $new_session = [];
            for($i = 0; $i<count($session_cart);$i++){
                if($i == $id){
                    $addOne = ($session_cart[$i]["amount"]+100) > $session_cart[$i]['max']? $session_cart[$i]['max']: $session_cart[$i]["amount"]+100;
                    array_push($new_session,["id_product"=>$session_cart[$i]["id_product"],"amount"=>$addOne,"per_price"=>$session_cart[$i]["per_price"],"name"=>$session_cart[$i]["name"],"max"=>$session_cart[$i]["max"],"image"=>$session_cart[$i]["image"],'sale'=>$session_cart[$i]['sale']]);
                }else{
                    array_push($new_session,["id_product"=>$session_cart[$i]["id_product"],"amount"=>$session_cart[$i]["amount"],"per_price"=>$session_cart[$i]["per_price"],"name"=>$session_cart[$i]["name"],"max"=>$session_cart[$i]["max"],"image"=>$session_cart[$i]["image"],'sale'=>$session_cart[$i]['sale']]);
                }
            };
            Session::put("cart",$new_session);
        }
        return redirect()->back()->with('message',"Add one more product into your cart successfully!");
    }
    public function modalCart(){
        $list_cart = [];
        $sum =0;
        $html_list = "";
        if(Auth::check()){
            $list_cart = Cart::where('order_code','=',null)->where('id_user','=',Auth::user()->id_user)->get();
            if(count($list_cart)>0){
                foreach($list_cart as $key => $cart){

                    $html_list.="<li class='list-group-item py-3 ps-0 border-top border-bottom'>
                        <div class='row align-items-center'>
                        <div class='col-3 col-md-2'>
                            <img src='images/products/".$cart->Product->Library[0]->image."' alt='".$cart->Product->name."' class='img-fluid' style='width: 200px'></div>
                        <div class='col-3 col-md-3'>
                            <a href='".route('products-details',$cart->id_product)."' class='text-inherit'>
                            <h6 class='mb-0'>".$cart->Product->name."</h6>
                            </a>
                            <span><small class='text-muted'>".$cart->Product->TypeProduct->type."</small></span>
                            <div class='mt-2 small lh-1'> 
                                <a href='".route('removeId',$cart->id_cart)."' class='text-decoration-none text-inherit'> 
                                   <span class='text-muted'>Remove</span>
                                </a>
                            </div>
                        </div>
                        <div class='col-4 col-md-5 col-lg-5 '>
                        <form method='POST' action='".route('cartadd',$cart->id_cart)."'>
                        <input type='hidden' name='_token' >
                        <input type='hidden' name='max_quan' value='".$cart->Product->quantity."'>
                            <div class='col-6 d-flex flex-column justify-content-center align-items-center'>
                            <div class='input-group input-spinner input-group-sm' data-amount=".$cart->amount.">
                            <button type='button' class='btn btn_minus' style='border-radius: 10px 0 0 10px;'  data-field='quantity'>
                                <i class='bi bi-dash-lg'></i>
                            </button>
                            <input type='text' value='".number_format($cart->amount,0,'','')."' name='quan'  class='form-control form-input'>
                            <button type='button' class='btn btn_plus' style='border-radius: 0 10px 10px 0;'><i class='bi bi-plus-lg'></i></button>
                            </div>
                            <input type='submit'class='text-primary text-center border-0 bg-white d-none' id='modal_save' value='Save'>
                            </div>
                            </form></div><div class='col-2 text-lg-end text-start text-md-end col-md-2'>";
                    if($cart->sale > 0 ){
                        $sum += $cart->price *(1- ($cart->sale /100)) * $cart->amount/1000;
                        $html_list.= "<span class='fw-bold text-danger fs-5'>". number_format($cart->price * (1-$cart->sale/100),0,'',' ')." đ/kg</span></div></div></li>";
                    }else{
                        $sum += $cart->price * $cart->amount/1000;
                        $html_list.= "<span class='fw-bold'>".$cart->price." đ</span></div></div></li>"; 
                    }
                };
                $html_list .="<li class='list-group-item py-3 ps-0 border-top border-bottom'><div class='text-black-50 text-end'><h4>Total: <span class='h4 text-danger'>".number_format($sum,0,'',' ')." đ</span></h4></div></li>";
            }else{
                $html_list .= "<li class='list-group-item py-3 ps-0 border-top border-bottom'><div class='text-black-50 text-center'>Cart is emty</div></li>";
            };
        }else if(Session::has('cart')){
            $list_cart = Session::get('cart');
            if(count($list_cart)>0){
                foreach($list_cart as $key => $cart){

                    $html_list.="<li class='list-group-item py-3 ps-0 border-top border-bottom'>
                    <div class='row align-items-center'>
                    <div class='col-3 col-md-2'>
                    <img src='images/products/".$cart["image"]."' alt='".$cart["name"]."' class='img-fluid' style='width: 200px'>
                    </div>
                        <div class='col-3 col-md-3'>
                        <a href='".route('products-details',$cart['id_product'])."' class='text-inherit'>
                        <h6 class='mb-0'>".$cart['name']."</h6>
                            </a>
                            <span><small class='text-muted'>".Product::find($cart["id_product"])->TypeProduct->type."</small></span>
                            <div class='mt-2 small lh-1'> 
                            <a href='".route('removeId',$key)."' class='text-decoration-none text-inherit'> 
                               <span class='text-muted'>Remove</span>
                               </a>
                            </div>
                            </div>
                        <div class='col-4 col-md-4 col-lg-5'>
                        <form method='POST' action='".route('cartadd',$key)."'>
                            <input type='hidden' name='_token' >
                            <input type='hidden' name='max_quan' value='".$cart['max']."'>
                            <div class='col-6 d-flex flex-column justify-content-center align-items-center'>
                                <div class='input-group input-spinner input-group-sm'>
                                    <button type='button' class='btn btn_minus' style='border-radius: 10px 0 0 10px;'  data-field='quantity'>
                                        <i class='bi bi-dash-lg'></i>
                                    </button>
                                    <input type='text' value='".$cart["amount"]."' name='quan' class='form-control form-input'>
                                    <button type='button' class='btn btn_plus' style='border-radius: 0 10px 10px 0;'><i class='bi bi-plus-lg'></i></button>
                                </div>
                            <input type='submit'class='text-primary text-center border-0 bg-white d-none' value='Save'>
                            </div>
                        </form>
                        </div>";
                    $html_list.="<div class='col-2 text-lg-end text-start text-md-end col-md-2'>";
                    if($cart["sale"]> 0 ){
                        $sum += intval($cart["per_price"])*(1-intval($cart["sale"])/100) * intval($cart["amount"])/1000;
                        $html_list.= "<span class='fw-bold text-danger fs-5'>". number_format(intval($cart['per_price'])*(1- (intval($cart["sale"])/100)),0,'',' ')." đ/kg</span></div></div></li>";
                    }else{
                        $sum += intval($cart["per_price"]) * intval($cart["amount"])/1000;
                        $html_list.= "<span class='fw-bold'>$".number_format($cart['per_price'],0,'',' ')." đ/kg</span></div></div></li>"; 
                    }
                };
                $html_list .="<li class='list-group-item py-3 ps-0 border-top border-bottom'><div class='text-black-50 text-end'><h4>Total: <span class='h4 text-danger'>".number_format($sum,0,'',' ')." đ</span></h4></div></li>";
            }else{
                $html_list .= "<li class='list-group-item py-3 ps-0 border-top border-bottom'><div class='text-black-50 text-center'>Cart is emty</div></li>";
            };
        }
        echo $html_list;
    }
    public function removeCart($id){
        if(Auth::check()){
            $item = Cart::find($id);
            $item->delete();
        }
        if(Session::has("cart")){
            $session_cart = Session::get("cart");
            $new_session = [];
            for($i = 0; $i<count($session_cart);$i++){
                if($i != $id){
                    array_push($new_session,["id_product"=>$session_cart[$i]["id_product"],"amount"=>$session_cart[$i]["amount"],"per_price"=>$session_cart[$i]["per_price"],"name"=>$session_cart[$i]["name"],"max"=>$session_cart[$i]["max"],"image"=>$session_cart[$i]["image"]]);
                }
            };
            Session::put("cart",$new_session);
        }
        return redirect()->back();
    }
    public function clearCart(){
        if(Auth::check()){
            $current_cart =  Cart::where('id_user','=',Auth::user()->id_user)->where('order_code','=',null)->get();
            foreach($current_cart as $cart){
                $cart->delete();
            }
        }else if(Session::has('cart')){
            Session::forget("cart");
        }
        return redirect()->back();
    }
    public function cartadd_quan(Request $req, $id){
        $req->validate([
            'quan' =>"required|numeric|min:0"
        ],[
            'quan.required'=>"",
            'quan.numeric'=>"",
            'quan.min'=>""
        ]);
        if(Auth::check()){
            $cart = Cart::find($id);
            if(intval($req['quan']) == 0){
                $cart->delete();
            }else{
                $cart->amount = $req['quan'] > $cart->Product->quantity?$cart->Product->quantity:$req['quan'] ;
                $cart->save();
            }
        }else{
            $arr_cart = Session::get("cart");
            $arr_new = [];
            foreach($arr_cart as $key => $value){
                if($key == $id && intval($req['quan'])!=0){
                    $addQuan = intval($req['quan']) > intval($value['max']) ? intval($value['max']) : intval($req['quan']);
                    array_push($arr_new,["id_product" => $value["id_product"],"amount"=>$addQuan,"per_price"=>$value["per_price"],"name"=>$value["name"],"max"=>$value["max"],"image"=>$value['image'],'sale'=>$value['sale']]);
                } else if($key == $id && intval($req['quan'])==0){
                    continue;
                }else{
                    array_push($arr_new,$value);
                }
            }
            Session::put("cart",$arr_new);
        }
        return redirect()->back();
    }
    public function modal_product($id){
        $product = Product::find($id);
        $arrImg = [];
        foreach($product->Library as $img){
            $arrImg[] = $img->image;
        }
        $product->images = $arrImg;
        $product->type = Product::find($id)->TypeProduct->type;
        $product->favourite = Auth::check()? (count(Favourite::where('id_user','=',Auth::user()->id_user)->where('id_product','=',$id)->get())>0? true: false):false;
        $rating = 0;
        $commt = Comment::where('rating','!=',null)->where('id_product','=',$id)->get();
        if(count($commt)>0){
            foreach( $commt as $rate){
                $rating += $rate->rating;
            }
            $rating /= count($commt);
        }
        $product->rating = $rating;
        $product->sold = count($commt);
        $product->link = route('products-details',$id);
        echo $product;
    }
    public function add_favourite($id){
        $product = Product::find($id);
        $found_fav = Favourite::where('id_user','=',Auth::user()->id_user)->where('id_product','=',$id)->first();
        if(!$found_fav){
            $new_fav = new Favourite();
            $new_fav->id_user = Auth::user()->id_user;
            $new_fav->id_product = $product->id_product;
            $new_fav->created_at=Carbon::now()->format('Y-m-d H:i:s');
            $new_fav->save();
        }else{
            $found_fav->delete();
        }
        $num = count(Auth::user()->Favourite);
        echo $num;
    }
    public function addCompare($id){
        $msg="";
        $product = Product::find($id);
        $rating  = 0;
        if(count($product->Comment->where('rating','!=',null))>0){
            foreach($product->Comment->where('rating','!=',null) as $rate){
                $rating += $rate->rating;
            }
            $rating /= count($product->Comment->where('rating','!=',null));
        };
        $product->image = $product->Library[0]->image;
        $product->rating = $rating;
        $product->sold = count($product->Comment->where('rating','!=',null));
        if(Session::has('compare')){
            if(count(Session::get('compare'))<=2){
                $arr = [];
                foreach(Session::get('compare') as $product_compare){
                    if(!in_array($product_compare->id_product,$arr)){
                        array_push($arr,$product_compare->id_product);
                    }
                }
                if(!in_array($product->id_product,$arr)){
                    Session::push('compare',$product);
                    $msg.="Add (".count(Session::get('compare'))."/3) Product to compare";
                }else{
                    $msg.="Product has already existed in compare.";
                }
            }else{
                $msg.="Compare List was full.";
            }
        }else{
            $msg.="Add (1/3) Product to compare";
            Session::put('compare',[$product]);
        }
        echo $msg;
    }
    public function showCompare(){
        $cmp = "";
        $info = ["Image","Name","Type","Quantity","Status","Rating","Sold","Price",'Delete'];
        for($i =0; $i<count($info);$i++){
            $cmp.="<tr><td>".$info[$i]."</td>";
            foreach(Session::get('compare') as $key=> $product){
                switch($i){
                    case 0: 
                        $cmp.="<td><img src='images/products/$product->image' width='160' class='img-fluid' style='object-fit:cover'/></td>";
                        break;
                    case 1:
                        $cmp.="<td class='text-dark text-capitalize'>$product->name</td>";
                        break;
                    case 2: 
                        $prod = Product::find($product['id_product']);
                        $cmp.="<td class='text-dark text-capitalize'>".$prod->TypeProduct->type."</td>";
                        break;
                    case 3:
                        $cmp .= "<td class='text-dark'>Left: ".number_format($product->quantity,0,'',' ')."grams</td>";
                        break;
                    case 4:
                        $status = $product->status? "In Stock": "Out Stock";
                        $cmp .="<td class='text-dark'>".$status."</td>";
                        break;
                    case 5:
                        $cmp.="<td>";
                        for($j =0; $j<floor($product->rating);$j++){
                            $cmp.="<i class='bi bi-star-fill text-warning fs-5'></i>";
                        };
                        if (is_float($product->rating)){
                            $cmp.="<i class='bi bi-star-half text-warning fs-5'></i>";
                        };
                        for($j = 0; $j < 5-ceil($product->rating);$j++){
                            $cmp.="<i class='bi bi-star text-warning fs-5'></i>";
                        };
                        $cmp.="</td>";
                        break;
                    case 6:
                        $cmp .= "<td class='text-dark'>".$product->sold."</td>";
                        break;
                    case 7:
                        if($product->sale>0){
                            $cmp .= "<td><span class='fs-4 text-danger'>".(number_format($product->price * (1-$product->sale/100),0,'',' '))." đ/kg</span>";
                            $cmp.="<span class='text-muted ms-1'>(Off ".$product->sale."%)</span></td>";
                        }else{
                            $cmp.="<td><span class='fs-4 text-black'>".number_format($product->price,0,'',' ')." đ/kg</span></td>";
                        };
                        break;
                    default:
                        $cmp .="<td><a href='".route('delCmp',$key)."' class='removeCmp btn' data-idcmp=".$key."><i class='bi bi-trash3 text-danger fs-3'></i></button></td>";
                    break;
                }
            };
            $cmp.="</tr>";
        }
        echo $cmp;
    }
    public function delCompare($id){
        $arr_sess = Session::get('compare');
        unset($arr_sess[$id]);
        Session::put('compare',$arr_sess);
        return redirect()->back();
    }
    public function removeCompare(){
        Session::forget('compare');
        return redirect()->back();
    }
    public function addCoupon($coupon){
        $coupon2 = Coupon::where('code','=',$coupon)->where('status','=',true)->first();
        if($coupon2){
            $checkAuth = count(Order::where('code_coupon','=',$coupon)->where('id_user','=',Auth::user()->id_user)->where('status','!=','cancel')->get()) >= $coupon2->max;
            if(!$coupon2 ||$checkAuth){
                $coupon2= ['error'=>!$coupon2?"Promo code is not Invalid":"You have reached the maximum use of this promo code"];
                $coupon2 = json_encode($coupon2);
                Session::forget('coupon');
            }else{
                Session::put('coupon',$coupon2->id_coupon);
            }
        }
        echo $coupon2;
    }

    public function get_wishlist(){
        $favourites = Auth::user()->Favourite;
        return view('user.pages.ShopWishlist.index',compact('favourites'));
    }
    public function post_wishlist(Request $req){
        if(!isset($req->removeFav) && !isset($req->checkFav)){
            return redirect('/order');
        }else if(isset($req->removeFav)){
            foreach($req->checkFav as $id){
                $fav = Favourite::find($id);
                $fav->delete();
            }
        }else{
            foreach($req->checkFav as $id){
                $fav = Favourite::find($id);
                $item = Auth::user()->Cart->where('order_code','=',null)->where('id_product','=',intval($fav->id_product))->first();
                if($item ){
                    $item->amount = $item->Product->quantity >($item->amount +100)?$item->amount +100 : ($item->Product->quantity > $item->amount?$item->Product->quantity: $item->amount);
                    $item->price = $fav->Product->price;
                    $item->sale = $fav->Product->sale;
                    $item->updated_at= Carbon::now()->format('Y-m-d H:i:s');
                    $item->save();
                }else{
                    $new_cart = new Cart();
                    $new_cart->order_code = null;
                    $new_cart->id_user= Auth::user()->id_user;
                    $new_cart->id_product = $fav->id_product;
                    $new_cart->price = $fav->Product->price; 
                    $new_cart->sale =  $fav->Product->sale; 
                    $new_cart->amount= $fav->Product->quantity > 100 ? 100 : $fav->Product->quantity;
                    $new_cart->created_at=Carbon::now()->format('Y-m-d H:i:s');
                    $new_cart->save();
                }
            }
            return redirect('/order');
        };
        return redirect()->back();
    }
    public function get_orderhistory(){
        if(Auth::user()->admin != '2'){
            $orders = Order::where('id_user','=',Auth::user()->id_user)->orderBy('created_at','desc')->paginate(6);
            foreach($orders as $order){
                $sum = 0;
                foreach($order->Cart as $cart){
                    $sum += $cart->sale > 0? $cart->price*(1 - $cart->sale/100)*($cart->amount/1000): $cart->price*($cart->amount/1000);
                }
                if($order->Coupon){
                    if($order->Coupon->discount <= 100){
                        $sum *= (1-$order->Coupon->discount /100);
                    }else{
                        $sum-=$order->Coupon->discount;
                    }
                }
                $sum += $order->shipping_fee;
                $order->total = $sum;
            }
        }else{
            $orders = Order::orderBy('created_at','desc')->paginate(6);
            foreach($orders as $order){
                $sum = 0;
                foreach($order->Cart as $cart){
                    $sum += $cart->sale > 0? $cart->price*(1 - $cart->sale/100)*($cart->amount/1000): $cart->price*($cart->amount/1000);
                }
                if($order->Coupon){
                    if($order->Coupon->discount <= 100){
                        $sum *= (1-$order->Coupon->discount /100);
                    }else{
                        $sum-=$order->Coupon->discount;
                    }
                }
                $sum += $order->shipping_fee;
                $order->total = $sum;
            }
        }
        return view('user.pages.About.order',compact('orders'));
    }
    public function ajax_getOrder($id){
        $order = Order::find($id);
        if($order->Coupon){
            $order->name_coupon = $order->Coupon->title;
        }else{
            $order->name_coupon = "NO COUPON";
        }
        $weight = 0;
        foreach($order->Cart as $cart){
            $weight +=$cart->amount;
        }
        $order->weight = $weight;
        echo $order;
    }
    public function post_urseditorder(Request $req){
        $order = Order::find($req['id_orderedit']);
        $order->receiver = $req['edit_cusname'];
        if(isset($req['edit_ward']) && $req['edit_ward']!=''){
            $order->address = $req['edit_cusaddr'].", ".$req['edit_ward'].", ".$req['edit_district'].", ".$req['edit_province'];
        }
        $order->phone = $req['edit_cusphone'];
        $order->email = $req['edit_email'];
        $order->shipping_fee = $req['new_servicefee'] ? intval($req['new_servicefee']): $order->shipping_fee;
        $order->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $order->save();
        $new = new News();
        $new->order_code =$order->order_code;
        $new->link = $order->order_code;
        $new->send_admin = true;
        $new->title = "Customer edited their Order";
        $new->created_at=Carbon::now()->format('Y-m-d H:i:s');
        $new->save();
        return redirect()->back()->with('message','Edit Order successfull');
    }
    public function cancel_order($id){
        $order = Order::find($id);
        $order->status = 'cancel';
        $order->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $order->save();
        foreach($order->Cart as $cart){
            $product = $cart->Product;
            $product->quantity += $cart->amount;
            $product->save();
            $cart->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $cart->save();
        }
        $new = new News();
        $new->order_code =$order->order_code;
        $new->link = $order->order_code;
        $new->send_admin = true;
        $new->title = "Cancel Order";
        $new->created_at=Carbon::now()->format('Y-m-d H:i:s');
        $new->save();
        return redirect()->back();
    }
    public function get_accountsetting(){
        return view('user.pages.About.setting');
    }
    public function post_editprofie(Request $req){
        $user = User::find(Auth::user()->id_user);
        $user->name = $req['new_name'];
        if($req['new_email'] != $user->email){
            $user->email = $req['new_email'];
            $user->email_verified = false;
        };
        $checkPhone = User::where('phone','=',$req['new_phone'])->where('id_user','!=',Auth::user()->id_user)->get();
        if(count($checkPhone) == 0 && !$user->phone){
            $user->phone = $req['new_phone'];
            $comment = Comment::where('name','=','Guest')->where('phone','=',$req['new_phone'])->get();
            foreach($comment as $cmt){
                $cmt->name=null;
                $cmt->id_user = $user->id_user;
                $cmt->phone = null;
                $cmt->save();
            }
            $orders = Order::where('id_user','=',null)->where('phone','=',$req['new_phone'])->get();
            $num=0;
            foreach($orders as $order){
                $cr_order_code = "USR".$user->id_user."_".$num;
                foreach($order->Cart as $cart){
                    $cart->order_code = $cr_order_code;
                    $cart->id_user = $user->id_user;
                    $cart->save();
                }
                $order->order_code = $cr_order_code;
                $order->id_user = $user->id_user;
                $order->save();
                $num++;
            }
        }else if(count($checkPhone) == 0){
            $user->phone = $req['new_phone'];
        }else{
            return redirect()->back()->with('error','Error: This phone number has signed by another account');
        }
        if(isset($req['changeImg']) && $req->hasFile('profie_image')){
            $file = $req->file('profie_image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'webp'){
                return redirect()->back()->with('error','File image must be jpg,png,jpeg,webp');
            }
            $name=$file->getClientOriginalName();
            $num=0;
            $hinh = "user_".$num."_".$name;
            while(file_exists('images/avatar/'.$hinh)){
                $num++;
                $hinh = "user_".$num."_".$name;
            };
            $file->move('images/avatar/',$hinh);
            $user->avatar=$hinh;
        }
        $user->save();
        $news = News::where('link','=','accountsetting')->where('id_user','=',Auth::user()->id_user)->first();
        if($user->password && $user->phone && $news){
            $news->delete();
        };
        return redirect()->back()->with('message','Change profie successfully');
    }
    public function check_password(Request $req){
        $user = User::find(Auth::user()->id_user);
        if (Hash::check($req['current_password'], $user->password)) {
            echo "Accept";
        }else{
            echo "Incorrect password";
        }
    }
    public function post_changepassword(Request $req){
        $user = User::find(Auth::user()->id_user);
        $user->password = bcrypt($req['new_password']);
        $user->save();
        $news = News::where('link','=','accountsetting')->where('id_user','=',Auth::user()->id_user)->first();
        if($user->password && $user->phone && $news){
            $news->delete();
        };
        return redirect()->back()->with('message','Change Password successfully');
    }
    public function get_address(){
        return view('user.pages.About.address');
    }
    public function setdefault_address($id){
        foreach(Auth::user()->Address as $add){
            if($add->id_address != $id && $add->default ){
                $add->default = false;
                $add->save();
            }
        }
        $address = Address::where('id_user','=',Auth::user()->id_user)->where('id_address','=',$id)->first();
        $address->default = true;
        $address->save();
        return redirect()->back()->with('message','Change Default Address successfully');
    }
    public function get_payment(){
        return view('user.pages.About.payment');
    }
    public function get_feedback($code){
        $order = Order::where('order_code','=',$code)->first();
        return view('user.pages.Feedback.index',compact('order'));
    }
    public function post_feedback(Request $req,$code){
        foreach(Cart::where('order_code','=',$code)->get() as $cart){
            $new_commt = new Comment();
            $new_commt->id_user = Auth::user()->id_user;
            $new_commt->id_product = $cart->id_product;
            $new_commt->verified = true;
            $new_commt->rating = intval($req['rating_pro'.$cart->id_cart]);
            $new_commt->context= $req['content_fb'.$cart->id_cart];
            $new_commt->save();
        }
        $news = News::where('link','=','feedback')->where('attr','=',$code)->first();
        $news->delete();
        return redirect('/')->with('feedback_mess','Send feedback successfully');
    }
    public function modal_order($id){
        if(Auth::check() && Auth::user()->admin != "2"){
            echo "Wrong way bro";
        }else{
            $order = Order::find($id);
            $name =[];
            $images =[];
            $order->cart = $order->Cart->toArray();
            foreach($order->Cart as $cart){
                array_push($images,$cart->Product->Library[0]->image);
                array_push($name,$cart->Product->name);          
            };
            $order->image = $images;
            $order->product = $name;
            $order->discount = $order->code_coupon?$order->Coupon->discount: 0;
            $order->coupon_title = $order->code_coupon?$order->Coupon->title: '';
            echo $order;
        }
    }
    public function user_orderdetail($id){
        $order = Order::find($id);
        if($order->id_user == Auth::user()->id_user){
            $name =[];
            $images =[];
            $order->cart = $order->Cart->toArray();
            foreach($order->Cart as $cart){
                array_push($images,$cart->Product->Library[0]->image);
                array_push($name,$cart->Product->name);          
            };
            $order->image = $images;
            $order->product = $name;
            $order->discount = $order->code_coupon?$order->Coupon->discount: 0;
            $order->coupon_title = $order->code_coupon?$order->Coupon->title: '';
            echo $order;
        }
    }
    public function modal_notificate($id){
        if(Auth::check() && Auth::user()->admin == "0" ){
            echo "Wrong way bro";
        }else{
            $code = News::find($id)->link;
            $order = Order::where("order_code",'=',$code)->first();
            $name =[];
            $images =[];
            $order->cart = $order->Cart->toArray();
            foreach($order->Cart as $cart){
                array_push($images,$cart->Product->Library[0]->image);
                array_push($name,$cart->Product->name);          
            };
            $order->image = $images;
            $order->product = $name;
            $order->news = $id;
            $order->discount = $order->code_coupon?$order->Coupon->discount: 0;
            $order->coupon_title = $order->code_coupon?$order->Coupon->title: '';
            echo $order;
        }
    }
    public function post_confirmorder(Request $req){
        $order = Order::find($req['id_order']);
        $order->status = $req['status_order'];
        $order->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $order->save();
        switch($req['status_order']){
            case "finished":
                if($order->id_user == null){
                    foreach($order->Cart as $cart){
                        $comment = new Comment();
                        $comment->id_product = $cart->id_product;
                        $comment->name = "Guest";
                        $comment->verified = true;
                        $comment->rating = 5;
                        $comment->phone = $order->phone;
                        $comment->created_at = Carbon::now()->format('Y-m-d H:i:s');
                        $comment->save();
                    }
                }else{
                    $new = new News();
                    $new->order_code = $order->order_code;
                    $new->title = "How do you think about your order?";
                    $new->id_user = $order->id_user;
                    $new->link = "feedback";
                    $new->attr = $order->order_code;
                    $new->created_at = Carbon::now()->format('Y-m-d H:i:s');
                    $new->save();
                }
            break;
            case "transaction failed":
                foreach($order->Cart as $cart){
                    $product = $cart->Product;
                    $product->quantity += $cart->amount;
                    $product->save();
                    $cart->updated_at = Carbon::now()->format('Y-m-d H:i:s');
                    $cart->save();
                }
            break;
            case "delivery":
                Mail::to($order->email)->send(new OrderShipped($order));
            break;
            default:
        }
        return redirect()->back();
    }
    public function post_removenoti(Request $req){
        if(isset($req['id_notificate'])){
            $new = News::find($req['id_notificate']);
            $new->delete();
        }
        return redirect()->back();
    }
    public function list_allorder(){
        $orders = Order::orderBy('created_at','desc')->paginate(6);
        foreach($orders as $order){
            $sum = 0;
            foreach($order->Cart as $cart){
                $sum += $cart->sale > 0? $cart->price*(1 - $cart->sale/100)*($cart->amount/1000): $cart->price*($cart->amount/1000);
            }
            if($order->Coupon){
                if($order->Coupon->discount <= 100){
                    $sum *= (1-$order->Coupon->discount /100);
                }else{
                    $sum-=$order->Coupon->discount;
                }
            }
            $sum += $order->shipping_fee;
            $order->total = $sum;
        }
        return view('user.pages.About.order',compact('orders'));
    }
    public function denied_order(Request $req){
        $order = Order::find($req['id_order']);
        $phone =$order->phone; 
        $order->phone = "G_".$phone;
        $order->save();
        $list_order = Order::where('id_user','=',null)->where('phone','=',Auth::user()->phone)->get();
        $num = count($list_order);
        echo $num;
    }
    public function accept_order(Request $req){
        $order = Order::find($req['id_order']);
        if($order->status == 'finished'){
            foreach($order->Cart as $cart){
                $cmt = Comment::where('id_product','=',$cart->id_product)->where('id_user','=',null)->where('phone','=',Auth::user()->phone)->first();
                $cmt->name=null;
                $cmt->id_user = Auth::user()->id_user;
                $cmt->phone = null;
                $cmt->save();
            }
        }
        $num=count(Auth::user()->Order);
        $cr_order_code = "USR".Auth::user()->id_user."_".$num;
        foreach($order->Cart as $cart){
            $cart->order_code = $cr_order_code;
            $cart->id_user = Auth::user()->id_user;
            $cart->save();
        }
        $order->order_code = $cr_order_code;
        $order->id_user = Auth::user()->id_user;
        $order->save();
        $list_order = Order::where('id_user','=',null)->where('phone','=',Auth::user()->phone)->get();
        $num = count($list_order);
        echo $num;
    }
    public function get_admin_signin(){
        if(Auth::check() && Auth::user()->admin == '1'){
            Auth::logout();
        }
        return view('admin.pages.Signin.index');
    }
    public function post_admin_signin(Request $req){
        $check = array('email'=>$req['email'],'password'=>$req['password']);
        if(Auth::attempt($check)){
            return redirect('/admin/dashboard');
        }else{
            return redirect()->back()->with('error',"Email or password incorrect");
        }
    }
    public function get_404(){
        return view('user.pages.404Notfound.index');
    }
    public function get_listmessage(Request $req){
        if($req['codegroup'] && $req['codegroup'] != "new" ){
            $get_gr = Groupmessage::where('code_group','=',$req['codegroup'])->first();
            if(Auth::user()->admin == 0){
                $user = $get_gr->Admin;
            }else{
                $user = $get_gr->User;
            }
            $group = Message::where('code_group','=',$req['codegroup'])->get();
        }else{
            $user = User::find($req['id_user']);
            $group = Message::where('id_user','=',$req['id_user'])->where('code_group','=',null)->get();
        };
        $html="";
        foreach($group as $chat){
            $date_mess = Carbon::parse($chat->created_at);
            $date_cur = Carbon::now();
            $time= $date_cur->diffInDays($date_mess)>1 ? $date_cur->diffInDays($date_mess)." days ago": (($date_cur->diffInDays($date_mess) == 0)? ($date_cur->diffInHours($date_mess)> 0? $date_cur->diffInHours($date_mess).' hours before': $date_cur->diffInMinutes($date_mess). " minutes ago"): $date_cur->diffInDays($date_mess)." day ago");
            $html .= "<div class='row mb-4 mx-3'>";
            if($chat->id_user != Auth::user()->id_user){
                $html.= "<div class='col-1 me-3 rounded-circle border text-center p-1' style='width:40px;height: 40px'>";
                $html.= $chat->User->avatar?"<img src='images/avatar/".$chat->User->avatar."' class='img-fluid h-100 rounded-circle' style='object-fit: cover'>":"<img src='images/avatar/user.png' class='img-fluid h-100 rounded-circle' style='object-fit: cover'>";
                $html.="</div><div class='col-8'><span>".$chat->User->name."</span>";
                if($chat->message !=null){
                    $html.="<div class='text-wrap rounded-1 border py-1 px-2 bg-light'>";
                    $html.= $chat->message;
                }else if($chat->link != null){
                    $html .= "<div>";
                    $product = Product::find(intval($chat->link));
                    if(!$product){
                        $html.= "Not found product";
                    }else{
                        $src_image = count($product->Library)>0?"images/products/".$product->Library[0]->image: "images/category/".$product->TypeProduct->image; 
                        $share_link = "<div class='card my-3'><a href='".route('products-details',$product->id_product)."'>
                        <div class='row g-0'>
                          <div class='col-4'>
                          <img src='$src_image' class='img-fluid rounded-start' >
                          </div>
                        <div class='col-8'>
                          <div class='card-body'>
                          <h5 class='card-title text-uppercase'>".$product->name."</h5>
                          <p class='card-text'>View >> </p>
                        </div></div></div></a></div>";
                        $html.=    $share_link;
                    };
                };
                if(!$chat->status){
                    $chat->status = true;
                    $chat->save();
                };
                $html.="</div><span class='text-black-50'>".$time."</span></div>";
            }else{
                $html.= "<div class='col-2 mx-auto'></div>";
                if($chat->message !=null){
                $html.="<div class='col-auto  text-wrap rounded-1 border py-1 px-2 bg-light'>";
                    $html.= $chat->message;
                }else{
                    $html.="<div class='col-10 rounded-1 border py-1 px-2'>";
                    $product = Product::find(intval($chat->link));
                    if(!$product){
                        $html.= "Not found product";
                    }else{
                        $src_image = count($product->Library)>0?"images/products/".$product->Library[0]->image: "images/category/".$product->TypeProduct->image; 
                        $share_link = "<div class='card my-3' ><a href='".route('products-details',$product->id_product)."'>
                        <div class='row g-0'>
                          <div class='col-4'>
                          <img src='$src_image' class='img-fluid rounded-start' >
                          </div>
                        <div class='col-8'>
                          <div class='card-body'>
                          <h5 class='card-title text-uppercase'>".$product->name."</h5>
                          <p class='card-text'>View >> </p>
                        </div></div></div></a></div>";
                        $html.=$share_link;
                    }
                }
                $html.="</div>";
            }
            $html.= "</div>";
        };
        if(Auth::user()->admin != '0'){
            $all_group = Groupmessage::where('id_admin','=',Auth::user()->id_user)->get();
            $unread_mess = 0;
            foreach ($all_group as $gr){
                $last_mess = $gr->Message->last();
                if(($last_mess->id_user != Auth::user()->id_user) && (!$last_mess->status)){
                    $unread_mess++;
                }
            }
            $unread_mess += count(Message::whereNull('code_group')->get());
        }else{
            $all_group = Groupmessage::where('id_user','=',Auth::user()->id_user)->get();
            $unread_mess = 0;
            foreach ($all_group as $gr){
                $last_mess = $gr->Message->last();
                if(($last_mess->id_user != Auth::user()->id_user) && (!$last_mess->status)){
                    $unread_mess++;
                }
            }
        }
        $data = [
            'mess' => $html,
            'name'=> $user->name,
            'unread_mess' => $unread_mess
        ];
        echo implode(',',$data);
    }
    public function postajax_message(Request $req){
        $new_message = new Message();
        $code = $req['code_group'];
        if($code == "new"){
            $code = null;
        }else if($code == null){
            $code = "UCT".$req['connect_user'].Auth::user()->id_user;
            $group_exist = Groupmessage::where('code_group','=',$code)->first();
            if(!$group_exist){
                $new_gr = new Groupmessage();
                $new_gr->code_group = $code;
                $new_gr->id_user = $req['connect_user'];
                $new_gr->id_admin = Auth::user()->id_user;
                $new_gr->save();
            }
            foreach(Message::where('code_group','=',null)->where('id_user','=',$req['connect_user'])->get() as $mess){
                $mess->code_group = $code;
                $mess->status = true;
                $mess->save();
            };
        };
        if(isset($req['send_link'])){
            $product_share =Product::find(intval($req['send_link'])); 
            $new_message->link = $product_share->id_product;
        }else{
            $new_message->link = null;
        }
        $new_message->code_group = $code;
        $new_message->id_user = Auth::user()->id_user;
        $new_message->message = isset($req['send_message'])?$req['send_message']: null;
        $new_message->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $new_message->save();
        if(isset($req['send_link'])){
            $product_share =Product::find(intval($req['send_link'])); 
            $new_message->share_link = route('products-details',$product_share->id_product);
            $new_message->name_product =$product_share->name;
            $new_message->image = count($product_share->Library)>0?"images/products/". $product_share->Library[0]->image:"images/category/". $product_share->TypeProduct->image;
        }
        $unread_mess = 0;
        if(Auth::user()->admin != '0'){
            $all_group = Groupmessage::where('id_admin','=',Auth::user()->id_user)->get();
            foreach ($all_group as $gr){
                $last_mess = $gr->Message->last();
                if(($last_mess->id_user != Auth::user()->id_user) && (!$last_mess->status)){
                    $unread_mess++;
                }
            }
            $unread_mess += count(Message::whereNull('code_group')->get());
        }else{
            $all_group = Groupmessage::where('id_user','=',Auth::user()->id_user)->get();
            foreach ($all_group as $gr){
                $last_mess = $gr->Message->last();
                if(($last_mess->id_user != Auth::user()->id_user) && (!$last_mess->status)){
                    $unread_mess++;
                }
            }
        }
        $new_message->unread_mess = $unread_mess;
        echo $new_message;
    }
    public function remove_allnews(){
        if(Auth::check() && Auth::user()->admin == '0'){
            $news = News::where('send_admin', '=', false)->where(function (Builder $query) {
                $query->where('id_user', '=', Auth::user()->id_user)
                      ->orWhere('id_user', '=', null);
                        })->get();
            foreach($news as $new){
                if($new->link !='feedback'){
                    $new->delete();
                }
            };
        }else{
            $news = News::where('send_admin', '=', true)->get();
            foreach($news as $new){
                $new->delete();
            }
        }
        return redirect()->back();
    }
    public function model_coupon($code){
        $coupon = Coupon::where('code','=',$code)->where('status',true)->first();
        if($coupon){
            echo $coupon;
        }else{
            echo '';
        };
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
        $user->password = bcrypt($req['new_password']);
        $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->save();
        $find_email = ResetPassword::find($req['account_email'])->first();
        $find_email->delete();
        return redirect('/signin')->with('message_reset','Reset Password successfully. Now you can signin');
    }
}