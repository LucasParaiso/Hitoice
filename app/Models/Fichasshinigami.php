<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichasshinigami extends Model
{
    use HasFactory;

    protected $table = 'fichasshinigami';

    public function almas()
    {
        return $this->hasMany(Alma::class, 'fichasshinigami_id', 'id');
    }
}
