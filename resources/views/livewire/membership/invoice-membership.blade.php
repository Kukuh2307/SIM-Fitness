<div class="p-5">
    <head>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            iframe::-webkit-scrollbar{
                display: none;
            }
        </style>
    </head>
    <a href="/" class="font-bold">&#8592 Kembali</a>
    @if ($invoice)
    <div class="">
        <iframe src="{{$invoice->invoice_url}}" frameborder="0"  class="sm:w-[1200]  mx-auto sm:h-[450px] overflow-y-hidden rounded-lg mt-2"></iframe>
    </div>
    
    @endif
</div>
