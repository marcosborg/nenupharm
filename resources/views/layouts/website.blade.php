<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="shortcut icon" href="/website/assets/img/favicon.png" type="image/x-icon">
    <link href="/website/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/website/assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/website/assets/css/themify-icons.css" rel="stylesheet" />
    <link href="/website/assets/css/flaticon-set.css" rel="stylesheet" />
    <link href="/website/assets/css/magnific-popup.css" rel="stylesheet" />
    <link href="/website/assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="/website/assets/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="/website/assets/css/animate.css" rel="stylesheet" />
    <link href="/website/assets/css/bootsnav.css" rel="stylesheet" />
    <link href="/website/assets/css/style.css" rel="stylesheet">
    <link href="/website/assets/css/responsive.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;600;700;800&display=swap" rel="stylesheet">

</head>

<body>

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->

    <!-- Header 
    ============================================= -->
    <header id="home">

        <x-nav-component />

    </header>
    <!-- End Header -->

    @yield('content')

    <!-- Star Footer
    ============================================= -->
    <footer class="bg-dark text-light">
        <div class="container">
            <div class="f-items default-padding">
                <div class="row">
                    <div class="single-item col-md-4 item">
                        <div class="f-item about">
                            <img src="/website/assets/img/logo-light.png" alt="">
                            <p>
                                {{ env('DESCRIPTION') }}
                            </p>
                            <div class="social">
                                <h5>Follow Us:</h5>
                                <ul>
                                    <li class="facebook">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="instagram">
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="single-item col-md-4 item">
                        <div class="f-item link">
                            <h4 class="widget-title">Navigation</h4>
                            <ul>
                                @foreach ($navigation as $nav)
                                <li>
                                    <a href="{{ $nav->link }}">{{ $nav->label }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="single-item col-md-4 item">
                        <div class="f-item branches">
                            <h4 class="widget-title">Our branches</h4>
                            <div class="branches">
                                <ul>
                                    @foreach ($contacts as $contact)
                                    <li>
                                        <strong>{{ $contact->title }}</strong>
                                        <span>{{ $contact->text }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-center">
                    <div class="col-lg-6">
                        <p>&copy; 2020 <strong>Clinicom</strong>. All Rights Reserved by <a href="#">validtemplates</a></p>
                    </div>
                    <div class="col-lg-6 text-right link">
                        <ul>
                            <li>
                                <a href="#">Terms</a>
                            </li>
                            <li>
                                <a href="#">Privacy</a>
                            </li>
                            <li>
                                <a href="#">Support</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer-->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="/website/assets/js/jquery-1.12.4.min.js"></script>
    <script src="/website/assets/js/popper.min.js"></script>
    <script src="/website/assets/js/bootstrap.min.js"></script>
    <script src="/website/assets/js/equal-height.min.js"></script>
    <script src="/website/assets/js/jquery.appear.js"></script>
    <script src="/website/assets/js/jquery.easing.min.js"></script>
    <script src="/website/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/website/assets/js/modernizr.custom.13711.js"></script>
    <script src="/website/assets/js/owl.carousel.min.js"></script>
    <script src="/website/assets/js/wow.min.js"></script>
    <script src="/website/assets/js/progress-bar.min.js"></script>
    <script src="/website/assets/js/isotope.pkgd.min.js"></script>
    <script src="/website/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="/website/assets/js/count-to.js"></script>
    <script src="/website/assets/js/YTPlayer.min.js"></script>
    <script src="/website/assets/js/circle-progress.js"></script>
    <script src="/website/assets/js/jquery.nice-select.min.js"></script>
    <script src="/website/assets/js/bootsnav.js"></script>
    <script src="/website/assets/js/main.js"></script>

</body>
</html>
