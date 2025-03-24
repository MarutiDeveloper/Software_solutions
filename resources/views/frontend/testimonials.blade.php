@extends('frontend.layouts.main')

@section('main-container')
<main class="main">
    <div class="page-title accent-background">
        <div class="container">
            <h1>Testimonials</h1>
        </div>
    </div>

    <section id="testimonials" class="testimonials section">
        <div class="container">
            <div class="row gy-4">
                @foreach($testimonials as $testimonial)
                    <div class="col-lg-6">
                        <div class="testimonial-item">
                            <img src="{{ asset('storage/' . $testimonial->image) }}"  class="testimonial-img" alt="">
                            <h3>{{ $testimonial->name }}</h3>
                            <h4>{{ $testimonial->designation }}</h4>
                            <div class="stars">
                                @for($i = 0; $i < $testimonial->rating; $i++)
                                    <i class="bi bi-star-fill"></i>
                                @endfor
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>{{ $testimonial->message }}</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection
