<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Listado de usuarios
    public function index()
    {
        return response()->json([
            'message'=> 'Listado de Usuarios'
        ]);
    }

    // crear usuarios
    public function store()
    {
        return response()->json([
            'message' => 'Usuario creado'
        ]);
    }

    // buscar usuario por id
    public function show($id)
    {
         return response()->json([
            'message' => 'Usuario recuperado: ' . $id
        ]);
    }

    // actualizar usuario por id
    public function update($id)
    {
        return response()->json([
            'message' => 'Usuario actualizado: ' . $id
        ]);
    }

    // eliminar usuario por id
    public function destroy($id)
    {
         return response()->json([
            'message' => 'Usuario eliminado: ' . $id
        ]);
    }
}

