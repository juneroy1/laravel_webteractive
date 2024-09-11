<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BlogPost;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogPostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
}
