<?php

use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('shops')->delete();
        
        \DB::table('shops')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'men',
                'name' => 'Men',
                'name_l' => 'Laki-laki',
                'image_url' => 'storage/images/shop/Screenshot from 2019-03-18 17-20-49.png',
                'note' => NULL,
                'status' => 1,
                'created_at' => '2019-04-10 13:18:04',
                'updated_at' => '2019-04-12 06:12:29',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'women',
                'name' => 'Women',
                'name_l' => 'Perempuan',
                'image_url' => '',
                'note' => NULL,
                'status' => 1,
                'created_at' => '2019-04-10 13:18:38',
                'updated_at' => '2019-04-10 13:18:38',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}