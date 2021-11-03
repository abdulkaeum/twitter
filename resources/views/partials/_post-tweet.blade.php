<div class="border border-blue-400 rounded-lg py-8 px-4 mb-8">
    <form action="{{ route('tweet.store') }}" method="POST">
        @csrf

        <label for="body"></label>
        <textarea
            name="body"
            id="body"
            placeholder="What's on you mind..."
            class="w-full p-3 outline-none"
            required
        ></textarea>

        <hr class="py-4"/>

        <footer class="flex justify-between">
            <img
                class="rounded-full mr-3"
                src="{{ auth()->user()->avatar }}"
                alt=""
                width="40"
                height="40"
            >

            <x-forms.submit>Tweet-it</x-forms.submit>
        </footer>
    </form>
    <x-forms.error name="body" class="mt-3"/>
</div>
