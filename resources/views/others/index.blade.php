<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <span class="mr-10 py-8"><a href="/others">{{ __('Others') }}</a><a href="#logos" class="ml-5 text-sm text-blue-500">Logos</a><a href="#webnames" class="ml-5 text-sm text-blue-500">Website names</a><a href="#contacts" class="ml-5 text-sm text-blue-500">Contacts</a></span>
            </h2>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="m-auto px-4">
            @include('commons.info-displayer')
            
            <h3 id="logos" class="text-center general-bg-color font-bold text-2xl p-4 mb-3 text-white">{{'Logos'}} <a href="/logos/create"><span title="Add a new logo" class="bg-white ml-10 px-4 py-2 general-text-color font-bold cursor-pointer rounded-full h-12 w-12">+</span></a></h3>
            @if(count($logos) > 0)
                @foreach ($logos as $logo)
                <section class="grid grid-cols-12 mb-20">
                    <div class="col-span-4 border-2 flex items-center">
                        <div class="w-full" style="height: 10em"><img class="w-full h-full" src={{asset('images/'. $logo->image_path)}} /></div>
                    </div>
                    <div class="col-span-8 border-b-2">
                        <div class="grid grid-cols-12 my-2 ml-4">
                            <div class="flex text-white items-start general-bg-color p-5 col-span-3">Name</div>
                            <div class="col-span-9 p-5 border-2">{{$logo->name}}</div>
                        </div>
                        <div class="grid grid-cols-12 my-2 ml-4">
                            <div class="flex text-white items-start general-bg-color p-5 col-span-3">Current</div>
                            <div class="col-span-9 p-5 border-2">{{$logo->current}}</div>
                        </div>
                        @livewire('actions-for-logo', ['logo' => $logo, 'viewing' => false, 'styleClass' => "text-center mt-5 mb-4 grid grid-cols-12"], key($logo->id))
                    </div>
                </section>
                @endforeach
            
            @else
                <div class="text-center py-6 font-semibold">No logos yet</div>
            @endif


            <h3 id="webnames" class="text-center general-bg-color font-bold text-2xl p-4 mb-3 mt-5 text-white">{{'Website Names'}} <a href="/website-names/create"><span title="Add a new website name" class="bg-white ml-10 px-4 py-2 general-text-color font-bold cursor-pointer rounded-full h-12 w-12">+</span></a></h3>
            @if(count($webnames) > 0)
                @foreach ($webnames as $webname)
                <section class="grid grid-cols-12 mb-20">
                    <div class="col-span-12 border-b-2">
                        <div class="grid grid-cols-12 my-2 ml-4">
                            <div class="flex text-white items-center general-bg-color p-5 col-span-3">Name</div>
                            <div class="col-span-9 p-5 border-2">{{$webname->name}}</div>
                        </div>
                        <div class="grid grid-cols-12 my-2 ml-4">
                            <div class="flex text-white items-center general-bg-color p-5 col-span-3">Current</div>
                            <div class="col-span-9 p-5 border-2">{{$webname->current}}</div>
                        </div>
                        @livewire('actions-for-web-name', ['webname' => $webname, 'viewing' => false, 'styleClass' => "text-center mt-5 mb-4 grid grid-cols-12"], key($webname->id))
                    </div>
                </section>
                @endforeach
            @else
                <div class="text-center py-6 font-semibold">No website names yet</div>
            @endif

            <h3 id="contacts" class="text-center general-bg-color font-bold text-2xl p-4 mb-3 mt-5 text-white">{{'Contacts'}} <a href="/contact-manager/create"><span title="Add a new contact" class="bg-white ml-10 px-4 py-2 general-text-color font-bold cursor-pointer rounded-full h-12 w-12">+</span></a></h3>
            @if(count($contacts) > 0)
                @foreach ($contacts as $contact)
                <section class="grid grid-cols-12 mb-20">
                    <div class="col-span-12 border-b-2">
                        <div class="grid grid-cols-12 my-2 ml-4">
                            <div class="flex text-white items-center general-bg-color p-5 col-span-3">Address</div>
                            <div class="col-span-9 p-5 border-2">{{$contact->address}}</div>
                        </div>
                        <div class="grid grid-cols-12 my-2 ml-4">
                            <div class="flex text-white items-center general-bg-color p-5 col-span-3">Email</div>
                            <div class="col-span-9 p-5 border-2">{{$contact->email}}</div>
                        </div>
                        <div class="grid grid-cols-12 my-2 ml-4">
                            <div class="flex text-white items-center general-bg-color p-5 col-span-3">Phone</div>
                            <div class="col-span-9 p-5 border-2">{{$contact->phone}}</div>
                        </div>
                        <div class="grid grid-cols-12 my-2 ml-4">
                            <div class="flex text-white items-center general-bg-color p-5 col-span-3">Contactable</div>
                            <div class="col-span-9 p-5 border-2">{{$contact->contactable}}</div>
                        </div>
                        @livewire('actions-for-contact-manager', ['contact' => $contact, 'viewing' => false, 'styleClass' => "text-center mt-5 mb-4 grid grid-cols-12"], key($contact->id))
                    </div>
                </section>
                @endforeach
            @else
                <div class="text-center py-6 font-semibold">No contacts yet</div>
            @endif

        </div>
    </x-slot>
    
</x-app-layout>