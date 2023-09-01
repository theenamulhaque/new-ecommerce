<?php 
use App\Http\Controllers\Backend\Vendor\VenderProfileController;
use App\Http\Controllers\Backend\Vendor\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [VendorController::class, 'vendorDashboard'])->name('dashboard');

// Vendor Profile
Route::get('profile', [VenderProfileController::class, 'vendorProfile'])->name('profile');

// Vendor Profile Update
Route::put('profile', [VenderProfileController::class, 'vendorProfileUpdate'])->name('profile.update');