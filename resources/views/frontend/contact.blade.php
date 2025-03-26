@extends('frontend.layouts.main')

@section('main-container')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title accent-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Contact</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">
            <div class="mb-5">
                <iframe style="width: 100%; height: 400px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118106.58331784357!2d73.0906853703809!3d22.322240635394294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc8ab91a3ddab%3A0xac39d3bfe1473fb8!2sVadodara%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1742559752253!5m2!1sen!2sin"
                    frameborder="0" allowfullscreen=""></iframe>
            </div>
            <!-- End Google Maps -->

            <div class="container" data-aos="fade">
                <div class="row gy-5 gx-lg-5">

                    <div class="col-lg-4">
                        <div class="info">
                            <h3>Get in touch</h3>
                            <p>Feel free to reach out to us for any inquiries or support.</p>

                            <div class="info-item d-flex">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h4>Location:</h4>
                                    <p>{{ $allCompanyInfo->company_address ?? '123 Street, New York, USA' }}</p>
                                </div>
                            </div>

                            <div class="info-item d-flex">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>Email:</h4>
                                    <a href="mailto:{{ $allCompanyInfo->company_email ?? 'example@example.com' }}"
                                        class="text-primary">
                                        {{ $allCompanyInfo->company_email ?? 'example@example.com' }}
                                    </a>
                                </div>
                            </div>

                            <div class="info-item d-flex">
                                <i class="bi bi-phone flex-shrink-0"></i>
                                <div>
                                    <h4>Call:</h4>
                                    <a href="https://www.truecaller.com/search/in/+91{{ $allCompanyInfo->company_phone_number ?? '000 000 0000' }}"
                                        arget="_blank" class="text-primary">
                                        {{ $allCompanyInfo->company_phone_number ?? '000 000 0000' }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" placeholder="Message" required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Send Message</button>
                            </div>
                        </form>
                    </div>
                    <!-- End Contact Form -->

                </div>
            </div>
        </section>
        <!-- /Contact Section -->

    </main>

    <!-- Custom Styles -->
    <style>
        .form-control {
            border-radius: 5px;
            padding: 12px;
            border: 1px solid #ccc;
            font-size: 16px;
            width: 100%;
        }

        textarea.form-control {
            height: 150px;
            resize: none;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .text-center {
            margin-top: 15px;
        }

        .info-item {
            margin-bottom: 20px;
        }

        .info-item i {
            font-size: 24px;
            margin-right: 10px;
            color: #28a745;
        }
    </style>

@endsection