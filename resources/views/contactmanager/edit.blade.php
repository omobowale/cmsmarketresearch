<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="/others">{{ __('Contact >> ') }} </a> <small class="text-blue-600">Edit Contact</small>
        </h2>
    </x-slot>

    <x-slot name="slot">
      <form action="/contact-manager/{{$contact->id}}" method="POST">
        @csrf
        @method("PATCH")
        <div class="min-h-screen px-0 py-6 flex flex-col justify-start sm:py-12">
            <div class="relative py-3 sm:w-3/4 sm:mx-auto">
              <div class="relative px-4 py-10 mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                <div class="sm:w-full mx-auto">
                  <div class="flex items-center space-x-5">
                    <div class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">i</div>
                    <div class="block pl-2 font-semibold text-xl text-gray-700">
                      <h2 class="leading-relaxed mx-auto">Edit a contact</h2>
                      <p class="text-sm text-gray-500 font-normal leading-relaxed">Please edit the required details and click the update button</p>
                    </div>
                  </div>
                  <div class="divide-y divide-gray-200">
                    <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                      <div class="flex flex-col">
                        <label for="address" class="leading-loose">Address<span class="text-red-500"> *</span></label>
                        <textarea name="address" id="address" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Enter address">{{$contact->address ?? old('address') ?? ""}}</textarea>
                        @error('address')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="flex flex-col">
                        <label for="email" class="leading-loose">Email<span class="text-red-500"> *</span></label>
                        <input name="email" id="email" type="email" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Enter email" value="{{$contact->email ?? old('email') ?? ""}}">
                        @error('email')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="flex flex-col">
                        <label for="phone" class="leading-loose">Phone<span class="text-red-500"> *</span></label>
                        <input name="phone" id="phone" type="tel" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Enter phone number" value="{{$contact->phone ?? old('phone') ?? ""}}">
                        @error('phone')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="flex flex-col">
                        <label for="contactable" class="leading-loose">Set as contactable<span class="text-red-500"> *</span></label>
                        <select name="contactable" id="contactable" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                            <option value="no" @if($contact->contactable == "no") {{"selected"}} @else {{""}} @endif>no</option>
                            <option value="yes" @if($contact->contactable == "yes") {{"selected"}} @else {{""}} @endif>yes</option>
                        </select>
                        @error('contactable')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div> 
                    </div>
                    <div class="pt-4 flex items-center space-x-4">
                        <button type="button" onclick="location='/others'" class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none">
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