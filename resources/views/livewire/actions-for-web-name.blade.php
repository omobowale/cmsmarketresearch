<div class="{{$styleClass}}">

    {{-- Set Website name as current section --}}
    @if($webname->current == "no")
    <p class="font-medium text-green-700 hover:text-green-600 cursor-pointer hover:font-bold col-span-4">
        <a href="/website-names/{{$webname->id}}"><i class="las la-eye font-bold mr-2 fa-lg"></i>Set Current</a>
    </p>
    @endif

    {{-- Edit Website name Section --}}
    <p class="font-medium text-blue-700 hover:text-blue-600 cursor-pointer hover:font-bold col-span-4">
        <a href="/website-names/{{$webname->id}}/edit"><i class="las la-pencil-alt font-bold mr-2 fa-lg"></i>Edit</a>
    </p>

    {{-- Delete Website name Section --}}
    <p class="font-medium text-red-700 hover:text-red-600 hover:font-bold cursor-pointer col-span-4">
        <span wire:click="showModalForm"><i class="las la-minus-circle font-bold mr-2 fa-lg"></i>Delete</span>
    </p>


    <!-- Delete Token Confirmation Modal -->
    <x-jet-confirmation-modal wire:model="modalFormVisible">
        <x-slot name="title">
            <h3 class="font-bold text-xl">{{ __('Delete Website Name') }}</h3>
        </x-slot>

        <x-slot name="content">
            <p>{{ __('Are you sure you would like to delete this website name?') }}</p>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteWebName" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>

</div>