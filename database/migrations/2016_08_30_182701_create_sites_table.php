<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url', 512)->unique();
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->text('content')->nullable();
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
        Schema::drop('sites');
    }
}
