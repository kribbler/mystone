<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Website extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('env_code')->unique();
            $table->string('type');
            $table->string('local_url', 128);
            $table->string('staging_url', 128);
            $table->string('production_url', 128);
            $table->string('logo', 128);
            $table->string('footer_text', 1024);
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
        Schema::drop('websites');
    }
}
