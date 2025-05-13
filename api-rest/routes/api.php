<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Para desarrollar un api en laravel hay que utilizar este archivo para las rutas 
  y se lo instala mediante el comando php artisan install:api
*/

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

/*
    Para acceder a las rutas de la api se debe poner en la url lo siguiente
    http://127.0.0.1:8000/api
*/

Route::get('/', function(){
    return response()->json([
        'message'=> 'Hola desde la API de laravel'
    ]);
});

// Listar registros
Route::get('users', function(){
    return response()->json([
        'message' => 'Listado de Usuarios'
    ]);
});

// Crear registros
Route::post('users', function(){
    return response()->json([
        'message' => 'Usuario creado'
    ]);
});

// Recuperar registros
Route::get('users/{id}', function($id){
    return response()->json([
        'message' => 'Usuario recuperado: ' . $id
    ]);
});

// Actualizar registros
Route::put('users/{id}', function($id){
    return response()->json([
        'message' => 'Usuario actualizado: ' . $id
    ]);
});

// Eliminar registros
Route::delete('users/{id}', function($id){
    return response()->json([
        'message' => 'Usuario eliminado: ' . $id
    ]);
});
