<?php 
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\AdminProfileController;
use Illuminate\Support\Facades\Route;

Route::get('admin-dashboard', [AdminController::class, 'adminDashboard'])->name('admin-dashboard');

// admin profile route
Route::get('profile', [AdminProfileController::class, 'adminProfile'])->name('profile');

// admin profile UPDATE route
Route::post('profile/update', [AdminProfileController::class, 'adminProfileUpdate'])->name('profile.update');

// admin password UPDATE route
Route::post('profile/update/password', [AdminProfileController::class, 'adminProfileUpdatePassword'])->name('profile.update.password');