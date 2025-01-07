<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Candidate;
use App\Http\Controllers\ElectionPeriod;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student;
use App\Http\Controllers\Vote;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('login-bri', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::resource('periods', ElectionPeriod::class);
    Route::resource('candidates', Candidate::class);
    Route::resource('students', Student::class);
    Route::resource('votes', Vote::class);
    Route::post('/students/reset', [Student::class, 'resetAllStatuses'])->name('students.reset_all_statuses');
    Route::get('/votes/period/result', [Vote::class, 'indexByPeriod'])->name('votes.index_by_period');
    Route::get('/votes/period/form', [Vote::class, 'showPeriodForm'])->name('votes.period_form');
});

Route::middleware(['auth', 'role:user'])->prefix('siswa')->group(function () {
    Route::get('vote', [Student::class, 'index_user'])->name('students.index_user');
    Route::patch('vote/{candidate}', [Student::class, 'vote'])->name('students.vote_user');
});


require __DIR__.'/auth.php';