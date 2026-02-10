{{-- @extends('layouts.app')

@section('tittle', "Barang Masuk")

@section('content')
    <section class="p-6 space-y-6 ml-64 mt-14">

        <div class="items-center justify-normal bg-gray-200 p-3 rounded-lg shadow">
            <!-- Kiri: Judul Dashboard -->
            <h1 class="text-3xl font-semibold">Barang Masuk</h1>
        </div>

        <!-- Filter Box -->
        <div class="bg-gray-200 rounded-lg shadow p-6 space-y-6 w-full">
            <label class="text-xl font-semibold">Tambah Barang</label>

            <div class="grid grid-cols-3 gap-6">
                <div>
                    <label class="text-sm font-medium">Nama Barang</label>
                    <input 
                        type="text" 
                        class="w-full border border-gray-300 rounded p-2 text-sm"
                        placeholder="Nama Barang....."
                    >
                </div>

                <div class="relative w-full">
                    <label class="text-sm font-medium">Kondisi Barang</label>

                    <select 
                        class="w-full border border-gray-300 rounded p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500
                            appearance-none [appearance:none] [-webkit-appearance:none] [-moz-appearance:none]
                            bg-[url('data:image/svg+xml;utf8,<svg xmlns=\\'http://www.w3.org/2000/svg\\' fill=\\'none\\' viewBox=\\'0 0 24 24\\' stroke=\\'%23666\\'><path stroke-linecap=\\'round\\' stroke-linejoin=\\'round\\' stroke-width=\\'2\\' d=\\'M19 9l-7 7-7-7\\'/></svg>')] 
                            bg-no-repeat bg-[right_0.75rem_center] pr-8"
                    >
                        <option>Pilih Kondisi...</option>
                        <option>Baik</option>
                        <option>Rusak Ringan</option>
                        <option>Rusak Berat</option>
                    </select>
                </div>

                <div>
                    <label class="text-sm font-medium">Tanggal Masuk</label>
                    <input 
                        type="date" 
                        class="w-full border border-gray-300 rounded p-2 text-sm"
                    >
                </div>
            </div>

            <div class="grid grid-cols-3 gap-6">

                <div>
                    <label class="text-sm font-medium">Kode Barang</label>
                    <input 
                        type="text" 
                        class="w-full border border-gray-300 rounded p-2 text-sm"
                        placeholder="Kode Barang....."
                    >
                </div>

                <div>
                    <label class="text-sm font-medium">Jumlah Barang</label>
                    <input 
                        type="text" 
                        class="w-full border border-gray-300 rounded p-2 text-sm"
                        placeholder="Jumlah Barang....."
                    >
                </div>

                <div>
                    <label class="text-sm font-medium">Lokasi Barang</label>
                    <input 
                        type="text" 
                        class="w-full border border-gray-300 rounded p-2 text-sm"
                        placeholder="Lokasi Barang....."
                    >
                </div>
            </div>

            <div class="flex gap-4 mt-4">
                <button class="flex-1 bg-white p-2 rounded-md shadow font-medium hover:bg-gray-300">
                    Tambah
                </button>
            </div>
            
        </div>


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

{{-- @extends('layouts.app')

@section('tittle', "Barang Masuk")

@section('content')
<section class="p-6 space-y-6 mt-14">

    <!-- Header -->
    <div class="items-center justify-normal bg-gray-200 p-3 rounded-lg shadow flex gap-3">
        <i data-lucide="download" class="w-7 h-7"></i>
        <h1 class="text-3xl font-semibold">Barang Masuk</h1>
    </div>

    <!-- Form Tambah -->
    <div class="bg-gray-200 rounded-lg shadow p-6 space-y-6 w-full">
        <div class="flex items-center gap-2">
            <i data-lucide="plus-circle" class="w-6 h-6"></i>
            <label class="text-xl font-semibold">Tambah Barang</label>
        </div>

        <!-- Input 1 -->
        <div class="grid grid-cols-3 gap-6">

            <!-- Nama Barang -->
            <div>
                <label class="text-sm font-medium flex items-center gap-1">
                    <i data-lucide="package" class="w-4 h-4"></i> Nama Barang
                </label>
                <input 
                    type="text"
                    class="w-full border border-gray-300 rounded p-2 text-sm"
                    placeholder="Nama Barang..."
                >
            </div>

            <!-- Kondisi -->
            <div class="relative w-full">
                <label class="text-sm font-medium flex items-center gap-1">
                    <i data-lucide="shield-check" class="w-4 h-4"></i> Kondisi Barang
                </label>

                <select 
                    class="w-full border border-gray-300 rounded p-2 text-sm 
                    focus:outline-none focus:ring-2 focus:ring-blue-500
                    appearance-none bg-no-repeat bg-[right_0.75rem_center] pr-8"
                >
                    <option>Pilih Kondisi...</option>
                    <option>Baik</option>
                    <option>Rusak Ringan</option>
                    <option>Rusak Berat</option>
                </select>

                <!-- arrow custom -->
                <i data-lucide="chevron-down" class="absolute top-9 right-3 w-4 h-4 text-gray-500 pointer-events-none"></i>
            </div>

            <!-- Tanggal -->
            <div>
                <label class="text-sm font-medium flex items-center gap-1">
                    <i data-lucide="calendar" class="w-4 h-4"></i> Tanggal Masuk
                </label>
                <input 
                    type="date"
                    class="w-full border border-gray-300 rounded p-2 text-sm"
                >
            </div>
        </div>

        <!-- Input 2 -->
        <div class="grid grid-cols-3 gap-6">

            <!-- Kode -->
            <div>
                <label class="text-sm font-medium flex items-center gap-1">
                    <i data-lucide="scan-barcode" class="w-4 h-4"></i> Kode Barang
                </label>
                <input 
                    type="text"
                    class="w-full border border-gray-300 rounded p-2 text-sm"
                    placeholder="Kode Barang..."
                >
            </div>

            <!-- Jumlah -->
            <div>
                <label class="text-sm font-medium flex items-center gap-1">
                    <i data-lucide="hash" class="w-4 h-4"></i> Jumlah Barang
                </label>
                <input 
                    type="number"
                    class="w-full border border-gray-300 rounded p-2 text-sm"
                    placeholder="Jumlah Barang..."
                >
            </div>

            <!-- Lokasi -->
            <div>
                <label class="text-sm font-medium flex items-center gap-1">
                    <i data-lucide="map-pin" class="w-4 h-4"></i> Lokasi Barang
                </label>
                <input 
                    type="text"
                    class="w-full border border-gray-300 rounded p-2 text-sm"
                    placeholder="Lokasi Barang..."
                >
            </div>
        </div>

        <!-- Button Tambah -->
        <div class="flex gap-4 mt-4">
            <button class="flex-1 bg-white p-2 rounded-md shadow font-medium hover:bg-gray-300 flex items-center justify-center gap-2">
                <i data-lucide="save" class="w-5 h-5"></i>
                Tambah Barang
            </button>
        </div>

    </div>

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


                <tbody>
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
                </tbody>

            </table>
        </div>
    </div>

</section>
@endsection --}}

@extends('layouts.app')

@section('tittle', 'Barang Masuk')

@section('content')
<section class="p-6 space-y-6 mt-14">

    <!-- Header -->
    <div class="items-center justify-normal bg-gray-200 p-3 rounded-lg shadow flex gap-3">
        <i data-lucide="download" class="w-7 h-7"></i>
        <h1 class="text-3xl font-semibold">Barang Masuk</h1>
    </div>

    <!-- FORM TAMBAH BARANG (CREATE) -->
    <form action="/inventaris" method="POST"
          class="bg-gray-200 rounded-lg shadow p-6 space-y-6 w-full">
        @csrf

        <div class="flex items-center gap-2">
            <i data-lucide="plus-circle" class="w-6 h-6"></i>
            <label class="text-xl font-semibold">Tambah Barang</label>
        </div>

        <!-- INPUT BARIS 1 -->
        <div class="grid grid-cols-3 gap-6">

            <!-- Nama Barang -->
            <div>
                <label class="text-sm font-medium flex items-center gap-1">
                    <i data-lucide="package" class="w-4 h-4"></i> Nama Barang
                </label>
                <input
                    type="text"
                    name="nama"
                    class="w-full border border-gray-300 rounded p-2 text-sm"
                    placeholder="Nama Barang..."
                    required
                >
            </div>

            <!-- Kondisi -->
            <div class="relative w-full">
                <label class="text-sm font-medium flex items-center gap-1">
                    <i data-lucide="shield-check" class="w-4 h-4"></i> Kondisi Barang
                </label>

                <select
                    name="kondisi"
                    class="w-full border border-gray-300 rounded p-2 text-sm
                           focus:outline-none focus:ring-2 focus:ring-blue-500
                           appearance-none bg-no-repeat bg-[right_0.75rem_center] pr-8"
                    required
                >
                    <option value="">Pilih Kondisi...</option>
                    <option value="Baik">Baik</option>
                    <option value="Rusak Ringan">Rusak Ringan</option>
                    <option value="Rusak Berat">Rusak Berat</option>
                </select>

                <i data-lucide="chevron-down"
                   class="absolute top-9 right-3 w-4 h-4 text-gray-500 pointer-events-none"></i>
            </div>

            <!-- Tanggal Masuk -->
            <div>
                <label class="text-sm font-medium flex items-center gap-1">
                    <i data-lucide="calendar" class="w-4 h-4"></i> Tanggal Masuk
                </label>
                <input
                    type="date"
                    name="tanggal_masuk"
                    class="w-full border border-gray-300 rounded p-2 text-sm"
                    required
                >
            </div>
        </div>

        <!-- INPUT BARIS 2 -->
        <div class="grid grid-cols-3 gap-6">

            <!-- Kode Barang -->
            <div>
                <label class="text-sm font-medium flex items-center gap-1">
                    <i data-lucide="scan-barcode" class="w-4 h-4"></i> Kode Barang
                </label>
                <input
                    type="text"
                    name="kode"
                    class="w-full border border-gray-300 rounded p-2 text-sm"
                    placeholder="Kode Barang..."
                    required
                >
            </div>

            <!-- Jumlah -->
            <div>
                <label class="text-sm font-medium flex items-center gap-1">
                    <i data-lucide="hash" class="w-4 h-4"></i> Jumlah Barang
                </label>
                <input
                    type="number"
                    name="jumlah"
                    class="w-full border border-gray-300 rounded p-2 text-sm"
                    placeholder="Jumlah Barang..."
                    min="1"
                    required
                >
            </div>

            <!-- Lokasi -->
            <div>
                <label class="text-sm font-medium flex items-center gap-1">
                    <i data-lucide="map-pin" class="w-4 h-4"></i> Lokasi Barang
                </label>
                <input
                    type="text"
                    name="lokasi"
                    class="w-full border border-gray-300 rounded p-2 text-sm"
                    placeholder="Lokasi Barang..."
                    required
                >
            </div>
        </div>

        <!-- BUTTON SIMPAN -->
        <div class="flex gap-4 mt-4">
            <button type="submit"
                    class="flex-1 bg-white p-2 rounded-md shadow font-medium
                           hover:bg-gray-300 flex items-center justify-center gap-2">
                <i data-lucide="save" class="w-5 h-5"></i>
                Simpan Barang
            </button>
        </div>

    </form>
</section>
@endsection

