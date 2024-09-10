<div class="voting-system">
    <button wire:click="upvote" class="btn btn-success">
        Upvote ({{ $upvotes }})
    </button>

    <button wire:click="downvote" class="btn btn-danger">
        Downvote ({{ $downvotes }})
    </button>

    <p>Total Votes: {{ $upvotes - $downvotes }}</p>
</div>
