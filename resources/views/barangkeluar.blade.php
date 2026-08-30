@extends('layouts.app')

@section('tittle', 'Barang Keluar')

@section('content')
<section class="p-4 md:p-6 space-y-6">

    <!-- HEADER -->
    <div class="flex items-center gap-3 bg-white p-4 rounded-lg shadow">

        <i data-lucide="upload" class="w-6 h-6 md:w-7 md:h-7"></i>

        <h1 class="text-2xl md:text-3xl font-semibold">
            Barang Keluar
        </h1>
    </div>

    <!-- ALERT -->
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded shadow text-sm md:text-base">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded shadow text-sm md:text-base">
            {{ session('error') }}
        </div>
    @endif

    <!-- FORM BARANG KELUAR -->
    <form method="POST"
          action="{{ route('barang.keluar') }}"
          class="bg-white rounded-lg shadow p-4 md:p-6 w-full">

        @csrf
        @method('PUT')

        <!-- TITLE -->
        <div class="flex items-center gap-2 mb-4">

            <i data-lucide="file-minus" class="w-5 h-5 md:w-6 md:h-6"></i>

            <label class="text-lg md:text-xl font-semibold">
                Form Barang Keluar
            </label>
        </div>

        <!-- INPUT -->
        {{-- HP = 1 kolom | Tablet & Desktop = tetap 2 kolom --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6 mb-2">

            <!-- KODE BARANG -->
            <div>
                <label class="text-sm font-medium flex items-center gap-1 mb-1">

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
                <label class="text-sm font-medium flex items-center gap-1 mb-1">

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

        </div>

        <!-- BUTTON -->
        <div class="flex flex-col sm:flex-row gap-3 mt-4">

            <button type="submit"
                class="w-full sm:flex-1 bg-white p-2 border-2 border-[#4A70A9] rounded-md shadow
                       font-medium hover:bg-[#4A70A9] hover:text-white
                       flex items-center justify-center gap-2">

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