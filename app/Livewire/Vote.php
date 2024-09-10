<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BlogPost;

class Vote extends Component
{
    public $post;
    public $upvotes;
    public $downvotes;

    public function mount(BlogPost $post)
    {
        $this->post = $post;
        $this->upvotes = $post->upvotes;
        $this->downvotes = $post->downvotes;
    }

    public function upvote()
    {
        $this->post->increment('upvotes');
        $this->upvotes = $this->post->upvotes;
    }

    public function downvote()
    {
        $this->post->increment('downvotes');
        $this->downvotes = $this->post->downvotes;
    }

    public function render()
    {
        return view('livewire.vote');
    }
}
