<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Livewire\Livewire;
use App\Models\BlogPost;
use App\Models\User;
use App\Livewire\BlogIndex;

class BlogIndexTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_view_all_posts()
    {
        // Create an admin user
        $admin = User::factory()->create(['role' => 'Admin']);

        // Create blog posts by different users
        $post1 = BlogPost::factory()->create(['title' => 'Admin Post']);
        $post2 = BlogPost::factory()->create(['title' => 'User Post']);

        // Act as the admin user
        $this->actingAs($admin);

        // Test the Livewire component
        Livewire::test(BlogIndex::class)
            ->assertViewHas('posts', function ($posts) use ($post1, $post2) {
                return $posts->contains($post1) && $posts->contains($post2);
            });
    }

    /** @test */
    public function a_user_can_only_view_their_own_posts()
    {
        // Create a regular user
        $user = User::factory()->create(['role' => 'User']);
        $otherUser = User::factory()->create();

        // Create blog posts by the user and another user
        $post1 = BlogPost::factory()->create(['user_id' => $user->id, 'title' => 'User Post']);
        $post2 = BlogPost::factory()->create(['user_id' => $otherUser->id, 'title' => 'Other User Post']);

        // Act as the regular user
        $this->actingAs($user);

        // Test the Livewire component
        Livewire::test(BlogIndex::class)
            ->assertViewHas('posts', function ($posts) use ($post1, $post2) {
                return $posts->contains($post1) && !$posts->contains($post2);
            });
    }
}
