<div class="flex border border-blue-100 bg-blue-50 rounded">

    <form action="{{ route('tweet.bookmark', $tweet->id) }}" method="POST">
        @csrf
        <button type="submit" class="h-8 px-2 m-2" title="{{ $tweet->isBookmarked(current_user()) ? 'Remove bookmark' : 'Bookmark' }}">
            <i class="far fa-bookmark mr-2 mr-1 text-lg text-{{ $tweet->isBookmarked(current_user()) ? 'blue' : 'grey' }}-500"></i>
        </button>
    </form>

    <form action="{{ route('like', $tweet->id) }}" method="POST">
        @csrf
        <div class="flex items-center mr-5">
            <button type="submit" class="h-8 px-2 m-2" title="Like">
                <i class="far fa-thumbs-up mr-1 text-lg text-{{ $tweet->likes ? 'blue' : 'grey' }}-500"></i>
            </button>
            <span class="text-sm text-grey-500">
                    {{ $tweet->likes ?? 0 }}
            </span>
        </div>
    </form>

    <form action="{{ route('dislike', $tweet->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="flex items-center mr-5">
            <button type="submit" class="h-8 px-2 m-2" title="Dislike">
                <i class="far fa-thumbs-down mr-1 text-lg text-{{ $tweet->dislikes ? 'blue' : 'grey' }}-500"></i>
            </button>
            <span class="text-sm text-grey-500">
                    {{ $tweet->dislikes ?? 0 }}
            </span>
        </div>
    </form>

    @if($tweet->isDislikedBy(current_user()) || $tweet->isLikedBy(current_user()))
        <form action="{{ route('like.destroy', $tweet->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex items-center">
                <button type="submit" class="h-8 px-2 m-2" title="Remove my like / dislike">
                    <i class="fas fa-times mr-1 text-xs"></i>
                </button>
            </div>
        </form>
    @endif
</div>
