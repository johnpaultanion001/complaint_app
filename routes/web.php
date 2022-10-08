<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin;
use App\Http\Controllers\Guest;
use App\Http\Controllers\Auth as Login;

Route::get('/', function () {
    return redirect()->route('admin.profile');
});
Route::get('clear_database', function () {
    \Artisan::call('cache:clear');
    \Artisan::call('migrate:fresh --seed');
    dd("Cache is cleared");
});

Auth::routes();


Route::get('verify/resend', [Login\TwoFactorController::class, 'resend'])->name('verify.resend');
Route::resource('verify', Login\TwoFactorController::class)->only(['index', 'store']);


Route::prefix('admin')->as('admin.')->middleware(['auth','twofactor'])->group(function() {
    Route::get('/profile', [Admin\StudentController::class, 'profile'])->name('profile');
    Route::post('/profile', [Admin\StudentController::class, 'update_profile'])->name('update_profile');
    Route::get('/sanction', [Admin\StudentController::class, 'sanction'])->name('sanction');
    Route::get('/complaint', [Admin\StudentController::class, 'complaint'])->name('complaint');
    Route::post('/complaint', [Admin\StudentController::class, 'store_complaint'])->name('store_complaint');
});

