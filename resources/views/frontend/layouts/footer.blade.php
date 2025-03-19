<!-- Main CSS File -->
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<style>
  /* Logo Styling */
  .logo-container {
    display: flex;
    align-items: center;
  }

  .logo-img {
    width: 100px;
    height: 100px;
    object-fit: contain;
    /* Ensures the full image is visible */
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
</style>
<footer id="footer" class="footer dark-background">

  <div class="container footer-top">
    <div class="row gy-4">
      <div class="col-lg-4 col-md-6 footer-about">
        <!-- <img src="{{ asset('assets/img/Software - Solutions.JPG') }}" class="rounded-circle bg-light"
          style="height: 100px; width: 100px; object-fit: contain;" alt="Software Solutions Logo"
            onerror="this.onerror=null; this.src='{{ asset('assets/img/default-logo.png') }}';"> -->
        <a href="{{ route('home') }}" class="container position-relative ">
          @if($company && $company->logo)
        <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" width="100" class="img-thumbnail">
      @endif

          <span class="footer-link d-inline-block h5 text-uppercase px-2 py-1 rounded sitename"
            style="color: white; text-shadow: -1px -1px 0 blue, 1px -1px 0 blue, -1px 1px 0 blue, 1px 1px 0 blue;">
            {{ $allCompanyInfo->company_name ?? 'Software Solutions' }}
          </span>
          <p>
            <q class="text-white fst-italic">
              {{ $company->tagline ?? '' }}
            </q>
          </p>
          <!-- <q class="text-white fst-italic">
            {{ $company->tagline ?? '' }}
          </q> -->
        </a>

        <div class="footer-contact pt-3">
          <p>{{ $allCompanyInfo->company_address ?? '123 Street, New York, USA' }}</p>
          <a href="https://www.truecaller.com/search/in/+91{{ $allCompanyInfo->company_phone_number ?? '000 000 0000' }}"
            arget="_blank" class="footer-link"> Phone:
            {{ $allCompanyInfo->company_phone_number ?? '000 000 0000' }}
          </a>
          <p style="font-size: medium ;">
            <a href="mailto:{{ $allCompanyInfo->company_email ?? 'example@example.com' }}" class="footer-link"> Email:
              {{ $allCompanyInfo->company_email ?? 'example@example.com' }}
            </a>
          </p>
          <p style="font-size: medium ;">
            <a href="{{ $allCompanyInfo->company_website ?? '' }}" class="footer-link"> Website :
              {{ $allCompanyInfo->company_website ?? '' }}
            </a>
          </p>


        </div>

      </div>


      <div class="col-lg-2 col-md-3 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><a href="{{url('/')}}">Home</a></li>
          <li><a href="{{url('/about')}}">About us</a></li>
          <li><a href="{{url('/service')}}">Services</a></li>
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