<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Api
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    protected $table = 'tags';

    protected $fillable = ['name'];
}
