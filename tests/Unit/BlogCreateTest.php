<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Livewire\Livewire;
use App\Models\BlogPost;
use App\Livewire\BlogCreate;
use App\Livewire\BlogEdit;
use App\Models\User;

class BlogCreateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_blog_post()
    {
        $admin = User::factory()->create(['role' => 'Admin']);

        $this->actingAs($admin);
        Livewire::test(BlogCreate::class)
            ->set('title', 'Test Blog Post')
            ->set('content', 'This is a test blog post.')
            ->call('createPost')
            ->assertRedirect(route('blog.index'));

        $this->assertDatabaseHas('blog_posts', ['title' => 'Test Blog Post']);
    }
     /** @test */
    public function a_user_can_only_create_their_own_blog_post()
    {
        $user = User::factory()->create(['role' => 'User']);

        $this->actingAs($user);

        Livewire::test(BlogCreate::class)
            ->set('title', 'User Blog Post')
            ->set('content', 'This is a User blog post.')
            ->call('createPost')
            ->assertRedirect(route('blog.index'));

        $this->assertDatabaseHas('blog_posts', ['title' => 'User Blog Post']);
    }

    
}

