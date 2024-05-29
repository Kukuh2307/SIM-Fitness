<x-app-layout>
    <x-slot name="header">
        {{ __('Listing Alat') }}
    </x-slot>

    <div class="h-screen mt-10">
        <div class="mx-auto max-w-[95rem] sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

                    <div class="p-6 mx-auto bg-white rounded-lg shadow-lg max-w-7xl">
                        <div class="flex items-center justify-between mb-6">
                            <h1 class="text-2xl font-bold text-red-600">Listing Alat</h1>
                            <div class="relative">
                                <input type="text" placeholder="Search" class="py-2 pl-8 pr-4 border border-gray-300 rounded-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <form class="p-4 mb-8 bg-white rounded-lg shadow-md">
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                <div>
                                    <label for="nama_alat" class="block text-sm font-medium text-gray-700">Nama Alat:</label>
                                    <input type="text" id="nama_alat" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                                </div>
                                <div>
                                    <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah:</label>
                                    <input type="text" id="jumlah" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                                </div>
                                <div>
                                    <label for="kondisi" class="block text-sm font-medium text-gray-700">Kondisi:</label>
                                    <input type="text" id="kondisi" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                                </div>
                                <div>
                                    <label for="picture" class="block text-sm font-medium text-gray-700">Picture:</label>
                                    <input type="file" id="picture" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                                </div>
                            </div>
                            <div class="flex justify-end mt-4">
                                <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded-md shadow hover:bg-red-700">Submit</button>
                            </div>
                        </form>

                        <div class="px-4 py-2 mb-2 font-bold text-white bg-red-600 rounded-t-lg">Listing Alat</div>
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-sm font-semibold text-left text-gray-700 bg-gray-100 border-b border-gray-200">Id</th>
                                    <th class="px-4 py-2 text-sm font-semibold text-left text-gray-700 bg-gray-100 border-b border-gray-200">Nama Alat</th>
                                    <th class="px-4 py-2 text-sm font-semibold text-left text-gray-700 bg-gray-100 border-b border-gray-200">Jumlah</th>
                                    <th class="px-4 py-2 text-sm font-semibold text-left text-gray-700 bg-gray-100 border-b border-gray-200">Kondisi</th>
                                    <th class="px-4 py-2 text-sm font-semibold text-left text-gray-700 bg-gray-100 border-b border-gray-200">Picture</th>
                                    <th class="px-4 py-2 text-sm font-semibold text-right text-gray-700 bg-gray-100 border-b border-gray-200">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example row -->
                                <tr>
                                    <td class="px-4 py-2 border-b border-gray-200">1</td>
                                    <td class="px-4 py-2 border-b border-gray-200">Treadmill</td>
                                    <td class="px-4 py-2 border-b border-gray-200">10</td>
                                    <td class="px-4 py-2 border-b border-gray-200">Good</td>
                                    <td class="px-4 py-2 border-b border-gray-200">
                                        <img src="path/to/image.jpg" alt="Treadmill" class="object-cover w-16 h-16">
                                    </td>
                                    <td class="flex justify-end px-4 py-2 space-x-2 text-right border-b border-gray-200">
                                        <button class="text-blue-600 hover:text-blue-800">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 4a8 8 0 100 16 8 8 0 000-16zm3 11h-2v2h-2v-2H9v-2h2v-2h2v2h2v2zm0-8.5V9H9V6h6zm-4.5 0H15V4.5H10.5V6zM6 19.5h12V21H6v-1.5z"></path>
                                            </svg>
                                        </button>
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
                                    <td class="px-4 py-2 border-b border-gray-200">2</td>
                                    <td class="px-4 py-2 border-b border-gray-200">Treadmill</td>
                                    <td class="px-4 py-2 border-b border-gray-200">10</td>
                                    <td class="px-4 py-2 border-b border-gray-200">Good</td>
                                    <td class="px-4 py-2 border-b border-gray-200">
                                        <img src="path/to/image.jpg" alt="Treadmill" class="object-cover w-16 h-16">
                                    </td>
                                    <td class="flex justify-end px-4 py-2 space-x-2 text-right border-b border-gray-200">
                                        <button class="text-blue-600 hover:text-blue-800">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 4a8 8 0 100 16 8 8 0 000-16zm3 11h-2v2h-2v-2H9v-2h2v-2h2v2h2v2zm0-8.5V9H9V6h6zm-4.5 0H15V4.5H10.5V6zM6 19.5h12V21H6v-1.5z"></path>
                                            </svg>
                                        </button>
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
    </div>
</x-app-layout>
