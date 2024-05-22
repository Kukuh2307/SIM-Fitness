<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Listing Alat') }}
        </h2>
    </x-slot>

    <div class="h-screen mt-10">
        <div class="mx-auto max-w-[95rem] sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

                    <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-lg">
                        <div class="flex justify-between items-center mb-6">
                            <h1 class="text-2xl font-bold text-red-600">Listing Alat</h1>
                            <div class="relative">
                                <input type="text" placeholder="Search" class="pl-8 pr-4 py-2 rounded-full border border-gray-300">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                    <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <form class="bg-white p-4 rounded-lg shadow-md mb-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="nama_alat" class="block text-sm font-medium text-gray-700">Nama Alat:</label>
                                    <input type="text" id="nama_alat" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </div>
                                <div>
                                    <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah:</label>
                                    <input type="text" id="jumlah" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </div>
                                <div>
                                    <label for="kondisi" class="block text-sm font-medium text-gray-700">Kondisi:</label>
                                    <input type="text" id="kondisi" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </div>
                                <div>
                                    <label for="picture" class="block text-sm font-medium text-gray-700">Picture:</label>
                                    <input type="file" id="picture" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                </div>
                            </div>
                            <div class="flex justify-end mt-4">
                                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md shadow hover:bg-red-700">Submit</button>
                            </div>
                        </form>

                        <div class="bg-red-600 text-white px-4 py-2 rounded-t-lg font-bold mb-2">Listing Alat</div>
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-700">Id</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-700">Nama Alat</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-700">Jumlah</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-700">Kondisi</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-700">Picture</th>
                                    <th class="py-2 px-4 border-b border-gray-200 bg-gray-100 text-right text-sm font-semibold text-gray-700">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example row -->
                                <tr>
                                    <td class="py-2 px-4 border-b border-gray-200">1</td>
                                    <td class="py-2 px-4 border-b border-gray-200">Treadmill</td>
                                    <td class="py-2 px-4 border-b border-gray-200">10</td>
                                    <td class="py-2 px-4 border-b border-gray-200">Good</td>
                                    <td class="py-2 px-4 border-b border-gray-200">
                                        <img src="path/to/image.jpg" alt="Treadmill" class="w-16 h-16 object-cover">
                                    </td>
                                    <td class="py-2 px-4 border-b border-gray-200 text-right flex justify-end space-x-2">
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
                                    <td class="py-2 px-4 border-b border-gray-200">2</td>
                                    <td class="py-2 px-4 border-b border-gray-200">Treadmill</td>
                                    <td class="py-2 px-4 border-b border-gray-200">10</td>
                                    <td class="py-2 px-4 border-b border-gray-200">Good</td>
                                    <td class="py-2 px-4 border-b border-gray-200">
                                        <img src="path/to/image.jpg" alt="Treadmill" class="w-16 h-16 object-cover">
                                    </td>
                                    <td class="py-2 px-4 border-b border-gray-200 text-right flex justify-end space-x-2">
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
