@extends('livewire.user.dashboard-user')

@section('content')
<div class="p-4 border-2 border-red-200 rounded-lg border-full dark:border-gray-700 mt-14">
    <div class="p-4 sm:ml-64">
    <div class="grid grid-cols-1 gap-4 mb-4">
        <!-- Profile Summary -->
        <div class="col-span-2 p-4 bg-white rounded-lg dark:bg-gray-800">
            <div class="flex items-center mb-4">
                <img class="w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
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
    <!-- Profile Details & Activities -->
    <div class="grid grid-cols-3 gap-3">
        <!-- Profile Details -->
        <div class="p-4 bg-white rounded-lg dark:bg-gray-800">
            <h3 class="mb-4 text-2xl font-semibold text-gray-900 dark:text-white">Kelas Aktif</h3>
            <div class="flex items-center justify-between text-slate-400">
                @if ($kelas->first())
                    <img class="object-cover w-32 h-32 border border-gray-200 rounded-full" src="{{ Storage::url($kelas->first()->Foto) }}" alt="Foto kelas">
                @endif
                <div class="flex flex-col items-start justify-center w-4/6 h-32 pl-3 rounded-lg">
                    <h5 class="text-xl text-slate-600">Kelas: {{ $kelas->first()->Nama_Kelas }}</h5>
                    <p class="text-sm text-slate-300">
                        {{ $kelas->first()->instruktur->Nama }}
                    </p>
                    <p class="text-sm text-slate-300">
                        {{ Carbon\Carbon::parse($kelas->first()->Waktu_Mulai)->format('H:i') }} - {{ Carbon\Carbon::parse($kelas->first()->Waktu_Selesai)->format('H:i') }}
                    </p>
                    <p class="text-sm text-slate-300">
                        {{ $kelas->first()->Hari }}
                    </p>
                </div>
            </div>
        </div>
        <!-- User Activities -->
        <div class="p-4 bg-white rounded-lg dark:bg-gray-800">
            <h3 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">Member Expired</h3>
            <ul class="text-sm text-gray-500 dark:text-gray-300">
            </ul>
        </div>
        <!-- Subscription -->
        <div class="col-span-1 p-4 bg-white rounded-lg dark:bg-gray-800">
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
        </div>
    </div>
    <div class="flex items-center justify-center h-48 mt-5 mb-4 rounded bg-gray-50 dark:bg-gray-800">
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
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">2024-06-11</td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">TX12345</td>
                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">$150.00</td>
                </tr>
                <!-- More transactions here -->
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection