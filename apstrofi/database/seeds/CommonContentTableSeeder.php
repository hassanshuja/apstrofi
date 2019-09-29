<?php

use Illuminate\Database\Seeder;

class CommonContentTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('common_content')->delete();
        
        \DB::table('common_content')->insert(array (
            0 => 
            array (
                'id' => 1,
                'about_title' => 'ABOUT APSTROFI',
                'about_title_l' => 'ABOUT APSTROFI',
                'about_content' => 'Urban Outfitters is a lifestyle retailer dedicated to inspiring customers through a unique combination of product, creativity and cultural understanding. Founded in 1970 in a small space across the street from the University of Pennsylvania, Urban Outfitters now operates over 200 stores in the United States, Canada and Europe, offering experiential retail environments and a well-curated mix of on-trend women’s and men’s clothes, from boho dresses, denim and graphics to shoes, hats, and backpacks, as well as beauty, intimates, swim and a collection of handpicked vintage clothing. Urban Outfitters also carries everything you need to decorate your small space, apartment or dorm, with a UO Home collection that includes bedding, tapestries, rugs, shower curtains and furniture. Our Music + Tech collection is a go-to destination for vinyl, record players and tech accessories. Visit our stores, where all are welcome and there’s always something new to see, or shop online at UrbanOutfitters.com and get free shipping on US orders over $50. For special offers, one-of-a-kind prizes and more, download the UO app and join UO Rewards! Want to be part of the conversation? Follow, share and shop @UrbanOutfitters.',
                'about_content_l' => 'Urban Outfitters is a lifestyle retailer dedicated to inspiring customers through a unique combination of product, creativity and cultural understanding. Founded in 1970 in a small space across the street from the University of Pennsylvania, Urban Outfitters now operates over 200 stores in the United States, Canada and Europe, offering experiential retail environments and a well-curated mix of on-trend women’s and men’s clothes, from boho dresses, denim and graphics to shoes, hats, and backpacks, as well as beauty, intimates, swim and a collection of handpicked vintage clothing. Urban Outfitters also carries everything you need to decorate your small space, apartment or dorm, with a UO Home collection that includes bedding, tapestries, rugs, shower curtains and furniture. Our Music + Tech collection is a go-to destination for vinyl, record players and tech accessories. Visit our stores, where all are welcome and there’s always something new to see, or shop online at UrbanOutfitters.com and get free shipping on US orders over $50. For special offers, one-of-a-kind prizes and more, download the UO app and join UO Rewards! Want to be part of the conversation? Follow, share and shop @UrbanOutfitters.',
                'slug' => 'common',
                'created_at' => '2019-06-06 13:00:18',
                'updated_at' => '2019-06-06 13:00:18',
            ),
        ));
        
        
    }
}