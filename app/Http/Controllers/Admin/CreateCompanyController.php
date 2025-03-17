<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Companyinfo;

class CreateCompanyController extends Controller
{
    // Display all companies
    public function index()
    {
        $allCompanyInfo = Companyinfo::all();
        return view('admin.create_company.index', compact('allCompanyInfo'));
    }

    // Show the form for creating a new company
    public function create()
    {
        return view('admin.create_company.create');
    }

    // Store a new company
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_address' => 'required|string',
            'company_phone_number' => 'required|string|max:15|regex:/^[0-9+\-\s]+$/',
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
        $CompanyInfo->company_phone_number = $request->company_phone;
        $CompanyInfo->company_email = $request->company_email;
        $CompanyInfo->company_website = $request->company_website;

        // Save the record to the database
        $CompanyInfo->save();

        return view('admin.create_company.create', compact('allCompanyInfo'))->with('success', 'Company added successfully.');

        // Redirect with success message
        // return redirect()->route('admin.create_company.index')
        //     ->with('success', 'Company created successfully.');
    }

    // Show a specific company
    public function show($id)
    {
        $company = Companyinfo::findOrFail($id);
        return view('admin.create_company.show', compact('company'));
    }

    // Show the edit form for a specific company
    public function edit($id)
    {
        $companyInfo = Companyinfo::findOrFail($id);
        return view('admin.create_company.edit', compact('companyInfo'));
    }

    // Update a company's details
    public function update(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'company_name' => 'required|string|max:255',
            'company_address' => 'required|string',
            'company_phone_number' => 'required|string|max:15',
            'company_email' => 'required|email|max:255|unique:_create_companies,company_email,' . $id,
            'company_website' => 'required|url|max:255',
        ]);

        // Find and update the company
        $companyInfo = Companyinfo::find($id);
        // $companyInfo->update($request->only([
        //     'company_name',
        //     'company_address',
        //     'company_phone_number',
        //     'company_email',
        //     'company_website'
        // ]));

        // Update the record with new data
        $companyInfo->update([
            'company_name' => $request->input('company_name'),
            'company_address' => $request->input('company_address'),
            'company_phone_number' => $request->input('company_phone_number'),
            'company_email' => $request->input('company_email'),
            'company_website' => $request->input('company_website'),
        ]);

        // Redirect with success message
        return view('admin.create_company.index', compact('companyInfo'))->with('success', 'Company information updated successfully.');
    
        // return redirect()->route('admin.create_company.index')->with('success', 'Company information updated successfully.');
    }

    // Delete a company
    public function destroy($id)
    {
        $company = Companyinfo::findOrFail($id);
        $company->delete();

        // Redirect with success message
        return redirect()->route('admin.create_company.index')->with('success', 'Company deleted successfully.');
    }
}
