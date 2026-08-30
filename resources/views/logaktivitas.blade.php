@extends('layouts.app')

@section('tittle', "Log Aktivitas")

@section('content')
<section class="p-4 md:p-6 space-y-6">

    <!-- HEADER -->
    <div class="flex items-center gap-3 bg-white p-4 rounded-lg shadow">

        <i data-lucide="list" class="w-6 h-6 md:w-7 md:h-7"></i>

        <h1 class="text-2xl md:text-3xl font-semibold">
            Log Aktivitas
        </h1>

    </div>

    <!-- CARD -->
    <div class="bg-white p-4 md:p-6 rounded-xl shadow-md">

        <!-- TABLE -->
        <div class="overflow-x-auto rounded-lg">

            <table class="min-w-full text-sm text-left bg-gray-300 rounded-lg shadow border-collapse">

                <!-- HEADER -->
                <thead class="bg-gray-500 text-white whitespace-nowrap">

                    <tr>

                        <th class="border border-slate-300 bg-gray-500 px-3 py-3 text-left text-white">
                            <div class="flex items-center gap-2">
                                <i data-lucide="hash" class="w-4 h-4"></i>
                                No
                            </div>
                        </th>

                        <th class="border border-slate-300 bg-gray-500 px-3 py-3 text-left text-white">
                            <div class="flex items-center gap-2">
                                <i data-lucide="barcode" class="w-4 h-4"></i>
                                Kode Barang
                            </div>
                        </th>

                        <th class="border border-slate-300 bg-gray-500 px-3 py-3 text-left text-white">
                            <div class="flex items-center gap-2">
                                <i data-lucide="box" class="w-4 h-4"></i>
                                Nama Barang
                            </div>
                        </th>

                        <th class="border border-slate-300 bg-gray-500 px-3 py-3 text-left text-white">
                            <div class="flex items-center gap-2">
                                <i data-lucide="calendar" class="w-4 h-4"></i>
                                Tanggal
                            </div>
                        </th>

                        <th class="border border-slate-300 bg-gray-500 px-3 py-3 text-left text-white">
                            <div class="flex items-center gap-2">
                                <i data-lucide="badge-check" class="w-4 h-4"></i>
                                Kondisi
                            </div>
                        </th>

                        <th class="border border-slate-300 bg-gray-500 px-3 py-3 text-left text-white">
                            <div class="flex items-center gap-2">
                                <i data-lucide="user" class="w-4 h-4"></i>
                                User
                            </div>
                        </th>

                        <th class="border border-slate-300 bg-gray-500 px-3 py-3 text-left text-white">
                            <div class="flex items-center gap-2">
                                <i data-lucide="map-pin" class="w-4 h-4"></i>
                                Lokasi
                            </div>
                        </th>

                        <th class="border border-slate-300 bg-gray-500 px-3 py-3 text-left text-white">
                            <div class="flex items-center gap-2">
                                <i data-lucide="settings" class="w-4 h-4"></i>
                                Aksi
                            </div>
                        </th>

                    </tr>

                </thead>

                <!-- BODY -->
                <tbody>

                    @foreach ($log as $index => $item)

                    <tr class="border-b border-gray-400 whitespace-nowrap">

                        <!-- NO -->
                        <td class="border border-slate-300 bg-slate-50 px-3 py-3">
                            {{ ($log->currentPage() - 1) * $log->perPage() + $loop->iteration }}
                        </td>

                        <!-- KODE -->
                        <td class="border border-slate-300 bg-slate-50 px-3 py-3">
                            {{ $item['kode'] }}
                        </td>

                        <!-- NAMA -->
                        <td class="border border-slate-300 bg-slate-50 px-3 py-3">
                            {{ $item['nama'] }}
                        </td>

                        <!-- TANGGAL -->
                        <td class="border border-slate-300 bg-slate-50 px-3 py-3">
                            {{ \Carbon\Carbon::parse($item['waktu'])->format('d-m-Y H:i') }}
                        </td>

                        <!-- KONDISI -->
                        <td class="border border-slate-300 bg-slate-50 px-3 py-3">
                            {{ $item['kondisi'] }}
                        </td>

                        <!-- USER -->
                        <td class="border border-slate-300 bg-slate-50 px-3 py-3">
                            {{ $item['user'] }}
                        </td>

                        <!-- LOKASI -->
                        <td class="border border-slate-300 bg-slate-50 px-3 py-3">
                            {{ $item['lokasi'] }}
                        </td>

                        <!-- AKSI -->
                        <td class="border border-slate-300 bg-slate-50 px-3 py-3">

                            @if ($item['aksi'] == 'Masuk')

                                <span class="flex items-center gap-1 text-green-700">

                                    <i data-lucide="plus-circle" class="w-4 h-4"></i>
                                    Menambahkan

                                </span>

                            @else

                                <span class="flex items-center gap-1 text-red-700">

                                    <i data-lucide="minus-circle" class="w-4 h-4"></i>
                                    Mengurangi

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

        <!-- PAGINATION -->
        <div class="flex flex-col md:flex-row md:items-center
                    md:justify-between gap-4 mt-4
                    text-sm text-gray-700">

            <!-- INFO -->
            <div class="text-gray-600 text-sm">

                Menampilkan {{ $log->firstItem() }}
                sampai {{ $log->lastItem() }}
                dari {{ $log->total() }} data

            </div>

            <!-- BUTTON PAGINATION -->
            <div class="flex items-center gap-1 flex-wrap">

                <!-- PREV -->
                @if ($log->onFirstPage())

                    <span class="px-3 py-2 text-xs bg-gray-300 text-gray-500 rounded-md">
                        ‹
                    </span>

                @else

                    <a href="{{ $log->previousPageUrl() }}"
                    class="px-3 py-2 text-xs bg-white border rounded-md shadow-sm hover:bg-gray-200">

                        ‹
                    </a>

                @endif

                <!-- PAGE -->
                @for ($i = $start; $i <= $end; $i++)

                    @if ($i == $current)

                        <span class="px-3 py-2 text-xs bg-[#4A70A9] text-white rounded-md font-semibold shadow-sm">
                            {{ $i }}
                        </span>

                    @else

                        <a href="{{ $log->url($i) }}"
                        class="px-3 py-2 text-xs bg-white border rounded-md shadow-sm hover:bg-gray-200">

                            {{ $i }}
                        </a>

                    @endif

                @endfor

                <!-- NEXT -->
                @if ($log->hasMorePages())

                    <a href="{{ $log->nextPageUrl() }}"
                    class="px-3 py-2 text-xs bg-white border rounded-md shadow-sm hover:bg-gray-200">

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
@endsection