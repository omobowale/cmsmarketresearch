<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <span class="mr-10 py-8"><a href="/blogs">{{ __('Blogs') }}</a></span>
                <span class="text-blue-500 border-blue-500 border-b-4 py-8"><a href="/blogs/categories">{{ __('Category') }}</a></span>
            </h2>
            <a href="/blogs/categories/create"><div title="Add a new blog category" class="general-bg-color text-white font-bold cursor-pointer rounded-full h-12 w-12 flex items-center justify-center">+</div></a>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="m-auto px-4">
            @include('commons.info-displayer')
            
            @foreach ($blogcategories as $blogcategory)
                <section class="grid grid-cols-12 mb-20">
                    <div class="col-span-8 border-b-2">
                        <div class="grid grid-cols-12 my-2 ml-4">
                            <div class="flex text-white items-center general-bg-color p-5 col-span-3">Category</div>
                            <div class="col-span-9 p-5 border-2">{{$blogcategory->blog_category}}</div>
                        </div>
                        @livewire('actions-for-blog-category', ['blogcategory' => $blogcategory, 'viewing' => true, 'styleClass' => "text-center mt-5 mb-4 grid grid-cols-12"], key($blogcategory->id))
                    </div>
                </section>
            @endforeach
            
        </div>
    </x-slot>
    
</x-app-layout>