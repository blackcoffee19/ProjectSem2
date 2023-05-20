<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class insert_user extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            ['name' => 'admin', 'email' => 'admin@gmail.com',"email_verified"=>true, 'avatar' => 'admin.png', 'phone' => "0120000000", 'password' => Hash::make(123456), 'admin' => '1', 'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '23/01/2022 00:00:00')],
            ['name' => 'User 1', 'email' => 'guest1@gmail.com',"email_verified"=>true, 'avatar' => 'avatar-1.jpg','phone' => '0120000001', 'password' => Hash::make(123456), 'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '29/01/2022 00:00:00')],
            ['name' => 'User 2', 'email' => 'guest2@gmail.com',"email_verified"=>true,'avatar' => 'avatar-2.jpg', 'phone' => '0120000002', 'password' => Hash::make(123456), 'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '30/01/2022 00:00:00')],
            ['name' => 'User 3', 'email' => 'guest3@gmail.com',"email_verified"=>true,'avatar' => 'avatar-3.jpg', 'phone' => '0120000003', 'password' => Hash::make(123456), 'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '31/01/2022 00:00:00')],
            ['name' => 'User 4', 'email' => 'guest4@gmail.com',"email_verified"=>true,'avatar' => 'avatar-4.jpg', 'phone' => '0120000004', 'password' => Hash::make(123456), 'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '01/02/2022 00:00:00')],
            ['name' => 'User 5', 'email' => 'guest5@gmail.com',"email_verified"=>true,'avatar' => 'avatar-5.jpg', 'phone' => '0120000005', 'password' => Hash::make(123456), 'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '01/03/2022 00:00:00')],
            ['name' => 'User 6', 'email' => 'iris01092k@gmail.com',"email_verified"=>false,'avatar' => 'avatar-6.jpg', 'phone' => '0120000006', 'password' => Hash::make(123456), 'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '01/03/2022 00:00:00')],
            ['name' => 'Cat Tuong', 'email' => 'cattuongw2000@gmail.com',"email_verified"=>true, 'avatar' => 'user_0_meme-2.jpg', 'phone' => '0919941037', 'password' => Hash::make(123456), 'admin' => '1', 'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '23/11/2022 00:00:00')],
            ['name' => 'host', 'email' => 'host@gmail.com',"email_verified"=>true, 'password' => Hash::make(123456), 'admin' => '2', 'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '23/01/2022 00:00:00')]
        ];
        try {
            foreach ($user as $usr) {
                DB::table('users')->insert($usr);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
