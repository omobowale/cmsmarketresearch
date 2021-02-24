<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pages >> ') }}
            @include('pages.navbar', ["id" => 1])
        </h2>
    </x-slot>

    <x-slot name="slot">
        @include("pages.commons", ["id" => 1, "name" => "Home", "intro_text" => "Welcome to MarketResearchHelp"])
    </x-slot>
    
</x-app-layout>