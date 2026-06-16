{{-- @extends('layouts.app')

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
            <div class="w-16 h-16 bg-green-600 rounded
                        text-white flex flex-col items-center justify-center">
                <span class="text-lg font-bold">{{ $barangMasuk }}</span>
                <i data-lucide="arrow-down-circle" class="w-4 h-4 opacity-80"></i>
            </div>
            <p class="text-base font-medium whitespace-nowrap">
                Data Barang Masuk
            </p>
        </div>

        <!-- Data Barang Keluar -->
        <div class="flex items-center gap-4">
            <div class="w-16 h-16 bg-red-600 rounded
                        text-white flex flex-col items-center justify-center">
                <span class="text-lg font-bold">{{ $barangKeluar }}</span>
                <i data-lucide="arrow-up-circle" class="w-4 h-4 opacity-80"></i>
            </div>
            <p class="text-base font-medium whitespace-nowrap">
                Data Barang Keluar
            </p>
        </div>

    </div>
</div>



<!-- Info Cards -->
<div class="grid grid-cols-4 gap-4">

    <!-- Card 1: Total Barang -->
    <div class="relative overflow-hidden group p-4 rounded-lg shadow bg-gray-300 
                flex items-center transform transition duration-300 
                hover:scale-105 hover:shadow-xl
                hover:bg-[#4A70A9] group">
        <!-- <div class="absolute inset-0 bg-[#4A70A9] translate-x-full group-hover:translate-x-0 transition-transform duration-500"></div> -->

        <div class="flex-shrink-0 relative z-10">
            <i data-lucide="package" class="w-12 h-12 text-gray-700 group-hover:text-white transition"></i>
        </div>

        <div class="ml-4 flex flex-col items-start relative z-10">
            <span class="text-2xl text-gray-800 group-hover:text-white transition font-bold">{{ $totalBarang }}</span>
            <span class="text-sm text-gray-800 group-hover:text-white transition">Total Barang</span>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="relative overflow-hidden group p-4 rounded-lg shadow bg-gray-300 
                flex items-center transform transition duration-300 
                hover:scale-105 hover:shadow-xl
                hover:bg-[#4A70A9] group">
        <!-- <div class="absolute inset-0 bg-[#4A70A9] translate-x-full group-hover:translate-x-0 transition-transform duration-500"></div> -->

        <div class="flex-shrink-0 relative z-10">
            <i data-lucide="check-circle" class="w-12 h-12 text-gray-700 group-hover:text-green-400 transition"></i>
        </div>

        <div class="ml-4 flex flex-col items-start relative z-10">
            <span class="text-2xl text-gray-800 group-hover:text-white transition font-bold">{{ $kondisiBaik }}</span>
            <span class="text-sm text-gray-800 group-hover:text-white transition">Kondisi Baik</span>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="relative overflow-hidden group p-4 rounded-lg shadow bg-gray-300 
                flex items-center transform transition duration-300 
                hover:scale-105 hover:shadow-xl
                hover:bg-[#4A70A9] group">
        <!-- <div class="absolute inset-0 bg-[#4A70A9] translate-x-full group-hover:translate-x-0 transition-transform duration-500"></div> -->

        <div class="flex-shrink-0 relative z-10">
            <i data-lucide="alert-circle" class="w-12 h-12 text-gray-700 group-hover:text-yellow-500 transition"></i>
        </div>

        <div class="ml-4 flex flex-col items-start relative z-10">
            <span class="text-2xl text-gray-800 group-hover:text-white transition font-bold">{{ $rusakRingan }}</span>
            <span class="text-sm text-gray-800 group-hover:text-white transition">Kondisi Rusak Ringan</span>
        </div>
    </div>

    <!-- Card 4 -->
    <div class="relative overflow-hidden group p-4 rounded-lg shadow bg-gray-300 
                flex items-center transform transition duration-300 
                hover:scale-105 hover:shadow-xl
                hover:bg-[#4A70A9] group">
        <!-- <div class="absolute inset-0 bg-[#4A70A9] translate-x-full group-hover:translate-x-0 transition-transform duration-500"></div> -->

        <div class="flex-shrink-0 relative z-10">
            <i data-lucide="shield-alert" class="w-12 h-12 text-gray-700 group-hover:text-red-500 transition"></i>
        </div>

        <div class="ml-4 flex flex-col items-start relative z-10">
            <span class="text-2xl text-gray-800 group-hover:text-white transition font-bold">{{ $rusakBerat }}</span>
            <span class="text-sm text-gray-800 group-hover:text-white transition">Kondisi Rusak Berat</span>
        </div>
    </div>

</div>




</section>
@endsection --}}

@extends('layouts.app')

@section('tittle', "Dashboard")

@section('content')

<section class="space-y-6 p-4 md:p-6">

    {{-- ===== HEADER CARD ===== --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between
                bg-gray-200 p-4 rounded-lg shadow gap-4">

        <h1 class="text-2xl md:text-3xl font-semibold">Dashboard</h1>

        <div class="flex items-center gap-4 sm:gap-10 flex-wrap">

            <!-- Data Barang Masuk -->
            <div class="flex items-center gap-3">
                <div class="w-16 h-16 bg-green-600 rounded
                            text-white flex flex-col items-center justify-center
                            flex-shrink-0">
                    <span class="text-base font-bold">{{ $barangMasuk }}</span>
                    <i data-lucide="arrow-down-circle" class="w-4 h-4 opacity-80"></i>
                </div>
                <p class="text-sm font-medium">Data Barang Masuk</p>
            </div>

            <!-- Data Barang Keluar -->
            <div class="flex items-center gap-3">
                <div class="w-16 h-16 bg-red-600 rounded
                            text-white flex flex-col items-center justify-center
                            flex-shrink-0">
                    <span class="text-base font-bold">{{ $barangKeluar }}</span>
                    <i data-lucide="arrow-up-circle" class="w-4 h-4 opacity-80"></i>
                </div>
                <p class="text-sm font-medium">Data Barang Keluar</p>
            </div>

        </div>
    </div>

    {{-- ===== STAT CARDS ===== --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

        <!-- Total Barang -->
        <div class="relative overflow-hidden group p-4 rounded-lg shadow bg-gray-300
                    flex items-center transform transition duration-300
                    hover:scale-105 hover:shadow-xl hover:bg-[#4A70A9]">
            <div class="flex-shrink-0 relative z-10">
                <i data-lucide="package"
                   class="w-12 h-12 text-gray-700 group-hover:text-white transition">
                </i>
            </div>

            <div class="ml-4 flex flex-col items-start relative z-10">
                <span class="text-2xl text-gray-800 group-hover:text-white transition font-bold">
                    {{ $totalBarang }}
                </span>

                <span class="text-sm text-gray-800 group-hover:text-white transition">
                    Total Barang
                </span>
            </div>
        </div>

        <!-- Kondisi Baik -->
        <div class="relative overflow-hidden group p-4 rounded-lg shadow bg-gray-300
                    flex items-center transform transition duration-300
                    hover:scale-105 hover:shadow-xl hover:bg-[#4A70A9]">
            <div class="flex-shrink-0 relative z-10">
                <i data-lucide="check-circle"
                   class="w-12 h-12 text-gray-700 group-hover:text-green-400 transition">
                </i>
            </div>

            <div class="ml-4 flex flex-col items-start relative z-10">
                <span class="text-2xl text-gray-800 group-hover:text-white transition font-bold">
                    {{ $kondisiBaik }}
                </span>

                <span class="text-sm text-gray-800 group-hover:text-white transition">
                    Kondisi Baik
                </span>
            </div>
        </div>

        <!-- Rusak Ringan -->
        <div class="relative overflow-hidden group p-4 rounded-lg shadow bg-gray-300
                    flex items-center transform transition duration-300
                    hover:scale-105 hover:shadow-xl hover:bg-[#4A70A9]">
            <div class="flex-shrink-0 relative z-10">
                <i data-lucide="alert-circle"
                   class="w-12 h-12 text-gray-700 group-hover:text-yellow-500 transition">
                </i>
            </div>

            <div class="ml-4 flex flex-col items-start relative z-10">
                <span class="text-2xl text-gray-800 group-hover:text-white transition font-bold">
                    {{ $rusakRingan }}
                </span>

                <span class="text-sm text-gray-800 group-hover:text-white transition">
                    Kondisi Rusak Ringan
                </span>
            </div>
        </div>

        <!-- Rusak Berat -->
        <div class="relative overflow-hidden group p-4 rounded-lg shadow bg-gray-300
                    flex items-center transform transition duration-300
                    hover:scale-105 hover:shadow-xl hover:bg-[#4A70A9]">
            <div class="flex-shrink-0 relative z-10">
                <i data-lucide="shield-alert"
                   class="w-12 h-12 text-gray-700 group-hover:text-red-500 transition">
                </i>
            </div>

            <div class="ml-4 flex flex-col items-start relative z-10">
                <span class="text-2xl text-gray-800 group-hover:text-white transition font-bold">
                    {{ $rusakBerat }}
                </span>

                <span class="text-sm text-gray-800 group-hover:text-white transition">
                    Kondisi Rusak Berat
                </span>
            </div>
        </div>

    </div>

</section>
@endsection