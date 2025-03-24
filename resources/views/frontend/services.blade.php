@extends('frontend.layouts.main')

@section('main-container')

  <main class="main">
    <div class="page-title accent-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Our Services</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li class="current">Services</li>
          </ol>
        </nav>
      </div>
    </div>

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
  </main>

@endsection
