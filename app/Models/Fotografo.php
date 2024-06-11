<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotografo extends Model
{
    use HasFactory;

    protected $table = 'fotografo';

    protected $fillable = [
        'nameUser', 
        'username', 
        'phone', 
        'email', 
        'adress', 
        'birthday', 
        'description', 
        'image',
        'password', 
        
    ];
}
