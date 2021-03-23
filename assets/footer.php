<!-- Footer
		============================================= -->
<footer id="footer" class="bg-color dark">
    <div class="container">

        <!-- Footer Widgets
				============================================= -->
        <div class="footer-widgets-wrap">
            <div class="row">
                <div class="footer-head col-lg-6 col-md-6 col-xs-12 d-flex align-items-center">
                    <a href="#"><img src="assets/images/logo-full.svg" alt="Carato" height="80"></a>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <p class="text-white-50 m-0">Carato è una filosofia di pensiero che considera la
                            cultura,
                            secondo la sua stretta etimologia, una forma di coltivazione.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6">
                    <div class="widget clearfix">
                        <h3 class="ls0 h5 mb-4">Menu</h3>
                        <ul class="list-unstyled iconlist ml-0">
                            <li class="mb-2"><a href="/" class="text-white-50">Home</a></li>
                            <li class="mb-2"><a href="#associazioni" class="text-white-50">Associazioni</a></li>
                            <li class="mb-2"><a href="#puntivendita" class="text-white-50">Punti Vendita</a>
                            </li>
                            <li class="mb-2"><a href="/eventi" class="text-white-50">Eventi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-6">
                    <div class="widget clearfix">
                        <h3 class="ls0 h5 mb-4">Contattaci</h3>
                        <ul class="list-unstyled iconlist ml-0">
                            <li class="mb-2"><a href="https://www.facebook.com/caratomonetavirtuosa" class="text-white-50">Facebook</a></li>
                            <!-- <li class="mb-2"><a href="#" class="text-white-50">Instagram</a></li> -->
                            <li class="mb-2"><a href="mailto:caratomonetavirtuosa@gmail.com" class="text-white-50">E-mail</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Copyrights ============================================= -->
    <div id="copyrights" class="center dark">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="mb-2 text-white-50">Carato | Developed with ❤️ by <a href="https://turinglabs.org/" target="_blank">turinglabs</a> using the open-source technology of <a href="https://scrypta.foundation" target="_blank">Scrypta Foundation</a></p>
                </div>
            </div>
        </div>
    </div><!-- #copyrights end -->
</footer><!-- #footer end -->

</div><!-- #wrapper end -->

<!-- Go To Top
	============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- JavaScripts
	============================================= -->
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/plugins.min.js"></script>

<!-- For Countdown -->
<script src="/assets/js/components/moment.js"></script>

<!-- Footer Scripts
	============================================= -->
<script src="/assets/js/functions.js"></script>

<!-- Fathom - beautiful, simple website analytics -->
<script src="https://cdn.usefathom.com/script.js" data-site="ATUJEAQA" defer></script>
<!-- / Fathom -->

<script>
    // Owl Carousel Scripts
    jQuery(window).on('pluginCarouselReady', function() {
        $('#oc-teachers').owlCarousel({
            items: 1,
            margin: 30,
            nav: true,
            navText: ['<i class="icon-line-arrow-left"></i>', '<i class="icon-line-arrow-right"></i>'],
            dots: false,
            smartSpeed: 300,
            stagePadding: 60,
            responsive: {
                768: {
                    stagePadding: 100,
                    margin: 30,
                    items: 1
                },
                991: {
                    stagePadding: 100,
                    margin: 40,
                    smartSpeed: 400,
                    items: 2
                },
                1200: {
                    stagePadding: 100,
                    margin: 40,
                    smartSpeed: 400,
                    items: 2
                }
            },
        });
    });

    //Current Week
    Date.prototype.getWeek = function(start) {
        //Calcing the starting point
        start = start || 0;
        var today = new Date(this.setHours(0, 0, 0, 0));
        var day = today.getDay() - start;
        var date = today.getDate() - day;

        // Grabbing Start/End Dates
        var StartDate = new Date(today.setDate(date));
        var EndDate = new Date(today.setDate(date + 6));
        return [StartDate, EndDate];
    }
    var Dates = new Date().getWeek();
    $("#week-details").text(Dates[0].toLocaleDateString() + ' - ' + Dates[1].toLocaleDateString());
