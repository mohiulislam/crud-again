<?php
use Livewire\Volt\Component;

new class extends Component {

    public function deleteNote(): void
    {
        
    }
}; ?>

<form class="p-6" wire:submit.prevent="deleteNote">
    <h2 class="text-lg font-medium text-gray-900">
        {{ __('Are you sure you want to delete this note?') }}
    </h2>
    <p class="mt-1 text-sm text-gray-600">
        {{ __('Once the note is deleted, all of its resources and data will be permanently deleted.') }}
    </p>
    <div class="mt-6 flex justify-end space-x-4">
        <x-secondary-button x-on:click="$dispatch('close')">
            {{ __('Cancel') }}
        </x-secondary-button>
        <x-danger-button type="submit">
            {{ __('Delete Note') }}
        </x-danger-button>
    </div>
</form>
