<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programa extends Model
{
    use HasFactory;
    protected $table = 'programa';
    public $timestamps = false;
    
    protected $casts = [
        'id' => 'integer',
        'anio_edicion' => 'integer',
        'dni_administrador' => 'integer',
        
    ];
    protected  $primaryKey = 'id';
    protected $fillable = [
        'id',
        'anio_edicion',
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'dni_administrador'
    ];

    public function sesiones()
    {
        return $this->hasMany(sesion::class, 'id_programa');
    }

}
