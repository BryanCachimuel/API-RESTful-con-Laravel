<?php

use App\Http\Controllers\Api\UserController;
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
Route::get('users', [UserController::class, 'index']);

// Crear registros
Route::post('users', [UserController::class, 'store']);

// Recuperar registros
Route::get('users/{id}', [UserController::class, 'show']);

// Actualizar registros
Route::put('users/{id}', [UserController::class, 'update']);

// Eliminar registros
Route::delete('users/{id}', [UserController::class, 'destroy']);

/*
Todas las rutas anteriores se reducen a esta script
siempre y cuando en el controlador las rutas que buscan por $id se cambien por 
parámetro user
Route::apiResource('users', UserController::class);
*/
