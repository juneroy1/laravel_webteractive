<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BlogPost;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPostPolicy
{
    use HandlesAuthorization;

    public function update(User $user, BlogPost $post)
    {
        return $user->isAdmin() || $user->id === $post->user_id;
    }

    public function delete(User $user, BlogPost $post)
    {
        return $user->isAdmin() || $user->id === $post->user_id;
    }
}
