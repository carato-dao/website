<?php include('assets/header.php'); ?>

<!-- Slider
		============================================= -->
<section id="slider" class="slider-element swiper_wrapper min-vh-100" data-effect="fade">
  <div class="slider-inner">
    <div class="swiper-container swiper-parent">
      <div class="swiper-wrapper">
        <!-- Slide 1 -->
        <div class="swiper-slide hero-diagonal dark bg-color" style="background: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0, 0.1)), url('assets/images/carrubo.jpg') no-repeat center right / auto 100%;">
          <div class="container" style="z-index: 2;">
            <div class="row h-100 align-items-center py-5">
              <div class="col-md-6">
                <div class="heading-block border-bottom-0 bottommargin-sm">
                  <h2 class="font-weight-bold nott ls0" style="font-size: 46px;">Un albero è conosciuto per i
                    suoi frutti, un uomo per le sue azioni. Una buona azione non è mai
                    perduta.</h2>
                </div>
                <p class="mb-5 font-weight-normal lead" style="line-height: 1.6;">Spargi il seme della buona azione e raccogli
                  carati.
                </p>
                <a href="/assets/manifesto.pdf" class="button button-small button-light button-success button-rounded m-0">Manifesto</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- Content
		============================================= -->
<section id="content" class="bg-white">
  <div class="content-wrap pt-0" style="overflow: visible">
    <!-- Main =============================== -->
    <div class="position-relative">
      <div class="container">
        <div class="row py-0 py-lg-5">
          <div class="col-lg-5 py-5">
            <div class="heading-block border-bottom-0 bottommargin-sm">
              <div class="fancy-title title-border mb-3">
                <h5 class="font-weight-normal color font-body">Su di noi</h5>
              </div>
              <h3 class="font-weight-bold nott" style="font-size: 42px; letter-spacing: -1px;">
                Cos'è <span>Carato</span>?</h3>
            </div>
            <p class="mb-5">Carato è una filosofia di pensiero che considera la cultura, secondo la
              sua stretta etimologia, una forma di coltivazione. Grazie alla tecnologia Blockchain
              utilizzata e alle sue caratteristiche intrinseche di trasparenza e sicurezza la
              cultura della sostenibilità e dell’innovazione sociale diventano azioni concrete,
              specifiche che generano mondi e persone migliori.
            </p>

            <div class="feature-box fbox-plain bottommargin-sm">
              <div class="fbox-icon">
                <i class="icon-line-circle-check text-primary"></i>
              </div>
              <div class="fbox-content">
                <h3 class="font-weight-normal nott">Carato</h3>
                <p>Per ogni buona azione compiuta per la tua città ottieni un Carato, la moneta
                  digitale virtuosa.
                </p>
              </div>
            </div>

            <div class="feature-box fbox-plain bottommargin-sm">
              <div class="fbox-icon">
                <i class="icon-line-circle-check text-success"></i>
              </div>
              <div class="fbox-content">
                <h3 class="font-weight-normal nott">Comunità</h3>
                <p>Fai una buona azione. Partecipa,condividi,aiuta e ricevi ricompense in
                  carati.
                </p>
              </div>
            </div>

            <div class="feature-box fbox-plain bottommargin-sm">
              <div class="fbox-icon">
                <i class="icon-line-circle-check text-warning"></i>
              </div>
              <div class="fbox-content">
                <h3 class="font-weight-normal nott">Associazioni</h3>
                <p>Promotrici di azioni utili per la città e la comunità. Unite da una genuina
                  condivisione di valori e dalla volontà di interazione e integrazione
                  sociale.
                </p>
              </div>
            </div>

            <div class="feature-box fbox-plain">
              <div class="fbox-icon">
                <i class="icon-line-circle-check text-info"></i>
              </div>
              <div class="fbox-content">
                <h3 class="font-weight-normal nott">Esercenti</h3>
                <p>Una rete di esercenti convenzionati dove poter spendere i carati ottenuti
                  dalle buone azioni nella tua città.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section-img" style="background: radial-gradient(ellipse at center, rgba(255,221,148,.4),rgba(255,221,148,1)), url('assets/images/gallery/main.jpg') no-repeat center center / cover">
        <img class="section-img-sm" src="assets/images/gallery/main2.jpg" alt="Section Img">
      </div>
    </div>
    <!--end -->

    <!-- Associazioni ========================= -->
    <div id="associazioni" class="section section-yogas mb-0" style="background-color: rgba(126, 150, 128,0.2); padding: 100px 0">
      <div class="container">
        <div class="row">
          <?php $associazioni = returnDBObject("SELECT * FROM datatype_associazioni WHERE attiva=? ORDER BY nome ASC", ["SI"], 1); ?>
          <?php foreach ($associazioni as $associazione) { ?>
            <div class="col-md-4 col-lg-4">
              <div class="card" style="border-top-color: #FBBD40;">
                <div class="card-body">
                  <img src="/contents/<?php echo $associazione['logo']; ?>" alt="<?php echo $associazione['nome']; ?>" class="mb-3" width="70">
                  <div class="d-flex align-items-baseline">
                    <h3><?php echo $associazione['nome']; ?></h3>
                    <?php if($associazione['slug'] != ""){ ?>
                      <a href="/associazione/<?php echo $associazione['slug']; ?>">
                        <i class="icon-line-open ml-2"></i>
                      </a>
                    <?php } ?>
                  </div>
                  <p class="text-black-50"><?php echo $associazione['preview']; ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <!-- end -->


    <!-- Punti Vendita ======================================= -->
    <div id="puntivendita" class="section bg-transparent my-0 pb-1">
      <div class="container">
        <div class="heading-block" style="max-width: 500px">
          <h3 class="font-weight-bold nott mb-4" style="font-size: 42px; letter-spacing: -1px;">
            Punti vendita <span>Convenzionati</span></h3>
          <p>Riscatta le tue buone azioni e spendi qui i tuoi carati. Gli esercenti offrono
            scontistiche speciali dedicate a coloro che si impegnano a migliorare la propria città.
          </p>
        </div>
      </div>
      <div id="oc-teachers" class="owl-carousel owl-carousel-full image-carousel carousel-widget customjs">
        <?php $esercenti = returnDBObject("SELECT * FROM datatype_esercenti WHERE attivO=? ORDER BY nome ASC", ["SI"], 1); ?>
        <?php foreach ($esercenti as $esercente) { ?>
          <div class="oc-item">
            <div class="jumbotron m-0 dark p-5 d-flex justify-content-center align-items-md-end flex-column" style="background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0, 0.8)), url('/contents/<?php echo $esercente['banner']; ?>') no-repeat center center / cover;">
              <div class="jumbotron-text mt-0 mt-md-auto row align-items-center">
                <div class="col-md-10">
                  <div class="testimonial bg-transparent shadow-none border-0 p-0">
                    <h2 class="mb-1"><?php echo $esercente['nome']; ?></h2>
                    <div class="testi-meta ls1 mb-4 text-light font-weight-normal"><?php echo $esercente['comune']; ?> - <?php echo $esercente['tipologia']; ?></div>
                    <div class="testi-content">
                      <?php echo $esercente['descrizione']; ?>
                    </div>
                  </div>
                  <div class="social-icons topmargin-sm">
                    <?php if ($esercente['website'] != "") { ?>
                      <a href="<?php echo $esercente['website']; ?>" target="_blank" class="social-icon si-world si-small si-light">
                        <i class="icon-world"></i><i class="icon-world"></i>
                      </a>
                    <?php } ?>
                    <?php if ($esercente['facebook'] != "") { ?>
                    <a href="<?php echo $esercente['facebook']; ?>" target="_blank" class="social-icon si-facebook si-small si-light">
                      <i class="icon-facebook"></i><i class="icon-facebook"></i>
                    </a>
                    <?php } ?>
                    <?php if ($esercente['instagram'] != "") { ?>
                    <a href="<?php echo $esercente['instagram']; ?>" target="_blank" class="social-icon si-instagram si-small si-light">
                      <i class="icon-instagram"></i><i class="icon-instagram"></i>
                    </a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    <!-- end-->

    <div id='map' style='width: 100%; height: 450px; margin-top:120px;'></div>


    <div class="section mb-0 bg-transparent">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 mb-5 mb-md-0">
            <div class="yoga-video position-relative">
              <img src="assets/images/events.svg" alt="Yoga Image" style="width: 600px;">
            </div>
          </div>
          <div class="col-md-6">
            <div class="heading-block border-bottom-0 bottommargin-sm">
              <div class="fancy-title title-border mb-3">
                <h5 class="font-weight-normal color font-body text-uppercase ls1">Eventi
                </h5>
              </div>
              <h2 class="font-weight-bold nott" style="font-size: 42px; letter-spacing: -1px;">
                Partecipa ai nostri Eventi</h2>
            </div>
            <p class="mb-5 lead mb-0" style="line-height: 1.7;">Rimani aggiornato e partecipa alle
              iniziative promosse per guadagnare carati. Il calendario ti segnala tutti gli eventi
              organizzati dalle associazioni.</p>
            <a href="/eventi" class="button button-small button-light button-success button-rounded m-0">Eventi</a>
          </div>
        </div>
      </div>
    </div>

    <!-- GALLERY =============================================== 
				<div class="section bg-transparent mb-0">
					<div class="container">
						<div class="d-flex justify-content-between align-items-center">
							<div class="heading-block border-bottom-0 mb-0" style="max-width: 700px">
								<div class="fancy-title title-border mb-3">
									<h5 class="font-weight-normal color font-body text-uppercase ls1">Beautiful Captured
									</h5>
								</div>
								<h2 class="font-weight-bold mb-2 nott" style="font-size: 42px; letter-spacing: -1px">Our
									<span>Yoga</span> Gallery.</h2>
								<p class="lead mb-0">Energistically syndicate team building synergy after efficient
									human capital. Assertively underwhelm sticky solutions.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="section p-0 m-0">
					<div class="masonry-thumbs grid-container grid-2 grid-sm-3 grid-md-4" data-lightbox="gallery">
						<a class="grid-item" href="assets/images/gallery/1.jpg" data-lightbox="gallery-item"><img
								src="assets/images/gallery/1.jpg" alt="Gallery Thumb 1"></a>
						<a class="grid-item" href="assets/images/gallery/2.jpg" data-lightbox="gallery-item"><img
								src="assets/images/gallery/2.jpg" alt="Gallery Thumb 2"></a>
						<a class="grid-item" href="assets/images/gallery/3.jpg" data-lightbox="gallery-item"><img
								src="assets/images/gallery/3.jpg" alt="Gallery Thumb 3"></a>
						<a class="grid-item" href="assets/images/gallery/4.jpg" data-lightbox="gallery-item"><img
								src="assets/images/gallery/4.jpg" alt="Gallery Thumb 4"></a>
						<a class="grid-item" href="assets/images/gallery/5.jpg" data-lightbox="gallery-item"><img
								src="assets/images/gallery/5.jpg" alt="Gallery Thumb 5"></a>
						<a class="grid-item" href="assets/images/gallery/6.jpg" data-lightbox="gallery-item"><img
								src="assets/images/gallery/6.jpg" alt="Gallery Thumb 6"></a>
						<a class="grid-item" href="assets/images/gallery/7.jpg" data-lightbox="gallery-item"><img
								src="assets/images/gallery/7.jpg" alt="Gallery Thumb 7"></a>
						<a class="grid-item" href="assets/images/gallery/8.jpg" data-lightbox="gallery-item"><img
								src="assets/images/gallery/8.jpg" alt="Gallery Thumb 8"></a>
						<a class="grid-item" href="assets/images/gallery/9.jpg" data-lightbox="gallery-item"><img
								src="assets/images/gallery/9.jpg" alt="Gallery Thumb 9"></a>
						<a class="grid-item" href="assets/images/gallery/10.jpg" data-lightbox="gallery-item"><img
								src="assets/images/gallery/10.jpg" alt="Gallery Thumb 10"></a>
						<a class="grid-item" href="assets/images/gallery/11.jpg" data-lightbox="gallery-item"><img
								src="assets/images/gallery/11.jpg" alt="Gallery Thumb 11"></a>
						<a class="grid-item" href="assets/images/gallery/12.jpg" data-lightbox="gallery-item"><img
								src="assets/images/gallery/12.jpg" alt="Gallery Thumb 12"></a>
					</div>
				</div> end GALLERY-->
  </div>

</section><!-- #content end -->

<?php include('assets/footer.php'); ?>