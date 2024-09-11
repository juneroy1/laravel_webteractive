<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Livewire\Livewire;
use App\Models\BlogPost;
use App\Models\User;
use App\Livewire\Vote;

class UpVoteComponentTest extends TestCase
{
     /** @test */
    public function it_can_upvote_a_post()
    {
        // Create a blog post
        $post = BlogPost::factory()->create([
            'upvotes' => 0,
            'downvotes' => 0,
        ]);

        // Test the Livewire component
        Livewire::test(Vote::class, ['post' => $post])
            ->call('upvote') // Call the upvote method
            ->assertSet('upvotes', 1); // Assert that upvotes incremented

        // Assert the upvotes in the database
        $this->assertDatabaseHas('blog_posts', [
            'id' => $post->id,
            'upvotes' => 1,
        ]);
    }
}
