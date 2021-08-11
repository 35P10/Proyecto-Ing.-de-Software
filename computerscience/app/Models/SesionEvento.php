<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesionEvento extends Model
{
    use HasFactory;
    protected $table = 'sesion_evento';
    public $timestamps = false;
    protected $fillable = [
        'id_sesion',
        'id_evento',
        'hora_inicio'
    ];
}
