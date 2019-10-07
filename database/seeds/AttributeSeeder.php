<?php

use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('attributes')->delete();

        \DB::table('attributes')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Size',
                    'created_at' => '2019-04-10 13:18:04',
                    'updated_at' => '2019-04-12 06:12:29'
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Color',
                    'created_at' => '2019-04-10 13:18:04',
                    'updated_at' => '2019-04-12 06:12:29'
                )
        ));


    }
}