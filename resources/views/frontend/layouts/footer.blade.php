<footer id="footer" class="footer dark-background">

  <div class="container footer-top">
    <div class="row gy-4">
      <div class="col-lg-4 col-md-6 footer-about">
        <!-- Logo Section -->
        <a href="{{ url('/') }}" class="d-flex align-items-center text-decoration-none">
          <img
            src="{{ $company && $company->logo ? asset('storage/' . $company->logo) : asset('assets/img/default-logo.png') }}"
            class="logo-img rounded-circle shadow-sm bg-light me-3" alt="Company Logo"
            style="height: 80px; width: 80px; object-fit: contain;"
            onerror="this.onerror=null; this.src='{{ asset('assets/img/default-logo.png') }}';">

          <div>
            <span class="h4 text-uppercase text-primary fw-bold d-block"
              style="font-family: Georgia, 'Times New Roman', Times, serif;">
              {{ $allCompanyInfo->company_name ?? 'Software Solutions' }}
            </span>
            <!-- <span class="h5 text-uppercase text-dark fw-bold d-block"
              style="font-family: Georgia, 'Times New Roman', Times, serif;">
              {{ $company->tagline ?? 'Solutions' }}
            </span> -->
          </div>
        </a>

        <!-- Contact Information -->
        <div class="footer-contact mt-3">
          <p class="mb-2"><i class="bi bi-geo-alt text-primary"></i>
            {{ $allCompanyInfo->company_address ?? '123 Street, New York, USA' }}</p>
          <p class="mb-2"><i class="bi bi-telephone text-primary"></i> <strong>Phone:</strong>
            <a href="https://www.truecaller.com/search/in/+91{{ $allCompanyInfo->company_phone_number ?? '000 000 0000' }}"
              arget="_blank" class="text-primary">
              {{ $allCompanyInfo->company_phone_number ?? '000 000 0000' }}
            </a>
          </p>
          <p class="mb-0"><i class="bi bi-envelope text-primary"></i> <strong>Email:</strong>
            <a href="mailto:{{ $allCompanyInfo->company_email ?? 'example@example.com' }}" class="text-primary">
              {{ $allCompanyInfo->company_email ?? 'example@example.com' }}
            </a>
          </p>
          <p class="mb-0 shadow-lg rounded"><i class=" bi bi-globe"></i> <strong>Website: </strong>
            <a href="mailto:{{ $allCompanyInfo->company_website	 ?? 'example@example.com' }}" class="text-primary">
              {{ $allCompanyInfo->company_website	 ?? 'example@example.com' }}
            </a>
          </p>
        </div>
        

        <!-- Social Media Links -->
        <div class="social-links d-flex mt-4">
          <a href="{{ $company->twitter ?? '#' }}" class="me-3 text-primary"><i class="bi bi-twitter-x"></i></a>
          <a href="{{ $company->facebook ?? '#' }}" class="me-3 text-primary"><i class="bi bi-facebook"></i></a>
          <a href="{{ $company->instagram ?? '#' }}" class="me-3 text-primary"><i class="bi bi-instagram"></i></a>
          <a href="{{ $company->linkedin ?? '#' }}" class="text-primary"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>



      <div class="col-lg-2 col-md-3 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><a href="{{url('/')}}">Home</a></li>
          <li><a href="{{route('frontend.about')}}">About us</a></li>
          <li><a href="{{ url('/services') }}">Services</a></li>
          <li><a href="{{url('/team')}}">Terms of service</a></li>
          <li><a href="">Privacy policy</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-md-3 footer-links">
        <h4>Our Services</h4>
        <ul>
          <li><a href="#">Web Design</a></li>
          <li><a href="#">Web Development</a></li>
          <li><a href="#">Product Management</a></li>
          <li><a href="#">Marketing</a></li>
          <li><a href="#">Graphic Design</a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-12 footer-newsletter">
        <h4>Our Newsletter</h4>
        <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
        <form action="https://themewagon.github.io/Company/forms/newsletter.php" method="post" class="php-email-form">
          <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your subscription request has been sent. Thank you!</div>
        </form>
      </div>

    </div>
  </div>

  <div class="container copyright text-center mt-4">
    <p>© <span>Copyright</span> <strong class="px-1 sitename">Software Solution</strong> <span>All Rights
        Reserved</span></p>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you've purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->

    </div>
  </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
    class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('assets/vendor/php-email-form/validate.js')}}"></script>
<script src="{{url('assets/vendor/aos/aos.js')}}"></script>
<script src="{{url('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{url('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{url('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{url('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
<script src="{{url('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

<!-- Main JS File -->
<script src="{{url('assets/js/main.js')}}"></script>

</body>


<!-- Mirrored from themewagon.github.io/Company/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Mar 2025 07:19:42 GMT -->

</html>