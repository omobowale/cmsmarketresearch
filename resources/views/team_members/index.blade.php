<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Team Members') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <section class="flex items-center justify-center table-section p-4">
            <div class="container">
                <table class="w-full flex flex-row flex-no-wrap sm:bg-white overflow-hidden sm:shadow-lg my-5">
                    <thead class="text-white">
                        @foreach ($teammembers as $teammember)    
                            <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">    
                                <th class="p-3 text-left">Name</th>
                                <th class="p-3 text-left">Role</th>
                                <th class="p-3 text-left">Gender</th>
                                <th class="p-3 text-left">Picture</th>
                                <th class="p-3 text-left" width="110px">Actions</th>
                            </tr>
                        @endforeach
                    </thead>
                    <tbody class="flex-1 sm:flex-none">
                        @foreach ($teammembers as $teammember)    
                            <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                <td class="border-grey-light border hover:bg-gray-100 p-3">{{$teammember->name}}</td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3">{{$teammember->role}}</td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3">{{$teammember->gender}}</td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3">{{$teammember->image_path}}</td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">Delete</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        
    </x-slot>
    
</x-app-layout>