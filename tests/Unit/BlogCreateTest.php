<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Livewire\Livewire;
use App\Models\BlogPost;
use App\Livewire\BlogCreate;
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
}

