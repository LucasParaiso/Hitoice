<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FichasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fichas')->insert([
            [
                'user_id' => '1',
                'nome' => 'Bellatora Santana',
                'imagem_personagem' => 'https://cdn.discordapp.com/attachments/763432460570329150/919605211901878292/jaimerdinger.webp',
                'imagem_dragao' => 'https://cdn.discordapp.com/attachments/763432460570329150/919605211901878292/jaimerdinger.webp',
            ],
            [
                'user_id' => '1',
                'nome' => 'Nerida Kairi',
                'imagem_personagem' => 'https://cdn.discordapp.com/attachments/763432460570329150/918396272128458802/Nerida.png',
                'imagem_dragao' => 'https://cdn.discordapp.com/attachments/763432460570329150/918396668876029962/NeridaPet.jpg',
            ],
            [
                'user_id' => '2',
                'nome' => 'PARAISO',
                'imagem_personagem' => 'https://cdn.discordapp.com/attachments/763432460570329150/919605211901878292/jaimerdinger.webp',
                'imagem_dragao' => 'https://cdn.discordapp.com/attachments/763432460570329150/919605211901878292/jaimerdinger.webp',
            ]
        ]);
    }
}
