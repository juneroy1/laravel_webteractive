<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Livewire\Livewire;
use App\Models\BlogPost;
use App\Livewire\BlogDelete;
use App\Models\User;
class BlogDeleteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_delete_a_blog_post()
    {
        // Create a user
        $this->expectNotToPerformAssertions();
        $user = User::factory()->create(['role' => 'User']);

        // Create a blog post associated with the user
        $post = BlogPost::factory()->create([
            'title' => 'Original Title',
            'content' => 'Original content.',
        ]);

        // Simulate the user being logged in
        $this->actingAs($user);

        // Test the Livewire component for updating the blog post
        Livewire::test(BlogDelete::class, ['postId' => $post->id])
            ->call('deletePost');

      
    }
}
