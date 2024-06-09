<section class="w-full min-h-screen">
    {{-- @dd($kelas) --}}
    <div class="relative flex items-center justify-between gap-20 mx-20 mt-44 max-container padding-hero-y max-lg:flex-col padding-x">
        <div class="relative flex items-center justify-center flex-1 max-lg:w-full">
            <img src="{{ Storage::url($kelas[$currSlide]['Foto']) }}" alt="clientImg" class="object-cover object-center h-[700px] w-[95%] max-lg:w-full transition-transform ease-in-out duration-200 max-sm:h-[400px] ml-20" />
            {{-- <x-ri-double-quotes-r class="absolute top-[50%] translate-y-[-50%] -right-[75px] text-[#f04e3c] text-[180px] max-lg:hidden" /> --}}
        </div>
  
        <div class="flex-1">
            <p class="text-[#f04e3c] relative before:absolute before:w-20 before:h-1 before:bg-[#f04e3c] before:top-[50%] before:left-0 pl-24 text-2xl before:translate-y-[-50%]">INFORMASI KELAS</p>
            <div class="my-7 text-5xl leading-[60px] font-semibold text-black max-sm:text-3xl">
                <h1>DAFTAR KELAS</h1>
                <h1>YANG TERSEDIA DI TEMPAT KAMI</h1>
            </div>
  
            <div class="relative flex flex-col">
                <h2 class="mb-8 text-2xl font text-[#f04e3c] uppercase font-semibold">{{ $kelas[$currSlide]['Nama_Kelas'] }}</h2>
                <p class="font text-lg text-slate-500 mb-8 w-[85%] max-sm:w-full">
                    {{ $kelas[$currSlide]['Deskripsi'] }}
                </p>
            </div>
  
            <h1 class="flex items-center gap-4 text-xl font-semibold">{{ $kelas[$currSlide]->instruktur->Nama }}<span class="text-base text-slate-500"> - Rp.{{ number_format($kelas[$currSlide]['Biaya'], 0, ',', '.') }} - Instruktur</span></h1>
  
            <div class="flex justify-start mt-20 text-4xl max-lg:mt-5">
                @foreach ($kelas as $index => $val)
                    <div wire:click="setSlide({{ $index }})" class="cursor-pointer {{ $currSlide === $index ? 'text-[#f04e3c]' : 'text-4xl' }}">
                        {{-- <x-bs-dot /> --}}
                    </div>
                @endforeach
            </div>
        </div>
  
        <div class="absolute left-4 max-lg:top-[25%] h-10 w-10 flex justify-center items-center max-lg:left-1 max-lg:-translate-y-[-50%] text-4xl max-lg:text-2xl text-[#f04e3c] cursor-pointer rounded-full hover:bg-black hover:text-white duration-300 max-sm:top-[460px] max-sm:left-32 max-sm:rounded-full" wire:click="prevSlide">
          <x-ionicon-arrow-back-circle-sharp />
        </div>
  
        <div class="absolute right-4 max-lg:top-[25%] h-10 w-10 flex justify-center items-center max-lg:right-1 max-lg:-translate-y-[-50%] text-4xl max-lg:text-2xl text-[#f04e3c] cursor-pointer rounded-full hover:bg-black hover:text-white duration-300 max-sm:top-[460px] max-sm:right-32" wire:click="nextSlide">
          <x-heroicon-s-arrow-right-circle />
        </div>
    </div>
  </section>
  