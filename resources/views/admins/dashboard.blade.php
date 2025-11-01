<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- BAGIAN UNTUK MENAMPILKAN PESAN SUKSES --}}
            @if (session('success'))
                <div class="bg-green-500/10 border border-green-500/20 text-green-700 dark:text-green-300 px-4 py-3 rounded-lg relative mb-6" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Selamat datang kembali, <span class="font-bold">{{ Auth::user()->name }}</span>!
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm flex items-center space-x-4">
                    <div class="bg-blue-500/10 dark:bg-blue-500/20 p-3 rounded-full">
                        <i class="fa-solid fa-camera-retro text-2xl text-blue-500"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Kenangan</p>
                        <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $kenanganCount }}</p>
                    </div>
                </div>

                {{-- KARTU PENGGUNA DIGANTI DENGAN TOMBOL HAPUS (DENGAN MODAL) --}}
                <div x-data="{ open: false }" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm flex items-center space-x-4">
                    <button @click="open = true" class="w-full h-full flex items-center space-x-4 text-left hover:opacity-75">
                        <div class="bg-red-500/10 dark:bg-red-500/20 p-3 rounded-full">
                            <i class="fa-solid fa-trash-can text-2xl text-red-500"></i>
                        </div>
                        <div>
                             <p class="text-lg font-bold text-red-600 dark:text-red-400">Hapus Semua Kenangan</p>
                             <p class="text-sm text-gray-500 dark:text-gray-400">Aksi ini tidak bisa dibatalkan.</p>
                        </div>
                    </button>

                    <div x-show="open" x-transition.opacity style="display: none;" class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
                        <div @click.away="open = false" class="bg-white dark:bg-gray-800 rounded-lg shadow-xl p-6 w-full max-w-md">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">Konfirmasi Penghapusan</h3>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Apakah Anda benar-benar yakin ingin menghapus SEMUA data kenangan? Aksi ini permanen.</p>
                            <div class="mt-6 flex justify-end space-x-4">
                                <button @click="open = false" type="button" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 dark:bg-gray-600 dark:text-gray-300 rounded-md hover:bg-gray-300">
                                    Batal
                                </button>
                                <form action="{{ route('kenangan.destroyAll') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700">
                                        Ya, Hapus Semua
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- TOMBOL TAMBAH DIBERI LINK --}}
                <a href="{{ route('kenangan.create') }}" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm flex items-center space-x-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                    <div class="bg-primary/10 dark:bg-primary/20 p-3 rounded-full">
                        <i class="fa-solid fa-plus text-2xl text-primary"></i>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-primary dark:text-secondary">Tambah Kenangan Baru</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Buat cerita baru untuk keluarga.</p>
                    </div>
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Kenangan Terbaru</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Judul</th>
                                    <th scope="col" class="px-6 py-3">Keluarga</th>
                                    <th scope="col" class="px-6 py-3">Tanggal</th>
                                    <th scope="col" class="px-6 py-3 text-right">Aksi</th> {{-- KOLOM BARU --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($recentKenangans as $kenangan)
                                <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $kenangan->judul }}</th>
                                    <td class="px-6 py-4">{{ $kenangan->keluarga }}</td>
                                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($kenangan->tanggal)->translatedFormat('d M Y') }}</td>
                                    <td class="px-6 py-4 text-right"> {{-- TOMBOL EDIT BARU --}}
                                        <a href="{{ route('kenangan.edit', $kenangan) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    </td>
                                </tr>
                                @empty
                                <tr class="bg-white dark:bg-gray-800">
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">Belum ada data kenangan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
