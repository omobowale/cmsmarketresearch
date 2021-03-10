<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="/services">{{ __('Services >> ') }} </a> <small class="text-blue-600">Add Service</small>
        </h2>
    </x-slot>

    <x-slot name="slot">

        {{-- <div class="min-h-screen px-0 py-6 flex flex-col justify-center sm:py-12"> --}}
          @if(\Session::has("success"))
            <div class="mt-4">
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b relative text-teal-900 px-4 py-3 shadow-md" role="alert">
                    <div class="flex">
                      <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                      <div>
                        <p class="font-bold">Success</p>
                        <p class="text-sm">{{Session::get("success")}}</p>
                      </div>
                    </div>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                  </div>
            </div>
        @endif
        @if(\Session::has("error"))
            <div class="mt-4">
                <div class="bg-red-100 border-t-4 border-red-500 rounded-b relative text-red-900 px-4 py-3 shadow-md" role="alert">
                    <div class="flex">
                      <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                      <div>
                        <p class="font-bold">Error</p>
                        <p class="text-sm">{{Session::get("error")}}</p>
                      </div>
                    </div>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                  </div>
            </div>
        @endif
        <form action="/services" method="post" enctype="multipart/form-data">
        @csrf
        <div class="min-h-screen">
            <div class="relative py-3 sm:w-3/4 sm:mx-auto">
              <div class="relative px-4 py-10 mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                <div class="sm:w-full mx-auto">
                  <div class="flex items-center space-x-5">
                    <div class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">i</div>
                    <div class="block pl-2 font-semibold text-xl text-gray-700">
                      <h2 class="leading-relaxed mx-auto">Add a new service</h2>
                      <p class="text-sm text-gray-500 font-normal leading-relaxed">Please fill in the required details and click the add button</p>
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
                        <textarea name="short_description" id="short_description" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Enter a short description for the service">{{ old('short_description')}}</textarea>
                        @error('short_description')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="flex flex-col">
                        <label for="full_description" class="leading-loose">Full Description<span class="text-red-500"> *</span></label>
                        <textarea name="full_description" id="full_description" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Enter a full description of the service">{{ old('full_description')}}</textarea>
                        @error('full_description')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="flex flex-col">
                        <label for="image" class="leading-loose">Image<span class="text-red-500"> *</span></label>
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
                        <button type="submit" class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Add</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
    </x-slot>




</x-app-layout>