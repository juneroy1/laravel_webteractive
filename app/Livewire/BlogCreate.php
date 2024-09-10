<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Auth;
class BlogCreate extends Component
{
    public $title;
    public $content;

    protected $rules = [
        'title' => 'required|string|max:255|min:2',
        'content' => 'required|string',
    ];

    public function createPost()
    {
        $this->validate();
        $userId = Auth::id();
        BlogPost::create([
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => $userId,
        ]);

        session()->flash('message', 'Blog post created successfully.');

        $this->reset(['title', 'content']);
       return redirect()->route('blog.index');
    }

    
    public function render()
    {
        return view('livewire.blog-create');
    }
}
