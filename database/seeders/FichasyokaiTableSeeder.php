<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FichasyokaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fichasyokai')->insert([
            [
                'nome' => 'Salomão Lunaire',
                'imagem_yokai' => 'https://cdn.discordapp.com/attachments/763432460570329150/918396272371703838/NeridaFormaFeroz.png'
            ],
            [
                'nome' => 'Rubens Varejo',
                'imagem_yokai' => 'https://cdn.discordapp.com/attachments/763432460570329150/918396272371703838/NeridaFormaFeroz.png'
            ],
        ]);
    }
}
