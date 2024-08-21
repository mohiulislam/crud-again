<?php
namespace App\Livewire\Tasks;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Task;

class Edit extends Component
{
    use LivewireAlert;

    public $title, $description, $start_date, $end_date, $completed;
    public $id;

    public function mount($id)
    {
        $this->id = $id;
        $record = Task::find($id);
        
		$this->title = $record->title;
		$this->description = $record->description;
		$this->start_date = $record->start_date;
		$this->end_date = $record->end_date;
		$this->completed = $record->completed;

    }

    public function render()
    {
        return view('livewire.tasks.edit');
    }




    //update
    public function update()
    {

        $this->validate([
           
		'title' => 'required',
		'start_date' => 'required',
		'end_date' => 'required',
		'completed' => 'required',
        ]);

        $record = Task::find($this->id);
        $record->update([
            
			'title' => $this-> title,
			'description' => $this-> description,
			'start_date' => $this-> start_date,
			'end_date' => $this-> end_date,
			'completed' => $this-> completed
        ]);

        $this->dispatch(['tasksUpdated']);
        $this->dispatch('closeModal');
       // $this->reset();
    }
}
