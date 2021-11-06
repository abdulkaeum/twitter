<div class="flex">
    <form action="{{ route('like', $tweet->id) }}" method="POST">
        @csrf
        <div class="flex items-center mr-5">
            <button type="submit" class="h-8 px-2 m-2">
                <i class="far fa-thumbs-up mr-1 text-lg text-{{ $tweet->isLikedBy(current_user()) ? 'blue' : 'grey' }}-500"></i>
            </button>
            <span class="text-sm text-grey-500">
                    {{ $tweet->likes ?? 0 }}
                </span>
        </div>
    </form>

    <form action="{{ route('dislike', $tweet->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="flex items-center">
            <button type="submit" class="h-8 px-2 m-2">
                <i class="far fa-thumbs-up mr-1 text-lg text-{{ $tweet->isDislikedBy(current_user()) ? 'blue' : 'grey' }}-500"></i>
            </button>
            <span class="text-sm text-grey-500">
                    {{ $tweet->dislikes ?? 0 }}
                </span>
        </div>
    </form>
</div>
