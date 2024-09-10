<?php

namespace App\Livewire;

use Livewire\Component;

class BlogEdit extends Component
{
    public $postId;
    public $title;
    public $content;
    
    public function render()
    {
        return view('livewire.blog-edit');
    }
}
