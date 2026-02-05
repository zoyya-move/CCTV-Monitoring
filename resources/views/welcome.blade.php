<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CCTV PDAM KOTA TEGAL - Platform Monitoring Realtime</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logo ikon pdam.png') }}"/>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-800 bg-gray-50">
    <div class="bg-gray-50 text-black/50">
        <!-- Navbar -->
        <nav class="sticky top-0 z-50 bg-white shadow-sm">
            <div class="flex items-center justify-between px-4 py-3 mx-auto max-w-7xl">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('assets/logo ikon pdam.png') }}" alt="Life Media" class="w-auto h-8 hover:cursor-pointer" onclick="window.location.href='{{ url('/') }}'">
                    <a href="#" class="text-lg font-bold text-[#B03A4B]">PDAM KOTA TEGAL</a>
                </div>
                <div class="flex items-center gap-6">
                    <a href="{{ url('/') }}" class="text-sm font-semibold text-gray-700 hover:text-red-600">HOME</a>
                    <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-red-600 hover:underline">DASHBOARD CCTV</a>
                    <a href="{{ url('/map') }}" class="text-sm font-semibold text-red-600 hover:underline">PETA GIS</a>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <header class="relative min-h-[640px] flex items-center overflow-hidden"> 
            <img src="{{ asset('assets/water leading.jpg') }}" alt="Tugu Jogja"
                class="absolute inset-0 object-cover w-full h-full opacity-30" />
            <div class="relative z-10 max-w-3xl px-6 py-20 mx-auto text-center"> 
                <h2 class="mb-2 text-xl font-extrabold tracking-wide text-black">SELAMAT DATANG DI</h2>
                <h1 class="mb-2 text-4xl font-extrabold leading-tight tracking-tight text-black sm:text-5xl md:text-6xl">
                    <span class="block">DASHBOARD CCTV</span>
                    <span class="block">PERUSAHAAN DAERAH AIR MINUM KOTA TEGAL</span>
                </h1>
                <p class="mt-2 text-base font-medium text-black opacity-90 sm:text-lg">
                    PLATFORM CCTV PERUSAHAAN DAERAH AIR MINUM KOTA TEGAL
                </p>
            </div>
        </header>

        <!-- Cards Section -->
        <main class="bg-white">
            <div class="grid max-w-4xl grid-cols-1 gap-8 px-4 py-8 mx-auto md:grid-cols-2">
                <!-- Card 1: Dashboard -->
                <a href="{{ url('/dashboard') }}" class="rounded-2xl bg-[#B03A4B] hover:bg-[#a02f3e] transition p-8 flex flex-col items-center text-center shadow-lg">
                    <h2 class="mb-2 text-2xl font-bold text-white uppercase">Dashboard Monitoring CCTV</h2>
                    <p class="text-base font-medium text-white">Halaman CCTV PDAM Kota Tegal</p>
                </a>
                <!-- Card 2: GIS -->
                <a href="{{ url('/map') }}" class="rounded-2xl bg-[#B03A4B] hover:bg-[#a02f3e] transition p-8 flex flex-col items-center text-center shadow-lg">
                    <h2 class="mb-2 text-2xl font-bold text-white uppercase">Geographic Information System</h2>
                    <p class="text-base font-medium text-white">Halaman Peta CCTV PDAM Kota Tegal</p>
                </a>
            </div>
        </main>

        <!-- Profile Section -->
        <section class="py-12 bg-white">
            <div class="grid items-center max-w-5xl gap-8 px-4 mx-auto md:grid-cols-2">
                <div class="flex justify-end">
                    <img src="{{ asset('assets/gambar perusahaan pdam.jpeg') }}" alt="Life Media Office" class="ml-500 w-64 h-40 object-cover shadow-lg rounded-2xl">
                </div>
                <div>
                    <h3 class="mb-2 text-2xl font-bold text-black uppercase">Profil Perusahaan</h3>
                    <p class="mb-2 text-base text-gray-700">
                        Perusahaan Daerah Air Minum (PDAM) Kota Tegal merupakan Badan Usaha Milik Daerah (BUMD) yang bergerak di bidang pelayanan penyediaan air minum bagi masyarakat Kota Tegal. PDAM Kota Tegal berperan penting dalam mendukung peningkatan kualitas hidup masyarakat melalui penyediaan air bersih yang aman, layak, dan berkelanjutan.

