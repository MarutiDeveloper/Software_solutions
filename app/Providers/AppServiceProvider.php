<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Companyinfo;
use App\Models\Company;

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
        $allCompanyInfo = Companyinfo::first();
        $company = Company::first();

        // Share the variables globally with all views
        view()->share([
            'allCompanyInfo' => $allCompanyInfo,
            'company' => $company
        ]);
    }

}
