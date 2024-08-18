<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('View Note') }}
    </h2>
</x-slot>

<div class="container mx-auto mt-6 px-[10%]">
    <div class="flex justify-center">
        <div class="bg-white shadow-md rounded-lg w-[50%] p-8">
            <div class="mb-4">
                <h3 class="text-2xl font-bold text-gray-800">{{ $note->title }}</h3>
            </div>
            <div class="mb-4">
                <p class="text-gray-700 whitespace-pre-line">{{ $note->content }}</p>
            </div>
            <div class="flex justify-between mt-4">
                <x-secondary-button wire:navigate href="{{ route('notes.index') }}">
                    {{ __('Back') }}
                </x-secondary-button>
                <x-primary-button wire:navigate href="{{ route('notes.edit', $note->id) }}">
                    {{ __('Edit Note') }}
                </x-primary-button>
            </div>
        </div>
    </div>
</div>
