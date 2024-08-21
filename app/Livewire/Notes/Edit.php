<?php
namespace App\Livewire\Notes;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Note;

class Edit extends Component
{
    use LivewireAlert;

    public $title, $description, $date;
    public $id;

    public function mount($id)
    {
        $this->id = $id;
        $record = Note::find($id);
        
		$this->title = $record->title;
		$this->description = $record->description;
		$this->date = $record->date;

    }

    public function render()
    {
        return view('livewire.notes.edit');
    }




    //update
    public function update()
    {

        $this->validate([
           
		'title' => 'required',
		'description' => 'required',
		'date' => 'required',
        ]);

        $record = Note::find($this->id);
        $record->update([
            
			'title' => $this-> title,
			'description' => $this-> description,
			'date' => $this-> date
        ]);

        $this->dispatch(['notesUpdated']);
        $this->dispatch('closeModal');
       // $this->reset();
    }
}
