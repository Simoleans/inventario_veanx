<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
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
            $table->bigInteger('tipo_id')->unsigned()->nullable();
            $table->foreign('tipo_id')->references('id')
                                        ->on('tipos')
                                        ->onDelete('cascade');
            $table->bigInteger('marca_id')->unsigned()->nullable();
            $table->foreign('marca_id')->references('id')
                                        ->on('marcas')
                                        ->onDelete('cascade');
            $table->bigInteger('atributo_id')->unsigned()->nullable();
            $table->foreign('atributo_id')->references('id')
                                        ->on('atributos')
                                        ->onDelete('cascade');
            $table->bigInteger('pack_id')->unsigned()->nullable();
            $table->foreign('pack_id')->references('id')
                                        ->on('packs')
                                        ->onDelete('cascade');
            $table->string('nombre')->nullable();
            $table->longText('descripcion')->nullable();
            $table->string('c_unidad')->nullable();
            $table->string('unidad')->nullable();
            $table->string('atributo_1')->nullable();
            $table->string('atributo_2')->nullable();
            $table->string('valor_venta')->nullable();
            $table->string('valor_venta_1')->nullable();
            $table->string('valor_venta_2')->nullable();
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
}
