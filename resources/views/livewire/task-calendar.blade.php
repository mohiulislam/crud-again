<div class="overflow-hidden bg-white rounded-lg shadow-lg">
    <div class="p-6 border-b border-gray-200">
        <div class="flex flex-col items-center justify-between mb-6 space-y-4 sm:flex-row sm:space-y-0">
            <button wire:click="goToPreviousMonth" class="px-4 py-2 font-semibold text-gray-700 transition duration-300 ease-in-out transform bg-gray-200 rounded hover:bg-gray-300 hover:scale-105">
                &lt; Previous
            </button>
            <h3 class="text-lg font-extrabold tracking-tight text-gray-800 sm:text-2xl">
                {{ \Carbon\Carbon::create($currentYear, $currentMonth, 1)->format('F Y') }}
            </h3>
            <button wire:click="goToNextMonth" class="px-4 py-2 font-semibold text-gray-700 transition duration-300 ease-in-out transform bg-gray-200 rounded hover:bg-gray-300 hover:scale-105">
                Next &gt;
            </button>
        </div>

        <!-- Calendar Grid -->
        <div class="grid grid-cols-4 gap-2 text-center sm:grid-cols-7">
            <!-- Weekday Labels -->
            @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
                <div class="p-2 text-xs font-bold tracking-wider text-gray-700 uppercase bg-gray-100 rounded-lg sm:text-sm">{{ $day }}</div>
            @endforeach

            <!-- Calendar Days -->
            @foreach($weeks as $week)
                @foreach($week as $day)
                    <div
                        class="relative h-32 p-2 transition duration-300 ease-in-out border rounded-lg shadow-inner cursor-pointer sm:h-36 bg-gradient-to-r from-gray-50 to-gray-100 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100"
                        @if($day) onclick="Livewire.dispatch('openModal', { component: 'tasks.create', data:{ date: '{{ $currentYear }}-{{ $currentMonth }}-{{ $day }}' } })"
                        @endif
                    >
                        @if($day)
                            <div class="absolute text-xs font-bold tracking-wide text-gray-800 sm:text-sm top-2 left-2">{{ $day }}</div>

                            <!-- Show Total Tasks Label Only if Tasks Exist -->
                            @php
                                $taskCount = $tasks->filter(fn($task) => $task->start_date <= \Carbon\Carbon::create($currentYear, $currentMonth, $day)->toDateString() && $task->end_date >= \Carbon\Carbon::create($currentYear, $currentMonth, $day)->toDateString())->count();
                            @endphp

                            @if($taskCount > 0)
                                <div class="absolute px-2 py-1 text-xs font-bold text-white bg-blue-500 rounded-full top-2 right-2">
                                    {{ $taskCount }} Task{{ $taskCount > 1 ? 's' : '' }}
                                </div>
                            @endif

                            <div class="h-16 space-y-1 overflow-y-auto mt-7 sm:h-20">
                                @foreach($tasks->filter(fn($task) => $task->start_date <= \Carbon\Carbon::create($currentYear, $currentMonth, $day)->toDateString() && $task->end_date >= \Carbon\Carbon::create($currentYear, $currentMonth, $day)->toDateString()) as $task)
                                    <div
                                        class="p-1 text-xs text-left rounded-lg transition-all duration-200 {{ $task->completed ? 'bg-green-200 text-green-800' : 'bg-blue-200 text-blue-800' }} cursor-pointer hover:bg-opacity-90 shadow-md"
                                        onclick="event.stopPropagation(); Livewire.dispatch('openModal', { component: 'tasks.edit', data:{id: '{{ $task->id }}'} })"
                                    >
                                        <strong class="block font-semibold">{{ $task->title }}</strong>
                                        <p class="truncate">{{ $task->description }}</p>
                                        @if($task->completed)
                                            <span class="text-xs font-semibold text-green-600">(Completed)</span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
