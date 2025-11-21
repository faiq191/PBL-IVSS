<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
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
          <img src="{{ asset('assets/img/ROBOT.jpg') }}" alt="Logo" class="w-8 lg:w-10 rounded-full">
          <p class="text-lg lg:text-xl font-bold" href="{{   route('halaman.index') }}">IVSS</p>
        </a>

        <!-- Mobile menu toggle -->
        <button id="menu-toggle" class="lg:hidden text-primary text-2xl focus:outline-none">☰</button>

        <!-- Menu -->
        <ul id="menu" class="hidden lg:flex items-center gap-10 font-medium text-base">
          <li><a href="{{route('halaman.admin') }}" class="text-primary hover:text-gray-600">Beranda</a></li>
          <li><a href="{{route('halaman.create') }}" class="hover:text-primary">Buat Berita</a></li>


          <li><a href="{{route('halaman.news') }}" class="hover:text-primary">News</a></li>
          <li><a href="{{route('halaman.research') }}" class="hover:text-primary">Research</a></li>
          <li><a href="{{route('halaman.documents') }}" class="hover:text-primary">Dokumentasi</a></li>
        </ul>

        <!-- Search + Login -->
        <div class="hidden lg:flex items-center gap-3">
          <input type="text" placeholder="Cari berita..."
            class="border border-slate-300 rounded-full px-4 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-primary">
          <a href="{{ route('login') }}" class="bg-primary px-8 py-2 rounded-full text-white font-semibold">Masuk</a>

        </div>

      </div>
    </nav>

    <div class="h-16"></div>

    <!-- CONTENT -->
    <div class="max-w-6xl mx-auto px-4 py-12 space-y-20">

      <!-- FILTER BAR -->
      <form method="GET" action="{{ route('halaman.admin') }}" class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">

        <!-- Search -->
        <input
          type="text"
          name="search"
          value="{{ request('search') }}"
          placeholder="Search..."
          class="w-full md:w-1/3 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-primary" />

        <div class="flex gap-4 w-full md:w-auto">

          <!-- Category Filter -->
          <select
            name="category"
            class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-primary">
            <option value="" {{ request('category') == '' ? 'selected' : '' }}>All Category</option>
            <option value="Berita" {{ request('category') == 'Berita' ? 'selected' : '' }}>Berita</option>
            <option value="Research" {{ request('category') == 'Research' ? 'selected' : '' }}>Research</option>
            <option value="Dokumentasi" {{ request('category') == 'Dokumentasi' ? 'selected' : '' }}>Dokumentasi</option>
          </select>

          <!-- Year Filter -->
          <select
            name="year"
            class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-primary">
            <option value="">Year</option>
            <option value="2025" {{ request('year') == '2025' ? 'selected' : '' }}>2025</option>
            <option value="2024" {{ request('year') == '2024' ? 'selected' : '' }}>2024</option>
            <option value="2023" {{ request('year') == '2023' ? 'selected' : '' }}>2023</option>
          </select>

        </div>

      </form>


      <!-- BERITA -->
      <section class="container mx-auto px-4 lg:px-14 mt-10">

        <div class="flex flex-col md:flex-row justify-between items-center w-full mb-6">
          <div class="font-bold text-2xl text-center md:text-left">
            <p>Labs News</p>
          </div>
          </a>
        </div>

        <!-- DYNAMIC NEWS SECTION -->
        <div class="grid sm:grid-cols-1 lg:grid-cols-4 gap-5">

          @foreach ($news as $item)
          <div class="relative border border-slate-200 p-3 rounded-xl hover:border-primary transition duration-300 ease-in-out">

            <img src="{{ asset('storage/' . $item->image) }}"
              class="w-full h-40 object-cover rounded-lg mb-3">

            <p class="font-bold text-base mb-1">
              {{ $item->title }}
            </p>

            <p class="text-slate-400 text-sm">
              {{ $item->date }}
            </p>

            <p class="text-slate-500 text-sm mt-1 line-clamp-3">
              {{ $item->description }}
            </p>

          </div>
          @endforeach

        </div>

      </section>


      <!-- RESEARCH -->
      <section class="container mx-auto px-4 lg:px-14 mt-10">

        <div class="flex flex-col md:flex-row justify-between items-center w-full mb-6">
          <div class="font-bold text-2xl text-center md:text-left">
            <p>Labs Research</p>
          </div>
          </a>
        </div>

        <!-- DYNAMIC RESEARCH SECTION -->
        <div class="grid sm:grid-cols-1 lg:grid-cols-4 gap-5">

          @foreach ($research as $item)
          <div class="relative border border-slate-200 p-3 rounded-xl hover:border-primary transition duration-300 ease-in-out">

            <img src="{{ asset('storage/' . $item->image) }}"
              class="w-full h-40 object-cover rounded-lg mb-3">

            <p class="font-bold text-base mb-1">
              {{ $item->title }}
            </p>

            <p class="text-slate-400 text-sm">
              {{ $item->date }}
            </p>

            <p class="text-slate-500 text-sm mt-1 line-clamp-3">
              {{ $item->description }}
            </p>

          </div>
          @endforeach

        </div>

      </section>

      <!-- DOKUMENTASI -->
      <section class="container mx-auto px-4 lg:px-14 mt-10">

        <div class="flex flex-col md:flex-row justify-between items-center w-full mb-6">
          <div class="font-bold text-2xl text-center md:text-left">
            <p>Labs Documentation</p>
          </div>
          </a>
        </div>

        <!-- DYNAMIC RESEARCH SECTION -->
        <div class="grid sm:grid-cols-1 lg:grid-cols-4 gap-5">

          @foreach ($documents as $item)
          <div class="relative border border-slate-200 p-3 rounded-xl hover:border-primary transition duration-300 ease-in-out">

            <img src="{{ asset('storage/' . $item->image) }}"
              class="w-full h-40 object-cover rounded-lg mb-3">

            <p class="font-bold text-base mb-1">
              {{ $item->title }}
            </p>

            <p class="text-slate-400 text-sm">
              {{ $item->date }}
            </p>

            <p class="text-slate-500 text-sm mt-1 line-clamp-3">
              {{ $item->description }}
            </p>

          </div>
          @endforeach

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