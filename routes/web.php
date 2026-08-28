<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExcursionController;
use Illuminate\Support\Facades\Route;
use Subfission\Cas\Middleware\CASAuth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// CAS Login - redirects to CAS server
Route::get('/', function () {
    return view('welcome');
})->name('login');

// CAS Logout
Route::get('/logout', function () {
    app('cas')->logout();

    return redirect('/');
})->name('logout');

// Protected routes
Route::middleware([CASAuth::class])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Excursion management
    Route::get('/excursion', [ExcursionController::class, 'index'])->name('excursion.index');
    Route::get('/excursion/create', [ExcursionController::class, 'create'])->name('excursion.create');
    Route::post('/excursion', [ExcursionController::class, 'store'])->name('excursion.store');
    Route::get('/excursion/{excursion}', [ExcursionController::class, 'edit'])->name('excursion.edit');
    Route::put('/excursion/{excursion}', [ExcursionController::class, 'update'])->name('excursion.update');
    Route::delete('/excursion/{excursion}', [ExcursionController::class, 'destroy'])->name('excursion.destroy');

    // File management
    Route::get('/excursion/{excursion}/files', [ExcursionController::class, 'files'])->name('excursion.files');
    Route::post('/excursion/{excursion}/files', [ExcursionController::class, 'uploadFile'])->name('excursion.upload-file');
    Route::get('/excursion/{excursion}/files/{filename}/download', [ExcursionController::class, 'downloadFile'])->name('excursion.download-file');
    Route::delete('/excursion/{excursion}/files/{filename}', [ExcursionController::class, 'deleteFile'])->name('excursion.delete-file');

    // Admin routes
    Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::post('/switch-year', [AdminController::class, 'switchYear'])->name('switch-year');
        Route::get('/schools', [AdminController::class, 'schools'])->name('schools');
    });
});
