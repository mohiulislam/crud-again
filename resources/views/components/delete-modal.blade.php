<div x-data="{ open: false }">
    <div x-show="open" class="fixed inset-0 bg-gray-800 bg-opacity-75 transition-opacity"
        x-transition:enter="transition ease-out duration-300" x-transition:leave="transition ease-in duration-200"
        @click="open = false"></div>

    <div x-show="open" class="fixed inset-0 flex items-center justify-center p-4"
        x-transition:enter="transition ease-out duration-300" x-transition:leave="transition ease-in duration-200">
        <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6">
            <div class="flex justify-between items-center border-b pb-2">
                <h3 class="text-lg font-semibold text-red-600">Delete</h3>
                <button @click.stop="open = false" class="text-gray-600 hover:text-gray-900">&times;</button>
            </div>
            <div class="mt-4">
                <p> Are you sure you want to delete this?</p>
            </div>
            <div class="mt-6 flex justify-end">
                <button @click="open = false" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                <button wire:click="{{ $action }}"
                    class="bg-green-500 text-white px-4 py-2 rounded">Delete</button>
            </div>
        </div>
    </div>
</div>
