<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;

class clienteController extends Controller
{
    public function index() 
    { 

        $clientes = Cliente::all();

        if ($clientes->isEmpty()) {
            $data = [
                'message' => 'No hay clientes',
                'status' => 200
            ];
            return response()->json($data, 200);
        }

        return response()->json($clientes, 200);
        //return 'Obteniendo lista de clientes desde el controller';
    }

    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'nameUser' => 'required|max:255',
            'username'=> 'required|unique:cliente',
            'phone' => 'required|digits:10',
            'document' => 'required|digits:10|unique:cliente,document',
            'birthday' => 'required|date',
            'image' => 'required|',
            'email' => 'required|email|unique:cliente',
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

        $cliente = Cliente::create([
            'nameUser' => $request->nameUser,
            'username'=> $request->username,
            'phone' => $request->phone,
            'document' => $request->document,
            'birthday' => $request->birthday,
            'image' => $request->image,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if (!$cliente) {
            $data = [
                'message' => 'Error al crear el cliente',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'cliente' => $cliente,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            $data = [
                'message' => 'No hay clientes encontrados',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'cliente' => $cliente,
            'status' => 200
        ];

        return response()->json($data, 200);

    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if(!$cliente) {
            $data = [
                'message' => 'No hay clientes encontrados',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $cliente->delete();

        $data = [
            'message' => 'Cliente eliminado correctamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);

        if(!$cliente) {
            $data = [
                'message' => 'No hay clientes encontrados',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nameUser' => 'required|max:255',
            'username'=> 'required|unique:cliente',
            'phone' => 'required|digits:10',
            'document' => 'required|digits:10|unique:cliente,document',
            'birthday' => 'required|date',
            'image' => 'required|',
            'email' => 'required|email|unique:cliente',
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

        $cliente->nameUser = $request->nameUser;
        $cliente->username = $request->username;
        $cliente->phone = $request->phone;
        $cliente->document = $request->document;
        $cliente->birthday = $request->birthday;
        $cliente->image = $request->image;
        $cliente->email = $request->email;
        $cliente->password = $request->password;

        $cliente->save();

        $data = [
            'message' => 'Cliente actualizado',
                'cliente' => $cliente,
                'status' => 200
        ];

        return response()->json($data, 200);

    }

    public function updatePartial(Request $request, $id)
    {
        if(!$cliente) {
            $data = [
                'message' => 'No hay clientes encontrados',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nameUser' => 'required|max:255',
            'username'=> 'required|unique:cliente',
            'phone' => 'required|digits:10',
            'document' => 'required|digits:10|unique:cliente,document',
            'birthday' => 'required|date',
            'image' => 'required|',
            'email' => 'required|email|unique:cliente',
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

        if ($request->has('nameUser')) {
            $cliente->nameUser = $request->nameUser;
        }

        if ($request->has('username')) {
            $cliente->username = $request->username;
        }

        if ($request->has('phone')) {
            $cliente->phone = $request->phone;
        }

        if ($request->has('document')) {
            $cliente->document = $request->document;
        }

        if ($request->has('birthday')) {
            $cliente->birthday = $request->birthday;
        }

        if ($request->has('image')) {
            $cliente->image = $request->image;
        }

        if ($request->has('email')) {
            $cliente->email = $request->email;
        }

        if ($request->has('password')) {
            $cliente->password = $request->password;
        }

        $cliente -> save();

        $data = [
            'message' => 'Cliente actualizado',
                'cliente' => $cliente,
                'status' => 200
        ];

        return response()->json($data, 200);
    }

}
