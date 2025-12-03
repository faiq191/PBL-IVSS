 <!doctype html>
 <html>

 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>
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
            <a href="{{ route('halaman.index') }}" class="flex items-center gap-2">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="w-8 lg:w-10 rounded-full">
            <p class="text-lg lg:text-xl font-bold">IVSS</p>
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
<!--  SWIPER SECTION -->
<div class="swiper-slide mb-10">
<div class="relative flex flex-col justify-end p-3 h-20 rounded-xl bg-cover bg-center bg-no-repeat overflow-hidden"
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

<style>
::-webkit-scrollbar {
    width: 8px;
}
::-webkit-scrollbar-thumb {
    background: #999;
    border-radius: 10px;
}
::-webkit-scrollbar-thumb:hover {
    background: #666;
}
</style>
     <!-- FACILITY GRID SECTION -->
     <section class="container mx-auto px-6 lg:px-20 mt-12 mb-16">

       <h2 class="text-3xl font-bold text-center mb-10 text-primary">Fasilitas Laboratorium</h2>

       <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

         <!-- ITEM 1 -->
         <div class="bg-white shadow-lg rounded-xl p-6 text-center border border-gray-100">
           <img src="{{ asset('assets/img/desk.png') }}" class="mx-auto w-12 h-12 object-contain mb-3" alt="">

           <h3 class="font-bold text-lg">Meja & Kursi</h3>
           <p class="text-sm text-gray-600 mt-2">
             Perabot dasar untuk menunjang kenyamanan belajar, praktikum, dan riset.
           </p>
         </div>

         <!-- ITEM 2 -->
         <div class="bg-white shadow-lg rounded-xl p-6 text-center border border-gray-100">
           <img src="{{ asset('assets/img/air-conditioner.png') }}" class="mx-auto w-14 mb-3" alt="">
           <h3 class="font-bold text-lg">AC</h3>
           <p class="text-sm text-gray-600 mt-2">
             Pendingin ruangan untuk menjaga suhu ruang tetap nyaman selama proses belajar dan menjaga keandalan peralatan.
           </p>
         </div>

         <!-- ITEM 3 -->
         <div class="bg-white shadow-lg rounded-xl p-6 text-center border border-gray-100">
           <img src="{{ asset('assets/img/mosque.png') }}" class="mx-auto w-14 mb-3" alt="">
           <h3 class="font-bold text-lg">Area Mushola</h3>
           <p class="text-sm text-gray-600 mt-2">
             Fasilitas khusus untuk kegiatan ibadah/sholat.
           </p>
         </div>

         <!-- ITEM 4 -->
         <div class="bg-white shadow-lg rounded-xl p-6 text-center border border-gray-100">
           <img src="{{ asset('assets/img/water-dispenser.png') }}" class="mx-auto w-14 mb-3" alt="">
           <h3 class="font-bold text-lg">Air Mineral</h3>
           <p class="text-sm text-gray-600 mt-2">
             Air minum untuk menjaga hidrasi dan kenyamanan pengguna fasilitas.
           </p>
         </div>

         <!-- ITEM 5 -->
         <div class="bg-white shadow-lg rounded-xl p-6 text-center border border-gray-100">
           <img src="{{ asset('assets/img/responsive.png') }}" class="mx-auto w-14 mb-3" alt="">
           <h3 class="font-bold text-lg">Komputer Desktop</h3>
           <p class="text-sm text-gray-600 mt-2">
             Perangkat komputer standar yang digunakan sebagai stasiun kerja untuk pemrosesan data, pengujian, dan riset.
           </p>
         </div>

         <!-- ITEM 6 -->
         <div class="bg-white shadow-lg rounded-xl p-6 text-center border border-gray-100">
           <img src="{{ asset('assets/img/dslr-camera.png') }}" class="mx-auto w-14 mb-3" alt="">
           <h3 class="font-bold text-lg">Camera DLSR</h3>
           <p class="text-sm text-gray-600 mt-2">
             Kamera berkualitas tinggi untuk kebutuhan pengambilan data visual beresolusi tinggi dalam penelitian.
           </p>
         </div>

         <!-- ITEM 7 -->
         <div class="bg-white shadow-lg rounded-xl p-6 text-center border border-gray-100">
           <img src="{{ asset('assets/img/intelv3.png') }}" class="mx-auto w-14 mb-3" alt="">
           <h3 class="font-bold text-lg">Intel RealSense D415</h3>
           <p class="text-sm text-gray-600 mt-2">
             Kamera kedalaman (3D) dan visual, vital untuk riset Computer Vision dan Sistem Cerdas.
           </p>
         </div>

         <!-- ITEM 8 -->
         <div class="bg-white shadow-lg rounded-xl p-6 text-center border border-gray-100">
           <img src="{{ asset('assets/img/dslr-camera.png') }}" class="mx-auto w-14 mb-3" alt="">
           <h3 class="font-bold text-lg">Camera 260fps</h3>
           <p class="text-sm text-gray-600 mt-2">
             Kamera kecepatan tinggi yang mampu menangkap gerakan cepat, digunakan untuk analisis gerak mendetail.
           </p>
         </div>

         <!-- ITEM 9 -->
         <div class="bg-white shadow-lg rounded-xl p-6 text-center border border-gray-100">
           <img src="{{ asset('assets/img/bulb.png') }}" class="mx-auto w-14 mb-3" alt="">
           <h3 class="font-bold text-lg">Peralatan Lampu</h3>
           <p class="text-sm text-gray-600 mt-2">
             Perangkat pencahayaan untuk memastikan kondisi pengambilan data visual tetap optimal.
           </p>
         </div>

         <!-- ITEM 10 -->
         <div class="bg-white shadow-lg rounded-xl p-6 text-center border border-gray-100">
           <img src="{{ asset('assets/img/box.png') }}" class="mx-auto w-14 mb-3" alt="">
           <h3 class="font-bold text-lg">Box Pengambilan Data</h3>
           <p class="text-sm text-gray-600 mt-2">
             Wadah khusus untuk mengisolasi atau mengontrol lingkungan saat pengambilan data riset.
           </p>
         </div>

         <!-- ITEM 11 -->
         <div class="bg-white shadow-lg rounded-xl p-6 text-center border border-gray-100">
           <img src="{{ asset('assets/img/micro.png') }}" class="mx-auto w-14 mb-3" alt="">
           <h3 class="font-bold text-lg">Open-MVCamH7</h3>
           <p class="text-sm text-gray-600 mt-2">
             Kamera mikrokontroler untuk riset Computer Vision dan Machine Learning embedded.
           </p>
         </div>

       </div>
     </section>
<x-footer />


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
