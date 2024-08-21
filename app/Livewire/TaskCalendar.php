<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Carbon\Carbon;

class TaskCalendar extends Component
{
    public $currentMonth;
    public $currentYear;
    public $weeks = [];
    public $tasks = [];
    public $selectedTask = null;
    public $title;
    public $description;
    public $start_date;
    public $end_date;
    public $completed = false;
    public $showTaskForm = false;

    public function mount()
    {
        $this->currentMonth = Carbon::now()->month;
        $this->currentYear = Carbon::now()->year;

        $this->generateCalendar();
        $this->loadTasks();
    }

    public function generateCalendar()
    {
        $startOfMonth = Carbon::create($this->currentYear, $this->currentMonth, 1);
        $daysInMonth = $startOfMonth->daysInMonth;

        $firstDayOfWeek = $startOfMonth->dayOfWeek;
        $weeks = [];
        $week = array_fill(0, $firstDayOfWeek, null); // Fill initial empty days

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $week[] = $day;
            if (count($week) == 7) {
                $weeks[] = $week;
                $week = [];
            }
        }

        if (count($week) > 0) {
            $weeks[] = array_pad($week, 7, null); // Pad remaining days of the week
        }

        $this->weeks = $weeks;
    }

    public function loadTasks()
    {
        $startOfMonth = Carbon::create($this->currentYear, $this->currentMonth, 1)->startOfMonth();
        $endOfMonth = Carbon::create($this->currentYear, $this->currentMonth, 1)->endOfMonth();

        $this->tasks = Task::whereBetween('start_date', [$startOfMonth, $endOfMonth])
                            ->orWhereBetween('end_date', [$startOfMonth, $endOfMonth])
                            ->get();
    }

    public function goToPreviousMonth()
    {
        $this->currentMonth--;
        if ($this->currentMonth < 1) {
            $this->currentMonth = 12;
            $this->currentYear--;
        }
        $this->generateCalendar();
        $this->loadTasks();
    }

    public function goToNextMonth()
    {
        $this->currentMonth++;
        if ($this->currentMonth > 12) {
            $this->currentMonth = 1;
            $this->currentYear++;
        }
        $this->generateCalendar();
        $this->loadTasks();
    }

    public function createTask($date)
    {
        $this->resetForm();
        $this->start_date = Carbon::create($this->currentYear, $this->currentMonth, $date)->format('Y-m-d');
        $this->end_date = $this->start_date;
        $this->showTaskForm = true;
    }

    public function editTask(Task $task)
    {
        $this->selectedTask = $task;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->start_date = $task->start_date;
        $this->end_date = $task->end_date;
        $this->completed = $task->completed;
        $this->showTaskForm = true;
    }

    public function saveTask()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        if ($this->selectedTask) {
            $this->selectedTask->update([
                'title' => $this->title,
                'description' => $this->description,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'completed' => $this->completed,
            ]);
        } else {
            Task::create([
                'title' => $this->title,
                'description' => $this->description,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'completed' => $this->completed,
            ]);
        }

        $this->resetForm();
        $this->loadTasks();
        $this->showTaskForm = false;
    }

    public function resetForm()
    {
        $this->selectedTask = null;
        $this->title = '';
        $this->description = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->completed = false;
    }

    public function render()
    {
        return view('livewire.task-calendar');
    }
}
