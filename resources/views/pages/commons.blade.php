<section class="flex items-center justify-center table-section p-4">
    <div class="container">
    </div>
</section>
<section class="grid grid-cols-12 mb-20">
    <div class="bg-gray-100 col-span-4 border-2 flex justify-center items-center">
        <img style="width:100%; height:20em; object-fit:fill" src="{{$image_url}}" />
    </div>
    <div class="col-span-8 border-b-2">
        <h3 class="text-center general-bg-color font-bold text-2xl p-4 mb-3 text-white">{{$name}}</h3>
        <div class="grid grid-cols-12 my-2 ml-4">
            <div class="flex text-white items-center general-bg-color p-5 col-span-3">Banner Introduction Text</div>
            <div class="col-span-9 p-5 border-2">{{$intro_text}}</div>
        </div>
        <div class="grid grid-cols-12 my-2 ml-4">
            <div class="flex text-white items-center general-bg-color p-5 col-span-3">Banner Button Text</div>
            <div class="col-span-9 p-5 border-2">{{$button_text}}</div>
        </div>
        <div class="grid grid-cols-12 my-2 ml-4">
            <div class="flex text-white items-center general-bg-color p-5 col-span-3">Meta Title</div>
            <div class="col-span-9 p-5 border-2">{{$meta_title}}</div>
        </div>
        <div class="grid grid-cols-12 my-2 ml-4">
            <div class="flex text-white items-center general-bg-color p-5 col-span-3">Meta Description</div>
            <div class="col-span-9 p-5 border-2">{{$meta_description}}</div>
        </div>
        <div class="text-center mt-5 mb-4 grid grid-cols-12">
            <p class="font-medium text-blue-700 hover:text-blue-600 cursor-pointer hover:font-bold col-span-6">
                <a href=""><i class="las la-pencil-alt font-bold mr-2 fa-lg"></i>Edit</a>
            </p>
            <p class="font-medium text-red-700 hover:text-red-600 hover:font-bold cursor-pointer col-span-6">
                <i class="las la-minus-circle font-bold mr-2 fa-lg"></i>Delete
            </p>
        </div>
    </div>
</section>