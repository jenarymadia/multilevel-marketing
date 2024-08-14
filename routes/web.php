<?php

use App\Livewire\Packages\Create as PackagesCreate;
use App\Livewire\Packages\Edit as PackagesEdit;
use App\Livewire\Packages\ListTable as PackagesListTable;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::middleware(['auth'])->group(function () {
    Route::prefix('packages')->name('packages.')->group(function () {
        Route::get('/', PackagesListTable::class)->name('index');
        Route::get('/create', PackagesCreate::class)->name('create');
        Route::get('/{package}/edit', PackagesEdit::class)->name('edit');
    });
});

require __DIR__.'/auth.php';
