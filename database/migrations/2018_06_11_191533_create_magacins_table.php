<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMagacinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oprema', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kategorija');
            $table->string('naziv');
            $table->integer('kolicina');
            $table->integer('zauzeto')->default(0);
            $table->string('opis')->nullable();
            $table->integer('trazena_kolicina')->nullable();

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
        Schema::dropIfExists('oprema');
    }
}
