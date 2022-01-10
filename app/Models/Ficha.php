<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome',
        'vida_atual',
        'vida_max',
        'despertado_atual',
        'despertado_max',
        'imagem_personagem',
        'imagem_dragao',
        'caminho_id',
        'classe_id',
        'heranca_id',
        'arma_nome',
        'arma_dano',
        'arma_elemento',
        'dragao_nome',
        'dragao_elemento',        
    ];
}
