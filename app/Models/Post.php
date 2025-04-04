<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'content'// Add this line to allow mass assignment
        // add other fillable fields here as needed
    ];
}
