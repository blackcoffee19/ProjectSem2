<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class insert_grmessage extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            ['code_group'=>"UCT27",'id_user'=>2,'id_admin'=>7,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '30/03/2023 00:00:00')],
            ['code_group'=>"UCT31",'id_user'=>3,'id_admin'=>1,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '30/04/2023 00:00:00')],
            ['code_group'=>"UCT48",'id_user'=>4,'id_admin'=>8,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '30/02/2023 00:00:00')],
        ];
        try {
            foreach ($groups as $gr ) {
                DB::table('groupmessage')->insert($gr);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
