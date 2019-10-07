<?php

use Illuminate\Database\Seeder;

class AttributeValuesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('attribute_values')->delete();
        
        \DB::table('attribute_values')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Red',
                'name_l' => 'Red',
                'attribute_id' => 2,
                'created_at' => '2019-06-06 09:11:24',
                'updated_at' => '2019-06-06 09:11:24',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Green',
                'name_l' => 'Green',
                'attribute_id' => 2,
                'created_at' => '2019-06-06 09:11:34',
                'updated_at' => '2019-06-06 09:11:34',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Black',
                'name_l' => 'Black',
                'attribute_id' => 2,
                'created_at' => '2019-06-06 09:11:46',
                'updated_at' => '2019-06-06 09:11:46',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'White',
                'name_l' => 'White',
                'attribute_id' => 2,
                'created_at' => '2019-06-06 09:11:55',
                'updated_at' => '2019-06-06 09:11:55',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Blue',
                'name_l' => 'Blue',
                'attribute_id' => 2,
                'created_at' => '2019-06-06 09:12:09',
                'updated_at' => '2019-06-06 09:12:09',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Orange',
                'name_l' => 'Orange',
                'attribute_id' => 2,
                'created_at' => '2019-06-06 09:12:18',
                'updated_at' => '2019-06-06 09:12:18',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Yellow',
                'name_l' => 'Yellow',
                'attribute_id' => 2,
                'created_at' => '2019-06-06 09:12:29',
                'updated_at' => '2019-06-06 09:12:29',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Pink',
                'name_l' => 'Pink',
                'attribute_id' => 2,
                'created_at' => '2019-06-06 09:12:38',
                'updated_at' => '2019-06-06 09:12:38',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}