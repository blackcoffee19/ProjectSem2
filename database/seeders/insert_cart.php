<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class insert_cart extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carts =[
            ["order_code"=>"USR2_0","id_user"=>2,"id_product"=>10,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/03/2023 00:00:00')],
            ["order_code"=>"USR2_0","id_user"=>2,"id_product"=>4,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/03/2023 00:00:00')],
            ["order_code"=>"USR2_0","id_user"=>2,"id_product"=>1,'amount'=>100,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/03/2023 00:00:00')],
            ["order_code"=>"USR2_0","id_user"=>2,"id_product"=>3,'amount'=>100,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/03/2023 00:00:00')],
            ["order_code"=>"USR2_1","id_user"=>2,"id_product"=>2,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','09/04/2023 00:00:00')],
            ["order_code"=>"USR2_1","id_user"=>2,"id_product"=>5,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','09/04/2023 00:00:00')],
            ["order_code"=>"USR2_2","id_user"=>2,"id_product"=>11,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/04/2023 00:00:00')],
        ];
        try {
            foreach ($carts as $cart) {
                DB::table('cart')->insert($cart);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
