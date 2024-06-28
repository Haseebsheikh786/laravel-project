<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/', [NoteController::class, 'index'])->name('note.index');
Route::get('/note/create', [NoteController::class, 'create'])->name('note.create');
Route::post('/note', [NoteController::class, 'store'])->name('note.store');
Route::get('/note/{note}', [NoteController::class, 'show'])->name('note.show');
Route::get('/note/{note}/edit', [NoteController::class, 'edit'])->name('note.edit');
Route::put('/note/{note}', [NoteController::class, 'update'])->name('note.update');
Route::delete('/note/{note}', [NoteController::class, 'destroy'])->name('note.destroy');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    Route::get('/jobs', function () {
        return view('jobs', [
            'jobs' => [
                [
                    'id' => 1,
                    'title' => 'Director',
                    'salary' => '$50,000'
                ],
                [
                    'id' => 2,
                    'title' => 'Programmer',
                    'salary' => '$10,000'
                ],
                [
                    'id' => 3,
                    'title' => 'Teacher',
                    'salary' => '$40,000'
                ]
            ]
        ]);
    })->name('jobs');

    Route::get('/jobs/{id}', function ($id) {
        $jobs = [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,000'
            ],
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '$10,000'
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '$40,000'
            ]
        ];

        $job = Arr::first($jobs, fn ($job) => $job['id'] == $id);

        return view('job', ['job' => $job]);
    })->name('job');
});
 


require __DIR__.'/auth.php';
