<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('All Notes') }}
    </h2>
</x-slot>

<div class="container mx-auto mt-6 px-[10%]">
    
    <div class="flex justify-end items-center mb-4">
        <x-primary-button class="bg-blue-700 hover:bg-blue-900 " wire:navigate href="{{ route('notes.create') }}">
            {{ __('Create Note') }}
        </x-primary-button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4 items-stretch">
        @foreach ($notes as $note)
            <x-note.note-card :title="$note->title" :content="$note->content" :id="$note->id" />
        @endforeach
    </div>
    <div class="mt-6">{{ $notes->links() }}</div>
</div>
