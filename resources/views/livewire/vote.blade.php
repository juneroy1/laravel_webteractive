<div class="voting-system">
    <!-- <button wire:click="downvote" class="btn btn-danger">
        Downvote ({{ $downvotes }})
    </button>

    <p>Total Votes: {{ $upvotes - $downvotes }}</p> -->
    <div class="flex items-center text-gray-500 text-sm">
    <div class="flex items-center mr-6">
         <button wire:click="upvote" class="btn btn-success">
            <div class="flex">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                </svg>
                <span>{{ $post->upvotes }}</span>
            </div>
        </button>
    </div>
    <div class="flex items-center">
         <button wire:click="downvote" class="btn btn-success">
            <div class="flex">
                 <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
                <span>{{ $post->downvotes }}</span>
            </div>
        </button>
    </div>
</div>
</div>


