<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concurso extends Model
{
    use HasFactory;
    protected $table = 'concurso';
    protected $primaryKey = 'id_evento';
    public $timestamps = false;
    protected $fillable = [
        'id_evento',
        'num_participantes',
        'requisitos',
        'ganadores',
        'moderador'
    ];
}
