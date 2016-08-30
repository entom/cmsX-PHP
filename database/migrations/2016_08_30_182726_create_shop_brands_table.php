<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->unique();
            $table->string('url', 512);
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
        Schema::drop('shop_brands');
    }
}
