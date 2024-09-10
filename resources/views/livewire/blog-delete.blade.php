<div>
    <!-- <button wire:click="deletePost" class="btn btn-danger">Delete Post</button> -->
    <form wire:submit.prevent="deletePost">
        <button type="submit" class="btn btn-primary">Delete Post</button>
    </form>
    <script>
        // Livewire.on('triggerDelete', postId => {
        //     if (confirm('Are you sure you want to delete this post?')) {
        //         @this.call('deletePost');
        //     }
        // });
</script>
</div>
