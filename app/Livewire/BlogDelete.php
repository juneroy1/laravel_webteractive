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
        $post->delete();

        session()->flash('message', 'Blog post deleted successfully.');
        return redirect()->route('blog.index');
    }

    public function mount($id)
    {
        $this->postId = $id;
    }

    public function render()
    {
        return view('livewire.blog-delete');
    }
}
