<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSharksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sharks', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 255);
            $table->string('email', 255);
            $table->integer('shark_level');

            $table->timestamps();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sharks', function (Blueprint $table) {
            //
        });
    }
}
