<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZahtevZaIzdavanjeOpremesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zahtevi_za_izdavanje_opreme', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('korisnik_id')->unsigned();
            $table->date('datum_od');
            $table->date('datum_do');
            $table->string('napomena')->nullable();
            $table->boolean('odobren')->default(false);

            $table->foreign('korisnik_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('zahtevi_za_izdavanje_opreme');
    }
}
