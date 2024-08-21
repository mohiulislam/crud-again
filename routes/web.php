<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', App\Livewire\Profile\Index::class)->name('profile.edit');
});

require __DIR__ . '/auth.php';

//Route Hooks - Do not delete//
	Route::get('tasks', App\Livewire\Tasks\Index::class)->name('tasks.index')->middleware('auth');
	Route::get('notes', App\Livewire\Notes\Index::class)->name('notes.index')->middleware('auth');
    // Volt::route('calendar','calendar.index')->name('calendar.index')->middleware('auth');
    Route::get('calendar', App\Livewire\TaskCalendar::class)->name('calendar.index')->middleware('auth');
