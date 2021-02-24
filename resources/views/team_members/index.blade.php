<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <span style="float:left">{{ __('Team Members') }}</span>
            </h2>
            <a href="/team-members/create"><div title="Add a new team member" class="general-bg-color text-white font-bold cursor-pointer rounded-full h-12 w-12 flex items-center justify-center">+</div></a>
        </div>
    </x-slot>

    <x-slot name="slot">
        <section class="flex items-center justify-center table-section p-4">
            <div class="container">
                
            </div>
        </section>

        @foreach ($teammembers as $teammember)
        <section class="grid grid-cols-12 mb-20 mt-30">
            <div class="col-span-4 border-2">
                
            </div>
            <div class="col-span-8 border-b-2">
                <h3 class="text-center general-bg-color font-bold text-2xl p-4 mb-3 text-white">{{$teammember->name}}</h3>
                <div class="grid grid-cols-12 my-2 ml-4">
                    <div class="flex text-white items-center general-bg-color p-5 col-span-3">Role</div>
                    <div class="col-span-9 p-5 border-2">{{$teammember->role}}</div>
                </div>
                <div class="grid grid-cols-12 my-2 ml-4">
                    <div class="flex text-white items-center general-bg-color p-5 col-span-3">Gender</div>
                    <div class="col-span-9 p-5 border-2">{{$teammember->gender}}</div>
                </div>
                <div class="text-center mt-5 mb-4 grid grid-cols-12">
                    <p class="font-medium text-blue-700 hover:text-blue-600 cursor-pointer hover:font-bold col-span-6">
                        <a href="team-members/{{$teammember->id}}/edit"><i class="las la-pencil-alt font-bold mr-2 fa-lg"></i>Edit</a>
                    </p>
                    <p class="font-medium text-red-700 hover:text-red-600 hover:font-bold cursor-pointer col-span-6">
                        <i class="las la-minus-circle font-bold mr-2 fa-lg"></i>Delete
                    </p>
                </div>
            </div>
        </section>
        @endforeach
        
    </x-slot>
    
</x-app-layout>