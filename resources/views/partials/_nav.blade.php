<nav class="sticky inset-0 bg-white mb-5">
    <div class="container px-6 py-3 mx-auto">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="flex">
                        <a href="/">
                            <img
                                src="{{ asset('images/twitter-logos.jpeg') }}"
                                alt="Logo"
                                class="object-scale-down rounded"

                            >
                        </a>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="flex md:hidden">
                    <button type="button"
                            class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400"
                            aria-label="toggle menu">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path fill-rule="evenodd"
                                  d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div class="items-center md:flex">
                @auth
                    <div class="flex items-center -mx-1 md:mx-0">
                        <a class="block w-1/2 px-3 py-2 mx-1 text-sm font-medium leading-5 text-center text-gray transition-colors duration-200 transform bg-blue-100 rounded hover:bg-blue-200 md:mx-2 md:w-auto"
                           href="{{ route('home') }}">Home</a>
                    </div>
                    @include('partials._user_menu')
                @else
                    <div class="flex items-center py-2 -mx-1 md:mx-0">
                        <a class="block w-1/2 px-3 py-2 mx-1 text-sm font-medium leading-5 text-center text-gray transition-colors duration-200 transform bg-blue-100 rounded hover:bg-blue-200 md:mx-2 md:w-auto"
                           href="{{ route('home') }}">Home</a>
                        <a class="block w-1/2 px-3 py-2 mx-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-200 transform bg-gray-500 rounded hover:bg-blue-600 md:mx-2 md:w-auto"
                           href="{{ route('login.create') }}">Login</a>
                        <a class="block w-1/2 px-3 py-2 mx-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-200 transform bg-blue-500 rounded hover:bg-blue-600 md:mx-0 md:w-auto"
                           href="{{ route('register.create') }}">Sign Up</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>
