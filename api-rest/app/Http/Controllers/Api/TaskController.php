<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

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
     */
    public function store(Request $request)
    {
        $task = Task::create($request->all());
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($task)
    {
        //
    }
}
