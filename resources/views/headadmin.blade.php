<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kepala Admin</title>
    <link href="{{ ('assets/output.css') }}" rel="stylesheet">
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
                    <li><a href="{{route('halaman.headadmin') }}" class="text-primary hover:text-gray-600">Beranda</a></li>
                    <li><a href="{{route('halaman.admin') }}" class="hover:text-primary">Lab Activity</a></li>
                    <li><a href="{{route('halaman.students') }}" class="hover:text-primary">Member</a></li>
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

    <!-- CONTENT -->
            <div class="container mx-auto px-4 lg:px-20 py-16">
        <h2 class="text-2xl font-bold mb-4 text-center">Pending Members</h2>
<div class="mt-10 flex justify-center">
    <div class="w-full max-w-2xl overflow-x-auto">
        <table class="w-full bg-white border border-gray-200 rounded-xl shadow">
            <thead>
                <tr class="bg-gray-100 text-sm">
                    <th class="px-4 py-3 border-b text-left">Username</th>
                    <th class="px-4 py-3 border-b text-center">Approve</th>
                    <th class="px-4 py-3 border-b text-center">Reject</th>
                </tr>
            </thead>

            <tbody>
                @foreach($pendingUsers as $user)
                    <tr class="border-b hover:bg-gray-50 text-sm">
                        <td class="px-4 py-3">{{ $user->username }}</td>

                        <td class="px-4 py-3 text-center">
                            <form action="{{ route('user.approve', $user->id) }}" method="POST">
                                @csrf
                                <button class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs">
                                    Approve
                                </button>
                            </form>
                        </td>

                        <td class="px-4 py-3 text-center">
                            <form action="{{ route('user.reject', $user->id) }}" method="POST">
                                @csrf
                                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
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

<!--List Member-->
<div class="container mx-auto px-4 lg:px-20 py-16">
    <h2 class="text-2xl font-bold mb-4 text-center">Lab Members</h2>

    <table class="w-1/2 mx-auto text-sm">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">No</th>
                <th class="p-2 border">Nama</th>
                <th class="p-2 border">Tanggal Bergabung</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>

<tbody>
    @foreach ($members as $index => $member)
    <tr>
        <td class="p-2 border text-center">{{ $index + 1 }}</td>
        <td class="p-2 border">{{ $member->username }}</td>
        <td class="p-2 border text-center">{{ $member->created_at->format('d M Y') }}</td>

        @if(auth()->user()->role === 'admin_kepala')
        <td class="p-2 border text-center">
            <form action="{{ route('members.destroy', $member->id) }}" method="POST"
                  onsubmit="return confirm('Yakin hapus member ini?')">
                @csrf
                @method('DELETE')

                <button class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">
                    Hapus
                </button>
            </form>
        </td>
        @endif
    </tr>
    @endforeach
</tbody>

    </table>
</div>

    <!-- USER STATISTICS -->
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-xl p-6 mb-10">
        <h2 class="text-xl font-bold mb-3">User Statistics</h2>

        <div class="grid grid-cols-3 gap-4">

            <!-- TOTAL MEMBER -->
            <div class="bg-blue-100 text-center p-4 rounded-lg">
                <p class="text-2xl font-bold">{{ $memberCount }}</p>
                <p class="text-sm text-gray-600">Total Members</p>
            </div>

            <!-- ADMIN BERITA -->
            <div class="bg-green-100 text-center p-4 rounded-lg">
                <p class="text-2xl font-bold">{{ $adminBeritaCount }}</p>
                <p class="text-sm text-gray-600">Admin Berita</p>
            </div>

            <!-- ADMIN KEPALA -->
            <div class="bg-yellow-100 text-center p-4 rounded-lg">
                <p class="text-2xl font-bold">{{ $adminKepalaCount }}</p>
                <p class="text-sm text-gray-600">Admin Kepala</p>
            </div>

        </div>
    </div>
</div>
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
