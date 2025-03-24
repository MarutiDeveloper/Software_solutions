<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Display a listing of testimonials.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new testimonial.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created testimonial in the database.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'designation' => 'nullable|string|max:255',
        'message' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'rating' => 'nullable|integer|min:1|max:5',
    ]);

    $testimonialData = $request->all();

    // Handle file upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('uploads/testimonials', 'public');
        $testimonialData['image'] = $imagePath;
    }

    Testimonial::create($testimonialData);

    return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial added successfully.');
}

    /**
     * Show the form for editing an existing testimonial.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update an existing testimonial.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'message' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);
    
        $testimonialData = $request->all();
    
        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }
    
            $imagePath = $request->file('image')->store('uploads/testimonials', 'public');
            $testimonialData['image'] = $imagePath;
        }
    
        $testimonial->update($testimonialData);
    
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }
    

    /**
     * Delete an existing testimonial.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
