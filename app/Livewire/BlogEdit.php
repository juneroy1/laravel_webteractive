<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BlogPost;
use Livewire\WithFileUploads;
class BlogEdit extends Component
{
    use WithFileUploads;
    public $postId;
    public $title;
    public $content;
    public $image;
    public $existingImage;

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
        $this->existingImage = $post->image;
    }

    public function updatePost()
    {
        $this->validate();
        // Handle image upload
        $imagePath = $this->image ? $this->image->store('blog_images', 'public') : $this->existingImage;
        $post = BlogPost::findOrFail($this->postId);

        if (auth()->user()->cannot('update', $post)) {
            abort(403, 'Unauthorized action.');
        }
        
        $post->update([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        session()->flash('message', 'Blog post updated successfully.');
         $this->reset(['title', 'content']);
       return redirect()->route('blog.index');
    }

    public function render()
    {
        return view('livewire.blog-edit');
    }
}
