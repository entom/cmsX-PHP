<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_messages', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255)->nullable()->default(null);
            $table->text('content')->nullable()->default(null);
            $table->string('name', 255)->nullable()->default(null);
            $table->string('email', 255)->nullable()->default(null);
            $table->string('phone', 64)->nullable()->default(null);
            $table->string('company', 255)->nullable()->default(null);
            $table->integer('readed')->default(false);
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
        Schema::drop('contact_messages');
    }
}
