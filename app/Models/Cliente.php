<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente';

    protected $fillable = [
        'nameUser',
        'username',
        'phone',
        'document',
        'birthday',
        'image',
        'email',
        'password',
    ];
}
