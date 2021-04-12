<!DOCTYPE html>
<html dir="ltr" lang="it-IT">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="turinglabs">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://carato.org">
    <meta property="og:title" content="Carato">
    <meta property="og:description" content="Carato è una filosofia di pensiero che considera la cultura, secondo la sua stretta etimologia, una forma di coltivazione.">
    <meta property="og:image" content="">
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <link rel="icon" href="/assets/favicon.png">

    <!-- LOAD JQUERY LIBRARY -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />

    <!-- Stylesheets ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Sansita:400,700|Roboto:400,500&display=swap" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/assets/style.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/swiper.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/dark.css" type="text/css" />

    <!-- Carato pecific Stylesheet -->
    <link rel="stylesheet" href="/assets/css/colors.php?color=7E9680" type="text/css" /> <!-- Yoga Theme Color -->
    <link rel="stylesheet" href="/assets/css/fonts.css" type="text/css" /> <!-- Yoga Theme Font -->
    <link rel="stylesheet" href="/assets/carato.css" type="text/css" /> <!-- Yoga Theme Custom CSS -->
    <!-- / -->

    <link rel="stylesheet" href="/assets/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="/assets/css/custom.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />

    <!-- Document Title ============================================= -->
    <title>Carato | Moneta virtuosa</title>

</head>

<style>
    @media screen and (min-width: 768px) {
        .mobile {
            display: none !important;
        }
    }

    @media screen and (max-width: 990px) {
        h2 {
            font-size: 30px !important;
        }
    }

    @media screen and (max-width: 768px) {
        .desktop {
            display: none !important;
        }

        .owl-carousel {
            font-size: smaller !important;
        }

        h2 {
            font-size: 30px !important;
        }

        .min-vh-100 {
            min-height: 60vh !important;
        }

        .footer-widgets-wrap {
            align-items: center;
            text-align: center;
            justify-content: center;
        }

        .footer-head {
            display: block !important;
            margin-bottom: 10px;
        }

        #footer .footer-widgets-wrap {
            padding: 20px 0;
        }

        #copyrights {
            padding: 10px 0 !important;
        }

    }
</style>

<body class="stretched sticky-footer">

    <!-- Document Wrapper ============================================= -->
    <div id="wrapper" class="clearfix">
        <!-- Header ============================================= -->
        <header id="header" class="full-header" data-mobile-sticky="true">
            <div id="header-wrap">
                <div class="container">
                    <div class="header-row">
                        <!-- Logo ============================================= -->
                        <div id="logo">
                            <a href="/" class="standard-logo" data-dark-logo="images/logo-dark.png">
                                <img src="/assets/images/logo-carato.svg" alt="Carato Logo"></a>
                            <a href="/" class="retina-logo" data-dark-logo="images/logo-dark@2x.png">
                                <img src="/assets/images/logo-carato.svg" alt="Carato Logo"></a>
                        </div><!-- #logo end -->
                        <div class="header-misc d-flex align-items-center">
                            <!-- Top Search ============================================= -->
                            <div class="header-misc-icon">
                                <a href="https://www.facebook.com/caratomonetavirtuosa"><i class="icon-facebook-square"></i></a>
                            </div><!-- #top-search end -->
                            <!-- Top Instagram ============================================= -->
                            <!-- <div class="header-misc-icon">
								<a href="#"><i class="icon-instagram2"></i></span></a>
							</div> end -->
                        </div>

                        <div id="primary-menu-trigger">
                            <svg class="svg-trigger" viewBox="0 0 100 100">
                                <path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
                                </path>
                                <path d="m 30,50 h 40"></path>
                                <path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
                                </path>
                            </svg>
                        </div>

                        <!-- Primary Navigation ============================================= -->
                        <nav class="primary-menu">
                            <ul class="menu-container">
                                <li class="menu-item">
                                    <a class="menu-link" href="/">
                                        <div>Home</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="/#associazioni">
                                        <div>Associazioni</div>
                                    </a>
                                </li>
                                <li class="menu-item mega-menu">
                                    <a class="menu-link" href="/#puntivendita">
                                        <div>Punti Vendita</div>
                                    </a>
                                </li>
                                <li class="menu-item mega-menu">
                                    <a class="menu-link" href="/eventi">
                                        <div>Eventi</div>
                                    </a>
                                </li>
                                <li class="menu-item mega-menu">
                                    <a class="menu-link" target="_blank" href="https://app.carato.org">
                                        <div>Wallet</div>
                                    </a>
                                </li>
                            </ul>
                        </nav><!-- #primary-menu end -->
                        <form class="top-search-form" action="search.html" method="get">
                            <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
                        </form>
                    </div>
                </div>
            </div>
            <div class="header-wrap-clone"></div>
        </header><!-- #header end -->