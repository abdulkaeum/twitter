<x-layout.layout>
    <div class="lg:flex lg:justify-between">
        <div class="lg:w-32">
            @include('partials._sidebar-links')
        </div>

        <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
            @include('partials._post-tweet')

            <div class="border border-grey-300 rounded-lg">
                @foreach($tweets as $tweet)
                    @include('partials._tweet')
                @endforeach
            </div>
        </div>

        <div class="lg:w-1/4 bg-blue-100 rounded-lg p-4">
            @include('partials._friends-list')
        </div>
    </div>
</x-layout.layout>
