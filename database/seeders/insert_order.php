<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
class insert_order extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            ['order_code'=>'USR2_0','id_user'=>2,'order_name'=>'Cat Tuong','order_address'=>'135 Tran Hung Dao, Phuong Cau Ong Lanh, Quan 1, TP Ho Chi Minh','order_phone'=>'0919941037','order_email'=>'cattuongw2000@gmail.com','method'=>'cod','code_coupon'=>'NEWMEM','status'=>'finished','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '10/03/2023 00:00:00')],
            ['order_code'=>'USR2_1','id_user'=>2,'order_name'=>'Cat Tuong','order_address'=>'135 Tran Hung Dao, Phuong Cau Ong Lanh, Quan 1, TP Ho Chi Minh','order_phone'=>'0919941037','order_email'=>'cattuongw2000@gmail.com','method'=>'cod','status'=>'delivery','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '09/04/2023 00:00:00')],
            ['order_code'=>'USR2_2','id_user'=>2,'order_name'=>'Cat Tuong','order_address'=>'135 Tran Hung Dao, Phuong Cau Ong Lanh, Quan 1, TP Ho Chi Minh','order_phone'=>'0919941037','order_email'=>'cattuongw2000@gmail.com','method'=>'cod','status'=>'confirmed','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '10/04/2023 00:00:00')],
        ];
        try {
            foreach($orders as $order){
                DB::table('order')->insert($order);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
