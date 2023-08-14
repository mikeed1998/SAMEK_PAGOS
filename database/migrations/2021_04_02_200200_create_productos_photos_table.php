<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_photos', function (Blueprint $table) {
            $table->bigIncrements('id');
      			$table->unsignedBigInteger('producto');
      			$table->string('titulo')->nullable();
      			$table->string('image')->nullable();
      			$table->integer('orden')->default('666');
      			$table->foreign('producto')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_photos');
    }
}
