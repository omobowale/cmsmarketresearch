<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <span class="mr-10 text-blue-500 border-blue-500 border-b-4 py-5"><a href="/blogs">{{ __('Blogs') }}</a></span>
            <span>{{ __('Category') }}</span>
        </h2>
    </x-slot>

    <x-slot name="slot">
      <form method="post" action="/blogs" enctype="multipart/form-data">
        @csrf
        <div class="min-h-screen">
            <div class="relative pb-3 pt-1 sm:w-3/4 sm:mx-auto">
              <div class="relative px-4 py-10 mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                <div class="sm:w-full mx-auto">
                  <div class="flex items-center space-x-5">
                    <div class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">i</div>
                    <div class="block pl-2 font-semibold text-xl text-gray-700">
                      <h2 class="leading-relaxed mx-auto">Add a new blog</h2>
                      <p class="text-sm text-gray-500 font-normal leading-relaxed">Please edit the required details and click the add button</p>
                    </div>
                  </div>
                  <div class="divide-y divide-gray-200">
                    <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                      <div class="flex flex-col">
                        <label for="category" class="leading-loose">Category<span class="text-red-500"> *</span></label>
                        <select name="category" id="category" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Enter blog title" value="{{ old('title') ?? $blog->title ?? '' }}">
                          @foreach (App\Models\BlogCategory::all() as $category)
                              <option value="{{$category->id}}">{{$category->blog_category}}</option>
                          @endforeach
                        </select>
                        @error('title')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="flex flex-col">
                        <label for="title" class="leading-loose">Title<span class="text-red-500"> *</span></label>
                        <input name="title" id="title" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Enter blog title" value="{{ old('title') ?? $blog->title ?? '' }}">
                        @error('title')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="flex flex-col">
                        <label for="short_introduction" class="leading-loose">Introduction<span class="text-red-500"> *</span></label>
                        <textarea name="short_introduction" id="short_introduction" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Enter a short introduction for the blog">{{ old('short_introduction') ?? $blog->short_introduction ?? ""}}</textarea>
                        @error('short_introduction')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="flex flex-col">
                        <label for="content" class="leading-loose">Content<span class="text-red-500"> *</span></label>
                        <textarea name="content" id="content" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Enter a full description of the blog">{{ old('content') ?? $blog->content ?? ""}}</textarea>
                        @error('content')
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
                        <input name="slug" id="slug" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Enter a suitable slug for the blog (Optional)" value="{{ old('slug') ?? $blog->slug ?? '' }}">
                        @error('slug')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="flex flex-col">
                        <label for="meta_title" class="leading-loose">Meta Title<span class="text-red-500"> *</span></label>
                        <input name="meta_title" id="meta_title" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Enter meta title for the blog" value="{{ old('meta_title') ?? $blog->meta_title ?? '' }}">
                        @error('meta_title')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="flex flex-col">
                        <label for="meta_description" class="leading-loose">Meta Description<span class="text-red-500"> *</span></label>
                        <textarea name="meta_description" id="meta_description" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Enter meta description for the blog">{{ old('meta_description') ?? $blog->meta_description ?? '' }}</textarea>
                        @error('meta_description')
                          <div class="text-sm text-red-500">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="pt-4 flex items-center space-x-4">
                        <button type="button" onclick="location='/blogs'" class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none">
                          <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg><a href="/blogs">Cancel</a>
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