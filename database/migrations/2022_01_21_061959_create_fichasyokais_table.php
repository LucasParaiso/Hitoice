<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichasyokaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichasyokais', function (Blueprint $table) {
            $table->id();
            
            $table->string('nome');
            $table->integer('vida_atual');
            $table->integer('vida_max');
            $table->integer('dano');
            $table->string('elemento');
            $table->string('essência_roubada');
            $table->string('habilidade_sobrenatural');
            $table->string('cla');
            $table->string('tipo');

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
        Schema::dropIfExists('fichasyokais');
    }
}
