@extends('layouts.app')

@section('tittle', "Manajemen User")

@section('content')
<section class="space-y-6 p-4 md:p-6">

    <!-- HEADER -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between bg-white p-4 rounded-lg shadow gap-4">

        <!-- JUDUL -->
        <h1 class="text-2xl md:text-3xl font-semibold flex items-center gap-2">
            <i data-lucide="users" class="w-6 h-6 md:w-7 md:h-7"></i>
            Daftar Pengguna
        </h1>

        <!-- STATISTIK -->
        <div class="flex items-center gap-4 sm:gap-10 flex-wrap">

            <!-- ADMIN -->
            <div class="flex items-center gap-3">

                <div class="w-16 h-16 bg-blue-600 rounded
                            flex flex-col items-center justify-center
                            text-white flex-shrink-0">

                    <span class="text-base font-bold">
                        {{ $totalAdmin }}
                    </span>

                    <i data-lucide="user-cog" class="w-4 h-4 opacity-80"></i>

                </div>

                <p class="text-sm font-medium whitespace-nowrap">
                    Total Admin
                </p>

            </div>

            <!-- STAFF -->
            <div class="flex items-center gap-3">

                <div class="w-16 h-16 bg-green-600 rounded
                            flex flex-col items-center justify-center
                            text-white flex-shrink-0">

                    <span class="text-base font-bold">
                        {{ $totalStaff }}
                    </span>

                    <i data-lucide="user" class="w-4 h-4 opacity-80"></i>

                </div>

                <p class="text-sm font-medium whitespace-nowrap">
                    Total Staff
                </p>

            </div>

        </div>

    </div>

    <!-- CARD TABLE -->
    <div class="bg-white p-4 md:p-6 rounded-xl shadow-md">

        <!-- TABLE -->
        <div class="overflow-x-auto rounded-lg">

            <table class="min-w-full text-sm text-left bg-gray-300 rounded-lg shadow border-collapse">

                <!-- HEADER -->
                <thead class="bg-gray-500 text-white whitespace-nowrap">

                    <tr>

                        <th class="border border-slate-300 bg-gray-500 px-3 py-3 text-left text-white">
                            <div class="flex items-center gap-2">
                                No
                            </div>
                        </th>

                        <th class="border border-slate-300 bg-gray-500 px-3 py-3 text-left text-white">
                            <div class="flex items-center gap-2">
                                <i data-lucide="user" class="w-4 h-4"></i>
                                Nama Lengkap
                            </div>
                        </th>

                        <th class="border border-slate-300 bg-gray-500 px-3 py-3 text-left text-white">
                            <div class="flex items-center gap-2">
                                <i data-lucide="at-sign" class="w-4 h-4"></i>
                                Username
                            </div>
                        </th>

                        <th class="border border-slate-300 bg-gray-500 px-3 py-3 text-left text-white">
                            <div class="flex items-center gap-2">
                                <i data-lucide="shield" class="w-4 h-4"></i>
                                Role
                            </div>
                        </th>

                        <th class="border border-slate-300 bg-gray-500 px-3 py-3 text-left text-white">
                            <div class="flex items-center gap-2">
                                <i data-lucide="calendar" class="w-4 h-4"></i>
                                Tanggal Ditambahkan
                            </div>
                        </th>

                        <th class="border border-slate-300 bg-gray-500 px-3 py-3 text-left text-white">
                            <div class="flex items-center justify-center gap-2">
                                <i data-lucide="settings" class="w-4 h-4"></i>
                                Aksi
                            </div>
                        </th>

                    </tr>

                </thead>

                <!-- BODY -->
                <tbody class="bg-white text-gray-900">

                    @forelse($users as $index => $user)

                    <tr class="border-b border-gray-400 whitespace-nowrap">

                        <td class="border border-slate-300 bg-slate-50 px-3 py-3">
                            {{ $index + 1 }}
                        </td>

                        <td class="border border-slate-300 bg-slate-50 px-3 py-3">
                            {{ $user->name }}
                        </td>

                        <td class="border border-slate-300 bg-slate-50 px-3 py-3">
                            {{ $user->username }}
                        </td>

                        <td class="border border-slate-300 bg-slate-50 px-3 py-3 capitalize">
                            {{ $user->role }}
                        </td>

                        <td class="border border-slate-300 bg-slate-50 px-3 py-3">
                            {{ $user->created_at->format('d-m-Y') }}
                        </td>

                        <td class="border border-slate-300 bg-slate-50 px-3 py-3">

                            <div class="flex justify-center gap-3">

                                @if($user->role !== 'admin')

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

                                @else

                                    <span class="text-gray-400 text-sm">
                                        Tidak dapat diubah
                                    </span>

                                @endif

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6"
                            class="text-center py-4 text-gray-500">

                            Belum ada data user

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <!-- BUTTON -->
        <div class="flex justify-end mt-4">

            <button onclick="openModal()"
                class="bg-white border-2 border-[#4A70A9] text-[#4A70A9] font-medium
                       px-4 py-2 rounded-full shadow
                       hover:bg-[#4A70A9] hover:text-white
                       flex items-center gap-2 transition text-sm md:text-base">

                <i data-lucide="user-plus" class="w-5 h-5"></i>

                Tambah User

            </button>

        </div>

    </div>

    <!-- MODAL TAMBAH USER -->
    <div id="modalUser"
        class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4">

        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-4 md:p-6">

            <h2 class="text-lg md:text-xl font-semibold mb-4">
                Tambah User
            </h2>

            <form action="{{ route('user.store') }}" method="POST">
                @csrf

                <div class="space-y-3">

                    <input type="text"
                        name="name"
                        placeholder="Nama Lengkap"
                        class="border p-2 rounded w-full text-sm md:text-base"
                        required>

                    <input type="text"
                        name="username"
                        placeholder="Username"
                        class="border p-2 rounded w-full text-sm md:text-base"
                        required>

                    <input type="email"
                        name="email"
                        placeholder="Email Gmail"
                        class="border p-2 rounded w-full text-sm md:text-base"
                        required>

                    <select name="role"
                        class="border p-2 rounded w-full text-sm md:text-base">

                        <option value="kepsek">Kepala Sekolah</option>
                        <option value="staf">Staf</option>

                    </select>

                    <input type="password"
                        name="password"
                        placeholder="Password"
                        class="border p-2 rounded w-full text-sm md:text-base"
                        required>

                </div>

                <div class="flex flex-col sm:flex-row justify-end gap-2 mt-4">

                    <button type="button"
                        onclick="closeModal()"
                        class="px-4 py-2 bg-gray-400 text-white rounded w-full sm:w-auto">

                        Batal

                    </button>

                    <button type="submit"
                        class="px-4 py-2 bg-[#4A70A9] text-white rounded w-full sm:w-auto">

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- MODAL EDIT USER -->
    <div id="editModal"
        class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4">

        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-4 md:p-6">

            <h2 class="text-lg md:text-xl font-semibold mb-4">
                Edit User
            </h2>

            <form id="editForm" method="POST">
                @csrf

                <div class="space-y-3">

                    <input type="text"
                        id="edit_name"
                        name="name"
                        class="border p-2 rounded w-full text-sm md:text-base"
                        required>

                    <input type="text"
                        id="edit_username"
                        name="username"
                        class="border p-2 rounded w-full text-sm md:text-base"
                        required>

                    <input type="email"
                        id="edit_email"
                        name="email"
                        class="border p-2 rounded w-full text-sm md:text-base"
                        required>

                    <select id="edit_role"
                        name="role"
                        class="border p-2 rounded w-full text-sm md:text-base">

                        <option value="kepsek">Kepsek</option>
                        <option value="staf">Staf</option>

                    </select>
                    
                    <input type="password"
                    id="edit_password"
                    name="password"
                    placeholder="Password baru (kosongkan jika tidak diubah)"
                    class="border p-2 rounded w-full text-sm md:text-base">

                </div>

                <div class="flex flex-col sm:flex-row justify-end gap-2 mt-4">

                    <button type="button"
                        onclick="closeEditModal()"
                        class="px-4 py-2 bg-gray-400 text-white rounded w-full sm:w-auto">

                        Batal

                    </button>

                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded w-full sm:w-auto">

                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- MODAL DELETE -->
    <div id="deleteModal"
        class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4">

        <div class="bg-white p-6 rounded-lg shadow-lg text-center w-full max-w-sm">

            <h2 class="text-lg font-semibold text-red-600 mb-2">
                Hapus User
            </h2>

            <p class="text-gray-700 mb-4 text-sm md:text-base">
                Yakin ingin menghapus user ini?
            </p>

            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')

                <div class="flex flex-col sm:flex-row justify-center gap-2">

                    <button type="button"
                        onclick="closeDeleteModal()"
                        class="px-4 py-2 bg-gray-400 text-white rounded w-full sm:w-auto">

                        Batal

                    </button>

                    <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded w-full sm:w-auto">

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
        document.getElementById('editModal').classList.remove('flex');
    }

    function openDeleteModal(id) {

        document.getElementById('deleteForm').action = '/user/' + id;

        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteModal').classList.add('flex');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        document.getElementById('deleteModal').classList.remove('flex');
    }
</script>

@endsection