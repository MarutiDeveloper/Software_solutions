<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs'; // Name of the table in the database

    protected $fillable = [
        'title',
        'content',
        'author',
        'category',
        'image',
        'published_date'
    ];
}
