<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecruiterController ; 
use App\Http\Controllers\CandidateController ;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/recruiter/dashboard', function () {
//     return view('recruiter.dashboardrecruiter');
// })->middleware(['auth', 'verified' , 'role:recruiter'])->name('recruiter.dashboard');

Route::middleware(['auth' , 'verified' , 'role:recruiter']) -> group (function () {

    Route::get('/recruiter/dashboard' , [RecruiterController::class , 'index'])-> name ('recruiter.dashboard') ; 

});

Route::middleware(['auth' , 'verified' , 'role:candidate']) -> group (function() {

    Route::get('candidate/dashboard' , [CandidateController::class , 'index']) -> name ('dashboard') ; 

});



// Route::get('candidate/dashboard', function () {
//     return view('candidate.dashboardcandidate');
// })->middleware(['auth', 'verified' , 'role:candidate'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
