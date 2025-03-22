<?php


namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroSection;
use App\Models\Service;
use App\Models\CompanyLogo; // Import CompanyLogo model
use App\Models\Page;

class HomeController extends Controller {
    public function index() {
        $heroSections = HeroSection::all();
        $services = Service::all();
        $companies = CompanyLogo::all(); // Fetch all company logos
        $staticPages = Page::where('showHome', 'Yes')->get();

        return view('frontend.index', compact('heroSections', 'services', 'companies','staticPages'));
    }
}
