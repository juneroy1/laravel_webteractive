<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Edit Blog Post</h1>

    @if (session()->has('message'))
        <div class="bg-green-500 text-black p-4 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="updatePost">
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
            <input type="text" id="title" wire:model="title" class="w-full p-2 border border-gray-300 rounded" placeholder="Enter the title">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="block text-gray-700 font-bold mb-2">Content</label>
            <textarea id="content" wire:model="content" class="w-full p-2 border border-gray-300 rounded" placeholder="Enter the content" rows="5"></textarea>
            @error('content') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <!-- Existing Image Display -->
        @if($existingImage)
            <img src="{{ Storage::url($existingImage) }}" alt="Existing Image" style="max-width: 200px;">
        @endif

        <!-- Image input -->
        <input type="file" wire:model="image">
        
        @error('image') <span class="error">{{ $message }}</span> @enderror

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Post</button>
    </form>
</div>
