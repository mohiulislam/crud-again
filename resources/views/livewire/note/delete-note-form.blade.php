<?php
use Livewire\Volt\Component;
use App\Models\Note;

new class extends Component {
    public function deleteNote($idToDelete)
    {
        $note = Note::findOrFail($idToDelete);
        $note->delete();
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
        <x-danger-button x-on:click="$wire.call('deleteNote', idToDelete)" type="button">
            {{ __('Delete Note') }}
        </x-danger-button>
    </div>
</form>
