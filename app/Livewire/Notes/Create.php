<?php

namespace App\Livewire\Notes;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Note;

class Create extends Component
{

    use LivewireAlert;

    public $title, $description, $date;

    public function mount($date = null)
    {
        $this->date = $date;
    }


    public function render()
    {
        return view('livewire.notes.create');
    }





    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);

        Note::create([
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date
        ]);

        $this->alert('success', 'Note Created Successfully', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false
        ]);

        $this->dispatch(['notesCreated']);
        $this->dispatch('closeModal');
    }
}
