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
            <section class="flex items-center justify-center table-section p-4">
                <div class="container">
                    @if(\Session::has("success"))
                        <div class="mt-4">
                            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b relative text-teal-900 px-4 py-3 shadow-md" role="alert">
                                <div class="flex">
                                  <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                  <div>
                                    <p class="font-bold">Success</p>
                                    <p class="text-sm">{{Session::get("success")}}</p>
                                  </div>
                                </div>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                                </span>
                              </div>
                        </div>
                    @endif
                    @if(\Session::has("error"))
                        <div class="mt-4">
                            <div class="bg-red-100 border-t-4 border-red-500 rounded-b relative text-red-900 px-4 py-3 shadow-md" role="alert">
                                <div class="flex">
                                  <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                  <div>
                                    <p class="font-bold">Error</p>
                                    <p class="text-sm">{{Session::get("error")}}</p>
                                  </div>
                                </div>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                                </span>
                              </div>
                        </div>
                    @endif
                </div>
            </section>
            
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