</script>

<style>
    a,
    h1>span:not(.nocolor):not(.badge),
    h2>span:not(.nocolor):not(.badge),
    h3>span:not(.nocolor):not(.badge),
    h4>span:not(.nocolor):not(.badge),
    h5>span:not(.nocolor):not(.badge),
    h6>span:not(.nocolor):not(.badge),
    .header-extras li .he-text span,
    .menu-item:hover>.menu-link,
    .menu-item.current>.menu-link,
    .dark .menu-item:hover>.menu-link,
    .dark .menu-item.current>.menu-link,
    .top-cart-item-desc a:hover,
    .top-cart-action .top-checkout-price,
    .breadcrumb a:hover,
    .grid-filter li a:hover,
    .portfolio-desc h3 a:hover,
    #portfolio-navigation a:hover,
    .entry-title h2 a:hover,
    .entry-title h3 a:hover,
    .entry-title h4 a:hover,
    .post-timeline .entry:hover .entry-timeline,
    .post-timeline .entry:hover .timeline-divider,
    .comment-content .comment-author a:hover,
    .product-title h3 a:hover,
    .single-product .product-title h2 a:hover,
    .product-price ins,
    .single-product .product-price,
    .process-steps li.active h5,
    .process-steps li.ui-tabs-active h5,
    .tab-nav-lg li.ui-tabs-active a,
    .team-title span,
    .btn-link,
    .page-link,
    .page-link:hover,
    .page-link:focus,
    .fbox-plain .fbox-icon i,
    .fbox-plain .fbox-icon img,
    .fbox-border .fbox-icon i,
    .fbox-border .fbox-icon img,
    .dark .menu-item:hover>.menu-link,
    .dark .menu-item.current>.menu-link,
    .dark .top-cart-item-desc a:hover,
    .dark .breadcrumb a:hover,
    .dark .portfolio-desc h3 a:hover,
    .dark #portfolio-navigation a:hover,
    .dark .entry-title h2 a:hover,
    .dark .entry-title h3 a:hover,
    .dark .entry-title h4 a:hover,
    .dark .product-title h3 a:hover,
    .dark .single-product .product-title h2 a:hover,
    .dark .product-price ins,
    .dark .tab-nav-lg li.ui-tabs-active a {
        color: #80B192;
    }

    #logo img {
        display: block;
        max-width: 60%;
        max-height: 40%;
        height: 70px !important;
    }

    @media screen and (max-width: 990px) {
        h2 {
            font-size: 30px !important;
        }
    }

    @media screen and (max-width: 768px) {
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

        #map {
            margin-top: 80px;
        }
    }
