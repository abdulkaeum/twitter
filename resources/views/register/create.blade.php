<x-layout.layout>

    <div class="bg-cover h-screen"
         style="background-image: url({{ asset('images/auth-back.jpg') }}">
        <div class="content px-8 py-2">
            <nav class="flex items-center justify-between mt-10">
                <img
                    src="{{ asset('images/twitter-logos.jpeg') }}"
                    alt="Logo"
                    class="object-scale-down rounded"
                    style="max-width: 30%; width: 180px"
                >
                <div class="auth flex items-cente   r">
                    <a href="{{ route('home') }}"
                       class="bg-transparent text-gray-200  p-2 rounded border border-gray-300 mr-4 hover:bg-gray-100 hover:text-gray-700">
                        Home
                    </a>

                    <a href="{{ route('login.create') }}"
                       class="bg-transparent text-gray-200  p-2 rounded border border-gray-300 mr-4 hover:bg-gray-100 hover:text-gray-700">
                        Sign in
                    </a>
                </div>
            </nav>
            <div class="mx-8">
                <div class="md:flex items-center justify-between">
                    <div class="w-full md:w-1/2 mr-auto">
                        <h2 class="text-2xl font-semibold text-white tracking-wide">
                            "Our Lives Begin to End the Day We Become Silent"
                        </h2>
                        <p class="text-white">
                            Dr. Martin Luther King, Jr.
                        </p>
                    </div>
                    <div class="w-full md:max-w-md mt-6">
                        <div class="card bg-white shadow-md rounded-lg px-4 py-4 mb-6 ">
                            <form action="{{ route('register.store') }}" method="POST">
                                @csrf
                                <div class="flex items-center justify-center">
                                    <h2 class="text-2xl font-bold tracking-wide">
                                        Sign up
                                    </h2>
                                </div>
                                <h2 class="text-xl text-center font-semibold text-gray-800 mb-2">
                                    It's free!
                                </h2>

                                <x-forms.input name="name" required/>

                                <x-forms.input name="username" required/>

                                <x-forms.input name="email" type="email" required/>

                                <x-forms.input name="password" type="password" required/>

                                <x-forms.submit>
                                    Sign Up
                                </x-forms.submit>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout.layout>
