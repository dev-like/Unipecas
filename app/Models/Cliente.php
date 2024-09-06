<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id',
    'nome',
    'cpf',
    'link',
    'status',
    'datavenda'
    ];

    use SoftDeletes;
}
