<?php

use Illuminate\Database\Seeder;

class CategoriesShopsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories_shops')->delete();
        
        \DB::table('categories_shops')->insert(array (
            0 => 
            array (
                'id' => 1,
                'shop_id' => 2,
                'category_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'shop_id' => 1,
                'category_id' => 2,
            ),
            2 => 
            array (
                'id' => 6,
                'shop_id' => 1,
                'category_id' => 6,
            ),
            3 => 
            array (
                'id' => 8,
                'shop_id' => 1,
                'category_id' => 8,
            ),
            4 => 
            array (
                'id' => 9,
                'shop_id' => 2,
                'category_id' => 9,
            ),
            5 => 
            array (
                'id' => 10,
                'shop_id' => 1,
                'category_id' => 10,
            ),
            6 => 
            array (
                'id' => 11,
                'shop_id' => 2,
                'category_id' => 11,
            ),
            7 => 
            array (
                'id' => 12,
                'shop_id' => 1,
                'category_id' => 12,
            ),
            8 => 
            array (
                'id' => 14,
                'shop_id' => 2,
                'category_id' => 14,
            ),
            9 => 
            array (
                'id' => 15,
                'shop_id' => 2,
                'category_id' => 15,
            ),
            10 => 
            array (
                'id' => 17,
                'shop_id' => 2,
                'category_id' => 17,
            ),
            11 => 
            array (
                'id' => 18,
                'shop_id' => 1,
                'category_id' => 18,
            ),
            12 => 
            array (
                'id' => 20,
                'shop_id' => 1,
                'category_id' => 19,
            ),
            13 => 
            array (
                'id' => 21,
                'shop_id' => 2,
                'category_id' => 19,
            ),
            14 => 
            array (
                'id' => 22,
                'shop_id' => 1,
                'category_id' => 20,
            ),
            15 => 
            array (
                'id' => 23,
                'shop_id' => 2,
                'category_id' => 20,
            ),
            16 => 
            array (
                'id' => 24,
                'shop_id' => 1,
                'category_id' => 21,
            ),
            17 => 
            array (
                'id' => 27,
                'shop_id' => 2,
                'category_id' => 22,
            ),
            18 => 
            array (
                'id' => 28,
                'shop_id' => 1,
                'category_id' => 23,
            ),
            19 => 
            array (
                'id' => 30,
                'shop_id' => 2,
                'category_id' => 25,
            ),
            20 => 
            array (
                'id' => 32,
                'shop_id' => 2,
                'category_id' => 26,
            ),
            21 => 
            array (
                'id' => 33,
                'shop_id' => 1,
                'category_id' => 27,
            ),
            22 => 
            array (
                'id' => 35,
                'shop_id' => 1,
                'category_id' => 28,
            ),
            23 => 
            array (
                'id' => 36,
                'shop_id' => 2,
                'category_id' => 28,
            ),
            24 => 
            array (
                'id' => 37,
                'shop_id' => 1,
                'category_id' => 29,
            ),
            25 => 
            array (
                'id' => 38,
                'shop_id' => 2,
                'category_id' => 29,
            ),
            26 => 
            array (
                'id' => 39,
                'shop_id' => 1,
                'category_id' => 30,
            ),
            27 => 
            array (
                'id' => 40,
                'shop_id' => 2,
                'category_id' => 30,
            ),
            28 => 
            array (
                'id' => 41,
                'shop_id' => 1,
                'category_id' => 31,
            ),
            29 => 
            array (
                'id' => 43,
                'shop_id' => 2,
                'category_id' => 32,
            ),
            30 => 
            array (
                'id' => 45,
                'shop_id' => 1,
                'category_id' => 34,
            ),
            31 => 
            array (
                'id' => 47,
                'shop_id' => 1,
                'category_id' => 36,
            ),
            32 => 
            array (
                'id' => 50,
                'shop_id' => 1,
                'category_id' => 39,
            ),
            33 => 
            array (
                'id' => 51,
                'shop_id' => 2,
                'category_id' => 40,
            ),
            34 => 
            array (
                'id' => 52,
                'shop_id' => 1,
                'category_id' => 41,
            ),
            35 => 
            array (
                'id' => 53,
                'shop_id' => 2,
                'category_id' => 42,
            ),
            36 => 
            array (
                'id' => 54,
                'shop_id' => 1,
                'category_id' => 43,
            ),
            37 => 
            array (
                'id' => 55,
                'shop_id' => 1,
                'category_id' => 44,
            ),
            38 => 
            array (
                'id' => 57,
                'shop_id' => 2,
                'category_id' => 46,
            ),
            39 => 
            array (
                'id' => 58,
                'shop_id' => 1,
                'category_id' => 47,
            ),
            40 => 
            array (
                'id' => 61,
                'shop_id' => 2,
                'category_id' => 49,
            ),
            41 => 
            array (
                'id' => 63,
                'shop_id' => 2,
                'category_id' => 50,
            ),
            42 => 
            array (
                'id' => 64,
                'shop_id' => 2,
                'category_id' => 51,
            ),
            43 => 
            array (
                'id' => 65,
                'shop_id' => 2,
                'category_id' => 52,
            ),
            44 => 
            array (
                'id' => 67,
                'shop_id' => 2,
                'category_id' => 54,
            ),
            45 => 
            array (
                'id' => 68,
                'shop_id' => 1,
                'category_id' => 55,
            ),
            46 => 
            array (
                'id' => 70,
                'shop_id' => 2,
                'category_id' => 57,
            ),
            47 => 
            array (
                'id' => 72,
                'shop_id' => 2,
                'category_id' => 59,
            ),
            48 => 
            array (
                'id' => 73,
                'shop_id' => 1,
                'category_id' => 60,
            ),
            49 => 
            array (
                'id' => 74,
                'shop_id' => 2,
                'category_id' => 60,
            ),
            50 => 
            array (
                'id' => 75,
                'shop_id' => 2,
                'category_id' => 61,
            ),
            51 => 
            array (
                'id' => 77,
                'shop_id' => 1,
                'category_id' => 1,
            ),
            52 => 
            array (
                'id' => 78,
                'shop_id' => 2,
                'category_id' => 3,
            ),
            53 => 
            array (
                'id' => 79,
                'shop_id' => 1,
                'category_id' => 4,
            ),
            54 => 
            array (
                'id' => 80,
                'shop_id' => 2,
                'category_id' => 5,
            ),
            55 => 
            array (
                'id' => 81,
                'shop_id' => 1,
                'category_id' => 7,
            ),
            56 => 
            array (
                'id' => 82,
                'shop_id' => 2,
                'category_id' => 8,
            ),
            57 => 
            array (
                'id' => 83,
                'shop_id' => 1,
                'category_id' => 9,
            ),
            58 => 
            array (
                'id' => 84,
                'shop_id' => 2,
                'category_id' => 10,
            ),
            59 => 
            array (
                'id' => 85,
                'shop_id' => 1,
                'category_id' => 13,
            ),
            60 => 
            array (
                'id' => 86,
                'shop_id' => 1,
                'category_id' => 16,
            ),
            61 => 
            array (
                'id' => 87,
                'shop_id' => 2,
                'category_id' => 24,
            ),
            62 => 
            array (
                'id' => 88,
                'shop_id' => 2,
                'category_id' => 33,
            ),
            63 => 
            array (
                'id' => 89,
                'shop_id' => 2,
                'category_id' => 34,
            ),
            64 => 
            array (
                'id' => 90,
                'shop_id' => 2,
                'category_id' => 35,
            ),
            65 => 
            array (
                'id' => 91,
                'shop_id' => 2,
                'category_id' => 36,
            ),
            66 => 
            array (
                'id' => 92,
                'shop_id' => 2,
                'category_id' => 37,
            ),
            67 => 
            array (
                'id' => 93,
                'shop_id' => 2,
                'category_id' => 38,
            ),
            68 => 
            array (
                'id' => 94,
                'shop_id' => 2,
                'category_id' => 39,
            ),
            69 => 
            array (
                'id' => 95,
                'shop_id' => 2,
                'category_id' => 41,
            ),
            70 => 
            array (
                'id' => 96,
                'shop_id' => 2,
                'category_id' => 44,
            ),
            71 => 
            array (
                'id' => 97,
                'shop_id' => 2,
                'category_id' => 45,
            ),
            72 => 
            array (
                'id' => 98,
                'shop_id' => 1,
                'category_id' => 48,
            ),
            73 => 
            array (
                'id' => 99,
                'shop_id' => 1,
                'category_id' => 51,
            ),
            74 => 
            array (
                'id' => 100,
                'shop_id' => 1,
                'category_id' => 52,
            ),
            75 => 
            array (
                'id' => 101,
                'shop_id' => 1,
                'category_id' => 53,
            ),
            76 => 
            array (
                'id' => 102,
                'shop_id' => 2,
                'category_id' => 55,
            ),
            77 => 
            array (
                'id' => 103,
                'shop_id' => 1,
                'category_id' => 56,
            ),
            78 => 
            array (
                'id' => 104,
                'shop_id' => 1,
                'category_id' => 58,
            ),
            79 => 
            array (
                'id' => 105,
                'shop_id' => 1,
                'category_id' => 62,
            ),
            80 => 
            array (
                'id' => 106,
                'shop_id' => 2,
                'category_id' => 63,
            ),
            81 => 
            array (
                'id' => 107,
                'shop_id' => 1,
                'category_id' => 64,
            ),
            82 => 
            array (
                'id' => 108,
                'shop_id' => 1,
                'category_id' => 65,
            ),
            83 => 
            array (
                'id' => 109,
                'shop_id' => 2,
                'category_id' => 65,
            ),
            84 => 
            array (
                'id' => 110,
                'shop_id' => 1,
                'category_id' => 66,
            ),
            85 => 
            array (
                'id' => 111,
                'shop_id' => 2,
                'category_id' => 66,
            ),
            86 => 
            array (
                'id' => 112,
                'shop_id' => 1,
                'category_id' => 67,
            ),
            87 => 
            array (
                'id' => 113,
                'shop_id' => 2,
                'category_id' => 67,
            ),
            88 => 
            array (
                'id' => 114,
                'shop_id' => 2,
                'category_id' => 68,
            ),
            89 => 
            array (
                'id' => 115,
                'shop_id' => 1,
                'category_id' => 69,
            ),
            90 => 
            array (
                'id' => 116,
                'shop_id' => 2,
                'category_id' => 69,
            ),
            91 => 
            array (
                'id' => 117,
                'shop_id' => 2,
                'category_id' => 70,
            ),
            92 => 
            array (
                'id' => 118,
                'shop_id' => 1,
                'category_id' => 71,
            ),
            93 => 
            array (
                'id' => 119,
                'shop_id' => 2,
                'category_id' => 71,
            ),
            94 => 
            array (
                'id' => 120,
                'shop_id' => 1,
                'category_id' => 72,
            ),
            95 => 
            array (
                'id' => 121,
                'shop_id' => 2,
                'category_id' => 72,
            ),
            96 => 
            array (
                'id' => 122,
                'shop_id' => 2,
                'category_id' => 73,
            ),
            97 => 
            array (
                'id' => 123,
                'shop_id' => 1,
                'category_id' => 74,
            ),
            98 => 
            array (
                'id' => 124,
                'shop_id' => 1,
                'category_id' => 75,
            ),
            99 => 
            array (
                'id' => 125,
                'shop_id' => 2,
                'category_id' => 76,
            ),
            100 => 
            array (
                'id' => 126,
                'shop_id' => 1,
                'category_id' => 77,
            ),
            101 => 
            array (
                'id' => 127,
                'shop_id' => 2,
                'category_id' => 78,
            ),
            102 => 
            array (
                'id' => 128,
                'shop_id' => 1,
                'category_id' => 79,
            ),
            103 => 
            array (
                'id' => 129,
                'shop_id' => 2,
                'category_id' => 79,
            ),
            104 => 
            array (
                'id' => 130,
                'shop_id' => 1,
                'category_id' => 80,
            ),
            105 => 
            array (
                'id' => 131,
                'shop_id' => 2,
                'category_id' => 81,
            ),
            106 => 
            array (
                'id' => 132,
                'shop_id' => 1,
                'category_id' => 82,
            ),
            107 => 
            array (
                'id' => 133,
                'shop_id' => 2,
                'category_id' => 82,
            ),
            108 => 
            array (
                'id' => 134,
                'shop_id' => 1,
                'category_id' => 83,
            ),
            109 => 
            array (
                'id' => 135,
                'shop_id' => 1,
                'category_id' => 84,
            ),
            110 => 
            array (
                'id' => 136,
                'shop_id' => 2,
                'category_id' => 84,
            ),
            111 => 
            array (
                'id' => 137,
                'shop_id' => 1,
                'category_id' => 85,
            ),
            112 => 
            array (
                'id' => 138,
                'shop_id' => 2,
                'category_id' => 86,
            ),
        ));
        
        
    }
}