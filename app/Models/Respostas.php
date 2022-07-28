<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Respostas extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'respostas';

    protected $primaryKey = 'id_resposta';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = ['id_questao','resposta','certa'];
}
