<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\adminlogincontroller;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TeamController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\TestimonialsController;
use App\Http\Controllers\admin\TempImagesController;

// ------------------------------------
// Frontend Routes
// ------------------------------------

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/team', [TeamController::class, 'index']);
Route::get('/testimonials', [TestimonialsController::class, 'index']);

// ------------------------------------
// Clear Cache Route (for Development)
// ------------------------------------
Route::get('/optimize-clear', function () {
    Artisan::call('optimize:clear');
    return response()->json(['message' => 'Optimization cache cleared successfully.']);
});

// ------------------------------------
// Admin Panel Routes
// ------------------------------------

Route::prefix('admin')->group(function () {

    // ------------------------------------
    // Admin Guest Routes (For Login/Registration)
    // ------------------------------------
    Route::middleware(['admin.guest'])->group(function () {
        Route::get('/registration', [AdminLoginController::class, 'registration'])->name('admin.registration');
        Route::post('/register-users', [AdminLoginController::class, 'registerUsers'])->name('admin.registerUsers');
        Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    // ------------------------------------
    // Admin Authenticated Routes (After Login)
    // ------------------------------------
    Route::middleware(['admin.auth'])->group(function () {

        // Admin Dashboard & Logout
        Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [AdminHomeController::class, 'logout'])->name('admin.logout');

        // Clear Cache
        Route::get('/clear-cache', [AdminHomeController::class, 'clearCache'])->name('admin.clearCache');

        // ------------------------------------
        // User Management Routes
        // ------------------------------------
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{users}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{users}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{users}', [UserController::class, 'destroy'])->name('users.destroy');
        // ------------------------------------
        // Pages Management Routes
        // ------------------------------------
        // Pages Route
        Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
        Route::get('/pages/create', [PageController::class, 'create'])->name('pages.create');
        Route::post('/pages', [PageController::class, 'store'])->name('pages.store');
        Route::get('/pages/{pages}/edit', [PageController::class, 'edit'])->name('pages.edit');
        Route::put('/admin/pages/{pages}', [PageController::class, 'update'])->name('pages.update');
        Route::delete('/pages/{pages}', [PageController::class, 'destroy'])->name('pages.destroy');

        // ------------------------------------
        // Authentication & Password Reset Routes
        // ------------------------------------
        Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('front.forgotPassword');
        Route::post('/process-forgot-password', [AuthController::class, 'processForgotPassword'])->name('front.processForgotPassword');
        Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('front.resetPassword');
        Route::post('/process-reset-password', [AuthController::class, 'processResetPassword'])->name('front.processResetPassword');

        // ------------------------------------
        // Settings Routes
        // ------------------------------------
        Route::get('/change-password', [SettingController::class, 'showChangePasswordForm'])->name('admin.showChangePasswordForm');
        Route::post('/process-change-password', [SettingController::class, 'processChangePassword'])->name('admin.processChangePassword');

        // ------------------------------------
        // Slug Generator Route (For SEO)
        // ------------------------------------
        Route::get('/getSlug', function (Request $request) {
            $slug = $request->title ? Str::slug($request->title) : '';
            return response()->json(['status' => true, 'slug' => $slug]);
        })->name('getSlug');

        // ------------------------------------
        // Temporary Image Upload Route
        // ------------------------------------
        Route::post('/upload-temp-image', [TempImagesController::class, 'create'])->name('temp-images.create');
    });
    Route::get('/getSlug', function (Request $request) {
        $slug = '';
        if (!empty($request->title)) {
            $slug = Str::slug($request->title);
        }
        return response()->json([
            'status' => true,
            'slug' => $slug
        ]);
    })->name('getSlug');
});
