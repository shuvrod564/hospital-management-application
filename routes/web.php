<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorAuthController;
use App\Http\Controllers\PatientAuthController;
use App\Http\Controllers\Patient\AppointmentController as PatientAppointmentController;
use App\Http\Controllers\Patient\ProfileController as PatientProfileController;
use App\Http\Controllers\Patient\DashboardController as PatientDashboardController;
use App\Http\Controllers\Doctor\AppointmentController as DoctorAppointmentController;
use App\Http\Controllers\Doctor\ProfileController as DoctorProfileController;
use App\Http\Controllers\Doctor\DashboardController as DoctorDashboardController;
use App\Http\Controllers\Doctor\PatientController as DoctorPatientController;
use App\Http\Controllers\Doctor\FindDoctorController;
use App\Http\Controllers\FrontendController;

 



 
Route::get('/', [FrontendController::class, 'index'])
    ->name('frontend.home');
Route::get('/doctors', [FindDoctorController::class, 'index'])
    ->name('frontend.doctors');
Route::get('/about-us', function () {
    return view('about-us');
})->name('frontend.about-us');
Route::get('/review', function () {
    return view('review');
});
Route::get('/contact-us', function () {
    return view('contact-us');
});


/*
|--------------------------------------------------------------------------
| DOCTOR ROUTES (/doctor/**)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:doctor'])->prefix('doctor')->name('doctor.')->group(function () {
   // --- Inside the 'doctor' prefix group ---
    Route::get('/appointments', [DoctorAppointmentController::class, 'index'])->name('appointments.index');
    Route::post('/appointments/{id}/status', [DoctorAppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');
    Route::get('/appointments/{id}/prescription', [DoctorAppointmentController::class, 'prescription'])->name('appointments.prescription');  
    Route::post('/appointments/{id}/prescription', [DoctorAppointmentController::class, 'storePrescription'])->name('prescription.store');
    Route::get('/prescriptions/{id}', [DoctorAppointmentController::class, 'showPrescription'])->name('prescriptions.show');

    Route::get('/patients', [DoctorPatientController::class, 'index'])->name('patients.index');
    
    Route::get('/profile', [DoctorProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/manage', [DoctorProfileController::class, 'manage'])->name('profile.manage'); 
    Route::put('/profile/manage', [DoctorProfileController::class, 'update'])->name('profile.update');
});
Route::prefix('doctor')->group(function () {
    Route::get('/login', [DoctorAuthController::class, 'showLoginForm'])->middleware('guest')->name('doctor.login');
    Route::post('/login', [DoctorAuthController::class, 'login'])->middleware('guest')->name('doctor.login.post');
    Route::post('/logout', [DoctorAuthController::class, 'logout'])->middleware('auth')->name('doctor.logout');
 
    Route::get('/', [DoctorDashboardController::class, 'index'])->name('doctor.dashboard');
    
    
});

/*
|--------------------------------------------------------------------------
| PATIENT/USER ROUTES (/user/**)
|--------------------------------------------------------------------------
*/
Route::prefix('user')->group(function () {
    Route::get('/login', [PatientAuthController::class, 'showLoginForm'])->middleware('guest')->name('user.login');
    Route::post('/login', [PatientAuthController::class, 'login'])->middleware('guest')->name('user.login.post');
    Route::post('/logout', [PatientAuthController::class, 'logout'])->middleware('auth')->name('user.logout'); 
   
});

Route::middleware(['auth', 'role:patient'])->prefix('user')->name('user.')->group(function () {
    Route::get('/', [PatientDashboardController::class, 'index'])->name('dashboard');
    // Route::get('/', function () { return view('patient.dashboard'); })->middleware(['auth', 'patient'])->name('user.dashboard');

    // --- Inside the 'user' prefix group ---
    Route::get('/appointments', [PatientAppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/appointments/create', [PatientAppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [PatientAppointmentController::class, 'store'])->name('appointments.store');
    Route::post('/appointments/{id}/cancel', [PatientAppointmentController::class, 'cancel'])->name('appointments.cancel');
    Route::get('/profile', [PatientProfileController::class, 'index'])->name('profile.view');
    Route::get('/profile/manage', [PatientProfileController::class, 'manage'])->name('profile.manage');
    Route::put('/profile/manage', [PatientProfileController::class, 'update'])->name('profile.manage');
});

/*
|--------------------------------------------------------------------------
| DEFAULT BREEZE ROUTES (Can be removed if you only want custom logins)
|--------------------------------------------------------------------------
*/
 
 

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
