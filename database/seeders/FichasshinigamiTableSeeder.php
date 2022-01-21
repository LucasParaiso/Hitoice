<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FichasshinigamiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fichasshinigami')->insert([
            [
                'user_id' => '1',
                'nome' => 'Bellatora Santana',
                'imagem_personagem' => 'https://cdn.discordapp.com/attachments/763432460570329150/918382454937628682/Bellatora250px.jpg',
                'imagem_dragao' => 'https://cdn.discordapp.com/attachments/763432460570329150/918382455516430436/Mel250px.jpg',
            ],
            [
                'user_id' => '2',
                'nome' => 'Nerida Kairi',
                'imagem_personagem' => 'https://cdn.discordapp.com/attachments/763432460570329150/918396272128458802/Nerida.png',
                'imagem_dragao' => 'https://cdn.discordapp.com/attachments/763432460570329150/918396668876029962/NeridaPet.jpg',
            ],
            [
                'user_id' => '3',
                'nome' => 'Mara Lunaire',
                'imagem_personagem' => 'https://cdn.discordapp.com/attachments/763432460570329150/918396271553835038/Mara.jpg',
                'imagem_dragao' => 'https://cdn.discordapp.com/attachments/763432460570329150/918396271746756608/MaraPet.jpg',
            ]
        ]);
    }
}
