<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyLogo;
use Illuminate\Support\Facades\Storage;

class CompanyLogoController extends Controller {
    public function index() {
        $logos = CompanyLogo::all();
        return view('admin.companylogo.index', compact('logos'));
    }

    public function create() {
        return view('admin.companylogo.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $logoPath = $request->file('logo')->store('company_logos', 'public');

        CompanyLogo::create([
            'name' => $request->name,
            'logo' => $logoPath,
        ]);

        return redirect()->route('admin.companylogos.index')->with('success', 'Company logo added successfully.');
    }

    public function edit($id) {
        $logo = CompanyLogo::findOrFail($id);
        return view('admin.companylogo.edit', compact('logo'));
    }

    public function update(Request $request, $id) {
        $logo = CompanyLogo::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            Storage::delete('public/' . $logo->logo);
            $logoPath = $request->file('logo')->store('company_logos', 'public');
            $logo->logo = $logoPath;
        }

        $logo->name = $request->name;
        $logo->save();

        return redirect()->route('admin.companylogos.index')->with('success', 'Company logo updated successfully.');
    }

    public function destroy($id) {
        $logo = CompanyLogo::findOrFail($id);
        Storage::delete('public/' . $logo->logo);
        $logo->delete();

        return redirect()->route('admin.companylogos.index')->with('success', 'Company logo deleted successfully.');
    }
}
