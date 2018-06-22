<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUcesnikPovredneListesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ucesnici_povredne_liste', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ucesnik_id')->unsigned();
            $table->integer('povredna_lista_id')->unsigned();

            $table->timestamps();

            $table->foreign('ucesnik_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('povredna_lista_id')
                ->references('id')->on('povredne_liste')
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
        Schema::dropIfExists('ucesnici_povredne_liste');
    }
}
