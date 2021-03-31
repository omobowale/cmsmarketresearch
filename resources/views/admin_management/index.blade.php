<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <span class="mr-10 py-8"><a href="/admin-management">{{ __('Admin Management') }}</a></span>
            </h2>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="m-auto px-4">
            @include('commons.info-displayer')
            
            <h3 class="text-center general-bg-color font-bold text-2xl p-4 mb-3 mt-5 text-white">{{'Admins'}} <a href="/contact-manager/create"><span title="Add a new admin" class="bg-white ml-10 px-4 py-2 general-text-color font-bold cursor-pointer rounded-full h-12 w-12">+</span></a></h3>
            {{-- Users are admins --}}
            @if(count($users) > 0)
                @foreach ($users as $user)
                <section class="grid grid-cols-12 mb-20">
                    <div class="col-span-12 border-b-2">
                        <div class="grid grid-cols-12 my-2 ml-4">
                            <div class="flex text-white items-center general-bg-color p-5 col-span-3">Name</div>
                            <div class="col-span-9 p-5 border-2">{{$user->name}}</div>
                        </div>
                        <div class="grid grid-cols-12 my-2 ml-4">
                            <div class="flex text-white items-center general-bg-color p-5 col-span-3">Email</div>
                            <div class="col-span-9 p-5 border-2">{{$user->email}}</div>
                        </div>
                        <div class="grid grid-cols-12 my-2 ml-4">
                            <div class="flex text-white items-center general-bg-color p-5 col-span-3">Role</div>
                            <div class="col-span-9 p-5 border-2">{{$user->role}}</div>
                        </div>
                        @livewire('actions-for-admin-management', ['user' => $user, 'viewing' => false, 'styleClass' => "text-center mt-5 mb-4 grid grid-cols-12"], key($user->id))
                    </div>
                </section>
                @endforeach
            @else
                <div class="text-center py-6 font-semibold">No admins yet</div>
            @endif

        </div>
    </x-slot>
    
</x-app-layout>