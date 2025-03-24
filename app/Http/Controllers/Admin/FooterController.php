<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Companyinfo;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCompanyInfo = Companyinfo::all();
        return view('admin.manage_footer.index', compact('allCompanyInfo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manage_footer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_address' => 'required|string',
            'company_phone_number' => 'required|string|max:15',
            'company_email' => 'required|email',
            'company_website' => 'nullable|string|max:255',
        ]);

        // Create new company record
        //Fetch all records again to pass to the index view
        $allCompanyInfo = Companyinfo::all();
        // Create a new ContactUs record
        $CompanyInfo = new Companyinfo();
        $CompanyInfo->company_name = $request->company_name;
        $CompanyInfo->company_address = $request->company_address;
        $CompanyInfo->company_phone_number = $request->company_phone_number;
        $CompanyInfo->company_email = $request->company_email;
        $CompanyInfo->company_website = $request->company_website;

        // Save the record to the database
        $CompanyInfo->save();

        return view('admin.manage_footer.index', compact('allCompanyInfo'))->with('success', 'Company added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $companyInfo = Companyinfo::findOrFail($id);
        return view('admin.manage_footer.edit', compact('companyInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_address' => 'required|string',
            'company_phone_number' => 'required|string|max:15|regex:/^[0-9+\-\s]+$/',
            'company_email' => 'required|email|max:255|unique:companyinfo,company_email,' . $id,
            'company_website' => 'required|url|max:255',
        ]);

        // Find the company
        $companyInfo = Companyinfo::findOrFail($id);

        // Update the record
        $companyInfo->update([
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'company_phone_number' => $request->company_phone_number,
            'company_email' => $request->company_email,
            'company_website' => $request->company_website,
        ]);

        // Redirect with success message
        return redirect()->route('admin.create_footer.index')->with('success', 'Company information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Companyinfo::findOrFail($id);
        $company->delete();

        // Redirect with success message
        return redirect()->route('admin.create_footer.index')->with('success', 'Company deleted successfully.');
    }
}
