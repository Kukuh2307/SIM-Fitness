<div class=" h-screen">
    <head>
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    </head>
    <div class="p-5 bg-slate-100">
       <p class="text-red-500 text-4xl">Gym Membership</p>
       <div class="flex membership-cards p-5 gap-5">
        {{-- 1 bulan --}}
            <form   
                action="{{route('createInvoice')}}" 
                method="post" 
                class="flex flex-col p-5 gap-3 w-[275px] border-red-500 border-2 rounded-lg shadow-md hover:shadow-red-400 transition duration-300 ease-in-out bg-slate-800">
                @csrf
                <label for="item_name" class="text-4xl text-red-500 font-bold">
                     1 bulan
                </label>
                <input type="text" name="item_name" id="item_name" value="1 bulan" class="hidden">
                {{-- price --}}
                <label for="price" class="text-white">
                    Rp <span class="font-bold">200.000</span>/bulan
                </label>
                <hr>
                <div class="flex flex-col text-white mb-10 gap-2">
                    <div class="flex gap-2 items-center">
                        <i class="fi fi-ss-badge-check text-[30px] text-green-500"></i>
                    <p><span class="font-bold text-red-500 flex-1">Akses tak terbatas</span> ke seluruh gym kami di seluruh Indonesia</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        <i class="fi fi-ss-badge-check text-[30px] text-green-500"></i>
                    <p><span class="font-bold text-red-500 flex-1">Gratis kelas</span> setiap harinya</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        <i class="fi fi-ss-badge-check text-[30px] text-green-500"></i>
                    <p><span class="font-bold text-red-500 flex-1">Gratis 1 sesi</span> personal training</p>
                    </div>
                </div>
                {{--  --}}
                <input type="number" name="price" id="price"value="200000" class="hidden">
                <input type="number" name="qty" value="1" class="hidden">
                <hr>
                {{-- TOTAL --}}
                <div class="text-right">
                    <p class="text-white">Total Harga <span class="text-red-500 text-xl">Rp<span class="font-bold"> 200.000</span></span></p>
                </div>
                <button type="submit" class="text-white bg-red-500 rounded-xl p-1 font-bold">Beli Membership!</button>
            </form>
        {{-- 6 bulan --}}
            <form   
                action="{{route('createInvoice')}}" 
                method="post" 
                class="flex flex-col p-5 gap-3 w-[275px] border-red-500 border-2 rounded-lg shadow-lg hover:shadow-red-500 transition duration-300 ease-in-out bg-slate-800">
                @csrf
                <label for="item_name" class="text-4xl text-red-500 font-bold">
                     6 bulan
                </label>
                <input type="text" name="item_name" id="item_name" value="6 bulan" class="hidden">
                {{-- price --}}
                <label for="price" class="text-white">
                    Rp <span class="font-bold">190.000</span>/bulan
                </label>
                <hr>
                <div class="flex flex-col text-white mb-10 gap-2">
                    <div class="flex gap-2 items-center">
                        <i class="fi fi-ss-badge-check text-[30px] text-green-500"></i>
                        <p><span class="font-bold text-red-500 flex-1">Akses tak terbatas</span> ke seluruh gym kami di seluruh Indonesia</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        <i class="fi fi-ss-badge-check text-[30px] text-green-500"></i>
                        <p><span class="font-bold text-red-500 flex-1">Gratis kelas</span> setiap harinya</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        <i class="fi fi-ss-badge-check text-[30px] text-green-500"></i>
                        <p><span class="font-bold text-red-500 flex-1">Gratis 2 sesi</span> personal training</p>
                    </div>
                </div>
                {{--  --}}
                <input type="number" name="price" id="price"value="1140000" class="hidden">
                <input type="number" name="qty" value="1" class="hidden">
                <hr>
                {{-- TOTAL --}}
                <div class="text-right">
                    <p class="text-white">Total Harga <span class="text-red-500 text-xl">Rp<span class="font-bold"> 1.140.000</span></span></p>
                </div>
                <button type="submit" class="text-white bg-red-500 rounded-xl p-1 font-bold">Beli Membership!</button>
            </form>
        {{-- 12 bulan --}}
            <form   
                action="{{route('createInvoice')}}" 
                method="post" 
                class="flex flex-col p-5 gap-3 w-[275px] border-red-500 border-2 rounded-lg shadow-lg hover:shadow-red-500 transition duration-300 ease-in-out bg-slate-800">
                @csrf
                <label for="item_name" class="text-4xl text-red-500 font-bold">
                     12 bulan
                </label>
                <input type="text" name="item_name" id="item_name" value="12 bulan" class="hidden">
                {{-- price --}}
                <label for="price" class="text-white">
                    Rp <span class="font-bold">185.000</span>/bulan
                </label>
                <hr>
                <div class="flex flex-col text-white mb-10 gap-2">
                    <div class="flex gap-2 items-center">
                        <i class="fi fi-ss-badge-check text-[30px] text-green-500"></i>
                        <p><span class="font-bold text-red-500 flex-1">Akses tak terbatas</span> ke seluruh gym kami di seluruh Indonesia</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        <i class="fi fi-ss-badge-check text-[30px] text-green-500"></i>
                        <p><span class="font-bold text-red-500 flex-1">Gratis kelas</span> setiap harinya</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        <i class="fi fi-ss-badge-check text-[30px] text-green-500"></i>
                        <p><span class="font-bold text-red-600 flex-1">Gratis 3 sesi</span> personal training</p>
                    </div>
                </div>
                {{--  --}}
                <input type="number" name="price" id="price"value="2220000" class="hidden">
                <input type="number" name="qty" value="1" class="hidden">
                <hr>
                {{-- TOTAL --}}
                <div class="text-right">
                    <p class="text-white">Total Harga <span class="text-red-500 text-xl">Rp<span class="font-bold"> 2.220.000</span></span></p>
                </div>
                <button type="submit" class="text-white bg-red-500 rounded-xl p-1 font-bold">Beli Membership!</button>
            </form>
        {{-- 24 bulan --}}
            <form   
                action="{{route('createInvoice')}}" 
                method="post" 
                class="flex flex-col p-5 gap-3 w-[275px] border-red-500 border-2 rounded-lg shadow-xl hover:shadow-red-500 transition duration-300 ease-in-out bg-slate-800">
                @csrf
                <label for="item_name" class="text-4xl text-red-500 font-bold">
                     24 bulan
                </label>
                <input type="text" name="item_name" id="item_name" value="24 bulan" class="hidden">
                {{-- price --}}
                <label for="price" class="text-white">
                    Rp <span class="font-bold">180.000</span>/bulan
                </label>
                <hr>
                <div class="flex flex-col text-white mb-10 gap-2">
                    <div class="flex gap-2 items-center">
                        <i class="fi fi-ss-badge-check text-[30px] text-green-500"></i>
                        <p><span class="font-bold text-red-500 flex-1">Akses tak terbatas</span> ke seluruh gym kami di seluruh Indonesia</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        <i class="fi fi-ss-badge-check text-[30px] text-green-500"></i>
                        <p><span class="font-bold text-red-500 flex-1">Gratis kelas</span> setiap harinya</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        <i class="fi fi-ss-badge-check text-[30px] text-green-500"></i>
                        <p><span class="font-bold text-red-500 flex-1">Gratis 6 sesi</span> personal training</p>
                    </div>
                </div>
                {{--  --}}
                <input type="number" name="price" id="price"value="4320000" class="hidden">
                <input type="number" name="qty" value="1" class="hidden">
                <hr>
                {{-- TOTAL --}}
                <div class="text-right">
                    <p class="text-white">Total Harga <span class="text-red-500 text-xl">Rp<span class="font-bold"> 4.320.000</span></span></p>
                </div>
                <button type="submit" class="text-white bg-red-500 rounded-xl p-1 font-bold">Beli Membership!</button>
            </form>
            
       </div>
        
    </div>

</div>
