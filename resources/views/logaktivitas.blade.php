{{-- @extends('layouts.app')

@section('tittle', "Log Aktivitas")

@section('content')
    <section class="p-6 space-y-6 ml-64 mt-14">

        <div class="items-center justify-normal bg-gray-200 p-3 rounded-lg shadow">
            <!-- Kiri: Judul Dashboard -->
            <h1 class="text-3xl font-semibold">Log Aktivitas</h1>
        </div>

        <!-- Card Background -->
        <div class="bg-[#E5E5E5] p-6 rounded-xl shadow-md mt-6">

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
                            <th class="py-2 px-3">User</th>
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
                            <td class="py-2 px-3">Admin 1</td>
                            <td class="py-2 px-3">Kelas 1A</td>
                            <td class="py-2 px-3 flex gap-2">
                                <button class="text-black"><i class="fas fa-edit"></i>Menambahkan</button>
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

@section('tittle', "Log Aktivitas")

@section('content')
    <section class="p-6 space-y-6 mt-14">

        <div class="items-center justify-normal bg-gray-200 p-3 rounded-lg shadow">
            <h1 class="text-3xl font-semibold flex items-center gap-2">
                <i data-lucide="list" class="w-7 h-7"></i>
                Log Aktivitas
            </h1>
        </div>

        <!-- Card Background -->
        <div class="bg-[#E5E5E5] p-6 rounded-xl shadow-md mt-6">

            <!-- Table -->
            <div class="overflow-x-auto mt-4 rounded-lg">
                <table class="w-full text-sm text-left bg-gray-300 rounded-lg shadow">

                    <!-- HEADER TABEL RAPI -->
                    <thead class="bg-gray-500 text-white">
                        <tr>
                            <th class="py-2 px-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="hash" class="w-4 h-4"></i> No
                                </div>
                            </th>

                            <th class="py-2 px-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="barcode" class="w-4 h-4"></i> Kode Barang
                                </div>
                            </th>

                            <th class="py-2 px-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="box" class="w-4 h-4"></i> Nama Barang
                                </div>
                            </th>

                            <th class="py-2 px-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="calendar" class="w-4 h-4"></i> Tanggal
                                </div>
                            </th>

                            <th class="py-2 px-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="badge-check" class="w-4 h-4"></i> Kondisi
                                </div>
                            </th>

                            <th class="py-2 px-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="user" class="w-4 h-4"></i> User
                                </div>
                            </th>

                            <th class="py-2 px-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="map-pin" class="w-4 h-4"></i> Lokasi
                                </div>
                            </th>

                            <th class="py-2 px-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="settings" class="w-4 h-4"></i> Aksi
                                </div>
                            </th>
                        </tr>
                    </thead>

                    <!-- BODY -->
                    <tbody>
                    @foreach ($log as $index => $item)
                    <tr class="border-b border-gray-400">

                    <td class="py-2 px-3">
                        {{ ($log->currentPage() - 1) * $log->perPage() + $loop->iteration }}
                    </td>

                    <td class="py-2 px-3">{{ $item['kode'] }}</td>

                    <td class="py-2 px-3">{{ $item['nama'] }}</td>

                    {{-- <td class="py-2 px-3">{{ $item['tanggal'] }}</td> --}}
                    <td class="py-2 px-3">
                    {{ \Carbon\Carbon::parse($item['waktu'])->format('d-m-Y H:i') }}
                    </td>

                    <td class="py-2 px-3">{{ $item['kondisi'] }}</td>

                    <td class="py-2 px-3">{{ $item['user'] }}</td>

                    <td class="py-2 px-3">{{ $item['lokasi'] }}</td>

                    <td class="py-2 px-3 flex gap-3">

                    @if ($item['aksi'] == 'Masuk')
                    <span class="flex items-center gap-1 text-green-700">
                    <i data-lucide="plus-circle" class="w-4 h-4"></i> Menambahkan
                    </span>
                    @else
                    <span class="flex items-center gap-1 text-red-700">
                    <i data-lucide="minus-circle" class="w-4 h-4"></i> Mengurangi
                    </span>
                    @endif

                    </td>

                    </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>

            @php
                $current = $log->currentPage();
                $last = $log->lastPage();

                $start = max($current - 1, 1);
                $end = min($start + 2, $last);

                if ($end - $start < 2) {
                    $start = max($end - 2, 1);
                }
            @endphp

            <div class="flex items-center justify-between mt-4 text-sm text-gray-700">

                <!-- KIRI -->
                <div class="flex items-center gap-3">

                    <div class="text-gray-600 whitespace-nowrap">
                        Menampilkan {{ $log->firstItem() }} sampai {{ $log->lastItem() }} 
                        dari {{ $log->total() }} data
                    </div>

                </div>

                <!-- KANAN -->
                <div class="flex items-center gap-1">

                    {{-- PREV --}}
                    @if ($log->onFirstPage())
                        <span class="px-3 py-1 bg-gray-300 text-gray-500 rounded-md">‹</span>
                    @else
                        <a href="{{ $log->previousPageUrl() }}"
                        class="px-3 py-1 bg-white border rounded-md hover:bg-gray-200">‹</a>
                    @endif

                    {{-- ANGKA --}}
                    @for ($i = $start; $i <= $end; $i++)
                        @if ($i == $current)
                            <span class="px-3 py-1 bg-[#4A70A9] text-white rounded-md font-semibold">
                                {{ $i }}
                            </span>
                        @else
                            <a href="{{ $log->url($i) }}"
                            class="px-3 py-1 bg-white border rounded-md hover:bg-gray-200">
                                {{ $i }}
                            </a>
                        @endif
                    @endfor

                    {{-- NEXT --}}
                    @if ($log->hasMorePages())
                        <a href="{{ $log->nextPageUrl() }}"
                        class="px-3 py-1 bg-white border rounded-md hover:bg-gray-200">›</a>
                    @else
                        <span class="px-3 py-1 bg-gray-300 text-gray-500 rounded-md">›</span>
                    @endif

                </div>

            </div>
        </div>
    </section>
@endsection
