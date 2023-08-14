<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarruselsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrusels', function (Blueprint $table) {
            $table->bigIncrements('id');
						$table->string('titulo')->nullable();
						$table->string('subtitulo')->nullable();
						$table->string('image')->nullable();
						$table->string('url')->nullable();
						$table->string('video')->nullable();
						$table->integer('orden')->default('666');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrusels');
    }
}
