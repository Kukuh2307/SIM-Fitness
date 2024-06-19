<section id='contact' class="w-full">
    <div class="max-w-[1500px] m-auto grid grid-cols-2 items-center gap-10 py-0 max-xl:pt-[100px] max-lg:pt-[0px] max-lg:pb-[60px] max-md:pt-[0px] max-md:pb-[70px] max-lg:grid-cols-1 max-lg:gap-6 padding-x">
      <div class="h-[80%] max-lg:max-w-[50%] max-md:max-w-[70%] max-sm:max-w-[100%] max-md:h-[100%]">
        <img src="{{ asset('assets/img-11.jpg') }}" alt="ContactImg" class="object-cover w-full h-full" />
      </div>
  
      <div class="px-5 max-lg:px-0">
        <p class="w-fit text-[#f04e3c] relative before:absolute before:w-20 before:h-1 before:bg-[#f04e3c] before:top-[50%] before:left-0 pl-24 text-2xl before:translate-y-[-50%]">KONTAK KAMI</p>
  
        <div class="text-5xl font-semibold leading-[70px] mt-5 mb-20 max-xl:leading-[50px] max-xl:mb-10 max-sm:text-3xl">
          <h1>JANGAN RAGU UNTUK</h1>
          <h1>MENGHUBUNGI KAMI!</h1>
        </div>
  
        <div class="grid grid-cols-2 gap-14 max-xl:gap-10 max-lg:gap-14 max-md:grid-cols-1 max-sm:w-[90%] max-sm:m-auto">
          <input type="text" placeholder='Name' class="input" />
          <input type="text" placeholder='Phone' class="input" />
          <select class="text-lg input text-slate-500">
            <option value="Boxing">Boxing</option>
            <option value="Cardio">Cardio</option>
            <option value="Chest">Chest</option>
            <option value="Shoulder">Shoulder</option>
            <option value="Triceps">Triceps</option>
          </select>
  
          <input type="email" placeholder='Email' class="input" />
          <textarea placeholder='Message' class="col-span-2 resize-none h-36 input max-md:col-span-1"></textarea>
        </div>
        <button class="mt-20 py-4 px-9 text-xl group relative text-white bg-[orangered] rounded-sm max-xl:mt-10">
          <div class="buttonDiv"></div>
          <span class="buttonSpan">KIRIM PESAN</span>
        </button>
      </div>
    </div>
  </section>