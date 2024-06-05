<div class="fixed w-64 h-screen text-white from-red-600 to-slate-800 bg-gradient-to-tr backdrop-blur-md">
    <div class="flex items-center justify-center p-4">
        <img src="{{ asset('images/baru.png') }}" alt="Logo Fit Banget" class="w-45 h-auto">
    </div>
    <ul class="mt-10">
        <li class="flex items-center justify-center px-4 py-5 text-xl font-bold hover:bg-red-700 {{ $title == 'Dashboard' ? 'bg-red-700' : '' }}">
            <a href="{{ url('dashboard') }}" class="w-full text-center">Dashboard</a>
        </li>
        <li class="flex items-center justify-center px-4 py-5 text-xl font-bold hover:bg-red-700 {{ $title == 'Members' ? 'bg-red-700' : '' }}">
            <a href="{{ url('members') }}" class="w-full text-center">Members</a>
        </li>
        <li class="flex items-center justify-center px-4 py-5 text-xl font-bold hover:bg-red-700 {{ $title == 'Listing Alat' ? 'bg-red-700' : '' }}">
            <a href="{{ url('list-alat') }}" class="w-full text-center">Listing Alat</a>
        </li>
        <li class="flex items-center justify-center px-4 py-5 text-xl font-bold hover:bg-red-700 {{ $title == 'Metode Pembayaran' ? 'bg-red-700' : '' }}">
            <a href="{{ url('metode-pembayaran') }}" class="w-full text-center">Metode Pembayaran</a>
        </li>
        <li class="flex items-center justify-center px-4 py-5 text-xl font-bold hover:bg-red-700 {{ $title == 'Instruktur' ? 'bg-red-700' : '' }}">
            <a href="{{ url('instruktur') }}" class="w-full text-center">Instruktur</a>
        </li>
        <li class="flex items-center justify-center px-4 py-5 text-xl font-bold hover:bg-red-700 {{ $title == 'Transaksi' ? 'bg-red-700' : '' }}">
            <a href="{{ url('transaksi') }}" class="w-full text-center">Transaksi</a>
        </li>
        <li class="flex items-center justify-center px-4 py-5 text-xl font-bold hover:bg-red-700 {{ $title == 'Kelas' ? 'bg-red-700' : '' }}">
            <a href="{{ url('kelas') }}" class="w-full text-center">Kelas</a>
        </li>
        <li class="flex items-center justify-center px-4 py-5 text-xl font-bold hover:bg-red-700 {{ $title == 'Informasi' ? 'bg-red-700' : '' }}">
            <a href="{{ url('informasi') }}" class="w-full text-center">Informasi</a>
        </li>
    </ul>
</div>


