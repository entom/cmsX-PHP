<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('url', 512);
            $table->integer('position')->nullable()->default(0);
            $table->string('file', 255)->nullable()->default(null);
            $table->text('content')->nullable()->default(null);
            $table->text('short_content')->nullable()->default(null);
            $table->boolean('active')->default(true);
            $table->string('meta_title', 255)->nullable();
            $table->string('meta_keywords', 255)->nullable();
            $table->string('meta_description', 512)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('offers');
    }
}
