<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClanAkcijesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clanovi_akcije', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clan_id')->unsigned();
            $table->integer('akcija_id')->unsigned();         

            $table->foreign('clan_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('akcija_id')
            ->references('id')->on('akcije')
            ->onDelete('cascade');

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
        Schema::dropIfExists('clanovi_akcije');
    }
}
