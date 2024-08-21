<?php

namespace App\Livewire\Note;

use App\Models\Note;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

#[On('refresh')]
class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $notes = Note::paginate(10);

        return view('livewire.note.index', compact('notes'));
    }
}
