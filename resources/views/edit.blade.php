<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edits</title>
    <link href="{{ asset('assets/output.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
               <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="w-full">
        <!--  NAVBAR -->
        <nav class="sticky top-0 z-50 bg-white shadow-sm">
            <div class="container mx-auto flex justify-between items-center py-5 px-4 lg:px-14">

                <!-- Logo -->
                <a href="{{ route('halaman.index') }}" class="flex items-center gap-2" onclick="return false;">
          <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-8 lg:w-10 rounded-full">
                    <p class="text-lg lg:text-xl font-bold" href="{{   route('halaman.index') }}">IVSS</p>
                </a>

                <!-- Mobile menu toggle -->
                <button id="menu-toggle" class="lg:hidden text-primary text-2xl focus:outline-none">☰</button>

                <!-- Menu -->
                <ul id="menu" class="hidden lg:flex items-center gap-10 font-medium text-base">
                    <li><a href="{{route('halaman.admin') }}" class="text-primary hover:text-gray-600">Beranda</a></li>


                    <li><a href="{{route('halaman.news') }}" class="hover:text-primary">News</a></li>
                    <li><a href="{{route('halaman.research') }}" class="hover:text-primary">Research</a></li>
                    <li><a href="{{route('halaman.documents') }}" class="hover:text-primary">Dokumentasi</a></li>
                </ul>

                <!-- Search + Login -->
                <div class="hidden lg:flex items-center gap-3">
                    <input type="text" placeholder="Cari berita..."
                        class="border border-slate-300 rounded-full px-4 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-primary">
                    @auth
                    {{-- Jika user sudah login --}}

                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('halaman.admin') }}" class="bg-primary px-8 py-2 rounded-full text-white font-semibold">
                            Admin Panel
                        </a>
                    @else
                        <span class="text-primary font-semibold">
                            {{ Auth::user()->username }}
                        </span>
                    @endif

                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 px-6 py-2 rounded-full text-white font-semibold ml-4">
                            Logout
                        </button>
                    </form>
                @else
                    {{-- Jika user BELUM login --}}
                    <a href="{{ route('login') }}" class="bg-primary px-8 py-2 rounded-full text-white font-semibold">
                        Masuk
                    </a>

                    <a href="{{ route('register') }}" class="bg-gray-300 px-8 py-2 rounded-full text-black font-semibold ml-2">
                        Daftar
                    </a>
                @endauth

                </div>

            </div>
        </nav>

        <div class="h-16"></div>

        </nav>

    <div class="w-full max-w-2xl mx-auto mt-20 bg-white shadow-md rounded-lg p-8">

        <h1 class="text-2xl font-bold mb-6">Edit Content</h1>

<form action="{{ route('halaman.update', ['id' => $data->id, 'type' => $type]) }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')


    <h1 class="text-2xl font-bold mb-6">Edit {{ ucfirst($type) }}</h1>

    <label class="block mt-4 font-medium">Category</label>
    <select name="type" class="border rounded-md px-3 py-2 w-full">
        <option value="news" {{ $type=='news' ? 'selected' : '' }}>News</option>
        <option value="research" {{ $type=='research' ? 'selected' : '' }}>Research</option>
        <option value="documents" {{ $type=='documents' ? 'selected' : '' }}>Documentation</option>
    </select>

    <label class="block mt-4 font-medium">Image</label>
    <input type="file" name="image" class="border rounded-md px-3 py-2 w-full">

    <img src="{{ asset('storage/'.$data->image) }}" class="w-40 mt-3 rounded-lg">

    <label class="block mt-4 font-medium">Title</label>
    <input type="text" name="title" value="{{ $data->title }}"
           class="border rounded-md px-3 py-2 w-full">

    <label class="block mt-4 font-medium">Description</label>
    <textarea name="description" class="border rounded-md px-3 py-2 w-full"
              rows="4">{{ $data->description }}</textarea>

    <label class="block mt-4 font-medium">Date</label>
    <input type="date" name="date" value="{{ $data->date }}"
           class="border rounded-md px-3 py-2 w-full">
    <button type="submit" class="bg-primary text-white p-3 mt-6 rounded-lg">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 14l7-7 7 7-7z" />
            </svg>
            <span class="ml-2">Update</span>
        </div>
    </button>
</form>


<div>

        <!-- SCRIPT -->
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const menuToggle = document.getElementById("menu-toggle");
                const menu = document.getElementById("menu");
                const dropdownBtns = document.querySelectorAll(".dropdown-btn");

                // Toggle mobile menu
                menuToggle.addEventListener("click", () => {
                    menu.classList.toggle("hidden");
                });

                // Dropdown click toggle (desktop + mobile)
                dropdownBtns.forEach(btn => {
                    btn.addEventListener("click", (e) => {
                        e.stopPropagation();
                        const dropdown = btn.nextElementSibling;
                        dropdown.classList.toggle("hidden");

                        // Close other dropdowns
                        dropdownBtns.forEach(otherBtn => {
                            if (otherBtn !== btn) {
                                otherBtn.nextElementSibling.classList.add("hidden");
                            }
                        });
                    });
                });

                // Close dropdowns when clicking outside
                document.addEventListener("click", (e) => {
                    if (!e.target.closest(".relative") && !e.target.closest(".dropdown-btn")) {
                        document.querySelectorAll(".dropdown-menu").forEach(menu => {
                            menu.classList.add("hidden");
                        });
                    }
                });
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="/src/js/swiper.js"></script>
</body>

</html>
