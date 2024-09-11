<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Livewire\Livewire;
use App\Models\BlogPost;
use App\Livewire\BlogCreate;
use App\Livewire\BlogEdit;
use App\Models\User;

class BlogEditTest extends TestCase
{
     /** @test */
    public function it_can_update_a_blog_post()
    {
        // Create a user
        $user = User::factory()->create(['role' => 'User']);

        // Create a blog post associated with the user
        $post = BlogPost::factory()->create([
            'title' => 'Original Title',
            'content' => 'Original content.',
            'user_id' => $user->id,
        ]);

        // Simulate the user being logged in
        $this->actingAs($user);

        // Test the Livewire component for updating the blog post
        Livewire::test(BlogEdit::class, ['id' => $post->id])
            ->set('title', 'Updated Title')
            ->set('content', 'Updated content.')
            ->call('updatePost')
            ->assertRedirect(route('blog.index'));

         // Verify the changes in the database
        $this->assertDatabaseHas('blog_posts', [
            'id' => $post->id,
            'title' => 'Updated Title',
            'content' => 'Updated content.',
        ]);
        
    }
}
