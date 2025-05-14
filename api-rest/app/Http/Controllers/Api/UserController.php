<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Listado de usuarios
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    // crear usuarios
    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    // buscar usuario por id
    public function show($id)
    {
         $user = User::find($id);
         return response()->json($user);
    }

    // actualizar usuario por id
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return response()->json($user);
    }

    // eliminar usuario por id
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        // return response()->json($user, 204);
        return response()->json($user);
    }
}

