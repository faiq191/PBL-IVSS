<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="{{('assets/output.css') }}" rel="stylesheet">

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
          <li><a href="{{route('halaman.index') }}" class="text-primary hover:text-gray-600">Beranda</a></li>
          <li><a href="{{route('halaman.about') }}" class="hover:text-primary">About</a></li>

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
              <li><a href="{{route('halaman.research') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Main Research</a></li>
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


    <!-- LAB PROFILE SECTION -->

    <section class="container mx-auto px-4 lg:px-14 mt-20 mb-10">
      <div class="max-w-3xl mx-auto bg-slate-50 border border-slate-200 rounded-xl p-8 shadow-md">
        <h2 class="font-bold text-2xl text-center mb-4">Profil Laboratorium</h2>
        <p class="text-slate-600 leading-relaxed text-center space-y-4">
          <span>Laboratorium Visi Cerdas dan Sistem Cerdas merupakan pusat riset dan pengembangan di bawah Jurusan Teknologi Informasi Politeknik Negeri Malang yang berfokus pada bidang intelligent vision, dan smart system.</span>
          <span>Laboratorium ini menjadi wadah bagi dosen dan mahasiswa untuk melakukan penelitian, pembelajaran, serta pelatihan dalam pengembangan sistem cerdas berbasis pengolahan citra dan kecerdasan buatan.</span>
          <span>Penelitian di laboratorium ini mengintegrasikan computer vision, AI, dan IoT untuk menciptakan solusi inovatif yang mampu mengenali, menganalisis, serta merespon lingkungan secara mandiri.</span>
        </p>
      </div>
    </section>



    <!-- BERITA UNGGULAN -->
    <section class="container mx-auto px-4 lg:px-14 mt-10">

      <div class="flex flex-col md:flex-row justify-between items-center w-full mb-6">
        <div class="font-bold text-2xl text-center md:text-left">
          <p>Labs News</p>
        </div>
        <a href="{{  route('halaman.news') }}" class="bg-primary px-5 py-2 rounded-full text-white font-semibold mt-4 md:mt-0">
          Lihat Semua
        </a>
      </div>

      <div class="grid sm:grid-cols-1 lg:grid-cols-4 gap-5">

        <div class="relative border border-slate-200 p-3 rounded-xl hover:border-primary transition duration-300 ease-in-out">
          <p class="font-bold text-base mb-1">Pemanfaatan Wireshark untuk Sniffing Komunikasi Data Berprotokol HTTP pada Jaringan Internet</p>
          <p class="text-slate-400 text-sm">2021</p>
        </div>

        <div class="relative border border-slate-200 p-3 rounded-xl hover:border-primary transition duration-300 ease-in-out">
          <p class="font-bold text-base mb-1">Segmentasi berbasis k-means pada deteksi citra penyakit daun tanaman jagung</p>
          <p class="text-slate-400 text-sm">2020</p>
        </div>

        <div class="relative border border-slate-200 p-3 rounded-xl hover:border-primary transition duration-300 ease-in-out">
          <p class="font-bold text-base mb-1">Klasifikasi Jenis Kelamin Pada Citra Wajah Menggunakan Metode Naive Bayes</p>
          <p class="text-slate-400 text-sm">2018</p>
        </div>

      </div>

    </section>

    <!-- RESEARCH UNGGULAN -->
    <section class="container mx-auto px-4 lg:px-14 mt-10 mb-10">

      <div class="flex flex-col md:flex-row justify-between items-center w-full mb-6">
        <div class="font-bold text-2xl text-center md:text-left">
          <p>Labs Research</p>
        </div>
        <a href="{{route('halaman.research') }}" class="bg-primary px-5 py-2 rounded-full text-white font-semibold mt-4 md:mt-0">
          Lihat Semua
        </a>
      </div>

      <div class="grid sm:grid-cols-1 lg:grid-cols-4 gap-5">

        <div class="relative border border-slate-200 p-3 rounded-xl hover:border-primary transition duration-300 ease-in-out">
          <p class="font-bold text-base mb-1">Pemanfaatan Wireshark untuk Sniffing Komunikasi Data Berprotokol HTTP pada Jaringan Internet</p>
          <p class="text-slate-400 text-sm">2021</p>
        </div>

        <div class="relative border border-slate-200 p-3 rounded-xl hover:border-primary transition duration-300 ease-in-out">
          <p class="font-bold text-base mb-1">Segmentasi berbasis k-means pada deteksi citra penyakit daun tanaman jagung</p>
          <p class="text-slate-400 text-sm">2020</p>
        </div>

        <div class="relative border border-slate-200 p-3 rounded-xl hover:border-primary transition duration-300 ease-in-out">
          <p class="font-bold text-base mb-1">Klasifikasi Jenis Kelamin Pada Citra Wajah Menggunakan Metode Naive Bayes</p>
          <p class="text-slate-400 text-sm">2018</p>
        </div>

      </div>

    </section>

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
