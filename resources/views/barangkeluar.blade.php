{{-- @extends('layouts.app')

@section('tittle', "Barang Keluar")

@section('content')
    <section class="p-6 space-y-6 ml-64 mt-14">

        <div class="items-center justify-normal bg-gray-200 p-3 rounded-lg shadow">
            <!-- Kiri: Judul Dashboard -->
            <h1 class="text-3xl font-semibold">Barang Keluar</h1>
        </div>

        <!-- Filter Box -->
        <div class="bg-gray-200 rounded-lg shadow p-6 space-y-6 w-full">
            <label class="text-xl font-semibold">Keluar Barang</label>

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
                    Keluar
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

@extends('layouts.app')

@section('tittle', 'Barang Keluar')

@section('content')
<section class="p-6 space-y-6 mt-14">

    <!-- HEADER -->
    <div class="flex items-center gap-3 bg-gray-200 p-3 rounded-lg shadow">
        <i data-lucide="upload" class="w-7 h-7"></i>
        <h1 class="text-3xl font-semibold">Barang Keluar</h1>
    </div>

    <!-- ALERT -->
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded shadow">
            {{ session('error') }}
        </div>
    @endif

    <!-- FORM BARANG KELUAR -->
    <form method="POST" action="{{ route('barang.keluar') }}"
          class="bg-gray-200 rounded-lg shadow p-6 space-y-6 w-full">
        @csrf
        @method('PUT')

        <div class="flex items-center gap-2">
            <i data-lucide="file-minus" class="w-6 h-6"></i>
            <label class="text-xl font-semibold">Form Barang Keluar</label>
        </div>

        <!-- BARIS 1 -->
        <div class="grid grid-cols-3 gap-6">

            <!-- KODE BARANG -->
            <div>
                <label class="text-sm font-medium flex items-center gap-1">
                    <i data-lucide="scan-barcode" class="w-4 h-4"></i>
                    Kode Barang
                </label>
                <input
                    type="text"
                    name="kode"
                    class="w-full border border-gray-300 rounded p-2 text-sm"
                    placeholder="Contoh: KB0001"
                    required
                >
            </div>

            <!-- JUMLAH KELUAR -->
            <div>
                <label class="text-sm font-medium flex items-center gap-1">
                    <i data-lucide="layers" class="w-4 h-4"></i>
                    Jumlah Keluar
                </label>
                <input
                    type="number"
                    name="jumlah_keluar"
                    class="w-full border border-gray-300 rounded p-2 text-sm"
                    min="1"
                    placeholder="Jumlah"
                    required
                >
            </div>

            <!-- TANGGAL KELUAR -->
            <div>
                <label class="text-sm font-medium flex items-center gap-1">
                    <i data-lucide="calendar" class="w-4 h-4"></i>
                    Tanggal Keluar
                </label>
                <input
                    type="date"
                    name="tanggal_keluar"
                    class="w-full border border-gray-300 rounded p-2 text-sm"
                    required
                >
            </div>
        </div>

        <!-- BUTTON -->
        <div class="flex gap-4 mt-4">
            <button type="submit"
                class="flex-1 bg-white p-2 rounded-md shadow font-medium
                       hover:bg-gray-300 flex items-center justify-center gap-2">
                <i data-lucide="log-out" class="w-5 h-5"></i>
                Keluarkan Barang
            </button>
        </div>

    </form>

</section>

<!-- LUCIDE -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>
@endsection


