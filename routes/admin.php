<?php  
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminUsersAuthController;
use App\Http\Controllers\Admin\AdminDashboardController; 
use App\Http\Controllers\Admin\AppointmentController;  
use App\Http\Controllers\Admin\UserManagementController; 
 
  
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.admin-login');
    })->name('login');

    Route::post('/', [AdminUsersAuthController::class, 'login'])
        ->middleware('guest')
        ->name('login.post');

    Route::post('/logout', [AdminUsersAuthController::class, 'logout'])
        ->middleware('auth')
        ->name('logout');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('dashboard');

     
    Route::get('/users', [UserManagementController::class, 'allUsers'])->name('users.index');
    Route::get('/users/create', [UserManagementController::class, 'create'])->name('users.create');
    Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserManagementController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');


    Route::get('/appointments', [AppointmentController::class, 'index'])->name('admin.appointments');
    Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
});