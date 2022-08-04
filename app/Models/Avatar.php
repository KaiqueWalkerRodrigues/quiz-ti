<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    use HasFactory;

    protected $table = 'avatares';

    protected $primaryKey = 'id_avatar';

    protected $fillable = ['avatar'];

}
