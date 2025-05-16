<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/* 
    Para designar que una tabla de la base de datos
    tiene este modelo dentro de la API

    $fillable -> indica que campos no más se quiere rellenar dentro
    de la tabla task

    $guarded -> indica que campos no se quiere que se tome al momento
    de crear un registro
*/

class Task extends Api
{
    // este modelo utilizará un factory
    use HasFactory;

    protected $table = 'tasks';
    protected $fillable = [
        'body',
        'user_id',
    ];

    /*protected $guarded = [
        ''
    ];*/

    // aplicando la relación con tareas
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
