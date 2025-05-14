<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $task = Task::all();
        return response()->json($task);
    }

    /**
     * Store a newly created resource in storage.
     * Agregando un código de estado 201 que indica 
     * creación con éxito de registro
     * 
     * 1er forma -> 'user_id' => 'required|exists:users,id',
     * 2da forma -> 'user_id' => 'user_id' => ['required', 'exists:users,id'],
     */
    public function store(StoreTaskRequest $request)
    {
        /*aplicando reglas de validación
        $request->validate([
            'body' => 'required',
            'user_id' => ['required', 'exists:users,id'],
        ]);*/

        $task = Task::create($request->all());
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     * Model Binding consiste en agregar el nombre del modelo como parámetro de la función
     * y comentar la parte de encontrar la tarea, el proceso se simplifica tal como se ve
     * en la función show
     */
    public function show(Task $task)
    {
        //$task = Task::find($task);
        return response()->json($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {   
        /* aplicando reglas de validación
        $request->validate([
            'body' => 'required',
            'user_id' => ['nullable', 'exists:users,id'],
        ]);*/
        //$task = Task::find($task);
        $task->update($request->all());
        return response()->json($task, 200);
    }

    /**
     * Remove the specified resource from storage.
     * con el código 204 nos indica que se a eliminado el registro
     * pero por consola no muestra nada
     */
    public function destroy(Task $task)
    {
        //$task = Task::find($task);
        $task->delete();
        //return response()->json($task, 204);
        return response()->json($task);
    }
}
