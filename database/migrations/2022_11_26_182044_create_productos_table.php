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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            // $table->string('code')->unique()->nullable();
            // $table->string('nombre')->unique();
            $table->string('nombre');
            $table->string('stock')->default(0);
            $table->string('imagen');
            $table->decimal('precio_venta', 12, 2);
            $table->enum('estado',['ACTIVADO', 'DESACTIVADO'])->default('ACTIVADO');

            //llaves foraneas
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

            $table->unsignedBigInteger('proveedor_id');
            $table->foreign('proveedor_id')->references('id')->on('proveedors')->onDelete('cascade');;

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
        Schema::dropIfExists('productos');
    }
};
