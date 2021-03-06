<!doctype html>

<head>
    <title>Twitter</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        .scroll-hidden::-webkit-scrollbar {
            height: 0px;
            background: transparent; /* make scrollbar transparent */
        }
    </style>
</head>

<body>
    @include('partials._flash')

    <div id="app">
        @if(request()->routeIs('login.create') || request()->routeIs('register.create'))
            {{ $slot }}
        @else
            <section class="px-8 py-10">
                @include('partials._nav')

                <main class="container mx-auto">

                    <div class="lg:flex lg:justify-between">
                        <div class="lg:w-32">
                            @include('partials._sidebar-links')
                        </div>

                        <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
                            {{ $slot }}
                        </div>

                        <div class="lg:w-1/4 bg-blue-50 rounded-lg p-4">
                            @include('partials._friends-list')
                        </div>
                    </div>
                </main>
            </section>
        @endif
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
            integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
