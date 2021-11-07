<div x-data="{ isOpen: false }" class="relative inline-block">
    <!-- Dropdown toggle button -->
    <button @click="isOpen = !isOpen"
            class="relative z-10 flex items-center p-2 rounded text-sm text-gray-600 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
        <span class="mx-1">
            {{ auth()->user()->name }}
        </span>
        <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <path
                d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                fill="currentColor"></path>
        </svg>
    </button>

    <!-- Dropdown menu -->
    <div x-show="isOpen" @click.away="isOpen = false"
         class="absolute right-0 z-20 w-56 py-2 mt-2 overflow-hidden bg-white rounded shadow-xl dark:bg-gray-800">

        <x-layout.hr/>

        <a href="{{ route('profile', auth()->user()) }}"
           class="flex items-center p-3 text-xl text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">

            <i class="fas fa-user"></i>

            <span class="mx-1 pl-2">
                Profile
            </span>
        </a>

        <a href="{{ route('explore.index') }}"
           class="flex items-center p-3 text-xl text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">

            <i class="fas fa-hashtag"></i>

            <span class="mx-1 pl-2">
                Explore
            </span>
        </a>

        <a href="{{ route('bookmark.index', current_user()->username) }}"
           class="flex items-center p-3 text-xl text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">

            <i class="far fa-bookmark"></i>

            <span class="mx-1 pl-2">
                Boolmarks
            </span>
        </a>

        <a href="#"
           class="flex items-center p-3 text-xl text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">

            <i class="far fa-envelope"></i>

            <span class="mx-1 pl-2">
                Messages
            </span>
        </a>

        <a href="#" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();"
           class="flex items-center p-3 text-xl text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
            <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19 21H10C8.89543 21 8 20.1046 8 19V15H10V19H19V5H10V9H8V5C8 3.89543 8.89543 3 10 3H19C20.1046 3 21 3.89543 21 5V19C21 20.1046 20.1046 21 19 21ZM12 16V13H3V11H12V8L17 12L12 16Z"
                    fill="currentColor"></path>
            </svg>
            <span class="mx-1">
                Sign Out
            </span>
        </a>
        <form action="{{ route('logout') }}" method="POST" class="hidden" id="logout-form">
            @csrf
        </form>
    </div>
</div>
