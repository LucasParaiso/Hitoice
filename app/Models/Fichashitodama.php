<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichashitodama extends Model
{
    use HasFactory;

    protected $table = 'fichashitodama';

    public function almas()
    {
        return $this->hasMany(Alma::class, 'fichashitodama_id', 'id');
    }
}
