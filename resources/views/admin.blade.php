<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturers</title>
    <link href="{{ secure_asset('assets/output.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
    <div class="w-full">
        <!--  NAVBAR -->
        <nav class="sticky top-0 z-50 bg-white shadow-sm">
            <div class="container mx-auto flex justify-between items-center py-5 px-4 lg:px-14">

                <!-- Logo -->
                <a href="#" class="flex items-center gap-2" onclick="return false;">
                    <img src="{{ asset('assets/img/ROBOT.jpg') }}" alt="Logo" class="w-8 lg:w-10 rounded-full">
                    <p class="text-lg lg:text-xl font-bold" href="{{   route('halaman.index') }}">IVSS</p>
                </a>

                <!-- Mobile menu toggle -->
                <button id="menu-toggle" class="lg:hidden text-primary text-2xl focus:outline-none">☰</button>

                <!-- Menu -->
                <ul id="menu" class="hidden lg:flex items-center gap-10 font-medium text-base">
                    <li><a href="{{route('halaman.admin') }}" class="text-primary hover:text-gray-600">Beranda</a></li>
                    <li><a href="{{route('halaman.create') }}" class="hover:text-primary">Buat Berita</a></li>

                    <!-- Research dropdown -->
                    <li class="relative">
                        <button class="dropdown-btn flex items-center gap-1 hover:text-primary focus:outline-none">
                            Research
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mt-[2px]" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul
                            class="dropdown-menu hidden absolute left-0 mt-2 bg-white shadow-lg rounded-lg w-44 py-2 z-[9999] border border-gray-100">
                            <li><a href="{{route('halaman.admin') }}" class="text-primary hover:text-gray-600">Beranda</a></li>
                            <li><a href="{{route('halaman.create') }}" class="hover:text-primary">Buat Berita</a></li>
                        </ul>
                    </li>

                    <!-- Members dropdown -->
                    <li class="relative">
                        <button class="dropdown-btn flex items-center gap-1 hover:text-primary focus:outline-none">
                            Members
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mt-[2px]" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul
                            class="dropdown-menu hidden absolute left-0 mt-2 bg-white shadow-lg rounded-lg w-44 py-2 z-[9999] border border-gray-100">
                            <li><a href="{{route('halaman.lecturers') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Lecturers</a></li>
                            <li><a href="{{route('halaman.students') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Students</a></li>
                        </ul>
                    </li>

                    <li><a href="{{route('halaman.news') }}" class="hover:text-primary">News</a></li>
                    <li><a href="{{route('halaman.contacts') }}" class="hover:text-primary">Contacts</a></li>
                </ul>

                <!-- Search + Login -->
                <div class="hidden lg:flex items-center gap-3">
                    <input type="text" placeholder="Cari berita..."
                        class="border border-slate-300 rounded-full px-4 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-primary">
                    <a href="#" class="bg-primary px-8 py-2 rounded-full text-white font-semibold">Masuk</a>
                </div>

            </div>
        </nav>

        <div class="h-16"></div>

        <!-- CONTENT -->
        <div class="container mx-auto px-4 lg:px-14 py-12 space-y-16">
            <!-- LIST BERITA -->
            <section id="list-berita">
                <h1 class="text-3xl font-bold text-center mb-10">
                    List Berita
                </h1>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-10 justify-items-center">
                    <!-- Berita 1 -->
                    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-lg transition duration-200 w-48 p-5 text-center">
                        <img src="{{ asset('assets/img/ROBOT.jpg') }}" alt="Berita 1"
                            class="w-28 h-28 mx-auto rounded-full object-cover mb-3">
                        <p class="font-semibold text-sm">Judul Berita</p>
                        <p class="text-xs text-gray-500 mt-1">Type: Jurusan</p>
                        <p class="text-xs text-gray-400 mt-1">{{ date('d F Y') }}</p>
                    </div>

                    <!-- Berita 2 -->
                    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-lg transition duration-200 w-48 p-5 text-center">
                        <img src="{{ asset('assets/img/ROBOT.jpg') }}" alt="Berita 2"
                            class="w-28 h-28 mx-auto rounded-full object-cover mb-3">
                        <p class="font-semibold text-sm">Event AI 2025</p>
                        <p class="text-xs text-gray-500 mt-1">Teknologi</p>
                        <p class="text-xs text-gray-400 mt-1">12 November 2025</p>
                    </div>
                </div>
            </section>

            <!-- LIST RESEARCH -->
            <section id="list-research">
                <h1 class="text-3xl font-bold text-center mb-10">
                    List Research
                </h1>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-10 justify-items-center">
                    <!-- Research 1 -->
                    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-lg transition duration-200 w-48 p-5 text-center">
                        <img src="{{ asset('assets/img/ROBOT.jpg') }}" alt="Research 1"
                            class="w-28 h-28 mx-auto rounded-full object-cover mb-3">
                        <p class="font-semibold text-sm">AI Robotics</p>
                        <p class="text-xs text-gray-500 mt-1">Machine Learning</p>
                        <p class="text-xs text-gray-400 mt-1">2025</p>
                    </div>

                    <!-- Research 2 -->
                    <div class="bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-lg transition duration-200 w-48 p-5 text-center">
                        <img src="{{ asset('assets/img/ROBOT.jpg') }}" alt="Research 2"
                            class="w-28 h-28 mx-auto rounded-full object-cover mb-3">
                        <p class="font-semibold text-sm">IoT Smart Home</p>
                        <p class="text-xs text-gray-500 mt-1">Internet of Things</p>
                        <p class="text-xs text-gray-400 mt-1">2024</p>
                    </div>
                </div>
            </section>
        </div>
        <!-- LIST DOKUMENTASI -->
        <section id="list-research">
            <h1 class="text-3xl font-bold text-center mb-10">
                List Dokumentasi
            </h1>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-10 justify-items-center">
                <!-- Research 1 -->
                <div class="bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-lg transition duration-200 w-48 p-5 text-center">
                    <img src="{{ asset('assets/img/ROBOT.jpg') }}" alt="Research 1"
                        class="w-28 h-28 mx-auto rounded-full object-cover mb-3">
                    <p class="font-semibold text-sm">AI Robotics</p>
                    <p class="text-xs text-gray-500 mt-1">Machine Learning</p>
                    <p class="text-xs text-gray-400 mt-1">2025</p>
                </div>

                <!-- Research 2 -->
                <div class="bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-lg transition duration-200 w-48 p-5 text-center">
                    <img src="{{ asset('assets/img/ROBOT.jpg') }}" alt="Research 2"
                        class="w-28 h-28 mx-auto rounded-full object-cover mb-3">
                    <p class="font-semibold text-sm">IoT Smart Home</p>
                    <p class="text-xs text-gray-500 mt-1">Internet of Things</p>
                    <p class="text-xs text-gray-400 mt-1">2024</p>
                </div>
            </div>
        </section>
    </div>
    </li>
    </div>
    <div class="flex items-center justify-center mt-4">
        <a href="{{route('halaman.create')}}" class="bg-primary px-4 py-2 rounded-full text-white font-semibold">Buat Berita</a>
    </div>



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