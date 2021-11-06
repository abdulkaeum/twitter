<div class="border border-blue-400 rounded-lg py-8 px-4 mb-8">
    <form action="{{ route('tweet.store') }}" method="POST">
        @csrf

        <label for="body"></label>
        <textarea
            name="body"
            id="body"
            placeholder="What's on your mind..."
            class="w-full p-3 outline-none"
            required
            autofocus
        ></textarea>

        <hr class="py-4"/>

        <footer class="flex justify-between">
            <img
                class="rounded-full mr-3"
                src="{{ auth()->user()->avatar }}"
                alt=""
                width="50"
                height="50"


            >

            <x-forms.submit class="rounded-xl">Tweet-it</x-forms.submit>
        </footer>
    </form>
    <x-forms.error name="body" class="mt-3"/>
</div>
