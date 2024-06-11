<x-app-layout>
    <x-slot name="header">
        {{ __('Members') }}
    </x-slot>

    <div class="h-screen mt-10">
        <div class="mx-auto max-w-[95rem] sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-red-600">Members</h1>
                        <div class="relative">
                            <input type="text" placeholder="Search" class="pl-8 pr-4 py-2 rounded-full border border-gray-300">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <table class="min-w-full bg-white mb-8">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-700">Id</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-700">Name</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-700">Class</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-700">Status</th>
                                <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-right text-sm font-semibold text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example row -->
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">1</td>
                                <td class="py-2 px-4 border-b border-gray-200">Julioooo</td>
                                <td class="py-2 px-4 border-b border-gray-200">Yoga</td>
                                <td class="py-2 px-4 border-b border-gray-200">Active</td>
                                <td class="py-2 px-4 border-b border-gray-200 text-right flex justify-end space-x-2">
                                    <button class="text-red-600 hover:text-red-800">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M3 6l3 18h12l3-18H3zm3-3h12v3H6V3z"></path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                            
                            <!-- Example row -->
                            <tr>
                                <td class="py-2 px-4 border-b border-gray-200">2</td>
                                <td class="py-2 px-4 border-b border-gray-200">Julia</td>
                                <td class="py-2 px-4 border-b border-gray-200">Cardio</td>
                                <td class="py-2 px-4 border-b border-gray-200">Active</td>
                                <td class="py-2 px-4 border-b border-gray-200 text-right flex justify-end space-x-2">
                                    <button class="text-red-600 hover:text-red-800">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M3 6l3 18h12l3-18H3zm3-3h12v3H6V3z"></path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                 </div>
        </div>
    </div>
</x-app-layout>
