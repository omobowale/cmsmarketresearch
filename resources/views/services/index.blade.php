<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Services') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <section class="flex items-center justify-center table-section p-4">
            <div class="container">
                <table class="w-full flex flex-row flex-no-wrap sm:bg-white overflow-hidden sm:shadow-lg my-5">
                    <thead class="text-white">
                      @foreach ($services as $service)    
                        <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                            <th class="p-3 text-left">Name</th>
                            <th class="p-3 text-left">Short Description</th>
                            <th class="p-3 text-left">Full Description</th>
                            <th class="p-3 text-left">Image</th>
                            <th class="p-3 text-left">Slug</th>
                            <th class="p-3 text-left">Meta Title</th>
                            <th class="p-3 text-left">Meta Description</th>
                            <th class="p-3 text-left" width="110px">Actions</th>
                        </tr>
                      @endforeach
                    </thead>
                    <tbody class="flex-1 sm:flex-none">
                        @foreach ($services as $service)    
                            <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                <td class="border-grey-light border hover:bg-gray-100 p-3">{{$service->name}}</td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3">{{$service->short_description}}</td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3">{{$service->full_description}}</td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3">{{$service->slug}}</td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3">{{$service->meta_title}}</td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3">{{$service->meta_description}}</td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3">{{$service->image_path}}</td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3">
                                    <p class="font-medium text-blue-600 mb-4 cursor-pointer hover:font-bold">
                                        <a href="services/{{$service->id}}/edit">Edit</a>
                                    </p>
                                    <p class="font-medium text-red-400 hover:text-red-600 hover:font-bold cursor-pointer">
                                        Delete
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        
    </x-slot>
    
</x-app-layout>