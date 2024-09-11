<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BlogPost;

class BlogEdit extends Component
{
    public $postId;
    public $title;
    public $content;

    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ];

    public function mount($id)
    {
        
        $post = BlogPost::findOrFail($id);

        if (auth()->user()->cannot('update', $post)) {
            abort(403, 'Unauthorized action.');
        }

        $this->postId = $post->id;
        $this->title = $post->title;
        $this->content = $post->content;
    }

    public function updatePost()
    {
        $this->validate();

        $post = BlogPost::findOrFail($this->postId);

        if (auth()->user()->cannot('update', $post)) {
            abort(403, 'Unauthorized action.');
        }
        
        $post->update([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        session()->flash('message', 'Blog post updated successfully.');
    }

    public function render()
    {
        return view('livewire.blog-edit');
    }
}
