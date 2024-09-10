<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BlogPost;
class BlogIndex extends Component
{
    // this was working before a listeners
    // protected $listeners = ['postDeleted' => 'render'];
    public function render()
    {
        return view('livewire.blog-index', [
            'posts' => BlogPost::latest()->get(),
        ]);
    }
}
