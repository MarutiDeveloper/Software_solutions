<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    // ===== ADMIN PANEL METHODS ===== //
    
    public function adminIndex()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $about = new About();
        $about->title = $request->title;
        $about->description = $request->description;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/about/'), $imageName);
            $about->image = 'uploads/about/' . $imageName;
        }

        $about->save();
        return redirect()->route('admin.about.index')->with('success', 'About section created successfully.');
    }

    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $about = About::findOrFail($id);
        $about->title = $request->title;
        $about->description = $request->description;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/about/'), $imageName);
            $about->image = 'uploads/about/' . $imageName;
        }

        $about->save();
        return redirect()->route('admin.about.index')->with('success', 'About section updated successfully.');
    }

    public function destroy($id)
    {
        $about = About::findOrFail($id);
        if ($about->image) {
            unlink(public_path($about->image));
        }
        $about->delete();
        return redirect()->route('admin.about.index')->with('success', 'About section deleted successfully.');
    }

    // ===== FRONTEND METHODS ===== //

    public function frontendIndex()
    {
        $about = About::first();
        return view('frontend.about', compact('about'));
    }
}
