<div class="max-w-7xl mx-auto p-6 bg-gray-50">
    <!-- <h1 class="text-3xl font-bold mb-6">All Blog Posts</h1> -->

    <h1 class="text-black font-bold mb-4">LATEST</h1>

    @if (session()->has('message'))
    <div class="bg-green-700 text-black p-4 rounded mb-6">
        {{ session("message") }}
    </div>
    @endif @foreach($posts as $post)
    <div class="flex flex-row md:flex-col bg-white shadow-lg rounded-lg mb-6">
        <!-- Blog Image -->
        <div class="md:w-1/3 w-full">
            <a
                href="{{ route('blog.show', $post->id) }}"
                class="text-black px-0 py-2 rounded"
            >
                <img
                    src="{{ $post->image_url ?? 'https://www.fond.co/wp-content/uploads/2019/10/3-sample-employee-recognition-programs-768x566.jpg' }}"
                    alt="{{ $post->title }}"
                    class="object-cover h-full w-full rounded-t-lg md:rounded-l-lg md:rounded-t-none"
                />
            </a>
        </div>
        <!-- Content Area -->
        <div class="md:w-2/3 w-full p-6 flex flex-col justify-between">
            <div>
                <!-- Post Category (e.g., NEWS) -->
                <span
                    class="bg-gray-200 text-gray-800 text-xs font-bold px-2 py-1 rounded-full"
                    >{{ $post->category ?? 'New' }}</span
                >
                <!-- Post Title -->
                <h2 class="text-2xl font-bold text-gray-900 mt-2">
                    <a
                        href="{{ route('blog.show', $post->id) }}"
                        class="text-black px-0 py-2 rounded"
                        >{{ $post->title }}
                    </a>
                </h2>
                <!-- Post Content -->
                <p class="mt-3 text-gray-600">
                    <a
                        href="{{ route('blog.show', $post->id) }}"
                        class="text-black px-0 py-2 rounded"
                        >{{ Str::limit($post->content, 250) }}
                    </a>
                </p>
            </div>
            <div class="flex items-center justify-between mt-4">
                <!-- Post Metadata -->
                <div class="flex items-center">
                    <span
                        class="text-gray-500 text-sm"
                        >{{ $post->created_at->format('F j, Y') }}</span
                    >
                    <span class="ml-2 text-sm text-blue-600"
                        >by {{ $post->user->name }}</span
                    >
                </div>
                <livewire:vote :post="$post" :key="$post->id" />
                <!-- <div class="flex items-center space-x-4">
                       
                        <div class="flex items-center text-gray-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                            </svg>
                            <span class="ml-1">{{ $post->upvotes }}</span>
                        </div>
                   
                        <div class="flex items-center text-gray-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                            <span class="ml-1">{{ $post->downvotes }}</span>
                        </div>
                    </div> -->
            </div>
        </div>
    </div>
    @endforeach

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</div>
