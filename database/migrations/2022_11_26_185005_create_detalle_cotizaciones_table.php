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
        Schema::create('detalle_cotizaciones', function (Blueprint $table) {
            $table->id();

            $table->string('detalle')->nullable();
            $table->integer('cantidad');
            $table->decimal('precio');
            $table->decimal('descuento');

             //llaves foraneas
             $table->unsignedBigInteger('cotizaciones_id');
             $table->foreign('cotizaciones_id')->references('id')->on('cotizaciones');

             $table->unsignedBigInteger('producto_id');
             $table->foreign('producto_id')->references('id')->on('productos');
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
        Schema::dropIfExists('detalle_cotizaciones');
    }
};
