<?php

use Illuminate\Database\Seeder;

class ShopProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop_products')->insert(['name' => 'Mini skirt black edition', 'title' => 'Mini skirt black edition','description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna','price' => 35,'shop_category_id' => 1,'shop_brand_id' => 1,]);
        DB::table('shop_products')->insert(['name' => 'T-shirt blue edition', 'title' => 'T-shirt blue edition','description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna','price' => 64,'shop_category_id' => 2,'shop_brand_id' => 3,]);
        DB::table('shop_products')->insert(['name' => 'Sleeveless Colorblock Scuba', 'title' => 'Sleeveless Colorblock Scuba','description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna','price' => 13,'shop_category_id' => 3,'shop_brand_id' => 2,]);
    }
}
