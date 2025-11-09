<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\InternshipApplicationController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\StudentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');
Route::inertia('/about', 'About')->name('about');
Route::inertia('/contact', 'Contact')->name('contact');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
	// Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Resources
    Route::resource('internships', InternshipController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('students', StudentController::class);
    Route::resource('fields', FieldController::class);
    Route::resource('skills', SkillController::class);
    // Applications
    Route::post('/applications/{application}', [ApplicationController::class, 'reply'])->name('applications.reply');
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('/internships/{internship}/apply', [ApplicationController::class, 'create'])->name('applications.create');
    Route::post('/internship/{internship}/apply', [ApplicationController::class, 'store'])->name('applications.store');
    Route::get('/applications/{application}/edit', [ApplicationController::class, 'edit'])->name('applications.edit');
    Route::get('/applications/{application}', [ApplicationController::class, 'show'])->name('applications.show');
    Route::put('/applications/{application}', [ApplicationController::class, 'update'])->name('applications.update');
    Route::delete('/applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
    Route::get('/internships/{internship}/applications', InternshipApplicationController::class)->name('internships.applications.index');
	// Likes
    Route::get('/likes', [LikeController::class, 'index'])->name('likes.index');
    Route::post('/like/{internship}', [LikeController::class, 'store'])->name('likes.store');
	// Messages
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{user}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
	// Notifications
	Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
	Route::get('/notifications/clear', [NotificationController::class, 'clear'])->name('notifications.clear');
    Route::post('/notifications/{notification}', [NotificationController::class, 'store'])->name('notifications.store');
});
