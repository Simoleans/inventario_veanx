<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComboProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combo_productos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('producto_id')->unsigned()->nullable();
            $table->foreign('producto_id')->references('id')
                                        ->on('productos')
                                        ->onDelete('cascade');
            $table->bigInteger('combo_id')->unsigned()->nullable();
            $table->foreign('combo_id')->references('id')
                                        ->on('combos')
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
        Schema::dropIfExists('combo_productos');
    }
}
