<div class="fixed w-64 h-screen text-white from-red-600 to-slate-800 bg-gradient-to-tr backdrop-blur-md">
    <div class="flex items-center justify-center p-4">
        <img src="{{ asset('images/logo-rev2.png') }}" alt="Logo Fit Banget" class="h-auto w-45">
    </div>
    <ul class="-mt-10">
        <li class="flex items-center justify-start px-10 py-5 text-xl font-bold hover:bg-red-700 {{ $title == 'Dashboard' ? 'bg-red-700' : '' }}">
            <img src="{{ asset('images/dashboard.png') }}" alt="Dashboard Icon" class="w-10 mr-5 filter invert">
            <a href="{{ url('dashboard') }}" class="w-full text-left">Dashboard</a>
        </li>
        <li class="flex items-center justify-start px-10 py-5 text-xl font-bold hover:bg-red-700 {{ $title == 'Members' ? 'bg-red-700' : '' }}">
            <img src="{{ asset('images/member.png') }}" alt="Members Icon" class="w-10 mr-5 filter invert">
            <a href="{{ url('members') }}" class="w-full text-left">Members</a>
        </li>
        <li class="flex items-center justify-start px-10 py-5 text-xl font-bold hover:bg-red-700 {{ $title == 'Listing Alat' ? 'bg-red-700' : '' }}">
            <img src="{{ asset('images/listalat.png') }}" alt="Listing Alat Icon" class="w-10 mr-5 filter invert">
            <a href="{{ url('listing-alat') }}" class="w-full text-left">Listing Alat</a>
        </li>
        <li class="flex items-center justify-start px-10 py-5 text-xl font-bold hover:bg-red-700 {{ $title == 'Instruktur' ? 'bg-red-700' : '' }}">
            <img src="{{ asset('images/instruktur.png') }}" alt="Instruktur Icon" class="w-10 mr-5 filter invert">
            <a href="{{ url('instruktur') }}" class="w-full text-left">Instruktur</a>
        </li>
        <li class="flex items-center justify-start px-10 py-5 text-xl font-bold hover:bg-red-700 {{ $title == 'Transaksi' ? 'bg-red-700' : '' }}">
            <img src="{{ asset('images/transaksi.png') }}" alt="Transaksi Icon" class="w-10 mr-5 filter invert">
            <a href="{{ url('transaksi') }}" class="w-full text-left">Transaksi</a>
        </li>
        <li class="flex items-center justify-start px-10 py-5 text-xl font-bold hover:bg-red-700 {{ $title == 'Kelas' ? 'bg-red-700' : '' }}">
            <img src="{{ asset('images/class.png') }}" alt="Kelas Icon" class="w-10 mr-5 filter invert">
            <a href="{{ url('kelas') }}" class="w-full text-left">Kelas</a>
        </li>
        <li class="flex items-center justify-start px-10 py-5 text-xl font-bold hover:bg-red-700 {{ $title == 'Informasi' ? 'bg-red-700' : '' }}">
            <img src="{{ asset('images/informasi.png') }}" alt="Informasi Icon" class="w-10 mr-5 filter invert">
            <a href="{{ url('informasi') }}" class="w-full text-left">Informasi</a>
        </li>
        <li class="mt-5 flex items-center justify-start px-10 py-5 text-xl font-bold hover:bg-red-700 {{ $title == 'Setting' ? 'bg-red-700' : '' }}">
            <img src="{{ asset('images/logout.png') }}" alt="logout Icon" class="w-10 mr-5 filter invert">
            <a href="{{ url('logout') }}" class="w-full text-left">logout</a>
        </li>
    </ul>
</div>


