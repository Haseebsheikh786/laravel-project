<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // });

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
