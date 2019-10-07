<?php

use Illuminate\Database\Seeder;

class PageBuilderTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('page_builder')->delete();
        
        \DB::table('page_builder')->insert(array (
            0 => 
            array (
                'id' => 1,
                'slug' => 'men',
                'section_1' => '{"banner_text":"FEATURED: A-COLD-WALL","banner_text_l":"FEATURED: A-COLD-WALL","button_text":"zxczx","button_text_l":"zxczxc","button_color":"zxczxc","redirect_link":"zxczxc","image_url":"storage\\/images\\/page\\/men\\/1559715128.jpg","mobile_image_url":"storage\\/images\\/page\\/men\\/1559715197.jpg"}',
                'section_2' => '{"button_text":"SHOP BRAND1","button_text_l":"SHOP BRAND1","button_color":"zxczxczxc","redirect_link":"zxczxc","image_url1":"storage\\/images\\/page\\/men\\/1559048297.png","image_url":"storage\\/images\\/page\\/men\\/1559715248.jpg"}',
                'section_3' => '{"button_text":"SHOP CATEGORY 1","button_text_l":"SHOP CATEGORY 1","button_color":"sadas","redirect_link":"asdasd","image_url1":"storage\\/images\\/page\\/men\\/1559048308.png","image_url":"storage\\/images\\/page\\/men\\/1559715283.jpg"}',
                'created_at' => '2019-05-28 12:58:06',
                'updated_at' => '2019-06-05 06:14:54',
            ),
            1 => 
            array (
                'id' => 2,
                'slug' => 'home',
                'section_1' => '{"button_text":"SHOP MEN","button_text_l":"SHOP MEN","button_color":"ccvb","redirect_link":"men","image_url":"storage\\/images\\/page\\/home\\/1559118288.jpg"}',
                'section_2' => '{"button_text":"SHOP WOMEN","button_text_l":"SHOP WOMEN","button_color":"fsdfsd","redirect_link":"women","image_url":"storage\\/images\\/page\\/home\\/1559118315.jpg"}',
                'section_3' => '{"button_text":"EXPLORE BRAND","button_text_l":"EXPLORE BRAND","button_color":"sdfsdf","redirect_link":"sdfsdf","image_url1":"storage\\/images\\/page\\/home\\/1559112959.png","image_url":"storage\\/images\\/page\\/home\\/1559118475.jpeg"}',
                'created_at' => '2019-05-29 06:48:12',
                'updated_at' => '2019-05-29 08:27:55',
            ),
            2 => 
            array (
                'id' => 3,
                'slug' => 'women',
                'section_1' => '{"banner_text":"FEATURED: A-COLD-WALL","banner_text_l":"FEATURED: A-COLD-WALL","button_text":"EXPLORE BRAND","button_text_l":"EXPLORE BRAND","button_color":"xcvxcv","redirect_link":"brands","mobile_image_url":"storage\\/images\\/page\\/women\\/1559715852.jpg","image_url":"storage\\/images\\/page\\/women\\/1559127279.jpg"}',
                'section_2' => '{"button_text":"SHOP BRAND 1","button_text_l":"SHOP BRAND 1","button_color":"sdfs","redirect_link":"brands","image_url1":"storage\\/images\\/page\\/women\\/1559113164.png","image_url":"storage\\/images\\/page\\/women\\/1559127498.jpg"}',
                'section_3' => '{"button_text":"SHOP BRAND 2","button_text_l":"SHOP BRAND 2","button_color":"xcvxcv","redirect_link":"brands","image_url1":"storage\\/images\\/page\\/women\\/1559113170.png","image_url":"storage\\/images\\/page\\/women\\/1559127529.jpg"}',
                'created_at' => '2019-05-29 06:59:17',
                'updated_at' => '2019-06-05 06:24:12',
            ),
        ));
        
        
    }
}