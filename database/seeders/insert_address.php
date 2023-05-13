<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class insert_address extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $addresses = [
            ['id_user'=>3,'receiver'=>"Quan","address"=>"10 Đường gì đấy","ward"=> "Xã Tân Hưng","district"=> "Huyện Bàu Bàng",'ward_id'=>440806,"province"=> "Bình Dương",'province_id'=>205,"district_id"=>3132,"phone"=>"01901919123","email"=>'cattuongw2000@gmail.com','default'=>true,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/01/2023 00:00:00')],
            ['id_user'=>2,'receiver'=>"Hien","address"=>"34B Đường 1","ward"=>"Xã Trà Thanh","district"=>"Huyện Tây Trà",'ward_id'=>351406, "province"=>"Quảng Ngãi",'province_id'=>242,"district_id"=>2222,"phone"=>"01901919123","email"=>'didi01092k@gmail.com','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/02/2023 00:00:00')],
            ['id_user'=>3,'receiver'=>"Dang","address"=>"33 Đường","ward"=> "Xã Việt Tiến", "district"=> "Huyện Bảo Yên",'ward_id'=>80714, "province"=>"Lào Cai",'province_id'=>269,"phone"=>"01901919123","district_id"=>1891,"email"=>'cattuongw2018@gmail.com','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/12/2022 00:00:00')],
            ['id_user'=>2,'receiver'=>"Tuong",'address'=>"135 Trần Hưng Đạo", "ward"=>"phường Cầu Ông Lãnh","district" =>"Quận 1",'ward_id'=>20104,"province"=> "Hồ Chí Minh",'province_id'=>202,'phone'=>"0919941037","district_id"=>1442,'email'=>"cattuongw2000@gmail.com",'default'=>true,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/11/2022 00:00:00')],
            ['id_user'=>4,'receiver'=>"Who",'address'=>"12 Le Van Sy", "ward"=>"Phường 5", "district" =>"Quận 3","province" =>"Hồ Chí Minh",'ward_id'=>20305,'phone'=>"09219221124",'province_id'=>202,'email'=>"cattuongw2018@gmail.com","district_id"=>1444,'default'=>true,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/01/2023 00:00:00')]
        ];
        try {
            foreach($addresses as $add){
                DB::table('address')->insert($add);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
