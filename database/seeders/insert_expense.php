<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class insert_expense extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $expenses = [
            ['id_product'=>1,"costs"=>9000,'quantity'=>1200,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')],
            ['id_product'=>1,"costs"=>9300,'quantity'=>300,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '30/04/2022 00:00:00')],
            ['id_product'=>1,"costs"=>8000,'quantity'=>500,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '10/03/2023 00:00:00')],
            ['id_product'=>1,"costs"=>8000,'quantity'=>1500,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '10/05/2023 00:00:00')],
            
            ['id_product'=>2,"costs"=>10000,'quantity'=>500,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/02/2022 00:00:00')],
            ['id_product'=>2,"costs"=>8000,'quantity'=>700,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/03/2022 00:00:00')],
            ['id_product'=>2,"costs"=>6000,'quantity'=>2000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/12/2022 00:00:00')],
            ['id_product'=>2,"costs"=>6000,'quantity'=>1000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '20/02/2023 00:00:00')],
            
            ['id_product'=>3,"costs"=>12900,'quantity'=>300,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/02/2022 00:00:00')],
            ['id_product'=>3,"costs"=>12000,'quantity'=>5000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '20/01/2023 00:00:00')],
            ['id_product'=>3,"costs"=>10500,'quantity'=>500,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '20/02/2023 00:00:00')],
            ['id_product'=>3,"costs"=>10000,'quantity'=>3000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '20/04/2023 00:00:00')],
            
            ['id_product'=>4,"costs"=>13000,'quantity'=>200,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')],
            ['id_product'=>4,"costs"=>13200,'quantity'=>2000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '20/04/2022 00:00:00')],
            ['id_product'=>4,"costs"=>12000,'quantity'=>2000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>5,"costs"=>8000,'quantity'=>2000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')],
            ['id_product'=>5,"costs"=>9500,'quantity'=>1600,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/07/2022 00:00:00')],
            ['id_product'=>5,"costs"=>8000,'quantity'=>4500,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/12/2022 00:00:00')],
            ['id_product'=>5,"costs"=>10000,'quantity'=>2500,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/02/2023 00:00:00')],
            ['id_product'=>5,"costs"=>8000,'quantity'=>2000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/05/2023 00:00:00')],
            
            ['id_product'=>6,"costs"=>9000,'quantity'=>2000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')],
            ['id_product'=>6,"costs"=>10600,'quantity'=>3000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/11/2022 00:00:00')],
            ['id_product'=>6,"costs"=>11000,'quantity'=>1000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/01/2023 00:00:00')],
            
            ['id_product'=>7,"costs"=>11000,'quantity'=>1000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')],
            ['id_product'=>7,"costs"=>12000,'quantity'=>3000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/06/2022 00:00:00')],
            ['id_product'=>7,"costs"=>10000,'quantity'=>2000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>8,"costs"=>3000,'quantity'=>1000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')],
            ['id_product'=>8,"costs"=>3000,'quantity'=>5000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2022 00:00:00')],
            ['id_product'=>8,"costs"=>5000,'quantity'=>5000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>9,"costs"=>2000,'quantity'=>5000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')],
            ['id_product'=>9,"costs"=>2000,'quantity'=>5000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/08/2022 00:00:00')],
            ['id_product'=>9,"costs"=>3000,'quantity'=>2000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>10,"costs"=>13000,'quantity'=>1000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')],
            ['id_product'=>10,"costs"=>12000,'quantity'=>1000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/05/2022 00:00:00')],
            ['id_product'=>10,"costs"=>10000,'quantity'=>1000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/08/2022 00:00:00')],
            ['id_product'=>10,"costs"=>11000,'quantity'=>5000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>11,"costs"=>14000,'quantity'=>4000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')],
            ['id_product'=>11,"costs"=>12000,'quantity'=>2000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '01/09/2022 00:00:00')],
            ['id_product'=>11,"costs"=>13000,'quantity'=>3000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/02/2023 00:00:00')],
            ['id_product'=>11,"costs"=>15000,'quantity'=>3000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/03/2023 00:00:00')],

            ['id_product'=>12,"costs"=>8000,'quantity'=>1000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')],
            ['id_product'=>12,"costs"=>8000,'quantity'=>1000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/12/2022 00:00:00')],
            ['id_product'=>12,"costs"=>9000,'quantity'=>3900,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            ['id_product'=>12,"costs"=>10000,'quantity'=>3900,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/05/2023 00:00:00')],
            
            ['id_product'=>13,"costs"=>19000,'quantity'=>1900,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '10/07/2022 00:00:00')],
            ['id_product'=>13,"costs"=>16000,'quantity'=>1000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/01/2023 00:00:00')],
            ['id_product'=>13,"costs"=>18000,'quantity'=>2500,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>14,"costs"=>18000,'quantity'=>1500,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')],
            ['id_product'=>14,"costs"=>13000,'quantity'=>2500,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/07/2022 00:00:00')],
            ['id_product'=>14,"costs"=>20000,'quantity'=>6000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/01/2023 00:00:00')],
            ['id_product'=>14,"costs"=>19000,'quantity'=>4600,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>15,"costs"=>29000,'quantity'=>1900,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')],
            ['id_product'=>15,"costs"=>29500,'quantity'=>1000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/03/2022 00:00:00')],
            ['id_product'=>15,"costs"=>32000,'quantity'=>4600,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>16,"costs"=>92000,'quantity'=>1000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/06/2022 00:00:00')],
            ['id_product'=>16,"costs"=>100000,'quantity'=>2600,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/12/2022 00:00:00')],
            ['id_product'=>16,"costs"=>120000,'quantity'=>3400,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/02/2023 00:00:00')],
            
            ['id_product'=>17,"costs"=>34000,'quantity'=>3000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '01/04/2022 00:00:00')],
            ['id_product'=>17,"costs"=>40000,'quantity'=>2000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/10/2022 00:00:00')],
            ['id_product'=>17,"costs"=>30000,'quantity'=>5000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/03/2023 00:00:00')],
            
            ['id_product'=>18,"costs"=>12000,'quantity'=>3000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '01/02/2022 00:00:00')],
            ['id_product'=>18,"costs"=>12000,'quantity'=>2000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/08/2022 00:00:00')],
            ['id_product'=>18,"costs"=>10000,'quantity'=>4600,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/02/2023 00:00:00')],
            
            ['id_product'=>19,"costs"=>29000,'quantity'=>2600,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/08/2022 00:00:00')],
            ['id_product'=>19,"costs"=>29000,'quantity'=>2600,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/10/2022 00:00:00')],
            ['id_product'=>19,"costs"=>29000,'quantity'=>1000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/12/2022 00:00:00')],
            ['id_product'=>19,"costs"=>30000,'quantity'=>3600,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/02/2023 00:00:00')],
            ['id_product'=>19,"costs"=>30000,'quantity'=>4600,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/05/2023 00:00:00')],
            
            ['id_product'=>20,"costs"=>12000,'quantity'=>1000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/05/2022 00:00:00')],
            ['id_product'=>20,"costs"=>12000,'quantity'=>1000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/11/2022 00:00:00')],
            ['id_product'=>20,"costs"=>11000,'quantity'=>2000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/02/2023 00:00:00')],
            ['id_product'=>20,"costs"=>15000,'quantity'=>4000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>21,"costs"=>230000,'quantity'=>4000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/03/2022 00:00:00')],
            ['id_product'=>21,"costs"=>210000,'quantity'=>5000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/12/2022 00:00:00')],
            ['id_product'=>21,"costs"=>200000,'quantity'=>5000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>22,"costs"=>200000,'quantity'=>1000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/03/2022 00:00:00')],
            ['id_product'=>22,"costs"=>220000,'quantity'=>2000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/08/2022 00:00:00')],
            ['id_product'=>22,"costs"=>230000,'quantity'=>3700,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>23,"costs"=>19000,'quantity'=>700,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/04/2022 00:00:00')],
            ['id_product'=>23,"costs"=>20000,'quantity'=>1700,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/09/2022 00:00:00')],
            ['id_product'=>23,"costs"=>19000,'quantity'=>2500,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/02/2023 00:00:00')],
            
            ['id_product'=>24,"costs"=>220000,'quantity'=>2900,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/06/2022 00:00:00')],
            ['id_product'=>24,"costs"=>200000,'quantity'=>2000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '15/10/2022 00:00:00')],
            ['id_product'=>24,"costs"=>220000,'quantity'=>9000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/02/2023 00:00:00')],
            ['id_product'=>24,"costs"=>220000,'quantity'=>6000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/05/2023 00:00:00')],
            
            ['id_product'=>25,"costs"=>18000,'quantity'=>9000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/05/2022 00:00:00')],
            ['id_product'=>25,"costs"=>24000,'quantity'=>3000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/07/2022 00:00:00')],
            ['id_product'=>25,"costs"=>20000,'quantity'=>9800,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>26,"costs"=>270000,'quantity'=>3000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/03/2022 00:00:00')],
            ['id_product'=>26,"costs"=>296000,'quantity'=>1000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/07/2022 00:00:00')],
            ['id_product'=>26,"costs"=>290000,'quantity'=>1000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>27,"costs"=>120000,'quantity'=>12000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '19/02/2022 00:00:00')],
            ['id_product'=>27,"costs"=>130000,'quantity'=>12000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/08/2022 00:00:00')],
            ['id_product'=>27,"costs"=>140000,'quantity'=>10000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/02/2023 00:00:00')],
            
            ['id_product'=>28,"costs"=>250000,'quantity'=>5000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '01/02/2022 00:00:00')],
            ['id_product'=>28,"costs"=>250000,'quantity'=>5000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '01/12/2022 00:00:00')],
            ['id_product'=>28,"costs"=>190000,'quantity'=>10000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/03/2023 00:00:00')],
            
            ['id_product'=>29,"costs"=>230000,'quantity'=>1000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/06/2022 00:00:00')],
            ['id_product'=>29,"costs"=>220000,'quantity'=>500,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/11/2022 00:00:00')],
            ['id_product'=>29,"costs"=>220000,'quantity'=>1200,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>30,"costs"=>220000,'quantity'=>1000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/04/2022 00:00:00')],
            ['id_product'=>30,"costs"=>250000,'quantity'=>2000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/10/2022 00:00:00')],
            ['id_product'=>30,"costs"=>260000,'quantity'=>5000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/02/2023 00:00:00')],
            ['id_product'=>30,"costs"=>270000,'quantity'=>5000,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/05/2023 00:00:00')],
            
        ];
        try {
            foreach($expenses as $ex){
                DB::table('expense')->insert($ex);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
