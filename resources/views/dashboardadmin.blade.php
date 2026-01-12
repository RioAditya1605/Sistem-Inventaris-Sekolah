{{-- @extends('layouts.app')

@section('tittle', "Dashboard")

@section('content')

    <!-- Dashboard Content -->
    <section class="space-y-6 ml-64 mt-16 p-6">
        <!-- Top Header Section -->
        <div class="flex items-center justify-normal bg-gray-200 p-3 rounded-lg shadow">
            <!-- Kiri: Judul Dashboard -->
            <h1 class="text-3xl font-semibold">Dashboard</h1>

            <!-- Kanan: Dua kotak sejajar -->
            <div class="flex items-center space-x-40">
                <!-- Data Barang Masuk -->
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 bg-gray-600 rounded mb-2"></div>
                    <p class="text-lg font-medium">Data Barang Masuk</p>
                </div>

                <!-- Data Barang Keluar -->
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 bg-gray-600 rounded mb-2"></div>
                    <p class="text-lg font-medium">Data Barang Keluar</p>
                </div>
            </div>
        </div>


        <!-- Info Cards -->
        <div class="grid grid-cols-4 gap-4">
            <div class="bg-gray-300 p-4 rounded-lg shadow hover:bg-[#4A70A9]">
                <div class="w-12 h-12 bg-gray-500 mb-2 rounded"></div>
                <p class="text-sm font-medium">Total Barang</p>
            </div>
            <div class="bg-gray-300 p-4 rounded-lg shadow hover:bg-[#4A70A9]">
                <div class="w-12 h-12 bg-gray-500 mb-2 rounded"></div>
                <p class="text-sm font-medium">Kondisi Baik</p>
            </div>
            <div class="bg-gray-300 p-4 rounded-lg shadow hover:bg-[#4A70A9]">
                <div class="w-12 h-12 bg-gray-500 mb-2 rounded"></div>
                <p class="text-sm font-medium">Kondisi Rusak Ringan</p>
            </div>
            <div class="bg-gray-300 p-4 rounded-lg shadow hover:bg-[#4A70A9]">
                <div class="w-12 h-12 bg-gray-500 mb-2 rounded"></div>
                <p class="text-sm font-medium">Kondisi Rusak Berat</p>
            </div>
        </div>
    </section>
@endsection --}}

@extends('layouts.app')

@section('tittle', "Dashboard")

@section('content')

<!-- Dashboard Content -->
<section class="space-y-6 mt-16 p-6">

<!-- Top Header Section -->
<div class="flex items-center justify-between bg-gray-200 p-4 rounded-lg shadow">

    <!-- Kiri: Judul Dashboard -->
    <h1 class="text-3xl font-semibold">
        Dashboard
    </h1>

    <!-- Kanan: Data Ringkas -->
    <div class="flex items-center gap-16 mr-20">

        <!-- Data Barang Masuk -->
        <div class="flex items-center gap-4">
            <div class="w-16 h-16 bg-gray-600 rounded
                        text-white flex flex-col items-center justify-center">
                <span class="text-lg font-bold">125</span>
                <i data-lucide="arrow-down-circle" class="w-4 h-4 opacity-80"></i>
            </div>
            <p class="text-base font-medium whitespace-nowrap">
                Data Barang Masuk
            </p>
        </div>

        <!-- Data Barang Keluar -->
        <div class="flex items-center gap-4">
            <div class="w-16 h-16 bg-gray-600 rounded
                        text-white flex flex-col items-center justify-center">
                <span class="text-lg font-bold">87</span>
                <i data-lucide="arrow-up-circle" class="w-4 h-4 opacity-80"></i>
            </div>
            <p class="text-base font-medium whitespace-nowrap">
                Data Barang Keluar
            </p>
        </div>

    </div>
</div>



    <!-- Info Cards -->
<!-- Info Cards -->
<div class="grid grid-cols-4 gap-4">

    <!-- Card 1: Total Barang -->
    <div class="relative overflow-hidden group p-4 rounded-lg shadow bg-gray-300 flex items-center">
        <div class="absolute inset-0 bg-[#4A70A9] translate-x-full group-hover:translate-x-0 transition-transform duration-500"></div>

        <!-- Icon di kiri -->
        <div class="flex-shrink-0 relative z-10">
            <i data-lucide="package" class="w-12 h-12 text-gray-700 group-hover:text-white transition"></i>
        </div>

        <!-- Angka dan teks di kanan -->
        <div class="ml-4 flex flex-col items-start relative z-10">
            <span class="text-2xl text-gray-800 group-hover:text-white transition font-bold">100</span>
            <span class="text-sm text-gray-800 group-hover:text-white transition">Total Barang</span>
        </div>
    </div>

    <!-- Card 2: Kondisi Baik -->
    <div class="relative overflow-hidden group p-4 rounded-lg shadow bg-gray-300 flex items-center">
        <div class="absolute inset-0 bg-[#4A70A9] translate-x-full group-hover:translate-x-0 transition-transform duration-500"></div>
        <div class="flex-shrink-0 relative z-10">
            <i data-lucide="check-circle" class="w-12 h-12 text-gray-700 group-hover:text-green-400 transition"></i>
        </div>
        <div class="ml-4 flex flex-col items-start relative z-10">
            <span class="text-2xl text-gray-800 group-hover:text-white transition font-bold">75</span>
            <span class="text-sm text-gray-800 group-hover:text-white transition">Kondisi Baik</span>
        </div>
    </div>

    <!-- Card 3: Kondisi Rusak Ringan -->
    <div class="relative overflow-hidden group p-4 rounded-lg shadow bg-gray-300 flex items-center">
        <div class="absolute inset-0 bg-[#4A70A9] translate-x-full group-hover:translate-x-0 transition-transform duration-500"></div>
        <div class="flex-shrink-0 relative z-10">
            <i data-lucide="alert-circle" class="w-12 h-12 text-gray-700 group-hover:text-yellow-500 transition"></i>
        </div>
        <div class="ml-4 flex flex-col items-start relative z-10">
            <span class="text-2xl text-gray-800 group-hover:text-white transition font-bold">15</span>
            <span class="text-sm text-gray-800 group-hover:text-white transition">Kondisi Rusak Ringan</span>
        </div>
    </div>

    <!-- Card 4: Kondisi Rusak Berat -->
    <div class="relative overflow-hidden group p-4 rounded-lg shadow bg-gray-300 flex items-center">
        <div class="absolute inset-0 bg-[#4A70A9] translate-x-full group-hover:translate-x-0 transition-transform duration-500"></div>
        <div class="flex-shrink-0 relative z-10">
            <i data-lucide="shield-alert" class="w-12 h-12 text-gray-700 group-hover:text-red-500 transition"></i>
        </div>
        <div class="ml-4 flex flex-col items-start relative z-10">
            <span class="text-2xl text-gray-800 group-hover:text-white transition font-bold">10</span>
            <span class="text-sm text-gray-800 group-hover:text-white transition">Kondisi Rusak Berat</span>
        </div>
    </div>

</div>



</section>
@endsection
