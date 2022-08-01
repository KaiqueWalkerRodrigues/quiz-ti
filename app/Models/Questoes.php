<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questoes extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'questoes';

    protected $primaryKey = 'id_questao';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = ['id_quiz','titulo'];

    public function Resposta()
    {
        return $this->hasMany(Respostas::class,'id_questao','id_questao');
    }

    public function questoes_usuarios()
    {
       return $this->hasMany(User::class,'id_questao','id_questao');
    }
}
