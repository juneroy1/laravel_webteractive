<?php

namespace Tests\Unit;


use Tests\TestCase;
use App\Models\BlogPost;
use Livewire\Livewire;
use App\Livewire\BlogShow;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogShowTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_blog_show_component_renders_successfully()
    {
        // Arrange: Create a blog post
        $post = BlogPost::factory()->create();

        // Act & Assert: Ensure the component renders successfully
        Livewire::test(BlogShow::class, ['id' => $post->id])
            ->assertStatus(200)
            ->assertViewIs('livewire.blog-show')
            ->assertSee($post->title);
    }

    /** @test */
    public function the_blog_show_component_loads_post_data_correctly()
    {
        // Arrange: Create a blog post
        $post = BlogPost::factory()->create();

        // Act & Assert: Ensure the component loads post data correctly
        Livewire::test(BlogShow::class, ['id' => $post->id])
            ->assertSet('post.id', $post->id)
            ->assertSet('post.title', $post->title)
            ->assertSee($post->content);
    }

    /** @test */
    public function the_blog_show_component_handles_non_existent_post_gracefully()
    {
        // Act & Assert: Expect a ModelNotFoundException for a non-existent post ID
        $this->expectException(\Illuminate\Database\Eloquent\ModelNotFoundException::class);

        Livewire::test(BlogShow::class, ['id' => 9999]);
    }
}
