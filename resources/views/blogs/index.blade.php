<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <span class="mr-10 text-blue-500 border-blue-500 border-b-4 py-8"><a href="/blogs">{{ __('Blogs') }}</a></span>
                <span class="py-8"><a href="/blogs/categories">{{ __('Category') }}</a></span>
            </h2>
            <a href="/blogs/create"><div title="Add a new category" class="general-bg-color text-white font-bold cursor-pointer rounded-full h-12 w-12 flex items-center justify-center">+</div></a>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="m-auto px-4">
            @include('commons.info-displayer')
            
            @foreach ($blogs as $blog)
                <section class="grid grid-cols-12 mb-20">
                    <div class="col-span-4 border-2 flex items-center">
                        <div class="w-full h-1/2"><img class="w-full h-full" src={{asset('images/'. $blog->image_path)}} /></div>
                    </div>
                    <div class="col-span-8 border-b-2">
                        <h3 class="text-center general-bg-color font-bold text-2xl p-4 mb-3 text-white">{{$blog->title}}</h3>
                        <div class="grid grid-cols-12 my-2 ml-4">
                            <div class="flex text-white items-center general-bg-color p-5 col-span-3">Category</div>
                            <div class="col-span-9 p-5 border-2">{{$blog->blogcategory->blog_category}}</div>
                        </div>
                        <div class="grid grid-cols-12 my-2 ml-4">
                            <div class="flex text-white items-center general-bg-color p-5 col-span-3">Introduction</div>
                            <div class="col-span-9 p-5 border-2">{{$blog->short_introduction}}</div>
                        </div>
                        <div class="grid grid-cols-12 my-2 ml-4">
                            <div class="flex text-white items-center general-bg-color p-5 col-span-3">Comments</div>
                            <div class="col-span-9 p-5 border-2">
                                <p><span class="general-color font-bold">All : </span>{{count($blog->blogcomments)}}</p>
                                <p><span class="text-yellow-400 font-bold">Pending : </span>{{count($blog->blogcomments()->where('status', 'pending')->get())}}</p>
                                <p><span class="text-green-400 font-bold">Approved : </span>{{count($blog->blogcomments()->where('status', 'approved')->get())}}</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 my-2 ml-4">
                            <div class="flex text-white items-center general-bg-color p-5 col-span-3">Tags</div>
                            <div class="col-span-9 p-5 border-2">
                                @foreach ($blog->blogtags as $index => $tag)
                                    @if($index == count($blog->blogtags) - 1)
                                        <span>{{$tag->blog_tag}}<span>
                                    @else
                                        <span>{{$tag->blog_tag}},<span>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="grid grid-cols-12 my-2 ml-4">
                            <div class="flex text-white items-center general-bg-color p-5 col-span-3">Slug</div>
                            <div class="col-span-9 p-5 border-2">{{$blog->slug}}</div>
                        </div>
                        <div class="grid grid-cols-12 my-2 ml-4">
                            <div class="flex text-white items-center general-bg-color p-5 col-span-3">Meta Title</div>
                            <div class="col-span-9 p-5 border-2">{{$blog->meta_title}}</div>
                        </div>
                        <div class="grid grid-cols-12 my-2 ml-4">
                            <div class="flex text-white items-center general-bg-color p-5 col-span-3">Meta Description</div>
                            <div class="col-span-9 p-5 border-2">{{$blog->meta_description}}</div>
                        </div>
                        @livewire('actions-for-blog', ['blog' => $blog, 'viewing' => false, 'styleClass' => "text-center mt-5 mb-4 grid grid-cols-12"], key($blog->id))
                    </div>
                </section>
                @endforeach
        </div>
    </x-slot>
    
</x-app-layout>