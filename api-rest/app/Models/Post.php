<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Api
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'image_path',
        'is_published',
        'published_at',
        'user_id',
        'category_id',
    ];

    // especifica que estos dos tipos de datos sean tratados de acuerdo a su tipo de datos especificado
    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];
}
