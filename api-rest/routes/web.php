<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', function () {
    $task = new Task();

    $data = [
        'body' => 'Prueba de tarea 3',
        'user_id' => 1
    ];

    /*$task->body = $data['body'];
    $task->user_id = $data['user_id'];

    $task->save();*/

    $task = Task::create($data);

    return $task;
});
