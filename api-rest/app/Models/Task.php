<?php

namespace App\Models;

use App\Models\Scopes\FilterScope;
use App\Models\Scopes\IncludeScope;
use App\Models\Scopes\SelectScope;
use App\Models\Scopes\SortScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



/* 
    Para designar que una tabla de la base de datos
    tiene este modelo dentro de la API

    $fillable -> indica que campos no más se quiere rellenar dentro
    de la tabla task

    $guarded -> indica que campos no se quiere que se tome al momento
    de crear un registro
*/

// scope global
#[ScopedBy([
    FilterScope::class,
    SelectScope::class,
    SortScope::class,
    IncludeScope::class
])]

class Task extends Model
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

    // scope local
    public function scopeGetOrPaginate($query)
    {
         // crear consulta
            if (request('perPage')) {
                return $query->paginate(request('perPage'));
            } 
            
            return $query->get();
    }

    // aplicando la relación con tareas
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
