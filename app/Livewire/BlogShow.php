<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BlogPost;
class BlogShow extends Component
{
    public $post;

    public function mount($id)
    {
        $this->post = BlogPost::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.blog-show');
    }
}
