<?php

namespace App\Livewire\Note;

use App\Models\Note;
use Livewire\Component;

class Show extends Component
{

    public $note;

    public function mount(Note $note)
    {
        $this->note = $note;
    }

    public function render()
    {
        return view('livewire.note.show');
    }
}
