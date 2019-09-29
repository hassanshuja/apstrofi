<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AdminSeeder::class);
        $this->call(ShopsTableSeeder::class);
        $this->call(AttributeSeeder::class);
         /*$this->call(CategoriesTableSeeder::class);
        $this->call(PageBuilderTableSeeder::class);
        $this->call(BlogsTableSeeder::class);
        $this->call(BlogCategoriesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(CategoriesShopsTableSeeder::class);
        $this->call(AttributeValuesTableSeeder::class);
        $this->call(ShopBrandTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductImagesTableSeeder::class);
        $this->call(ProductTagsTableSeeder::class);
        $this->call(CommonContentTableSeeder::class);*/
    }
}
