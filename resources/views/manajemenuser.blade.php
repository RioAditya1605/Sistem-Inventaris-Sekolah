{{-- @extends('layouts.app')

@section('tittle', "Manajemen User")

@section('content')
    <!-- Dashboard Content -->
    <section class="space-y-6 ml-64 mt-16 p-6">
        <!-- Top Header Section -->
        <div class="flex items-center justify-normal bg-gray-200 p-3 rounded-lg shadow">
            <!-- Kiri: Judul Dashboard -->
            <h1 class="text-3xl font-semibold">Daftar Pengguna</h1>

            <!-- Kanan: Dua kotak sejajar -->
            <div class="flex items-center space-x-40">
                <!-- Data Barang Masuk -->
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 bg-gray-600 rounded mb-2"></div>
                    <p class="text-lg font-medium">Total Administrator</p>
                </div>

                <!-- Data Barang Keluar -->
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 bg-gray-600 rounded mb-2"></div>
                    <p class="text-lg font-medium">Total Staff</p>
                </div>
            </div>
        </div>

        <!-- Card Background -->
        <div class="bg-[#E5E5E5] p-6 rounded-xl shadow-md mt-6">

            <!-- Table -->
            <div class="overflow-x-auto mt-4 rounded-lg">
                <table class="w-full text-sm text-left bg-gray-300 rounded-lg shadow">
                    <thead class="bg-gray-500 text-white">
                        <tr>
                            <th class="py-2 px-3">No</th>
                            <th class="py-2 px-3">Nama Lengkap</th>
                            <th class="py-2 px-3">Username</th>
                            <th class="py-2 px-3">Peran</th>
                            <th class="py-2 px-3">Tanggal Ditambahkan</th>
                            <th class="py-2 px-3 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white text-gray-900">
                        <tr class="border-b border-gray-400">
                            <td class="py-2 px-3">1</td>
                            <td class="py-2 px-3">Abi</td>
                            <td class="py-2 px-3">Abi123</td>
                            <td class="py-2 px-3">Super Admin</td>
                            <td class="py-2 px-3">01-01-2025</td>
                            <td class="py-2 px-3 flex justify-center gap-3">
                                <button class="text-[#4A70A9] hover:text-[#8FABD4]"><i class="fas fa-pen"></i></button>
                                <button class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>

                        <tr class="border-b border-gray-400">
                            <td class="py-2 px-3">2</td>
                            <td class="py-2 px-3">Umi</td>
                            <td class="py-2 px-3">Umi123</td>
                            <td class="py-2 px-3">Admin1</td>
                            <td class="py-2 px-3">01-01-2025</td>
                            <td class="py-2 px-3 flex justify-center gap-3">
                                <button class="text-[#4A70A9] hover:text-[#8FABD4]"><i class="fas fa-pen"></i></button>
                                <button class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>

                        <tr>
                            <td class="py-2 px-3">3</td>
                            <td class="py-2 px-3">Bika</td>
                            <td class="py-2 px-3">Bika123</td>
                            <td class="py-2 px-3">Admin2</td>
                            <td class="py-2 px-3">01-01-2025</td>
                            <td class="py-2 px-3 flex justify-center gap-3">
                                <button class="text-[#4A70A9] hover:text-[#8FABD4]"><i class="fas fa-pen"></i></button>
                                <button class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Tombol Tambah User -->
            <div class="flex justify-end mt-4">
                <button class="bg-white text-[#4A70A9] font-medium px-4 py-2 rounded-full shadow hover:bg-[#8FABD4] hover:text-white flex items-center gap-2 transition">
                    <i class="fas fa-plus"></i> User
                </button>
            </div>
        </div>


@endsection --}}

@extends('layouts.app')

@section('tittle', "Manajemen User")

