<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\BlogCreate;
use App\Livewire\BlogIndex;
use App\Livewire\BlogEdit;
use App\Livewire\BlogDelete;

Route::get('/blogs', BlogIndex::class)->name('blog.index');
Route::get('/blogs/create', BlogCreate::class)->name('blog.create');
Route::get('/blogs/{id}/edit', BlogEdit::class)->name('blog.edit');
Route::get('/blogs/{postId}/delete', BlogDelete::class)->name('blog.delete');
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
