<div class="container mx-auto p-4">
    <!-- <h1 class="text-3xl font-bold mb-6">All Blog Posts</h1> -->

    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 rounded mb-6">
            {{ session('message') }}
        </div>
    @endif
<a href="{{ route('blog.create') }}" class="btn btn-primary">Create New</a>
    @foreach($posts as $post)
        <div class="bg-white shadow-md rounded-lg p-6 mb-4">
            <h2 class="text-3xl font-bold mb-2">{{ $post->title }}</h2>
            <div class="flex items-center justify-between">
                <div class="flex items-center text-gray-600 text-sm mb-4 space-x-4">
                    <img src="https://pc.net/img/terms/avatar.svg" alt="{{ $post->user->name }}" class="w-10 h-10 rounded-full mr-3">
                    <span>Published {{ $post->created_at->format('F d, Y') }} by <a href="#" class="text-blue-600">{{ $post->user->name }}</a></span>
                </div>
                 <div class="flex items-center text-gray-500 text-sm">
                    <div class="flex items-center mr-6">
                        <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M14 9V5a3 3 0 00-3-3 3 3 0 00-3 3v4a3 3 0 00-3 3v7a3 3 0 003 3h6a3 3 0 003-3v-7a3 3 0 00-3-3zM9 5a2 2 0 114 0v4H9V5zm7 16h-6a2 2 0 01-2-2v-7a2 2 0 012-2h6a2 2 0 012 2v7a2 2 0 01-2 2z"></path></svg>
                        <span>{{ $post->upvotes }}</span>
                    </div>
                    <div class="flex items-center">
                         <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21c-4.97 0-9-4.03-9-9s4.03-9 9-9 9 4.03 9 9-4.03 9-9 9zm0-16c-3.86 0-7 3.14-7 7s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7z"></path><path d="M15.99 12l-3.42-3.42L10 11.59 6.41 8 5 9.41l5 5 7-7z"></path></svg>
                       <span>{{ $post->downvotes }}</span>
                    </div>
                </div>
            </div>
            
            <p class="text-gray-700 mb-4">{{ Str::limit($post->content, 150) }}</p>
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
