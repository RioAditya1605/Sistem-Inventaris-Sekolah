{{-- @extends('layouts.app')

@section('tittle', "Data Barang")

@section('content')
    <section class="p-6 space-y-6 ml-64 mt-14">

        <div class="items-center justify-normal bg-gray-200 p-3 rounded-lg shadow">
            <!-- Kiri: Judul Dashboard -->
            <h1 class="text-3xl font-semibold">Data Barang</h1>
        </div>

        <!-- Filter Box -->
        <div class="bg-gray-200 rounded-lg shadow p-6 space-y-6 w-full">
            <label class="text-xl font-semibold">Filter Pencarian Barang</label>

            <div class="grid grid-cols-3 gap-6">
                <div>
                    <label class="text-sm font-medium">Nama Barang</label>
                    <input 
                        type="text" 
                        id="namaBarang"
                        class="w-full border border-gray-300 rounded p-2 text-sm"
                        placeholder="Nama Barang....."
                    >
                </div>

                <div class="relative w-full">
                    <label class="text-sm font-medium">Kondisi Barang</label>

                        <select 
                            id="kondisiBarang"
                            class="w-full border border-gray-300 rounded p-2 text-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                            <option value="">Pilih Kondisi...</option>
                            <option>Baik</option>
                            <option>Rusak Ringan</option>
                            <option>Rusak Berat</option>
                        </select>

                        <!-- Custom Dropdown Arrow -->
                        <div 
                            class="absolute top-9 right-3 flex items-center pointer-events-none"
                            placeholder="Pilih Kondisi..."
                        >
                            <svg 
                            class="w-4 h-4 text-gray-500" 
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24" 
                            xmlns="http://www.w3.org/2000/svg"
                            >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                </div>

                <div>
                    <label class="text-sm font-medium">Tanggal Masuk</label>
                    <input 
                        type="date"
                        id="tanggalMasuk" 
                        class="w-full border border-gray-300 rounded p-2 text-sm"
                    >
                </div>
            </div>

            <div class="flex gap-4 mt-4">
                <button class="flex-1 bg-white p-2 rounded-md shadow font-medium hover:bg-gray-300">
                    Cari
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
                document.getElementById('namaBarang').value = "";
                document.getElementById('kondisiBarang').value = "";
                document.getElementById('tanggalMasuk').value = "";
            }
        </script>


        <!-- Card Background -->
        <div class="bg-[#E5E5E5] p-6 rounded-xl shadow-md mt-6">

            <!-- Table -->
            <div class="overflow-x-auto rounded-lg">
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

@section('tittle', "Data Barang")

@section('content')
<section class="p-6 space-y-6 mt-14">

    <!-- Judul -->
    <div class="items-center justify-normal bg-gray-200 p-3 rounded-lg shadow flex gap-2">
        <i data-lucide="box" class="w-7 h-7 text-gray-700"></i>
        <h1 class="text-3xl font-semibold">Data Barang</h1>
    </div>

    <!-- Filter Box -->
    <div class="bg-gray-200 rounded-lg shadow p-6 space-y-6 w-full">

        <label class="text-xl font-semibold flex items-center gap-2">
            <i data-lucide="filter" class="w-6 h-6"></i>
            Filter Pencarian Barang
        </label>

        <div class="grid grid-cols-3 gap-6">

            <!-- Nama Barang -->
            <div>
                <label class="text-sm font-medium">Nama Barang</label>
                <input 
                    type="text" 
                    id="namaBarang"
                    class="w-full border border-gray-300 rounded p-2 text-sm"
                    placeholder="Nama Barang....."
                >
            </div>

            <!-- Kondisi Barang -->
            <div class="relative w-full">
                <label class="text-sm font-medium">Kondisi Barang</label>

                <select 
                    id="kondisiBarang"
                    class="w-full border border-gray-300 rounded p-2 text-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="">Pilih Kondisi...</option>
                    <option>Baik</option>
                    <option>Rusak Ringan</option>
                    <option>Rusak Berat</option>
                </select>

                <!-- Custom Arrow -->
                <div class="absolute top-9 right-3 flex items-center pointer-events-none">
                    <i data-lucide="chevron-down" class="w-4 h-4 text-gray-500"></i>
                </div>
            </div>

            <!-- Tanggal -->
            <div>
                <label class="text-sm font-medium flex items-center gap-1">
                    <i data-lucide="calendar" class="w-4 h-4"></i>
                    Tanggal Masuk
                </label>
                <input 
                    type="date"
                    id="tanggalMasuk" 
                    class="w-full border border-gray-300 rounded p-2 text-sm"
                >
            </div>

        </div>

        <!-- Tombol -->
        <div class="flex gap-4 mt-4">
            <button class="flex-1 bg-white p-2 rounded-md shadow font-medium hover:bg-gray-300 flex items-center justify-center gap-2">
                <i data-lucide="search" class="w-4 h-4"></i>
                Cari
            </button>

            <button onclick="resetFilter()" class="flex-1 bg-white p-2 border border-gray-400 rounded-md shadow font-medium hover:bg-gray-300 flex items-center justify-center gap-2">
                <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                Reset Filter
            </button>
        </div>
    </div>

    <!-- Script Reset -->
    <script>
        function resetFilter() {
            document.getElementById('namaBarang').value = "";
            document.getElementById('kondisiBarang').value = "";
            document.getElementById('tanggalMasuk').value = "";
        }
    </script>

    <!-- Card Background -->
    <div class="bg-[#E5E5E5] p-6 rounded-xl shadow-md mt-6">

        <!-- Table -->
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
                            Tanggal
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


                {{-- <tbody>
                    @for ($i = 1; $i <= 7; $i++)
                    <tr class="border-b border-gray-400">
                        <td class="py-2 px-3">{{ $i }}</td>
                        <td class="py-2 px-3">KB0001</td>
                        <td class="py-2 px-3">Buku</td>
                        <td class="py-2 px-3">01-01-2025</td>
                        <td class="py-2 px-3">Baik</td>
                        <td class="py-2 px-3">1000</td>
                        <td class="py-2 px-3">Kelas 1A</td>

                        <td class="py-2 px-3 flex gap-3">
                            <button class="text-blue-600 hover:text-blue-800">
                                <i data-lucide="pencil" class="w-5 h-5"></i>
                            </button>

                            <button class="text-red-600 hover:text-red-800">
                                <i data-lucide="trash-2" class="w-5 h-5"></i>
                            </button>
                        </td>
                    </tr>
                    @endfor
                </tbody> --}}
                <tbody>
                @forelse ($inventaris as $item)
                <tr class="border-b border-gray-400">
                    <td class="py-2 px-3">{{ $loop->iteration }}</td>
                    <td class="py-2 px-3">{{ $item->kode }}</td>
                    <td class="py-2 px-3">{{ $item->nama }}</td>
                    <td class="py-2 px-3">{{ $item->tanggal_masuk }}</td>
                    <td class="py-2 px-3">{{ $item->kondisi }}</td>
                    <td class="py-2 px-3">{{ $item->jumlah }}</td>
                    <td class="py-2 px-3">{{ $item->lokasi }}</td>

                    <td class="py-2 px-3 flex gap-3">
                        <!-- Edit -->
                        <a href="/barangkeluar/{{ $item->id }}" class="text-blue-600 hover:text-blue-800">
                            <i data-lucide="pencil" class="w-5 h-5"></i>
                        </a>

                        <!-- Delete -->
                        <form action="/inventaris/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:text-red-800">
                                <i data-lucide="trash-2" class="w-5 h-5"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-4 text-gray-600">
                        Data barang belum tersedia
                    </td>
                </tr>
                @endforelse
                </tbody>

            </table>
        </div>
    </div>

</section>

<!-- Lucide Icon Script -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>
@endsection
