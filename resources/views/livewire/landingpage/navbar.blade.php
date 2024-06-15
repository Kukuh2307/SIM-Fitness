<header class="fixed top-0 left-0 z-30 w-full duration-300 bg-black">
    <nav class="max-w-[1540px] m-auto py-6 px-6 max-lg:px-12 flex justify-between items-center gap-14 max-xl:gap-5 max-sm:py-4 max-sm:px-6">
        <a href="#home" class="flex items-center justify-center gap-1 text-5xl font-semibold text-white">
            <img src="{{ asset('assets/logo-2.png') }}" alt="logo" width="60" height="60" />FITNESS
        </a>

        <ul class="flex justify-end flex-1 gap-10 max-xl:gap-7">
            <li class="relative text-xl font-medium text-white group">
                <a href="#home" class="flex items-center justify-center gap-1 group-hover:text-white">
                    <div class="buttonDiv"></div>
                    <span class="px-4 py-2 buttonSpan">Home</span>
                </a>
            </li>
            <li class="relative text-xl font-medium text-white group">
                <a href="#about" class="flex items-center justify-center gap-1 group-hover:text-white">
                    <div class="buttonDiv"></div>
                    <span class="px-4 py-2 buttonSpan">About</span>
                </a>
            </li>
            <li class="relative text-xl font-medium text-white group">
                <a href="#services" class="flex items-center justify-center gap-1 group-hover:text-white">
                    <div class="buttonDiv"></div>
                    <span class="px-4 py-2 buttonSpan">Services</span>
                </a>
            </li>
            <li class="relative text-xl font-medium text-white group">
                <a href="#contact" class="flex items-center justify-center gap-1 group-hover:text-white">
                    <div class="buttonDiv"></div>
                    <span class="px-4 py-2 buttonSpan">Contact</span>
                </a>
            </li>
        </ul>

        <div class="absolute right-[20px] translate-y-[-50%] text-2xl cursor-pointer top-[25px]">
            <button class="text-2xl cursor-pointer" id="nav-toggle">
                <i class="fi-menu"></i>
            </button>
        </div>

        @auth
            <div class="relative" x-data="{ open: false }">
                <div @click="open = !open" class="flex items-center cursor-pointer">
                    <div class="buttonDiv"></div>
                    <span class="buttonSpan">{{ auth()->user()->name }}</span>
                    <x-heroicon-s-chevron-down class="w-5 h-5 ml-2 buttonSpan" />
                </div>
                <div x-show="open" @click.away="open = false" class="absolute right-0 z-50 w-48 py-1 mt-2 bg-black rounded-md shadow-lg">
                    @if(auth()->user()->Role == 'admin')
                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-white hover:text-black hover:bg-gray-100">
                            {{ __('Dashboard Admin') }}
                        </a>
                    @endif
                    @if(auth()->user()->Role == 'member' || auth()->user()->Role == 'user')
                        <a href="{{ url('user-dashboard') }}" class="block px-4 py-2 text-sm text-white hover:text-black hover:bg-gray-100">
                            {{ __('Dashboard') }}
                        </a>
                    @endif
                    <div class="border-t border-gray-100"></div>

                    <x-dropdown-link :href="route('logout')" method="post" class="w-full text-start">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </div>
            </div>
        @else
        <div class="flex">
            <a href="{{ route('login') }}" class="py-2 px-5 text-xl group relative text-white bg-[orangered] rounded-sm">
                <div class="buttonDiv"></div>
                <span class="buttonSpan">LOGIN</span>
            </a>
            <a href="{{ route('register') }}" class="py-2 px-5 text-xl group relative text-[orangered] bg-white rounded-sm ml-3">
                <div class="buttonDiv2"></div>
                <span class="buttonSpan2">REGISTER</span>
            </a>
        </div>
        @endauth
    </nav>
</header>


