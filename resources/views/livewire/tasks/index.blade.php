<div>
    <x-slot name="header">
       Task
    </x-slot>
    <x-primary-button onclick="Livewire.dispatch('openModal', { component: 'tasks.create',data:{} })"
    class="flex mb-10 justify-right">
       Create Task
    </x-primary-button>
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
            {{-- table  --}}
            <livewire:tasks.table />
        </div>
    </div>
</div>
