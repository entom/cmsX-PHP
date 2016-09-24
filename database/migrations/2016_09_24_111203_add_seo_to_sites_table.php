<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSeoToSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sites', function (Blueprint $table) {
            $table->string('meta_description', 512)->nullable()->default(null)->after('title');
            $table->string('meta_keywords', 255)->nullable()->default(null)->after('title');
            $table->string('meta_title', 255)->nullable()->default(null)->after('title');
            $table->boolean('active')->default(true)->after('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sites', function (Blueprint $table) {
            $table->dropColumn('meta_description');
            $table->dropColumn('meta_keywords');
            $table->dropColumn('meta_title');
            $table->dropColumn('active');
        });
    }
}
