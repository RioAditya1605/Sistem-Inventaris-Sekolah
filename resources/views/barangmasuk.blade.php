@extends('layouts.app')

@section('tittle', 'Barang Masuk')

@section('content')
<section class="p-4 md:p-6 space-y-6">

    <!-- Header -->
    <div class="flex items-center gap-3 bg-white p-4 rounded-lg shadow">
        <i data-lucide="download" class="w-6 h-6 md:w-7 md:h-7"></i>

        <h1 class="text-2xl md:text-3xl font-semibold">
            Barang Masuk
        </h1>
    </div>

    <!-- FORM TAMBAH BARANG -->
    <form action="/inventaris"
          method="POST"
          class="bg-white rounded-lg shadow p-4 md:p-6 w-full">

        @csrf

        <!-- Title Form -->
        <div class="flex items-center gap-2 mb-4">
            <i data-lucide="plus-circle" class="w-5 h-5 md:w-6 md:h-6"></i>

            <label class="text-lg md:text-xl font-semibold">
                Form Barang Masuk
            </label>
        </div>

        <!-- INPUT BARIS 1 -->
        {{-- HP = 1 kolom | Tablet & Desktop = tetap 3 kolom --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 md:gap-6 mb-2">

            <!-- Nama Barang -->
            <div>
                <label class="text-sm font-medium flex items-center gap-1 mb-1">
                    <i data-lucide="package" class="w-4 h-4"></i>
                    Nama Barang
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
            <div>
                <label class="text-sm font-medium flex items-center gap-1 mb-1">
                    <i data-lucide="shield-check" class="w-4 h-4"></i>
                    Kondisi Barang
                </label>

                <select
                    name="kondisi"
                    class="w-full border border-gray-300 rounded p-2 text-sm
                           appearance-none focus:outline-none
                           focus:ring-2 focus:ring-blue-500"
                    required
                >
                    <option value="">Pilih Kondisi...</option>
                    <option value="Baik">Baik</option>
                    <option value="Rusak Ringan">Rusak Ringan</option>
                    <option value="Rusak Berat">Rusak Berat</option>
                </select>
            </div>

            <!-- Lokasi -->
            <div>
                <label class="text-sm font-medium flex items-center gap-1 mb-1">
                    <i data-lucide="map-pin" class="w-4 h-4"></i>
                    Lokasi Barang
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

        <!-- INPUT BARIS 2 -->
        {{-- HP = 1 kolom | Tablet & Desktop = tetap 3 kolom --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 md:gap-6">

            <!-- Kode Barang -->
            <div>
                <label class="text-sm font-medium flex items-center gap-1 mb-1">
                    <i data-lucide="scan-barcode" class="w-4 h-4"></i>
                    Kode Barang
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
                <label class="text-sm font-medium flex items-center gap-1 mb-1">
                    <i data-lucide="layers" class="w-4 h-4"></i>
                    Jumlah Barang
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

        </div>

        <!-- BUTTON SIMPAN -->
        <div class="flex flex-col sm:flex-row gap-3 mt-4">

            <button type="submit"
                    class="w-full sm:flex-1 bg-white p-2 border-2 border-[#4A70A9] rounded-md shadow
                           font-medium hover:bg-[#4A70A9] hover:text-white
                           flex items-center justify-center gap-2">

                <i data-lucide="save" class="w-5 h-5"></i>
                Simpan Barang
            </button>

        </div>

    </form>

</section>
@endsection