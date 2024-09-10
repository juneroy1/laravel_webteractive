<div>
    <button wire:click="$emit('triggerDelete', {{ $postId }})" class="btn btn-danger">Delete Post</button>

    <script>
        Livewire.on('triggerDelete', postId => {
            if(confirm('Are you sure you want to delete this post?')) {
                @this.call('deletePost');
            }
        });
    </script>
</div>
