{{-- @extends('layouts.app')

@section('tittle', "Manajemen User")

@section('content')
    <!-- Dashboard Content -->
    <section class="space-y-6 ml-64 mt-16 p-6">
        <!-- Top Header Section -->
        <div class="flex items-center justify-normal bg-gray-200 p-3 rounded-lg shadow">
            <!-- Kiri: Judul Dashboard -->
            <h1 class="text-3xl font-semibold">Daftar Pengguna</h1>

            <!-- Kanan: Dua kotak sejajar -->
            <div class="flex items-center space-x-40">
                <!-- Data Barang Masuk -->
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 bg-gray-600 rounded mb-2"></div>
                    <p class="text-lg font-medium">Total Administrator</p>
                </div>

                <!-- Data Barang Keluar -->
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 bg-gray-600 rounded mb-2"></div>
                    <p class="text-lg font-medium">Total Staff</p>
                </div>
            </div>
        </div>

        <!-- Card Background -->
        <div class="bg-[#E5E5E5] p-6 rounded-xl shadow-md mt-6">

            <!-- Table -->
            <div class="overflow-x-auto mt-4 rounded-lg">
                <table class="w-full text-sm text-left bg-gray-300 rounded-lg shadow">
                    <thead class="bg-gray-500 text-white">
                        <tr>
                            <th class="py-2 px-3">No</th>
                            <th class="py-2 px-3">Nama Lengkap</th>
                            <th class="py-2 px-3">Username</th>
                            <th class="py-2 px-3">Peran</th>
                            <th class="py-2 px-3">Tanggal Ditambahkan</th>
                            <th class="py-2 px-3 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white text-gray-900">
                        <tr class="border-b border-gray-400">
                            <td class="py-2 px-3">1</td>
                            <td class="py-2 px-3">Abi</td>
                            <td class="py-2 px-3">Abi123</td>
                            <td class="py-2 px-3">Super Admin</td>
                            <td class="py-2 px-3">01-01-2025</td>
                            <td class="py-2 px-3 flex justify-center gap-3">
                                <button class="text-[#4A70A9] hover:text-[#8FABD4]"><i class="fas fa-pen"></i></button>
                                <button class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>

                        <tr class="border-b border-gray-400">
                            <td class="py-2 px-3">2</td>
                            <td class="py-2 px-3">Umi</td>
                            <td class="py-2 px-3">Umi123</td>
                            <td class="py-2 px-3">Admin1</td>
                            <td class="py-2 px-3">01-01-2025</td>
                            <td class="py-2 px-3 flex justify-center gap-3">
                                <button class="text-[#4A70A9] hover:text-[#8FABD4]"><i class="fas fa-pen"></i></button>
                                <button class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>

                        <tr>
                            <td class="py-2 px-3">3</td>
                            <td class="py-2 px-3">Bika</td>
                            <td class="py-2 px-3">Bika123</td>
                            <td class="py-2 px-3">Admin2</td>
                            <td class="py-2 px-3">01-01-2025</td>
                            <td class="py-2 px-3 flex justify-center gap-3">
                                <button class="text-[#4A70A9] hover:text-[#8FABD4]"><i class="fas fa-pen"></i></button>
                                <button class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Tombol Tambah User -->
            <div class="flex justify-end mt-4">
                <button class="bg-white text-[#4A70A9] font-medium px-4 py-2 rounded-full shadow hover:bg-[#8FABD4] hover:text-white flex items-center gap-2 transition">
                    <i class="fas fa-plus"></i> User
                </button>
            </div>
        </div>


@endsection --}}

@extends('layouts.app')

@section('tittle', "Manajemen User")

