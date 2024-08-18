<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Note;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::group(['middleware' => ['auth']], function () {
    Route::post('profile', 'App\Http\Controllers\ProfileController@update')->name('profile.update');
    Route::get('profile/destroy', 'App\Http\Controllers\ProfileController@destroy')->name('profile.destroy');
    Route::get('notes', Note\Index::class)->name('notes.index');
    Route::get('notes/create', Note\Create::class)->name('notes.create');
    Route::get('notes/{note}', Note\Show::class)->name('notes.show');
    Route::get('notes/{note}/edit', Note\Edit::class)->name('notes.edit');
});


require __DIR__ . '/auth.php';
