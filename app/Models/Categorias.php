<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categorias';

    protected $primaryKey = 'id_categoria';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = ['categoria'];
}
