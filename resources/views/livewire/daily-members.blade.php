<div>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Daftar Harian</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="p-5">
        <p class="text-red-500 font-bold text-[42px] text-center">Daftar Hari Ini Juga!</p>
    <form   
                action="{{route('createInvoiceDaily')}}" 
                method="post" 
                class="flex flex-col p-5 gap-3 lg:w-[500px] w-[350px] mx-auto border-red-500 border-2 rounded-lg shadow-md hover:shadow-red-400 transition duration-300 ease-in-out bg-slate-800 mt-16">
                @csrf
                
                <input type="text" name="item_name" id="item_name" value="1 hari" class="hidden">
                {{-- price --}}
                <label for="price" class="text-white hidden">
                    Rp <span class="font-bold">35.000</span>/bulan
                </label>
                <hr>
                
                {{--  --}}
                <input type="number" name="price" id="price"value="35000" class="hidden">
                <input type="number" name="qty" value="1" class="hidden">
                <hr>
                {{-- TOTAL --}}
                <div class="text-right">
                    <p class="text-white">Total Harga <span class="text-red-500 text-xl">Rp<span class="font-bold"> 35.000</span></span></p>
                </div>
                <button type="submit" class="text-white bg-red-500 rounded-xl p-1 font-bold">Daftar Harian!</button>
            </form>
    </body>
    </html>
</div>
