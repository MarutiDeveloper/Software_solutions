<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Show the company profile page.
     */
    public function index()
    {
        $companies = Company::all(); // Fetch all company records

        if ($companies->isEmpty()) {
            return view('admin.company-profile', ['companies' => collect()]); // Return an empty collection if no data
        }
        return view('admin.company-profile', compact('companies'));
    }

    public function create()
    {
        return view('admin.create-company');
    }

    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:companies,name',
            'tagline' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'business_type' => 'nullable|string|max:255',
            'established_year' => 'nullable|integer|min:1800|max:' . date('Y'),
            'employees_count' => 'nullable|integer|min:1',
            'registration_number' => 'nullable|string|max:255|unique:companies,registration_number',
            'tax_id' => 'nullable|string|max:255|unique:companies,tax_id',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Check if a company already exists
        $existingCompany = Company::where('name', $request->name)
            ->orWhere('registration_number', $request->registration_number)
            ->orWhere('tax_id', $request->tax_id)
            ->first();

        if ($existingCompany) {
            return redirect()->back()->with('error', 'A company with the same details already exists.');
        }

        // Create a new company record
        $company = new Company();
        $company->name = $request->name;
        $company->tagline = $request->tagline;
        $company->description = $request->description;
        $company->business_type = $request->business_type;
        $company->established_year = $request->established_year;
        $company->employees_count = $request->employees_count;
        $company->registration_number = $request->registration_number;
        $company->tax_id = $request->tax_id;
        $company->logo = $request->logo;

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('company_logos', 'public');
            $company->logo = $logoPath;
        }

        // Save the record to the database
        $company->save();

        return redirect()->route('admin.company.create')
            ->with('success', 'Company added successfully.');
    }


    /**
     * Update company profile.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'business_type' => 'nullable|string|max:255',
            'established_year' => 'nullable|integer|min:1800|max:' . date('Y'),
            'employees_count' => 'nullable|integer|min:1',
            'registration_number' => 'nullable|string|max:255',
            'tax_id' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Get or create the first company record
        $company = Company::firstOrCreate([], ['name' => 'Default Company Name']);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }

            // Store new logo
            $logoPath = $request->file('logo')->store('company_logos', 'public');
            $company->logo = $logoPath;
        }

        // Update company details (excluding logo if not provided)
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
