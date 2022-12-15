<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perdidas', function (Blueprint $table) {
            $table->id();

            // $table->dateTime('purchase_date');

            $table->decimal('total');
            $table->enum('estado',['PERDIDO', 'ENCONTRADO'])->default('PERDIDO'); //enum es para asiganarle 2 valores y por defecto una vez se  cree esara activo
            $table->string('foto')->nullable();

            //llaves foranea

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('perdidas');
    }
};
