<?php

use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {

    return view('home');
    //    $jobs = Job::all();

    //    dd($jobs);
});

Route::get('/jobs', function () {
 $jobs = Job::with('employer')->paginate(3);
// $jobs = Job::all();
    return view(
        'jobs',
        [
            'jobs' => $jobs
        ]
    );
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('job', ['job' => $job]);
});


Route::get('/contact', function () {
    return view('contact');
});
