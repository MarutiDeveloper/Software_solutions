<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Page;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Fetch the first record from Companyinfo and Company tables
       
        
        $staticPages = Page::all(); // Fetch all static pages
        //$settings = Setting::pluck('value', 'key')->toArray(); // Fetch all settings


        // Share the variables globally with all views
        view()->share([
            
            
            'staticPages' => $staticPages,
            //'settings' => $settings,
        ]);
    }
}
