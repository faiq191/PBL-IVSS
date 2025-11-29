<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="{{ ('assets/output.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
                    <li><a href="{{route('halaman.headadmin') }}" class="text-primary hover:text-gray-600">Beranda</a></li>
                    <li><a href="{{route('halaman.students') }}" class="hover:text-primary">Member</a></li>
                    <li><a href="{{route('halaman.create') }}" class="hover:text-primary">Buat Berita</a></li>


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
                        @auth
                    <div class="flex items-center gap-4">
                        <span class="font-semibold text-gray-700">
                            {{ Auth::user()->username }}
                        </span>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full">
                                Logout
                            </button>
                        </form>
                    </div>
                    @endauth

                </div>

            </div>
        </nav>

        <div class="h-16"></div>

        <!-- CONTENT -->
        <div class="container mx-auto px-4 lg:px-20 py-16">
        <h2 class="text-2xl font-bold mb-4 text-center">Pending Members</h2>
        <div>
    <div class="w-full flex justify-center mt-10">
        <table class="min-w-[400px] border border-gray-300 rounded-lg shadow">
            <thead class="bg-gray-100"></thead>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-3 border-b">Username</th>
                        <th class="px-4 py-3 border-b">Role</th>
                        <th class="px-4 py-3 border-b text-center">Approve</th>
                        <th class="px-4 py-3 border-b text-center">Reject</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($pendingUsers as $user)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $user->username }}</td>
                            <td class="px-4 py-3">{{ $user->role }}</td>

                            <td class="px-4 py-3 text-center">
                                <form action="{{ route('user.approve', $user->id) }}" method="POST">
                                    @csrf
                                    <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                                        Approve
                                    </button>
                                </form>
                            </td>

                            <td class="px-4 py-3 text-center">
                                <form action="{{ route('user.reject', $user->id) }}" method="POST">
                                    @csrf
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                        Reject
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>


<div class="w-full flex justify-center mt-10">
    <div class="w-full max-w-3xl">

        <h2 class="text-2xl font-bold mb-4 text-center">Labs Activity</h2>


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

        <!-- EDIT + DELETE BUTTONS -->
        <div class="flex justify-between mt-3">

            <!-- EDIT -->
            <a href="{{ route('halaman.edit', ['type' => 'news', 'id' => $item->id]) }}"
               class="text-blue-600 font-semibold">
                Edit
            </a>

            <!-- DELETE -->
            <form action="{{ route('halaman.delete', ['type' => 'news', 'id' => $item->id]) }}"
                  method="POST"
                  onsubmit="return confirm('Delete this item?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 font-semibold">
                    Delete
                </button>
            </form>

        </div>

    </div>
    @endforeach

</div>


    </a>


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

        <!-- EDIT & DELETE -->
        <div class="flex justify-between mt-3">

            <a href="{{ route('halaman.edit', ['type' => 'research', 'id' => $item->id]) }}"
               class="text-blue-600 font-semibold">
                Edit
            </a>

            <form action="{{ route('halaman.delete', ['type' => 'research', 'id' => $item->id]) }}"
                  method="POST"
                  onsubmit="return confirm('Delete this item?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 font-semibold">
                    Delete
                </button>
            </form>

        </div>

    </div>
    @endforeach

</div>


</a>

    </section>

   <!-- DOKUMENTASI -->
    <section class="container mx-auto px-4 lg:px-14 mt-10">

      <div class="flex flex-col md:flex-row justify-between items-center w-full mb-6">
        <div class="font-bold text-2xl text-center md:text-left">
          <p>Labs Documentation</p>
        </div>
        </a>
      </div>

 <!-- DYNAMIC DOKUMENTASI SECTION -->
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

        <!-- EDIT & DELETE -->
        <div class="flex justify-between mt-3">

            <a href="{{ route('halaman.edit', ['type' => 'documents', 'id' => $item->id]) }}"
               class="text-blue-600 font-semibold">
                Edit
            </a>

            <form action="{{ route('halaman.delete', ['type' => 'documents', 'id' => $item->id]) }}"
                  method="POST"
                  onsubmit="return confirm('Delete this item?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 font-semibold">
                    Delete
                </button>
            </form>

        </div>

    </div>
    @endforeach

</div>


</a>

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
