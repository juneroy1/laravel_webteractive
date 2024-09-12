<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class BlogCreate extends Component
{   
    use WithFileUploads;
    public $title;
    public $content;
    public $image;

    protected $rules = [
        'title' => 'required|string|max:255|min:2',
        'content' => 'required|string',
        'image' => 'nullable|image|max:1024', // 1MB Max
    ];

    public function createPost()
    {
        $this->validate();
        $userId = Auth::id();

        // Handle image upload
        $imagePath = $this->image ? $this->image->store('blog_images', 'public') : null;

        BlogPost::create([
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => $userId,
            'image' => $imagePath, // Save the image path in the database
        ]);

        session()->flash('message', 'Blog post created successfully.');

        // Reset fields
        $this->reset(['title', 'content', 'image']);

        return redirect()->route('blog.main');
    }

    
    public function render()
    {
        return view('livewire.blog-create');
    }
}