@section('content')
    <!-- Dashboard Content -->
    <section class="space-y-6 mt-16 p-6">

        <!-- Top Header Section -->
        <div class="flex items-center justify-between bg-gray-200 p-3 rounded-lg shadow">

            <!-- Judul -->
            <h1 class="text-3xl font-semibold flex items-center gap-2">
                <i data-lucide="users" class="w-7 h-7"></i>
                Daftar Pengguna
            </h1>

            <!-- Statistik Pengguna -->
            <div class="flex items-center gap-16 mr-20">

                <!-- Administrator -->
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-blue-600 rounded
                                flex flex-col items-center justify-center text-white">
                        <span class="text-lg font-bold">{{ $totalAdmin }}</span>
                        <i data-lucide="user-cog" class="w-4 h-4 opacity-80"></i>
                    </div>
                    <p class="text-base font-medium whitespace-nowrap">
                        Total Admin
                    </p>
                </div>

                <!-- Staff -->
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 bg-green-600 rounded
                                flex flex-col items-center justify-center text-white">
                        <span class="text-lg font-bold">{{ $totalStaff }}</span>
                        <i data-lucide="user" class="w-4 h-4 opacity-80"></i>
                    </div>
                    <p class="text-base font-medium whitespace-nowrap">
                        Total Staff
                    </p>
                </div>

            </div>
        </div>

        <!-- Card Background -->
        <div class="bg-[#E5E5E5] p-6 rounded-xl shadow-md mt-6">

            <!-- Table -->
            <div class="overflow-x-auto mt-4 rounded-lg">
                <table class="w-full text-sm text-left bg-gray-300 rounded-lg shadow">

                    <!-- HEADER TABEL DENGAN ICON -->
                    <thead class="bg-gray-500 text-white">
                        <tr>

                            <th class="py-2 px-3">
                                <div class="flex items-center gap-2"> No </div>
                            </th>

                            <th class="py-2 px-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="user" class="w-4 h-4"></i> Nama Lengkap
                                </div>
                            </th>

                            <th class="py-2 px-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="at-sign" class="w-4 h-4"></i> Username
                                </div>
                            </th>

                            <th class="py-2 px-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="shield" class="w-4 h-4"></i> Role
                                </div>
                            </th>

                            <th class="py-2 px-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="calendar" class="w-4 h-4"></i> Tanggal Ditambahkan
                                </div>
                            </th>

                            <th class="py-2 px-3 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <i data-lucide="settings" class="w-4 h-4"></i> Aksi
                                </div>
                            </th>

                        </tr>
                    </thead>

                    <!-- BODY -->
                    <tbody class="bg-white text-gray-900">
                        @forelse($users as $index => $user)
                            <tr class="border-b border-gray-400">
                                <td class="py-2 px-3">{{ $index + 1 }}</td>
                                <td class="py-2 px-3">{{ $user->name }}</td>
                                <td class="py-2 px-3">{{ $user->username }}</td>
                                <td class="py-2 px-3 capitalize">{{ $user->role }}</td>
                                <td class="py-2 px-3">
                                    {{ $user->created_at->format('d-m-Y') }}
                                </td>

                                {{-- <td class="py-2 px-3 flex justify-center gap-3">
                                    <button class="text-blue-600 hover:text-blue-800">
                                        <i data-lucide="edit" class="w-5 h-5"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-800">
                                        <i data-lucide="trash-2" class="w-5 h-5"></i>
                                    </button>
                                </td> --}}
                                <td class="py-2 px-3 flex justify-center gap-3">

                                    <!-- EDIT -->
                                    <button onclick="openEditModal(
                                        '{{ $user->id }}',
                                        '{{ $user->name }}',
                                        '{{ $user->username }}',
                                        '{{ $user->email }}',
                                        '{{ $user->role }}'
                                    )"
                                    class="text-blue-600 hover:text-blue-800">
                                        <i data-lucide="edit" class="w-5 h-5"></i>
                                    </button>

                                    <!-- DELETE -->
                                    <button onclick="openDeleteModal('{{ $user->id }}')"
                                        class="text-red-600 hover:text-red-800">
                                        <i data-lucide="trash-2" class="w-5 h-5"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-gray-500">
                                    Belum ada data user
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <div class="flex justify-end mt-4">
                <button onclick="openModal()"
                    class="bg-white text-[#4A70A9] font-medium px-4 py-2 rounded-full shadow hover:bg-[#8FABD4] hover:text-white flex items-center gap-2 transition">
                    <i data-lucide="user-plus" class="w-5 h-5"></i>
                    Tambah User
                </button>
            </div>
        </div>

        <!-- MODAL TAMBAH USER -->
        <div id="modalUser" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">

            <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">

                <h2 class="text-xl font-semibold mb-4">Tambah User</h2>

                <form action="{{ route('user.store') }}" method="POST">
                    @csrf

                    <div class="space-y-3">

                        <input type="text" name="name" placeholder="Nama Lengkap"
                            class="border p-2 rounded w-full" required>

                        <input type="text" name="username" placeholder="Username"
                            class="border p-2 rounded w-full" required>

                        <input type="email" name="email" placeholder="Email Gmail"
                            class="border p-2 rounded w-full" required>

                        <select name="role" class="border p-2 rounded w-full">
                            <option value="admin">Admin</option>
                            <option value="kepsek">Kepala Sekolah</option>
                            <option value="staf">Staf</option>
                        </select>

                        <input type="password" name="password" placeholder="Password"
                            class="border p-2 rounded w-full" required>

                    </div>

                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" onclick="closeModal()"
                            class="px-4 py-2 bg-gray-400 text-white rounded">
                            Batal
                        </button>

                        <button type="submit"
                            class="px-4 py-2 bg-[#4A70A9] text-white rounded">
                            Simpan
                        </button>
                    </div>

                </form>

            </div>
        </div>

        <!-- MODAL EDIT USER -->
        <div id="editModal"
            class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">

            <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">

                <h2 class="text-xl font-semibold mb-4">Edit User</h2>

                <form id="editForm" method="POST">
                    @csrf

                    <div class="space-y-3">

                        <input type="text" id="edit_name" name="name"
                            class="border p-2 rounded w-full" required>

                        <input type="text" id="edit_username" name="username"
                            class="border p-2 rounded w-full" required>

                        <input type="email" id="edit_email" name="email"
                            class="border p-2 rounded w-full" required>

                        <select id="edit_role" name="role"
                            class="border p-2 rounded w-full">
                            <option value="admin">Admin</option>
                            <option value="kepsek">Kepsek</option>
                            <option value="staf">Staf</option>
                        </select>

                    </div>

                    <div class="flex justify-end gap-2 mt-4">
                        <button type="button" onclick="closeEditModal()"
                            class="px-4 py-2 bg-gray-400 text-white rounded">
                            Batal
                        </button>

                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded">
                            Update
                        </button>
                    </div>

                </form>

            </div>
        </div>

        <!-- MODAL DELETE -->
        <div id="deleteModal"
            class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">

            <div class="bg-white p-6 rounded-lg shadow-lg text-center w-80">

                <h2 class="text-lg font-semibold text-red-600 mb-2">Hapus User</h2>
                <p class="text-gray-700 mb-4">Yakin ingin menghapus user ini?</p>

                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="flex justify-center gap-2">
                        <button type="button" onclick="closeDeleteModal()"
                            class="px-4 py-2 bg-gray-400 text-white rounded">
                            Batal
                        </button>

                        <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded">
                            Hapus
                        </button>
                    </div>
                </form>

            </div>
        </div>

        <script>
        function openModal() {
            document.getElementById('modalUser').classList.remove('hidden');
            document.getElementById('modalUser').classList.add('flex');
        }

        function closeModal() {
            document.getElementById('modalUser').classList.add('hidden');
            document.getElementById('modalUser').classList.remove('flex');
        }

        function closePopup(id) {
            document.getElementById(id).style.display = 'none';
        }

        // auto close 3 detik
        // setTimeout(() => {
        //     let success = document.getElementById('successPopup');
        //     let error = document.getElementById('errorPopup');

        //     if (success) success.style.display = 'none';
        //     if (error) error.style.display = 'none';
        // }, 3000);

        // ===== EDIT MODAL EDIT & DELET =====
        function openEditModal(id, name, username, email, role) {
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_username').value = username;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_role').value = role;

            document.getElementById('editForm').action = '/user/update/' + id;

            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        // ===== DELETE MODAL =====
        function openDeleteModal(id) {
            document.getElementById('deleteForm').action = '/user/' + id;

            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        console.log('/user/' + id);
        </script>

@endsection

