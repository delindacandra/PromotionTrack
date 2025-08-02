<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permintaan Barang Promosi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .hero-bg {
            background-image: url("{{ asset('/images/pertaminajatimbalinus_building.jpg') }}");
            background-size: cover;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Header -->
    <header class="absolute top-0 left-0 w-full flex justify-end items-center px-6 py-4 z-20">
        <a href="{{ route('login') }}" class="text-white font-semibold hover:underline">Login</a>
    </header>

    <!-- Hero Section -->
    <section class="hero-bg relative min-h-screen flex items-center justify-center text-white text-center px-4">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-700/80 to-indigo-800/80 z-0"></div>
        <div class="relative z-10 max-w-3xl">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Sistem Permintaan Barang Promosi</h1>
            <p class="text-lg md:text-xl mb-6">Kelola permintaan barang promosi dengan lebih terstruktur dan efisien.
            </p>
            <a href="#about"
                class="bg-white text-blue-700 font-semibold px-6 py-3 rounded-full shadow hover:bg-gray-100 transition">
                Lebih Jauh Mengenai Sistem
            </a>
        </div>
    </section>

    <!-- About -->
    <section id="about" class="min-h-screen flex items-center justify-center bg-gray-50 px-6 py-16">
        <div class="max-w-6xl w-full flex flex-col md:flex-row items-center justify-center gap-10">
            <div class="w-full md:w-1/2 flex justify-center">
                <img src="{{ asset('/images/pertaminajatimbalinus_building.jpg') }}" alt="About"
                    class="rounded-lg shadow-lg w-[80%] md:w-[70%] lg:w-[60%] object-cover">
            </div>
            <div class="w-full md:w-1/2 text-center md:text-left">
                <h2 class="text-3xl font-bold mb-4">About</h2>
                <h3 class="text-xl text-indigo-700 font-semibold italic mb-4">Sistem Permintaan Barang Promosi</h3>
                <p class="text-gray-700 leading-relaxed text-justify">
                    Sistem ini dirancang untuk mempermudah proses pengajuan, pengelolaan, dan pelaporan barang promosi
                    yang digunakan oleh PT Pertamina Patra Niaga Jatimbalinus. Dengan sistem ini, seluruh unit kerja
                    dapat melakukan permintaan barang secara terstruktur, terdata dengan baik, serta memungkinkan
                    pengawasan dan rekap data yang akurat.
                </p>
                <a href="#fitur"
                    class="inline-block mt-6 bg-red-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-red-700 transition">
                    Lihat Fitur
                </a>
            </div>
        </div>
    </section>

    <!-- Fitur Utama -->
    <section id="fitur" class="relative min-h-screen flex flex-col items-center justify-center px-6 py-16 hero-bg">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-700/80 to-indigo-800/80 z-0"></div>
        <div class="bg-white bg-opacity-80 rounded-lg p-10 shadow-lg relative z-10 text-center max-w-5xl w-full text-black">
            <h2 class="text-3xl font-semibold mb-10">Fitur Utama</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-8">
                <div>
                    <h3 class="text-xl font-medium mb-2">Permintaan Barang</h3>
                    <p class="text-sm text-gray-700">Ajukan permintaan barang promosi dengan sistem digital yang mudah
                        digunakan.</p>
                </div>
                <div>
                    <h3 class="text-xl font-medium mb-2">Otomatisasi Laporan</h3>
                    <p class="text-sm text-gray-700">Lihat laporan stok barang promosi secara real-time dan otomatis
                        tanpa proses manual.</p>
                </div>
                <div>
                    <h3 class="text-xl font-medium mb-2">Rekap & Laporan</h3>
                    <p class="text-sm text-gray-700">Dapatkan laporan dan rekap penggunaan barang promosi untuk
                        evaluasi.</p>
                </div>
            </div>
            <a href="#contoh-penggunaan"
                class="inline-block bg-red-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-red-700 transition">
                Lihat Contoh Penggunaan
            </a>
        </div>
    </section>


    <!-- Contoh Penggunaan Barang Promosi -->
    <section id="contoh-penggunaan" class="min-h-screen flex items-center justify-center bg-white px-6 py-16">
        <div class="max-w-6xl text-center">
            <h2 class="text-3xl font-semibold mb-10">Contoh Penggunaan Barang Promosi</h2>
            <p class="text-gray-600 mb-12 max-w-3xl mx-auto">Barang promosi digunakan dalam berbagai kegiatan seperti
                event kampus, sosialisasi SPBU, kampanye edukasi energi, dan acara lainnya.</p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-4 flex flex-col h-full">
                    <img src="{{ asset('/images/contoh_ganci.jpeg') }}" alt="Gantungan Kunci Jiffy"
                        class="rounded mb-4 h-48 w-full object-cover">
                    <h3 class="font-medium text-lg mb-2">Gantungan Kunci Jiffy</h3>
                    <p class="text-sm text-gray-600 flex-grow">Merchandise kecil yang menarik, cocok dibagikan dalam
                        kegiatan promosi dan sosialisasi ke masyarakat.</p>
                </div>
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-4 flex flex-col h-full">
                    <img src="{{ asset('/images/contoh_celemek.jpeg') }}" alt="Celemek Bright Gas"
                        class="rounded mb-4 h-48 w-full object-cover">
                    <h3 class="font-medium text-lg mb-2">Celemek Bright Gas</h3>
                    <p class="text-sm text-gray-600 flex-grow">Digunakan dalam demo masak atau promosi produk Bright Gas
                        untuk meningkatkan kesadaran brand.</p>
                </div>
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-4 flex flex-col h-full">
                    <img src="{{ asset('/images/contoh_topi.jpeg') }}" alt="Topi MyPertamina"
                        class="rounded mb-4 h-48 w-full object-cover">
                    <h3 class="font-medium text-lg mb-2">Topi MyPertamina</h3>
                    <p class="text-sm text-gray-600 flex-grow">Topi berlogo MyPertamina yang digunakan untuk mendukung
                        promosi aplikasi dan program loyalitas.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-6 bg-gray-100 border-t text-sm text-gray-500">
        &copy; {{ date('Y') }} PT Pertamina Patra Niaga Jatimbalinus
    </footer>

</body>

</html>
