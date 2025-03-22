<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Page;
use App\Models\Setting;
use App\Models\Company;
use App\Models\Companyinfo;

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
        $company = Company::first(); // Fetch the first record from Company table
        $allCompanyInfo = Companyinfo::first(); // Fetch the first record from Companyinfo table
        //$settings = Setting::pluck('value', 'key')->toArray(); // Fetch all settings


        // Share the variables globally with all views
        view()->share([
            
            
            'staticPages' => $staticPages,
            'company' => $company,
            'allCompanyInfo' => $allCompanyInfo,
            //'settings' => $settings,
        ]);
    }
}
