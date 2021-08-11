<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class participante extends Model
{
    use HasFactory;

    protected $table = 'participante';
    public $timestamps = false;

    protected $casts = [
        'dni_persona' => 'integer',
        'grado' => 'integer',
    ];
    protected  $primaryKey = 'dni_persona';
    protected $fillable = [
        'dni_persona',
        'universidad',
        'grado'
    ];
}
