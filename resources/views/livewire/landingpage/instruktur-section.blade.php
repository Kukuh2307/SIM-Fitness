<section class="w-full min-h-screen mb-32">
    <div class="mx-20 max-container padding-hero-y padding-x">
      <div class="flex items-end justify-between mb-28 max-md:flex-col max-md:items-start max-md:gap-5 max-md:mb-20">
        <div>
          <p class="text-[#f04e3c] relative before:absolute before:w-20 before:h-1 before:bg-[#f04e3c] before:top-[50%] before:left-0 pl-24 text-2xl before:translate-y-[-50%]">INSTRUIKTUR PROFESIONAL</p>
          <div class="text-6xl text-black mt-8 leading-[60px] font-semibold max-sm:text-3xl">
            <h1>PARA INSTURKTUR KAMI</h1>
            <h1>YANG BERPENGALAMAN</h1>
          </div>
        </div>
  
        <div>
          <button class="py-4 px-9 text-xl group relative text-white bg-[orangered] rounded-sm">
            <div class="buttonDiv"></div>
            <span class="buttonSpan">DAFTAR MEMBER</span>
          </button>
        </div>
      </div>
      {{-- @dd($instruktur) --}}
  
      <div class="grid grid-cols-3 gap-10 max-lg:grid-cols-2 max-lg:gap-5 max-sm:grid-cols-1">
        @foreach ($instruktur as $instruktur)
          <div class="relative overflow-hidden group">
            <img src="{{ Storage::url($instruktur['Foto']) }}" alt="TeamMembers" class="h-full object-cover max-sm:h-[65vh]" />
  
            <div class="absolute bottom-[-70px] duration-[.4s] group-hover:bottom-0 left-0 w-full group-hover:bg-[red] p-7 pb-8">
              <p class="font mb-2 text-gray-300 relative before:absolute before:w-10 before:h-1 before:bg-[#f04e3c] before:top-[50%] before:left-0 pl-14 text-lg before:translate-y-[-60%] group-hover:text-white group-hover:before:bg-white">{!! $instruktur['Nama'] !!}</p>
              <h1 class="text-xl font-semibold text-white font">{!! $instruktur['Spesialis'] !!}</h1>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>


