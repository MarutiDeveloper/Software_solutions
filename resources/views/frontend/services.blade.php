@extends('frontend.layouts.main')

@section('main-container')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title accent-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Our Services</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Services</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

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
  </main>
@endsection
