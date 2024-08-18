<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create Notes') }}
    </h2>
</x-slot>

<div class="container mx-auto mt-6 px-[10%]">
    <div class="flex justify-center">
        <div class="bg-white shadow-md rounded-lg w-[50%] p-8">
            <div class="mb-4">
                <x-input-label id="title" for="title" :value="__('Title')"
                    class="block text-sm font-medium text-gray-700" />
                <x-text-input wire:model="title" id="title" class="w-full mt-1 block"
                    placeholder="Enter note title" />
                @error('title')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <x-input-label for="content" :value="__('Content')" class="block text-sm font-medium text-gray-700" />
                <x-textarea wire:model="content" id="content" class="w-full mt-1 block"
                    placeholder="Enter note content" rows="5"></x-textarea>
                @error('content')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-end mt-4">
                <x-primary-button wire:click="save" wire:navigate>
                    {{ __('Save Note') }}
                </x-primary-button>
            </div>
        </div>
    </div>
</div>
