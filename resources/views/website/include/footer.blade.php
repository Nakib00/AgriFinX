<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12 mb-4">
                <img src="{{ asset('assets/images/logo.png') }}" class="logo img-fluid" alt="" />
            </div>

            <div class="col-lg-4 col-md-6 col-12 mb-4">
                <h5 class="site-footer-title mb-3">Quick Links</h5>

                <ul class="footer-menu">
                    <li class="footer-menu-item">
                        <a href="#" class="footer-menu-link">Our Story</a>
                    </li>

                    <li class="footer-menu-item">
                        <a href="#" class="footer-menu-link">Newsroom</a>
                    </li>

                    <li class="footer-menu-item">
                        <a href="#" class="footer-menu-link">Causes</a>
                    </li>

                    <li class="footer-menu-item">
                        <a href="{{ route('login_investor') }}" class="footer-menu-link">Become a Investor</a>
                    </li>

                    <li class="footer-menu-item">
                        <a href="#" class="footer-menu-link">Partner with us</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6 col-12 mx-auto">
                <h5 class="site-footer-title mb-3">Contact Infomation</h5>

                <p class="text-white d-flex mb-2">
                    <i class="bi-telephone me-2"></i>

                    <a href="tel: 120-240-9600" class="site-footer-link">
                        01627199815
                    </a>
                </p>

                <p class="text-white d-flex">
                    <i class="bi-envelope me-2"></i>

                    <a href="/" class="site-footer-link">
                        agrifinx@gmail.com
                    </a>
                </p>

                <p class="text-white d-flex mt-3">
                    <i class="bi-geo-alt me-2"></i>
                    Bashundhara 1229, Dhaka, Bangladesh
                </p>
            </div>
        </div>
    </div>

    <div class="site-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7 col-12">
                    <p class="copyright-text mb-0">
                        Copyright © 2024 <a href="https://napver.com/">Napver</a>
                    </p>
                </div>

                <div class="col-lg-6 col-md-5 col-12 d-flex justify-content-center align-items-center mx-auto">
                    <ul class="social-icon">
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-twitter"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-facebook"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-instagram"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-linkedin"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="https://youtube.com/templatemo" class="social-icon-link bi-youtube"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

{{--  <!-- JAVASCRIPT FILES -->  --}}
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('assets/js/click-scroll.js') }}"></script>
<script src="{{ asset('assets/js/counter.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

{{--  <!-- Bootstrap JS and dependencies -->  --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
{{--  <!-- Font Awesome -->  --}}
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@livewireScripts
</body>

</html>
