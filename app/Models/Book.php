<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'isbn',
        'publisher',
        'publication_year',
        'category',
        'shelf_location',
        'description',
        'cover_image',
    ];
}