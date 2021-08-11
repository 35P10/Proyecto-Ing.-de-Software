<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sesion extends Model
{
    use HasFactory;

    protected $table = 'sesion';
    public $timestamps = false;

    protected $casts = [
        'id' => 'integer',
        'id_programa' => 'integer',
    ];
    protected  $primaryKey = 'id';
    protected $fillable = [
        'id',
        'fecha',
        'hora_inicio',
        'hora_final',
        'enlace_meet',
        'id_programa'
    ];

    public function eventos() {
        return $this->hasManyThrough(evento::class, SesionEvento::class, 'id_sesion', 'id', 'id', 'id_evento');
        //SQL: select `evento`.*, `sesion_evento`.`id_sesion` as `laravel_through_key` from `evento` inner join `sesion_evento` on `sesion_evento`.`id_evento` = `evento`.`id` where `sesion_evento`.`id_sesion` = 1
    }
}
