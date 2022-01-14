<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ficha_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            
            $table->string('tipo');
            $table->string('propriedade');

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
        Schema::dropIfExists('almas');
    }
}
