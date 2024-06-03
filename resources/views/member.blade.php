<x-app-layout>
    <x-slot name="header">
        {{ __('Members') }}
    </x-slot>
    <div class="p-6 bg-white shadow-lg sm:rounded-lg">
        <div class="max-w-full overflow-x-auto">
            <h3 class="px-4 py-2 mb-2 font-bold text-white bg-red-600 rounded-t-lg">Daftar Member</h3>
            @livewire('member.member-table')
        </div>
    </div>
</x-app-layout>