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
        Schema::create('detalle_perdidas', function (Blueprint $table) {
            $table->id();

            $table->string('detalle')->nullable();
            $table->integer('cantidad');
            $table->decimal('precio');

            //llaves foraneas
            $table->unsignedBigInteger('perdida_id');
            $table->foreign('perdida_id')->references('id')->on('perdidas');

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
        Schema::dropIfExists('detalle_perdidas');
    }
};
