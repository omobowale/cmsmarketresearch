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
        @include('commons.info-displayer')

        @foreach ($teammembers as $teammember)
        <section class="grid grid-cols-12 mb-20 mt-30">
            <div class="col-span-4 border-2 flex items-start" style="height: 18em">
                <div class="w-full" style="height: 100%"><img class="w-full h-full" src={{asset('images/'. $teammember->image_path)}} /></div>
            </div>
            <div class="col-span-8 border-b-2">
                <h3 class="text-center general-bg-color font-bold text-2xl p-4 mb-3 text-white">{{$teammember->name}}</h3>
                <div class="grid grid-cols-12 my-2 ml-4">
                    <div class="flex text-white items-center general-bg-color p-5 col-span-3">Role</div>
                    <div class="col-span-9 p-5 border-2">{{$teammember->role}}</div>
                </div>
                <div class="grid grid-cols-12 my-2 ml-4">
                    <div class="flex text-white items-center general-bg-color p-5 col-span-3">Gender</div>
                    <div class="col-span-9 p-5 border-2">{{ucfirst($teammember->gender)}}</div>
                </div>
                @livewire('actions-for-team', ['teammember' => $teammember, 'viewing' => false, 'styleClass' => "text-center mt-5 mb-4 grid grid-cols-12"], key($teammember->id))
            </div>
        </section>
        @endforeach
        
    </x-slot>
    
</x-app-layout>