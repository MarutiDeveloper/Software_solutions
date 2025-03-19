@extends('frontend.layouts.main')

@section('main-container')


  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

    <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <div class="carousel-item active">
      <img src="{{url('assets/img/hero-carousel/hero-carousel-1.jpg')}}" alt="Software Development">
      <div class="container">
        <h2>Innovative Software Solutions</h2>
        <p>We provide cutting-edge software solutions tailored to your business needs, ensuring efficiency,
        scalability, and digital transformation.</p>
        <a href="{{url('/about')}}" class="btn-get-started">Read More</a>
      </div>
      </div><!-- End Carousel Item -->

      <div class="carousel-item">
      <img src="{{url('assets/img/hero-carousel/hero-carousel-2.jpg')}}" alt="Custom Web Development">
      <div class="container">
        <h2>Custom Web & Mobile Development</h2>
        <p>Our expert team specializes in developing high-quality web and mobile applications to help businesses
        enhance their online presence.</p>
        <a href="{{url('/about')}}" class="btn-get-started">Read More</a>
      </div>
      </div><!-- End Carousel Item -->

      <div class="carousel-item">
      <img src="{{url('assets/img/hero-carousel/hero-carousel-3.jpg')}}" alt="Cloud & AI Solutions">
      <div class="container">
        <h2>Cloud & AI-Driven Technologies</h2>
        <p>Empowering businesses with AI, cloud computing, and automation to drive innovation and streamline
        operations.</p>
        <a href="{{url('/about')}}" class="btn-get-started">Read More</a>
      </div>
      </div><!-- End Carousel Item -->

      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

      <ol class="carousel-indicators"></ol>

    </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

    <div class="container">

      <div class="row position-relative">

      <div class="col-lg-7 about-img" data-aos="zoom-out" data-aos-delay="200">
        <img src="{{url('assets/img/about.jpg')}}" alt="About Software Company">
      </div>

      <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
        <h2 class="inner-title">{{ $company->tagline }}</h2>
        <div class="our-story">
        <h4>Established in {{ $company->established_year }}</h4>
        <h3>Our Story</h3>
        <p>
         {{ $company->description }}
        </p>
        
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

      <!-- Web Development -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item item-cyan position-relative">
        <div class="icon"><i class="bi bi-code-slash"></i></div>
        <a href="service-details.html" class="stretched-link">
          <h3>Web Development</h3>
        </a>
        <p>Custom website development using modern frameworks to enhance user experience and performance.</p>
        </div>
      </div>

      <!-- Mobile App Development -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="service-item item-orange position-relative">
        <div class="icon"><i class="bi bi-phone"></i></div>
        <a href="service-details.html" class="stretched-link">
          <h3>Mobile App Development</h3>
        </a>
        <p>Building responsive and feature-rich mobile applications for iOS and Android platforms.</p>
        </div>
      </div>

      <!-- UI/UX Design -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="service-item item-teal position-relative">
        <div class="icon"><i class="bi bi-brush"></i></div>
        <a href="service-details.html" class="stretched-link">
          <h3>UI/UX Design</h3>
        </a>
        <p>Creating visually appealing and user-friendly interfaces to enhance customer engagement.</p>
        </div>
      </div>

      <!-- Software Testing -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="service-item item-red position-relative">
        <div class="icon"><i class="bi bi-bug"></i></div>
        <a href="service-details.html" class="stretched-link">
          <h3>Software Testing</h3>
        </a>
        <p>Ensuring software reliability and security through automated and manual testing techniques.</p>
        </div>
      </div>

      <!-- Cloud Solutions -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
        <div class="service-item item-purple position-relative">
        <div class="icon"><i class="bi bi-cloud"></i></div>
        <a href="service-details.html" class="stretched-link">
          <h3>Cloud Solutions</h3>
        </a>
        <p>Offering scalable cloud computing services including AWS, Azure, and Google Cloud integration.</p>
        </div>
      </div>

      <!-- AI & Machine Learning -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
        <div class="service-item item-blue position-relative">
        <div class="icon"><i class="bi bi-cpu"></i></div>
        <a href="service-details.html" class="stretched-link">
          <h3>AI & Machine Learning</h3>
        </a>
        <p>Implementing AI-driven solutions to automate processes and improve decision-making.</p>
        </div>
      </div>
      </div>
    </div>
    </section><!-- End Services Section -->

    <!-- Company Section -->
    <section id="clients" class="clients section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Company</h2>
      <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row g-0 clients-wrap">

      <div class="col-xl-3 col-md-4 client-logo">
        <!-- <img
      src="{{ $company && $company->logo ? asset('storage/' . $company->logo) : asset('assets/img/default-logo.png') }}"
      class="img-fluid" alt="Company Logo"> -->
        @if (!empty($company->logo) && file_exists(filename: public_path(path: $company)))
      <img src="{{ asset('storage/' . $company->logo) }}?v={{ time() }}" class="img-thumbnail" width="50"
      onerror="this.onerror=null; this.src='{{ asset(path: 'admin-assets/img/default-150x150.png') }}';"
      alt="Company Logo" />
    @else
    <img src="{{ asset('storage/' . $company->logo) }}" class="img-thumbnail" width="50"
    alt="Default Image" />
  @endif
      </div>


      <!-- <div class="col-xl-3 col-md-4 client-logo">
      <img src="{{url('assets/img/clients/client-2.png')}}" class="img-fluid" alt="">
      </div>

      <div class="col-xl-3 col-md-4 client-logo">
      <img src="{{url('assets/img/clients/client-3.png')}}" class="img-fluid" alt="">
      </div>

      <div class="col-xl-3 col-md-4 client-logo">
      <img src="{{url('assets/img/clients/client-4.png')}}" class="img-fluid" alt="">
      </div>

      <div class="col-xl-3 col-md-4 client-logo">
      <img src="{{url('assets/img/clients/client-5.png')}}" class="img-fluid" alt="">
      </div>

      <div class="col-xl-3 col-md-4 client-logo">
      <img src="{{url('assets/img/clients/client-6.png')}}" class="img-fluid" alt="">
      </div>

      <div class="col-xl-3 col-md-4 client-logo">
      <img src="{{url('assets/img/clients/client-7.png')}}" class="img-fluid" alt="">
      </div>

      <div class="col-xl-3 col-md-4 client-logo">
      <img src="{{url('assets/img/clients/client-8.png')}}" class="img-fluid" alt="">
      </div> -->

      </div>

    </div>

    </section><!-- /Company Section -->

  </main>

@endsection