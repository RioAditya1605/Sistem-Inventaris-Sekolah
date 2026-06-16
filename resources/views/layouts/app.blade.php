{{-- <!DOCTYPE html>
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
                 <!-- <div class="w-8 h-8 bg-white rounded-full"></div> -->
                <span class="text-sm font-medium text-white hover:text-black">
                    {{ auth()->user()->name }} - {{ ucfirst(auth()->user()->role) }}
                </span>
            </div>
    </header>

        @yield('content')

        <script src="https://unpkg.com/lucide@latest"></script>
        <script>
            lucide.createIcons();
        </script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if(session('success'))
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
            timer: 2000,
            showConfirmButton: false
        });
        </script>
        @endif

        @if(session('error'))
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ session('error') }}',
            confirmButtonColor: '#d33'
        });
        </script>
        @endif

        @if($errors->any())
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Input tidak valid',
            html: `{!! implode('<br>', $errors->all()) !!}`
        });
        </script>
        @endif

    </main>
</html> --}}

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

    {{-- Overlay untuk mobile (muncul saat sidebar terbuka) --}}
    <div id="sidebar-overlay"
         class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden"
         onclick="closeSidebar()">
    </div>

    @include('layouts.navigation')

    <!-- Main Content -->
    <main id="main-content"
          class="flex-1 flex flex-col
                 lg:ml-64
                 ml-0
                 transition-all duration-300 min-w-0">

        <!-- Header -->
        <header id="header-bar"
                class="bg-[#4A70A9] fixed top-0 right-0 z-40
                       lg:w-[calc(100%-16rem)]
                       w-full
                       transition-all duration-300
                       flex justify-between items-center px-4 py-3 shadow-sm">

            {{-- Tombol hamburger khusus mobile --}}
            <button id="mobileMenuBtn"
                    class="lg:hidden text-white p-1 rounded"
                    onclick="openSidebar()">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>

            <div class="flex items-center space-x-3 ml-auto">
                <span class="text-sm font-medium text-white hover:text-black">
                    {{ auth()->user()->name }} - {{ ucfirst(auth()->user()->role) }}
                </span>
            </div>
        </header>

        {{-- Spacer agar konten tidak tertutup header --}}
        <div class="h-14"></div>

        @yield('content')

        <script src="https://unpkg.com/lucide@latest"></script>
        <script>
            lucide.createIcons();
        </script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if(session('success'))
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
            timer: 2000,
            showConfirmButton: false
        });
        </script>
        @endif

        @if(session('error'))
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ session('error') }}',
            confirmButtonColor: '#d33'
        });
        </script>
        @endif

        @if($errors->any())
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Input tidak valid',
            html: `{!! implode('<br>', $errors->all()) !!}`
        });
        </script>
        @endif

    </main>
</body>
</html>

