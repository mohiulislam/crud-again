<?php

namespace App\Livewire\Tasks;

use Carbon\Carbon;
use App\Models\Task;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Create extends Component
{

    use LivewireAlert;

    public $title, $description, $start_date, $end_date, $completed;


    public function mount($date=null){

        $this->start_date = Carbon::create($date)->format('Y-m-d');
    }


    public function render()
    {
        return view('livewire.tasks.create');
    }





    public function store()
    {
        $this->validate([

		'title' => 'required',
		'start_date' => 'required',
		'end_date' => 'required',
		'completed' => 'required',
        ]);

        Task::create([

			'title' => $this-> title,
			'description' => $this-> description,
			'start_date' => $this-> start_date,
			'end_date' => $this-> end_date,
			'completed' => $this-> completed
        ]);

        $this->alert('success', 'Task Created Successfully', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false
        ]);

        $this->dispatch(['tasksCreated']);
        $this->dispatch('closeModal');
    }
}
