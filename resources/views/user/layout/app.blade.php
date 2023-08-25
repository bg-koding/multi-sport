<!DOCTYPE html>
<html lang="en">


<head>
    <title>SIPAO</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700|Montserrat:400,700|Roboto&amp;display=swap"
        rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a00d64506c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ url('frontend/wines') }}/fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{ url('frontend/wines') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('frontend/wines') }}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ url('frontend/wines') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ url('frontend/wines') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ url('frontend/wines') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ url('frontend/wines') }}/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{ url('frontend/wines') }}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ url('frontend/wines') }}/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="{{ url('frontend/wines') }}/css/aos.css">
    <link href="{{ url('frontend/wines') }}/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="{{ url('frontend/wines') }}/css/style.css">
    <script nonce="ee4fd681-16c5-489e-b545-9eb83162f1be">
        (function(w, d) {
            ! function(eK, eL, eM, eN) {
                eK.zarazData = eK.zarazData || {};
                eK.zarazData.executed = [];
                eK.zaraz = {
                    deferred: [],
                    listeners: []
                };
                eK.zaraz.q = [];
                eK.zaraz._f = function(eO) {
                    return function() {
                        var eP = Array.prototype.slice.call(arguments);
                        eK.zaraz.q.push({
                            m: eO,
                            a: eP
                        })
                    }
                };
                for (const eQ of ["track", "set", "debug"]) eK.zaraz[eQ] = eK.zaraz._f(eQ);
                eK.zaraz.init = () => {
                    var eR = eL.getElementsByTagName(eN)[0],
                        eS = eL.createElement(eN),
                        eT = eL.getElementsByTagName("title")[0];
                    eT && (eK.zarazData.t = eL.getElementsByTagName("title")[0].text);
                    eK.zarazData.x = Math.random();
                    eK.zarazData.w = eK.screen.width;
                    eK.zarazData.h = eK.screen.height;
                    eK.zarazData.j = eK.innerHeight;
                    eK.zarazData.e = eK.innerWidth;
                    eK.zarazData.l = eK.location.href;
                    eK.zarazData.r = eL.referrer;
                    eK.zarazData.k = eK.screen.colorDepth;
                    eK.zarazData.n = eL.characterSet;
                    eK.zarazData.o = (new Date).getTimezoneOffset();
                    if (eK.dataLayer)
                        for (const eX of Object.entries(Object.entries(dataLayer).reduce(((eY, eZ) => ({
                                ...eY[1],
                                ...eZ[1]
                            }))))) zaraz.set(eX[0], eX[1], {
                            scope: "page"
                        });
                    eK.zarazData.q = [];
                    for (; eK.zaraz.q.length;) {
                        const e_ = eK.zaraz.q.shift();
                        eK.zarazData.q.push(e_)
                    }
                    eS.defer = !0;
                    for (const fa of [localStorage, sessionStorage]) Object.keys(fa || {}).filter((fc => fc
                        .startsWith("_zaraz_"))).forEach((fb => {
                        try {
                            eK.zarazData["z_" + fb.slice(7)] = JSON.parse(fa.getItem(fb))
                        } catch {
                            eK.zarazData["z_" + fb.slice(7)] = fa.getItem(fb)
                        }
                    }));
                    eS.referrerPolicy = "origin";
                    eS.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(eK
                        .zarazData)));
                    eR.parentNode.insertBefore(eS, eR)
                };
                ["complete", "interactive"].includes(eL.readyState) ? zaraz.init() : eK.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, 0, "script");
        })(window, document);
    </script>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap">
        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 text-center">
                        <a href="index.html" class="site-logo">
                            {{-- <img src="images/logo.png" alt="Image" class="img-fluid"> --}}
                            MULTI SPORT
                        </a>
                    </div>
                    <a href="#"
                        class="mx-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                            class="icon-menu h3"></span></a>
                </div>
            </div>
            <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">
                <div class="container">
                    <div class="d-flex align-items-center">
                        <div class="mx-auto">
                            <nav class="site-navigation position-relative text-left" role="navigation">
                                <ul class="site-menu main-menu js-clone-nav mx-auto d-none pl-0 d-lg-block border-none">
                                    <li class=""><a href="{{ url('/') }}"
                                            class="nav-link text-left">Home</a></li>
                                    {{-- <li class=""><a href="{{ url('about') }}"
                                            class="nav-link text-left">About</a></li> --}}
                                    <li class=""><a href="{{ url('shop') }}"
                                            class="nav-link text-left">Shop</a></li>
                                    @if (Auth::check())
                                        <li class=""><a href="{{ url('cart') }}" class="nav-link text-left">
                                                {{ auth()->user()->cart->count() }} <i
                                                    class="fa-solid fa-bag-shopping"></i>
                                                Cart </a></li>
                                    @endif
                                    @if (!Auth::check())
                                        <li>
                                            <a href="{{ url('register') }}" class="nav-link text-left">
                                                <i class="fa fa-user">
                                                </i>
                                                register
                                            </a>
                                        </li>
                                    @endif
                                    <li class="">
                                        @if (!Auth::check())
                                            <a href="{{ url('login') }}" class="nav-link text-left">
                                                <i class="fa fa-user">
                                                </i>
                                                login
                                            </a>
                                        @else
                                            <a href="{{ url('user-profile') }}" class="nav-link text-left">
                                                <i class="fa fa-user">
                                                </i>
                                                {{ auth()->user()->username }}
                                            </a>
                                        @endif
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="mx-auto">
                            <nav class="site-navigation position-relative text-left" role="navigation">
                                <ul class="site-menu main-menu js-clone-nav mx-auto d-none pl-0 d-lg-block border-none">
                                    {{-- <li class=""><a href="{{ url('cart') }}"
                                            class="nav-link text-left">
                                            @if (!Auth::check())
                                                <i class="fa-solid fa-bag-shopping"></i> Cart
                                            @else
                                                {{ auth()->user()->cart->count() }} <i
                                                    class="fa-solid fa-bag-shopping"></i>
                                                Cart
                                            @endif
                                        </a></li>
                                    <li class="">
                                        @if (!Auth::check())
                                            <a href="{{ url('login') }}" class="nav-link text-left">
                                                <i class="fa fa-user">
                                                </i>
                                                login
                                            </a>
                                        @else
                                            <a href="{{ url('logout') }}" class="nav-link text-left">
                                                <i class="fa fa-user">
                                                </i>
                                                {{ auth()->user()->username }}
                                            </a>
                                        @endif
                                    </li> --}}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="social-icons">
                            <a href="#"><span class="icon-facebook"></span></a>
                            <a href="#"><span class="icon-twitter"></span></a>
                            <a href="#"><span class="icon-youtube"></span></a>
                            <a href="#"><span class="icon-instagram"></span></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="copyright">
                            <p>

                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i
                                    class="icon-heart text-danger" aria-hidden="true"></i> by <a
                                    href="https://colorlib.com/" target="_blank">Colorlib</a>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#ff5e15" />
        </svg></div>
    <script src="{{ url('frontend/wines') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ url('frontend/wines') }}/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="{{ url('frontend/wines') }}/js/jquery-ui.js"></script>
    <script src="{{ url('frontend/wines') }}/js/popper.min.js"></script>
    <script src="{{ url('frontend/wines') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('frontend/wines') }}/js/owl.carousel.min.js"></script>
    <script src="{{ url('frontend/wines') }}/js/jquery.stellar.min.js"></script>
    <script src="{{ url('frontend/wines') }}/js/jquery.countdown.min.js"></script>
    <script src="{{ url('frontend/wines') }}/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ url('frontend/wines') }}/js/jquery.easing.1.3.js"></script>
    <script src="{{ url('frontend/wines') }}/js/aos.js"></script>
    <script src="{{ url('frontend/wines') }}/js/jquery.fancybox.min.js"></script>
    <script src="{{ url('frontend/wines') }}/js/jquery.sticky.js"></script>
    <script src="{{ url('frontend/wines') }}/js/jquery.mb.YTPlayer.min.js"></script>
    <script src="{{ url('frontend/wines') }}/js/main.js"></script>


    @stack('script')

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
        integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
        data-cf-beacon='{"rayId":"781cdaacaabe18be","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.3","si":100}'
        crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/wines/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 30 Dec 2022 18:32:05 GMT -->

</html>
