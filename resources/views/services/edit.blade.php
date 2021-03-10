<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="/services">{{ __('Services >> ') }} </a> <small class="text-blue-600">Edit Service</small>
        </h2>
    </x-slot>

    <x-slot name="slot">
      <form method="post" action="/services/{{$service->id}}" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        <div class="min-h-screen">
            <div class="relative pb-3 pt-1 sm:w-3/4 sm:mx-auto">
              <div class="relative px-4 py-10 mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                <div class="sm:w-full mx-auto">
                  <div class="flex items-center space-x-5">
                    <div class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">i</div>
                    <div class="block pl-2 font-semibold text-xl text-gray-700">
                      <h2 class="leading-relaxed mx-auto">Edit a service</h2>
                      <p class="text-sm text-gray-500 font-normal leading-relaxed">Please edit the required details and click the update button</p>
                    </div>
                  </div>
                  <div class="divide-y divide-gray-200">
                    <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                      <div class="flex flex-col">
                        <label for="name" class="leading-loose">Name<span class="text-red-500"> *</span></label>
                        <input name="name" id="name" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Enter service name" value="{{ old('name') ?? $service->name ?? '' }}">
                        @error('name')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="flex flex-col">
                        <label for="short_description" class="leading-loose">Short Description<span class="text-red-500"> *</span></label>
                        <textarea name="short_description" id="short_description" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Enter a short description for the service">{{ old('short_description') ?? $service->short_description ?? ""}}</textarea>
                        @error('short_description')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="flex flex-col">
                        <label for="full_description" class="leading-loose">Full Description<span class="text-red-500"> *</span></label>
                        <textarea name="full_description" id="full_description" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Enter a full description of the service">{{ old('full_description') ?? $service->full_description ?? ""}}</textarea>
                        @error('full_description')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="flex flex-col">
                        <label for="image" class="leading-loose">Image<span class="text-red-500"></span></label>
                        <input name="image" id="image" type="file" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Event title" >
                        @error('image')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="flex flex-col">
                        <label for="slug" class="leading-loose">Slug</label>
                        <input name="slug" id="slug" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Enter a suitable slug for the service (Optional)" value="{{ old('slug') ?? $service->slug ?? '' }}">
                        @error('slug')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="flex flex-col">
                        <label for="meta_title" class="leading-loose">Meta Title<span class="text-red-500"> *</span></label>
                        <input name="meta_title" id="meta_title" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Enter meta title for the service" value="{{ old('meta_title') ?? $service->meta_title ?? '' }}">
                        @error('meta_title')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="flex flex-col">
                        <label for="meta_description" class="leading-loose">Meta Description<span class="text-red-500"> *</span></label>
                        <textarea name="meta_description" id="meta_description" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Enter meta description for the service">{{ old('meta_description') ?? $service->meta_description ?? '' }}</textarea>
                        @error('meta_description')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="pt-4 flex items-center space-x-4">
                        <button type="button" onclick="location='/services'" class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none">
                          <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg><a href="/services">Cancel</a>
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