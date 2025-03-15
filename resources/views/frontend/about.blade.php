@extends('frontend.layouts.main')

@section('main-container')


  <main class="main">

    <!-- Page Title -->
    <div class="page-title accent-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">About</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">About</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

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

    
  </main>
@endsection
  