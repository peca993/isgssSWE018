<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePorukasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poruke', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('posiljalac')->unsigned();
            $table->integer('primalac')->unsigned();
            $table->string('text');
            $table->string('prioritet');

            $table->foreign('posiljalac')
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
        Schema::dropIfExists('porukae');
    }
}
