<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Note;
use Livewire\Component;
use Illuminate\Support\Collection;
use Omnia\LivewireCalendar\LivewireCalendar;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class DailyCalendar extends LivewireCalendar
{
    use LivewireAlert;

    public $startDate;
    public $endDate;


    public function events(): Collection
    {
        $notes = Note::all();
        return  $notes;
    }
    public function onDayClick($year, $month, $day)
    {
        $this->dispatch('openModal', component: 'notes.create', data: [ 'date' => Carbon::create($year, $month, $day)->format('Y-m-d')]);
    }

    public function onEventClick($eventId)
    {
        $this->dispatch('openModal', component: 'notes.edit', data: ['id' => $eventId]);
    }

    public function onEventDropped($eventId, $year, $month, $day)
    {
        $notes = Note::find($eventId);
        $notes->update([
            'date' => $year . '-' . $month . '-' . $day
        ]);
        $this->alert('success', 'Moved successfully. ');
    }
}
