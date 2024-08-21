@props(['title', 'content', 'id'])

<div
    class="relative max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow h-60 group">
    <button wire:click="$dispatch('openModal', { component: 'note.delete-note-form', data: { noteId: {{ $id }} } })" class="absolute hidden text-gray-400 top-2 right-2 hover:text-red-600 group-hover:block">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M19.5 6L4.5 6M8.25 6L8.25 4.5C8.25 3.67157 8.92157 3 9.75 3L14.25 3C15.0784 3 15.75 3.67157 15.75 4.5L15.75 6M10.5 11.25L10.5 17.25M13.5 11.25L13.5 17.25M6.75 6L17.25 6L17.25 19.5C17.25 20.3284 16.5784 21 15.75 21L8.25 21C7.42157 21 6.75 20.3284 6.75 19.5L6.75 6Z" />
    </svg>
    </button>

    {{-- <x-modal :name="'confirm-note-deletion'.$id" :show="$errors->isNotEmpty()" focusable>
        <livewire:note.delete-note-form wire:key="confirm-note-deletion{{$id}}" :noteId="$id" />
    </x-modal> --}}

    {{-- <button
        x-on:click.prevent="$dispatch('open-modal', 'confirm-note-deletion'+{{$id}})"
        class="absolute hidden text-gray-400 top-2 right-2 hover:text-red-600 group-hover:block">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M19.5 6L4.5 6M8.25 6L8.25 4.5C8.25 3.67157 8.92157 3 9.75 3L14.25 3C15.0784 3 15.75 3.67157 15.75 4.5L15.75 6M10.5 11.25L10.5 17.25M13.5 11.25L13.5 17.25M6.75 6L17.25 6L17.25 19.5C17.25 20.3284 16.5784 21 15.75 21L8.25 21C7.42157 21 6.75 20.3284 6.75 19.5L6.75 6Z" />
        </svg>
    </button> --}}
    <div class="h-full cursor-pointer" wire:navigate href="{{ route('notes.show', $id) }}">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 truncate">
                {{ $title }}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 line-clamp-5">{{ $content }}</p>
    </div>
</div>
