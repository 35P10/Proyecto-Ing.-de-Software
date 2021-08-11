<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $table = 'evento';
    public $timestamps = false;

    protected $casts = [
        'id' => 'integer',
        'dni_administrador' => 'integer'
    ];
    protected  $primaryKey = 'id';
    protected $fillable = [
        'id',
        'tema',
        'descripcion',
        'dni_administrador'
    ];

    public function ponencia()
    {
        return $this->hasOne(Ponencia::class, 'id_evento');
    }

    public function sesionEvento()
    {
        return $this->hasOne(SesionEvento::class, 'id_evento');
    }

    public function concurso()
    {
        return $this->hasOne(Concurso::class, 'id_evento');
    }
    /*
    public function sesion()
    {
        return $this->belongsTo(sesion::class)
    }*/
}
