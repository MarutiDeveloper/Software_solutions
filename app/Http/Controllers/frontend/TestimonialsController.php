<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;

class TestimonialsController extends Controller {
    public function index() {
        $testimonials = Testimonial::all();
        return view('frontend.testimonials', compact('testimonials'));
    }
}
