<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login - Inventaris Barang Sekolah')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-[#4A70A9] text-white py-4 shadow">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <h1 class="text-lg font-semibold">Inventaris Barang Sekolah</h1>
            <div class="flex items-center">
                <i class="fas fa-circle text-white"></i>
            </div>
        </div>
    </header>

    <!-- Konten Halaman -->
    <main class="flex justify-center items-center min-h-[80vh]">
        @yield('content')

        <script src="https://unpkg.com/lucide@latest"></script>
        <script>
            lucide.createIcons();
        </script>
    </main>
</body>
</html>
