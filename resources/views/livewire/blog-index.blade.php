<div>
    <h1>All Blog Posts</h1>

    @foreach($posts as $post)
        <div class="card mt-3">
            <div class="card-body">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->content }}</p>
                <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-primary">View Post</a>
            </div>
        </div>
    @endforeach
</div>