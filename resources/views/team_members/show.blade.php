<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="/team-members">{{ __('Team Members >> ') }} </a> <small class="text-blue-600">{{$teammember->name}}</small>
        </h2>
    </x-slot>

    <x-slot name="slot">
        @include('commons.info-displayer')
        
        <div class="grid grid-cols-12 mt-5 h-full">
            <div class="col-start-3 col-span-8">
                <img class="w-full " src={{asset('images/about-us-banner.jpg')}} />
            </div>
            <div class="col-span-12 my-5">
                <h3 class="text-2xl font-bold text-center">{{$teammember->name}}</h3>
            </div>
            <div class="col-span-12 my-2 px-10 general-text-color">
                <h3><span class="text-base font-bold">Role: </span><span>{{$teammember->role}}</span></h3>
            </div>
            <div class="col-span-12 my-2 px-10 general-text-color">
                <h3><span class="text-base font-bold">Gender: </span><span>{{ucfirst($teammember->gender)}}</span></h3>
            </div>
            <hr class="col-span-12 my-5" />
            @livewire('actions-for-team', ['teammember' => $teammember, 'viewing' => true, 'styleClass' => "pl-10 mt-2 mb-48 grid col-span-12 grid-cols-12" ], key($teammember->id))
        </div>
    </x-slot>

</x-app-layout>