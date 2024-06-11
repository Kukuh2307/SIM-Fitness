                    <!-- Members Card -->
                    {{-- @dd($countmember) --}}
                    <div class="p-4 bg-white rounded-lg shadow-md">
                        <div class="flex items-center">
                            <div class="p-3 bg-blue-500 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-lg font-semibold text-gray-600">Members</p>
                                <p class="text-2xl font-bold">{{ $countmember }}</p>
                            </div>
                        </div>
                    </div>