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
        /* utilizando el helper
        return request('perPage');*/
        //$task = Task::all();

        $tasks = Task::query();

        /*if (request('filters')) {
            $filters = request('filters');

            //Aplicar filtros
            foreach ($filters as $field => $conditions) {
                foreach ($conditions as $operator => $value) {
                   if(in_array($operator, ['=','>','<','>=','<=','!='])){
                    $tasks->where($field, $operator, $value);
                   }
                   if($operator == 'like'){
                    $tasks->where($field,'like',"%$value%");
                   }
                }
            }*/

            // aplicar select
            if(request(('select'))){
                $select = request('select');
                $selectArray = explode(',',$select);
                $tasks->select($selectArray);
            }

            // Aplicar orden
            if (request('sort')) {
                $sordFields = explode(',', request('sort'));
                foreach($sordFields as $sortField){
                    $direction = 'asc';

                    if(substr($sortField, 0, 1) == '-'){
                        $direction = 'desc';
                        $sortField = substr($sortField,1);
                    }
                    $tasks->orderBy($sortField, $direction);
                }
            }

            // incluir relaciones
            if(request('include')){
                $include = explode(',', request('include'));
                $tasks = $tasks->with($include);
            }

            // crear consulta
            if (request('perPage')) {
                $task = $tasks->paginate(request('perPage'));
            } else {
                $task = $tasks->get();
            }

        //$task = Task::paginate(5);
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
