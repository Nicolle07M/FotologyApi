<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administrador;
use Illuminate\Support\Facades\Validator;

class administradorController extends Controller
{
    public function index() 
    { 

        $administradores = Administrador::all();

        if ($administradores->isEmpty()) {
            $data = [
                'message' => 'No hay administradores',
                'status' => 200
            ];
            return response()->json($data, 200);
        }

        return response()->json($administradores, 200);
    }

    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:administrador',
            'password' => 'required|max:15',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $administrador = Administrador::create([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if (!$administrador) {
            $data = [
                'message' => 'Error al crear el administrador',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'administrador' => $administrador,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    public function show($id)
    {
        $administrador = Administrador::find($id);

        if (!$administrador) {
            $data = [
                'message' => 'No hay administradores encontrados',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'administrador' => $administrador,
            'status' => 200
        ];

        return response()->json($data, 200);

    }

    //DELETE//
    public function destroy($id)
    {
        $administrador = Administrador::find($id);

        if(!$administrador) {
            $data = [
                'message' => 'No hay administradores encontrados',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $administrador->delete();

        $data = [
            'message' => 'Administrador eliminado correctamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }


    //UPDATE//
    public function update(Request $request, $id)
    {
        $administrador = Administrador::find($id);

        if(!$administrador) {
            $data = [
                'message' => 'No hay administradores encontrados',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:administrador',
            'password' => 'required|max:15',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $administrador->email = $request->email;
        $administrador->password = $request->password;

        $administrador->save();

        $data = [
            'message' => 'Administrador actualizado',
                'administrador' => $administrador,
                'status' => 200
        ];

        return response()->json($data, 200);

    }

    //PATCH//
    public function updatePartial(Request $request, $id)
    {

        $administrador = Administrador::find($id);

        if(!$administrador) {
            $data = [
                'message' => 'No hay administradores encontrados',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'email' => 'email|unique:administrador',
            'password' => 'max:15',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }


        if ($request->has('email')) {
            $administrador->email = $request->email;
        }
        if ($request->has('password')) {
            $administrador->password = $request->password;
        }

        $administrador -> save();

        $data = [
            'message' => 'Administrador actualizado',
                'administrador' => $administrador,
                'status' => 200
        ];

        return response()->json($data, 200);
    }
}
