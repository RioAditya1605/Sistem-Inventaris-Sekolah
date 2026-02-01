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

<aside id="sidebar"
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

            {{-- DASHBOARD (SEMUA ROLE) --}}
            <a href="{{ url('/dashboard') }}"
                class="flex items-center px-4 py-2 rounded-md transition
                {{ request()->is('/')
                || request()->is('admin')
                || request()->is('kepsek')
                || request()->is('staf')
                    ? 'bg-white text-gray-900'
                    : 'text-white hover:text-gray-900 hover:bg-gray-200' }}">
                    <i data-lucide="layout-dashboard" class="icon-sidebar w-5 h-5 mr-2"></i>
                    <span class="sidebar-text">Dashboard</span>
            </a>

            {{-- ADMIN & STAF --}}
            @if(in_array(auth()->user()->role, ['admin','staf']))
                <a href="{{ url('databarang') }}"
                   class="flex items-center px-4 py-2 rounded-md transition
                   {{ request()->is('databarang') ? 'bg-white text-gray-900' : 'text-white hover:text-gray-900 hover:bg-gray-200' }}">
                    <i data-lucide="boxes" class="icon-sidebar w-5 h-5 mr-2"></i>
                    <span class="sidebar-text">Data Barang</span>
                </a>

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

            {{-- ADMIN & KEPSEK --}}
            @if(in_array(auth()->user()->role, ['admin','kepsek']))
                <a href="{{ url('laporanbarangmasuk') }}"
                   class="flex items-center px-4 py-2 rounded-md transition
                   {{ request()->is('laporanbarangmasuk') ? 'bg-white text-gray-900' : 'text-white hover:text-gray-900 hover:bg-gray-200' }}">
                    <i data-lucide="file-input" class="icon-sidebar w-5 h-5 mr-2"></i>
                    <span class="sidebar-text">Laporan Barang Masuk</span>
                </a>

                <a href="{{ url('laporanbarangkeluar') }}"
                   class="flex items-center px-4 py-2 rounded-md transition
                   {{ request()->is('laporanbarangkeluar') ? 'bg-white text-gray-900' : 'text-white hover:text-gray-900 hover:bg-gray-200' }}">
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

            {{-- ADMIN ONLY --}}
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



    // toggleBtn.addEventListener("click", () => {
    //     const isOpen = sidebar.classList.contains("w-64");

    //     if (isOpen) {
    //         // COLLAPSE
    //         sidebar.classList.replace("w-64", "w-16");

    //         textItems.forEach(t => t.classList.add("hidden"));
    //         main.classList.replace("ml-64", "ml-16");

    //         toggleBtn.innerHTML = `<i data-lucide="panel-right-open" class="w-5 h-5"></i>`;
            
    //     } else {
    //         // EXPAND
    //         sidebar.classList.replace("w-16", "w-64");

    //         textItems.forEach(t => t.classList.remove("hidden"));
    //         main.classList.replace("ml-16", "ml-64");

    //         toggleBtn.innerHTML = `<i data-lucide="panel-left-close" class="w-5 h-5"></i>`;
    //     }

    //     // Pastikan semua icon tetap w-5 h-5
    //     icons.forEach(icon => {
    //         icon.classList.remove("w-4","h-4");
    //         icon.classList.add("w-5","h-5");
    //     });

    //     lucide.createIcons(); // render icon baru
    // });
});
</script>


