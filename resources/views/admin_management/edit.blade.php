<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="/admin-management">{{ __('Admin Management >> ') }} </a> <small class="text-blue-600">Edit Admin</small>
        </h2>
    </x-slot>

    <x-slot name="slot">
      <form action="/admin-management/{{$user->id}}" method="POST">
        @csrf
        @method("PATCH")
        <div class="min-h-screen px-0 py-6 flex flex-col justify-start sm:py-12">
            <div class="relative py-3 sm:w-3/4 sm:mx-auto">
              <div class="relative px-4 py-10 mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                <div class="sm:w-full mx-auto">
                  <div class="flex items-center space-x-5">
                    <div class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">i</div>
                    <div class="block pl-2 font-semibold text-xl text-gray-700">
                      <h2 class="leading-relaxed mx-auto">Edit an admin</h2>
                      <p class="text-sm text-gray-500 font-normal leading-relaxed">Please edit the required details and click the update button</p>
                    </div>
                  </div>
                  <div class="divide-y divide-gray-200">
                    <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                      <div class="flex flex-col">
                        <label for="name" class="leading-loose">Name<span class="text-red-500"> *</span></label>
                        <input name="name" id="name" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Enter name" value="{{$user->name ?? old('name') ?? ''}}">
                        @error('name')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="flex flex-col">
                        <label for="email" class="leading-loose">Email<span class="text-red-500"> *</span></label>
                        <input name="email" id="email" type="email" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Enter email" value="{{$user->email ?? old('email') ?? ''}}">
                        @error('email')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="flex flex-col">
                        <label for="role" class="leading-loose">Role<span class="text-red-500"> *</span></label>
                        <select name="role" id="role" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                            <option @if($user->role == "admin") {{'selected'}} @else {{''}} @endif value="admin">Admin</option>
                            <option @if($user->role == "superadmin") {{'selected'}} @else {{''}} @endif value="superadmin">Super Admin</option>
                        </select>
                        @error('role')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div> 
                    </div>
                    <div class="pt-4 flex items-center space-x-4">
                        <button type="button" onclick="location='/admin-management'" class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none">
                          <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Cancel
                        </button>
                        <button type="submit" class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Update</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </form>
    </x-slot>

</x-app-layout>