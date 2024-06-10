<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelas Gym</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Script -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  @livewireStyles

  <style>
    .highlight {
      border: 2px solid #f00;
    }
  </style>
</head>
<body class="text-white bg-slate-900 font-helvetica">

  <!-- Navbar -->
  <nav class="p-4 bg-gradient-to-tr from-red-600 to-slate-900">
    <div class="container flex items-center justify-between mx-auto">
      <div class="logo-container flex items-center justify-between h-10">
        <img src="{{ asset('img/logoe.png') }}" alt="Logo" class="h-full w-auto">
      </div>
      <ul class="flex space-x-6 font-bold">
        <li><a href="#home" class="hover:text-gray-300">Home</a></li>
        <li><a href="{{ url('about') }}" class="hover:text-gray-300">About</a></li>
        <li><a href="#kelas" class="hover:text-gray-300">Kelas</a></li>
        <li><a href="{{ url('contact') }}" class="hover:text-gray-300">Instructor</a></li>
        @auth
        <li><a href="{{ url('logout') }}" class="hover:text-gray-300">{{ auth()->user()->name }}</a></li>
        @else
        <li><a href="{{ url('login') }}" class="hover:text-gray-300">Login</a></li>
        <li><a href="{{ url('register') }}" class="hover:text-gray-300">Register</a></li>
        @endauth
      </ul>
    </div>
  </nav>

  <!-- Kelas Section -->
  <section id="kelas" class="py-16">
    <div class="container mx-auto text-center">
      <h2 class="text-4xl font-bold mb-8">Pilihan Kelas Gym</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Kelas Yoga -->
        <div class="p-6 bg-slate-800 rounded-lg shadow-lg kelas-item" onclick="highlightKelas(this)">
          <img src="{{ asset('img/kelas-yoga.jpg') }}" alt="Kelas Yoga" class="w-full h-40 object-cover rounded mb-4">
          <h3 class="text-2xl font-semibold mb-4">Kelas Yoga</h3>
          <p class="mb-4">Nikmati ketenangan dan keseimbangan melalui gerakan yoga. Kelas ini mencakup berbagai teknik pernapasan, peregangan, dan meditasi untuk membantu Anda mencapai keseimbangan tubuh dan pikiran.</p>
          <p><strong>Kegiatan:</strong></p>
          <ul class="list-disc list-inside mb-4">
            <li>Latihan Pernapasan</li>
            <li>Peregangan Tubuh</li>
            <li>Asanas (Posisi Yoga)</li>
            <li>Meditasi dan Relaksasi</li>
          </ul>
          <div class="flex items-center mb-4">
            <img src="{{ asset('img/instruktur-budi.jpg') }}" alt="Instruktur Budi Santoso" class="w-12 h-12 rounded-full mr-4">
            <p><strong>Instruktur:</strong> Budi Santoso</p>
          </div>
          <p class="text-xl font-bold mb-4">Rp 500,000 / bulan</p>
          <a href="#" class="inline-block px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700">Daftar Sekarang</a>
        </div>
        <!-- Kelas Zumba -->
        <div class="p-6 bg-slate-800 rounded-lg shadow-lg kelas-item" onclick="highlightKelas(this)">
          <img src="{{ asset('img/kelas-zumba.jpg') }}" alt="Kelas Zumba" class="w-full h-40 object-cover rounded mb-4">
          <h3 class="text-2xl font-semibold mb-4">Kelas Zumba</h3>
          <p class="mb-4">Tingkatkan kebugaran dengan tarian energik Zumba. Kelas ini mencampur tarian Latin dengan latihan kardiovaskular untuk memberikan pengalaman latihan yang menyenangkan dan bermanfaat.</p>
          <p><strong>Kegiatan:</strong></p>
          <ul class="list-disc list-inside mb-4">
            <li>Tarian Latin</li>
            <li>Latihan Kardiovaskular</li>
            <li>Gerakan Berirama</li>
            <li>Latihan Intensitas Tinggi</li>
          </ul>
          <div class="flex items-center mb-4">
            <img src="{{ asset('img/instruktur-siti.jpg') }}" alt="Instruktur Siti Aisyah" class="w-12 h-12 rounded-full mr-4">
            <p><strong>Instruktur:</strong> Siti Aisyah</p>
          </div>
          <p class="text-xl font-bold mb-4">Rp 450,000 / bulan</p>
          <a href="#" class="inline-block px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700">Daftar Sekarang</a>
        </div>
        <!-- Kelas CrossFit -->
        <div class="p-6 bg-slate-800 rounded-lg shadow-lg kelas-item" onclick="highlightKelas(this)">
          <img src="{{ asset('img/kelas-crossfit.jpg') }}" alt="Kelas CrossFit" class="w-full h-40 object-cover rounded mb-4">
          <h3 class="text-2xl font-semibold mb-4">Kelas CrossFit</h3>
          <p class="mb-4">Latihan intensif untuk meningkatkan kekuatan dan daya tahan. Kelas ini mencakup berbagai latihan fungsional, seperti angkat beban, latihan interval intensitas tinggi, dan banyak lagi.</p>
          <p><strong>Kegiatan:</strong></p>
          <ul class="list-disc list-inside mb-4">
            <li>Angkat Beban</li>
            <li>Latihan Fungsional</li>
            <li>Latihan Interval Intensitas Tinggi</li>
            <li>Latihan Kekuatan</li>
          </ul>
          <div class="flex items-center mb-4">
            <img src="{{ asset('img/instruktur-andi.jpg') }}" alt="Instruktur Andi Rahmat" class="w-12 h-12 rounded-full mr-4">
            <p><strong>Instruktur:</strong> Andi Rahmat</p>
          </div>
          <p class="text-xl font-bold mb-4">Rp 600,000 / bulan</p>
          <a href="#" class="inline-block px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700">Daftar Sekarang</a>
        </div>
      </div>
    </div>
  </section>

  @livewireScripts

  <script>
    function highlightKelas(element) {
      // Remove highlight class from all elements
      document.querySelectorAll('.kelas-item').forEach(function(el) {
        el.classList.remove('highlight');
      });
      // Add highlight class to the clicked element
      element.classList.add('highlight');
    }
  </script>
</body>
</html>
