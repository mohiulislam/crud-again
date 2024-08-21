<div>
    <x-slot name="header">
       Note
    </x-slot>
    <x-primary-button onclick="Livewire.dispatch('openModal', { component: 'notes.create' })"
    class="flex mb-10 justify-right">
       Create Note
    </x-primary-button>
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
            {{-- table  --}}
            <livewire:notes.table />
        </div>
    </div>
</div>
