<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Library;
use App\Models\Banner;
use App\Models\Favourite;
use App\Models\Cart;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class MyController extends Controller
{
    public function home_page(){
        $products = Product::where('quantity','>',0)->inRandomOrder()->limit(10)->get();
        $product_hot = Product::where('quantity','>',0)->where('sale','>',0)->inRandomOrder()->limit(3)->get();
        $banner = Banner::all();
        return view('user.index',compact('products','product_hot','banner'));
    }
    public function product_detail($id){
        $product = Product::find($id);
        return view('user.pages.ProductDetails.index',compact('product'));
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
        $price = $product->price;
        $name = $product->name;
        $imgPro = $product->Library[0]->image;
        if(Auth::check()){
            $foundPro = Auth::user()->Cart->where('id_product','=',$req["id_pro"])->where('order_code','=',null)->first();
            if($foundPro){
                if($foundPro->amount == $foundPro->Product->quantity){
                    return redirect()->back()->with(["warning"=>"Add to cart failue! You got maximum"]);
                }else{
                    $sum_quant = intval($req["quan"])+ $foundPro->amount; 
                    if($sum_quant > $maxQuan){
                        $sum_quant = $maxQuan;
                    };
                    $foundPro->amount  = $sum_quant;
                    $foundPro->save();
                }
            }else{
                $cart = new Cart();
                $cart->id_user = Auth::user()->id_user;
                $cart->order_code = null;
                $cart->id_product = $req->id_pro;
                $cart->amount = $maxQuan < intval($req["quan"])?$maxQuan:intval($req["quan"]);
                $cart->created_at = Carbon::now()->format('Y-m-d H:i:s');
                $cart->save();
            }
        }else if(Session::has("cart")){
            $check = true;
            $arr_cart = Session::get("cart");
            $arr_new = [];
            foreach($arr_cart as $key => $value){
                if($value["id_product"] == $req["id_pro"]){
                    $addQuan = ($value["amount"]+intval($req["quan"])) > $maxQuan ? $maxQuan : $value["amount"]+intval($req["quan"]);
                    array_push($arr_new,["id_product" => $value["id_product"],"amount"=>$addQuan,"per_price"=>$value["per_price"],"name"=>$value["name"],"max"=>$value["max"],"image"=>$imgPro]);
                    $check = false;
                }else{
                    array_push($arr_new,$value);
                }
            }
            if($check){
                $new = ["id_product"=>$req["id_pro"],"amount"=>intval($req["quan"]),"per_price"=>$price,"name"=>$name,"max"=>$maxQuan,"image"=>$imgPro];
                Session::push("cart",$new);
            }else{
                Session::put("cart",$arr_new);
            }
        }else{
            $addQuan = intval($req["quan"]) > $maxQuan ? $maxQuan : intval($req["quan"]);
            $cart_session = ["id_product"=>$req["id_pro"],"amount"=>$addQuan,"per_price"=>$price,"name"=>$name,"max"=>$maxQuan,"image"=>$imgPro];
            Session::push("cart",$cart_session);
        };
        return redirect()->back()->with(["message"=>"Add to cart successfull"]);
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
                    array_push($arr_new,["id_product" => $value["id_product"],"amount"=>$addQuan,"per_price"=>$value["per_price"],"name"=>$value["name"],"max"=>$value["max"],"image"=>$value["image"]]);
                    $check = false;
                }else{
                    array_push($arr_new,$value);
                }
            }
            if($check){
                $new = ["id_product"=>$id,"amount"=>100,"per_price"=>$product->price,"name"=>$product->name,"max"=>$product->quantity,"image"=>$product->Library[0]->image];
                $num = count($arr_cart)+1;
                array_push($arr_new,$new);
                Session::put("cart",$arr_new);
            }else{
                $num = count($arr_cart);
                Session::put("cart",$arr_new);
            }
        }else{
            $num+=1;
            $cart_session = ["id_product"=>$id,"amount"=>100,"per_price"=>$product->price,"name"=>$product->name,"max"=>$product->quantity,"image"=>$product->Library[0]->image];
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
                        array_push($new_session,["id_product"=>$session_cart[$i]["id_product"],"amount"=>$minus,"per_price"=>$session_cart[$i]["per_price"],"name"=>$session_cart[$i]["name"],"max"=>$session_cart[$i]["max"],"image"=>$session_cart[$i]["image"]]);
                    }
                }else{
                    array_push($new_session,["id_product"=>$session_cart[$i]["id_product"],"amount"=>$session_cart[$i]["amount"],"per_price"=>$session_cart[$i]["per_price"],"name"=>$session_cart[$i]["name"],"max"=>$session_cart[$i]["max"],"image"=>$session_cart[$i]["image"]]);
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
                    array_push($new_session,["id_product"=>$session_cart[$i]["id_product"],"amount"=>$addOne,"per_price"=>$session_cart[$i]["per_price"],"name"=>$session_cart[$i]["name"],"max"=>$session_cart[$i]["max"],"image"=>$session_cart[$i]["image"]]);
                }else{
                    array_push($new_session,["id_product"=>$session_cart[$i]["id_product"],"amount"=>$session_cart[$i]["amount"],"per_price"=>$session_cart[$i]["per_price"],"name"=>$session_cart[$i]["name"],"max"=>$session_cart[$i]["max"],"image"=>$session_cart[$i]["image"]]);
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
                            <img src='assets/images/products/".$cart->Product->Library[0]->image."' alt='".$cart->Product->name."' class='img-fluid' style='width: 200px'></div>
                        <div class='col-4 col-md-6 col-lg-5'>
                            <a href='' class='text-inherit'>
                            <h6 class='mb-0'>".$cart->Product->name."</h6>
                            </a>
                            <span><small class='text-muted'>".$cart->Product->TypeProduct->type."</small></span>
                            <div class='mt-2 small lh-1'> 
                                <a href='".route('removeId',$cart->id_cart)."' class='text-decoration-none text-inherit'> 
                                   <span class='text-muted'>Remove</span>
                                </a>
                            </div>
                        </div>
                        <div class='col-3 col-md-3 col-lg-3 '>
                        <form method='POST' action='".route('cartadd',$cart->id_cart)."' class='d-flex flex-column'>
                        <input type='hidden' name='_token' value=''>
                            <div class='input-group input-spinner input-group-sm'>
                                <a href='".route('minus',[$cart->id_cart])."' class='text-decoration-none btn'>
                                <i class='fa-solid fa-minus text-danger'></i>
                                </a>
                                <input type='text' value='$cart->amount' name='cart_quant'  class='form-control form-input'  >";
                    if ($cart->amount < $cart->Product->quantity){
                        $html_list.="<a href='".route('addmore',[$cart->id_cart])."' class='text-decoration-none btn' >
                        <i class='fa-solid fa-plus text-danger'></i>
                        </a>";
        
                    }else{
                        $html_list.="<a class='disabled btn border-0'><i class='fa-solid fa-plus'></i></a>";
                    };
                    $html_list.="</div></form></div><div class='col-2 text-lg-end text-start text-md-end col-md-2'>";
                    if($cart->Product->sale > 0 ){
                        $sum += $cart->Product->price/100 *(1- ($cart->Product->sale /100)) * $cart->amount;
                        $html_list.= "<span class='fw-bold text-danger fs-5'>$". $cart->Product->price * (1-$cart->Product->sale/100) * $cart->amount."</span><span class='text-decoration-line-through ms-1'>".$cart->Product->price * $cart->amount."</span></div></div></li>";
                    }else{
                        $sum += $cart->Product->price/100 * $cart->amount;
                        $html_list.= "<span class='fw-bold'>$".$cart->Product->price * $cart->amount."</span></div></div></li>"; 
                    }
                };
                $html_list .="<li class='list-group-item py-3 ps-0 border-top border-bottom'><div class='text-black-50 text-end'><h4>Total: <span class='h4 text-danger'>$".$sum."</span></h4></div></li>";
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
                    <img src='assets/images/products/".$cart["image"]."' alt='".$cart["name"]."' class='img-fluid' style='width: 200px'></div>
                        <div class='col-4 col-md-6 col-lg-5'>
                        <a href='' class='text-inherit'>
                        <h6 class='mb-0'>".$cart['name']."</h6>
                            </a>
                            <span><small class='text-muted'>".Product::find($cart["id_product"])->TypeProduct->type."</small></span>
                            <div class='mt-2 small lh-1'> 
                            <a href='".route('removeId',$key)."' class='text-decoration-none text-inherit'> 
                               <span class='text-muted'>Remove</span>
                               </a>
                            </div>
                            </div>
                        <div class='col-3 col-md-2 col-lg-3'>
                            <div class='input-group input-spinner input-group-sm'>
                            <a href='".route('minus',[$key])."' class='text-decoration-none btn'>
                            <i class='fa-solid fa-minus text-danger'></i>
                            </a>
                            <input type='text' value='".$cart["amount"]."' name='quantity' class='form-control form-input' readonly>
                            ";
                            if ($cart["amount"] < $cart['max']){
                        $html_list.="<a href='".route('addmore',[$key])."' class='text-decoration-none btn' >
                        <i class='fa-solid fa-plus text-danger'></i>
                        </a>";
                        
                    }else{
                        $html_list.="<a class='disabled btn border-0'><i class='fa-solid fa-plus'></i></a>";
                    };
                    $html_list.="</div></div><div class='col-2 text-lg-end text-start text-md-end col-md-2'>";
                    if(Product::find($cart["id_product"])->sale> 0 ){
                        $sum += intval($cart["per_price"])*(1-Product::find($cart["id_product"])->sale/100) * intval($cart["amount"])/1000;
                        $html_list.= "<span class='fw-bold text-danger fs-5'>$". intval($cart['per_price'])*(1- (Product::find($cart["id_product"])->sale /100))." /1kg</span></div></div></li>";
                    }else{
                        $sum += intval($cart["per_price"]) * intval($cart["amount"])/1000;
                        $html_list.= "<span class='fw-bold'>$".$cart['per_price']." /1kg</span></div></div></li>"; 
                    }
                };
                $html_list .="<li class='list-group-item py-3 ps-0 border-top border-bottom'><div class='text-black-50 text-end'><h4>Total: <span class='h4 text-danger'>$".$sum."</span></h4></div></li>";
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
        $html_list="";
        if(Auth::check()){
            $current_cart =  Cart::where('id_user','=',Auth::user()->id_user)->where('order_code','=',null)->get();
            foreach($current_cart as $cart){
                $cart->delete();
            }
        }else if(Session::has('cart')){
            Session::forget("cart");
        }
        $html_list .= "<li class='list-group-item py-3 ps-0 border-top border-bottom'><div class='text-black-50 text-center'>Cart is emty</div></li>";
        echo $html_list;
    }
    public function cartadd_quan(Request $req, $id){
        $req->validate([
            'cart_quant' =>"required|numeric"
        ],[]);
        $cart = Cart::find($id);
        if(intval($req['cart_quant']) == 0){
            $cart->delete();
        }else{
            $cart->amount = $req['cart_quant'] > $cart->Product->quantity?$cart->Product->quantity:$req['cart_quant'] ;
            $cart->save();
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
        $product->rating = $rating;
        $product->sold = count($product->Comment->where('rating','!=',null));
        if(Session::has('compare')){
            if(count(Session::get('compare'))<=2){
                Session::push('compare',$product);
            }
            $msg.="Add (".count(Session::get('compare'))."/3) Product to compare";
        }else{
            $msg.="Add (1/3) Product to compare";
            Session::put('compare',[$product]);
        }
        echo $msg;
    }
    public function showCompare(){
        $cmp = "";
        $info = ["Image","Name","Type","Quantity","Status","Description","Rating","Sold","Price"];
        for($i =0; $i<count($info);$i++){
            $cmp.="<tr><td>".$info[$i]."</td>";
            foreach(Session::get('compare') as $key=> $product){
                switch($i){
                    case 0: 
                        $cmp.="<td><img src='assets/images/products/$product->image' width='160' class='img-fluid' style='object-fit:cover'/></td>";
                        break;
                    case 1:
                        $cmp.="<td class='text-dark'>$product->name</td>";
                        break;
                    case 2: 
                        $prod = Product::find($product['id_product']);
                        $cmp.="<td class='text-dark'>".$prod->TypeProduct->type."</td>";
                        break;
                    case 3:
                        $cmp .= "<td class='text-dark'>".$product->quantity."</td>";
                        break;
                    case 4:
                        $status = $product->status? "In Stock": "Out Stock";
                        $cmp .="<td class='text-dark'>".$status."</td>";
                        break;
                    case 5:
                        $cmp .= "<td class='text-dark'>".$product->description."</td>";
                        break;
                    case 6:
                        $cmp.="<td>";
                        for($j =0; $j<$product->rating;$j++){
                            $cmp.="<i class='bi bi-star-fill text-warning fs-5'></i>";
                        }
                        for($j = 0; $j < 5-$product->rating;$j++){
                            $cmp.="<i class='bi bi-star text-warning fs-5'></i>";
                        };
                        $cmp.="</td>";
                        break;
                    case 7:
                        $cmp .= "<td class='text-dark'>".$product->sold."</td>";
                        break;
                    case 8:
                        if($product->sale>0){
                            $cmp .= "<td><span class='fs-4 text-danger'>$".($product->price * (1-$product->sale/100))."</span>";
                            $cmp.="<span class='text-muted ms-1'>(Off ".$product->sale."%)</span></td>";
                        }else{
                            $cmp.="<td><span class='fs-4 text-black'>$".$product->price."</span></td>";
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
}
