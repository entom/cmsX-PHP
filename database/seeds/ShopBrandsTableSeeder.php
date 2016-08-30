<?php

use Illuminate\Database\Seeder;

class ShopBrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop_brands')->insert(['name' => 'ACNE', 'url' => 'acne']);
        DB::table('shop_brands')->insert(['name' => 'RONHILL', 'url' => 'ronhill']);
        DB::table('shop_brands')->insert(['name' => 'ALBIRO', 'url' => 'albiro']);
        DB::table('shop_brands')->insert(['name' => 'ODDMOLLY', 'url' => 'oddmolly']);
    }
}
