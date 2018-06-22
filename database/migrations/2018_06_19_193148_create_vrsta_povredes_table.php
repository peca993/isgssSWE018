<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVrstaPovredesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vrste_povreda', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vrsta');
            $table->string('napomena')->nullable();
            $table->integer('povredna_lista_id')->unsigned();

            $table->timestamps();

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
        Schema::dropIfExists('vrste_povreda');
    }
}
