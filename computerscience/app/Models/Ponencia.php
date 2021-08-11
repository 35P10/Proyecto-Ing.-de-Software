<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ponente;
use App\Models\EventoPonente;

class Ponencia extends Model
{
    use HasFactory;
    protected $table = 'ponencia';
    protected $primaryKey = 'id_evento';
    public $timestamps = false;
    protected $fillable = [
        'id_evento',
        'arch_presentacion'
    ];

    
    public function ponentes()
    {
        return $this->hasManyThrough(
        Ponente::class,
        EventoPonente::class,
        'id_ponencia', // Foreign key on the environments table...
        'dni', // Foreign key on the deployments table...
        'id_evento', // Local key on the projects table...
        'dni_ponente' // Local key on the environments table...
        );
    }

    public function eventoPonente()
    {
        return $this->hasMany(EventoPonente::class, 'id_ponencia');
    }
}



