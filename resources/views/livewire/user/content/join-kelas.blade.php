@extends('livewire.user.dashboard-user')

@section('title', 'Join Kelas')

@section('content')
<div class="sm:ml-64">
    <div class="border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
       <div class="flex items-center justify-center mb-4 rounded bg-gray-50 dark:bg-gray-800">
            <div class="max-w-6xl p-6 mx-auto">
              <h1 class="mb-8 text-4xl font-bold text-center"> Daftar Kelas</h1>
              <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                  @foreach ($kelas as $item)
                  <!-- Zumba Class -->
                  <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                    <img class="w-full h-48 bg-center bg-cover rounded-t-xl" src="{{ Storage::url($item->Foto) }}" alt="Image Description">
                    <div class="p-4 md:p-5">
                      <h3 class="text-lg font-bold text-gray-800 h-14 dark:text-white">
                        {{ $item->Nama_Kelas }}
                      </h3>
                      <div class="flex flex-col items-end justify-items-start">
                          <p class="h-32 mt-1 overflow-hidden text-gray-500 dark:text-neutral-400">
                            {{ $item->Deskripsi }}
                            </p>
                            <a class="px-3 py-2 mt-2 text-sm font-semibold text-white bg-red-600 border border-transparent rounded-lg gap-x-2 hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none" href="#">
                                Daftar Sekarang
                            </a>
                      </div>
                    </div>
                  </div>
                  @endforeach
              </div>
              {{ $kelas->links() }}
        </div>
       </div>
    </div>
 </div>
@endsection

