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
            $table->string('imagem_yokai')->default('/img/Hitodama.jpg');
            $table->integer('vida_atual')->default(1);
            $table->integer('vida_max')->default(1);
            $table->text('descricao')->default('<--- INFORMAÇÕES YOKAI --->
Clã Yokai: 
Tipo do Yokai: 

<--- ATAQUE --->
Nome: 
Dano: 
Elemento: 

<--- HABILIDADE SOBRENATURAL --->
Nome: 
Descrição: 

<--- ESSÊNCIA ROUBADA --->
Elemento: ');

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
