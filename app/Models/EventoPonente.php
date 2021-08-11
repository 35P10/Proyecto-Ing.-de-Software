<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoPonente extends Model
{
    use HasFactory;
    protected $table = 'evento_ponente';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'dni_ponente',
        'id_ponencia'
    ];
}
