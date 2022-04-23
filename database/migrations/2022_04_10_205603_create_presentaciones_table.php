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
        Schema::create('presentaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('stock')->default('0');
            $table->unsignedBigInteger('id_productomarca');
            $table->foreign('id_productomarca')->references('id')->on('productosmarcas')->onDelete('cascade');;
            $table->unsignedBigInteger('id_formato');
            $table->foreign('id_formato')->references('id')->on('formatos')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presentacion');
    }
};
