<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        'title', 'content', 'user_id'// Add this line to allow mass assignment
        // add other fillable fields here as needed
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
