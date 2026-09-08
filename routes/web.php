<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExcursionController;
use App\Http\Controllers\ExcursionWizardController;
use App\Http\Middleware\EnsureCasAccountHasAccess;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Subfission\Cas\Middleware\CASAuth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// CAS Login - redirects to CAS server
Route::get('/', fn (): View => view('welcome'))->name('login');

// CAS Logout
Route::get('/logout', function (): RedirectResponse {
    app('cas')->logout();

    return redirect('/');
})->name('logout');

// Protected routes
Route::middleware([CASAuth::class, EnsureCasAccountHasAccess::class])->group(function (): void {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/info', function (): View {
        return view('info');
    })->name('info');

    // Excursion management
    Route::get('/excursion', [ExcursionController::class, 'index'])->name('excursion.index');
    Route::get('/excursion/create', [ExcursionController::class, 'create'])->name('excursion.create');
    Route::get('/excursion/wizard', ExcursionWizardController::class)->name('excursion.wizard');
    Route::post('/excursion', [ExcursionController::class, 'store'])->name('excursion.store');
    Route::get('/excursion/{excursion}', [ExcursionController::class, 'edit'])->name('excursion.edit');
    Route::put('/excursion/{excursion}', [ExcursionController::class, 'update'])->name('excursion.update');
    Route::delete('/excursion/{excursion}', [ExcursionController::class, 'destroy'])->name('excursion.destroy');

    // File management
    Route::get('/excursion/{excursion}/files', [ExcursionController::class, 'files'])->name('excursion.files');
    Route::post('/excursion/{excursion}/files', [ExcursionController::class, 'uploadFile'])->name('excursion.upload-file');
    Route::get('/excursion/{excursion}/files/{filename}/download', [ExcursionController::class, 'downloadFile'])->name('excursion.download-file');
    Route::delete('/excursion/{excursion}/files/{filename}', [ExcursionController::class, 'deleteFile'])->name('excursion.delete-file');
    Route::post('/excursion/{excursion}/submit', [ExcursionController::class, 'submit'])->name('excursion.submit');

    // Admin routes
    Route::prefix('admin')->name('admin.')->middleware('admin')->group(function (): void {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::post('/switch-year', [AdminController::class, 'switchYear'])->name('switch-year');
        Route::post('/session-switch-year', [AdminController::class, 'sessionSwitchYear'])->name('session-switch-year');
        Route::post('/select-school', [AdminController::class, 'selectSchool'])->name('select-school');
        Route::post('/clear-school', [AdminController::class, 'clearSchoolSelection'])->name('clear-school');
        Route::get('/excursions/{schoolCode}', [AdminController::class, 'excursionsBySchool'])->name('excursions-by-school');
        Route::get('/schools', [AdminController::class, 'schools'])->name('schools');
    });
});
