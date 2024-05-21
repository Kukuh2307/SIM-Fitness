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
      <div class="logo-container flex items-center justify-between h-10">
      <img src="{{ asset('img/logoe.png') }}" alt="Logo" class="h-full w-auto">
      <a href="#" class="text-2xl font-bold ml-2">Fit Banget</a>
      </div>
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
  <section id="home" class="flex items-center justify-start h-screen bg-center bg-cover backdrop-blur-lg" style="background-image: url('https://images.unsplash.com/photo-1599121118834-14b8ab00020c?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
    <div class="relative p-8 ml-12 text-left text-white">
      <h1 class="mb-4 text-5xl font-bold">Welcome to Fit Banget</h1>
      <p class="mb-8 text-lg">Get a Personalized Fitness Plan That Gets Results</p>
      <a href="#services" class="px-4 py-2 text-black bg-white rounded-full hover:text-gray-300">Explore Services</a>
    </div>
    
  </section>

  <!-- About Section -->
  <section id="about" class="py-20 bg-slate-900">
    <div class="container mx-auto text-center">
      <h2 class="mb-8 text-4xl font-bold">About Us</h2>
      <p class="max-w-3xl mx-auto text-lg">We are a leading Gym, Fitnes Banget has all the facilities you need, and has a variety of programs, also We have experienced trainer</p>
    </div>
  </section>

  <!-- Services Section -->
  <section id="services" class="py-20 bg-red-600">
    <div class="container mx-auto text-center">
      <h2 class="mb-8 text-4xl font-bold">Our Training Program</h2>
      <div class="grid grid-cols-1 gap-8 md:grid-cols-4">
        <div class="p-6 text-black bg-white rounded-lg">
          <img src="{{ asset('img/pt-img.jpg')}}" alt="Personal Trainer" class="w-full h-48 mb-4 rounded-lg object-cover">
          <h3 class="mb-4 text-2xl font-bold">Personal Trainer</h3>
          <p>High-quality service to meet your needs.</p>
          <a href="#personal-trainer" class="inline-block px-4 py-2 mt-4 text-white bg-red-600 rounded-full hover:bg-red-700">View More</a>
        </div>
        <div class="p-6 text-black bg-white rounded-lg">
        <img src="{{ asset('img/group-fitness.jpg')}}" alt="Personal Trainer" class="w-full h-48 mb-4 rounded-lg object-cover">
          <h3 class="mb-4 text-2xl font-bold">Group Fitness</h3>
          <p>Reliable and efficient solutions for your business.</p>
          <a href="#group-fitness" class="inline-block px-4 py-2 mt-4 text-white bg-red-600 rounded-full hover:bg-red-700">View More</a>
        </div>
        <div class="p-6 text-black bg-white rounded-lg">
        <img src="{{ asset('img/cardio.jpg')}}" alt="Personal Trainer" class="w-full h-48 mb-4 rounded-lg object-cover">
          <h3 class="mb-4 text-2xl font-bold">Cardio exercise</h3>
          <p>Expertise and professionalism at every step.</p>
          <a href="#Cardio-Exercise" class="inline-block px-4 py-2 mt-4 text-white bg-red-600 rounded-full hover:bg-red-700">View More</a>
        </div>
        <div class="p-6 text-black bg-white rounded-lg">
        <img src="{{ asset('img/weight.jpg')}}" alt="Personal Trainer" class="w-full h-48 mb-4 rounded-lg object-cover">
          <h3 class="mb-4 text-2xl font-bold">Weight Exercise</h3>
          <p>Expertise and professionalism at every step.</p>
          <a href="#weigth-execise" class="inline-block px-4 py-2 mt-4 text-white bg-red-600 rounded-full hover:bg-red-700">View More</a>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Instructor Section -->
  <section id="instuctor" class="py-20 bg-slate-900">
  <div class="container mx-auto text-center">
      <h2 class="mb-8 text-4xl font-bold">Meet Personal Trainer</h2>
      <div class="grid grid-cols-1 gap-8 md:grid-cols-4">
        <div class="p-6 text-black bg-white rounded-lg">
          <img src="{{ asset('img/lampard.jpg')}}" alt="Personal Trainer" class="w-full h-48 mb-4 rounded-lg object-cover">
          <h3 class="mb-4 text-2xl font-bold">Frank Lampard</h3>
          <p>I believe in creating a supportive and encouraging environment to help you thrive.</p>
        </div>
        <div class="p-6 text-black bg-white rounded-lg">
          <img src="{{ asset('img/carlo.jpg')}}" alt="Personal Trainer" class="w-full h-48 mb-4 rounded-lg object-cover">
          <h3 class="mb-4 text-2xl font-bold">Carlo Ancelotti</h3>
          <p>Certified Trainer with 30 Years of Experience</p>
        </div>
        <div class="p-6 text-black bg-white rounded-lg">
          <img src="{{ asset('img/pep.jpg')}}" alt="Personal Trainer" class="w-full h-48 mb-4 rounded-lg object-cover">
          <h3 class="mb-4 text-2xl font-bold">Pep Guardiola</h3>
          <p>Unleash Your Potential and Feel Your Best Self</p>
        </div>
        <div class="p-6 text-black bg-white rounded-lg">
          <img src="{{ asset('img/klopp.jpg')}}" alt="Personal Trainer" class="w-full h-48 mb-4 rounded-lg object-cover">
          <h3 class="mb-4 text-2xl font-bold">Jurgen Klopp</h3>
          <p>Train with Me and Experience the Transformation Journey Together</p>
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
      <p>&copy; 2024 Fit Banget. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
