<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAkcijeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akcije', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv');
            $table->integer('vodja_akcije')->unsigned();
            $table->string('lokacija');
            $table->date('datum');
            $table->longText('opis');
            $table->string('napomena')->nullable();

            $table->timestamps();

            $table->foreign('vodja_akcije')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akcije');
    }
}
