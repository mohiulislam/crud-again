<?php
use Livewire\Volt\Component;
use App\Models\Note;

new class extends Component {

    public $idToDelete;

    public function mount($noteId){
        $this->idToDelete = $noteId;
    }

    public function deleteNote()
    {
        $note = Note::find($this->idToDelete);
        $note->delete();
        // $this->dispatch('close-modal', 'confirm-note-deletion'.$this->idToDelete);
        $this->dispatch('closeModal');
        $this->dispatch('refresh');
    }
}; ?>


<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
        <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:w-full sm:max-w-lg">
          <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
              <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                <svg class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>
              </div>
              <form class="p-6" wire:submit.prevent="deleteNote">

                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Are you sure you want to delete this note?') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Once the note is deleted, all of its resources and data will be permanently deleted.') }}
                </p>
                <div class="flex justify-end mt-6 space-x-4">
                    <x-secondary-button x-on:click="$dispatch('closeModal')">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                    <x-danger-button >
                        {{ __('Delete Note') }}
                    </x-danger-button>
                </div>
            </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>




