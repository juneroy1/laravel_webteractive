<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="updatePost">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" wire:model="title" class="form-control">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" wire:model="content" class="form-control"></textarea>
            @error('content') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>