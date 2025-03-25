<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Show the company profile page
    public function index()
    {
        $company = Company::first(); // Get the first company record
        return view('admin.profile.company-profile', compact('company'));
    }

    // Update company profile
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'business_type' => 'nullable|string|max:255',
            'established_year' => 'nullable|integer',
            'employees_count' => 'nullable|integer',
            'registration_number' => 'nullable|string|max:255',
            'tax_id' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Get or create company record
        $company = Company::firstOrCreate(
            [], // Empty condition so it checks for the first row
            ['name' => 'Default Company Name'] // Default values if no record exists
        );

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($company->logo) {
                Storage::delete('public/' . $company->logo);
            }
        
            // Store new logo in 'public/company_logos' directory
            $logoPath = $request->file('logo')->store('Logos', 'public');
            $company->logo = $logoPath;
        }
        
        

        // Update company details
        $company->update([
            'name' => $request->name,
            'tagline' => $request->tagline,
            'description' => $request->description,
            'business_type' => $request->business_type,
            'established_year' => $request->established_year,
            'employees_count' => $request->employees_count,
            'registration_number' => $request->registration_number,
            'tax_id' => $request->tax_id,
        ]);

        return redirect()->route('admin.company.profile')->with('success', 'Company profile updated successfully!');
    }
}
