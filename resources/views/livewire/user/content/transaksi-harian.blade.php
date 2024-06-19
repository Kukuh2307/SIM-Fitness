@extends('livewire.user.dashboard-user')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
       
       <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
           <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
               <thead class="bg-gray-50 dark:bg-gray-700">
                   <tr>
                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">No</th>
                       <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Metode Pembayaran</th>
                       <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Total Biaya</th>
                       <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Tanggal</th>
                       <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Status</th>
                   </tr>
               </thead>
               <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                   <tr>
                    {{-- @dd($transaksi_harian) --}}
                    @foreach ($transaksi_harian as $item)
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">-{{ $item->Metode_Pembayaran }}</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $item->Total_Biaya }}</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $item->created_at }}</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $item->Status }}</td>
                    @endforeach
                   </tr>
                   <!-- More transactions here -->
               </tbody>
           </table>
           </table>
       </div>
    </div>
 </div>
 @endsection