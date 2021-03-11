<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <span style="float:left">{{ __('Services') }}</span>
            </h2>
            <a href="/services/create"><div title="Add a new service" class="general-bg-color text-white font-bold cursor-pointer rounded-full h-12 w-12 flex items-center justify-center">+</div></a>
        </div>
    </x-slot>

    <x-slot name="slot">
        @include('commons.info-displayer')
        
        @foreach ($services as $service)
            <section class="grid grid-cols-12 mb-20">
                <div class="col-span-4 border-2 flex items-center">
                    <div class="w-full h-1/2"><img class="w-full h-full" src={{asset('images/'. $service->image_path)}} /></div>
                </div>
                <div class="col-span-8 border-b-2">
                    <h3 class="text-center general-bg-color font-bold text-2xl p-4 mb-3 text-white">{{$service->name}}</h3>
                    <div class="grid grid-cols-12 my-2 ml-4">
                        <div class="flex text-white items-center general-bg-color p-5 col-span-3">Short Description</div>
                        <div class="col-span-9 p-5 border-2">{{$service->short_description}}</div>
                    </div>
                    <div class="grid grid-cols-12 my-2 ml-4">
                        <div class="flex text-white items-center general-bg-color p-5 col-span-3">Slug</div>
                        <div class="col-span-9 p-5 border-2">{{$service->slug}}</div>
                    </div>
                    <div class="grid grid-cols-12 my-2 ml-4">
                        <div class="flex text-white items-center general-bg-color p-5 col-span-3">Meta Title</div>
                        <div class="col-span-9 p-5 border-2">{{$service->meta_title}}</div>
                    </div>
                    <div class="grid grid-cols-12 my-2 ml-4">
                        <div class="flex text-white items-center general-bg-color p-5 col-span-3">Meta Description</div>
                        <div class="col-span-9 p-5 border-2">{{$service->meta_description}}</div>
                    </div>
                    @livewire('actions-for-service', ['service' => $service, 'viewing' => false, 'styleClass' => "text-center mt-5 mb-4 grid grid-cols-12"], key($service->id))

                </div>
            </section>
            @endforeach
    </x-slot>
    
</x-app-layout>