@extends('livewire.user.dashboard-user')

@section('content')
<div class="p-4 border-2 border-red-200 rounded-lg border-full dark:border-gray-700 mt-14">
    <div class="p-4 sm:ml-64">
    <div class="grid grid-cols-3 gap-4 mb-4">
        <!-- Profile Summary -->
        <div class="col-span-2 p-4 bg-white rounded-lg dark:bg-gray-800">
            <div class="flex items-center mb-4">
                <img class="w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                <div class="ml-4">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Halil Ibrahim Nuroglu</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-300">user(non-Member)</p>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-5">
                <div class="p-4 text-center bg-red-100 rounded-lg dark:bg-gray-700">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">57</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-300">Total Transaksi</p>
                </div>
                <div class="p-4 text-center bg-red-100 rounded-lg dark:bg-gray-700">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">26</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-300">Total Income</p>
                </div>
                <div class="p-4 text-center bg-red-100 rounded-lg dark:bg-gray-700">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">83</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-300">Gym Harian</p>
                </div>
            </div>
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
    <!-- Profile Details & Activities -->
    <div class="grid grid-cols-2 gap-4">
        <!-- Profile Details -->
        <div class="p-4 bg-white rounded-lg dark:bg-gray-800">
            <h3 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">Profile Details</h3>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-300"><strong>Name Surname:</strong> Halil Ibrahim Nuroglu</p>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-300"><strong>Email:</strong> halil.nuroglu@pega.com.tr</p>
            <p class="text-sm text-gray-500 dark:text-gray-300"><strong>Phone:</strong> +90 538 446 27 56</p>
        </div>
        <!-- User Activities -->
        <div class="p-4 bg-white rounded-lg dark:bg-gray-800">
            <h3 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">Login History</h3>
            <ul class="text-sm text-gray-500 dark:text-gray-300">
                <li>2024-06-11 - Giriş Yaptınız</li>
                <li>2024-06-10 - Giriş Yaptınız</li>
                <li>2024-06-09 - Çıkış Yaptınız</li>
                <li>2024-06-08 - Giriş Yaptınız</li>
            </ul>
        </div>
    </div>
    <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
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