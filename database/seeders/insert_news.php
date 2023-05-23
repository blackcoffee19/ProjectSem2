<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
class insert_news extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = [
            ["order_code"=>'USR3_17','id_user'=>3,"title"=>"How do you think about your order?","link"=>"feedback","attr"=>"USR3_17",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '14/05/2023 00:00:00')],
            ["order_code"=>'USR6_25','id_user'=>6,"title"=>"How do you think about your order?","link"=>"feedback","attr"=>"USR6_25",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '12/05/2023 00:00:00')],
            ["order_code"=>'USR5_28','id_user'=>5,"title"=>"How do you think about your order?","link"=>"feedback","attr"=>"USR5_28",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '12/05/2023 00:00:00')],
            ["order_code"=>'USR4_28','id_user'=>4,"title"=>"How do you think about your order?","link"=>"feedback","attr"=>"USR4_28",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '11/05/2023 00:00:00')],
            ["order_code"=>'USR2_6','id_user'=>2,"title"=>"How do you think about your order?","link"=>"feedback","attr"=>"USR2_6",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '14/05/2023 00:00:00')],
            
	    	["order_code"=>'USR3_18','id_user'=>3,'send_admin'=>true,"title"=>"Order Cancel","link"=>"USR3_18",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '18/04/2023 11:00:00')],
            ["order_code"=>'GUT_43','send_admin'=>true,"title"=>"Order Transaction Failed","link"=>"GUT_43",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '29/04/2023 00:00:00')],
            ["title"=>"New Product",'link'=>"products-details","attr"=>"30",'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ["title"=>"We have a gift for you",'link'=>"show_coupon","attr"=>"MAYBE",'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ["title"=>"We have a gift for you",'link'=>"show_coupon","attr"=>"NEWMEM",'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
        ];
        try {
            foreach ($news as $new) {
                DB::table('news')->insert($new);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
