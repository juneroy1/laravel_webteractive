<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6">All Blog Posts</h1>

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 rounded mb-6">
            {{ session('message') }}
        </div>
    @endif

    @foreach($posts as $post)
        <div class="bg-white shadow-md rounded-lg p-6 mb-4">
            <h3 class="text-xl font-semibold mb-2">{{ $post->title }}</h3>
            <p class="text-gray-700 mb-4">{{ $post->content }}</p>
            <div class="flex space-x-2">
               
                <a href="{{ route('blog.edit', $post->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">
                    Edit Post
                </a>
                <livewire:blog-delete :postId="$post->id" :key="$post->id" />
                <livewire:vote :post="$post" :key="$post->id" />
            </div>
        </div>
    @endforeach

    <div class="mt-6">
        {{ $posts->links('pagination::tailwind') }}
    </div>
</div>
