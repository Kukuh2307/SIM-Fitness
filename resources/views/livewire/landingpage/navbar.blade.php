<header class="fixed top-0 left-0 z-30 w-full duration-300 bg-black">
    <nav class="max-w-[1540px] m-auto py-6 px-6 max-lg:px-12 flex justify-between items-center gap-14 max-xl:gap-5 max-sm:py-4 max-sm:px-6">
      <a href="#home" class="flex items-center justify-center gap-1 text-5xl font-semibold text-white">
        <img src="{{ asset('assets/logo-2.png') }}" alt="logo" width="60" height="60" />FITNESS
  
      <ul class="flex justify-end flex-1 gap-10 max-xl:gap-7">
        <li class="text-xl font-medium text-white hover:text-red-500"><a href="#home">Home</a></li>
        <li class="text-xl font-medium text-white hover:text-red-500"><a href="#about">About</a></li>
        <li class="text-xl font-medium text-white hover:text-red-500"><a href="#services">Services</a></li>
        <li class="text-xl font-medium text-white hover:text-red-500"><a href="#contact">Contact</a></li>
  
        <div class="absolute right-[20px] translate-y-[-50%] text-2xl cursor-pointer top-[25px]">
          <button class="text-2xl cursor-pointer" id="nav-toggle">
            <i class="fi-menu"></i>
          </button>
        </div>
      </ul>

      @auth
        <a href="{{ route('dashboard') }}" class="py-4 px-7 text-xl group relative text-white bg-[orangered] rounded-sm">
          <div class="buttonDiv"></div>
          <span class="buttonSpan">DASHBOARD</span>
        </a>
      @else
        <a href="{{ route('register') }}" class="py-4 px-7 text-xl group relative text-white bg-[orangered] rounded-sm">
          <div class="buttonDiv"></div>
          <span class="buttonSpan">BECOME A MEMBER</span>
        </a>
      @endauth
    </nav>
  </header>