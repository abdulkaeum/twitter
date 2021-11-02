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
    <div id="app">
        <section class="px-8 py-4 mb-6">
            <header class="container mx-auto">
                <img src="/images/twitter-logos.jpeg" alt="Twitter">
            </header>
        </section>

        <section class="px-8">
            <main class="container mx-auto">
                {{ $slot }}
            </main>
        </section>
    </div>
</body>
