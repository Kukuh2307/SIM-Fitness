<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
  href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
  rel="stylesheet"
/>
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"
  rel="stylesheet"
  />
  <link rel="stylesheet" href="css/style.css">
  <!-- Link to Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.2/css/ionicons.min.css">
          <!-- Scripts -->
          @vite(['resources/css/app.css', 'resources/js/app.js'])
          @livewireStyles
  <title>Landing Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  {{-- @dd($instruktur) --}}
  @livewire('landingpage.navbar')
  @livewire('landingpage.hero-section')
  @livewire('landingpage.about-section')
  @livewire('landingpage.service-section')
  @livewire('landingpage.client-section', ['client' => $client])
  @livewire('landingpage.instruktur-section', ['instruktur' => $instruktur])
  @livewire('landingpage.contact-section')
  @livewire('landingpage.footer')
  @livewireScripts
</body>
</html>

