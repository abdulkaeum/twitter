<div class="p-4 border-b border-b-grey-400">
    <div class="flex">
        <div class="mr-2 flex-shrink-0">
            <a href="{{ route('profile', $tweet->user) }}">
                <img
                    class="rounded-full mr-3"
                    src="{{ $tweet->user->avatar }}"
                    alt=""
                    width="40"
                    height="40"
                >
            </a>
        </div>
        <div class="w-full">
            <a href="{{ route('profile', $tweet->user->username) }}">
                <h5 class="font-bold mb-4">{{ $tweet->user->name }}</h5>
            </a>
            <p class="text-xs mb-2">
                {{ $tweet->created_at->diffForHumans() }}
            </p>
            <p class="text-sm mb-3">
                {{ $tweet->body }}
            </p>
        </div>
        <div class="justify-right text-xs">
            <form action="{{ route('tweet.destroy', $tweet) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">
                    <i class="far fa-trash-alt"></i>
                </button>
            </form>
        </div>
    </div>
    <div>
        @if($tweet->user->isNot(auth()->user()))
            <x-forms.like-buttons :tweet="$tweet"/>
        @endif
    </div>
</div>
