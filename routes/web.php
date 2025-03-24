<?php

use App\Http\Controllers\Admin\FooterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\AboutController;

use App\Http\Controllers\Frontend\HomeController;

use App\Http\Controllers\Admin\HeroSectionController;

use App\Http\Controllers\Admin\CompanyLogoController;

use App\Http\Controllers\TeamController;
use App\Http\Controllers\Admin\MessagesController;

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\adminlogincontroller;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;

use App\Http\Controllers\Frontend\TestimonialsController as FrontendTestimonialController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;


use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Frontend\BlogController as FrontendBlogController;

use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\TempImagesController;


// ------------------------------------
// Frontend Routes
// ------------------------------------
Route::get('/admin/temp-images', [TempImagesController::class, 'index'])->name('admin.temp-images.index');

Route::get('/', [HomeController::class, 'index']);

Route::prefix('admin')->group(function () {
    Route::get('/hero-sections', [HeroSectionController::class, 'index'])->name('admin.hero.index');
    Route::get('/hero-sections/create', [HeroSectionController::class, 'create'])->name('admin.hero.create');
    Route::post('/hero-sections/store', [HeroSectionController::class, 'store'])->name('admin.hero.store');
    Route::get('/hero-sections/edit/{id}', [HeroSectionController::class, 'edit'])->name('admin.hero.edit');
    Route::put('/hero-sections/update/{id}', [HeroSectionController::class, 'update'])->name('admin.hero.update');
    Route::delete('/hero-sections/destroy/{id}', [HeroSectionController::class, 'destroy'])->name('admin.hero.destroy');
});

Route::prefix('admin/employee')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('admin.employee.index');
    Route::get('/create', [EmployeeController::class, 'create'])->name('admin.employee.create');
    Route::post('/store', [EmployeeController::class, 'store'])->name('admin.employee.store');
    Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('admin.employee.edit');
    Route::put('/update/{id}', [EmployeeController::class, 'update'])->name('admin.employee.update');
    Route::delete('/destroy/{id}', [EmployeeController::class, 'destroy'])->name('admin.employee.destroy');
});


Route::get('/about', [AboutController::class, 'frontendIndex'])->name('frontend.about');

Route::prefix('admin')->group(function () {
    Route::get('/about', [AboutController::class, 'adminIndex'])->name('admin.about.index');
    Route::get('/about/create', [AboutController::class, 'create'])->name('admin.about.create');
    Route::post('/about', [AboutController::class, 'store'])->name('admin.about.store');
    Route::get('/about/{id}/edit', [AboutController::class, 'edit'])->name('admin.about.edit');
    Route::put('/about/{id}', [AboutController::class, 'update'])->name('admin.about.update');
    Route::delete('/about/{id}', [AboutController::class, 'destroy'])->name('admin.about.destroy');
    Route::post('/admin/about/update', [AboutController::class, 'update'])->name('admin.about.update');

});

//Route::get('/blog', [BlogController::class, 'index']);
//Route::get('/blog/{id}', [BlogController::class, 'show']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('companylogos', CompanyLogoController::class);
});

Route::get('/team', [TeamController::class, 'frontendIndex'])->name('frontend.team.index');
Route::get('/team/{id}', [TeamController::class, 'frontendShow'])->name('frontend.team.show');

Route::prefix('admin/team')->group(function () {
    Route::get('/', [TeamController::class, 'adminIndex'])->name('admin.team.index');
    Route::get('/create', [TeamController::class, 'adminCreate'])->name('admin.team.create');
    Route::post('/store', [TeamController::class, 'adminStore'])->name('admin.team.store');
    Route::get('/edit/{id}', [TeamController::class, 'adminEdit'])->name('admin.team.edit');
    Route::post('/update/{id}', [TeamController::class, 'adminUpdate'])->name('admin.team.update');
    Route::delete('/delete/{id}', [TeamController::class, 'adminDestroy'])->name('admin.team.destroy');
});

Route::get('/blog', [FrontendBlogController::class, 'index'])->name('frontend.blog.index');