@section('content')
    <!-- Dashboard Content -->
    <section class="space-y-6 mt-16 p-6">

        <!-- Top Header Section -->
        <div class="flex items-center justify-between bg-gray-200 p-3 rounded-lg shadow">

            <!-- Judul -->
            <h1 class="text-3xl font-semibold flex items-center gap-2">
                <i data-lucide="users" class="w-7 h-7"></i>
                Daftar Pengguna
            </h1>

            <!-- Statistik Pengguna -->
            <div class="flex items-center gap-16 mr-20">

                <!-- Administrator -->
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-blue-600 rounded
                                flex flex-col items-center justify-center text-white">
                        <span class="text-lg font-bold">3</span>
                        <i data-lucide="user-cog" class="w-4 h-4 opacity-80"></i>
                    </div>
                    <p class="text-base font-medium whitespace-nowrap">
                        Total Administrator
                    </p>
                </div>

                <!-- Staff -->
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-green-600 rounded
                                flex flex-col items-center justify-center text-white">
                        <span class="text-lg font-bold">12</span>
                        <i data-lucide="user" class="w-4 h-4 opacity-80"></i>
                    </div>
                    <p class="text-base font-medium whitespace-nowrap">
                        Total Staff
                    </p>
                </div>

            </div>
        </div>

        <!-- Card Background -->
        <div class="bg-[#E5E5E5] p-6 rounded-xl shadow-md mt-6">

            <!-- Table -->
            <div class="overflow-x-auto mt-4 rounded-lg">
                <table class="w-full text-sm text-left bg-gray-300 rounded-lg shadow">

                    <!-- HEADER TABEL DENGAN ICON -->
                    <thead class="bg-gray-500 text-white">
                        <tr>

                            <th class="py-2 px-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="hash" class="w-4 h-4"></i> No
                                </div>
                            </th>

                            <th class="py-2 px-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="user" class="w-4 h-4"></i> Nama Lengkap
                                </div>
                            </th>

                            <th class="py-2 px-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="badge" class="w-4 h-4"></i> Username
                                </div>
                            </th>

                            <th class="py-2 px-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="shield" class="w-4 h-4"></i> Peran
                                </div>
                            </th>

                            <th class="py-2 px-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="calendar" class="w-4 h-4"></i> Tanggal Ditambahkan
                                </div>
                            </th>

                            <th class="py-2 px-3 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <i data-lucide="settings" class="w-4 h-4"></i> Aksi
                                </div>
                            </th>

                        </tr>
                    </thead>

                    <!-- BODY -->
                    <tbody class="bg-white text-gray-900">

                        <tr class="border-b border-gray-400">
                            <td class="py-2 px-3">1</td>
                            <td class="py-2 px-3">Abi</td>
                            <td class="py-2 px-3">Abi123</td>
                            <td class="py-2 px-3">Super Admin</td>
                            <td class="py-2 px-3">01-01-2025</td>

                            <td class="py-2 px-3 flex justify-center gap-3">
                                <button class="text-blue-600 hover:text-blue-800">
                                    <i data-lucide="edit" class="w-5 h-5"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-800">
                                    <i data-lucide="trash-2" class="w-5 h-5"></i>
                                </button>
                            </td>
                        </tr>

                        <tr class="border-b border-gray-400">
                            <td class="py-2 px-3">2</td>
                            <td class="py-2 px-3">Umi</td>
                            <td class="py-2 px-3">Umi123</td>
                            <td class="py-2 px-3">Admin1</td>
                            <td class="py-2 px-3">01-01-2025</td>

                            <td class="py-2 px-3 flex justify-center gap-3">
                                <button class="text-blue-600 hover:text-blue-800">
                                    <i data-lucide="edit" class="w-5 h-5"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-800">
                                    <i data-lucide="trash-2" class="w-5 h-5"></i>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="py-2 px-3">3</td>
                            <td class="py-2 px-3">Bika</td>
                            <td class="py-2 px-3">Bika123</td>
                            <td class="py-2 px-3">Admin2</td>
                            <td class="py-2 px-3">01-01-2025</td>

                            <td class="py-2 px-3 flex justify-center gap-3">
                                <button class="text-blue-600 hover:text-blue-800">
                                    <i data-lucide="edit" class="w-5 h-5"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-800">
                                    <i data-lucide="trash-2" class="w-5 h-5"></i>
                                </button>
                            </td>
                        </tr>

                    </tbody>

                </table>
            </div>

            <!-- Tombol Tambah User -->
            <div class="flex justify-end mt-4">
                <button class="bg-white text-[#4A70A9] font-medium px-4 py-2 rounded-full shadow hover:bg-[#8FABD4] hover:text-white flex items-center gap-2 transition">
                    <i data-lucide="user-plus" class="w-5 h-5"></i>
                    Tambah User
                </button>
            </div>
        </div>

@endsection

