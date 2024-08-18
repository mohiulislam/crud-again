<?php

namespace App\Livewire\Note;

use App\Models\Note;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;
    
    public $title;
    public $content;
    public function save()
    {

        $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Note::create([
            'title' => $this->title,
            'content' => $this->content
        ]);

        $this->flash('success', 'Portfolio Created Successfully', [
            'toast' => true,
            'position' => 'top-right'
        ]);

        return $this->redirect(route('notes.index'), true);

        return $this->redirect(route('notes.index'), true);
    }


    public function render()
    {
        return view('livewire.note.create');
    }
}
