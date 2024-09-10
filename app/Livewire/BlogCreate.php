<?php

namespace App\Livewire;

use Livewire\Component;

class BlogCreate extends Component
{
    public $title;
    public $content;
    
    public function render()
    {
        return view('livewire.blog-create');
    }
}
