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
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_cotizacion');
            $table->decimal('impuesto');
            $table->decimal('total');
            $table->string('descripcion')->nullable();
            $table->enum('estado',['ENTREGADO ', 'PENDIENTE'])->default('ENTREGADO'); //enum es para asiganarle 2 valores y por defecto una vez se  cree esara activo

            //llaves foraneas
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');

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
        Schema::dropIfExists('cotizaciones');
    }
};
