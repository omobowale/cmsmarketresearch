<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <span class="mr-10 text-blue-500 border-blue-500 border-b-4 py-5"><a href="/blogs">{{ __('Blogs') }}</a></span>
            <span>{{ __('Category') }}</span>
        </h2>
    </x-slot>

    <x-slot name="slot">
        @include('commons.info-displayer')
        
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
                <h3 class="text-base">{!!$blog->content!!}</h3>
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
            <hr class="col-span-12 mt-5" />
            @livewire('actions-for-blog', ['blog' => $blog, 'viewing' => true, 'styleClass' => "pl-10 mt-2 mb-48 grid col-span-12 grid-cols-12" ], key($blog->id))

            <div class="col-span-12 mt-0 pt-0 border-b-2 mb-20">
                <h3 class="text-center general-bg-color font-bold text-2xl p-4 mb-3 text-white">{{'Comments'}}</h3>
                @if(count($blog->blogcomments) > 0)
                <div class="my-2 ml-4">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="py-5 border-b border-gray-200 bg-white">S/N</th>
                                <th class="py-5 border-b border-gray-200 bg-white">Commentator</th>
                                <th class="py-5 border-b border-gray-200 bg-white">Content</th>
                                <th class="py-5 border-b border-gray-200 bg-white">Status</th>
                                <th class="py-5 border-b border-gray-200 bg-white">Action</th>
                            <tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($blog->blogcomments as $index => $comment)
                                <tr>
                                    <td class="py-5 border-b border-gray-200 bg-white">{{$index + 1}}</td>
                                    <td class="py-5 border-b border-gray-200 bg-white">{{App\Models\Commentator::find($comment->commentator_id)->name}}</td>
                                    <td class="py-5 border-b border-gray-200 bg-white">{{$comment->blog_comment}}</td>
                                    <td class="py-5 border-b border-gray-200 bg-white">{{$comment->status}}</td>
                                    @if($comment->status == 'pending')
                                        <td class="py-5 border-b border-gray-200 bg-white">
                                            <p class="mb-3"><a href="/comments/{{$comment->id}}"><span class="text-green-500 font-semibold" style="cursor:pointer">Approve</span></a></p>
                                            <p>
                                                <form method="post" action="/comments/{{$comment->id}}">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="p-0 m-0 text-red-500 font-semibold">Delete</button>
                                                </form>
                                            </p>
                                        </td>
                                    @else
                                        <td class="py-5 border-b border-gray-200 bg-white">
                                            <p class="mb-3"><a href="/comments/{{$comment->id}}"><span class="text-yellow-500 font-semibold" style="cursor:pointer">Unapprove</span></a></p>
                                            <p>
                                                <form method="post" action="/comments/{{$comment->id}}">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="p-0 m-0 text-red-500 font-semibold">Delete</button>
                                                </form>
                                            </p>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> 
                @else
                    <div class="text-center py-6 font-semibold">No comments yet</div>  
                @endif 
            </div>
        </div>
    </x-slot>

</x-app-layout>