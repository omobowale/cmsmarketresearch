<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="flex min-h-screen bg-gray-200 text-gray-800">
            <div class="p-4 w-full">
              <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 sm:col-span-6">
                  <div class="flex flex-row bg-white shadow-sm rounded p-10">
                    <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-blue-500">
                      <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div class="flex flex-col flex-grow ml-4">
                      <div class="text-md text-gray-500">Super Admins</div>
                      <div class="font-bold text-lg">12</div>
                    </div>
                  </div>
                </div>
                <div class="col-span-12 sm:col-span-6">
                  <div class="flex flex-row bg-white shadow-sm rounded p-10">
                    <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-green-100 text-green-500">
                      <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div class="flex flex-col flex-grow ml-4">
                        <div class="text-md text-gray-500">Admins</div>
                        <div class="font-bold text-lg">{{App\Models\User::count()}}</div>
                    </div>
                  </div>
                </div>
                <div class="col-span-12 sm:col-span-6">
                  <div class="flex flex-row bg-white shadow-sm rounded p-10">
                    <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-orange-100 text-orange-500">
                        <i class="las la-poll fa-3x"></i>
                    </div>
                    <div class="flex flex-col flex-grow ml-4">
                      <div class="text-md text-gray-500">Case Studies</div>
                      <div class="font-bold text-lg">{{App\Models\CaseStudy::count()}}</div>
                    </div>
                  </div>
                </div>
                <div class="col-span-12 sm:col-span-6">
                  <div class="flex flex-row bg-white shadow-sm rounded p-10">
                    <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-red-100 text-red-500">
                        <i class="la-3x las la-blog"></i>
                    </div>
                    <div class="flex flex-col flex-grow ml-4">
                      <div class="text-md text-gray-500">Blogs</div>
                      <div class="font-bold text-lg">{{App\Models\Blog::count()}}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </x-slot>

</x-app-layout>


