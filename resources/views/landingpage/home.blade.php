<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="text-white bg-slate-900">

  <!-- Navbar -->
  <nav class="p-4 bg-red-600">
    <div class="container flex items-center justify-between mx-auto">
      <a href="#" class="text-2xl font-bold">BrandName</a>
      <ul class="flex space-x-6">
        <li><a href="#home" class="hover:text-gray-300">Home</a></li>
        <li><a {{ url('about') }}  class="hover:text-gray-300">About</a></li>
        <li><a {{ url('service') }} class="hover:text-gray-300">Services</a></li>
        <li><a {{ url('contact') }} class="hover:text-gray-300">Contact</a></li>
        @auth
        <li><a href="{{ url('logout') }}" class="hover:text-gray-300">{{ auth()->user()->name }}</a></li>
        @else
        <li><a href="{{ url('login') }}" class="hover:text-gray-300">Login</a></li>
        <li><a href="{{ url('register') }}" class="hover:text-gray-300">Register</a></li>
        @endauth
      </ul>
    </div>
  </nav>

  <!-- Hero Section -->
  <section id="home" class="flex items-center justify-center h-screen bg-center bg-cover" style="background-image: url('https://source.unsplash.com/random/1600x900');">
    <div class="text-center">
      <h1 class="mb-4 text-5xl font-bold">Welcome to Our Landing Page</h1>
      <p class="mb-8 text-lg">We provide the best services for you.</p>
      <a href="#services" class="px-4 py-2 text-black bg-white rounded-full">Explore Services</a>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="py-20 bg-slate-900">
    <div class="container mx-auto text-center">
      <h2 class="mb-8 text-4xl font-bold">About Us</h2>
      <p class="max-w-3xl mx-auto text-lg">We are a leading company in our industry, committed to providing quality services to our clients. Our team is dedicated and experienced, ready to help you achieve your goals.</p>
    </div>
  </section>

  <!-- Services Section -->
  <section id="services" class="py-20 bg-red-600">
    <div class="container mx-auto text-center">
      <h2 class="mb-8 text-4xl font-bold">Our Services</h2>
      <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
        <div class="p-6 text-black bg-white rounded-lg">
          <h3 class="mb-4 text-2xl font-bold">Service One</h3>
          <p>High-quality service to meet your needs.</p>
        </div>
        <div class="p-6 text-black bg-white rounded-lg">
          <h3 class="mb-4 text-2xl font-bold">Service Two</h3>
          <p>Reliable and efficient solutions for your business.</p>
        </div>
        <div class="p-6 text-black bg-white rounded-lg">
          <h3 class="mb-4 text-2xl font-bold">Service Three</h3>
          <p>Expertise and professionalism at every step.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="py-20 bg-slate-900">
    <div class="container mx-auto text-center">
      <h2 class="mb-8 text-4xl font-bold">Contact Us</h2>
      <p class="mb-8 text-lg">Have any questions? We'd love to hear from you.</p>
      <form class="max-w-xl mx-auto">
        <div class="mb-4">
          <input type="text" class="w-full p-2 text-white bg-gray-800 rounded-lg" placeholder="Your Name">
        </div>
        <div class="mb-4">
          <input type="email" class="w-full p-2 text-white bg-gray-800 rounded-lg" placeholder="Your Email">
        </div>
        <div class="mb-4">
          <textarea class="w-full p-2 text-white bg-gray-800 rounded-lg" rows="4" placeholder="Your Message"></textarea>
        </div>
        <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded-full">Send Message</button>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-4 bg-black">
    <div class="container mx-auto text-center">
      <p>&copy; 2024 BrandName. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
