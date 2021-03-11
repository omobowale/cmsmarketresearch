<div class="{{$styleClass}}">

    {{-- Edit Blog Category Section --}}
    <p class="font-medium text-blue-700 hover:text-blue-600 cursor-pointer hover:font-bold col-span-4">
        <a href="/blogs/categories/{{$blogcategory->id}}/edit"><i class="las la-pencil-alt font-bold mr-2 fa-lg"></i>Edit</a>
    </p>

    {{-- Delete Blog Category Section --}}
    <p class="font-medium text-red-700 hover:text-red-600 hover:font-bold cursor-pointer col-span-4">
        <span wire:click="showModalForm"><i class="las la-minus-circle font-bold mr-2 fa-lg"></i>Delete</span>
    </p>


    <!-- Delete Token Confirmation Modal -->
    <x-jet-confirmation-modal wire:model="modalFormVisible">
        <x-slot name="title">
            <h3 class="font-bold text-xl">{{ __('Delete Blog Category') }}</h3>
        </x-slot>

        <x-slot name="content">
            <p class="mb-4">{{ __('Deleting a blog category will delete all associated blogs') }}</p>
            <p>{{ __('Are you sure you would like to delete this blog category?') }}</p>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteBlogCategory" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>

</div>