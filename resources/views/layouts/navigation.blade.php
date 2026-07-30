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

// FUNGSI GLOBAL SIDEBAR

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

// COLLAPSE / EXPAND — DESKTOP ONLY
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



