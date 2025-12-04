<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="{{('assets/output.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
               <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="w-full">
        <!--  NAVBAR -->
        <nav class="sticky top-0 z-50 bg-white shadow-sm">
            <div class="container mx-auto flex justify-between items-center py-5 px-4 lg:px-14">

                <!-- Logo -->
        <a href="{{ route('halaman.index') }}" class="flex items-center gap-2">
        <img src="{{ asset('assets/img/polinema.png') }}" alt="Logo" class="w-8 lg:w-10">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-8 lg:w-10 rounded-full">
        <p class="text-lg lg:text-xl font-bold">IVSS</p>
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

        <h1 class="text-2xl font-bold mb-6">Create Content</h1>

<form action="{{ route('halaman.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label class="block text-sm font-medium text-gray-700 mt-4">Category</label>
    <select id="category" name="category"
        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md">
        <option value="news">News</option>
        <option value="research">Research</option>
        <option value="documents">Documentation</option>
    </select>

    <label class="block text-sm font-medium text-gray-700 mt-4">Image</label>
    <input type="file" name="image"
        class="block w-full px-3 py-2 border border-gray-300 rounded-md">

    <label class="block text-sm font-medium text-gray-700 mt-4">Title</label>
    <input type="text" name="title"
        class="block w-full px-3 py-2 border border-gray-300 rounded-md">

    <label class="block text-sm font-medium text-gray-700 mt-4">Description</label>
    <textarea name="description"
        class="block w-full px-3 py-2 border border-gray-300 rounded-md"
        rows="4"></textarea>

    <label class="block text-sm font-medium text-gray-700 mt-4">Date</label>
    <input type="date" name="date"
        class="block w-full px-3 py-2 border border-gray-300 rounded-md">

    <!-- TYPE HERE -->
    <label class="block text-sm font-medium text-gray-700 mt-4">Description</label>
    <input type="text" name="type"
        class="block w-full px-3 py-2 border border-gray-300 rounded-md"
        placeholder="">

    <div id="researchField" class="hidden">
        <label class="block text-sm font-medium text-gray-700 mt-4">Research Type</label>
        <input type="text" name="research_type"
               class="block w-full px-3 py-2 border border-gray-300 rounded-md">
    </div>

    <button type="submit"
        class="bg-primary px-8 py-2 rounded-full text-white font-semibold mt-6">
        Create
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
