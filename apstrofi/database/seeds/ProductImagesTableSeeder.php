<?php

use Illuminate\Database\Seeder;

class ProductImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_images')->delete();
        
        \DB::table('product_images')->insert(array (
            0 => 
            array (
                'id' => 1,
                'product_id' => 1,
                'image_url' => 'storage/images/product/1/768_1559814398.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/1/768_small_1559814398.jpeg',
                'order_by' => 1,
                'created_at' => '2019-06-06 09:46:38',
                'updated_at' => '2019-06-06 09:46:38',
            ),
            1 => 
            array (
                'id' => 2,
                'product_id' => 2,
                'image_url' => 'storage/images/product/2/7681_1559814491.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/2/7681_small_1559814491.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 09:48:11',
                'updated_at' => '2019-06-06 09:48:11',
            ),
            2 => 
            array (
                'id' => 3,
                'product_id' => 3,
                'image_url' => 'storage/images/product/3/7682_1559814611.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/3/7682_small_1559814611.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 09:50:11',
                'updated_at' => '2019-06-06 09:50:11',
            ),
            3 => 
            array (
                'id' => 4,
                'product_id' => 4,
                'image_url' => 'storage/images/product/4/7681_1559814676.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/4/7681_small_1559814676.jpeg',
                'order_by' => 1,
                'created_at' => '2019-06-06 09:51:16',
                'updated_at' => '2019-06-06 09:51:16',
            ),
            4 => 
            array (
                'id' => 5,
                'product_id' => 5,
                'image_url' => 'storage/images/product/5/7683_1559814742.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/5/7683_small_1559814742.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 09:52:22',
                'updated_at' => '2019-06-06 09:52:22',
            ),
            5 => 
            array (
                'id' => 6,
                'product_id' => 6,
                'image_url' => 'storage/images/product/6/7684_1559814830.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/6/7684_small_1559814830.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 09:53:50',
                'updated_at' => '2019-06-06 09:53:50',
            ),
            6 => 
            array (
                'id' => 7,
                'product_id' => 8,
                'image_url' => 'storage/images/product/8/7686_1559814923.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/8/7686_small_1559814923.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 09:55:23',
                'updated_at' => '2019-06-06 09:55:23',
            ),
            7 => 
            array (
                'id' => 8,
                'product_id' => 9,
                'image_url' => 'storage/images/product/9/7685_1559815025.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/9/7685_small_1559815025.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 09:57:05',
                'updated_at' => '2019-06-06 09:57:05',
            ),
            8 => 
            array (
                'id' => 9,
                'product_id' => 10,
                'image_url' => 'storage/images/product/10/7685_1559815055.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/10/7685_small_1559815055.jpeg',
                'order_by' => 1,
                'created_at' => '2019-06-06 09:57:35',
                'updated_at' => '2019-06-06 09:57:35',
            ),
            9 => 
            array (
                'id' => 10,
                'product_id' => 10,
                'image_url' => 'storage/images/product/10/7684_1559815055.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/10/7684_small_1559815055.jpeg',
                'order_by' => 2,
                'created_at' => '2019-06-06 09:57:35',
                'updated_at' => '2019-06-06 09:57:35',
            ),
            10 => 
            array (
                'id' => 11,
                'product_id' => 10,
                'image_url' => 'storage/images/product/10/7683_1559815055.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/10/7683_small_1559815055.jpeg',
                'order_by' => 3,
                'created_at' => '2019-06-06 09:57:35',
                'updated_at' => '2019-06-06 09:57:35',
            ),
            11 => 
            array (
                'id' => 12,
                'product_id' => 7,
                'image_url' => 'storage/images/product/7/7682_1559815083.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/7/7682_small_1559815083.jpeg',
                'order_by' => 1,
                'created_at' => '2019-06-06 09:58:03',
                'updated_at' => '2019-06-06 09:58:03',
            ),
            12 => 
            array (
                'id' => 13,
                'product_id' => 7,
                'image_url' => 'storage/images/product/7/7682_1559815087.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/7/7682_small_1559815087.jpeg',
                'order_by' => 2,
                'created_at' => '2019-06-06 09:58:07',
                'updated_at' => '2019-06-06 09:58:07',
            ),
            13 => 
            array (
                'id' => 14,
                'product_id' => 11,
                'image_url' => 'storage/images/product/11/768 7_1559815171.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/11/768 7_small_1559815171.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 09:59:31',
                'updated_at' => '2019-06-06 09:59:31',
            ),
            14 => 
            array (
                'id' => 15,
                'product_id' => 12,
                'image_url' => 'storage/images/product/12/54_1559815290.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/12/54_small_1559815290.jpeg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:01:30',
                'updated_at' => '2019-06-06 10:01:30',
            ),
            15 => 
            array (
                'id' => 16,
                'product_id' => 12,
                'image_url' => 'storage/images/product/12/52_1559815290.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/12/52_small_1559815290.jpeg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:01:30',
                'updated_at' => '2019-06-06 10:01:30',
            ),
            16 => 
            array (
                'id' => 17,
                'product_id' => 12,
                'image_url' => 'storage/images/product/12/51_1559815290.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/12/51_small_1559815290.jpeg',
                'order_by' => 3,
                'created_at' => '2019-06-06 10:01:30',
                'updated_at' => '2019-06-06 10:01:30',
            ),
            17 => 
            array (
                'id' => 18,
                'product_id' => 12,
                'image_url' => 'storage/images/product/12/5_1559815290.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/12/5_small_1559815290.jpeg',
                'order_by' => 4,
                'created_at' => '2019-06-06 10:01:30',
                'updated_at' => '2019-06-06 10:01:30',
            ),
            18 => 
            array (
                'id' => 19,
                'product_id' => 13,
                'image_url' => 'storage/images/product/13/bag_1559815308.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/13/bag_small_1559815308.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:01:48',
                'updated_at' => '2019-06-06 10:01:48',
            ),
            19 => 
            array (
                'id' => 20,
                'product_id' => 14,
                'image_url' => 'storage/images/product/14/768bag_1559815430.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/14/768bag_small_1559815430.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:03:50',
                'updated_at' => '2019-06-06 10:03:50',
            ),
            20 => 
            array (
                'id' => 21,
                'product_id' => 15,
                'image_url' => 'storage/images/product/15/12_1559815451.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/15/12_small_1559815451.jpeg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:04:11',
                'updated_at' => '2019-06-06 10:04:11',
            ),
            21 => 
            array (
                'id' => 22,
                'product_id' => 15,
                'image_url' => 'storage/images/product/15/11_1559815451.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/15/11_small_1559815451.jpeg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:04:11',
                'updated_at' => '2019-06-06 10:04:11',
            ),
            22 => 
            array (
                'id' => 23,
                'product_id' => 15,
                'image_url' => 'storage/images/product/15/1_1559815451.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/15/1_small_1559815451.jpeg',
                'order_by' => 3,
                'created_at' => '2019-06-06 10:04:11',
                'updated_at' => '2019-06-06 10:04:11',
            ),
            23 => 
            array (
                'id' => 24,
                'product_id' => 16,
            'image_url' => 'storage/images/product/16/768 (2)_1559815479.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/16/768 (2)_small_1559815479.png',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:04:39',
                'updated_at' => '2019-06-06 10:04:39',
            ),
            24 => 
            array (
                'id' => 25,
                'product_id' => 16,
            'image_url' => 'storage/images/product/16/768 (3)_1559815479.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/16/768 (3)_small_1559815479.png',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:04:39',
                'updated_at' => '2019-06-06 10:04:39',
            ),
            25 => 
            array (
                'id' => 26,
                'product_id' => 17,
                'image_url' => 'storage/images/product/17/abc_1559815552.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/17/abc_small_1559815552.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:05:52',
                'updated_at' => '2019-06-06 10:05:52',
            ),
            26 => 
            array (
                'id' => 27,
                'product_id' => 18,
                'image_url' => 'storage/images/product/18/7684e4_1559815697.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/18/7684e4_small_1559815697.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:08:17',
                'updated_at' => '2019-06-06 10:08:17',
            ),
            27 => 
            array (
                'id' => 28,
                'product_id' => 19,
                'image_url' => 'storage/images/product/19/23_1559815707.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/19/23_small_1559815707.jpeg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:08:27',
                'updated_at' => '2019-06-06 10:08:27',
            ),
            28 => 
            array (
                'id' => 29,
                'product_id' => 19,
                'image_url' => 'storage/images/product/19/21_1559815707.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/19/21_small_1559815707.jpeg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:08:27',
                'updated_at' => '2019-06-06 10:08:27',
            ),
            29 => 
            array (
                'id' => 30,
                'product_id' => 19,
                'image_url' => 'storage/images/product/19/2_1559815707.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/19/2_small_1559815707.jpeg',
                'order_by' => 3,
                'created_at' => '2019-06-06 10:08:27',
                'updated_at' => '2019-06-06 10:08:27',
            ),
            30 => 
            array (
                'id' => 31,
                'product_id' => 20,
            'image_url' => 'storage/images/product/20/768 (4)_1559815767.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/20/768 (4)_small_1559815767.png',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:09:27',
                'updated_at' => '2019-06-06 10:09:27',
            ),
            31 => 
            array (
                'id' => 32,
                'product_id' => 20,
            'image_url' => 'storage/images/product/20/768 (6)_1559815767.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/20/768 (6)_small_1559815767.png',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:09:27',
                'updated_at' => '2019-06-06 10:09:27',
            ),
            32 => 
            array (
                'id' => 33,
                'product_id' => 18,
                'image_url' => 'storage/images/product/18/7667_1559815845.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/18/7667_small_1559815845.jpg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:10:45',
                'updated_at' => '2019-06-06 10:10:45',
            ),
            33 => 
            array (
                'id' => 34,
                'product_id' => 18,
                'image_url' => 'storage/images/product/18/7684e4_1559815845.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/18/7684e4_small_1559815845.jpg',
                'order_by' => 3,
                'created_at' => '2019-06-06 10:10:45',
                'updated_at' => '2019-06-06 10:10:45',
            ),
            34 => 
            array (
                'id' => 35,
                'product_id' => 21,
                'image_url' => 'storage/images/product/21/31_1559815881.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/21/31_small_1559815881.jpeg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:11:22',
                'updated_at' => '2019-06-06 10:11:22',
            ),
            35 => 
            array (
                'id' => 36,
                'product_id' => 21,
                'image_url' => 'storage/images/product/21/3_1559815881.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/21/3_small_1559815881.jpeg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:11:22',
                'updated_at' => '2019-06-06 10:11:22',
            ),
            36 => 
            array (
                'id' => 37,
                'product_id' => 22,
                'image_url' => 'storage/images/product/22/b_1559815956.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/22/b_small_1559815956.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:12:36',
                'updated_at' => '2019-06-06 10:12:36',
            ),
            37 => 
            array (
                'id' => 38,
                'product_id' => 22,
                'image_url' => 'storage/images/product/22/bag_1559815956.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/22/bag_small_1559815956.jpg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:12:36',
                'updated_at' => '2019-06-06 10:12:36',
            ),
            38 => 
            array (
                'id' => 39,
                'product_id' => 23,
            'image_url' => 'storage/images/product/23/768 (7)_1559815956.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/23/768 (7)_small_1559815956.png',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:12:37',
                'updated_at' => '2019-06-06 10:12:37',
            ),
            39 => 
            array (
                'id' => 40,
                'product_id' => 23,
            'image_url' => 'storage/images/product/23/768 (8)_1559815957.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/23/768 (8)_small_1559815957.png',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:12:37',
                'updated_at' => '2019-06-06 10:12:37',
            ),
            40 => 
            array (
                'id' => 41,
                'product_id' => 24,
                'image_url' => 'storage/images/product/24/63_1559816032.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/24/63_small_1559816032.jpeg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:13:52',
                'updated_at' => '2019-06-06 10:13:52',
            ),
            41 => 
            array (
                'id' => 42,
                'product_id' => 24,
                'image_url' => 'storage/images/product/24/61_1559816032.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/24/61_small_1559816032.jpeg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:13:52',
                'updated_at' => '2019-06-06 10:13:52',
            ),
            42 => 
            array (
                'id' => 43,
                'product_id' => 24,
                'image_url' => 'storage/images/product/24/6_1559816032.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/24/6_small_1559816032.jpeg',
                'order_by' => 3,
                'created_at' => '2019-06-06 10:13:53',
                'updated_at' => '2019-06-06 10:13:53',
            ),
            43 => 
            array (
                'id' => 44,
                'product_id' => 25,
                'image_url' => 'storage/images/product/25/1_1559816074.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/25/1_small_1559816074.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:14:34',
                'updated_at' => '2019-06-06 10:14:34',
            ),
            44 => 
            array (
                'id' => 45,
                'product_id' => 25,
                'image_url' => 'storage/images/product/25/2_1559816074.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/25/2_small_1559816074.jpg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:14:34',
                'updated_at' => '2019-06-06 10:14:34',
            ),
            45 => 
            array (
                'id' => 46,
                'product_id' => 26,
            'image_url' => 'storage/images/product/26/768 (9)_1559816123.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/26/768 (9)_small_1559816123.png',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:15:23',
                'updated_at' => '2019-06-06 10:15:23',
            ),
            46 => 
            array (
                'id' => 47,
                'product_id' => 26,
            'image_url' => 'storage/images/product/26/768 (10)_1559816123.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/26/768 (10)_small_1559816123.png',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:15:23',
                'updated_at' => '2019-06-06 10:15:23',
            ),
            47 => 
            array (
                'id' => 48,
                'product_id' => 17,
                'image_url' => 'storage/images/product/17/ol_1559816154.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/17/ol_small_1559816154.jpg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:15:54',
                'updated_at' => '2019-06-06 10:15:54',
            ),
            48 => 
            array (
                'id' => 49,
                'product_id' => 17,
                'image_url' => 'storage/images/product/17/ol2_1559816154.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/17/ol2_small_1559816154.jpg',
                'order_by' => 3,
                'created_at' => '2019-06-06 10:15:54',
                'updated_at' => '2019-06-06 10:15:54',
            ),
            49 => 
            array (
                'id' => 50,
                'product_id' => 17,
                'image_url' => 'storage/images/product/17/ol3_1559816154.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/17/ol3_small_1559816154.jpg',
                'order_by' => 4,
                'created_at' => '2019-06-06 10:15:54',
                'updated_at' => '2019-06-06 10:15:54',
            ),
            50 => 
            array (
                'id' => 51,
                'product_id' => 27,
                'image_url' => 'storage/images/product/27/71_1559816185.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/27/71_small_1559816185.jpeg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:16:25',
                'updated_at' => '2019-06-06 10:16:25',
            ),
            51 => 
            array (
                'id' => 52,
                'product_id' => 27,
                'image_url' => 'storage/images/product/27/7_1559816185.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/27/7_small_1559816185.jpeg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:16:25',
                'updated_at' => '2019-06-06 10:16:25',
            ),
            52 => 
            array (
                'id' => 53,
                'product_id' => 28,
            'image_url' => 'storage/images/product/28/768 (11)_1559816264.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/28/768 (11)_small_1559816264.png',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:17:44',
                'updated_at' => '2019-06-06 10:17:44',
            ),
            53 => 
            array (
                'id' => 54,
                'product_id' => 28,
            'image_url' => 'storage/images/product/28/768 (12)_1559816264.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/28/768 (12)_small_1559816264.png',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:17:44',
                'updated_at' => '2019-06-06 10:17:44',
            ),
            54 => 
            array (
                'id' => 55,
                'product_id' => 29,
                'image_url' => 'storage/images/product/29/81_1559816304.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/29/81_small_1559816304.jpeg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:18:24',
                'updated_at' => '2019-06-06 10:18:24',
            ),
            55 => 
            array (
                'id' => 56,
                'product_id' => 29,
                'image_url' => 'storage/images/product/29/8_1559816304.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/29/8_small_1559816304.jpeg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:18:24',
                'updated_at' => '2019-06-06 10:18:24',
            ),
            56 => 
            array (
                'id' => 57,
                'product_id' => 30,
                'image_url' => 'storage/images/product/30/1_1559816369.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/30/1_small_1559816369.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:19:29',
                'updated_at' => '2019-06-06 10:19:29',
            ),
            57 => 
            array (
                'id' => 58,
                'product_id' => 30,
                'image_url' => 'storage/images/product/30/2_1559816369.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/30/2_small_1559816369.jpg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:19:29',
                'updated_at' => '2019-06-06 10:19:29',
            ),
            58 => 
            array (
                'id' => 59,
                'product_id' => 30,
                'image_url' => 'storage/images/product/30/3_1559816369.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/30/3_small_1559816369.jpg',
                'order_by' => 3,
                'created_at' => '2019-06-06 10:19:29',
                'updated_at' => '2019-06-06 10:19:29',
            ),
            59 => 
            array (
                'id' => 60,
                'product_id' => 30,
                'image_url' => 'storage/images/product/30/4_1559816369.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/30/4_small_1559816369.jpg',
                'order_by' => 4,
                'created_at' => '2019-06-06 10:19:30',
                'updated_at' => '2019-06-06 10:19:30',
            ),
            60 => 
            array (
                'id' => 61,
                'product_id' => 31,
            'image_url' => 'storage/images/product/31/768 (13)_1559816423.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/31/768 (13)_small_1559816423.png',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:20:23',
                'updated_at' => '2019-06-06 10:20:23',
            ),
            61 => 
            array (
                'id' => 62,
                'product_id' => 31,
            'image_url' => 'storage/images/product/31/768 (14)_1559816423.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/31/768 (14)_small_1559816423.png',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:20:23',
                'updated_at' => '2019-06-06 10:20:23',
            ),
            62 => 
            array (
                'id' => 63,
                'product_id' => 32,
                'image_url' => 'storage/images/product/32/112_1559816475.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/32/112_small_1559816475.jpeg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:21:15',
                'updated_at' => '2019-06-06 10:21:15',
            ),
            63 => 
            array (
                'id' => 64,
                'product_id' => 32,
                'image_url' => 'storage/images/product/32/111_1559816475.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/32/111_small_1559816475.jpeg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:21:15',
                'updated_at' => '2019-06-06 10:21:15',
            ),
            64 => 
            array (
                'id' => 65,
                'product_id' => 33,
                'image_url' => 'storage/images/product/33/a_1559816475.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/33/a_small_1559816475.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:21:15',
                'updated_at' => '2019-06-06 10:21:15',
            ),
            65 => 
            array (
                'id' => 66,
                'product_id' => 33,
                'image_url' => 'storage/images/product/33/b_1559816475.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/33/b_small_1559816475.jpg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:21:15',
                'updated_at' => '2019-06-06 10:21:15',
            ),
            66 => 
            array (
                'id' => 67,
                'product_id' => 33,
                'image_url' => 'storage/images/product/33/c_1559816475.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/33/c_small_1559816475.jpg',
                'order_by' => 3,
                'created_at' => '2019-06-06 10:21:15',
                'updated_at' => '2019-06-06 10:21:15',
            ),
            67 => 
            array (
                'id' => 68,
                'product_id' => 33,
                'image_url' => 'storage/images/product/33/d_1559816475.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/33/d_small_1559816475.jpg',
                'order_by' => 4,
                'created_at' => '2019-06-06 10:21:15',
                'updated_at' => '2019-06-06 10:21:15',
            ),
            68 => 
            array (
                'id' => 69,
                'product_id' => 34,
                'image_url' => 'storage/images/product/34/12_1559816566.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/34/12_small_1559816566.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:22:46',
                'updated_at' => '2019-06-06 10:22:46',
            ),
            69 => 
            array (
                'id' => 70,
                'product_id' => 34,
                'image_url' => 'storage/images/product/34/123_1559816566.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/34/123_small_1559816566.jpg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:22:46',
                'updated_at' => '2019-06-06 10:22:46',
            ),
            70 => 
            array (
                'id' => 71,
                'product_id' => 34,
                'image_url' => 'storage/images/product/34/2345_1559816566.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/34/2345_small_1559816566.jpg',
                'order_by' => 3,
                'created_at' => '2019-06-06 10:22:46',
                'updated_at' => '2019-06-06 10:22:46',
            ),
            71 => 
            array (
                'id' => 72,
                'product_id' => 34,
                'image_url' => 'storage/images/product/34/3354_1559816566.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/34/3354_small_1559816566.jpg',
                'order_by' => 4,
                'created_at' => '2019-06-06 10:22:46',
                'updated_at' => '2019-06-06 10:22:46',
            ),
            72 => 
            array (
                'id' => 73,
                'product_id' => 35,
            'image_url' => 'storage/images/product/35/768 (15)_1559816617.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/35/768 (15)_small_1559816617.png',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:23:37',
                'updated_at' => '2019-06-06 10:23:37',
            ),
            73 => 
            array (
                'id' => 74,
                'product_id' => 35,
            'image_url' => 'storage/images/product/35/768 (16)_1559816617.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/35/768 (16)_small_1559816617.png',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:23:37',
                'updated_at' => '2019-06-06 10:23:37',
            ),
            74 => 
            array (
                'id' => 75,
                'product_id' => 36,
                'image_url' => 'storage/images/product/36/1_1559816725.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/36/1_small_1559816725.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:25:25',
                'updated_at' => '2019-06-06 10:25:25',
            ),
            75 => 
            array (
                'id' => 76,
                'product_id' => 36,
                'image_url' => 'storage/images/product/36/2_1559816725.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/36/2_small_1559816725.jpg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:25:25',
                'updated_at' => '2019-06-06 10:25:25',
            ),
            76 => 
            array (
                'id' => 77,
                'product_id' => 36,
                'image_url' => 'storage/images/product/36/3_1559816725.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/36/3_small_1559816725.jpg',
                'order_by' => 3,
                'created_at' => '2019-06-06 10:25:25',
                'updated_at' => '2019-06-06 10:25:25',
            ),
            77 => 
            array (
                'id' => 78,
                'product_id' => 36,
                'image_url' => 'storage/images/product/36/4_1559816725.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/36/4_small_1559816725.jpg',
                'order_by' => 4,
                'created_at' => '2019-06-06 10:25:25',
                'updated_at' => '2019-06-06 10:25:25',
            ),
            78 => 
            array (
                'id' => 79,
                'product_id' => 37,
            'image_url' => 'storage/images/product/37/768 (17)_1559816764.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/37/768 (17)_small_1559816764.png',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:26:04',
                'updated_at' => '2019-06-06 10:26:04',
            ),
            79 => 
            array (
                'id' => 80,
                'product_id' => 38,
                'image_url' => 'storage/images/product/38/12_1559816785.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/38/12_small_1559816785.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:26:25',
                'updated_at' => '2019-06-06 10:26:25',
            ),
            80 => 
            array (
                'id' => 81,
                'product_id' => 38,
                'image_url' => 'storage/images/product/38/123_1559816785.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/38/123_small_1559816785.jpg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:26:25',
                'updated_at' => '2019-06-06 10:26:25',
            ),
            81 => 
            array (
                'id' => 82,
                'product_id' => 38,
                'image_url' => 'storage/images/product/38/1234_1559816785.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/38/1234_small_1559816785.jpg',
                'order_by' => 3,
                'created_at' => '2019-06-06 10:26:25',
                'updated_at' => '2019-06-06 10:26:25',
            ),
            82 => 
            array (
                'id' => 83,
                'product_id' => 38,
                'image_url' => 'storage/images/product/38/12345_1559816785.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/38/12345_small_1559816785.jpg',
                'order_by' => 4,
                'created_at' => '2019-06-06 10:26:25',
                'updated_at' => '2019-06-06 10:26:25',
            ),
            83 => 
            array (
                'id' => 84,
                'product_id' => 40,
                'image_url' => 'storage/images/product/40/a_1559816907.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/40/a_small_1559816907.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:28:27',
                'updated_at' => '2019-06-06 10:28:27',
            ),
            84 => 
            array (
                'id' => 85,
                'product_id' => 40,
                'image_url' => 'storage/images/product/40/b_1559816907.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/40/b_small_1559816907.jpg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:28:27',
                'updated_at' => '2019-06-06 10:28:27',
            ),
            85 => 
            array (
                'id' => 86,
                'product_id' => 40,
                'image_url' => 'storage/images/product/40/c_1559816907.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/40/c_small_1559816907.jpg',
                'order_by' => 3,
                'created_at' => '2019-06-06 10:28:27',
                'updated_at' => '2019-06-06 10:28:27',
            ),
            86 => 
            array (
                'id' => 87,
                'product_id' => 40,
                'image_url' => 'storage/images/product/40/d_1559816907.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/40/d_small_1559816907.jpg',
                'order_by' => 4,
                'created_at' => '2019-06-06 10:28:27',
                'updated_at' => '2019-06-06 10:28:27',
            ),
            87 => 
            array (
                'id' => 88,
                'product_id' => 41,
                'image_url' => 'storage/images/product/41/91_1559816933.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/41/91_small_1559816933.jpeg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:28:53',
                'updated_at' => '2019-06-06 10:28:53',
            ),
            88 => 
            array (
                'id' => 89,
                'product_id' => 41,
                'image_url' => 'storage/images/product/41/9_1559816933.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/41/9_small_1559816933.jpeg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:28:53',
                'updated_at' => '2019-06-06 10:28:53',
            ),
            89 => 
            array (
                'id' => 90,
                'product_id' => 42,
            'image_url' => 'storage/images/product/42/768 (19)_1559817041.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/42/768 (19)_small_1559817041.png',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:30:41',
                'updated_at' => '2019-06-06 10:30:41',
            ),
            90 => 
            array (
                'id' => 91,
                'product_id' => 43,
                'image_url' => 'storage/images/product/43/10_1559817178.png',
                'thumb_image_url' => 'storage/images/product/thumbnail/43/10_small_1559817178.png',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:32:58',
                'updated_at' => '2019-06-06 10:32:58',
            ),
            91 => 
            array (
                'id' => 92,
                'product_id' => 44,
            'image_url' => 'storage/images/product/44/768 (21)_1559817199.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/44/768 (21)_small_1559817199.png',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:33:19',
                'updated_at' => '2019-06-06 10:33:19',
            ),
            92 => 
            array (
                'id' => 93,
                'product_id' => 44,
            'image_url' => 'storage/images/product/44/768 (22)_1559817199.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/44/768 (22)_small_1559817199.png',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:33:19',
                'updated_at' => '2019-06-06 10:33:19',
            ),
            93 => 
            array (
                'id' => 94,
                'product_id' => 45,
                'image_url' => 'storage/images/product/45/13_1559817312.png',
                'thumb_image_url' => 'storage/images/product/thumbnail/45/13_small_1559817312.png',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:35:12',
                'updated_at' => '2019-06-06 10:35:12',
            ),
            94 => 
            array (
                'id' => 95,
                'product_id' => 46,
            'image_url' => 'storage/images/product/46/768 (23)_1559817355.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/46/768 (23)_small_1559817355.png',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:35:55',
                'updated_at' => '2019-06-06 10:35:55',
            ),
            95 => 
            array (
                'id' => 96,
                'product_id' => 46,
            'image_url' => 'storage/images/product/46/768 (24)_1559817355.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/46/768 (24)_small_1559817355.png',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:35:55',
                'updated_at' => '2019-06-06 10:35:55',
            ),
            96 => 
            array (
                'id' => 97,
                'product_id' => 47,
                'image_url' => 'storage/images/product/47/1_1559817483.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/47/1_small_1559817483.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:38:03',
                'updated_at' => '2019-06-06 10:38:03',
            ),
            97 => 
            array (
                'id' => 98,
                'product_id' => 47,
                'image_url' => 'storage/images/product/47/2_1559817484.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/47/2_small_1559817484.jpg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:38:04',
                'updated_at' => '2019-06-06 10:38:04',
            ),
            98 => 
            array (
                'id' => 99,
                'product_id' => 47,
                'image_url' => 'storage/images/product/47/3_1559817484.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/47/3_small_1559817484.jpg',
                'order_by' => 3,
                'created_at' => '2019-06-06 10:38:04',
                'updated_at' => '2019-06-06 10:38:04',
            ),
            99 => 
            array (
                'id' => 100,
                'product_id' => 48,
            'image_url' => 'storage/images/product/48/768 (25)_1559817499.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/48/768 (25)_small_1559817499.png',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:38:19',
                'updated_at' => '2019-06-06 10:38:19',
            ),
            100 => 
            array (
                'id' => 101,
                'product_id' => 49,
                'image_url' => 'storage/images/product/49/a_1559817573.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/49/a_small_1559817573.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:39:33',
                'updated_at' => '2019-06-06 10:39:33',
            ),
            101 => 
            array (
                'id' => 102,
                'product_id' => 49,
                'image_url' => 'storage/images/product/49/b_1559817573.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/49/b_small_1559817573.jpg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:39:33',
                'updated_at' => '2019-06-06 10:39:33',
            ),
            102 => 
            array (
                'id' => 103,
                'product_id' => 49,
                'image_url' => 'storage/images/product/49/c_1559817573.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/49/c_small_1559817573.jpg',
                'order_by' => 3,
                'created_at' => '2019-06-06 10:39:33',
                'updated_at' => '2019-06-06 10:39:33',
            ),
            103 => 
            array (
                'id' => 104,
                'product_id' => 50,
            'image_url' => 'storage/images/product/50/768 (27)_1559817601.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/50/768 (27)_small_1559817601.png',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:40:01',
                'updated_at' => '2019-06-06 10:40:01',
            ),
            104 => 
            array (
                'id' => 105,
                'product_id' => 50,
            'image_url' => 'storage/images/product/50/768 (28)_1559817601.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/50/768 (28)_small_1559817601.png',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:40:01',
                'updated_at' => '2019-06-06 10:40:01',
            ),
            105 => 
            array (
                'id' => 106,
                'product_id' => 51,
                'image_url' => 'storage/images/product/51/12_1559817677.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/51/12_small_1559817677.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:41:17',
                'updated_at' => '2019-06-06 10:41:17',
            ),
            106 => 
            array (
                'id' => 107,
                'product_id' => 51,
                'image_url' => 'storage/images/product/51/123_1559817677.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/51/123_small_1559817677.jpg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:41:17',
                'updated_at' => '2019-06-06 10:41:17',
            ),
            107 => 
            array (
                'id' => 108,
                'product_id' => 51,
                'image_url' => 'storage/images/product/51/1234_1559817677.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/51/1234_small_1559817677.jpg',
                'order_by' => 3,
                'created_at' => '2019-06-06 10:41:17',
                'updated_at' => '2019-06-06 10:41:17',
            ),
            108 => 
            array (
                'id' => 109,
                'product_id' => 52,
            'image_url' => 'storage/images/product/52/768 (31)_1559818040.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/52/768 (31)_small_1559818040.png',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:47:20',
                'updated_at' => '2019-06-06 10:47:20',
            ),
            109 => 
            array (
                'id' => 110,
                'product_id' => 52,
            'image_url' => 'storage/images/product/52/768 (32)_1559818040.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/52/768 (32)_small_1559818040.png',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:47:20',
                'updated_at' => '2019-06-06 10:47:20',
            ),
            110 => 
            array (
                'id' => 111,
                'product_id' => 53,
            'image_url' => 'storage/images/product/53/768 (33)_1559818178.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/53/768 (33)_small_1559818178.png',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:49:38',
                'updated_at' => '2019-06-06 10:49:38',
            ),
            111 => 
            array (
                'id' => 112,
                'product_id' => 54,
                'image_url' => 'storage/images/product/54/1_1559818179.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/54/1_small_1559818179.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:49:39',
                'updated_at' => '2019-06-06 10:49:39',
            ),
            112 => 
            array (
                'id' => 113,
                'product_id' => 54,
                'image_url' => 'storage/images/product/54/2_1559818179.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/54/2_small_1559818179.jpg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:49:39',
                'updated_at' => '2019-06-06 10:49:39',
            ),
            113 => 
            array (
                'id' => 114,
                'product_id' => 54,
                'image_url' => 'storage/images/product/54/3_1559818179.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/54/3_small_1559818179.jpg',
                'order_by' => 3,
                'created_at' => '2019-06-06 10:49:39',
                'updated_at' => '2019-06-06 10:49:39',
            ),
            114 => 
            array (
                'id' => 115,
                'product_id' => 54,
                'image_url' => 'storage/images/product/54/4_1559818179.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/54/4_small_1559818179.jpg',
                'order_by' => 4,
                'created_at' => '2019-06-06 10:49:39',
                'updated_at' => '2019-06-06 10:49:39',
            ),
            115 => 
            array (
                'id' => 116,
                'product_id' => 55,
                'image_url' => 'storage/images/product/55/a_1559818294.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/55/a_small_1559818294.jpg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:51:34',
                'updated_at' => '2019-06-06 10:51:34',
            ),
            116 => 
            array (
                'id' => 117,
                'product_id' => 55,
                'image_url' => 'storage/images/product/55/b_1559818294.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/55/b_small_1559818294.jpg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:51:34',
                'updated_at' => '2019-06-06 10:51:34',
            ),
            117 => 
            array (
                'id' => 118,
                'product_id' => 55,
                'image_url' => 'storage/images/product/55/c_1559818294.jpg',
                'thumb_image_url' => 'storage/images/product/thumbnail/55/c_small_1559818294.jpg',
                'order_by' => 3,
                'created_at' => '2019-06-06 10:51:34',
                'updated_at' => '2019-06-06 10:51:34',
            ),
            118 => 
            array (
                'id' => 119,
                'product_id' => 56,
            'image_url' => 'storage/images/product/56/768 (35)_1559818326.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/56/768 (35)_small_1559818326.png',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:52:06',
                'updated_at' => '2019-06-06 10:52:06',
            ),
            119 => 
            array (
                'id' => 120,
                'product_id' => 56,
            'image_url' => 'storage/images/product/56/768 (36)_1559818326.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/56/768 (36)_small_1559818326.png',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:52:06',
                'updated_at' => '2019-06-06 10:52:06',
            ),
            120 => 
            array (
                'id' => 121,
                'product_id' => 57,
                'image_url' => 'storage/images/product/57/2_1559818413.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/57/2_small_1559818413.jpeg',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:53:33',
                'updated_at' => '2019-06-06 10:53:33',
            ),
            121 => 
            array (
                'id' => 122,
                'product_id' => 57,
                'image_url' => 'storage/images/product/57/1_1559818413.jpeg',
                'thumb_image_url' => 'storage/images/product/thumbnail/57/1_small_1559818413.jpeg',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:53:33',
                'updated_at' => '2019-06-06 10:53:33',
            ),
            122 => 
            array (
                'id' => 123,
                'product_id' => 58,
            'image_url' => 'storage/images/product/58/768 (37)_1559818455.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/58/768 (37)_small_1559818455.png',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:54:15',
                'updated_at' => '2019-06-06 10:54:15',
            ),
            123 => 
            array (
                'id' => 124,
                'product_id' => 58,
            'image_url' => 'storage/images/product/58/768 (38)_1559818455.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/58/768 (38)_small_1559818455.png',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:54:15',
                'updated_at' => '2019-06-06 10:54:15',
            ),
            124 => 
            array (
                'id' => 125,
                'product_id' => 59,
            'image_url' => 'storage/images/product/59/768 (39)_1559818579.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/59/768 (39)_small_1559818579.png',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:56:19',
                'updated_at' => '2019-06-06 10:56:19',
            ),
            125 => 
            array (
                'id' => 126,
                'product_id' => 59,
            'image_url' => 'storage/images/product/59/768 (40)_1559818579.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/59/768 (40)_small_1559818579.png',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:56:19',
                'updated_at' => '2019-06-06 10:56:19',
            ),
            126 => 
            array (
                'id' => 127,
                'product_id' => 60,
            'image_url' => 'storage/images/product/60/768 (41)_1559818715.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/60/768 (41)_small_1559818715.png',
                'order_by' => 1,
                'created_at' => '2019-06-06 10:58:35',
                'updated_at' => '2019-06-06 10:58:35',
            ),
            127 => 
            array (
                'id' => 128,
                'product_id' => 60,
            'image_url' => 'storage/images/product/60/768 (42)_1559818715.png',
            'thumb_image_url' => 'storage/images/product/thumbnail/60/768 (42)_small_1559818715.png',
                'order_by' => 2,
                'created_at' => '2019-06-06 10:58:35',
                'updated_at' => '2019-06-06 10:58:35',
            ),
        ));
        
        
    }
}