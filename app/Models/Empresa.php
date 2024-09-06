<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Empresa extends Model
{
    protected $table = 'empresa';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id',
    'nomefantasia',
    'celular',
    'telefone',
    'email',
    'rua',
    'bairro',
    'instagram',
    'facebook',
    'whatsapp',
    'missao',
    'visao',
    'valores',
    'tradicao',
    'cidade',
    'estado',
    'video'
    ];

    use SoftDeletes, CascadeSoftDeletes;
}
