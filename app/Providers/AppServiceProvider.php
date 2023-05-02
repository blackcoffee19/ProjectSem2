<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Route;
use App\Models\Groupmessage;
use App\Models\Library;
use App\Models\Message;
use App\Models\News;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        view()->composer('user.partials.header',function($view){
            if(Auth::check()){
                if(Auth::user()->admin == "0"){
                    $news = News::where('send_admin', '=', false)->where(function (Builder $query) {
                                                                            $query->where('id_user', '=', Auth::user()->id_user)
                                                                                  ->orWhere('id_user', '=', null);
                                                                        })->get();
                    foreach($news as $new){
                        switch($new->link){
                            case "products-details":
                                $new->image =Library::where('id_product','=',intval($new->attr))->first()->image;
                            break;
                            default:
                                $new->image = "feedback.png";
                        };
                    }
                    $view->with('news',$news);
                }else{
                    $news = News::where('send_admin', '=', true)->get();
                    foreach($news as $new){
                        $new->image = isset($new->User->avatar)? $new->User->avatar: "user.png";
                    }
                    $view->with('news',$news);
                }
                if(Auth::user()->admin == '2'){
                    $orders = Order::where('status','=','unconfirmed')->orWhere('status','=','confirmed')->orWhere('status','=','delivery')->orderBy('status','desc')->get();
                    $view->with('orders',$orders);
                }
            }
	    });
        view()->composer('user.partials.modal-fade',function($view){
            if(Auth::check()){
                $setting_mess = News::where('link','=','accountsetting')->where('id_user','=',Auth::user()->id_user)->first();
                $view->with('warning_setting',$setting_mess);
            };
        });
        view()->composer('admin.partials.header',function($view){
            if(Auth::check() && Auth::user()->admin == '1'){
                $notificates = News::where('send_admin','=',true)->get();
                foreach($notificates as $new){
                    $new->image = isset($new->User->avatar)? $new->User->avatar: "user.png";
                }
                $view->with('notificates',$notificates);
            };
        });
        view()->composer(['user.partials.message'],function($view){
            if(Auth::check()){
                if(Auth::user()->admin == '0'){
                    $groups = Groupmessage::where('id_user','=',Auth::user()->id_user)->get();
                    // GET MESSAGES THAT ADMIN STILL NOT REPLY 
                    $messages_to_admin = Message::where('code_group','=',null)->where('id_user','=',Auth::user()->id_user)->get();
                    $view->with('groups',$groups);
                    $view->with('messages_to_admin',$messages_to_admin);
                }else{
                    $groups = Groupmessage::where('id_admin','=',Auth::user()->id_user)->get();
                    // GET ALL USER MESSAGE TO ADMIN THAT STILL NOT REPLY 
                    $user_mess=  User::whereIn('id_user',Message::select('id_user')->where('code_group','=',null)->distinct()->get())->get();
                    $view->with('groups',$groups);
                    $view->with('user_message',$user_mess);
                }
            }
        });
    }
}
