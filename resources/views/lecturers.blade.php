<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lecturers</title>
  <link href="{{ ('assets/output.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
  <div class="w-full">
    <!--  NAVBAR -->
    <nav class="sticky top-0 z-50 bg-white shadow-sm">
      <div class="container mx-auto flex justify-between items-center py-5 px-4 lg:px-14">

        <!-- Logo -->
        <a href="#" class="flex items-center gap-2" onclick="return false;">
          <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-8 lg:w-10 rounded-full">
          <p class="text-lg lg:text-xl font-bold" href="{{   route('halaman.index') }}">IVSS</p>
        </a>

        <!-- Mobile menu toggle -->
        <button id="menu-toggle" class="lg:hidden text-primary text-2xl focus:outline-none">☰</button>

        <!-- Menu -->
        <ul id="menu" class="hidden lg:flex items-center gap-10 font-medium text-base">
          <li><a href="{{route('halaman.index') }}" class="text-primary hover:text-gray-600">Beranda</a></li>
          <li><a href="{{route('halaman.about') }}" class="hover:text-primary">About</a></li>

          <!-- Research dropdown -->
          <li class="relative">
            <button class="dropdown-btn flex items-center gap-1 hover:text-primary focus:outline-none">
              Activity
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mt-[2px]" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>
            <ul
              class="dropdown-menu hidden absolute left-0 mt-2 bg-white shadow-lg rounded-lg w-44 py-2 z-[9999] border border-gray-100">
              <li><a href="{{route('halaman.research') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Research</a></li>
              <li><a href="{{route('halaman.documents') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Documentation</a></li>
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
<!--  SWIPER SECTION -->
<div class="swiper-slide mb-10">
  <div class="relative flex flex-col justify-end p-3 h-72 rounded-xl bg-cover bg-center bg-no-repeat overflow-hidden"
      style='background-image: url("{{ asset('assets/img/image2.png') }}");'>
      <div class="absolute inset-x-0 bottom-0 h-full bg-gradient-to-t from-[rgba(0,0,0,0.4)]"></div>
      <div class="relative z-10 mb-3 pl-4">
        <p class="text-3xl font-semibold text-white mt-1">
          Laboratorium Intelligent Vision and Smart System
        </p>
        <div class="flex items-center gap-1 mt-1">
          <p class="text-white text-xs">JTI Polinema</p>
        </div>
      </div>
  </div>
</div>

    <div class="h-16"></div>

    <!-- CONTENT -->
<div class="container mx-auto px-4 lg:px-20 py-16">

    <h1 class="text-5xl font-bold text-center mb-16">Lab Members</h1>

    <h2 class="text-2xl font-semibold text-center mb-10">Kepala Lab</h2>

    <div class="flex justify-center mb-20">
        <div class="bg-white w-72 rounded-2xl shadow-lg p-8 flex flex-col items-center hover:shadow-xl transition">
            <img src="{{ asset('assets/img/Ulla-Delfana-Rosiani_197803272003122002.jpg') }}"
                 class="w-40 h-40 rounded-full object-cover mb-5">
            <p class="font-bold text-center text-lg">Dr. Ulla Delfana Rosiani, ST., MT.</p>
            <p class="text-gray-500 text-sm mt-1">Kepala Lab</p>
        </div>
    </div>

<!-- PENELITI SECTION -->
<h2 class="text-2xl font-bold text-center mb-6">Peneliti</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">

    <!-- Lecturer Card -->
    <div class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center text-center hover:shadow-xl transition">
        <div class="w-36 h-36 rounded-full overflow-hidden mb-4">
            <img src="{{ asset('assets/img/Mamluatul-Hani_ah_199002062019032013-scaled.jpg') }}"
                 class="w-full h-full object-cover">
        </div>
        <h2 class="font-semibold text-base">Mamluatul Hani’ah, S.Kom., M.Kom.</h2>
        <p class="text-sm text-gray-500 mt-1">Peneliti</p>
    </div>

    <!-- Lecturer Card -->
    <div class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center text-center hover:shadow-xl transition">
        <div class="w-36 h-36 rounded-full overflow-hidden mb-4">
            <img src="{{ asset('assets/img/Mungki-Astiningrum.jpg') }}"
                 class="w-full h-full object-cover">
        </div>
        <h2 class="font-semibold text-base">Mungki Astiningrum, ST., M.Kom.</h2>
        <p class="text-sm text-gray-500 mt-1">Peneliti</p>
    </div>

    <!-- Lecturer Card -->
    <div class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center text-center hover:shadow-xl transition">
        <div class="w-36 h-36 rounded-full overflow-hidden mb-4">
            <img src="{{ asset('assets/img/Rosa-Andrie-Asmara_2.jpg') }}"
                 class="w-full h-full object-cover">
        </div>
        <h2 class="font-semibold text-base">Prof. Dr. Eng. Rosa Andrie Asmara, ST., MT.</h2>
        <p class="text-sm text-gray-500 mt-1">Peneliti</p>
    </div>

    <!-- Lecturer Card -->
    <div class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center text-center hover:shadow-xl transition">
        <div class="w-36 h-36 rounded-full overflow-hidden mb-4">
            <img src="{{ asset('assets/img/Vivi-Nur-Wijayaningrum_199308112019032025-scaled.jpg') }}"
                 class="w-full h-full object-cover">
        </div>
        <h2 class="font-semibold text-base">Vivi Nur Wijayaningrum, S.Kom., M.Kom.</h2>
        <p class="text-sm text-gray-500 mt-1">Peneliti</p>
    </div>

    <!-- Lecturer Card -->
    <div class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center text-center hover:shadow-xl transition">
        <div class="w-36 h-36 rounded-full overflow-hidden mb-4">
            <img src="{{ asset('assets/img/Wilda-Imama-Sabilla.jpg') }}"
                 class="w-full h-full object-cover">
        </div>
        <h2 class="font-semibold text-base">Wilda Imama Sabilla, S.Kom., M.Kom.</h2>
        <p class="text-sm text-gray-500 mt-1">Peneliti</p>
    </div>

    <!-- Lecturer Card -->
    <div class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center text-center hover:shadow-xl transition">
        <div class="w-36 h-36 rounded-full overflow-hidden mb-4">
            <img src="{{ asset('assets/img/Ely-Setyo-Astuti.jpg') }}"
                 class="w-full h-full object-cover">
        </div>
        <h2 class="font-semibold text-base">Dr. Ely Setyo Astuti, ST., MT.</h2>
        <p class="text-sm text-gray-500 mt-1">Peneliti</p>
    </div>

</div>


    </div>

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