Sebagai perusahaan pelayanan publik, PDAM Kota Tegal berkomitmen untuk memberikan layanan terbaik dengan mengedepankan prinsip profesionalisme, transparansi, dan tanggung jawab sosial.
                    </p>
                </div>
            </div>
        </section>

        <!-- Partners + Banner Section -->
        <section class="bg-[#B03A4B] pt-8 pb-0">
            <div class="max-w-6xl px-4 mx-auto">
                <div class="flex flex-wrap items-center justify-center gap-8 mb-8">
                    <img src="{{ asset('assets/logo fn.jpeg') }}" alt="SIMS" class="object-contain h-12 px-2 py-1 bg-white rounded">
                    <img src="{{ asset('assets/logo pdam.jpeg') }}" alt="Life Media" class="object-contain h-12 px-2 py-1 bg-white rounded">
                </div>
                <div class="py-8">
                    <h2 class="text-2xl font-bold text-center text-white uppercase md:text-3xl">
                        Memantau Secara Realtime<br>
                        Kondisi Air Bersih Di Toren PDAM Kota Tegal
                    </h2>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="pt-8 pb-4 bg-white">
            <div class="p-4 max-w-[90rem] mx-auto">
                <div class="mb-2 text-lg font-bold text-black">INFORMATION</div>
                <div class="flex flex-col gap-8 text-sm text-black md:flex-row md:justify-between">
                    <!-- Kantor Cabang -->
                    <div class="flex-1 min-w-[220px]">
                        <div class="mb-1 font-semibold">Kantor Utama:</div>
                        <div>
                            <span class="font-bold">Kota Tegal</span> - Jl. Hang Tuah No.29, Tegalsari, Kec. Tegal Bar., Kota Tegal, Jawa Tengah 52111<br>
                        </div>
                    </div>
                    <!-- Kantor Operasional -->
                    <div class="flex-1 min-w-[220px]">
                        <div class="mb-1 font-semibold">Kantor Operasional:</div>
                        <div>
                            <span class="font-bold">Kota Tegal</span> - Jl. Hang Tuah No.29, Tegalsari, Kec. Tegal Bar., Kota Tegal, Jawa Tengah 52111<br>
                            <span class="font-bold">Kota Tegal</span> - Jl. Pancasila No.30, Panggung, Kec. Tegal Tim., Kota Tegal, Jawa Tengah 52122<br>
                        </div>
                    </div>
                    <!-- Hubungi Kami -->
                    <div class="flex-1 min-w-[180px]">
                        <div class="mb-1 font-semibold">Hubungi Kami</div>
                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <i data-lucide="mail" class="w-4 h-4"></i>
                                <a href="mailto:cc@lifemedia.id" class="hover:underline">pdam.kotategal@gmail.com</a>
                            </div>
                            <div class="flex items-center gap-2">
                                <i data-lucide="phone" class="w-4 h-4"></i>
                                <span>+(0283) 356175</span>
                            </div>
                        </div>
                    </div>
                
                    <!-- Media Sosial -->
                    <div class="flex-1 min-w-[120px]">
                        <div class="mb-1 font-semibold">Media Sosial</div>
                        <div class="flex gap-2 mt-1">
                            <a href="https://www.instagram.com/tirtabaharitegal/" class="inline-block"><img src="{{ asset('assets/instagram-logo.png') }}" alt="Instagram" class="w-6 h-6"></a>
                            <a href="https://www.facebook.com/perumdamtirtabaharikotategal/" class="inline-block"><img src="{{ asset('assets/fb-logo.png') }}" alt="Facebook" class="w-6 h-6"></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
    lucide.createIcons();
    </script>
</body>
</html>
