<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="h-screen mt-10">
        <div class="mx-auto max-w-[95rem] sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-2 lg:grid-cols-4">
                    <!-- Members Card -->
                    <div class="p-4 bg-white rounded-lg shadow-md">
                        <div class="flex items-center">
                            <div class="p-3 bg-blue-500 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-lg font-semibold text-gray-600">Members</p>
                                <p class="text-2xl font-bold">1,234</p>
                            </div>
                        </div>
                    </div>
            
                    <!-- Classes Card -->
                    <div class="p-4 bg-white rounded-lg shadow-md">
                        <div class="flex items-center">
                            <div class="p-3 bg-green-500 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 11h18M3 15h18M3 19h18" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-lg font-semibold text-gray-600">Classes</p>
                                <p class="text-2xl font-bold">56</p>
                            </div>
                        </div>
                    </div>
            
                    <!-- Instructors Card -->
                    <div class="p-4 bg-white rounded-lg shadow-md">
                        <div class="flex items-center">
                            <div class="p-3 bg-red-500 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4V6M6.343 6.343l1.414 1.414M4 12h2M6.343 17.657l1.414-1.414M12 18v2m5.657-4.343l-1.414-1.414M18 12h-2m1.657-5.657l-1.414 1.414" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-lg font-semibold text-gray-600">Instructors</p>
                                <p class="text-2xl font-bold">23</p>
                            </div>
                        </div>
                    </div>
            
                    <!-- Total Income Card -->
                    <div class="p-4 bg-white rounded-lg shadow-md">
                        <div class="flex items-center">
                            <div class="p-3 bg-yellow-500 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.104 0-2-.896-2-2s.896-2 2-2 2 .896 2 2-.896 2-2 2zm0 2c1.104 0 2 .896 2 2v5c0 1.104-.896 2-2 2s-2-.896-2-2v-5c0-1.104.896-2 2-2zM2 8h4v4H2V8zm14 0h4v4h-4V8z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-lg font-semibold text-gray-600">Total Income</p>
                                <p class="text-2xl font-bold">$45,678</p>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Transactions Table -->
                <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                    <table class="w-full bg-white">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2 text-left text-gray-600">Transaction ID</th>
                                <th class="px-4 py-2 text-left text-gray-600">User</th>
                                <th class="px-4 py-2 text-left text-gray-600">Amount</th>
                                <th class="px-4 py-2 text-left text-gray-600">Date</th>
                                <th class="px-4 py-2 text-left text-gray-600">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-4 py-2 border-t">T001</td>
                                <td class="px-4 py-2 border-t">John Doe</td>
                                <td class="px-4 py-2 border-t">$200</td>
                                <td class="px-4 py-2 border-t">2023-05-16</td>
                                <td class="px-4 py-2 text-green-500 border-t">Completed</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 border-t">T002</td>
                                <td class="px-4 py-2 border-t">Jane Smith</td>
                                <td class="px-4 py-2 border-t">$300</td>
                                <td class="px-4 py-2 border-t">2023-05-17</td>
                                <td class="px-4 py-2 text-red-500 border-t">Pending</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 border-t">T002</td>
                                <td class="px-4 py-2 border-t">Jane Smith</td>
                                <td class="px-4 py-2 border-t">$300</td>
                                <td class="px-4 py-2 border-t">2023-05-17</td>
                                <td class="px-4 py-2 text-red-500 border-t">Pending</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 border-t">T002</td>
                                <td class="px-4 py-2 border-t">Jane Smith</td>
                                <td class="px-4 py-2 border-t">$300</td>
                                <td class="px-4 py-2 border-t">2023-05-17</td>
                                <td class="px-4 py-2 text-red-500 border-t">Pending</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 border-t">T002</td>
                                <td class="px-4 py-2 border-t">Jane Smith</td>
                                <td class="px-4 py-2 border-t">$300</td>
                                <td class="px-4 py-2 border-t">2023-05-17</td>
                                <td class="px-4 py-2 text-red-500 border-t">Pending</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 border-t">T002</td>
                                <td class="px-4 py-2 border-t">Jane Smith</td>
                                <td class="px-4 py-2 border-t">$300</td>
                                <td class="px-4 py-2 border-t">2023-05-17</td>
                                <td class="px-4 py-2 text-red-500 border-t">Pending</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 border-t">T002</td>
                                <td class="px-4 py-2 border-t">Jane Smith</td>
                                <td class="px-4 py-2 border-t">$300</td>
                                <td class="px-4 py-2 border-t">2023-05-17</td>
                                <td class="px-4 py-2 text-red-500 border-t">Pending</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>