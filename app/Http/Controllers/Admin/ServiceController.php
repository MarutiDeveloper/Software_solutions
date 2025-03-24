<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service; // Assuming you have a Service model

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string',
        ]);

        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service added successfully.');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string',
        ]);

        $service = Service::findOrFail($id);
        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        Service::destroy($id);
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
