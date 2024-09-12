<div class="container mx-auto p-4">
    <div class="bg-white shadow-md rounded-lg p-6 mb-4">
        <h2 class="text-4xl font-bold mb-2">{{ $post->title }}</h2>
        <div class="flex items-center justify-between">
            <div class="flex items-center text-gray-600 text-sm mb-4 gap-1">
                <img
                    src="https://pc.net/img/terms/avatar.svg"
                    alt="{{ $post->user->name }}"
                    class="w-10 h-10 rounded-full"
                />
                <span
                    >Published {{ $post->created_at->format('F d, Y') }} by
                    <a
                        href="#"
                        class="text-blue-600"
                        >{{ $post->user->name }}</a
                    ></span
                >
            </div>
            <livewire:vote :post="$post" :key="$post->id" />
        </div>
        <p class="text-gray-700">{{ $post->content }}</p>
        <img
            src="{{ $post->image_url ?? 'https://www.fond.co/wp-content/uploads/2019/10/3-sample-employee-recognition-programs-768x566.jpg' }}"
            alt="{{ $post->title }}"
            class="object-cover h-full w-full rounded-t-lg md:rounded-l-lg md:rounded-t-none"
        />
        <div class="flex space-x-2">
            <a
                href="{{ route('blog.edit', $post->id) }}"
                class="text-black px-0 py-2 rounded"
            >
                Edit Post
            </a>
        </div>
        <!-- <p class="text-sm text-gray-500 mt-4">Posted on: {{ $post->created_at->format('M d, Y') }}</p> -->
        <a
            href="{{ route('blog.main') }}"
            class="mt-6 inline-block bg-blue-500 text-white px-2 py-2 rounded"
        >
            Back to All Posts
        </a>
    </div>
</div>
