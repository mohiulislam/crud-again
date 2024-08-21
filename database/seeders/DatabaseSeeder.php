<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Note::factory(100)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'mehedihasansagor.cse@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
