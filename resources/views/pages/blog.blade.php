<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pages >> ') }}
            @include('pages.navbar', ["id" => 5])
        </h2>
    </x-slot>

    <x-slot name="slot">
        @include("pages.commons", ["id" => 5, "name" => "Home", "intro_text" => "This is the intro text"])
    </x-slot>
    
</x-app-layout>