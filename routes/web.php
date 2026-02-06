<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecruiterController ; 
use App\Http\Controllers\CandidateController ;
use App\Http\Controllers\vacancieController ; 


Route::get('/', function () {
    return 'welcom';
});


Route::middleware(['auth' , 'role:recruiter']) -> group (function () {

    Route::get('/recruiter/dashboard' , [RecruiterController::class , 'index'])-> name ('recruiter.dashboard') ; 
    Route::post('/vacancies' , [vacancieController::class , 'store']) -> name('vacancies.store') ;
    // Route::put('/vacancies/{id}' , [vacancieController::class , 'update']) -> name('vacancies.update') ;

    Route::delete('/vacancies/delete/{id}' , [vacancieController::class , 'delete']) -> name('vacancies.destroy') ; 
    
});

Route::middleware(['auth' , 'role:candidate']) -> group (function() {

    Route::get('candidate/dashboard' , [CandidateController::class , 'index']) -> name ('candidate.dashboard') ; 

});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/candidate/{$id}' , [PublicProfileController::class , 'showCandidate']) -> name('public-candidate') ;
    Route::get('/recruiter/{$id}' , [PublicProfileController::class , 'showRecruiter']) -> name('public-recruiter') ;

});

require __DIR__.'/auth.php';
