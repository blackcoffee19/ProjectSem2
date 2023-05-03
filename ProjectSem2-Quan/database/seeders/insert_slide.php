<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class insert_slide extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slides= [
            ['image'=>"slide-1.jpg",'title'=>"SuperMarket For Fresh Grocery",'title_color'=>'#000000','content'=>'Introduced a new model for online grocery shopping and convenient home delivery.','content_color'=>'#5C6C75','link'=>"allProduct",'btn_content'=>"Shop Now",'alert'=>"Opening Sale Discount 50%",'alert_color'=>'#000000','alert_bg'=>"#FFC107",'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['image'=>"slider-2.jpg",'title'=>"Free Shipping",'title_color'=>'#000000','content'=>'Free Shipping to First-Time Customers Only, After promotions and discounts are applied.','content_color'=>'#5C6C75','link'=>"signup",'btn_content'=>"Sign Up",'alert'=>"Free Shipping For New Member",'alert_color'=>'#000000','alert_bg'=>"#FFC107",'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
        ];
        try {
            foreach($slides as $sl){
                DB::table('slide')->insert($sl);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
