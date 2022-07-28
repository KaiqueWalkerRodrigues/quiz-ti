<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\{Questoes};

class Quiz extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'quiz';

    protected $primaryKey = 'id_quiz';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = ['id_categoria','id_user','titulo','descricao'];

    public function questoes()
    {
        return $this->hasMany(Questoes::class,'id_quiz','id_quiz');
    }

    public function categorias()
    {
        return $this->hasMany(Categorias::class,'id_categoria','id_categoria');
    }

    public function users()
    {
       return $this->hasMany(User::class,'id_user','id');
    }
}
