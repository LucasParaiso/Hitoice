<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            [
                'titulo' => 'Deus com os olhos da morte',
                'descricao' => 'Esse tipo é especialista em detectar almas e pode realizar infinitas Ressonâncias da Alma',
            ],
            [
                'titulo' => 'Deus que transita',
                'descricao' => 'Esse Shinigami pode mover-se livremente a todos os mundos, levando quaisquer objetos, ou até 5 pessoas',
            ],
            [
                'titulo' => 'Deus empático',
                'descricao' => 'Esse tipo pode carregar até 5 almas azuis ativas e 3 inativas',
            ],
            [
                'titulo' => 'Deus que cura',
                'descricao' => 'Fora de combate, esse tipo pode curar 50% arredondado para baixo do dano sofrido por um Shinigami',
            ],
            [
                'titulo' => 'Deus que se deleita',
                'descricao' => 'Quando encerrar um combate, escolha um dos inimigos que derrotou. No próximo combate, você pode evocar essa alma (sem a necessidade de gastar uma ação ou realizar testes) para lutar ao seu lado. Esse efeito não é cumulativo e o inimigo só lutará ao seu lado uma única vez. Ao final do combate você o perde',
            ],
        ]);
    }
}
