<footer class="bg-gray-900 text-white mt-16">
    <div class="container mx-auto px-6 lg:px-20 py-12 grid grid-cols-1 md:grid-cols-3 gap-10">

        <!-- LAB INFO -->
        <div>
            <div class="flex items-center gap-3 mb-4">
                <img src="{{ asset('assets/img/logo.png') }}" class="h-10 rounded-full" alt="IVSS">
                <h2 class="text-xl font-bold">IVSS LAB</h2>
            </div>

            <p class="text-gray-300 text-sm leading-relaxed">
                Laboratorium Visi Cerdas dan Sistem Cerdas berfokus pada pengembangan komputer visi, kecerdasan buatan, dan sistem cerdas untuk keperluan akademis dan penelitian.
            </p>
        </div>

        <!-- QUICK LINKS -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
            <ul class="space-y-2 text-gray-300 text-sm">
                <li><a href="{{ route('halaman.index') }}" class="hover:text-primary">Home</a></li>
                <li><a href="{{ route('halaman.about') }}" class="hover:text-primary">About</a></li>
                <li><a href="{{ route('halaman.research') }}" class="hover:text-primary">Research</a></li>
                <li><a href="{{ route('halaman.documents') }}" class="hover:text-primary">Documentation</a></li>
                <li><a href="{{ route('halaman.news') }}" class="hover:text-primary">News</a></li>
                <li><a href="{{ route('halaman.contacts') }}" class="hover:text-primary">Contact</a></li>
            </ul>
        </div>

        <!-- CONTACT -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Contact</h3>
            <ul class="space-y-2 text-gray-300 text-sm">
                <li>📍 Polinema, Malang</li>
                <li>✉️ visicerdas@polinema.ac.id</li>
                <li>🏢 Gedung Teknologi Informasi, Politeknik Negeri Malang</li>
            </ul>
        </div>

    </div>

    <!-- COPYRIGHT -->
    <div class="text-center py-4 border-t border-gray-700 text-gray-400 text-sm">
        © {{ date('Y') }} Intelligent Vision & Smart System Laboratory. All rights reserved.
    </div>
</footer>
