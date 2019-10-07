<?php

use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blog_categories')->delete();
        
        \DB::table('blog_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Fashion',
                'name_l' => 'Fashion',
                'slug' => 'fashion',
                'status' => 1,
                'created_at' => '2019-06-05 06:34:07',
                'updated_at' => '2019-06-05 06:34:07',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Food',
                'name_l' => 'Food',
                'slug' => 'food',
                'status' => 1,
                'created_at' => '2019-06-05 06:34:27',
                'updated_at' => '2019-06-05 06:34:27',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Color',
                'name_l' => 'Color',
                'slug' => 'color',
                'status' => 1,
                'created_at' => '2019-06-05 06:34:38',
                'updated_at' => '2019-06-05 06:34:38',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Brand',
                'name_l' => 'Brand',
                'slug' => 'brand',
                'status' => 1,
                'created_at' => '2019-06-05 06:34:47',
                'updated_at' => '2019-06-05 06:34:47',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}