<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ci ',
        'nombre',
        'apellido',
        'nacionalidad',
        'edad',
        'email',
        'celular',
        'dirrecion',
        'estado',
        'creado_por',
    ];
    public $timestamps = false;

}
