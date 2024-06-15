@extends('livewire.user.dashboard-user')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
       
       <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
           <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
               <thead class="bg-gray-50 dark:bg-gray-700">
                   <tr>
                       <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Date</th>
                       <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Transaction ID</th>
                       <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Nama Transaksi</th>
                       <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Amount</th>
                   </tr>
               </thead>
               <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                   <tr>
                       <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">2024-06-11</td>
                       <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">TX12345</td>
                       <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">Gym Harian</td>
                       <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">$150.00</td>
                   </tr>
                   <!-- More transactions here -->
               </tbody>
           </table>
           </table>
       </div>
    </div>
 </div>
 @endsection