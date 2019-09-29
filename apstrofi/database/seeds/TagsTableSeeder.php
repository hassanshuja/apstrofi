<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tags')->delete();
        
        \DB::table('tags')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Fashion',
                'title_l' => 'Fashion',
                'slug' => 'fashion',
                'image_url' => NULL,
                'is_home_style' => 0,
                'status' => 1,
                'created_at' => '2019-06-06 09:17:09',
                'updated_at' => '2019-06-06 09:17:09',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Shoes',
                'title_l' => 'Shoes',
                'slug' => 'shoes',
                'image_url' => NULL,
                'is_home_style' => 0,
                'status' => 1,
                'created_at' => '2019-06-06 09:17:22',
                'updated_at' => '2019-06-06 09:17:22',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Black',
                'title_l' => 'Black',
                'slug' => 'black',
                'image_url' => NULL,
                'is_home_style' => 0,
                'status' => 1,
                'created_at' => '2019-06-06 09:17:30',
                'updated_at' => '2019-06-06 09:17:30',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Design',
                'title_l' => 'Design',
                'slug' => 'design',
                'image_url' => NULL,
                'is_home_style' => 0,
                'status' => 1,
                'created_at' => '2019-06-06 09:17:38',
                'updated_at' => '2019-06-06 09:17:38',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Bags',
                'title_l' => 'Bags',
                'slug' => 'bags',
                'image_url' => NULL,
                'is_home_style' => 0,
                'status' => 1,
                'created_at' => '2019-06-06 09:17:46',
                'updated_at' => '2019-06-06 09:17:46',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Cloth',
                'title_l' => 'Cloth',
                'slug' => 'cloth',
                'image_url' => NULL,
                'is_home_style' => 0,
                'status' => 1,
                'created_at' => '2019-06-06 09:18:01',
                'updated_at' => '2019-06-06 09:18:01',
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Tshirt',
                'title_l' => 'Tshirt',
                'slug' => 'tshirt',
                'image_url' => NULL,
                'is_home_style' => 0,
                'status' => 1,
                'created_at' => '2019-06-06 09:18:12',
                'updated_at' => '2019-06-06 09:18:12',
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'Dark',
                'title_l' => 'Dark',
                'slug' => 'dark',
                'image_url' => NULL,
                'is_home_style' => 0,
                'status' => 1,
                'created_at' => '2019-06-06 09:18:26',
                'updated_at' => '2019-06-06 09:18:26',
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'Cool',
                'title_l' => 'Cool',
                'slug' => 'cool',
                'image_url' => NULL,
                'is_home_style' => 0,
                'status' => 1,
                'created_at' => '2019-06-06 09:18:47',
                'updated_at' => '2019-06-06 09:18:47',
            ),
            9 => 
            array (
                'id' => 10,
                'title' => 'Hot',
                'title_l' => 'Hot',
                'slug' => 'hot',
                'image_url' => NULL,
                'is_home_style' => 0,
                'status' => 1,
                'created_at' => '2019-06-06 09:18:57',
                'updated_at' => '2019-06-06 09:18:57',
            ),
            10 => 
            array (
                'id' => 11,
                'title' => 'New Design',
                'title_l' => 'New Design',
                'slug' => 'new-design',
                'image_url' => NULL,
                'is_home_style' => 0,
                'status' => 1,
                'created_at' => '2019-06-06 09:19:07',
                'updated_at' => '2019-06-06 09:19:07',
            ),
        ));
        
        
    }
}