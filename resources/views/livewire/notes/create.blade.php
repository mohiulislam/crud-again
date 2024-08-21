<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 z-10 w-screen h-screen overflow-y-auto bg-gray-800 bg-opacity-50">
        <div class="flex items-center justify-center min-h-full p-4 sm:p-0">
            <div class="w-full max-w-lg px-6 py-8 mx-auto bg-white rounded-lg shadow-lg sm:px-10">
                <!-- Modal Header -->
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-2xl font-bold text-gray-900" id="modal-title">Create Note</h3>
                    <button wire:click="$dispatch('closeModal')" class="text-gray-400 hover:text-gray-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal Content -->
                <div class="space-y-6">
                    <form method="post" class="mt-6 space-y-6" wire:submit="store">

                        <div>
                            <x-input label="{{ __('Title') }}" name="title" type="text" wire:model="title"
                                placeholder="{{ __('Title') }}" />
                        </div>

                        <div>
                            <x-textarea label="{{ __('Description') }}" name="description"
                                placeholder="{{ __('Description') }}" wire:model="description" />
                        </div>

                        <div>
                            <x-input label="{{ __('Date') }}" name="date" type="date" wire:model="date"
                                placeholder="{{ __('Date') }}" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
