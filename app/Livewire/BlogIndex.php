<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BlogPost;
use Livewire\WithPagination;
class BlogIndex extends Component
{
    // this was working before a listeners
    // protected $listeners = ['postDeleted' => 'render'];
    use WithPagination;
    public function render()
    {
        $posts = [];
         // Admin can access all posts, users can only access their own
        if (auth()->user()->isAdmin()) {
            $posts = BlogPost::latest()->paginate(5);
        } else {
            $posts = BlogPost::where('user_id', auth()->id())->paginate(5);
        }

        return view('livewire.blog-index', [
            'posts' => $posts,
        ]);
    }
}
