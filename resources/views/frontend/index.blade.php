@extends('frontend.layouts.main')

@section('main-container')
  

  <main class="main">

    <!-- Hero Section -->
<section id="hero" class="hero section dark-background">
  <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
      @foreach($heroSections as $key => $hero)
          <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
              <img src="{{ asset('storage/'.$hero->image) }}" alt="{{ $hero->title }}">
              <div class="container">
                  <h2>{{ $hero->title }}</h2>
                  <p>{{ $hero->description }}</p>
                  <a href="{{ url('/about') }}" class="btn-get-started">Read More</a>
              </div>
          </div>
      @endforeach

      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
    
    <div class="carousel-indicators">
        @foreach($heroSections as $key => $hero)
            <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></button>
        @endforeach
    </div>
    
  </div>
</section>

   <!-- About Section -->
<section id="about" class="about section">

  <div class="container">

    <div class="row position-relative">

      <div class="col-lg-7 about-img" data-aos="zoom-out" data-aos-delay="200">
        <img src="{{url('assets/img/about.jpg')}}" alt="About Software Company">
      </div>

      <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
        <h2 class="inner-title">Innovating the Future of Technology</h2>
        <div class="our-story">
          <h4>Established in 2010</h4>
          <h3>Our Story</h3>
          <p>
            At <strong> Software Solutions</strong>, we specialize in delivering cutting-edge software solutions tailored to businesses of all sizes. 
            With over a decade of experience, our team is dedicated to developing innovative applications that drive digital transformation.
          </p>
          <ul>
            <li><i class="bi bi-check-circle"></i> <span>Custom software development for diverse industries</span></li>
            <li><i class="bi bi-check-circle"></i> <span>Advanced AI and cloud-based solutions</span></li>
            <li><i class="bi bi-check-circle"></i> <span>Comprehensive IT consulting and support</span></li>
          </ul>
          <p>
            Our mission is to empower businesses with scalable and secure technology solutions that enhance efficiency and foster growth. 
            We combine creativity, technology, and expertise to build software that transforms ideas into reality.
          </p>

          <div class="watch-video d-flex align-items-center position-relative">
            <i class="bi bi-play-circle"></i>
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox stretched-link">Watch Our Journey</a>
          </div>
        </div>
      </div>

    </div>

  </div>

</section><!-- /About Section -->

    <!-- Services Section -->
<section id="services" class="services section light-background">
  <div class="container">
    <div class="row gy-4">
      @foreach($services as $service)
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="service-item item-cyan position-relative">
            <div class="icon"><i class="bi {{ $service->icon }}"></i></div>
            <a href="#" class="stretched-link">
              <h3>{{ $service->title }}</h3>
            </a>
            <p>{{ $service->description }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section id="clients" class="clients section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
      <h2>Company</h2>
      <p>Empowering businesses with innovative software solutions to drive success and efficiency.</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row g-0 clients-wrap">
          @foreach($companies as $company)
              <div class="col-xl-3 col-md-4 client-logo">
                  <img src="{{ url('storage/' . $company->logo) }}" class="img-fluid" alt="{{ $company->name }}">
              </div>
          @endforeach
      </div>
  </div>

</section><!-- /Company Section -->

  </main>

@endsection  