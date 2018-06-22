<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
                 
            $table->string('username')->unique();
            $table->boolean('admin');
            $table->string('uloga')->nullable();
            $table->string('prezime')->nullable();
            $table->string('nadimak')->nullable();
            $table->string('avatar_putanja')->nullable();
            $table->string('grad')->nullable();
            $table->string('adresa')->nullable();
            $table->string('telefon')->nullable();
            $table->string('jmbg')->nullable();
            $table->date('datum_rodjenja')->nullable();
            $table->string('krvna_grupa')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
