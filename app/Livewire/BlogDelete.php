<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BlogPost;
class BlogDelete extends Component
{
    public $postId;

    public function deletePost()
    {
        $post = BlogPost::findOrFail($this->postId);

        if (auth()->user()->cannot('update', $post)) {
            abort(403, 'Unauthorized action.');
        }

        $post->delete();

        session()->flash('message', 'Blog post deleted successfully.');

        // Emit an event to refresh the post list in the parent component
        $this->dispatch('postDeleted');

        // uncomment this one if you want to use this
        // return redirect()->route('blog.index');
    }

    public function mount($postId)
    {
        $this->postId = $postId;
    }

    public function render()
    {
        return view('livewire.blog-delete');
    }
}
