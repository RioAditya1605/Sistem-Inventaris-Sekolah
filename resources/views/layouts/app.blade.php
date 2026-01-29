<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <title>@yield('tittle')</title>
</head>
    <body class="flex min-h-screen bg-[#8FABD4]">
        @include('layouts.navigation')
    </body>

    <!-- Main Content -->
    <main id="main-content" class="flex-1 flex flex-col ml-64 transition-all duration-300">
        <!-- Header -->
    <header id="header-bar"class="bg-[#4A70A9] fixed top-0 right-0 z-50 w-[calc(100%-16rem)] transition-all duration-300 flex justify-end items-center px-6 py-3 shadow-sm">

            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-white rounded-full"></div>
                <span class="text-sm font-medium text-white hover:text-black">{{ auth()->user()->role }}</span>
            </div>
    </header>

        @yield('content')

        <script src="https://unpkg.com/lucide@latest"></script>
        <script>
            lucide.createIcons();
        </script>

    </main>
</html>
