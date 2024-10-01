<?php

use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {

    return view('home');
    //    $jobs = Job::all();

    //    dd($jobs);
});

// Route::get('/jobs', function () {
//  $jobs = Job::with('employer')->paginate(3);
// // $jobs = Job::all();
//     return view(
//         'jobs.index',
//         [
//             'jobs' => $jobs
//         ]
//     );
// });

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->paginate(3); // Simplified query without relationships

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});


Route::get('/jobs/create', function () {
    return view('jobs.create');
});



Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    if (!$job) {
        abort(404); // Handle case where job is not found
    }

    return view('jobs.show', ['job' => $job]);
});


Route::get('/contact', function () {
    return view('contact');
});

Route::post('/jobs', function () {
    // dd(request()->all());

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

