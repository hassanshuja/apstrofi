<?php

use Illuminate\Database\Seeder;

class ProductTagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_tags')->delete();
        
        \DB::table('product_tags')->insert(array (
            0 => 
            array (
                'id' => 1,
                'product_id' => 1,
                'tag_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'product_id' => 1,
                'tag_id' => 6,
            ),
            2 => 
            array (
                'id' => 3,
                'product_id' => 2,
                'tag_id' => 4,
            ),
            3 => 
            array (
                'id' => 4,
                'product_id' => 2,
                'tag_id' => 11,
            ),
            4 => 
            array (
                'id' => 5,
                'product_id' => 4,
                'tag_id' => 6,
            ),
            5 => 
            array (
                'id' => 6,
                'product_id' => 4,
                'tag_id' => 7,
            ),
            6 => 
            array (
                'id' => 7,
                'product_id' => 4,
                'tag_id' => 9,
            ),
            7 => 
            array (
                'id' => 8,
                'product_id' => 7,
                'tag_id' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'product_id' => 7,
                'tag_id' => 7,
            ),
            9 => 
            array (
                'id' => 10,
                'product_id' => 8,
                'tag_id' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'product_id' => 8,
                'tag_id' => 4,
            ),
            11 => 
            array (
                'id' => 12,
                'product_id' => 9,
                'tag_id' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'product_id' => 9,
                'tag_id' => 4,
            ),
            13 => 
            array (
                'id' => 14,
                'product_id' => 10,
                'tag_id' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'product_id' => 10,
                'tag_id' => 6,
            ),
            15 => 
            array (
                'id' => 16,
                'product_id' => 10,
                'tag_id' => 7,
            ),
            16 => 
            array (
                'id' => 17,
                'product_id' => 11,
                'tag_id' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'product_id' => 12,
                'tag_id' => 1,
            ),
            18 => 
            array (
                'id' => 19,
                'product_id' => 12,
                'tag_id' => 6,
            ),
            19 => 
            array (
                'id' => 20,
                'product_id' => 12,
                'tag_id' => 10,
            ),
            20 => 
            array (
                'id' => 21,
                'product_id' => 15,
                'tag_id' => 1,
            ),
            21 => 
            array (
                'id' => 22,
                'product_id' => 15,
                'tag_id' => 6,
            ),
            22 => 
            array (
                'id' => 23,
                'product_id' => 15,
                'tag_id' => 10,
            ),
            23 => 
            array (
                'id' => 24,
                'product_id' => 16,
                'tag_id' => 5,
            ),
            24 => 
            array (
                'id' => 25,
                'product_id' => 19,
                'tag_id' => 1,
            ),
            25 => 
            array (
                'id' => 26,
                'product_id' => 19,
                'tag_id' => 6,
            ),
            26 => 
            array (
                'id' => 27,
                'product_id' => 20,
                'tag_id' => 5,
            ),
            27 => 
            array (
                'id' => 28,
                'product_id' => 21,
                'tag_id' => 1,
            ),
            28 => 
            array (
                'id' => 29,
                'product_id' => 21,
                'tag_id' => 6,
            ),
            29 => 
            array (
                'id' => 30,
                'product_id' => 23,
                'tag_id' => 5,
            ),
            30 => 
            array (
                'id' => 31,
                'product_id' => 24,
                'tag_id' => 1,
            ),
            31 => 
            array (
                'id' => 32,
                'product_id' => 24,
                'tag_id' => 3,
            ),
            32 => 
            array (
                'id' => 33,
                'product_id' => 24,
                'tag_id' => 6,
            ),
            33 => 
            array (
                'id' => 34,
                'product_id' => 26,
                'tag_id' => 5,
            ),
            34 => 
            array (
                'id' => 35,
                'product_id' => 27,
                'tag_id' => 6,
            ),
            35 => 
            array (
                'id' => 36,
                'product_id' => 28,
                'tag_id' => 5,
            ),
            36 => 
            array (
                'id' => 37,
                'product_id' => 29,
                'tag_id' => 1,
            ),
            37 => 
            array (
                'id' => 38,
                'product_id' => 29,
                'tag_id' => 6,
            ),
            38 => 
            array (
                'id' => 39,
                'product_id' => 30,
                'tag_id' => 1,
            ),
            39 => 
            array (
                'id' => 40,
                'product_id' => 30,
                'tag_id' => 6,
            ),
            40 => 
            array (
                'id' => 41,
                'product_id' => 31,
                'tag_id' => 5,
            ),
            41 => 
            array (
                'id' => 42,
                'product_id' => 32,
                'tag_id' => 6,
            ),
            42 => 
            array (
                'id' => 43,
                'product_id' => 33,
                'tag_id' => 1,
            ),
            43 => 
            array (
                'id' => 44,
                'product_id' => 33,
                'tag_id' => 6,
            ),
            44 => 
            array (
                'id' => 45,
                'product_id' => 35,
                'tag_id' => 5,
            ),
            45 => 
            array (
                'id' => 46,
                'product_id' => 36,
                'tag_id' => 1,
            ),
            46 => 
            array (
                'id' => 47,
                'product_id' => 36,
                'tag_id' => 6,
            ),
            47 => 
            array (
                'id' => 48,
                'product_id' => 37,
                'tag_id' => 5,
            ),
            48 => 
            array (
                'id' => 49,
                'product_id' => 39,
                'tag_id' => 5,
            ),
            49 => 
            array (
                'id' => 50,
                'product_id' => 41,
                'tag_id' => 1,
            ),
            50 => 
            array (
                'id' => 51,
                'product_id' => 41,
                'tag_id' => 6,
            ),
            51 => 
            array (
                'id' => 52,
                'product_id' => 42,
                'tag_id' => 5,
            ),
            52 => 
            array (
                'id' => 53,
                'product_id' => 43,
                'tag_id' => 10,
            ),
            53 => 
            array (
                'id' => 54,
                'product_id' => 43,
                'tag_id' => 11,
            ),
            54 => 
            array (
                'id' => 55,
                'product_id' => 44,
                'tag_id' => 5,
            ),
            55 => 
            array (
                'id' => 56,
                'product_id' => 45,
                'tag_id' => 1,
            ),
            56 => 
            array (
                'id' => 57,
                'product_id' => 46,
                'tag_id' => 5,
            ),
            57 => 
            array (
                'id' => 58,
                'product_id' => 47,
                'tag_id' => 1,
            ),
            58 => 
            array (
                'id' => 59,
                'product_id' => 48,
                'tag_id' => 5,
            ),
            59 => 
            array (
                'id' => 60,
                'product_id' => 50,
                'tag_id' => 5,
            ),
            60 => 
            array (
                'id' => 61,
                'product_id' => 54,
                'tag_id' => 1,
            ),
            61 => 
            array (
                'id' => 62,
                'product_id' => 54,
                'tag_id' => 2,
            ),
            62 => 
            array (
                'id' => 63,
                'product_id' => 55,
                'tag_id' => 1,
            ),
            63 => 
            array (
                'id' => 64,
                'product_id' => 55,
                'tag_id' => 2,
            ),
            64 => 
            array (
                'id' => 65,
                'product_id' => 56,
                'tag_id' => 6,
            ),
            65 => 
            array (
                'id' => 66,
                'product_id' => 57,
                'tag_id' => 2,
            ),
            66 => 
            array (
                'id' => 67,
                'product_id' => 58,
                'tag_id' => 6,
            ),
            67 => 
            array (
                'id' => 68,
                'product_id' => 59,
                'tag_id' => 1,
            ),
            68 => 
            array (
                'id' => 69,
                'product_id' => 60,
                'tag_id' => 1,
            ),
        ));
        
        
    }
}