<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestoesUsuarios extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'questoes_usuarios';

    protected $primary_key = 'id_questao_usuario';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = ['id_questao','id_user'];

     public function __construct(int $id_user = null, int $id_questao = null)
    {
        $this->attributes['id_user'] = $id_user;
        $this->attributes['id_questao'] = $id_questao;
    }

    public function questoes()
    {
        return $this->hasMany(Questoes::class,'id_quiz','id_quiz');
    }

    public function users()
    {
       return $this->hasMany(User::class,'id_user','id');
    }
}
