<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;



class formlog extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'Lastname',
        'telefone',
        'email',
        'sexo',
        'estado_civil',
        'Data_nascimento',
        'nacionalidade',

    ];
}

