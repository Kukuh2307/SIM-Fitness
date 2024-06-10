<div x-data="{ show: @entangle('showModal') }" x-show="show" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div @click.away="show = false" class="w-1/3 p-6 bg-white rounded-lg">
        <h2 class="mb-4 text-2xl font-bold">Daftar</h2>
        <!-- Registration Form -->
        <form>
            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm">Name</label>
                <input type="text" id="name" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm">Email</label>
                <input type="email" id="email" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2 text-sm">Password</label>
                <input type="password" id="password" class="w-full p-2 border border-gray-300 rounded">
            </div>
            <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded-full hover:bg-red-700">Submit</button>
        </form>
        <button @click="show = false" class="absolute top-0 right-0 p-2 m-4 text-gray-600 hover:text-gray-900">&times;</button>
        <button wire:click="$set('showModal', false)" class="px-4 py-2 text-white bg-red-600 rounded-full hover:bg-red-700">Close</button>
    </div>
</div>
