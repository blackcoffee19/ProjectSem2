<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class insert_typeproduct extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                "type" => "vegetable",
                "image" => "vegetable.jpg",
                "status" => "Active",
                // "created_at" => "2023-04-01 00:00:01",
                // "updated_at" => "2023-04-25 00:00:01",
                "created_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '01/04/2023 00:00:01'),
                "updated_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '25/04/2023 00:00:01'),
            ],
            [
                "type" => "fruit",
                "image" => "fruit.jpg",
                "status" => "Active",
                // "created_at" => "2023-04-01 00:00:01",
                // "updated_at" => "2023-04-25 00:00:01",
                "created_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '01/04/2023 00:00:01'),
                "updated_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '25/04/2023 00:00:01'),
            ],
            [
                "type" => "meat",
                "image" => "meat.jpg",
                "status" => "Active",
                // "created_at" => "2023-04-01 00:00:01",
                // "updated_at" => "2023-04-25 00:00:01",
                "created_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '01/04/2023 00:00:01'),
                "updated_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '25/04/2023 00:00:01'),
            ],
            [
                "type" => "Dairy, Bread & Eggs",
                "image" => "category-dairy-bread-eggs.jpg",
                "status" => "Disabled",
                // "created_at" => "2023-04-01 00:00:01",
                // "updated_at" => "2023-04-25 00:00:01",
                "created_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '01/04/2023 00:00:01'),
                "updated_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '25/04/2023 00:00:01'),
            ],
            [
                "type" => "Snack & Munchies",
                "image" => "category-snack-munchies.jpg",
                "status" => "Disabled",
                // "created_at" => "2023-04-01 00:00:01",
                // "updated_at" => "2023-04-25 00:00:01",
                "created_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '01/04/2023 00:00:01'),
                "updated_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '25/04/2023 00:00:01'),
            ],
            [
                "type" => "Bakery & Biscuits",
                "image" => "category-bakery-biscuits.jpg",
                "status" => "Disabled",
                // "created_at" => "2023-04-01 00:00:01",
                // "updated_at" => "2023-04-25 00:00:01",
                "created_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '01/04/2023 00:00:01'),
                "updated_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '25/04/2023 00:00:01'),
            ],
            [
                "type" => "Instant Food",
                "image" => "category-instant-food.jpg",
                "status" => "Disabled",
                // "created_at" => "2023-04-01 00:00:01",
                // "updated_at" => "2023-04-25 00:00:01",
                "created_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '01/04/2023 00:00:01'),
                "updated_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '25/04/2023 00:00:01'),
            ],
            [
                "type" => "Tea, Coffee & Drinks",
                "image" => "category-tea-coffee-drinks.jpg",
                "status" => "Disabled",
                // "created_at" => "2023-04-01 00:00:01",
                // "updated_at" => "2023-04-25 00:00:01",
                "created_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '01/04/2023 00:00:01'),
                "updated_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '25/04/2023 00:00:01'),
            ],
            [
                "type" => "Atta, Rice & Dal",
                "image" => "category-atta-rice-dal.jpg",
                "status" => "Disabled",
                // "created_at" => "2023-04-01 00:00:01",
                // "updated_at" => "2023-04-25 00:00:01",
                "created_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '01/04/2023 00:00:01'),
                "updated_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '25/04/2023 00:00:01'),
            ],
            [
                "type" => "Baby Care",
                "image" => "category-baby-care.jpg",
                "status" => "Disabled",
                // "created_at" => "2023-04-01 00:00:01",
                // "updated_at" => "2023-04-25 00:00:01",
                "created_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '01/04/2023 00:00:01'),
                "updated_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '25/04/2023 00:00:01'),
            ],
            [
                "type" => "Chicken, Meat & Fish",
                "image" => "category-chicken-meat-fish.jpg",
                "status" => "Disabled",
                // "created_at" => "2023-04-01 00:00:01",
                // "updated_at" => "2023-04-25 00:00:01",
                "created_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '01/04/2023 00:00:01'),
                "updated_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '25/04/2023 00:00:01'),
            ],
            [
                "type" => "Cleaning Essentials",
                "image" => "category-cleaning-essentials.jpg",
                "status" => "Disabled",
                // "created_at" => "2023-04-01 00:00:01",
                // "updated_at" => "2023-04-25 00:00:01",
                "created_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '01/04/2023 00:00:01'),
                "updated_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '25/04/2023 00:00:01'),
            ],
            [
                "type" => "Pet Care",
                "image" => "category-pet-care.jpg",
                "status" => "Disabled",
                // "created_at" => "2023-04-01 00:00:01",
                // "updated_at" => "2023-04-25 00:00:01",
                "created_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '01/04/2023 00:00:01'),
                "updated_at" => Carbon::createFromFormat('d/m/Y H:i:s',  '25/04/2023 00:00:01'),
            ],

        ];
        try {
            foreach ($types as $type) {
                DB::table('typeproduct')->insert($type);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
