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

 




Route::get('/', function () {
    return view('welcome');
})->name('frontend.home');
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
Route::prefix('doctor')->group(function () {
    Route::get('/login', [DoctorAuthController::class, 'showLoginForm'])->middleware('guest')->name('doctor.login');
    Route::post('/login', [DoctorAuthController::class, 'login'])->middleware('guest')->name('doctor.login.post');
    Route::post('/logout', [DoctorAuthController::class, 'logout'])->middleware('auth')->name('doctor.logout');
 
    Route::get('/', [DoctorDashboardController::class, 'index'])->name('doctor.dashboard');
    
    // --- Inside the 'doctor' prefix group ---
    Route::get('/appointments', [DoctorAppointmentController::class, 'index'])->name('doctor.appointments.index');
    Route::post('/appointments/{id}/status', [DoctorAppointmentController::class, 'updateStatus'])->name('doctor.appointments.updateStatus');
    Route::get('/appointments/{id}/prescription', [DoctorAppointmentController::class, 'prescription'])->name('doctor.appointments.prescription');  
    Route::post('/appointments/{id}/prescription', [DoctorAppointmentController::class, 'storePrescription'])->name('doctor.prescription.store');
    Route::get('/prescriptions/{id}', [DoctorAppointmentController::class, 'showPrescription'])->name('doctor.prescriptions.show');

    Route::get('/patients', [DoctorPatientController::class, 'index'])->name('doctor.patients.index');
    
    Route::get('/profile', [DoctorProfileController::class, 'index'])->name('doctor.profile.index');
    Route::get('/profile/manage', [DoctorProfileController::class, 'manage'])->name('doctor.profile.manage'); 
    Route::put('/profile/manage', [DoctorProfileController::class, 'update'])->name('doctor.profile.update');
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
    
    Route::get('/', [PatientDashboardController::class, 'index'])->name('user.dashboard');
    // Route::get('/', function () { return view('patient.dashboard'); })->middleware(['auth', 'patient'])->name('user.dashboard');

    // --- Inside the 'user' prefix group ---
    Route::get('/appointments', [PatientAppointmentController::class, 'index'])->name('user.appointments.index');
    Route::get('/appointments/create', [PatientAppointmentController::class, 'create'])->name('user.appointments.create');
    Route::post('/appointments', [PatientAppointmentController::class, 'store'])->name('user.appointments.store');
    Route::post('/appointments/{id}/cancel', [PatientAppointmentController::class, 'cancel'])->name('user.appointments.cancel');
    Route::get('/profile', [PatientProfileController::class, 'index'])->name('user.profile.view');
    Route::get('/profile/manage', [PatientProfileController::class, 'manage'])->name('user.profile.manage');
    Route::put('/profile/manage', [PatientProfileController::class, 'update'])->name('user.profile.manage');
   
});

/*
|--------------------------------------------------------------------------
| DEFAULT BREEZE ROUTES (Can be removed if you only want custom logins)
|--------------------------------------------------------------------------
*/
 
 

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
