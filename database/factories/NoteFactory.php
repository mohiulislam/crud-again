<?php

namespace Database\Factories;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NoteFactory extends Factory
{
    protected $model = Note::class;

    public function definition()
    {
        $dates = $this->faker->dateTimeBetween('-1 month', '+1 month');
        return [
			'title' => $this->faker->name,
			'description' => $this->faker->sentence(10),
            'date' => $dates->format('Y-m-d'),
        ];
    }
}
