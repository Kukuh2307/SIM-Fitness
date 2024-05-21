<div class="fixed w-64 h-screen text-white from-red-600 to-slate-900 bg-gradient-to-tr backdrop-blur-md">
    {{-- <div class="p-4 text-2xl font-bold border-b border-gray-500">
        GYM Fitness
    </div> --}}
    <div class="flex items-center p-4">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Fit Banget" class="mx-auto mb-4"></h1>
    </div>
    <ul class="mt-10">
        <li class="px-4 py-5 text-xl font-bold hover:bg-red-700">
            <a href="{{ url('dashboard') }}">Dashboard</a>
        </li>
        <!-- Link to Members -->
        <li class="px-4 py-5 text-xl font-bold hover:bg-red-700">
            <a href="{{ url('members') }}">Members</a>
        </li>
        <li class="px-4 py-5 text-xl font-bold hover:bg-red-700">
            <a href="{{ url('list-alat') }}">Listing Alat</a>
        </li>
        <li class="px-4 py-5 text-xl font-bold hover:bg-red-700">
            <a href="{{ url('metode-pembayaran') }}">Metode Pembayaran</a>
        </li>
        <li class="px-4 py-5 text-xl font-bold hover:bg-red-700">
            <a href="{{ url('admin.instruktur') }}">Instruktur</a>
        </li>
        <li class="px-4 py-5 text-xl font-bold hover:bg-red-700">
            <a href="{{ url('admin.transaksi') }}">Transaksi</a>
        </li>
        <li class="px-4 py-5 text-xl font-bold hover:bg-red-700">
            <a href="{{ url('admin.kelas') }}">kelas</a>
        </li>
        <li class="px-4 py-5 text-xl font-bold hover:bg-red-700">
            <a href="{{ url('informasi') }}">Informasi</a>
        </li>
        <!-- Tambahkan link lainnya sesuai kebutuhan -->
    </ul>
</div>
