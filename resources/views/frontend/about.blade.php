@extends('frontend.layouts.main')

@section('main-container')
<main class="main">
    <div class="page-title accent-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">About</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="current">About</li>
                </ol>
            </nav>
        </div>
    </div>

    <section id="about" class="about section">
        <div class="container">
            <div class="row align-items-center">
                <!-- Image Section -->
                <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset($about->image ?? 'assets/img/default-about.jpg') }}" 
                         alt="About Software Company" 
                         class="img-fluid about-image">
                </div>

                <!-- Content Section -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="inner-title">{{ $about->title ?? 'No Data Available' }}</h2>
                    <p>{{ $about->description ?? 'Please add content from the admin panel.' }}</p>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Custom CSS for Image Size -->
<style>
    .about-image {
        width: 100%; /* Adjust this as needed */
        height: 400px; /* Set desired height */
        object-fit: cover; /* Ensure proper cropping */
        border-radius: 10px; /* Optional: Add rounded corners */
    }
</style>
@endsection
