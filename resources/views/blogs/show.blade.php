<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <span class="mr-10 text-blue-500 border-blue-500 border-b-4 py-5"><a href="/blogs">{{ __('Blogs') }}</a></span>
            <span>{{ __('Category') }}</span>
        </h2>
    </x-slot>

    <x-slot name="slot">
        <section class="flex items-center justify-center table-section p-4">
            <div class="container">
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
            </div>
        </section>
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
                    <div class="text-center font-bold">No comments yet</div>  
                @endif 
            </div>
        </div>
    </x-slot>

</x-app-layout>