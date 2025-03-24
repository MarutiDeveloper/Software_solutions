<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroSection; // Make sure you create this model

class HeroSectionController extends Controller
{
    // Display the Hero Section management page
    public function index()
    {
        $heroSections = HeroSection::all();
        return view('admin.hero.index', compact('heroSections'));
    }

    // Show form to create a new Hero Section slide
    public function create()
    {
        return view('admin.hero.create');
    }

    // Store new Hero Section slide in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $request->file('image')->store('hero-section', 'public');

        HeroSection::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.hero.index')->with('success', 'Hero Section slide added successfully!');
    }

    // Show the edit form for a specific Hero Section slide
    public function edit($id)
    {
        $heroSection = HeroSection::findOrFail($id);
        return view('admin.hero.edit', compact('heroSection'));
    }

    // Update the Hero Section slide
    public function update(Request $request, $id)
    {
        $heroSection = HeroSection::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('hero-section', 'public');
            $heroSection->image = $imagePath;
        }

        $heroSection->title = $request->title;
        $heroSection->description = $request->description;
        $heroSection->save();

        return redirect()->route('admin.hero.index')->with('success', 'Hero Section updated successfully!');
    }

    // Delete a Hero Section slide
    public function destroy($id)
    {
        $heroSection = HeroSection::findOrFail($id);
        $heroSection->delete();

        return redirect()->route('admin.hero.index')->with('success', 'Hero Section deleted successfully!');
    }
}
