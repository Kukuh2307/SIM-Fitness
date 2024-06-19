@extends('livewire.user.dashboard-user')

@section('content')
<div class="p-4 mt-14">
    <div class="p-4 sm:ml-64">
        <div class="grid grid-cols-1 gap-4 mb-4">
            <!-- Profile Summary -->
            <div class="col-span-2 p-4 bg-white rounded-lg dark:bg-gray-800">
                <div class="flex items-center mb-4">
                    <img class="w-16 h-16 rounded-full" src="{{ Storage::url($user->Foto) }}" alt="user photo">
                    <div class="ml-4">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $user->name }}</h2>
                        <p class="text-sm text-center text-black bg-green-300"><b>{{ $user->Role }}</b></p>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-1">
                    <div class="text-center bg-red-100 rounded-lg p-7 dark:bg-gray-700">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $total_transaksi_harian }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Total Transaksi Harian</p>
                    </div>
                    <div class="text-center bg-red-100 rounded-lg p-7 dark:bg-gray-700">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $total_transaksi_kelas }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Total Kelas</p>
                    </div>
                    <div class="text-center bg-red-100 rounded-lg p-7 dark:bg-gray-700">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $total_transaksi }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-300">Total Transaksi</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kelas Details & Activities -->
        <div class="grid grid-cols-2 gap-3 ">
            @if (Auth::user()->Role == 'member')                
            <!-- Kelas Details -->
            <div class="p-4 bg-white rounded-lg dark:bg-gray-800">
                <h3 class="mb-4 text-2xl font-semibold text-gray-900 dark:text-white">Kelas Aktif</h3>
                <div class="flex flex-col bg-white rounded-lg text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white md:flex-row">
                <img
                    class="h-48 w-48 rounded-t-lg object-cover md:w-48 md:!rounded-none md:!rounded-s-lg"
                    src="{{ Storage::url($kelas->first()->Foto) }}"
                    alt="" />
                <div class="flex flex-col justify-start px-6 overflow-hidden">
                    <h5 class="mb-2 text-xl font-medium">{{ $kelas->first()->Nama_Kelas }}</h5>
                    <p class="block mb-4 overflow-hidden" style="height: 100px;">{{ $kelas->first()->Deskripsi }}</p>
                    {{-- @dd($kelas) --}}
                    <p class="text-xs text-surface/75 dark:text-neutral-300">
                    {{ $kuota_terisi }} / {{ $kelas->first()->Kuota }}
                    </p>
                </div>
                </div>
            </div>
            <!-- User Activities -->
            <div class="p-4 bg-white rounded-lg dark:bg-gray-800">
                <h3 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">Member Expired</h3>
                @php
                $member_expired = Carbon\Carbon::parse($user->Tanggal_Berakhir);
                $now = Carbon\Carbon::now();
                
                $jarak = $member_expired->timestamp - $now->timestamp;
                $hari = round($jarak / 60 / 60 / 24);
                @endphp
                <div class="flex flex-col items-center justify-center w-32 h-32 mx-auto text-slate-400">
                    <p class="text-4xl font-semibold">
                        {{ $hari }} Hari
                    </p>
                    </div>
                    @if ($hari <= 7)
                    <button class="w-full px-4 py-2 mt-4 font-semibold text-white bg-red-500 rounded hover:bg-red-600"><a href="{{ url('user.content.dashboard') }}">Perpanjang Member</a></button>
                    @endif
            </div>  
            @else
            {{-- Transaksi Harian --}}
            <div class="p-4 bg-white rounded-lg dark:bg-gray-800">
                <h3 class="mb-4 text-2xl font-semibold text-gray-900 dark:text-white">Transaksi Harian</h3>
                <div class="flex flex-col bg-white rounded-lg text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white md:flex-row">
                    <a href="{{ url('user.content.dashboard') }}" class="w-full px-4 py-4 mt-4 font-semibold text-center text-white bg-red-500 rounded hover:bg-red-600">Pesan Sekarang</a>
                </div>
            </div>
            
            {{-- Daftar Kelas --}}
            <div class="p-4 bg-white rounded-lg dark:bg-gray-800">
                <h3 class="mb-4 text-2xl font-semibold text-gray-900 dark:text-white">Daftar Kelas</h3>
                <div class="flex flex-col bg-white rounded-lg text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white md:flex-row">
                    <a href="{{ url('user.content.dashboard') }}" class="w-full px-4 py-4 mt-4 font-semibold text-center text-white bg-red-500 rounded hover:bg-red-600">Daftar Kelas Sekarang</a>
                </div>
            </div>
            @endif
            <!-- Subscription -->
            {{-- <div class="col-span-1 p-4 bg-white rounded-lg dark:bg-gray-800">
                <h3 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">Membership</h3>
                <p class="text-sm text-gray-500 dark:text-gray-300">Creation Date: -</p>
                <p class="text-sm text-gray-500 dark:text-gray-300">Finish Date: -</p>
                <p class="text-sm text-gray-500 dark:text-gray-300">Account Type: User</p>
                <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700 mt-4 mb-2">
                    <div class="bg-red-600 h-2.5 rounded-full" style="width: 57%"></div>
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-300">Non-Member</p>
                <button class="w-full px-4 py-2 mt-4 font-semibold text-white bg-red-500 rounded hover:bg-red-600">
                    <a href="join-member.html">Join Member</a>
                </button>
            </div> --}}
        </div>
        {{-- <div class="flex items-center justify-center h-48 mt-5 mb-4 rounded bg-gray-50 dark:bg-gray-800">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-red-600 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase text-gray-50">Date</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase text-gray-50">Transaction ID</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left uppercase text-gray-50">Amount</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">2024-04-01</td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-gray-300">TRX001</td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-gray-300">$100.00</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">2024-04-02</td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-gray-300">TRX002</td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-gray-300">$75.00</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">2024-04-03</td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-gray-300">TRX003</td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-gray-300">$50.00</td>
                    </tr>
                </tbody>
            </table>
        </div> --}}
    </div>
</div>
@endsection
