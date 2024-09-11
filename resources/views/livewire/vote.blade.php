<div class="voting-system">
    <!-- <button wire:click="downvote" class="btn btn-danger">
        Downvote ({{ $downvotes }})
    </button>

    <p>Total Votes: {{ $upvotes - $downvotes }}</p> -->
    <div class="flex items-center text-gray-500 text-sm">
    <div class="flex items-center mr-6">
         <button wire:click="upvote" class="btn btn-success">
            <div class="flex">
                <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M14 9V5a3 3 0 00-3-3 3 3 0 00-3 3v4a3 3 0 00-3 3v7a3 3 0 003 3h6a3 3 0 003-3v-7a3 3 0 00-3-3zM9 5a2 2 0 114 0v4H9V5zm7 16h-6a2 2 0 01-2-2v-7a2 2 0 012-2h6a2 2 0 012 2v7a2 2 0 01-2 2z"></path></svg>
                <span>{{ $post->upvotes }}</span>
            </div>
        </button>
    </div>
    <div class="flex items-center">
         <button wire:click="downvote" class="btn btn-success">
            <div class="flex">
                <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21c-4.97 0-9-4.03-9-9s4.03-9 9-9 9 4.03 9 9-4.03 9-9 9zm0-16c-3.86 0-7 3.14-7 7s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7z"></path><path d="M15.99 12l-3.42-3.42L10 11.59 6.41 8 5 9.41l5 5 7-7z"></path></svg>
                <span>{{ $post->downvotes }}</span>
            </div>
        </button>
    </div>
</div>
</div>


