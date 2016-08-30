<?php

use Illuminate\Database\Seeder;

class ShopCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop_categories')->insert(['name' => 'MENS', 'url' => 'mens']);
        DB::table('shop_categories')->insert(['name' => 'WOMENS', 'url' => 'womens']);
        DB::table('shop_categories')->insert(['name' => 'KIDS', 'url' => 'kids']);
        DB::table('shop_categories')->insert(['name' => 'FASHION', 'url' => 'fashion']);
        DB::table('shop_categories')->insert(['name' => 'CLOTHING', 'url' => 'clothing']);
    }
}
