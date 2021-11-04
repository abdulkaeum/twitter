<div class="border border-grey-300 rounded-lg">
    @forelse($tweets as $tweet)
        @include('partials._tweet')
    @empty
        <p class="p-4">No tweets yet.</p>
    @endforelse
</div>
