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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();

            $table->dateTime('fecha_venta');
            $table->decimal('impuesto');
            $table->decimal('total');
            $table->enum('estado',['VALIDO', 'CANCELADO'])->default('VALIDO'); //enum es para asiganarle 2 valores y por defecto una vez se  cree esara activo

            //llaves foraneas
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            //las imagenes no porque se creara un boleta a partir de los deltalles de esta venta

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
        Schema::dropIfExists('ventas');
    }
};