</style>
<script>
    mapboxgl.accessToken =
        'pk.eyJ1IjoidHVyaW5nbGFic29yZyIsImEiOiJja2xzOHk1NTYxa2d2MnZxbWh0NHQ4cjdiIn0.TrqbL18iVT4_wTpfgg_hRg';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [14.724257, 36.918427],
        zoom: 13
    });
    var popup = {}

    /*
    	PRIMA CLASSE
    */
    popup['primaclasse'] = new mapboxgl.Popup({
        offset: 25
    }).setText(
        "Prima Classe | Via Ercolano, 7 Ragusa"
    );
    new mapboxgl.Marker()
        .setLngLat([14.724257, 36.918427])
        .setPopup(popup['primaclasse'])
        .addTo(map);

    /*
    	PROXIMA
    */
    popup['proxima'] = new mapboxgl.Popup({
        offset: 25
    }).setText(
        "Proxima - Orti Sociali | Via Deledda, Ragusa"
    );
    new mapboxgl.Marker()
        .setLngLat([14.693839, 36.930921])
        .setPopup(popup['proxima'])
        .addTo(map);

    /*
    	UBIK IBLA
    */
    popup['ubik'] = new mapboxgl.Popup({
        offset: 25
    }).setText(
        "Ubik | Corso XXV Aprile, 17/19, 97100 Ragusa"
    );
    new mapboxgl.Marker()
        .setLngLat([14.744861990170651, 36.92603390440305])
        .setPopup(popup['ubik'])
        .addTo(map);
    /*
    	MERCATOPOLI
    */
    popup['mercatopoli'] = new mapboxgl.Popup({
        offset: 25
    }).setText(
        "Mercatopoli | Via Mongibello, 81, 97100 Ragusa"
    );
    new mapboxgl.Marker()
        .setLngLat([14.71678407659341, 36.92061295364563])
        .setPopup(popup['mercatopoli'])
        .addTo(map);

    /*
    	DELICATESSEN
    */
    popup['delicatessen'] = new mapboxgl.Popup({
        offset: 25
    }).setText(
        "Delicatessen | Via Archimede, 32, 97100 Ragusa"
    );
    new mapboxgl.Marker()
        .setLngLat([14.719771, 36.9242117])
        .setPopup(popup['delicatessen'])
        .addTo(map);

    /*
    	FORMICHE
    */
    popup['formiche'] = new mapboxgl.Popup({
        offset: 25
    }).setText(
        "Formiche | Via F.Ozanam, 2 A, 97100 Ragusa"
    );
    new mapboxgl.Marker()
        .setLngLat([14.724419388356962, 36.918071028468255])
        .setPopup(popup['formiche'])
        .addTo(map);

    /*
    	CUMANNANTI
    */
    popup['cumannanti'] = new mapboxgl.Popup({
        offset: 25
    }).setText(
        "Trattoria nto Cumannanti| Via Archimede, 147, 97100 Ragusa"
    );
    new mapboxgl.Marker()
        .setLngLat([14.720088683770252, 36.92421379669825])
        .setPopup(popup['cumannanti'])
        .addTo(map);

    /*
    	Hiblasus
    */
    popup['hyblasus'] = new mapboxgl.Popup({
        offset: 25
    }).setText(
        "Hyblasus | Via Lazio, 64, 97100 Ragusa"
    );
    new mapboxgl.Marker()
        .setLngLat([14.714967370880176, 36.92558951626652])
        .setPopup(popup['hyblasus'])
        .addTo(map);

    /*
    	Verde Vigna
    */
    popup['verdevigna'] = new mapboxgl.Popup({
        offset: 25
    }).setText(
        "Verde Vigna | Via Pietro Nenni, 9, 97100 Ragusa"
    );
    new mapboxgl.Marker()
        .setLngLat([14.714867553687087, 36.90907303210907, ])
        .setPopup(popup['verdevigna'])
        .addTo(map);

    /*
    	Sottosale
    */
    popup['sottosale'] = new mapboxgl.Popup({
        offset: 25
    }).setText(
        "SottoSale | Via Venezia, 18, 97100 Marina di Ragusa"
    );
    new mapboxgl.Marker()
        .setLngLat([14.553604955533578, 36.78368604951849])
        .setPopup(popup['sottosale'])
        .addTo(map);

    /*
    	exebistrot
    */
    popup['exebistrot'] = new mapboxgl.Popup({
        offset: 25
    }).setText(
        "Exè Bistrot | Calle Bartolotti, sn, 97100 Ragusa"
    );
    new mapboxgl.Marker()
        .setLngLat([14.736526597866051, 36.92606903133515, ])
        .setPopup(popup['sottosale'])
        .addTo(map);

    /*
			parafarmacia ibla
		*/
    popup['pharma'] = new mapboxgl.Popup({
        offset: 25
    }).setText(
        "Parafarmacia Ibla | Via Camerina, 47-39, 97100 Ragusa RG"
    );
    new mapboxgl.Marker()
        .setLngLat([14.743691172499283, 36.927120347532295, ])
        .setPopup(popup['pharma'])
        .addTo(map);
</script>
</body>

</html>