<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
          $table->bigIncrements('id');
					$table->string('nombre');
					$table->string('slug')->unique()->nullable();
					$table->integer('parent')->default(0);
					$table->boolean('activo')->default(1);
					$table->integer('orden')->default(666);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
