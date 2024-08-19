<?php

namespace App\Livewire\Note;

use Livewire\Component;
use App\Models\Note;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
 
    public function render()
    {
        $notes = Note::paginate(10);

        return view('livewire.note.index', compact('notes'));
    }
}
