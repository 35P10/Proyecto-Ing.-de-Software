<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
    use HasFactory;
    protected $table = 'persona';
    public $timestamps = false;

    protected $casts = [
        'dni' => 'integer',
    ];
    protected  $primaryKey = 'dni';
    protected $fillable = [
        'dni',
        'nombre',
        'email',
        'password'
    ];

    public function administrador()
    {
        return $this->hasOne(Administrador::class, 'dni_persona');
    }

}