Route::get('/blog-details/{id}', [FrontendBlogController::class, 'show'])->name('frontend.blog.show');
Route::prefix('admin')->group(function () {
    Route::get('/blogs', [AdminBlogController::class, 'index'])->name('admin.blogs.index');
    Route::get('/blogs/create', [AdminBlogController::class, 'create'])->name('admin.blogs.create');
    Route::post('/blogs/store', [AdminBlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('/blogs/{id}/edit', [AdminBlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::put('/blogs/{id}/update', [AdminBlogController::class, 'update'])->name('admin.blogs.update');
    Route::delete('/blogs/{id}/delete', [AdminBlogController::class, 'destroy'])->name('admin.blogs.destroy');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::get('/services', [ServiceController::class, 'index']);

Route::prefix('admin')->group(function () {
    Route::get('/services', [AdminServiceController::class, 'index'])->name('admin.services.index');
    Route::get('/services/create', [AdminServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/services/store', [AdminServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/services/edit/{id}', [AdminServiceController::class, 'edit'])->name('admin.services.edit');
    Route::post('/services/update/{id}', [AdminServiceController::class, 'update'])->name('admin.services.update');
    Route::get('/services/delete/{id}', [AdminServiceController::class, 'destroy'])->name('admin.services.delete');
});

// ------------------------------------
// Create - Footer Management Routes
// ------------------------------------
// Route to list Footer information
Route::get('/admin/create_footer', [FooterController::class, 'index'])->name('admin.create_footer.index');
// Route to Create Footer information
Route::get('/admin/create_footer/create', [FooterController::class, 'create'])->name('admin.create_footer.create'); // Show form for creating

// Route to Store Footer information
Route::post('/admin/create_footer', [FooterController::class, 'store'])->name('admin.create_footer.store');        // Store new entry

// Route to edit Footer information
Route::get('/admin/create_footer/edit/{id}', [FooterController::class, 'edit'])->name('admin.create_footer.edit');

// Route to update Footer information
Route::put('/admin/create_footer/update/{id}', [FooterController::class, 'update'])->name('admin.create_footer.update');

// Route to delete Footer information
Route::delete('/admin/create_footer/destroy/{id}', [FooterController::class, 'destroy'])->name('admin.create_footer.destroy');

// Frontend route
Route::get('/testimonials', [FrontendTestimonialController::class, 'index'])->name('testimonials.index');

Route::get('/admin/testimonials', [AdminTestimonialController::class, 'index'])->name('admin.testimonials.index');
Route::get('/admin/testimonials/create', [AdminTestimonialController::class, 'create'])->name('admin.testimonials.create');
Route::post('/admin/testimonials', [AdminTestimonialController::class, 'store'])->name('admin.testimonials.store');
Route::get('/admin/testimonials/{testimonial}/edit', [AdminTestimonialController::class, 'edit'])->name('admin.testimonials.edit');
Route::put('/admin/testimonials/{testimonial}', [AdminTestimonialController::class, 'update'])->name('admin.testimonials.update');
Route::delete('/admin/testimonials/{testimonial}', [AdminTestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');
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
        Route::resource('users', UserController::class)->except(['show']);

        // ------------------------------------
        // Pages Management Routes
        // ------------------------------------
        //Route::resource('pages', PageController::class)->except(['show']);
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
        Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('admin.settings.update');

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

    Route::get('/admin/company-profile', [ProfileController::class, 'index'])->name('admin.company.profile');
    Route::post('/admin/company-profile/update', [ProfileController::class, 'update'])->name('admin.company.profile.update');

    Route::get('/admin/messages', [MessagesController::class, 'index'])->name('admin.messages');
    Route::delete('/admin/messages/{id}', [MessagesController::class, 'destroy'])->name('admin.messages.destroy');



    Route::prefix('admin')->group(function () {
        Route::get('branches', [BranchController::class, 'index'])->name('admin.branches.index');
        Route::post('branches', [BranchController::class, 'store'])->name('admin.branches.store');
        Route::get('branches/{id}/edit', [BranchController::class, 'edit'])->name('admin.branches.edit');
        Route::post('branches/{id}', [BranchController::class, 'update'])->name('admin.branches.update');
        Route::delete('branches/{id}', [BranchController::class, 'destroy'])->name('admin.branches.destroy');
    });

});
