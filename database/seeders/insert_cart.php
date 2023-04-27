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
            ["order_code"=>"USR2_0","id_user"=>2,"id_product"=>10,'price'=>32000,'sale'=>0,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/03/2023 00:00:00')],
            ["order_code"=>"USR2_0","id_user"=>2,"id_product"=>4,'price'=>17000,'sale'=>0,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/03/2023 00:00:00')],
            ["order_code"=>"USR2_0","id_user"=>2,"id_product"=>1,'price'=>15000,'sale'=>10,'amount'=>100,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/03/2023 00:00:00')],
            ["order_code"=>"USR2_0","id_user"=>2,"id_product"=>3,'price'=>18000,'sale'=>12,'amount'=>100,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/03/2023 00:00:00')],
            ["order_code"=>"USR2_1","id_user"=>2,"id_product"=>12,'price'=>20000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','09/04/2023 00:00:00')],
            ["order_code"=>"USR2_1","id_user"=>2,"id_product"=>25,'price'=>29000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','09/04/2023 00:00:00')],
            ["order_code"=>"USR2_2","id_user"=>2,"id_product"=>21,'price'=>250000,'sale'=>20,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/04/2023 00:00:00')],
            ["order_code"=>"USR2_3","id_user"=>2,"id_product"=>15,'price'=>40000,'sale'=>0,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/04/2023 00:00:00')],
            ["order_code"=>"USR2_3","id_user"=>2,"id_product"=>16,'price'=>223000,'sale'=>20,'amount'=>240,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/04/2023 00:00:00')],
            ["order_code"=>"USR2_3","id_user"=>2,"id_product"=>13,'price'=>28600,'sale'=>20,'amount'=>340,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/04/2023 00:00:00')],
            ["order_code"=>"USR3_0","id_user"=>3,"id_product"=>9,'price'=>8000,'sale'=>0,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/04/2023 00:00:00')],
            ["order_code"=>"USR3_0","id_user"=>3,"id_product"=>10,'price'=>28000,'sale'=>10,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/04/2023 00:00:00')],
            ["order_code"=>"USR3_0","id_user"=>3,"id_product"=>8,'price'=>9000,'sale'=>0,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/04/2023 00:00:00')],
            ["order_code"=>"USR3_0","id_user"=>3,"id_product"=>27,'price'=>190000,'sale'=>10,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/04/2023 00:00:00')],
            ["order_code"=>"USR3_1","id_user"=>3,"id_product"=>26,'price'=>300000,'sale'=>10,'amount'=>100,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','16/04/2023 00:00:00')],
            ["order_code"=>"USR3_1","id_user"=>3,"id_product"=>4,'price'=>15000,'sale'=>20,'amount'=>160,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','16/04/2023 00:00:00')],
            ["order_code"=>"USR3_2","id_user"=>3,"id_product"=>14,'price'=>32000,'sale'=>20,'amount'=>160,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/04/2023  11:00:00')],
            ["order_code"=>"USR3_2","id_user"=>3,"id_product"=>9,'price'=>9000,'sale'=>0,'amount'=>460,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/04/2023  11:00:00')],
            ["order_code"=>"USR3_2","id_user"=>3,"id_product"=>10,'price'=>27000,'sale'=>0,'amount'=>460,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/04/2023  11:00:00')],
            ["order_code"=>"USR3_3","id_user"=>3,"id_product"=>26,'price'=>320000,'sale'=>0,'amount'=>440,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/04/2023 00:00:00')],
            ["order_code"=>"USR3_3","id_user"=>3,"id_product"=>22,'price'=>370000,'sale'=>20,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/04/2023 00:00:00')],
            ["order_code"=>"USR3_3","id_user"=>3,"id_product"=>11,'price'=>17000,'sale'=>10,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/04/2023 00:00:00')],
            ["order_code"=>"USR3_4","id_user"=>3,"id_product"=>12,'price'=>20000,'sale'=>40,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/04/2023 00:00:00')],
            ["order_code"=>"USR3_4","id_user"=>3,"id_product"=>28,'price'=>210000,'sale'=>0,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/04/2023 00:00:00')],
            ["order_code"=>"USR3_4","id_user"=>3,"id_product"=>30,'price'=>500000,'sale'=>10,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/04/2023 00:00:00')],
            ["order_code"=>"USR3_4","id_user"=>3,"id_product"=>24,'price'=>42000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/04/2023 00:00:00')],
            ["order_code"=>"GUT_0","id_product"=>20,'price'=>32000,'sale'=>10,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/03/2023 00:00:00')],
            ["order_code"=>"GUT_0","id_product"=>17,'price'=>45000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/03/2023 00:00:00')],
            ["order_code"=>"GUT_1","id_product"=>11,'price'=>14000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/04/2023 00:00:00')],
            ["order_code"=>"GUT_1","id_product"=>23,'price'=>29000,'sale'=>10,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/04/2023 00:00:00')],
            ["order_code"=>"GUT_1","id_product"=>19,'price'=>18000,'sale'=>0,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/04/2023 00:00:00')],
            ["order_code"=>"GUT_2","id_product"=>16,'price'=>230000,'sale'=>10,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/04/2023 00:00:00')],
            ["order_code"=>"GUT_2","id_product"=>22,'price'=>390000,'sale'=>10,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/04/2023 00:00:00')],
            ["order_code"=>"GUT_2","id_product"=>21,'price'=>260000,'sale'=>10,'amount'=>340,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/04/2023 00:00:00')],
            ["order_code"=>"GUT_2","id_product"=>13,'price'=>28000,'sale'=>10,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/04/2023 00:00:00')],
            ["order_code"=>"GUT_3","id_product"=>15,'price'=>42000,'sale'=>20,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/04/2023 00:00:00')],
            ["order_code"=>"GUT_3","id_product"=>13,'price'=>29000,'sale'=>30,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/04/2023 00:00:00')],
            ["order_code"=>"GUT_4","id_product"=>12,'price'=>18000,'sale'=>0,'amount'=>540,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','21/04/2023 00:00:00')],
            ["order_code"=>"GUT_4","id_product"=>11,'price'=>20000,'sale'=>0,'amount'=>540,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','21/04/2023 00:00:00')],
            ["order_code"=>"GUT_5","id_product"=>18,'price'=>21000,'sale'=>10,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/04/2023 00:00:00')],
            ["order_code"=>"GUT_5","id_product"=>1,'price'=>12000,'sale'=>0,'amount'=>140,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/04/2023 00:00:00')],
            ["order_code"=>"GUT_5","id_product"=>17,'price'=>49000,'sale'=>0,'amount'=>540,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/04/2023 00:00:00')],
            ["order_code"=>"GUT_6","id_product"=>12,'price'=>18000,'sale'=>10,'amount'=>340,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/04/2023 00:00:00')],
            ["order_code"=>"GUT_6","id_product"=>1,'price'=>12000,'sale'=>10,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/04/2023 00:00:00')],
            ["order_code"=>"GUT_6","id_product"=>21,'price'=>250000,'sale'=>0,'amount'=>360,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/04/2023 00:00:00')],
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
