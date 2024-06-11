<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class clienteController extends Controller
{
    public function index() 
    { 
        return 'Obteniendo lista de clientes desde el controller';
    }
}
