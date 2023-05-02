<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class insert_message extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            ['code_group'=>"UCT27","id_user"=>2,'message'=>"How long does it take you to import new vegetables?",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '29/03/2023 00:00:00')],
            ['code_group'=>"UCT27","id_user"=>7,'message'=>"about 2-3 weeks",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/03/2023 03:00:00')],
            ['code_group'=>"UCT27","id_user"=>2,'message'=>"Ok thanks",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/03/2023 09:00:00')],
            ['code_group'=>"UCT27","id_user"=>2,'message'=>"Is anyone here?",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '12/04/2023 09:00:00')],
            ['code_group'=>"UCT27","id_user"=>7,'message'=>"Yes, How can I help you?",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '12/04/2023 11:00:00')],
            
            ['code_group'=>"UCT31","id_user"=>3,'message'=>"Why is buffalo meat so expensive?",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/04/2023 00:00:00')],
            ['code_group'=>"UCT31","id_user"=>1,'message'=>"Sorry our buffalo meat is high quality",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/04/2023 1:33:00')],
            ['code_group'=>"UCT48","id_user"=>4,'message'=>"Hi",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/02/2023 00:00:00')],
            ['code_group'=>"UCT48","id_user"=>8,'message'=>"How can I help you?",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/02/2023 02:00:00')],
            ["id_user"=>3,'message'=>"Do you have octopus?",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '01/05/2023 11:00:00')],
            ["id_user"=>5,'message'=>"do you have shrimps??",'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ["id_user"=>6,'message'=>"Do you have no eggs?",'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
        ];
        try {
            foreach ($messages as $mess) {
                DB::table('message')->insert($mess);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
