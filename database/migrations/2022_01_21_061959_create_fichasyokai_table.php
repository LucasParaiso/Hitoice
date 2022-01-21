<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichasyokaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichasyokai', function (Blueprint $table) {
            $table->id();
            
            $table->string('nome');
            $table->string('imagem_yokai')->default('/img/Hitodama.jpg');
            $table->integer('vida_atual')->default(0);
            $table->integer('vida_max')->default(0);
            $table->integer('dano')->default(0);
            $table->string('elemento')->nullable();
            $table->string('essência_roubada')->nullable();
            $table->string('habilidade_sobrenatural')->nullable();
            $table->string('cla')->nullable();
            $table->string('tipo')->nullable();

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
