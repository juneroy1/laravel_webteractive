<div class="container mx-auto p-4">
    <!-- <h1 class="text-3xl font-bold mb-6">All Blog Posts</h1> -->

    @if (session()->has('message'))
    <div class="bg-green-500 text-white p-4 rounded mb-6">
        {{ session("message") }}
    </div>
    @endif
    <h1 class="text-black font-bold mb-4">LATEST</h1>
    <a href="{{ route('blog.create') }}" class="btn btn-primary">Create New</a>
    @foreach($posts as $post)
    <div class="bg-white shadow-md rounded-lg p-6 mb-4">
        <h2 class="text-3xl font-bold mb-2">
            <a
                href="{{ route('blog.show', $post->id) }}"
                class="text-black px-2 py-2 rounded"
                >{{ $post->title }}
            </a>
        </h2>
        <div class="flex items-center justify-between">
            <div class="flex items-center text-gray-600 text-sm mb-4 space-x-4">
                <img
                    src="https://pc.net/img/terms/avatar.svg"
                    alt="{{ $post->user->name }}"
                    class="w-10 h-10 rounded-full mr-3"
                />
                <span
                    >Published {{ $post->created_at->format('F d, Y') }} by
                    <a href="#" class="text-blue-600"
                        >{{ $post->user->name }}
                    </a></span
                >
            </div>
            <livewire:vote :post="$post" :key="$post->id" />
        </div>

        <a
            href="{{ route('blog.show', $post->id) }}"
            class="text-black px-2 py-2 rounded"
            ><p class="text-gray-700 mb-4">
                {{ Str::limit($post->content, 150) }}
            </p>
        </a>
        
    </div>
    @endforeach

    <div class="mt-6">
        {{ $posts->links('pagination::tailwind') }}
    </div>
</div>
