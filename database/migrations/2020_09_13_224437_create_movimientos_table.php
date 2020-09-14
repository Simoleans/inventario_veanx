<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')
                                        ->on('users')
                                        ->onDelete('cascade');
            $table->bigInteger('producto_id')->unsigned()->nullable();
            $table->foreign('producto_id')->references('id')
                                        ->on('productos')
                                        ->onDelete('cascade');
            $table->bigInteger('combo_id')->unsigned()->nullable();
            $table->foreign('combo_id')->references('id')
                                        ->on('combos')
                                        ->onDelete('cascade');
            $table->string('proveedor')->nullable();
            $table->string('precio')->nullable();
            $table->integer('cantidad')->nullable();
            $table->longText('descripcion')->nullable();
            $table->integer('tipo')->nullable()->comment('1 = ingreso , 0 = egreso');
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
        Schema::dropIfExists('movimientos');
    }
}
