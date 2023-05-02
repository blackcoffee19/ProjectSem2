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
            ["order_code"=>"USR2_0","id_user"=>2,"id_product"=>10,'price'=>29000,'sale'=>0,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/02/2022 00:00:00')],
            ["order_code"=>"USR2_0","id_user"=>2,"id_product"=>4,'price'=>17000,'sale'=>0,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/02/2022 00:00:00')],
            ["order_code"=>"USR2_0","id_user"=>2,"id_product"=>1,'price'=>14000,'sale'=>10,'amount'=>100,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/02/2022 00:00:00')],
            ["order_code"=>"USR2_0","id_user"=>2,"id_product"=>3,'price'=>18000,'sale'=>12,'amount'=>100,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/02/2022 00:00:00')],
            
            ["order_code"=>"USR2_1","id_user"=>2,"id_product"=>12,'price'=>20000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','09/06/2022 00:00:00')],
            ["order_code"=>"USR2_1","id_user"=>2,"id_product"=>25,'price'=>29000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','09/06/2022 00:00:00')],

            ["order_code"=>"USR2_2","id_user"=>2,"id_product"=>21,'price'=>250000,'sale'=>20,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/07/2022 00:00:00')],
            
            ["order_code"=>"USR2_3","id_user"=>2,"id_product"=>15,'price'=>45000,'sale'=>0,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/07/2022 00:00:00')],
            ["order_code"=>"USR2_3","id_user"=>2,"id_product"=>16,'price'=>223000,'sale'=>20,'amount'=>240,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/07/2022 00:00:00')],
            ["order_code"=>"USR2_3","id_user"=>2,"id_product"=>13,'price'=>31000,'sale'=>20,'amount'=>340,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/07/2022 00:00:00')],

            ["order_code"=>"USR2_4","id_user"=>2,"id_product"=>17,'price'=>30000,'sale'=>0,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','27/04/2023 02:00:00')],
            ["order_code"=>"USR2_4","id_user"=>2,"id_product"=>19,'price'=>44000,'sale'=>20,'amount'=>240,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','27/04/2023 02:00:00')],
            ["order_code"=>"USR2_4","id_user"=>2,"id_product"=>23,'price'=>32000,'sale'=>20,'amount'=>340,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','27/04/2023 02:00:00')],

            ["order_code"=>"USR2_5","id_user"=>2,"id_product"=>28,'price'=>220000,'sale'=>0,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 02:00:00')],
            ["order_code"=>"USR2_5","id_user"=>2,"id_product"=>26,'price'=>330000,'sale'=>1,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 02:00:00')],
            ["order_code"=>"USR2_5","id_user"=>2,"id_product"=>2,'price'=>10000,'sale'=>20,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 02:00:00')],
            
            ["order_code"=>"USR3_0","id_user"=>3,"id_product"=>9,'price'=>10000,'sale'=>0,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/08/2022 00:00:00')],
            ["order_code"=>"USR3_0","id_user"=>3,"id_product"=>10,'price'=>30000,'sale'=>10,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/08/2022 00:00:00')],
            ["order_code"=>"USR3_0","id_user"=>3,"id_product"=>8,'price'=>9000,'sale'=>0,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/08/2022 00:00:00')],
            ["order_code"=>"USR3_0","id_user"=>3,"id_product"=>27,'price'=>200000,'sale'=>10,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/08/2022 00:00:00')],
            
            ["order_code"=>"USR3_1","id_user"=>3,"id_product"=>26,'price'=>340000,'sale'=>10,'amount'=>100,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','27/08/2022 00:00:00')],
            ["order_code"=>"USR3_1","id_user"=>3,"id_product"=>4,'price'=>17000,'sale'=>20,'amount'=>160,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','27/08/2022 00:00:00')],
            
            ["order_code"=>"USR3_2","id_user"=>3,"id_product"=>14,'price'=>32000,'sale'=>20,'amount'=>160,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/09/2022  11:00:00')],
            ["order_code"=>"USR3_2","id_user"=>3,"id_product"=>9,'price'=>12000,'sale'=>0,'amount'=>460,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/09/2022  11:00:00')],
            ["order_code"=>"USR3_2","id_user"=>3,"id_product"=>10,'price'=>29000,'sale'=>10,'amount'=>460,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/09/2022  11:00:00')],
            
            ["order_code"=>"USR3_3","id_user"=>3,"id_product"=>26,'price'=>325000,'sale'=>0,'amount'=>440,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/09/2022 00:00:00')],
            ["order_code"=>"USR3_3","id_user"=>3,"id_product"=>22,'price'=>390000,'sale'=>20,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/09/2022 00:00:00')],
            ["order_code"=>"USR3_3","id_user"=>3,"id_product"=>11,'price'=>22000,'sale'=>10,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/09/2022 00:00:00')],
            
            ["order_code"=>"USR3_4","id_user"=>3,"id_product"=>12,'price'=>20000,'sale'=>40,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/10/2023 02:00:00')],
            ["order_code"=>"USR3_4","id_user"=>3,"id_product"=>28,'price'=>224000,'sale'=>0,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/10/2023 02:00:00')],
            ["order_code"=>"USR3_4","id_user"=>3,"id_product"=>30,'price'=>510000,'sale'=>10,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/10/2023 02:00:00')],
            ["order_code"=>"USR3_4","id_user"=>3,"id_product"=>24,'price'=>46000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/10/2023 02:00:00')],
            
            ["order_code"=>"USR3_5","id_user"=>3,"id_product"=>24,'price'=>46000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/10/2023 02:00:00')],
            ["order_code"=>"USR3_5","id_user"=>3,"id_product"=>22,'price'=>390000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/10/2023 02:00:00')],
            ["order_code"=>"USR3_5","id_user"=>3,"id_product"=>2,'price'=>19000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/10/2023 02:00:00')],
            
            ["order_code"=>"USR3_6","id_user"=>3,"id_product"=>4,'price'=>12000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','13/11/2023 00:00:00')],
            ["order_code"=>"USR3_6","id_user"=>3,"id_product"=>12,'price'=>19900,'sale'=>0,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','13/11/2023 00:00:00')],
            ["order_code"=>"USR3_6","id_user"=>3,"id_product"=>30,'price'=>500000,'sale'=>0,'amount'=>100,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','13/11/2023 00:00:00')],
            
            ["order_code"=>"USR3_7","id_user"=>3,"id_product"=>28,'price'=>240000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/12/2023 00:00:00')],
            ["order_code"=>"USR3_7","id_user"=>3,"id_product"=>17,'price'=>50000,'sale'=>0,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/12/2023 00:00:00')],
            ["order_code"=>"USR3_7","id_user"=>3,"id_product"=>12,'price'=>18000,'sale'=>10,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/12/2023 00:00:00')],
            
            ["order_code"=>"USR3_8","id_user"=>3,"id_product"=>11,'price'=>25000,'sale'=>10,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/12/2022 00:00:00')],
            ["order_code"=>"USR3_8","id_user"=>3,"id_product"=>25,'price'=>32000,'sale'=>10,'amount'=>100,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/12/2022 00:00:00')],
            
            ["order_code"=>"USR3_9","id_user"=>3,"id_product"=>5,'price'=>15000,'sale'=>10,'amount'=>100,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/01/2023 00:00:00')],
            ["order_code"=>"USR3_9","id_user"=>3,"id_product"=>19,'price'=>42000,'sale'=>10,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/01/2023 00:00:00')],
            
            ["order_code"=>"USR3_10","id_user"=>3,"id_product"=>17,'price'=>50000,'sale'=>20,'amount'=>100,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/02/2023 00:00:00')],
            ["order_code"=>"USR3_10","id_user"=>3,"id_product"=>12,'price'=>10000,'sale'=>10,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/02/2023 00:00:00')],
            
            ["order_code"=>"USR3_11","id_user"=>3,"id_product"=>1,'price'=>12000,'sale'=>0,'amount'=>100,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/02/2023 00:00:00')],
            ["order_code"=>"USR3_11","id_user"=>3,"id_product"=>22,'price'=>222200,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/02/2023 00:00:00')],
            
            ["order_code"=>"USR3_12","id_user"=>3,"id_product"=>15,'price'=>40200,'sale'=>10,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/03/2023 00:00:00')],
            ["order_code"=>"USR3_12","id_user"=>3,"id_product"=>2,'price'=>19000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/03/2023 00:00:00')],

            ["order_code"=>"USR3_13","id_user"=>3,"id_product"=>28,'price'=>230000,'sale'=>0,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','27/03/2023 00:00:00')],
            ["order_code"=>"USR3_13","id_user"=>3,"id_product"=>25,'price'=>32000,'sale'=>0,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','27/03/2023 00:00:00')],
            
            ["order_code"=>"USR3_14","id_user"=>3,"id_product"=>20,'price'=>35000,'sale'=>0,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/04/2023 00:00:00')],
            ["order_code"=>"USR3_14","id_user"=>3,"id_product"=>21,'price'=>254000,'sale'=>0,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/04/2023 00:00:00')],
            ["order_code"=>"USR3_15","id_user"=>3,"id_product"=>20,'price'=>35000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','29/04/2023 00:00:00')],
            ["order_code"=>"USR3_15","id_user"=>3,"id_product"=>27,'price'=>190000,'sale'=>0,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','29/04/2023 00:00:00')],
            
            ["order_code"=>"USR3_16","id_user"=>3,"id_product"=>27,'price'=>190000,'sale'=>0,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/04/2023 00:00:00')],
            ["order_code"=>"USR3_16","id_user"=>3,"id_product"=>16,'price'=>220000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/04/2023 00:00:00')],
            ["order_code"=>"USR3_17","id_user"=>3,"id_product"=>29,'price'=>500000,'sale'=>10,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 00:00:00')],
            ["order_code"=>"USR3_17","id_user"=>3,"id_product"=>26,'price'=>330000,'sale'=>1,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 00:00:00')],
            
            ["order_code"=>"USR4_0","id_user"=>4,"id_product"=>1,'price'=>12000,'sale'=>0,'amount'=>1500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/02/2022 00:00:00')],
            ["order_code"=>"USR4_0","id_user"=>4,"id_product"=>6,'price'=>20000,'sale'=>0,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/02/2022 00:00:00')],
            
            ["order_code"=>"USR4_1","id_user"=>4,"id_product"=>16,'price'=>220000,'sale'=>0,'amount'=>100,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/02/2022 00:00:00')],
            ["order_code"=>"USR4_1","id_user"=>4,"id_product"=>30,'price'=>500000,'sale'=>0,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/02/2022 00:00:00')],

            ["order_code"=>"USR4_2","id_user"=>4,"id_product"=>23,'price'=>33000,'sale'=>10,'amount'=>800,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','08/03/2022 00:00:00')],
            ["order_code"=>"USR4_2","id_user"=>4,"id_product"=>3,'price'=>18000,'sale'=>0,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','08/03/2022 00:00:00')],

            ["order_code"=>"USR4_3","id_user"=>4,"id_product"=>14,'price'=>30000,'sale'=>0,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','25/03/2022 00:00:00')],
            ["order_code"=>"USR4_3","id_user"=>4,"id_product"=>10,'price'=>33000,'sale'=>0,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','25/03/2022 00:00:00')],

            ["order_code"=>"USR4_4","id_user"=>4,"id_product"=>20,'price'=>43000,'sale'=>0,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','25/03/2022 00:00:00')],
            ["order_code"=>"USR4_4","id_user"=>4,"id_product"=>18,'price'=>28000,'sale'=>10,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','25/03/2022 00:00:00')],
            
            ["order_code"=>"USR4_5","id_user"=>4,"id_product"=>8,'price'=>8000,'sale'=>10,'amount'=>1600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','05/05/2022 00:00:00')],
            ["order_code"=>"USR4_5","id_user"=>4,"id_product"=>19,'price'=>40000,'sale'=>20,'amount'=>800,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','05/05/2022 00:00:00')],
            
            ["order_code"=>"USR4_6","id_user"=>4,"id_product"=>29,'price'=>500000,'sale'=>10,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/05/2022 00:00:00')],
            ["order_code"=>"USR4_6","id_user"=>4,"id_product"=>24,'price'=>43000,'sale'=>20,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/05/2022 00:00:00')],
            
            ["order_code"=>"USR4_7","id_user"=>4,"id_product"=>14,'price'=>30000,'sale'=>0,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/06/2022 00:00:00')],
            ["order_code"=>"USR4_7","id_user"=>4,"id_product"=>27,'price'=>190000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/06/2022 00:00:00')],
            
            ["order_code"=>"USR4_8","id_user"=>4,"id_product"=>6,'price'=>20000,'sale'=>0,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','09/07/2022 00:00:00')],
            ["order_code"=>"USR4_8","id_user"=>4,"id_product"=>7,'price'=>17000,'sale'=>10,'amount'=>1900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','09/07/2022 00:00:00')],

            ["order_code"=>"USR4_9","id_user"=>4,"id_product"=>17,'price'=>49000,'sale'=>10,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/07/2022 00:00:00')],
            ["order_code"=>"USR4_9","id_user"=>4,"id_product"=>27,'price'=>190000,'sale'=>0,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/07/2022 00:00:00')],
            
            ["order_code"=>"USR4_10","id_user"=>4,"id_product"=>14,'price'=>30000,'sale'=>0,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/08/2022 00:00:00')],
            ["order_code"=>"USR4_10","id_user"=>4,"id_product"=>19,'price'=>42000,'sale'=>10,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/08/2022 00:00:00')],
            
            ["order_code"=>"USR4_11","id_user"=>4,"id_product"=>26,'price'=>340000,'sale'=>10,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/09/2022 00:00:00')],
            ["order_code"=>"USR4_11","id_user"=>4,"id_product"=>15,'price'=>45000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/09/2022 00:00:00')],

            ["order_code"=>"USR4_12","id_user"=>4,"id_product"=>25,'price'=>30000,'sale'=>0,'amount'=>800,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/09/2022 00:00:00')],
            ["order_code"=>"USR4_12","id_user"=>4,"id_product"=>14,'price'=>34000,'sale'=>10,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/09/2022 00:00:00')],
            
            ["order_code"=>"USR4_13","id_user"=>4,"id_product"=>24,'price'=>43000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','08/10/2022 00:00:00')],
            ["order_code"=>"USR4_13","id_user"=>4,"id_product"=>17,'price'=>49000,'sale'=>10,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','08/10/2022 00:00:00')],

            ["order_code"=>"USR4_14","id_user"=>4,"id_product"=>11,'price'=>22000,'sale'=>10,'amount'=>1200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','29/10/2022 00:00:00')],
            ["order_code"=>"USR4_14","id_user"=>4,"id_product"=>7,'price'=>14000,'sale'=>30,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','29/10/2022 00:00:00')],
            
            ["order_code"=>"USR4_15","id_user"=>4,"id_product"=>27,'price'=>190000,'sale'=>0,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/11/2022 00:00:00')],
            ["order_code"=>"USR4_15","id_user"=>4,"id_product"=>15,'price'=>45000,'sale'=>20,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/11/2022 00:00:00')],
            
            ["order_code"=>"USR4_16","id_user"=>4,"id_product"=>17,'price'=>49000,'sale'=>10,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/11/2022 00:00:00')],
            ["order_code"=>"USR4_16","id_user"=>4,"id_product"=>18,'price'=>20000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/11/2022 00:00:00')],
            
            ["order_code"=>"USR4_17","id_user"=>4,"id_product"=>28,'price'=>230000,'sale'=>30,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/12/2022 00:00:00')],
            ["order_code"=>"USR4_17","id_user"=>4,"id_product"=>8,'price'=>8000,'sale'=>0,'amount'=>1500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/12/2022 00:00:00')],
            
            ["order_code"=>"USR4_18","id_user"=>4,"id_product"=>3,'price'=>18000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/12/2022 00:00:00')],
            ["order_code"=>"USR4_18","id_user"=>4,"id_product"=>12,'price'=>18000,'sale'=>10,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/12/2022 00:00:00')],
            
            ["order_code"=>"USR4_19","id_user"=>4,"id_product"=>13,'price'=>29000,'sale'=>40,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','24/12/2022 00:00:00')],
            ["order_code"=>"USR4_19","id_user"=>4,"id_product"=>23,'price'=>29000,'sale'=>0,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','24/12/2022 00:00:00')],
            
            ["order_code"=>"USR4_20","id_user"=>4,"id_product"=>7,'price'=>15000,'sale'=>0,'amount'=>2000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/01/2023 00:00:00')],
            ["order_code"=>"USR4_20","id_user"=>4,"id_product"=>15,'price'=>45000,'sale'=>0,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/01/2023 00:00:00')],
            
            ["order_code"=>"USR4_21","id_user"=>4,"id_product"=>17,'price'=>49000,'sale'=>0,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','16/01/2023 00:00:00')],
            ["order_code"=>"USR4_21","id_user"=>4,"id_product"=>5,'price'=>14000,'sale'=>0,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','16/01/2023 00:00:00')],
            
            ["order_code"=>"USR4_22","id_user"=>4,"id_product"=>18,'price'=>20000,'sale'=>10,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','05/02/2023 00:00:00')],
            ["order_code"=>"USR4_22","id_user"=>4,"id_product"=>19,'price'=>40000,'sale'=>0,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','05/02/2023 00:00:00')],
            
            ["order_code"=>"USR4_23","id_user"=>4,"id_product"=>29,'price'=>500000,'sale'=>10,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','24/02/2023 00:00:00')],
            ["order_code"=>"USR4_23","id_user"=>4,"id_product"=>28,'price'=>230000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','24/02/2023 00:00:00')],
            
            ["order_code"=>"USR4_24","id_user"=>4,"id_product"=>9,'price'=>12000,'sale'=>0,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/03/2023 00:00:00')],
            ["order_code"=>"USR4_24","id_user"=>4,"id_product"=>18,'price'=>20000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/03/2023 00:00:00')],

            ["order_code"=>"USR4_25","id_user"=>4,"id_product"=>15,'price'=>48000,'sale'=>20,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/04/2023 00:00:00')],
            ["order_code"=>"USR4_25","id_user"=>4,"id_product"=>23,'price'=>29000,'sale'=>0,'amount'=>1300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/04/2023 00:00:00')],

            ["order_code"=>"USR4_26","id_user"=>4,"id_product"=>3,'price'=>18000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/04/2023 00:00:00')],
            ["order_code"=>"USR4_26","id_user"=>4,"id_product"=>30,'price'=>500000,'sale'=>0,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/04/2023 00:00:00')],

            ["order_code"=>"USR4_27","id_user"=>4,"id_product"=>3,'price'=>18000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/04/2023 00:00:00')],
            ["order_code"=>"USR4_27","id_user"=>4,"id_product"=>28,'price'=>230000,'sale'=>0,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/04/2023 00:00:00')],

            ["order_code"=>"USR5_0","id_user"=>5,"id_product"=>10,'price'=>29000,'sale'=>0,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/02/2022 00:00:00')],
            ["order_code"=>"USR5_0","id_user"=>5,"id_product"=>26,'price'=>340000,'sale'=>0,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/02/2022 00:00:00')],
            
            ["order_code"=>"USR5_1","id_user"=>5,"id_product"=>16,'price'=>220000,'sale'=>0,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/03/2022 00:00:00')],
            ["order_code"=>"USR5_1","id_user"=>5,"id_product"=>30,'price'=>500000,'sale'=>0,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/03/2022 00:00:00')],

            ["order_code"=>"USR5_2","id_user"=>5,"id_product"=>13,'price'=>33000,'sale'=>10,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/03/2022 00:00:00')],
            ["order_code"=>"USR5_2","id_user"=>5,"id_product"=>27,'price'=>190000,'sale'=>0,'amount'=>800,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/03/2022 00:00:00')],

            ["order_code"=>"USR5_3","id_user"=>5,"id_product"=>14,'price'=>28000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/03/2022 00:00:00')],
            ["order_code"=>"USR5_3","id_user"=>5,"id_product"=>10,'price'=>28000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/03/2022 00:00:00')],

            ["order_code"=>"USR5_4","id_user"=>5,"id_product"=>20,'price'=>35000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/04/2022 00:00:00')],
            ["order_code"=>"USR5_4","id_user"=>5,"id_product"=>18,'price'=>23000,'sale'=>10,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/04/2022 00:00:00')],
            
            ["order_code"=>"USR5_5","id_user"=>5,"id_product"=>8,'price'=>8000,'sale'=>0,'amount'=>1600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/05/2022 00:00:00')],
            ["order_code"=>"USR5_5","id_user"=>5,"id_product"=>19,'price'=>42000,'sale'=>20,'amount'=>800,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/05/2022 00:00:00')],
            
            ["order_code"=>"USR5_6","id_user"=>5,"id_product"=>29,'price'=>520000,'sale'=>10,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','25/05/2022 00:00:00')],
            ["order_code"=>"USR5_6","id_user"=>5,"id_product"=>24,'price'=>43000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','25/05/2022 00:00:00')],
            
            ["order_code"=>"USR5_7","id_user"=>5,"id_product"=>14,'price'=>30000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/06/2022 00:00:00')],
            ["order_code"=>"USR5_7","id_user"=>5,"id_product"=>27,'price'=>200000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/06/2022 00:00:00')],
            
            ["order_code"=>"USR5_8","id_user"=>5,"id_product"=>16,'price'=>230000,'sale'=>10,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/07/2022 00:00:00')],
            ["order_code"=>"USR5_8","id_user"=>5,"id_product"=>7,'price'=>16000,'sale'=>20,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/07/2022 00:00:00')],

            ["order_code"=>"USR5_9","id_user"=>5,"id_product"=>17,'price'=>51000,'sale'=>10,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/07/2022 00:00:00')],
            ["order_code"=>"USR5_9","id_user"=>5,"id_product"=>27,'price'=>190000,'sale'=>0,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/07/2022 00:00:00')],
            
            ["order_code"=>"USR5_10","id_user"=>5,"id_product"=>1,'price'=>12000,'sale'=>0,'amount'=>1300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/08/2022 00:00:00')],
            ["order_code"=>"USR5_10","id_user"=>5,"id_product"=>26,'price'=>330000,'sale'=>10,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/08/2022 00:00:00')],
            
            ["order_code"=>"USR5_11","id_user"=>5,"id_product"=>22,'price'=>380000,'sale'=>0,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/09/2022 00:00:00')],
            ["order_code"=>"USR5_11","id_user"=>5,"id_product"=>15,'price'=>45000,'sale'=>0,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/09/2022 00:00:00')],

            ["order_code"=>"USR5_12","id_user"=>5,"id_product"=>25,'price'=>30000,'sale'=>20,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/09/2022 00:00:00')],
            ["order_code"=>"USR5_12","id_user"=>5,"id_product"=>14,'price'=>30000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/09/2022 00:00:00')],
            
            ["order_code"=>"USR5_13","id_user"=>5,"id_product"=>24,'price'=>43000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/10/2022 00:00:00')],
            ["order_code"=>"USR5_13","id_user"=>5,"id_product"=>17,'price'=>52000,'sale'=>10,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/10/2022 00:00:00')],

            ["order_code"=>"USR5_14","id_user"=>5,"id_product"=>11,'price'=>24000,'sale'=>20,'amount'=>1200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/11/2022 00:00:00')],
            ["order_code"=>"USR5_14","id_user"=>5,"id_product"=>7,'price'=>18000,'sale'=>30,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/11/2022 00:00:00')],
            
            ["order_code"=>"USR5_15","id_user"=>5,"id_product"=>27,'price'=>210000,'sale'=>0,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/11/2022 00:00:00')],
            ["order_code"=>"USR5_15","id_user"=>5,"id_product"=>15,'price'=>48000,'sale'=>0,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/11/2022 00:00:00')],
            
            ["order_code"=>"USR5_16","id_user"=>5,"id_product"=>17,'price'=>49000,'sale'=>10,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/11/2022 00:00:00')],
            ["order_code"=>"USR5_16","id_user"=>5,"id_product"=>18,'price'=>20000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/11/2022 00:00:00')],
            
            ["order_code"=>"USR5_17","id_user"=>5,"id_product"=>28,'price'=>240000,'sale'=>30,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/12/2022 00:00:00')],
            ["order_code"=>"USR5_17","id_user"=>5,"id_product"=>8,'price'=>8000,'sale'=>0,'amount'=>1500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/12/2022 00:00:00')],
            
            ["order_code"=>"USR5_18","id_user"=>5,"id_product"=>3,'price'=>19000,'sale'=>0,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/12/2022 00:00:00')],
            ["order_code"=>"USR5_18","id_user"=>5,"id_product"=>12,'price'=>19000,'sale'=>10,'amount'=>1200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/12/2022 00:00:00')],
            
            ["order_code"=>"USR5_19","id_user"=>5,"id_product"=>13,'price'=>29000,'sale'=>0,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','24/12/2022 00:00:00')],
            ["order_code"=>"USR5_19","id_user"=>5,"id_product"=>23,'price'=>29000,'sale'=>0,'amount'=>1200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','24/12/2022 00:00:00')],
            
            ["order_code"=>"USR5_20","id_user"=>5,"id_product"=>7,'price'=>14000,'sale'=>0,'amount'=>2000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','05/01/2023 00:00:00')],
            ["order_code"=>"USR5_20","id_user"=>5,"id_product"=>15,'price'=>45000,'sale'=>0,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','05/01/2023 00:00:00')],
            
            ["order_code"=>"USR5_21","id_user"=>5,"id_product"=>17,'price'=>52000,'sale'=>10,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/01/2023 00:00:00')],
            ["order_code"=>"USR5_21","id_user"=>5,"id_product"=>5,'price'=>15000,'sale'=>0,'amount'=>1200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/01/2023 00:00:00')],
            
            ["order_code"=>"USR5_22","id_user"=>5,"id_product"=>18,'price'=>20000,'sale'=>10,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','08/02/2023 00:00:00')],
            ["order_code"=>"USR5_22","id_user"=>5,"id_product"=>19,'price'=>44000,'sale'=>10,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','08/02/2023 00:00:00')],
            
            ["order_code"=>"USR5_23","id_user"=>5,"id_product"=>29,'price'=>500000,'sale'=>0,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/02/2023 00:00:00')],
            ["order_code"=>"USR5_23","id_user"=>5,"id_product"=>18,'price'=>20000,'sale'=>10,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/02/2023 00:00:00')],
            
            ["order_code"=>"USR5_24","id_user"=>5,"id_product"=>9,'price'=>10000,'sale'=>0,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','24/03/2023 00:00:00')],
            ["order_code"=>"USR5_24","id_user"=>5,"id_product"=>18,'price'=>23000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','24/03/2023 00:00:00')],

            ["order_code"=>"USR5_25","id_user"=>5,"id_product"=>15,'price'=>38000,'sale'=>20,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/04/2023 00:00:00')],
            ["order_code"=>"USR5_25","id_user"=>5,"id_product"=>23,'price'=>29000,'sale'=>0,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/04/2023 00:00:00')],

            ["order_code"=>"USR5_26","id_user"=>5,"id_product"=>3,'price'=>20000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/04/2023 00:00:00')],
            ["order_code"=>"USR5_26","id_user"=>5,"id_product"=>28,'price'=>230000,'sale'=>0,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/04/2023 00:00:00')],

            ["order_code"=>"USR5_27","id_user"=>5,"id_product"=>13,'price'=>26000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/04/2023 00:00:00')],
            ["order_code"=>"USR5_27","id_user"=>5,"id_product"=>26,'price'=>300000,'sale'=>0,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/04/2023 00:00:00')],
            ["order_code"=>"USR5_27","id_user"=>5,"id_product"=>28,'price'=>230000,'sale'=>10,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/04/2023 00:00:00')],

            ["order_code"=>"USR6_0","id_user"=>6,"id_product"=>10,'price'=>27000,'sale'=>0,'amount'=>1700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/03/2022 00:00:00')],
            ["order_code"=>"USR6_0","id_user"=>6,"id_product"=>26,'price'=>280000,'sale'=>0,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/03/2022 00:00:00')],
            
            ["order_code"=>"USR6_1","id_user"=>6,"id_product"=>16,'price'=>240000,'sale'=>20,'amount'=>800,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/04/2022 00:00:00')],
            ["order_code"=>"USR6_1","id_user"=>6,"id_product"=>30,'price'=>500000,'sale'=>0,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/04/2022 00:00:00')],

            ["order_code"=>"USR6_2","id_user"=>6,"id_product"=>23,'price'=>30000,'sale'=>10,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/04/2022 00:00:00')],
            ["order_code"=>"USR6_2","id_user"=>6,"id_product"=>3,'price'=>18000,'sale'=>0,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/04/2022 00:00:00')],

            ["order_code"=>"USR6_3","id_user"=>6,"id_product"=>14,'price'=>30000,'sale'=>0,'amount'=>800,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/05/2022 00:00:00')],
            ["order_code"=>"USR6_3","id_user"=>6,"id_product"=>10,'price'=>17000,'sale'=>0,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/05/2022 00:00:00')],

            ["order_code"=>"USR6_4","id_user"=>6,"id_product"=>20,'price'=>39000,'sale'=>20,'amount'=>800,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','29/05/2022 00:00:00')],
            ["order_code"=>"USR6_4","id_user"=>6,"id_product"=>18,'price'=>20000,'sale'=>10,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','29/05/2022 00:00:00')],
            
            ["order_code"=>"USR6_5","id_user"=>6,"id_product"=>8,'price'=>10000,'sale'=>10,'amount'=>2300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','29/06/2022 00:00:00')],
            ["order_code"=>"USR6_5","id_user"=>6,"id_product"=>19,'price'=>40000,'sale'=>0,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','29/06/2022 00:00:00')],
            
            ["order_code"=>"USR6_6","id_user"=>6,"id_product"=>29,'price'=>500000,'sale'=>10,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/07/2022 00:00:00')],
            ["order_code"=>"USR6_6","id_user"=>6,"id_product"=>24,'price'=>45000,'sale'=>0,'amount'=>800,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/07/2022 00:00:00')],
            
            ["order_code"=>"USR6_7","id_user"=>6,"id_product"=>14,'price'=>30000,'sale'=>0,'amount'=>800,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/07/2022 00:00:00')],
            ["order_code"=>"USR6_7","id_user"=>6,"id_product"=>27,'price'=>229000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/07/2022 00:00:00')],
            
            ["order_code"=>"USR6_8","id_user"=>6,"id_product"=>6,'price'=>9000,'sale'=>0,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','16/08/2022 00:00:00')],
            ["order_code"=>"USR6_8","id_user"=>6,"id_product"=>7,'price'=>12000,'sale'=>0,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','16/08/2022 00:00:00')],

            ["order_code"=>"USR6_9","id_user"=>6,"id_product"=>17,'price'=>120000,'sale'=>10,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','09/09/2022 00:00:00')],
            ["order_code"=>"USR6_9","id_user"=>6,"id_product"=>27,'price'=>220000,'sale'=>0,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','09/09/2022 00:00:00')],
            
            ["order_code"=>"USR6_10","id_user"=>6,"id_product"=>1,'price'=>12000,'sale'=>0,'amount'=>1300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/09/2022 00:00:00')],
            ["order_code"=>"USR6_10","id_user"=>6,"id_product"=>26,'price'=>350000,'sale'=>10,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/09/2022 00:00:00')],
            
            ["order_code"=>"USR6_11","id_user"=>6,"id_product"=>26,'price'=>350000,'sale'=>10,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/10/2022 00:00:00')],
            ["order_code"=>"USR6_11","id_user"=>6,"id_product"=>15,'price'=>43000,'sale'=>0,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/10/2022 00:00:00')],

            ["order_code"=>"USR6_12","id_user"=>6,"id_product"=>25,'price'=>30000,'sale'=>0,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/11/2022 00:00:00')],
            ["order_code"=>"USR6_12","id_user"=>6,"id_product"=>14,'price'=>28000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/11/2022 00:00:00')],
            
            ["order_code"=>"USR6_13","id_user"=>6,"id_product"=>24,'price'=>43000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/11/2022 00:00:00')],
            ["order_code"=>"USR6_13","id_user"=>6,"id_product"=>27,'price'=>190000,'sale'=>10,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/11/2022 00:00:00')],

            ["order_code"=>"USR6_14","id_user"=>6,"id_product"=>11,'price'=>22000,'sale'=>0,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/11/2022 00:00:00')],
            ["order_code"=>"USR6_14","id_user"=>6,"id_product"=>7,'price'=>15000,'sale'=>30,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/11/2022 00:00:00')],
            
            ["order_code"=>"USR6_15","id_user"=>6,"id_product"=>27,'price'=>190000,'sale'=>10,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/12/2022 00:00:00')],
            ["order_code"=>"USR6_15","id_user"=>6,"id_product"=>15,'price'=>38000,'sale'=>0,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/12/2022 00:00:00')],
            
            ["order_code"=>"USR6_16","id_user"=>6,"id_product"=>17,'price'=>46000,'sale'=>10,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','24/12/2022 00:00:00')],
            ["order_code"=>"USR6_16","id_user"=>6,"id_product"=>18,'price'=>23000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','24/12/2022 00:00:00')],
            
            ["order_code"=>"USR6_17","id_user"=>6,"id_product"=>28,'price'=>220000,'sale'=>10,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','04/01/2023 00:00:00')],
            ["order_code"=>"USR6_17","id_user"=>6,"id_product"=>8,'price'=>8000,'sale'=>0,'amount'=>2500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','04/01/2023 00:00:00')],
            
            ["order_code"=>"USR6_18","id_user"=>6,"id_product"=>3,'price'=>18000,'sale'=>20,'amount'=>800,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/01/2023 00:00:00')],
            ["order_code"=>"USR6_18","id_user"=>6,"id_product"=>12,'price'=>18000,'sale'=>20,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/01/2023 00:00:00')],
            
            ["order_code"=>"USR6_19","id_user"=>6,"id_product"=>13,'price'=>33000,'sale'=>40,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/02/2023 00:00:00')],
            ["order_code"=>"USR6_19","id_user"=>6,"id_product"=>23,'price'=>32000,'sale'=>0,'amount'=>800,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/02/2023 00:00:00')],
            
            ["order_code"=>"USR6_20","id_user"=>6,"id_product"=>7,'price'=>15000,'sale'=>0,'amount'=>2000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/03/2023 00:00:00')],
            ["order_code"=>"USR6_20","id_user"=>6,"id_product"=>15,'price'=>40000,'sale'=>0,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/03/2023 00:00:00')],
            
            ["order_code"=>"USR6_21","id_user"=>6,"id_product"=>17,'price'=>55000,'sale'=>40,'amount'=>800,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/03/2023 00:00:00')],
            ["order_code"=>"USR6_21","id_user"=>6,"id_product"=>5,'price'=>14000,'sale'=>0,'amount'=>1200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/03/2023 00:00:00')],
            
            ["order_code"=>"USR6_22","id_user"=>6,"id_product"=>18,'price'=>23000,'sale'=>10,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','06/04/2023 00:00:00')],
            ["order_code"=>"USR6_22","id_user"=>6,"id_product"=>9,'price'=>10000,'sale'=>0,'amount'=>2000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','06/04/2023 00:00:00')],
            
            ["order_code"=>"USR6_23","id_user"=>6,"id_product"=>29,'price'=>500000,'sale'=>0,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/04/2023 00:00:00')],
            ["order_code"=>"USR6_23","id_user"=>6,"id_product"=>4,'price'=>18000,'sale'=>10,'amount'=>1900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/04/2023 00:00:00')],
            
            ["order_code"=>"USR6_24","id_user"=>6,"id_product"=>19,'price'=>40000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/04/2023 01:00:00')],
            ["order_code"=>"USR6_24","id_user"=>6,"id_product"=>8,'price'=>10000,'sale'=>10,'amount'=>1500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/04/2023 01:00:00')],
            
            ["order_code"=>"GUT_0","id_product"=>20,'price'=>32000,'sale'=>10,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/03/2022 00:00:00')],
            ["order_code"=>"GUT_0","id_product"=>17,'price'=>45000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/03/2022 00:00:00')],
            
            ["order_code"=>"GUT_1","id_product"=>11,'price'=>14000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/04/2022 00:00:00')],
            ["order_code"=>"GUT_1","id_product"=>23,'price'=>30000,'sale'=>10,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/04/2022 00:00:00')],
            ["order_code"=>"GUT_1","id_product"=>19,'price'=>42000,'sale'=>0,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/04/2022 00:00:00')],
            
            ["order_code"=>"GUT_2","id_product"=>16,'price'=>240000,'sale'=>0,'amount'=>100,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/04/2022 00:00:00')],
            ["order_code"=>"GUT_2","id_product"=>22,'price'=>390000,'sale'=>0,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/04/2022 00:00:00')],
            ["order_code"=>"GUT_2","id_product"=>21,'price'=>260000,'sale'=>40,'amount'=>340,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/04/2022 00:00:00')],
            ["order_code"=>"GUT_2","id_product"=>13,'price'=>28000,'sale'=>10,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/04/2022 00:00:00')],
            
            ["order_code"=>"GUT_3","id_product"=>15,'price'=>42000,'sale'=>20,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/05/2022 00:00:00')],
            ["order_code"=>"GUT_3","id_product"=>13,'price'=>32000,'sale'=>30,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/05/2022 00:00:00')],
            
            ["order_code"=>"GUT_4","id_product"=>12,'price'=>19000,'sale'=>0,'amount'=>540,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/06/2022 00:00:00')],
            ["order_code"=>"GUT_4","id_product"=>11,'price'=>22000,'sale'=>0,'amount'=>840,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/06/2022 00:00:00')],
            
            ["order_code"=>"GUT_5","id_product"=>18,'price'=>21000,'sale'=>10,'amount'=>1200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','04/06/2022 00:00:00')],
            ["order_code"=>"GUT_5","id_product"=>1,'price'=>12000,'sale'=>0,'amount'=>1400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','04/06/2022 00:00:00')],
            ["order_code"=>"GUT_5","id_product"=>17,'price'=>51000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','04/06/2022 00:00:00')],
            
            ["order_code"=>"GUT_6","id_product"=>12,'price'=>22000,'sale'=>20,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/06/2022 00:00:00')],
            ["order_code"=>"GUT_6","id_product"=>1,'price'=>12000,'sale'=>0,'amount'=>2000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/06/2022 00:00:00')],
            ["order_code"=>"GUT_6","id_product"=>21,'price'=>250000,'sale'=>0,'amount'=>360,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/06/2022 00:00:00')],

            ["order_code"=>"GUT_7","id_product"=>12,'price'=>18000,'sale'=>10,'amount'=>340,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','27/06/2022 00:00:00')],
            
            ["order_code"=>"GUT_8","id_product"=>13,'price'=>33000,'sale'=>30,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','16/07/2022 00:00:00')],
            ["order_code"=>"GUT_8","id_product"=>19,'price'=>40000,'sale'=>0,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','16/07/2022 00:00:00')],

            ["order_code"=>"GUT_9","id_product"=>1,'price'=>12000,'sale'=>0,'amount'=>1300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/07/2022 00:00:00')],
            ["order_code"=>"GUT_9","id_product"=>2,'price'=>12000,'sale'=>0,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/07/2022 00:00:00')],
            ["order_code"=>"GUT_9","id_product"=>4,'price'=>18000,'sale'=>30,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/07/2022 00:00:00')],
            
            ["order_code"=>"GUT_10","id_product"=>3,'price'=>20000,'sale'=>20,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/08/2022 00:00:00')],
            
            ["order_code"=>"GUT_11","id_product"=>22,'price'=>380000,'sale'=>10,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/08/2022 00:00:00')],
            ["order_code"=>"GUT_11","id_product"=>13,'price'=>25000,'sale'=>0,'amount'=>990,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/08/2022 00:00:00')],
            ["order_code"=>"GUT_11","id_product"=>17,'price'=>50000,'sale'=>10,'amount'=>880,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/08/2022 00:00:00')],
            
            ["order_code"=>"GUT_12","id_product"=>15,'price'=>45000,'sale'=>0,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/08/2022 00:00:00')],
            ["order_code"=>"GUT_12","id_product"=>18,'price'=>24000,'sale'=>0,'amount'=>3000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/08/2022 00:00:00')],
            ["order_code"=>"GUT_12","id_product"=>25,'price'=>32000,'sale'=>0,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/08/2022 00:00:00')],
            
            ["order_code"=>"GUT_13","id_product"=>24,'price'=>45000,'sale'=>0,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','24/08/2022 00:00:00')],
            ["order_code"=>"GUT_13","id_product"=>26,'price'=>330000,'sale'=>0,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','24/08/2022 00:00:00')],
            
            ["order_code"=>"GUT_14","id_product"=>11,'price'=>20000,'sale'=>0,'amount'=>2000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/09/2022 00:00:00')],
            ["order_code"=>"GUT_14","id_product"=>12,'price'=>18000,'sale'=>0,'amount'=>1360,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/09/2022 00:00:00')],
            ["order_code"=>"GUT_14","id_product"=>13,'price'=>29000,'sale'=>0,'amount'=>1600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/09/2022 00:00:00')],
            
            ["order_code"=>"GUT_15","id_product"=>24,'price'=>43000,'sale'=>0,'amount'=>760,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/09/2022 00:00:00')],
            ["order_code"=>"GUT_15","id_product"=>29,'price'=>330000,'sale'=>0,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/09/2022 00:00:00')],

            ["order_code"=>"GUT_16","id_product"=>30,'price'=>500000,'sale'=>0,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/09/2022 00:00:00')],
            ["order_code"=>"GUT_16","id_product"=>3,'price'=>20000,'sale'=>0,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/09/2022 00:00:00')],
            ["order_code"=>"GUT_17","id_product"=>1,'price'=>12000,'sale'=>0,'amount'=>1920,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','29/09/2022 00:00:00')],
            ["order_code"=>"GUT_18","id_product"=>2,'price'=>13000,'sale'=>10,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/10/2022 00:00:00')],
            ["order_code"=>"GUT_18","id_product"=>11,'price'=>20000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/10/2022 00:00:00')],
            ["order_code"=>"GUT_18","id_product"=>4,'price'=>16000,'sale'=>0,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/10/2022 00:00:00')],
            ["order_code"=>"GUT_19","id_product"=>21,'price'=>250000,'sale'=>0,'amount'=>960,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/10/2022 00:00:00')],
            ["order_code"=>"GUT_19","id_product"=>18,'price'=>24000,'sale'=>30,'amount'=>1900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/10/2022 00:00:00')],
            
            ["order_code"=>"GUT_20","id_product"=>12,'price'=>20000,'sale'=>0,'amount'=>2200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','09/11/2022 00:00:00')],
            ["order_code"=>"GUT_20","id_product"=>13,'price'=>29000,'sale'=>20,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','09/11/2022 00:00:00')],
            ["order_code"=>"GUT_21","id_product"=>14,'price'=>33000,'sale'=>0,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','13/11/2022 00:00:00')],
            ["order_code"=>"GUT_21","id_product"=>15,'price'=>43000,'sale'=>10,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','13/11/2022 00:00:00')],

            ["order_code"=>"GUT_22","id_product"=>17,'price'=>49000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/11/2022 00:00:00')],
            ["order_code"=>"GUT_22","id_product"=>18,'price'=>23000,'sale'=>10,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/11/2022 00:00:00')],
            ["order_code"=>"GUT_22","id_product"=>11,'price'=>20000,'sale'=>20,'amount'=>2000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/11/2022 00:00:00')],
            ["order_code"=>"GUT_23","id_product"=>24,'price'=>45000,'sale'=>0,'amount'=>1200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/11/2022 00:00:00')],

            ["order_code"=>"GUT_24","id_product"=>16,'price'=>230000,'sale'=>0,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/11/2022 00:00:00')],
            ["order_code"=>"GUT_24","id_product"=>10,'price'=>29000,'sale'=>20,'amount'=>1360,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/11/2022 00:00:00')],
            
            ["order_code"=>"GUT_25","id_product"=>13,'price'=>25000,'sale'=>0,'amount'=>290,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/12/2022 00:00:00')],
            ["order_code"=>"GUT_25","id_product"=>23,'price'=>29000,'sale'=>0,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/12/2022 00:00:00')],

            ["order_code"=>"GUT_26","id_product"=>1,'price'=>10000,'sale'=>0,'amount'=>2300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/12/2022 00:00:00')],
            
            ["order_code"=>"GUT_27","id_product"=>2,'price'=>10000,'sale'=>0,'amount'=>2000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','13/12/2022 00:00:00')],
            ["order_code"=>"GUT_27","id_product"=>4,'price'=>18000,'sale'=>10,'amount'=>1360,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','13/12/2022 00:00:00')],

            ["order_code"=>"GUT_28","id_product"=>12,'price'=>18000,'sale'=>0,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','27/12/2022 00:00:00')],
            ["order_code"=>"GUT_28","id_product"=>14,'price'=>30000,'sale'=>0,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','27/12/2022 00:00:00')],
            ["order_code"=>"GUT_28","id_product"=>16,'price'=>230000,'sale'=>10,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','27/12/2022 00:00:00')],
            ["order_code"=>"GUT_29","id_product"=>18,'price'=>20000,'sale'=>20,'amount'=>800,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','29/12/2022 00:00:00')],
            
            ["order_code"=>"GUT_30","id_product"=>15,'price'=>45000,'sale'=>0,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/01/2023 00:00:00')],
            ["order_code"=>"GUT_31","id_product"=>24,'price'=>44000,'sale'=>10,'amount'=>1600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/01/2023 00:00:00')],
            ["order_code"=>"GUT_31","id_product"=>23,'price'=>33000,'sale'=>20,'amount'=>1360,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/01/2023 00:00:00')],

            ["order_code"=>"GUT_32","id_product"=>21,'price'=>250000,'sale'=>20,'amount'=>960,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/01/2023 00:00:00')],
            ["order_code"=>"GUT_32","id_product"=>13,'price'=>29000,'sale'=>0,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/01/2023 00:00:00')],
            ["order_code"=>"GUT_32","id_product"=>27,'price'=>220000,'sale'=>40,'amount'=>560,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/01/2023 00:00:00')],

            ["order_code"=>"GUT_33","id_product"=>17,'price'=>49000,'sale'=>20,'amount'=>890,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/01/2023 00:00:00')],
            ["order_code"=>"GUT_33","id_product"=>30,'price'=>500000,'sale'=>0,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/01/2023 00:00:00')],

            ["order_code"=>"GUT_34","id_product"=>7,'price'=>14000,'sale'=>0,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/02/2023 00:00:00')],
            ["order_code"=>"GUT_35","id_product"=>6,'price'=>16000,'sale'=>0,'amount'=>1900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/02/2023 00:00:00')],
            ["order_code"=>"GUT_35","id_product"=>8,'price'=>10000,'sale'=>0,'amount'=>1300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/02/2023 00:00:00')],

            ["order_code"=>"GUT_36","id_product"=>1,'price'=>12000,'sale'=>0,'amount'=>1200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','08/03/2023 00:00:00')],
            ["order_code"=>"GUT_36","id_product"=>2,'price'=>10000,'sale'=>0,'amount'=>1200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','08/03/2023 00:00:00')],
            ["order_code"=>"GUT_36","id_product"=>3,'price'=>18000,'sale'=>0,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','08/03/2023 00:00:00')],

            ["order_code"=>"GUT_37","id_product"=>14,'price'=>33000,'sale'=>10,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','13/03/2023 00:00:00')],
            ["order_code"=>"GUT_37","id_product"=>18,'price'=>20000,'sale'=>0,'amount'=>200,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','13/03/2023 00:00:00')],

            ["order_code"=>"GUT_38","id_product"=>22,'price'=>380000,'sale'=>20,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/03/2023 00:00:00')],
            ["order_code"=>"GUT_39","id_product"=>23,'price'=>29000,'sale'=>0,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','29/03/2023 00:00:00')],
            ["order_code"=>"GUT_40","id_product"=>24,'price'=>43000,'sale'=>20,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/04/2023 00:00:00')],
            ["order_code"=>"GUT_40","id_product"=>25,'price'=>30000,'sale'=>0,'amount'=>990,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/04/2023 00:00:00')],

            ["order_code"=>"GUT_41","id_product"=>27,'price'=>190000,'sale'=>0,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/04/2023 00:00:00')],
            ["order_code"=>"GUT_41","id_product"=>11,'price'=>20000,'sale'=>0,'amount'=>2000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/04/2023 00:00:00')],
            
            ["order_code"=>"GUT_42","id_product"=>21,'price'=>250000,'sale'=>0,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','27/04/2023 00:00:00')],
            ["order_code"=>"GUT_42","id_product"=>19,'price'=>40000,'sale'=>0,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','27/04/2023 00:00:00')],
            ["order_code"=>"GUT_43","id_product"=>29,'price'=>500000,'sale'=>0,'amount'=>800,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','27/04/2023 00:00:00')],
            
            ["order_code"=>"GUT_44","id_product"=>8,'price'=>8000,'sale'=>0,'amount'=>1990,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 04:00:00')],
            ["order_code"=>"GUT_44","id_product"=>7,'price'=>14000,'sale'=>0,'amount'=>1000,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 04:00:00')],
            ["order_code"=>"GUT_44","id_product"=>6,'price'=>17000,'sale'=>32,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 04:00:00')],
            ["order_code"=>"GUT_44","id_product"=>9,'price'=>10000,'sale'=>0,'amount'=>300,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 04:00:00')],

            ["order_code"=>"GUT_45","id_product"=>12,'price'=>18000,'sale'=>45,'amount'=>390,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 06:00:00')],
            ["order_code"=>"GUT_45","id_product"=>16,'price'=>220000,'sale'=>10,'amount'=>460,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 06:00:00')],
            ["order_code"=>"GUT_45","id_product"=>22,'price'=>380000,'sale'=>40,'amount'=>770,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 06:00:00')],

            ["order_code"=>"GUT_46","id_product"=>30,'price'=>500000,'sale'=>0,'amount'=>500,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 06:00:00')],
            ["order_code"=>"GUT_46","id_product"=>26,'price'=>330000,'sale'=>1,'amount'=>400,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 06:00:00')],
            ["order_code"=>"GUT_46","id_product"=>18,'price'=>20000,'sale'=>25,'amount'=>700,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 06:00:00')],

            ["order_code"=>"GUT_47","id_product"=>12,'price'=>18000,'sale'=>45,'amount'=>390,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 08:00:00')],
            ["order_code"=>"GUT_47","id_product"=>6,'price'=>17000,'sale'=>32,'amount'=>860,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 08:00:00')],
            ["order_code"=>"GUT_47","id_product"=>19,'price'=>40000,'sale'=>15,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 08:00:00')],

            ["order_code"=>null,"id_user"=>4,"id_product"=>12,'price'=>18000,'sale'=>45,'amount'=>600,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 06:00:00')],
            ["order_code"=>null,"id_user"=>4,"id_product"=>16,'price'=>220000,'sale'=>10,'amount'=>900,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 06:00:00')],
            ["order_code"=>null,"id_user"=>2,"id_product"=>16,'price'=>220000,'sale'=>10,'amount'=>460,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 06:00:00')],
            ["order_code"=>null,"id_user"=>3,"id_product"=>22,'price'=>380000,'sale'=>40,'amount'=>770,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 06:00:00')],
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
