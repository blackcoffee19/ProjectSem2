<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class insert_coupon extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coupons =[
            ["title"=>"New Member",'code'=>"NEWMEM",'discount'=>40,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
        ];
        try {
            foreach($coupons as $cp){
                DB::table('coupon')->insert($cp);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
