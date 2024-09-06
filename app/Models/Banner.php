<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    protected $table = 'banner';
    protected $dates = ['deleted_at'];
    protected $fillable = ['id','caminho','texto','link','textobotao','corbotao','lado','ordem'];

    use SoftDeletes;
}
