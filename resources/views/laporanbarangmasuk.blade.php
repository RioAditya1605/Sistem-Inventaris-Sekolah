{{-- @extends('layouts.app')

@section('tittle', "Laporan Barang Masuk")

@section('content')
    <section class="p-6 space-y-6 ml-64 mt-14">

        <div class="items-center justify-normal bg-gray-200 p-3 rounded-lg shadow">
            <!-- Kiri: Judul Dashboard -->
            <h1 class="text-3xl font-semibold">Laporan Barang Masuk</h1>
        </div>

        <!-- Filter Box -->
        <div class="bg-gray-200 rounded-lg shadow p-6 space-y-6 w-full">
            <label class="text-xl font-semibold">Filter Barang Masuk</label>

            <div class="grid grid-cols-3 gap-6">

                <div>
                    <label class="text-sm font-medium">Tanggal Masuk</label>
                    <input 
                        type="date"
                        id="tanggalMasuk" 
                        class="w-full border border-gray-300 rounded p-2 text-sm"
                    >
                </div>

                <div>
                    <label class="text-sm font-medium">Tanggal Keluar</label>
                    <input 
                        type="date"
                        id="tanggalKeluar" 
                        class="w-full border border-gray-300 rounded p-2 text-sm"
                    >
                </div>
            </div>

            <div class="flex gap-4 mt-4">
                <button class="flex-1 bg-white p-2 rounded-md shadow font-medium hover:bg-gray-300">
                    Tampilkan
                </button>
                <button 
                    onclick="resetFilter()"
                    class="flex-1 bg-white p-2 border border-gray-400 rounded-md shadow font-medium hover:bg-gray-300">
                    Reset Filter
                </button>
            </div>
        </div>

        <!-- Script Reset -->
        <script>
            function resetFilter() {
                document.getElementById('tanggalMasuk').value = "";
                document.getElementById('tanggalKeluar').value = "";
            }
        </script>

        <!-- Card Background -->
        <div class="bg-[#E5E5E5] p-6 rounded-xl shadow-md mt-6">

            <!-- Tombol Cetak -->
            <div class="flex justify-end gap-4">
                <button class="bg-white text-gray-900 px-5 py-2 rounded-lg shadow hover:bg-gray-300 font-medium">
                    Cetak Excel
                </button>
                <button class="bg-white text-gray-900 px-5 py-2 rounded-lg shadow hover:bg-gray-300 font-medium">
                    Cetak PDF
                </button>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto mt-4 rounded-lg">
                <table class="w-full text-sm text-left bg-gray-300 rounded-lg shadow">
                    <thead class="bg-gray-500 text-white">
                        <tr>
                            <th class="py-2 px-3">No</th>
                            <th class="py-2 px-3">Kode Barang</th>
                            <th class="py-2 px-3">Nama Barang</th>
                            <th class="py-2 px-3">Tanggal</th>
                            <th class="py-2 px-3">Kondisi</th>
                            <th class="py-2 px-3">Jumlah</th>
                            <th class="py-2 px-3">Lokasi</th>
                            <th class="py-2 px-3">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @for ($i = 1; $i <= 7; $i++)
                        <tr class="border-b border-gray-400">
                            <td class="py-2 px-3">1</td>
                            <td class="py-2 px-3">KB0001</td>
                            <td class="py-2 px-3">Buku</td>
                            <td class="py-2 px-3">01-01-2025</td>
                            <td class="py-2 px-3">Baik</td>
                            <td class="py-2 px-3">1000</td>
                            <td class="py-2 px-3">Kelas 1A</td>
                            <td class="py-2 px-3 flex gap-2">
                                <button class="text-blue-600"><i class="fas fa-edit"></i></button>
                                <button class="text-red-600"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection --}}

@extends('layouts.app')

@section('tittle', "Laporan Barang Masuk")

