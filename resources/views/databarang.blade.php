@extends('layouts.app')

@section('tittle', "Data Barang")

@section('content')
<section class="p-4 md:p-6 space-y-6">

    <!-- Judul -->
    <div class="flex items-center gap-2 bg-white p-4 rounded-lg shadow">
        <i data-lucide="box" class="w-6 h-6 md:w-7 md:h-7 text-gray-700"></i>

        <h1 class="text-2xl md:text-3xl font-semibold">
            Data Barang
        </h1>
    </div>

    <!-- Filter Box -->
    <div class="bg-white rounded-lg shadow p-4 md:p-6 space-y-6 w-full">

        <label class="text-lg md:text-xl font-semibold flex items-center gap-2">
            <i data-lucide="filter" class="w-5 h-5 md:w-6 md:h-6"></i>
            Filter Pencarian Barang
        </label>

        <form method="GET" action="{{ url('/databarang') }}">

            <!-- GRID RESPONSIVE -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 md:gap-6">

                <!-- Nama Barang -->
                <div>
                    <label class="text-sm font-medium flex items-center gap-1 mb-1">
                        <i data-lucide="package" class="w-4 h-4"></i>
                        Nama Barang
                    </label>

                    <input 
                        type="text" 
                        name="nama"
                        required
                        value="{{ request('nama') }}"
                        class="w-full border border-gray-300 rounded p-2 text-sm"
                        placeholder="Nama Barang....."
                    >
                </div>

                <!-- Kondisi Barang -->
                <div>
                    <label class="text-sm font-medium flex items-center gap-1 mb-1">
                        <i data-lucide="shield-check" class="w-4 h-4"></i>
                        Kondisi Barang
                    </label>

                    <select 
                        name="kondisi"
                        required
                        class="w-full border border-gray-300 rounded p-2 text-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                        <option value="">Pilih Kondisi...</option>

                        <option value="Baik"
                            {{ request('kondisi') == 'Baik' ? 'selected' : '' }}>
                            Baik
                        </option>

                        <option value="Rusak Ringan"
                            {{ request('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>
                            Rusak Ringan
                        </option>

                        <option value="Rusak Berat"
                            {{ request('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>
                            Rusak Berat
                        </option>
                    </select>
                </div>

                <!-- Tanggal -->
                <div>
                    <label class="text-sm font-medium flex items-center gap-1 mb-1">
                        <i data-lucide="calendar" class="w-4 h-4"></i>
                        Tanggal Masuk
                    </label>

                    <input 
                        type="date"
                        name="tanggal_masuk"
                        value="{{ request('tanggal_masuk') }}"
                        required
                        class="w-full border border-gray-300 rounded p-2 text-sm"
                    >
                </div>

            </div>

            <!-- Tombol -->
            <div class="flex flex-col sm:flex-row gap-3 mt-6">

                <button type="submit"
                        class="w-full sm:flex-[4] h-10 bg-white border-2 border-[#4A70A9] rounded-md shadow
                               font-medium hover:bg-[#4A70A9] hover:text-white
                               flex items-center justify-center gap-2">

                    <i data-lucide="search" class="w-4 h-4"></i>
                    Cari
                </button>

                <a href="{{ url('/databarang') }}"
                   class="w-full sm:flex-1 h-10 bg-white border-2 border-[#9CA3AF]
                          rounded-md shadow font-medium hover:bg-[#6B7280] hover:text-white
                          flex items-center justify-center gap-2">

                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                    Reset Filter
                </a>

            </div>

        </form>
    </div>

    <!-- Card Background -->
    <div class="bg-white p-4 md:p-6 rounded-xl shadow-md">

        <!-- Table -->
        <div class="overflow-x-auto rounded-lg">

            <table class="min-w-full text-sm text-left bg-slate-50 rounded-lg shadow border-collapse">

                <thead class="bg-gray-500 text-white whitespace-nowrap">
                    <tr>
                        <th class="border border-slate-300 bg-gray-500 px-3 py-3 text-left text-white">No</th>

                        <th class="border border-slate-300 bg-gray-500 px-3 py-3 text-left text-white">
                            <div class="flex items-center gap-1">
                                <i data-lucide="barcode" class="w-4 h-4"></i>
                                Kode Barang
                            </div>
                        </th>

                        <th class="border border-slate-300 bg-gray-500 px-3 py-3 text-left text-white">
                            <div class="flex items-center gap-1">
                                <i data-lucide="box" class="w-4 h-4"></i>
                                Nama Barang
                            </div>
                        </th>

                        <th class="border border-slate-300 bg-gray-500 px-3 py-3 text-left text-white">
                            <div class="flex items-center gap-1">
                                <i data-lucide="calendar" class="w-4 h-4"></i>
                                Tanggal
                            </div>
                        </th>

                        <th class="border border-slate-300 bg-gray-500 px-3 py-3 text-left text-white">
                            <div class="flex items-center gap-1">
                                <i data-lucide="tag" class="w-4 h-4"></i>
                                Kondisi
                            </div>
                        </th>

                        <th class="border border-slate-300 bg-gray-500 px-3 py-3 text-left text-white">
                            <div class="flex items-center gap-1">
                                <i data-lucide="hash" class="w-4 h-4"></i>
                                Jumlah
                            </div>
                        </th>

                        <th class="border border-slate-300 bg-gray-500 px-3 py-3 text-left text-white">
                            <div class="flex items-center gap-1">
                                <i data-lucide="map-pin" class="w-4 h-4"></i>
                                Lokasi
                            </div>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($inventaris as $item)
                    <tr class="border-b border-gray-400 whitespace-nowrap">

                        <td class="border border-slate-300 bg-slate-50 px-3 py-3">
                            {{ ($inventaris->currentPage() - 1) * $inventaris->perPage() + $loop->iteration }}
                        </td>

                        <td class="border border-slate-300 bg-slate-50 px-3 py-3">{{ $item->kode }}</td>
                        <td class="border border-slate-300 bg-slate-50 px-3 py-3">{{ $item->nama }}</td>
                        <td class="border border-slate-300 bg-slate-50 px-3 py-3">{{ $item->tanggal_masuk }}</td>
                        <td class="border border-slate-300 bg-slate-50 px-3 py-3">{{ $item->kondisi }}</td>
                        <td class="border border-slate-300 bg-slate-50 px-3 py-3">{{ $item->jumlah }}</td>
                        <td class="border border-slate-300 bg-slate-50 px-3 py-3">{{ $item->lokasi }}</td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="8"
                            class="text-center py-6 text-gray-600">
                            Data barang belum tersedia
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        @php
            $current = $inventaris->currentPage();
            $last = $inventaris->lastPage();

            $start = max($current - 1, 1);
            $end = min($start + 2, $last);

            if ($end - $start < 2) {
                $start = max($end - 2, 1);
            }
        @endphp

        <!-- Pagination -->
        <div class="flex flex-col md:flex-row md:justify-between
                    md:items-center gap-4 mt-4 text-sm text-gray-700">

            <!-- Info -->
            <div class="text-sm md:text-md text-gray-500">
                Menampilkan {{ $inventaris->firstItem() }}
                sampai {{ $inventaris->lastItem() }}
                dari {{ $inventaris->total() }} data
            </div>

            <!-- Pagination Button -->
            <div class="flex flex-wrap items-center gap-1">

                <!-- PREV -->
                @if ($inventaris->onFirstPage())
                    <span class="px-3 py-2 text-xs bg-gray-300 text-gray-500 rounded-md">
                        ‹
                    </span>
                @else
                    <a href="{{ $inventaris->previousPageUrl() }}"
                       class="px-3 py-2 text-xs bg-white border rounded-md shadow-sm hover:bg-gray-200">
                        ‹
                    </a>
                @endif

                <!-- PAGE -->
                @for ($i = $start; $i <= $end; $i++)

                    @if ($i == $current)

                        <span class="px-3 py-2 text-xs bg-[#4A70A9]
                                     text-white rounded-md shadow-sm font-semibold">
                            {{ $i }}
                        </span>

                    @else

                        <a href="{{ $inventaris->url($i) }}"
                           class="px-3 py-2 text-xs bg-white border
                                  rounded-md shadow-sm hover:bg-gray-200">
                            {{ $i }}
                        </a>

                    @endif

                @endfor

                <!-- NEXT -->
                @if ($inventaris->hasMorePages())

                    <a href="{{ $inventaris->nextPageUrl() }}"
                       class="px-3 py-2 text-xs bg-white border
                              rounded-md shadow-sm hover:bg-gray-200">
                        ›
                    </a>

                @else

                    <span class="px-3 py-2 text-xs bg-gray-300 text-gray-500 rounded-md">
                        ›
                    </span>

                @endif

            </div>
        </div>

    </div>

</section>

<!-- Lucide Icon Script -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>
@endsection