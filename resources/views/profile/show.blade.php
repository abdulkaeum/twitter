<x-layout.layout>

    <header class="mb-6 relative">
        <img src="/images/banner.jpg" alt="" class="mb-3 rounded-xl">

        <div class="flex justify-between items-center mb-4">
            <div class="">
                <h2 class="font-semibold text-2xl mb-2">{{ $user->name }}</h2>
                <p class="text-sm">{{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">
                <x-layout.link href="/" color="white">Edit Profile</x-layout.link>

                @if($user->id !== auth()->user()->id)
                    <form action="{{ route('follow', $user) }}" method="POST">
                        @csrf
                        <x-forms.submit>
                            {{ auth()->user()->following($user) ? 'Unfollow' : 'Follow' }}
                        </x-forms.submit>
                    </form>
                @else
                    <x-layout.link href="/" color="blue">Followers</x-layout.link>
                @endif
            </div>
        </div>

        <p class="text-sm">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae deleniti fuga itaque nemo odio odit.
            Consequatur cum distinctio dolorem enim laborum nulla perferendis quaerat repellat rerum, totam vel velit
            voluptas.
        </p>

        <img
            class="rounded-full mr-3 absolute"
            src="{{ $user->avatar }}"
            alt=""
            style="width: 125px; left: calc(50% - 75px); top: 138px"
        >
    </header>

    @include('partials._timeline', [
        'tweets' => $user->tweets
    ])

</x-layout.layout>