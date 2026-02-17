<?php

use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecruiterController ; 
use App\Http\Controllers\CandidateController ;
use App\Http\Controllers\vacancieController ; 

Route::get('/') -> middleware('auth');


Route::middleware(['auth' , 'role:recruiter']) -> group (function () {

    Route::get('/recruiter/dashboard' , [RecruiterController::class , 'index'])-> name ('recruiter.dashboard') ; 
    Route::post('/vacancies' , [vacancieController::class , 'store']) -> name('vacancies.store') ;
    // Route::put('/vacancies/{id}' , [vacancieController::class , 'update']) -> name('vacancies.update') ;

    Route::delete('/vacancies/delete/{id}' , [vacancieController::class , 'delete']) -> name('vacancies.destroy') ; 
    
});

Route::middleware(['auth' , 'role:candidate']) -> group (function() {

    Route::get('candidate/dashboard' , [CandidateController::class , 'index']) -> name ('candidate.dashboard') ; 

    Route::post('/vacancies/apply' , [vacancieController::class , 'apply']) -> name('vacancie.apply') ;

    Route::post('/education/store' , [CandidateController::class , 'storeEducation'])->name('education.store') ;
    Route::post('/experience/store' , [CandidateController::class , 'storeEcperience'])->name('experience.store') ;

    Route::delete('/experience/{id}/destroy' , [CandidateController::class , 'experienceDestroy'])->name('experience.destroy') ;
    Route::delete('/education/{id}/store' , [CandidateController::class , 'educationDestroy'])->name('education.destroy') ;



});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/candidate/{id}' , [PublicProfileController::class , 'showCandidate']) -> name('public-candidate') ;
    Route::get('/recruiter/{id}' , [PublicProfileController::class , 'showRecruiter']) -> name('public-recruiter') ;

    Route::post('/connection/{id}' , [ConnectionController::class , 'store']) ->name('connection.store') ;

    Route::post('/connection/{connection}/accepte' , [ConnectionController::class , 'accept']) -> name('connection.accepte') ;
    Route::post('/connection/{connection}/refuse' , [ConnectionController::class , 'refuse']) -> name('connection.refuse') ;

    Route::get('/conversation' , [ConversationController::class , 'index'] )->name('conversation') ;

});

require __DIR__.'/auth.php';
