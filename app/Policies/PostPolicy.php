<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Log;
use App\Models\Post;
use App\Models\User;

class PostPolicy
{

    public function before(User $user, string $ability): bool|null
{
    // Log::info("🔐 PostPolicy before() called", [
    //     'user_id' => $user->id,
    //     'ability' => $ability,
    //     'is_admin' => $user->is_admin,
    // ]);

    
    if ($user->is_admin) {
        return true;
    }
 
    return null;
}

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        return false;
    }
}
