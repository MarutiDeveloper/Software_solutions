<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Solution</title>

    <!-- Meta Information -->
    <meta name="description" content="Your trusted software solutions provider">
    <meta name="keywords" content="Software, IT Solutions, Development, Consulting">

    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-touch-icon.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
        }

        /* Logo Styling */
        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo-img {
            width: 100px;
            height: 100px;
            object-fit: contain; /* Ensures the full image is visible */
            border-radius: 50%;
            background-color: #fff;
            padding: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .logo-img {
                width: 80px;
                height: 80px;
            }
        }

        @media (max-width: 480px) {
            .logo-img {
                width: 60px;
                height: 60px;
            }
        }

        /* Header Font Size */
        #header .navmenu ul li a {
            font-size: 18px;
            font-weight: 500;
        }

        /* Dropdown Font Size */
        #header .navmenu ul li ul li a {
            font-size: 16px;
        }

        /* Social Links */
        .header-social-links a {
            font-size: 20px;
            margin-left: 10px;
            color: #333;
            transition: color 0.3s ease-in-out;
        }

        .header-social-links a:hover {
            color: #007bff;
        }
    </style>
</head>

<body class="index-page">

    @php
    use App\Models\Company;
    $company = Company::first(); // Fetch company details
@endphp

<!-- Header Section -->
<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

        <!-- Logo Section -->
        <a href="{{ url('/') }}" class="d-flex align-items-center">
            <img src="{{ $company && $company->logo ? asset('storage/' . $company->logo) : asset('assets/img/default-logo.png') }}" 
                class="logo-img"
                alt="Company Logo"
                onerror="this.onerror=null; this.src='{{ asset('assets/img/default-logo.png') }}';">
            
            <div class="ms-2">
                <span class="h3 text-uppercase text-primary px-2 fw-bold"
                    style="font-family: Georgia, 'Times New Roman', Times, serif;">
                    {{ $company->name ?? 'Software' }}
                </span>
                <span class="h3 text-uppercase text-dark fw-bold"
                    style="font-family: Georgia, 'Times New Roman', Times, serif;">
                    
                </span>
            </div>
        </a>
    
            <!-- Navigation -->
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ url('/') }}" class="active">Home</a></li>
                    <li class="dropdown">
                        <a href="{{ url('/about') }}">
                            <span>About</span> <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>
                        <ul>
                            <li><a href="{{ url('/team') }}">Team</a></li>
                            <li><a href="{{ url('/testimonials') }}">Testimonials</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('/services') }}">Services</a></li>
                    <li><a href="{{ route('frontend.blog.index') }}">Blog</a></li>

                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <!-- Social Media Links -->
            <div class="header-social-links d-flex align-items-center">
                <a href="https://twitter.com" target="_blank" class="twitter"><i  class="bi bi-twitter-x"></i></a>
                <a href="https://facebook.com" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="https://instagram.com" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="https://linkedin.com" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

        </div>
    </header>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

</body>

</html>
