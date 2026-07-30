@extends('layouts.app')

@section('tittle', "Laporan Barang Keluar")

@section('content')
<section class="p-4 md:p-6 space-y-6">

    <!-- HEADER -->
    <div class="flex items-center gap-3 bg-gray-200 p-4 rounded-lg shadow">

        <i data-lucide="file-text" class="w-6 h-6 md:w-7 md:h-7"></i>

        <h1 class="text-2xl md:text-3xl font-semibold">
            Laporan Barang Keluar
        </h1>
    </div>

    <!-- FILTER BOX -->
    <div class="bg-gray-200 rounded-lg shadow p-4 md:p-6 w-full">

        <form method="GET" action="/laporan/barangkeluar">

            <!-- TITLE -->
            <div class="flex items-center gap-2 mb-6">

                <i data-lucide="filter" class="w-5 h-5 md:w-6 md:h-6"></i>

                <label class="text-lg md:text-xl font-semibold">
                    Filter Barang Keluar
                </label>
            </div>

            <!-- INPUT -->
            {{-- HP = 1 kolom | Tablet & Desktop = tetap 3 kolom --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 md:gap-6 mb-6">

                <!-- Tanggal Keluar Dari -->
                <div>
                    <label class="text-sm font-medium flex items-center gap-1 mb-1">

                        <i data-lucide="calendar-plus" class="w-4 h-4"></i>
                        Tanggal Keluar Dari

                    </label>

                    <input 
                        type="date"
                        name="tanggalMasuk"
                        value="{{ request('tanggalMasuk') }}"
                        class="w-full border border-gray-300 rounded p-2 text-sm"
                    >
                </div>

                <!-- Tanggal Keluar Sampai -->
                <div>
                    <label class="text-sm font-medium flex items-center gap-1 mb-1">

                        <i data-lucide="calendar-minus" class="w-4 h-4"></i>
                        Tanggal Keluar Sampai

                    </label>

                    <input 
                        type="date"
                        name="tanggalKeluar"
                        value="{{ request('tanggalKeluar') }}"
                        class="w-full border border-gray-300 rounded p-2 text-sm"
                    >
                </div>

            </div>

            <!-- BUTTON -->
            <div class="flex flex-col sm:flex-row gap-3">

                <!-- TAMPILKAN -->
                <button type="submit"
                    class="w-full sm:flex-1 bg-white p-2 rounded-md shadow
                           font-medium hover:bg-gray-300
                           flex items-center justify-center gap-2">

                    <i data-lucide="eye" class="w-5 h-5"></i>
                    Tampilkan
                </button>

                <!-- RESET -->
                <a href="{{ url()->current() }}"
                    class="w-full sm:flex-1 bg-white p-2 border border-gray-400
                           rounded-md shadow font-medium hover:bg-gray-300
                           flex items-center justify-center gap-2">

                    <i data-lucide="rotate-ccw" class="w-5 h-5"></i>
                    Reset Filter
                </a>

            </div>

        </form>

        <!-- ALERT -->
        @if(session('error'))
            <div class="bg-red-500 text-white p-3 rounded-md shadow mt-4 text-sm md:text-base">
                {{ session('error') }}
            </div>
        @endif

    </div>
    
    <!-- CARD TABLE -->
    @if(!session('error'))
    <div class="bg-[#E5E5E5] p-4 md:p-6 rounded-xl shadow-md">

        <!-- INFO & BUTTON -->
        @if(request()->filled('tanggalMasuk') || request()->filled('tanggalKeluar'))

            <div class="flex flex-col lg:flex-row lg:items-start
                        lg:justify-between gap-4 mb-4">

                <!-- KIRI -->
                <div class="space-y-1">

                    <p class="text-sm text-gray-700">
                        <strong>Periode:</strong>
                        {{ request('tanggalMasuk') ?? '-' }} 
                        s/d 
                        {{ request('tanggalKeluar') ?? '-' }}
                    </p>

                    <p class="text-sm text-gray-700">
                        <strong>Total Barang Keluar:</strong> 
                        {{ $inventaris->sum('jumlah_keluar') }} unit
                    </p>

                </div>

                <!-- BUTTON -->
                <div class="flex flex-col sm:flex-row gap-3">

                    <a href="/laporan/barangkeluar/excel?tanggalMasuk={{ request('tanggalMasuk') }}&tanggalKeluar={{ request('tanggalKeluar') }}"
                        class="flex items-center justify-center gap-2
                               bg-green-600 text-white px-4 py-2 text-sm
                               rounded-md shadow hover:bg-green-700
                               transition font-medium">

                        Cetak Excel
                    </a>

                    <a href="/laporan/barangkeluar/pdf?tanggalMasuk={{ request('tanggalMasuk') }}&tanggalKeluar={{ request('tanggalKeluar') }}"
                        class="flex items-center justify-center gap-2
                               bg-red-600 text-white px-4 py-2 text-sm
                               rounded-md shadow hover:bg-red-700
                               transition font-medium">

                        Cetak PDF
                    </a>

                </div>

            </div>
        @endif

        <!-- TABLE -->
        @if(request()->filled('tanggalMasuk') && request()->filled('tanggalKeluar') && !session('error'))

        <div class="overflow-x-auto rounded-lg">

            <table class="min-w-full text-sm text-left bg-gray-300 rounded-lg shadow">

                <thead class="bg-gray-500 text-white whitespace-nowrap">
                    <tr>

                        <th class="py-3 px-3">No</th>

                        <th class="py-3 px-3">
                            <div class="flex items-center gap-1">
                                <i data-lucide="barcode" class="w-4 h-4"></i>
                                Kode Barang
                            </div>
                        </th>

                        <th class="py-3 px-3">
                            <div class="flex items-center gap-1">
                                <i data-lucide="box" class="w-4 h-4"></i>
                                Nama Barang
                            </div>
                        </th>

                        <th class="py-3 px-3">
                            <div class="flex items-center gap-1">
                                <i data-lucide="calendar" class="w-4 h-4"></i>
                                Tanggal Keluar
                            </div>
                        </th>

                        <th class="py-3 px-3">
                            <div class="flex items-center gap-1">
                                <i data-lucide="tag" class="w-4 h-4"></i>
                                Kondisi
                            </div>
                        </th>

                        <th class="py-3 px-3">
                            <div class="flex items-center gap-1">
                                <i data-lucide="hash" class="w-4 h-4"></i>
                                Jumlah
                            </div>
                        </th>

                        <th class="py-3 px-3">
                            <div class="flex items-center gap-1">
                                <i data-lucide="map-pin" class="w-4 h-4"></i>
                                Lokasi
                            </div>
                        </th>

                    </tr>
                </thead>

                <tbody>

                    @if($inventaris->isEmpty())
                        <tr>
                            <td colspan="8"
                                class="text-center py-6 text-gray-600">
                                Data tidak ditemukan
                            </td>
                        </tr>
                    @endif

                    @foreach ($inventaris as $item)

                        <tr class="border-b border-gray-400 whitespace-nowrap">

                            <td class="py-3 px-3">
                                {{ $loop->iteration }}
                            </td>

                            <td class="py-3 px-3">
                                {{ $item->inventaris->kode ?? '-' }}
                            </td>

                            <td class="py-3 px-3">
                                {{ $item->inventaris->nama ?? '-' }}
                            </td>

                            <td class="py-3 px-3">
                                {{ $item->tanggal_keluar }}
                            </td>

                            <td class="py-3 px-3">
                                {{ $item->inventaris->kondisi ?? '-' }}
                            </td>

                            <td class="py-3 px-3">
                                {{ $item->jumlah_keluar }}
                            </td>

                            <td class="py-3 px-3">
                                {{ $item->inventaris->lokasi ?? '-' }}
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        @else

            @if(!session('error'))

                <div class="flex justify-center items-center
                            text-center text-sm md:text-base
                            text-gray-500 h-8">

                    Silakan pilih tanggal lalu klik <b class="ml-1">Tampilkan</b>
                </div>

            @endif

        @endif

    </div>
    @endif

</section>
@endsection