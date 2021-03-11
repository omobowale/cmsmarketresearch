<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="/services">{{ __('Services >> ') }} </a> <small class="text-blue-600">{{$service->name}}</small>
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="grid grid-cols-12 mt-5 h-full">
            <div class="col-start-3 col-span-8 h-72">
                <div class="w-full h-full"><img class="w-full h-full" src={{asset('images/'. $service->image_path)}} /></div>
            </div>
            <div class="col-span-12 my-5">
                <h3 class="text-2xl font-bold text-center">{{$service->name}}</h3>
            </div>
            <div class="col-span-12 my-2 px-10">
                <h3 class="text-base font-bold">{{$service->short_description}}</h3>
            </div>
            <div class="col-span-12 my-2 px-10">
                <h3 class="text-base">{!!$service->full_description!!}</h3>
            </div>
            <hr class="col-span-12 my-5" />
            <div class="col-span-12 my-2 px-10 general-text-color">
                <h3><span class="text-base font-bold">Slug: </span><span>{{$service->slug}}</span></h3>
            </div>
            <div class="col-span-12 my-2 px-10 general-text-color">
                <h3><span class="text-base font-bold">Meta Title: </span><span>{{$service->meta_title}}</span></h3>
            </div>
            <div class="col-span-12 my-2 px-10 general-text-color">
                <h3><span class="text-base font-bold">Meta Description: </span><span>{{$service->meta_description}}</span></h3>
            </div>
            <hr class="col-span-12 my-5" />
            @livewire('actions-for-service', ['service' => $service, 'viewing' => true, 'styleClass' => "pl-10 mt-2 mb-48 grid col-span-12 grid-cols-12" ], key($service->id))
        </div>
    </x-slot>

</x-app-layout>