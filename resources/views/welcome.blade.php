@extends('layouts.masters.master')

@section('title', 'Profil Keluarga Kami')

@section('content')


    {{-- 1. BAGIAN CAROUSEL (HERO) --}}
    <div x-data="{ activeSlide: 1, totalSlides: 3 }" class="relative w-full overflow-hidden shadow-lg">
        <div x-show="activeSlide === 1" x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-1000" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute inset-0">
            <img src="https://source.unsplash.com/random/1600x600?family,happy" class="w-full h-72 md:h-96 object-cover bg-gray-300 dark:bg-gray-700" alt="Foto Keluarga 1">
            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                <h2 class="text-4xl md:text-6xl font-bold text-white tracking-wider">Keluarga Kami</h2>
            </div>
        </div>
        {{-- Anda bisa tambahkan slide 2 dan 3 di sini jika mau --}}
        <button @click="activeSlide = (activeSlide === 1) ? totalSlides : activeSlide - 1" class="absolute left-0 top-1/2 -translate-y-1/2 bg-white/30 dark:bg-black/30 p-2 rounded-full ml-2 text-white dark:text-gray-300 hover:bg-white/50 dark:hover:bg-black/50 z-10">
            &larr;
        </button>
        <button @click="activeSlide = (activeSlide % totalSlides) + 1" class="absolute right-0 top-1/2 -translate-y-1/2 bg-white/30 dark:bg-black/30 p-2 rounded-full mr-2 text-white dark:text-gray-300 hover:bg-white/50 dark:hover:bg-black/50 z-10">
            &rarr;
        </button>
        <div class="h-72 md:h-96"></div>
    </div>

    {{-- 2. BAGIAN CERITA KAMI (ABOUT US) --}}
    <div class="py-16 bg-white dark:bg-gray-800 fade-in-section">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="px-6 md:px-0">
                <h2 class="text-3xl font-bold text-primary dark:text-secondary mb-4">Cerita Keluarga Kami</h2>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                    Selamat datang di website profil keluarga kami! Kami membuat website ini sebagai album digital untuk menyimpan kenangan, berbagi cerita, dan tetap terhubung satu sama lain.
                </p>
            </div>
            <div>
                <img src="https://source.unsplash.com/random/600x400?family,home" class="rounded-lg shadow-xl w-full bg-gray-300 dark:bg-gray-700" alt="Rumah Keluarga">
            </div>
        </div>
    </div>

    {{-- 3. BAGIAN KARTU ANGGOTA KELUARGA --}}
    <div class="py-16 bg-bg-gray-custom dark:bg-gray-900 fade-in-section">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-primary dark:text-white mb-10">Kenali Kami</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl fade-in-section">
                    <img src="https://source.unsplash.com/random/400x400?father" class="w-full h-56 object-cover bg-gray-300 dark:bg-gray-700" alt="Ayah">
                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">Ayah</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Kepala Keluarga</p>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl fade-in-section">
                    <img src="https://source.unsplash.com/random/400x400?mother" class="w-full h-56 object-cover bg-gray-300 dark:bg-gray-700" alt="Ibu">
                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">Ibu</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Manajer Rumah Tangga</p>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl fade-in-section">
                    <img src="https://source.unsplash.com/random/400x400?coder,man" class="w-full h-56 object-cover bg-gray-300 dark:bg-gray-700" alt="Haikal">
                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">Haikal</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">The Coder 💻</p>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl fade-in-section">
                    <img src="https://source.unsplash.com/random/400x400?child" class="w-full h-56 object-cover bg-gray-300 dark:bg-gray-700" alt="Adik">
                    <div class="p-6 text-center">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">Adik</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Si Paling Ceria</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- 4. BAGIAN ALBUM KENANGAN (AUTO-SCROLLING MARQUEE) --}}
    <div class="py-16 bg-white dark:bg-gray-800 fade-in-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-primary dark:text-white mb-10">
                Album Kenangan
            </h2>
            <div
                x-data="{}"
                class="w-full overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-128px),transparent_100%)]"
            >
                <div class="flex w-max space-x-6 animate-scroll hover:[animation-play-state:paused]">

                    {{-- Loop Pertama (Konten Asli) --}}
                    @foreach ($kenangans as $kenangan)
                    <div class="flex-shrink-0 w-72 bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                        <img src="https://source.unsplash.com/random/400x250?{{ urlencode($kenangan->keluarga) }}"
                             class="w-full h-40 object-cover bg-gray-300 dark:bg-gray-700"
                             alt="{{ $kenangan->judul }}">
                        <div class="p-5">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($kenangan->tanggal)->translatedFormat('d F Y') }}
                            </p>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mt-1 truncate">
                                {{ $kenangan->judul }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 mt-2 text-sm h-16 overflow-hidden">
                                {{ $kenangan->keterangan }}
                            </p>
                        </div>
                    </div>
                    @endforeach

                    {{-- Loop Kedua (Duplikat untuk efek seamless) --}}
                    @foreach ($kenangans as $kenangan)
                    <div class="flex-shrink-0 w-72 bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl" aria-hidden="true">
                        <img src="https://source.unsplash.com/random/400x250?{{ urlencode($kenangan->keluarga) }}"
                             class="w-full h-40 object-cover bg-gray-300 dark:bg-gray-700"
                             alt="{{ $kenangan->judul }}">
                        <div class="p-5">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($kenangan->tanggal)->translatedFormat('d F Y') }}
                            </p>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mt-1 truncate">
                                {{ $kenangan->judul }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 mt-2 text-sm h-16 overflow-hidden">
                                {{ $kenangan->keterangan }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
{{-- Tidak perlu script tambahan di sini karena sudah ada di master --}}
@endpush
