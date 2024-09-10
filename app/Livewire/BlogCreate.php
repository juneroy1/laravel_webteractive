<?php

namespace App\Livewire;

use Livewire\Component;

class BlogCreate extends Component
{
    public $title;
    public $content;

    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ];

    public function createPost()
    {
        $this->validate();

        BlogPost::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        session()->flash('message', 'Blog post created successfully.');

        $this->reset(['title', 'content']);
    }

    
    public function render()
    {
        return view('livewire.blog-create');
    }
}
