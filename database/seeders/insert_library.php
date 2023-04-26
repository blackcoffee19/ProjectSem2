<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class insert_library extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            ["id_product" => 1, 'image' => 'Corn_1.jpg'],
            ["id_product" => 1, 'image' => 'Corn_2.jpg'],
            ["id_product" => 1, 'image' => 'Corn_3.jpg'],
            ["id_product" => 1, 'image' => 'Corn_4.jpg'],

            ["id_product" => 2, 'image' => 'calabash_1.jpg'],
            ["id_product" => 2, 'image' => 'calabash_2.jpg'],
            ["id_product" => 2, 'image' => 'calabash_3.jpg'],
            ["id_product" => 2, 'image' => 'calabash_4.jpg'],

            ["id_product" => 3, 'image' => 'pumkin_1.jpg'],
            ["id_product" => 3, 'image' => 'pumkin_2.jpg'],
            ["id_product" => 3, 'image' => 'pumkin_3.jpg'],
            ["id_product" => 3, 'image' => 'pumkin_4.jpg'],

            ["id_product" => 4, 'image' => 'tomato_1.jpg'],
            ["id_product" => 4, 'image' => 'tomato_2.jpg'],
            ["id_product" => 4, 'image' => 'tomato_3.jpg'],
            ["id_product" => 4, 'image' => 'tomato_4.jpg'],

            ["id_product" => 5, 'image' => 'carrot_1.jpg'],
            ["id_product" => 5, 'image' => 'carrot_2.jpg'],
            ["id_product" => 5, 'image' => 'carrot_3.jpg'],
            ["id_product" => 5, 'image' => 'carrot_4.jpg'],

            ["id_product" => 6, 'image' => 'eggplant_1.jpg'],
            ["id_product" => 6, 'image' => 'eggplant_2.jpg'],
            ["id_product" => 6, 'image' => 'eggplant_3.jpg'],
            ["id_product" => 6, 'image' => 'eggplant_4.jpg'],

            ["id_product" => 7, 'image' => 'White radish_1.jpg'],
            ["id_product" => 7, 'image' => 'White radish_2.jpg'],
            ["id_product" => 7, 'image' => 'White radish_3.jpg'],
            ["id_product" => 7, 'image' => 'White radish_4.jpg'],

            ["id_product" => 8, 'image' => 'onion_1.jpg'],
            ["id_product" => 8, 'image' => 'onion_2.jpg'],
            ["id_product" => 8, 'image' => 'onion_3.jpg'],
            ["id_product" => 8, 'image' => 'onion_4.jpg'],

            ["id_product" => 9, 'image' => 'bell pepper_1.jpg'],
            ["id_product" => 9, 'image' => 'bell pepper_2.jpg'],
            ["id_product" => 9, 'image' => 'bell pepper_3.jpg'],
            ["id_product" => 9, 'image' => 'bell pepper_4.jpg'],

            ["id_product" => 10, 'image' => 'Lettuce_1.jpg'],
            ["id_product" => 10, 'image' => 'Lettuce_2.jpg'],
            ["id_product" => 10, 'image' => 'Lettuce_3.jpg'],
            ["id_product" => 10, 'image' => 'Lettuce_4.jpg'],

            ["id_product" => 11, 'image' => 'coconut_1.jpg'],
            ["id_product" => 11, 'image' => 'coconut_2.jpg'],
            ["id_product" => 11, 'image' => 'coconut_3.png'],
            ["id_product" => 11, 'image' => 'coconut_4.jpg'],

            ["id_product" => 12, 'image' => 'watermelon_1.png'],
            ["id_product" => 12, 'image' => 'watermelon_2.jpg'],
            ["id_product" => 12, 'image' => 'watermelon_3.jpg'],
            ["id_product" => 12, 'image' => 'watermelon_4.png'],

            ["id_product" => 13, 'image' => 'pear_1.jpg'],
            ["id_product" => 13, 'image' => 'pear_2.jpg'],
            ["id_product" => 13, 'image' => 'pear_3.jpg'],
            ["id_product" => 13, 'image' => 'pear_4.jpg'],

            ["id_product" => 14, 'image' => 'plum_1.jpg'],
            ["id_product" => 14, 'image' => 'plum_2.jpg'],
            ["id_product" => 14, 'image' => 'plum_3.jpg'],
            ["id_product" => 14, 'image' => 'plum_4.jpg'],

            ["id_product" => 15, 'image' => 'mangosteen_1.png'],
            ["id_product" => 15, 'image' => 'mangosteen_2.jpeg'],
            ["id_product" => 15, 'image' => 'mangosteen_3.jpg'],
            ["id_product" => 15, 'image' => 'mangosteen_4.jpg'],

            ["id_product" => 16, 'image' => 'durian_1.png'],
            ["id_product" => 16, 'image' => 'durian_2.jpg'],
            ["id_product" => 16, 'image' => 'durian_3.jpg'],
            ["id_product" => 16, 'image' => 'durian_4.png'],

            ["id_product" => 17, 'image' => 'apple_1.jpg'],
            ["id_product" => 17, 'image' => 'apple_2.jpg'],
            ["id_product" => 17, 'image' => 'apple_3.jpg'],
            ["id_product" => 17, 'image' => 'apple_4.jpg'],

            ["id_product" => 18, 'image' => 'pinapple_1.jpg'],
            ["id_product" => 18, 'image' => 'pinapple_2.jpg'],
            ["id_product" => 18, 'image' => 'pinapple_3.jpg'],
            ["id_product" => 18, 'image' => 'pinapple_4.jpg'],

            ["id_product" => 19, 'image' => 'litchi_1.jpg'],
            ["id_product" => 19, 'image' => 'litchi_2.jpg'],
            ["id_product" => 19, 'image' => 'litchi_3.jpg'],
            ["id_product" => 19, 'image' => 'litchi_4.png'],

            ["id_product" => 20, 'image' => 'mango_1.jpg'],
            ["id_product" => 20, 'image' => 'mango_2.jpg'],
            ["id_product" => 20, 'image' => 'mango_3.png'],
            ["id_product" => 20, 'image' => 'mango_4.jpg'],

            ["id_product" => 21, 'image' => 'beef_1.jpg'],
            ["id_product" => 21, 'image' => 'beef_2.jpg'],
            ["id_product" => 21, 'image' => 'beef_3.jpg'],
            ["id_product" => 21, 'image' => 'beef_4.jpg'],

            ["id_product" => 22, 'image' => 'plaice_1.jpg'],
            ["id_product" => 22, 'image' => 'plaice_2.jpg'],
            ["id_product" => 22, 'image' => 'plaice_3.jpg'],
            ["id_product" => 22, 'image' => 'plaice_4.jpg'],

            ["id_product" => 23, 'image' => 'Snakehead fish_1.jpg'],
            ["id_product" => 23, 'image' => 'Snakehead fish_2.jpg'],
            ["id_product" => 23, 'image' => 'Snakehead fish_3.jpg'],
            ["id_product" => 23, 'image' => 'Snakehead fish_4.jpg'],

            ["id_product" => 24, 'image' => 'tuna_1.jpg'],
            ["id_product" => 24, 'image' => 'tuna_2.jpg'],
            ["id_product" => 24, 'image' => 'tuna_3.jpg'],
            ["id_product" => 24, 'image' => 'tuna_4.jpg'],

            ["id_product" => 25, 'image' => 'mackerel_1.jpg'],
            ["id_product" => 25, 'image' => 'mackerel_2.png'],
            ["id_product" => 25, 'image' => 'mackerel_3.jpg'],
            ["id_product" => 25, 'image' => 'mackerel_4.jpg'],

            ["id_product" => 26, 'image' => 'goat_1.jpg'],
            ["id_product" => 26, 'image' => 'goat_2.jpg'],
            ["id_product" => 26, 'image' => 'goat_3.jpg'],
            ["id_product" => 26, 'image' => 'goat_4.png'],

            ["id_product" => 27, 'image' => 'chicken_1.jpg'],
            ["id_product" => 27, 'image' => 'chicken_2.jpg'],
            ["id_product" => 27, 'image' => 'chicken_3.jpg'],
            ["id_product" => 27, 'image' => 'chicken_4.jpg'],

            ["id_product" => 28, 'image' => 'pork_1.jpg'],
            ["id_product" => 28, 'image' => 'pork_2.png'],
            ["id_product" => 28, 'image' => 'pork_3.jpg'],
            ["id_product" => 28, 'image' => 'pork_4.jpg'],

            ["id_product" => 29, 'image' => 'lamb_1.jpg'],
            ["id_product" => 29, 'image' => 'lamb_2.png'],
            ["id_product" => 29, 'image' => 'lamb_3.jpg'],
            ["id_product" => 29, 'image' => 'lamb_4.jpg'],

            ["id_product" => 30, 'image' => 'Buffalo_1.jpg'],
            ["id_product" => 30, 'image' => 'Buffalo_2.jpg'],
            ["id_product" => 30, 'image' => 'Buffalo_3.jpg'],
            ["id_product" => 30, 'image' => 'Buffalo_4.jpg'],


        ];
        try {
            foreach ($images as $img) {
                DB::table('library')->insert($img);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
