<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTargetPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('target_page', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('target_id')->unsigned();
            $table->integer('number')->unsigned();
            $table->integer('state_id')->nullable()->unsigned();
            $table->integer('last_check')->nullable();
            $table->string('url')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('target_page');
    }
}
