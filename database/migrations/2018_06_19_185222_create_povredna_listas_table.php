<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePovrednaListasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('povredne_liste', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('izradio')->unsigned();
            $table->string('ime_p')->nullable();
            $table->string('prezime_p')->nullable();
            $table->string('mesto_rodjenja_p')->nullable();
            $table->string('pol_p')->nullable();
            $table->string('adresa_p')->nullable();
            $table->string('ski_pas_p')->nullable();
            $table->string('smestaj')->nullable();
            $table->string('licna_oprema')->nullable();
            $table->longText('opis_akcije_spasavanja')->nullable();
            $table->integer('vodja_akcije')->unsigned();
            $table->string('mesto_predaje')->nullable();
            $table->date('datum');
            $table->time('vreme_predaje')->nullable();
            $table->string('predati_materijal')->nullable();
            $table->integer('primalac')->unsigned();
            $table->string('mesto_nesrece')->nullable();            
            $table->time('vreme_nesrece')->nullable();
            $table->time('vreme_prijema_poziva')->nullable();
            $table->time('vreme_dolaska_spasilaca')->nullable();
            $table->string('trajanje_ukazivanja_pomoci')->nullable();            
            $table->string('trajanje_transporta')->nullable();            
            $table->time('vreme_zavrsetka_akcije')->nullable();
            $table->longText('nacin_pruzanja_pomoci')->nullable();
            $table->string('meteoroloski_uslovi')->nullable();
            
            $table->foreign('izradio')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('vodja_akcije')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('primalac')
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
        Schema::dropIfExists('povredne_liste');
    }
}
