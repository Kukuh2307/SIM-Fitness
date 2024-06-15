@extends('livewire.user.dashboard-user')

@section('content')
<div class="p-4 sm:ml-64">
    <div class="border-2 border-gray-200 border-dashed rounded-lg p-7 dark:border-gray-700 mt-14">
       <div class="flex items-center justify-center h-full mb-4 rounded bg-gray-50 dark:bg-gray-800">
            <div class="max-w-4xl p-6 mx-auto">
              <h1 class="mb-8 text-4xl font-bold text-center">Join a Class</h1>
              <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                  <!-- Zumba Class -->
                  <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                      <img src="assets/zumba.jpg" alt="Zumba" class="object-cover w-full h-48">
                      <div class="p-6">
                          <h2 class="mb-2 text-2xl font-bold">Zumba</h2>
                          <p class="mb-4 text-gray-700">Join our fun and energetic Zumba classes to burn calories and improve your fitness.</p>
                          <p class="text-xl font-bold">$15 per class</p>
                          <p class="mt-2"><strong>Instructor:</strong> Jane Doe</p>
                          <p class="mt-1"><strong>Members Joined:</strong> 20</p>
                          <p class="mt-1"><strong>Class Quota:</strong> 30</p>
                          <p class="mt-1 text-gray-600">Enjoy an exciting workout with our expert instructor Jane Doe. The class is designed to be fun and effective for all fitness levels.</p>
                          <button class="px-4 py-2 mt-4 font-semibold text-white bg-blue-500 rounded">Join Now</button>
                      </div>
                  </div>
                  <!-- Pilates Class -->
                  <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                      <img src="assets/pilates.jpg" alt="Pilates" class="object-cover w-full h-48">
                      <div class="p-6">
                          <h2 class="mb-2 text-2xl font-bold">Pilates</h2>
                          <p class="mb-4 text-gray-700">Enhance your core strength and flexibility with our Pilates classes.</p>
                          <p class="text-xl font-bold">$20 per class</p>
                          <p class="mt-2"><strong>Instructor:</strong> John Smith</p>
                          <p class="mt-1"><strong>Members Joined:</strong> 15</p>
                          <p class="mt-1"><strong>Class Quota:</strong> 25</p>
                          <p class="mt-1 text-gray-600">Our Pilates class led by John Smith will help you build a strong core and increase your flexibility. Suitable for all fitness levels.</p>
                    
                          <button class="px-4 py-2 mt-4 font-semibold text-white bg-blue-500 rounded">Join Now</button>
                      </div>
                  </div>
                  <!-- Yoga Class -->
                  <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                      <img src="assets/yoga.jpg" alt="Yoga" class="object-cover w-full h-48">
                      <div class="p-6">
                          <h2 class="mb-2 text-2xl font-bold">Yoga</h2>
                          <p class="mb-4 text-gray-700">Relax and rejuvenate with our calming and restorative Yoga classes.</p>
                          <p class="text-xl font-bold">$18 per class</p>
                          <p class="mt-2"><strong>Instructor:</strong> Emily Johnson</p>
                          <p class="mt-1"><strong>Members Joined:</strong> 18</p>
                          <p class="mt-1"><strong>Class Quota:</strong> 20</p>
                          <p class="mt-1 text-gray-600">Experience a peaceful Yoga session with Emily Johnson. This class is perfect for reducing stress and improving flexibility.</p>
                    
                          <button class="px-4 py-2 mt-4 font-semibold text-white bg-blue-500 rounded">Join Now</button>
                      </div>
                  </div>
              </div>
        </div>
       </div>
    </div>
 </div>
@endsection