@section('content')
<section class="p-6 space-y-6 mt-14">

    <!-- HEADER -->
    <div class="items-center justify-normal bg-gray-200 p-3 rounded-lg shadow flex gap-3">
        <i data-lucide="file-text" class="w-7 h-7"></i>
        <h1 class="text-3xl font-semibold">Laporan Barang Masuk</h1>
    </div>

    <!-- FILTER BOX -->
    <div class="bg-gray-200 rounded-lg shadow p-6 space-y-6 w-full">

        <form method="GET" action="/laporan/barangmasuk">

            <div class="flex items-center gap-2 mb-6">
                <i data-lucide="filter" class="w-6 h-6"></i>
                <label class="text-xl font-semibold">Filter Barang Masuk</label>
            </div>

            <div class="grid grid-cols-3 gap-6">

                <!-- Tanggal Masuk -->
                <div>
                    <label class="text-sm font-medium flex items-center gap-1">
                        <i data-lucide="calendar-plus" class="w-4 h-4"></i>
                        Tanggal Masuk Dari
                    </label>
                    <input 
                        type="date"
                        name="tanggalMasuk"
                        value="{{ request('tanggalMasuk') }}"
                        class="w-full border border-gray-300 rounded p-2 text-sm"
                    >
                </div>

                <!-- Tanggal Keluar -->
                <div>
                    <label class="text-sm font-medium flex items-center gap-1">
                        <i data-lucide="calendar-minus" class="w-4 h-4"></i>
                        Tanggal Masuk Sampai
                    </label>
                    <input 
                        type="date"
                        name="tanggalKeluar"
                        value="{{ request('tanggalKeluar') }}"
                        class="w-full border border-gray-300 rounded p-2 text-sm"
                    >
                </div>

            </div>

            <div class="flex gap-4 mt-4">

                <!-- TAMPILKAN -->
                <button type="submit"
                class="flex-1 bg-white p-2 rounded-md shadow font-medium hover:bg-gray-300 flex items-center justify-center gap-2">
                    <i data-lucide="eye" class="w-5 h-5"></i>
                    Tampilkan
                </button>

                <!-- RESET -->
                <a href="{{ url()->current() }}"
                    class="flex-1 bg-white p-2 border border-gray-400 rounded-md shadow font-medium hover:bg-gray-300 flex items-center justify-center gap-2">
                    <i data-lucide="rotate-ccw" class="w-5 h-5"></i>
                    Reset Filter
                </a>

            </div>

        </form>

    </div>

    <!-- Card Background -->
    <div class="bg-[#E5E5E5] p-6 rounded-xl shadow-md mt-6">

        <!-- Tombol Cetak -->
        @if(request()->filled('tanggalMasuk') || request()->filled('tanggalKeluar'))
            <div class="flex justify-between items-start mb-4">

                <!-- KIRI: PERIODE & TOTAL -->
                <div>
                    <p class="text-sm text-gray-700">
                        <strong>Periode:</strong>
                        {{ request('tanggalMasuk') ?? '-' }} 
                        s/d 
                        {{ request('tanggalKeluar') ?? '-' }}
                    </p>

                    <p class="text-sm text-gray-700">
                        <strong>Total Barang Masuk:</strong> 
                        {{ $inventaris->sum('Total_Masuk') }} unit
                    </p>
                </div>

                <!-- KANAN: TOMBOL -->
                <div class="flex gap-3">
                    <a href="/laporan/barangmasuk/excel?tanggalMasuk={{ request('tanggalMasuk') }}&tanggalKeluar={{ request('tanggalKeluar') }}"
                        class="flex items-center gap-2 bg-green-600 text-white px-4 py-1.5 text-sm rounded-md shadow hover:bg-green-700 transition font-medium">
                        Cetak Excel
                    </a>

                    <a href="/laporan/barangmasuk/pdf?tanggalMasuk={{ request('tanggalMasuk') }}&tanggalKeluar={{ request('tanggalKeluar') }}"
                        class="flex items-center gap-2 bg-red-600 text-white px-4 py-1.5 text-sm rounded-md shadow hover:bg-red-700 transition font-medium">
                        Cetak PDF
                    </a>
                </div>

            </div>
        @endif

        <!-- Table -->
        @if(request()->tanggalMasuk || request()->tanggalKeluar)
        <div class="overflow-x-auto rounded-lg">
            <table class="w-full text-sm text-left bg-gray-300 rounded-lg shadow">

                <thead class="bg-gray-500 text-white">
                <tr>
                    <th class="py-2 px-3">No</th>

                    <th class="py-2 px-3">
                        <div class="flex items-center gap-1">
                            <i data-lucide="barcode" class="w-4 h-4"></i>
                            Kode Barang
                        </div>
                    </th>

                    <th class="py-2 px-3">
                        <div class="flex items-center gap-1">
                            <i data-lucide="box" class="w-4 h-4"></i>
                            Nama Barang
                        </div>
                    </th>

                    <th class="py-2 px-3">
                        <div class="flex items-center gap-1">
                            <i data-lucide="calendar" class="w-4 h-4"></i>
                            Tanggal Masuk
                        </div>
                    </th>

                    <th class="py-2 px-3">
                        <div class="flex items-center gap-1">
                            <i data-lucide="tag" class="w-4 h-4"></i>
                            Kondisi
                        </div>
                    </th>

                    <th class="py-2 px-3">
                        <div class="flex items-center gap-1">
                            <i data-lucide="hash" class="w-4 h-4"></i>
                            Jumlah
                        </div>
                    </th>

                    <th class="py-2 px-3">
                        <div class="flex items-center gap-1">
                            <i data-lucide="map-pin" class="w-4 h-4"></i>
                            Lokasi
                        </div>
                    </th>

                    <th class="py-2 px-3">
                        <div class="flex items-center gap-1">
                            Aksi
                        </div>
                    </th>
                </tr>
                </thead>


                <tbody>
                    @if($inventaris->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center py-4 text-gray-600">
                                Data tidak ditemukan
                            </td>
                        </tr>
                    @endif

                @foreach ($inventaris as $item)
                <tr class="border-b border-gray-400">
                    <td class="py-2 px-3">{{ $loop->iteration }}</td>
                    <td class="py-2 px-3">{{ $item->inventaris->kode ?? '-' }}</td>
                    <td class="py-2 px-3">{{ $item->inventaris->nama ?? '-' }}</td>
                    <td class="py-2 px-3">{{ $item->tanggal_masuk ?? '-' }}</td>
                    <td class="py-2 px-3">{{ $item->inventaris->kondisi ?? '-' }}</td>
                    {{-- <td class="py-2 px-3">{{ $item->jumlah_masuk }}</td> --}}
                    <td class="py-2 px-3">{{ $item->total_masuk }}</td>
                    <td class="py-2 px-3">{{ $item->inventaris->lokasi ?? '-' }}</td>

                    <td class="py-2 px-3 flex gap-3">
                        <!-- EDIT -->
                        <a href="#" class="text-blue-600 hover:text-blue-800">
                            <i data-lucide="pencil" class="w-5 h-5"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
        @else
            <div class="flex justify-center items-center h-8 text-gray-500">
                Silakan pilih tanggal lalu klik <b>Tampilkan</b>
            </div>
        @endif
    </div>

</section>
@endsection
