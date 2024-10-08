<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parceiro extends Model
{
    protected $table = 'parceiros';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id',
    'imagem',
    'imgprod1',
    'imgprod2',
    'textprod1',
    'textprod2'];

    use SoftDeletes;
}
