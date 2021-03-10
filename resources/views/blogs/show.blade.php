<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <span class="mr-10 text-blue-500 border-blue-500 border-b-4 py-5"><a href="/blogs">{{ __('Blogs') }}</a></span>
            <span>{{ __('Category') }}</span>
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="grid grid-cols-12 mt-5 h-full">
            <div class="col-start-3 col-span-8 h-72">
                <div class="w-full h-full"><img class="w-full h-full" src={{asset('images/'. $blog->image_path)}} /></div>
            </div>
            <div class="col-span-12 my-5">
                <h3 class="text-2xl font-bold text-center">{{$blog->title}}</h3>
            </div>
            <div class="col-span-12 my-2 px-10">
                <h3 class="text-base font-bold">{{$blog->short_introduction}}</h3>
            </div>
            <div class="col-span-12 my-2 px-10">
                <h3 class="text-base">{{$blog->content}}</h3>
            </div>
            <hr class="col-span-12 my-5" />
            <div class="col-span-12 my-2 px-10 general-text-color">
                <h3><span class="text-base font-bold">Category: </span><span>{{$blog->blogcategory->blog_category}}</span></h3>
            </div>
            <div class="col-span-12 my-2 px-10 general-text-color">
                <h3><span class="text-base font-bold">Tag(s): </span><span>{{$blog->blog_tag_id}}</span></h3>
            </div>
            <div class="col-span-12 my-2 px-10 general-text-color">
                <h3><span class="text-base font-bold">Slug: </span><span>{{$blog->slug}}</span></h3>
            </div>
            <div class="col-span-12 my-2 px-10 general-text-color">
                <h3><span class="text-base font-bold">Meta Title: </span><span>{{$blog->meta_title}}</span></h3>
            </div>
            <div class="col-span-12 my-2 px-10 general-text-color">
                <h3><span class="text-base font-bold">Meta Description: </span><span>{{$blog->meta_description}}</span></h3>
            </div>
            <hr class="col-span-12 my-5" />
            @livewire('actions-for-blog', ['blog' => $blog, 'viewing' => true, 'styleClass' => "pl-10 mt-2 mb-48 grid col-span-12 grid-cols-12" ], key($blog->id))
        </div>
    </x-slot>

</x-app-layout>