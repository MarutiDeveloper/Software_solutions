<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Company;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;
use App\Models\Employee;

class AdminHomeController extends Controller
{
    public function index()
    {
        $totalEmployees = Employee::count();
        $totalCompanies = Company::count();
        $totalBranches = Branch::count();

        // Fetch last 6 months of company registrations for growth chart
        $growthData = Company::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(id) as count')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->take(6) // Last 6 months
            ->get();

        // Extract month labels and company counts
        $growthMonths = $growthData->pluck('month');
        $growthCounts = $growthData->pluck('count');

        return view('admin.dashboard', compact('totalEmployees', 'totalCompanies', 'totalBranches', 'growthMonths', 'growthCounts'));
    }


    public function clearCache()
    {
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('optimize:clear');

        return redirect()->back()->with('success', 'Cache cleared successfully!');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
