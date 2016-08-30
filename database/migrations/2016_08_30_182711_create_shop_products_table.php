<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->unique();
            $table->string('title', 255)->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->integer('price');
            $table->integer('shop_category_id')->nullable();
            $table->integer('shop_brand_id')->nullable();
            $table->timestamps();
            $table->string('created_at_ip')->nullable();
            $table->string('updated_at_ip')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shop_products');
    }
}
