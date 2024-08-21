<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
			'title' => $this->faker->name,
			'description' => $this->faker->name,
			'start_date' => $this->faker->name,
			'end_date' => $this->faker->name,
			'completed' => $this->faker->name,
        ];
    }
}
