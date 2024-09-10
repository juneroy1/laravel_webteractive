<?php

namespace App\Livewire;

use Livewire\Component;

class BlogEdit extends Component
{
    public $postId;
    public $title;
    public $content;

    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ];

    public function render()
    {
        return view('livewire.blog-edit');
    }
}
