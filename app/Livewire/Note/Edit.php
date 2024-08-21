<?php

namespace App\Livewire\Note;

use App\Models\Note;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Edit extends Component
{
    use LivewireAlert;

    public $note_id;
    public $title;
    public $content;

    public function mount(Note $note)
    {
        $this->note_id = $note->id;
        $this->title = $note->title;
        $this->content = $note->content;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $note = Note::find($this->note_id);
        $note->update([
            'title' => $this->title,
            'content' => $this->content
        ]);

        $this->flash('success', 'Portfolio Updated Successfully', [
            'toast' => true,
            'position' => 'top-right',
            'timer' => 1000
        ]);
        return $this->redirect(route('notes.index'), true);
    }
    public function render()
    {
        return view('livewire.note.edit');
    }
}
