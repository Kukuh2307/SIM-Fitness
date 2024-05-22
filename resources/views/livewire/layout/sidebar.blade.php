<div class="fixed w-64 h-screen text-white from-red-600 to-slate-900 bg-gradient-to-tr backdrop-blur-md">
    <div class="flex items-center">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Fit Banget">
    </div>
    <ul class="mt-10">
        <li class="flex items-center justify-center px-4 py-5 text-xl font-bold hover:bg-red-700">
            <a href="{{ url('dashboard') }}" class="w-full text-center">Dashboard</a>
        </li>
        <li class="flex items-center justify-center px-4 py-5 text-xl font-bold hover:bg-red-700">
            <a href="{{ url('members') }}" class="w-full text-center">Members</a>
        </li>
        <li class="flex items-center justify-center px-4 py-5 text-xl font-bold hover:bg-red-700">
            <a href="{{ url('list-alat') }}" class="w-full text-center">Listing Alat</a>
        </li>
        <li class="flex items-center justify-center px-4 py-5 text-xl font-bold hover:bg-red-700">
            <a href="{{ url('metode-pembayaran') }}" class="w-full text-center">Metode Pembayaran</a>
        </li>
        <li class="flex items-center justify-center px-4 py-5 text-xl font-bold hover:bg-red-700">
            <a href="{{ url('admin.instruktur') }}" class="w-full text-center">Instruktur</a>
        </li>
        <li class="flex items-center justify-center px-4 py-5 text-xl font-bold hover:bg-red-700">
            <a href="{{ url('admin.transaksi') }}" class="w-full text-center">Transaksi</a>
        </li>
        <li class="flex items-center justify-center px-4 py-5 text-xl font-bold hover:bg-red-700">
            <a href="{{ url('admin.kelas') }}" class="w-full text-center">kelas</a>
        </li>
        <li class="flex items-center justify-center px-4 py-5 text-xl font-bold hover:bg-red-700">
            <a href="{{ url('informasi') }}" class="w-full text-center">Informasi</a>
        </li>
        <!-- Tambahkan link lainnya sesuai kebutuhan -->
    </ul>
</div>
