<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fotografo;
use Illuminate\Support\Facades\Validator;

class fotografoController extends Controller
{
    public function index() 
    { 

        $fotografos = Fotografo::all();

        if ($fotografos->isEmpty()) {
            $data = [
                'message' => 'No hay fotografos',
                'status' => 200
            ];
            return response()->json($data, 200);
        }

        return response()->json($fotografos, 200);
        //return 'Obteniendo lista de clientes desde el controller';
    }

    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'nameUser' => 'required|max:255',
            'username'=> 'required|unique:fotografo',
            'phone' => 'required|digits:10',
            'email' => 'required|email|unique:fotografo',
            'adress' => 'required|max:255',
            'birthday' => 'required|date',
            'description' => 'required|max:255',
            'image' => 'required|',
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

        $fotografo = Fotografo::create([
            'nameUser' => $request->nameUser,
            'username'=> $request->username,
            'phone' => $request->phone,
            'email' => $request->email,
            'adress' => $request->adress,
            'birthday' => $request->birthday,
            'description' => $request->description,
            'image' => $request->image,
            'password' => $request->password,
        ]);

        if (!$fotografo) {
            $data = [
                'message' => 'Error al crear el fotografo',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'fotografo' => $fotografo,
            'status' => 201
        ];

        return response()->json($data, 201);
    }

    public function show($id)
    {
        $fotografo = fotografo::find($id);

        if (!$fotografo) {
            $data = [
                'message' => 'No hay fotografos encontrados',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'fotografo' => $fotografo,
            'status' => 200
        ];

        return response()->json($data, 200);

    }

    //DELETE//

    public function destroy($id)
    {
        $fotografo = Fotografo::find($id);

        if(!$fotografo) {
            $data = [
                'message' => 'No hay fotografos encontrados',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $fotografo->delete();

        $data = [
            'message' => 'Fotografo eliminado correctamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }


    //UPDATE//
    public function update(Request $request, $id)
    {
        $fotografo = Fotografo::find($id);

        if(!$fotografo) {
            $data = [
                'message' => 'No hay fotografos encontrados',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nameUser' => 'required|max:255',
            'username'=> 'required|unique:fotografo',
            'phone' => 'required|digits:10',
            'email' => 'required|email|unique:fotografo',
            'adress' => 'required|',
            'birthday' => 'required|date',
            'description' => 'required|',
            'image' => 'required|',
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

        $fotografo->nameUser = $request->nameUser;
        $fotografo->username = $request->username;
        $fotografo->phone = $request->phone;
        $fotografo->email = $request->email;
        $fotografo->adress = $request->adress;
        $fotografo->birthday = $request->birthday;
        $fotografo->description = $request->description;
        $fotografo->image = $request->image;
        $fotografo->password = $request->password;

        $fotografo->save();

        $data = [
            'message' => 'Fotografo actualizado',
                'fotografo' => $fotografo,
                'status' => 200
        ];

        return response()->json($data, 200);

    }

    //PATCH//
    public function updatePartial(Request $request, $id)
    {

        $fotografo = Fotografo::find($id);

        if(!$fotografo) {
            $data = [
                'message' => 'No hay fotografos encontrados',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nameUser' => 'max:255',
            'username'=> 'unique:fotografo',
            'phone' => 'digits:10',
            'email' => 'email|unique:fotografo',
            'adress' => 'max:255',
            'birthday' => 'date',
            'description' => 'max:255',
            'image' => '',
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

        if ($request->has('nameUser')) {
            $fotografo->nameUser = $request->nameUser;
        }

        if ($request->has('username')) {
            $fotografo->username = $request->username;
        }

        if ($request->has('phone')) {
            $fotografo->phone = $request->phone;
        }

        if ($request->has('email')) {
            $fotografo->email = $request->email;
        }
        if ($request->has('adress')) {
            $fotografo->adress = $request->adress;
        }

        if ($request->has('birthday')) {
            $fotografo->birthday = $request->birthday;
        }

        if ($request->has('description')) {
            $fotografo->description = $request->description;
        }

        if ($request->has('image')) {
            $fotografo->image = $request->image;
        }

        if ($request->has('password')) {
            $fotografo->password = $request->password;
        }

        $fotografo -> save();

        $data = [
            'message' => 'Fotografo actualizado',
                'fotografo' => $fotografo,
                'status' => 200
        ];

        return response()->json($data, 200);
    }

}
