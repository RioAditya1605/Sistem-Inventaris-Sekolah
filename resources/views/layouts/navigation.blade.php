{{-- <!-- Sidebar -->
<aside class="w-64 h-screen fixed top-0 left-0 bg-[#4A70A9] shadow-md flex flex-col justify-between">
    <div>
        <div class="p-4 text-white font-semibold">
            Inventaris Barang SDN 1 Kesumadadi
        </div>

        <nav class="mt-4 space-y-1">

            <a href="{{ url('/') }}"
               class="flex w-60 items-center px-4 py-2 rounded-md transition
               {{ request()->is('/') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i class="fas fa-chart-line mr-2"></i> Dashboard
            </a>

            <a href="{{ url('databarang') }}"
               class="flex w-60 items-center px-4 py-2 rounded-md transition
               {{ request()->is('databarang') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i class="fas fa-box mr-2"></i> Data Barang
            </a>

            <a href="{{ url('barangmasuk') }}"
               class="flex w-60 items-center px-4 py-2 rounded-md transition
               {{ request()->is('barangmasuk') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i class="fas fa-download mr-2"></i> Barang Masuk
            </a>

            <a href="{{ url('barangkeluar') }}"
               class="flex w-60 items-center px-4 py-2 rounded-md transition
               {{ request()->is('barangkeluar') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i class="fas fa-upload mr-2"></i> Barang Keluar
            </a>

            <a href="{{ url('laporanbarangmasuk') }}"
               class="flex w-60 items-center px-4 py-2 rounded-md transition
               {{ request()->is('laporanbarangmasuk') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i class="fas fa-file-import mr-2"></i> Laporan Barang Masuk
            </a>

            <a href="{{ url('laporanbarangkeluar') }}"
               class="flex w-60 items-center px-4 py-2 rounded-md transition
               {{ request()->is('laporanbarangkeluar') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i class="fas fa-file-export mr-2"></i> Laporan Barang Keluar
            </a>

            <a href="{{ url('logaktivitas') }}"
               class="flex w-60 items-center px-4 py-2 rounded-md transition
               {{ request()->is('logaktivitas') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i class="fas fa-history mr-2"></i> Log Aktivitas
            </a>

            <a href="{{ url('manajemenuser') }}"
               class="flex w-60 items-center px-4 py-2 rounded-md transition
               {{ request()->is('manajemenuser') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i class="fas fa-users-cog mr-2"></i> Manajemen User
            </a>
        </nav>
    </div>

    <div class="p-4">
        <a href="logout"
           class="flex w-20 h-10 items-center text-red-600 rounded-md hover:bg-gray-200 font-medium transition">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </a>
    </div>
</aside> --}}

<!-- Sidebar -->
{{-- <aside class="w-64 h-screen fixed top-0 left-0 bg-[#4A70A9] shadow-md flex flex-col justify-between">
    <div>
        <div class="p-4 text-white font-semibold">
            Inventaris Barang SDN 1 Kesumadadi
        </div>

        <nav class="mt-4 space-y-1">

            <a href="{{ url('/') }}"
               class="flex w-60 items-center px-4 py-2 rounded-md transition
               {{ request()->is('/') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i data-lucide="layout-dashboard" class="w-4 h-4 mr-2"></i>
                Dashboard
            </a>

            <a href="{{ url('databarang') }}"
               class="flex w-60 items-center px-4 py-2 rounded-md transition
               {{ request()->is('databarang') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i data-lucide="boxes" class="w-4 h-4 mr-2"></i>
                Data Barang
            </a>

            <a href="{{ url('barangmasuk') }}"
               class="flex w-60 items-center px-4 py-2 rounded-md transition
               {{ request()->is('barangmasuk') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i data-lucide="download" class="w-4 h-4 mr-2"></i>
                Barang Masuk
            </a>

            <a href="{{ url('barangkeluar') }}"
               class="flex w-60 items-center px-4 py-2 rounded-md transition
               {{ request()->is('barangkeluar') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i data-lucide="upload" class="w-4 h-4 mr-2"></i>
                Barang Keluar
            </a>

            <a href="{{ url('laporanbarangmasuk') }}"
               class="flex w-60 items-center px-4 py-2 rounded-md transition
               {{ request()->is('laporanbarangmasuk') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i data-lucide="file-input" class="w-4 h-4 mr-2"></i>
                Laporan Barang Masuk
            </a>

            <a href="{{ url('laporanbarangkeluar') }}"
               class="flex w-60 items-center px-4 py-2 rounded-md transition
               {{ request()->is('laporanbarangkeluar') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i data-lucide="file-output" class="w-4 h-4 mr-2"></i>
                Laporan Barang Keluar
            </a>

            <a href="{{ url('logaktivitas') }}"
               class="flex w-60 items-center px-4 py-2 rounded-md transition
               {{ request()->is('logaktivitas') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i data-lucide="history" class="w-4 h-4 mr-2"></i>
                Log Aktivitas
            </a>

            <a href="{{ url('manajemenuser') }}"
               class="flex w-60 items-center px-4 py-2 rounded-md transition
               {{ request()->is('manajemenuser') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i data-lucide="users" class="w-4 h-4 mr-2"></i>
                Manajemen User
            </a>

        </nav>
    </div>

    <div class="p-4">
        <a href="logout"
           class="flex w-20 h-10 items-center text-red-600 rounded-md hover:bg-gray-200 font-medium transition">
            <i data-lucide="log-out" class="w-4 h-4 mr-2"></i>
            Logout
        </a>
    </div>
</aside> --}}

{{-- <!-- Sidebar -->
<aside id="sidebar"
       class="w-64 h-screen fixed top-0 left-0 bg-[#4A70A9] shadow-md flex flex-col justify-between transition-all duration-300 overflow-hidden">

    <div>
        <!-- Header + tombol toggle -->
        <div class="p-4 text-white font-semibold flex items-center justify-between">
            <span class="sidebar-text">Inventaris Barang SDN 1 Kesumadadi</span>

            <!-- Tombol collapse -->
            <button id="toggleSidebar" class="text-white">
                <i data-lucide="panel-left-close" class="w-5 h-5"></i>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="mt-4 space-y-1">

            <a href="{{ url('/') }}"
               class="flex items-center px-4 py-2 rounded-md transition
               {{ request()->is('/') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i data-lucide="layout-dashboard" class="w-4 h-4 mr-2"></i>
                <span class="sidebar-text">Dashboard</span>
            </a>

            <a href="{{ url('databarang') }}"
               class="flex items-center px-4 py-2 rounded-md transition
               {{ request()->is('databarang') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i data-lucide="boxes" class="w-4 h-4 mr-2"></i>
                <span class="sidebar-text">Data Barang</span>
            </a>

            <a href="{{ url('barangmasuk') }}"
               class="flex items-center px-4 py-2 rounded-md transition
               {{ request()->is('barangmasuk') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i data-lucide="download" class="w-4 h-4 mr-2"></i>
                <span class="sidebar-text">Barang Masuk</span>
            </a>

            <a href="{{ url('barangkeluar') }}"
               class="flex items-center px-4 py-2 rounded-md transition
               {{ request()->is('barangkeluar') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i data-lucide="upload" class="w-4 h-4 mr-2"></i>
                <span class="sidebar-text">Barang Keluar</span>
            </a>

            <a href="{{ url('laporanbarangmasuk') }}"
               class="flex items-center px-4 py-2 rounded-md transition
               {{ request()->is('laporanbarangmasuk') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i data-lucide="file-input" class="w-4 h-4 mr-2"></i>
                <span class="sidebar-text">Laporan Barang Masuk</span>
            </a>

            <a href="{{ url('laporanbarangkeluar') }}"
               class="flex items-center px-4 py-2 rounded-md transition
               {{ request()->is('laporanbarangkeluar') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i data-lucide="file-output" class="w-4 h-4 mr-2"></i>
                <span class="sidebar-text">Laporan Barang Keluar</span>
            </a>

            <a href="{{ url('logaktivitas') }}"
               class="flex items-center px-4 py-2 rounded-md transition
               {{ request()->is('logaktivitas') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i data-lucide="history" class="w-4 h-4 mr-2"></i>
                <span class="sidebar-text">Log Aktivitas</span>
            </a>

            <a href="{{ url('manajemenuser') }}"
               class="flex items-center px-4 py-2 rounded-md transition
               {{ request()->is('manajemenuser') ? 'bg-white text-gray-900' : 'text-white hover:bg-gray-200' }}">
                <i data-lucide="users" class="w-4 h-4 mr-2"></i>
                <span class="sidebar-text">Manajemen User</span>
            </a>

        </nav>
    </div>

    <!-- Logout -->
    <div class="p-4">
        <a href="logout"
           class="flex items-center text-red-600 rounded-md hover:bg-gray-200 font-medium transition">
            <i data-lucide="log-out" class="w-4 h-4 mr-2"></i>
            <span class="sidebar-text">Logout</span>
        </a>
    </div>
</aside>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const sidebar = document.getElementById("sidebar");
    const toggleBtn = document.getElementById("toggleSidebar");
    const textItems = document.querySelectorAll(".sidebar-text");
    const main = document.getElementById("main-content");

    toggleBtn.addEventListener("click", () => {
        const isOpen = sidebar.classList.contains("w-64");

        if (isOpen) {
            // COLLAPSE
            sidebar.classList.remove("w-64");
            sidebar.classList.add("w-20");

            textItems.forEach(t => {
                t.classList.add("hidden");
            });

            main.classList.remove("ml-64");
            main.classList.add("ml-20");

            toggleBtn.innerHTML = `<i data-lucide="panel-right-open" class="w-5 h-5"></i>`;
        } else {
            // EXPAND
            sidebar.classList.remove("w-20");
            sidebar.classList.add("w-64");

            textItems.forEach(t => {
                t.classList.remove("hidden");
            });

            main.classList.remove("ml-20");
            main.classList.add("ml-64");

            toggleBtn.innerHTML = `<i data-lucide="panel-left-close" class="w-5 h-5"></i>`;
        }

        lucide.createIcons(); // render icon baru
    });

});
</script> --}}

{{-- <aside id="sidebar"
       class="w-64 h-screen fixed top-0 left-0 bg-[#4A70A9] shadow-md flex flex-col justify-between transition-all duration-300 overflow-hidden">

    <div>
        <!-- Header + tombol toggle -->
        <div class="p-4 text-white font-semibold flex items-center justify-between">
            <span class="sidebar-text">Sistem Inventaris SDN 1 Kesumadadi</span>

            <!-- Tombol collapse -->
            <button id="toggleSidebar" class="text-white">
                <i data-lucide="panel-left-close" class="w-5 h-5"></i>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="mt-4 space-y-1">

            <!-- DASHBOARD  DAN DATA BARANG (SEMUA ROLE) -->
            <a href="{{ url('/dashboard') }}"
                class="flex items-center px-4 py-2 rounded-md transition
                {{ request()->is('/')
                || request()->is('admin')
                || request()->is('kepsek')
                || request()->is('staf')
                    ? 'bg-white text-gray-900'
                    : 'text-white hover:text-gray-900 hover:bg-gray-200' }}">
                    <i data-lucide="gauge" class="icon-sidebar w-5 h-5 mr-2"></i>
                    <span class="sidebar-text">Dashboard</span>
            </a>

            <a href="{{ url('databarang') }}"
                class="flex items-center px-4 py-2 rounded-md transition
                {{ request()->is('databarang') ? 'bg-white text-gray-900' : 'text-white hover:text-gray-900 hover:bg-gray-200' }}">
                <i data-lucide="boxes" class="icon-sidebar w-5 h-5 mr-2"></i>
                <span class="sidebar-text">Data Barang</span>
            </a>

            <!-- ADMIN & STAF -->
            @if(in_array(auth()->user()->role, ['admin','staf']))

                <a href="{{ url('barangmasuk') }}"
                   class="flex items-center px-4 py-2 rounded-md transition
                   {{ request()->is('barangmasuk') ? 'bg-white text-gray-900' : 'text-white hover:text-gray-900 hover:bg-gray-200' }}">
                    <i data-lucide="download" class="icon-sidebar w-5 h-5 mr-2"></i>
                    <span class="sidebar-text">Barang Masuk</span>
                </a>

                <a href="{{ url('barangkeluar') }}"
                   class="flex items-center px-4 py-2 rounded-md transition
                   {{ request()->is('barangkeluar') ? 'bg-white text-gray-900' : 'text-white hover:text-gray-900 hover:bg-gray-200' }}">
                    <i data-lucide="upload" class="icon-sidebar w-5 h-5 mr-2"></i>
                    <span class="sidebar-text">Barang Keluar</span>
                </a>
            @endif

            <!-- ADMIN & KEPSEK -->
            @if(in_array(auth()->user()->role, ['admin','kepsek']))
                <a href="{{ url('laporan/barangmasuk') }}"
                   class="flex items-center px-4 py-2 rounded-md transition
                   {{ request()->is('laporan/barangmasuk') ? 'bg-white text-gray-900' : 'text-white hover:text-gray-900 hover:bg-gray-200' }}">
                    <i data-lucide="file-input" class="icon-sidebar w-5 h-5 mr-2"></i>
                    <span class="sidebar-text">Laporan Barang Masuk</span>
                </a>

                <a href="{{ url('laporan/barangkeluar') }}"
                   class="flex items-center px-4 py-2 rounded-md transition
                   {{ request()->is('laporan/barangkeluar') ? 'bg-white text-gray-900' : 'text-white hover:text-gray-900 hover:bg-gray-200' }}">
                    <i data-lucide="file-output" class="icon-sidebar w-5 h-5 mr-2"></i>
                    <span class="sidebar-text">Laporan Barang Keluar</span>
                </a>

                <a href="{{ url('logaktivitas') }}"
                   class="flex items-center px-4 py-2 rounded-md transition
                   {{ request()->is('logaktivitas') ? 'bg-white text-gray-900' : 'text-white hover:text-gray-900 hover:bg-gray-200' }}">
                    <i data-lucide="history" class="icon-sidebar w-5 h-5 mr-2"></i>
                    <span class="sidebar-text">Log Aktivitas</span>
                </a>
            @endif

            <!-- ADMIN ONLY  -->
            @if(auth()->user()->role === 'admin')
                <a href="{{ url('manajemenuser') }}"
                   class="flex items-center px-4 py-2 rounded-md transition
                   {{ request()->is('manajemenuser') ? 'bg-white text-gray-900' : 'text-white hover:text-gray-900 hover:bg-gray-200' }}">
                    <i data-lucide="users" class="icon-sidebar w-5 h-5 mr-2"></i>
                    <span class="sidebar-text">Manajemen User</span>
                </a>
            @endif

        </nav>
    </div>

    <!-- Logout -->
    <div class="p-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="flex items-center text-red-600 rounded-md font-medium transition hover:text-red-500">
                <i data-lucide="log-out" class="icon-sidebar w-5 h-5 mr-2"></i>
                <span class="sidebar-text">Logout</span>
            </button>
        </form>

    </div>
</aside>


<script>
document.addEventListener("DOMContentLoaded", function () {

    const sidebar = document.getElementById("sidebar");
    const toggleBtn = document.getElementById("toggleSidebar");
    const textItems = document.querySelectorAll(".sidebar-text");
    const main = document.getElementById("main-content");
    const icons = document.querySelectorAll(".icon-sidebar");
    const headerBar = document.getElementById("header-bar");

    toggleBtn.addEventListener("click", () => {
    const isOpen = sidebar.classList.contains("w-64");

    if (isOpen) {
        // COLLAPSE
        sidebar.classList.replace("w-64", "w-16");
        textItems.forEach(t => t.classList.add("hidden"));

        main.classList.replace("ml-64", "ml-16");

        // HEADER FOLLOW SIDEBAR
        headerBar.style.width = "calc(100% - 4rem)";

        toggleBtn.innerHTML = `<i data-lucide="panel-right-open" class="w-5 h-5"></i>`;
        
    } else {
        // EXPAND
        sidebar.classList.replace("w-16", "w-64");
        textItems.forEach(t => t.classList.remove("hidden"));

        main.classList.replace("ml-16", "ml-64");

        // HEADER FOLLOW SIDEBAR
        headerBar.style.width = "calc(100% - 16rem)";

        toggleBtn.innerHTML = `<i data-lucide="panel-left-close" class="w-5 h-5"></i>`;
    }

    lucide.createIcons();
});

});
</script> --}

{{--
    navigation.blade.php — Responsive Sidebar
    - Desktop (lg+): sidebar fixed di kiri, bisa collapse ke w-16
    - Mobile (<lg): sidebar tersembunyi, muncul sebagai overlay dari kiri
--}}

<aside id="sidebar"
       class="
           h-screen fixed top-0 left-0 z-50
           bg-[#4A70A9] shadow-md
           flex flex-col justify-between
           transition-all duration-300 overflow-hidden

           {{-- Mobile: mulai tersembunyi (geser ke kiri) --}}
           w-60
           -translate-x-full
           {{-- Desktop: selalu tampil, lebar 64 --}}
           lg:translate-x-0 lg:w-64
       ">

    <div>
        <!-- Header sidebar + tombol collapse (desktop) -->
        <div class="p-4 text-white font-semibold flex items-center justify-between">
            <span class="sidebar-text text-sm leading-tight">Sistem Inventaris SDN 1 Kesumadadi</span>

            {{-- Tombol collapse — hanya tampil di desktop --}}
            <button id="toggleSidebar" class="text-white hidden lg:block">
                <i data-lucide="panel-left-close" class="w-5 h-5"></i>
            </button>

            {{-- Tombol tutup sidebar — hanya tampil di mobile --}}
            <button class="text-white lg:hidden" onclick="closeSidebar()">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="mt-4 space-y-1">

            {{-- DASHBOARD DAN DATA BARANG (SEMUA ROLE) --}}
            <a href="{{ url('/dashboard') }}"
                class="flex items-center px-4 py-2 rounded-md transition
                {{ request()->is('/')
                || request()->is('admin')
                || request()->is('kepsek')
                || request()->is('staf')
                || request()->is('dashboard')
                    ? 'bg-white text-gray-900'
                    : 'text-white hover:text-gray-900 hover:bg-gray-200' }}"
                onclick="closeSidebarOnMobile()">
                <i data-lucide="gauge" class="icon-sidebar w-5 h-5 mr-2 flex-shrink-0"></i>
                <span class="sidebar-text">Dashboard</span>
            </a>

            <a href="{{ url('databarang') }}"
                class="flex items-center px-4 py-2 rounded-md transition
                {{ request()->is('databarang') ? 'bg-white text-gray-900' : 'text-white hover:text-gray-900 hover:bg-gray-200' }}"
                onclick="closeSidebarOnMobile()">
                <i data-lucide="boxes" class="icon-sidebar w-5 h-5 mr-2 flex-shrink-0"></i>
                <span class="sidebar-text">Data Barang</span>
            </a>

            {{-- ADMIN & STAF --}}
            @if(in_array(auth()->user()->role, ['admin','staf']))

                <a href="{{ url('barangmasuk') }}"
                   class="flex items-center px-4 py-2 rounded-md transition
                   {{ request()->is('barangmasuk') ? 'bg-white text-gray-900' : 'text-white hover:text-gray-900 hover:bg-gray-200' }}"
                   onclick="closeSidebarOnMobile()">
                    <i data-lucide="download" class="icon-sidebar w-5 h-5 mr-2 flex-shrink-0"></i>
                    <span class="sidebar-text">Barang Masuk</span>
                </a>

                <a href="{{ url('barangkeluar') }}"
                   class="flex items-center px-4 py-2 rounded-md transition
                   {{ request()->is('barangkeluar') ? 'bg-white text-gray-900' : 'text-white hover:text-gray-900 hover:bg-gray-200' }}"
                   onclick="closeSidebarOnMobile()">
                    <i data-lucide="upload" class="icon-sidebar w-5 h-5 mr-2 flex-shrink-0"></i>
                    <span class="sidebar-text">Barang Keluar</span>
                </a>
            @endif

            {{-- ADMIN & KEPSEK --}}
            @if(in_array(auth()->user()->role, ['admin','kepsek']))
                <a href="{{ url('laporan/barangmasuk') }}"
                   class="flex items-center px-4 py-2 rounded-md transition
                   {{ request()->is('laporan/barangmasuk') ? 'bg-white text-gray-900' : 'text-white hover:text-gray-900 hover:bg-gray-200' }}"
                   onclick="closeSidebarOnMobile()">
                    <i data-lucide="file-input" class="icon-sidebar w-5 h-5 mr-2 flex-shrink-0"></i>
                    <span class="sidebar-text">Laporan Barang Masuk</span>
                </a>

                <a href="{{ url('laporan/barangkeluar') }}"
                   class="flex items-center px-4 py-2 rounded-md transition
                   {{ request()->is('laporan/barangkeluar') ? 'bg-white text-gray-900' : 'text-white hover:text-gray-900 hover:bg-gray-200' }}"
                   onclick="closeSidebarOnMobile()">
                    <i data-lucide="file-output" class="icon-sidebar w-5 h-5 mr-2 flex-shrink-0"></i>
                    <span class="sidebar-text">Laporan Barang Keluar</span>
                </a>

                <a href="{{ url('logaktivitas') }}"
                   class="flex items-center px-4 py-2 rounded-md transition
                   {{ request()->is('logaktivitas') ? 'bg-white text-gray-900' : 'text-white hover:text-gray-900 hover:bg-gray-200' }}"
                   onclick="closeSidebarOnMobile()">
                    <i data-lucide="history" class="icon-sidebar w-5 h-5 mr-2 flex-shrink-0"></i>
                    <span class="sidebar-text">Log Aktivitas</span>
                </a>
            @endif

            {{-- ADMIN ONLY --}}
            @if(auth()->user()->role === 'admin')
                <a href="{{ url('manajemenuser') }}"
                   class="flex items-center px-4 py-2 rounded-md transition
                   {{ request()->is('manajemenuser') ? 'bg-white text-gray-900' : 'text-white hover:text-gray-900 hover:bg-gray-200' }}"
                   onclick="closeSidebarOnMobile()">
                    <i data-lucide="users" class="icon-sidebar w-5 h-5 mr-2 flex-shrink-0"></i>
                    <span class="sidebar-text">Manajemen User</span>
                </a>
            @endif

        </nav>
    </div>

    <!-- Logout -->
    <div class="p-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="flex items-center text-red-500 rounded-md font-medium transition hover:text-red-100">
                <i data-lucide="log-out" class="icon-sidebar w-5 h-5 mr-2 flex-shrink-0"></i>
                <span class="sidebar-text">Logout</span>
            </button>
        </form>
    </div>
</aside>


<script>
// =========================================================
// FUNGSI GLOBAL SIDEBAR
// =========================================================

function openSidebar() {
    const sidebar  = document.getElementById('sidebar');
    const overlay  = document.getElementById('sidebar-overlay');
    sidebar.classList.remove('-translate-x-full');
    if (overlay) overlay.classList.remove('hidden');
}

function closeSidebar() {
    const sidebar  = document.getElementById('sidebar');
    const overlay  = document.getElementById('sidebar-overlay');
    // Hanya geser keluar jika layar mobile
    if (window.innerWidth < 1024) {
        sidebar.classList.add('-translate-x-full');
        if (overlay) overlay.classList.add('hidden');
    }
}

// Tutup sidebar mobile saat link diklik
function closeSidebarOnMobile() {
    if (window.innerWidth < 1024) {
        closeSidebar();
    }
}

// =========================================================
// COLLAPSE / EXPAND — DESKTOP ONLY
// =========================================================
document.addEventListener("DOMContentLoaded", function () {

    const sidebar    = document.getElementById("sidebar");
    const toggleBtn  = document.getElementById("toggleSidebar");
    const textItems  = document.querySelectorAll(".sidebar-text");
    const main       = document.getElementById("main-content");
    const headerBar  = document.getElementById("header-bar");

    if (!toggleBtn) return; // guard jika tidak ada

    toggleBtn.addEventListener("click", () => {
        const isOpen = !sidebar.classList.contains("lg:w-16") &&
                       sidebar.classList.contains("lg:w-64");

        // Cek lebar aktual lebih mudah
        const currentWidth = sidebar.getBoundingClientRect().width;
        const collapsed    = currentWidth <= 70; // w-16 = 64px

        if (!collapsed) {
            // COLLAPSE
            sidebar.classList.remove("lg:w-64");
            sidebar.classList.add("lg:w-16");

            textItems.forEach(t => t.classList.add("hidden"));

            main.classList.remove("lg:ml-64");
            main.classList.add("lg:ml-16");

            if (headerBar) {
                headerBar.style.width = "calc(100% - 4rem)"; // 16px * 4 = 64px
            }

            toggleBtn.innerHTML = `<i data-lucide="panel-right-open" class="w-5 h-5"></i>`;

        } else {
            // EXPAND
            sidebar.classList.remove("lg:w-16");
            sidebar.classList.add("lg:w-64");

            textItems.forEach(t => t.classList.remove("hidden"));

            main.classList.remove("lg:ml-16");
            main.classList.add("lg:ml-64");

            if (headerBar) {
                headerBar.style.width = "calc(100% - 16rem)"; // 64px * 4 = 256px
            }

            toggleBtn.innerHTML = `<i data-lucide="panel-left-close" class="w-5 h-5"></i>`;
        }

        lucide.createIcons();
    });

    // Reset sidebar saat resize ke desktop
    window.addEventListener("resize", () => {
        const overlay = document.getElementById('sidebar-overlay');
        if (window.innerWidth >= 1024) {
            sidebar.classList.remove("-translate-x-full");
            if (overlay) overlay.classList.add("hidden");
        }
    });
});
</script>



