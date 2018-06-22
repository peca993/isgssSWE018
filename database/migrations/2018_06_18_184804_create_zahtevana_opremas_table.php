<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZahtevanaOpremasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zahtevana_oprema', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_zahtev')->unsigned();
            $table->integer('id_oprema')->unsigned();
            $table->integer('trazena_kolicina');

            $table->foreign('id_zahtev')
                ->references('id')->on('zahtevi_za_izdavanje_opreme')
                ->onDelete('cascade');
            $table->foreign('id_oprema')
                ->references('id')->on('oprema')
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
        Schema::dropIfExists('zahtevana_oprema');
    }
}
