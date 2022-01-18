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
            $table->unsignedBigInteger('fichashitodama_id');
            
            $table->string('tipo');
            $table->string('propriedade');

            $table->timestamps();
            $table->foreign('fichashitodama_id')->references('id')->on('fichashitodama')->onUpdate('cascade')->onDelete('cascade');
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
