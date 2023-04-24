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
            ['order_code'=>'USR2_0','id_user'=>2,'receiver'=>"Cat Tuong",'address'=>"135 Tran Hung Dao, Phuong Cau Ong Lanh, Quan 1, TP Ho Chi Minh",'phone'=>"0919941037",'email'=>"cattuongw2000@gmail.com",'method'=>'cod','code_coupon'=>'NEWMEM','status'=>'finished','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '10/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '12/03/2023 00:00:00')],
            ['order_code'=>'USR2_1','id_user'=>2,'receiver'=>"Cat Tuong",'address'=>"135 Tran Hung Dao, Phuong Cau Ong Lanh, Quan 1, TP Ho Chi Minh",'phone'=>"0919941037",'email'=>"cattuongw2000@gmail.com",'method'=>'cod','status'=>'delivery','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '09/04/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '10/04/2023 00:00:00')],
            ['order_code'=>'USR2_2','id_user'=>2,'receiver'=>"Cat Tuong",'address'=>"135 Tran Hung Dao, Phuong Cau Ong Lanh, Quan 1, TP Ho Chi Minh",'phone'=>"0919941037",'email'=>"cattuongw2000@gmail.com",'method'=>'paypal','status'=>'transaction failed','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '10/04/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '13/04/2023 00:00:00')],
            ['order_code'=>'USR2_3','id_user'=>2,'receiver'=>"Cat Tuong",'address'=>"135 Tran Hung Dao, Phuong Cau Ong Lanh, Quan 1, TP Ho Chi Minh",'phone'=>"0919941037",'email'=>"cattuongw2000@gmail.com",'method'=>'cod','status'=>'confirmed','code_coupon'=>'FREESHIP423','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '10/04/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '11/04/2023 00:00:00')],
            ['order_code'=>'USR3_0','id_user'=>3,'receiver'=>"MM",'address'=>"33 Đường, Xã Việt Tiến, Huyện Bảo Yên, Tỉnh Lào Cai",'shipping_fee'=>3,'phone'=>"0919941037",'email'=>"didi01092k@gmail.com",'method'=>'cod','status'=>'finished','code_coupon'=>'NEWMEM','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '10/04/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '15/04/2023 00:00:00')],
            ['order_code'=>'USR3_1','id_user'=>3,'receiver'=>"MM",'address'=>"135 Tran Hung Dao, Phuong Cau Ong Lanh, Quan 1, TP Ho Chi Minh",'phone'=>"0919941037",'email'=>"cattuongw2018@gmail.com",'method'=>'paypal','status'=>'delivery','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '16/04/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '17/04/2023 00:00:00')],
            ['order_code'=>'USR3_2','id_user'=>3,'receiver'=>"MM",'address'=>"34B Đường, Xã Trà Thanh, Huyện Tây Trà, Tỉnh Quảng Ngãi",'shipping_fee'=>3,'phone'=>"0122123435",'email'=>"irisk5202402@gmail.com",'method'=>'cod','status'=>'cancel','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '17/04/2023 02:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '18/04/2023 11:00:00')],
            ['order_code'=>'USR3_3','id_user'=>3,'receiver'=>"MM",'address'=>"33 Đường, Xã Việt Tiến, Huyện Bảo Yên, Tỉnh Lào Cai",'shipping_fee'=>3,'phone'=>"0122123443",'email'=>"cattuongw2000@gmail.com",'method'=>'cod','status'=>'finished','code_coupon'=>'FREESHIP423','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '14/04/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '18/04/2023 00:00:00')],
            ['order_code'=>'USR3_4','id_user'=>3,'receiver'=>"MM",'address'=>"43/32 Nguyen Huu Tien, Phuong Tay Thanh, Quan Tan Phu, TP Ho Chi Minh",'phone'=>"0122123456",'email'=>"cattuongw2000@gmail.com",'method'=>'cod','status'=>'unconfirmed','code_coupon'=>'FREESHIP423','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '17/04/2023 00:00:00')],
            
            ['order_code'=>'GUT_0','receiver'=>"OwO",'address'=>"122 Nguyen Thi Minh Khai, Phuong Pham Ngu Lao, Quan 1, TP Ho Chi Minh",'phone'=>"01221236456",'email'=>"cattuongw2000@gmail.com",'method'=>'cod','status'=>'cancel','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '17/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '18/03/2023 00:00:00')],
            ['order_code'=>'GUT_1','receiver'=>"UwU",'address'=>"123 Nguyen Thi Minh Khai, Phuong Pham Ngu Lao, Quan 1, TP Ho Chi Minh",'phone'=>"01232326798",'email'=>"cattuongw2000@gmail.com",'method'=>'cod','status'=>'delivery','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '03/04/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '10/04/2023 00:00:00')],
            ['order_code'=>'GUT_2','receiver'=>"GawrGura",'address'=>"124 Nguyen Thi Minh Khai, Phuong Pham Ngu Lao, Quan 1, TP Ho Chi Minh",'phone'=>"01232326799",'email'=>"cattuongw2000@gmail.com",'method'=>'paypal','status'=>'unconfirmed','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '17/04/2023 00:00:00')],
            ['order_code'=>'GUT_3','receiver'=>"HHAHAHHA",'address'=>"98 Nguyen Thi Minh Khai, Phuong Pham Ngu Lao, Quan 1, TP Ho Chi Minh",'phone'=>"09199121293",'email'=>"cattuongw2018@gmail.com",'method'=>'paypal','status'=>'finished','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '18/04/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '22/04/2023 00:00:00')],
            ['order_code'=>'GUT_4','receiver'=>"Show & Tell",'address'=>"Art dont sell, Phuong Cau Ong Lanh, Quan 1, TP Ho Chi Minh",'phone'=>"01243234666",'email'=>"cattuongw2000@gmail.com",'method'=>'paypal','status'=>'finished','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '21/04/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '22/04/2023 00:00:00')],
            ['order_code'=>'GUT_5','receiver'=>"NYMPH",'address'=>"Death is Life, Phuong Cau Ong Lanh, Quan 1, TP Ho Chi Minh",'phone'=>"01243234666",'email'=>"cattuongw2000@gmail.com",'method'=>'cod','status'=>'unconfirmed','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '23/04/2023 00:00:00')],
            ['order_code'=>'GUT_6','receiver'=>"SPIDER WEB",'address'=>"oh they can leave when they merged, Phuong Cau Ong Lanh, Quan 1, TP Ho Chi Minh",'phone'=>"01243234568",'email'=>"cattuongw2000@gmail.com",'method'=>'cod','status'=>'delivery','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '24/04/2023 00:00:00')],
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
