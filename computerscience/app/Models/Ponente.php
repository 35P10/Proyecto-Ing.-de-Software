<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ponente extends Model
{
    use HasFactory;
    protected $table = 'ponente';
    public $timestamps = false;

    protected $casts = [
        'dni' => 'integer',
        'telefono' => 'integer',
    ];
    protected  $primaryKey = 'dni';
    protected $fillable = [
        'dni',
        'nombre',
        'grado_academico',
        'descripcion',
        'especialidad',
        'email',
        'telefono',
        'dni_administrador'
    ];
}


function get_all_ponentes()
{
    $ponente = ponente::all()->take(5);
    return $ponente;
}
