<div>
    <h1>All Blog Posts</h1>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
     <a href="{{ route('blog.create') }}" class="btn btn-primary">Create New</a>
    @foreach($posts as $post)
        <div class="card mt-3">
            <div class="card-body">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->content }}</p>
                <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-primary">View Post</a>
                
                <livewire:blog-delete :postId="$post->id" :key="$post->id" />
                <!-- Voting system -->
                <livewire:vote :post="$post" :key="$post->id" />
            </div>
        </div>
    @endforeach

    <div class="mt-4">
        {{ $posts->links() }} <!-- Pagination links -->
    </div>
</div>