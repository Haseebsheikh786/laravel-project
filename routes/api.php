<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::middleware(['api', 'web'])->group(function () {
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::get('/note', [NoteController::class, 'index'])->name('note.index');
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/note/create', [NoteController::class, 'create'])->name('note.create');
    Route::post('/note', [NoteController::class, 'store'])->name('note.store');
    Route::get('/note/{note}', [NoteController::class, 'show'])->name('note.show');
    Route::get('/note/{note}/edit', [NoteController::class, 'edit'])->name('note.edit');
    Route::put('/note/{note}', [NoteController::class, 'update'])->name('note.update');
    Route::delete('/note/{note}', [NoteController::class, 'destroy'])->name('note.destroy');
});
 
// separate connection like vue  have link with this file. they does not have link with web.php
