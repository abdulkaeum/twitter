<x-layout.layout>
    <div>
        @foreach($users as $user)
            <a href="{{ route('profile', $user->username) }}" class="flex items-center mb-4">
                <img
                    src="{{ $user->avatar }}"
                    alt="{{ $user->name }}"
                    width="60"
                    class="mr-4 rounded"
                >
                <div>
                    <h4 class="font-bold">{{ '@'. $user->username }}</h4>
                </div>
            </a>
        @endforeach

        {{ $users->links() }}
    </div>
</x-layout.layout>
