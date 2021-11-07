<ul>
    <li>
        <a class="font-bold text-lg mb-4 block" href="/">
            <i class="fas fa-home mr-2"></i> Home
        </a>
    </li>
    <li>
        <a class="font-bold text-lg mb-4 block" href="{{ route('profile', auth()->user()) }}">
            <i class="fas fa-user mr-2"></i> Profile
        </a>
    </li>
    <li>
        <a class="font-bold text-lg mb-4 block" href="{{ route('explore.index') }}">
            <i class="fas fa-hashtag mr-2"></i> Explore
        </a>
    </li>
    <li>
        <a class="font-bold text-lg mb-4 block" href="{{ route('bookmark.index', current_user()->username) }}">
            <i class="far fa-bookmark mr-2"></i> Bookmarks
        </a>
    </li>
    <li>
        <a class="font-bold text-lg mb-4 block" href="/">
            <i class="far fa-envelope mr-1"></i> Messages
        </a>
    </li>
</ul>
