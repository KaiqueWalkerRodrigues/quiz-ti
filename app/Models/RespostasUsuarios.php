<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RespostasUsuarios extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'respostas_usuarios';

    protected $primary_key = 'id_resposta_usuario';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = ['id_resposta','id_user'];

     public function __construct(int $id_user = null, int $id_resposta = null)
    {
        $this->attributes['id_user'] = $id_user;
        $this->attributes['id_resposta'] = $id_resposta;
    }

    public function respostas()
    {
        return $this->hasMany(Respostas::class,'id_resposta','id_resposta');
    }

    public function users()
    {
       return $this->hasMany(User::class,'id_user','id');
    }
}
