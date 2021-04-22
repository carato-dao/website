<?php include('components/header.php'); ?>

<div id="app">
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
                    <h2 class="font-weight-bold nott ls0" style="font-size: 46px;"><?php echo strip_tags($website_translations["home_intro"][$language]); ?></h2>
                  </div>
                  <p class="mb-5 font-weight-normal lead" style="line-height: 1.6;"><?php echo strip_tags($website_translations["home_subtitle"][$language]); ?></p>
                  <div v-on:click="showVideo" class="button button-small button-light button-success button-rounded m-0"><?php echo strip_tags($website_translations["cta_video"][$language]); ?></div>
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
                  <h5 class="font-weight-normal color font-body"><?php echo strip_tags($website_translations["about_us"][$language]); ?></h5>
                </div>
                <h3 class="font-weight-bold nott" style="font-size: 42px; letter-spacing: -1px;">
                  <?php echo strip_tags($website_translations["what_is"][$language]); ?><span> Carato</span>?</h3>
              </div>
              <p class="mb-5"><?php echo strip_tags($website_translations["carato_desc"][$language]); ?>
              </p>

              <div class="feature-box fbox-plain bottommargin-sm">
                <div class="fbox-icon">
                  <i class="icon-line-circle-check text-primary"></i>
                </div>
                <div class="fbox-content">
                  <h3 class="font-weight-normal nott">Carato</h3>
                  <p><?php echo strip_tags($website_translations["carato_one"][$language]); ?>
                  </p>
                </div>
              </div>

              <div class="feature-box fbox-plain bottommargin-sm">
                <div class="fbox-icon">
                  <i class="icon-line-circle-check text-success"></i>
                </div>
                <div class="fbox-content">
                  <h3 class="font-weight-normal nott"><?php echo strip_tags($website_translations["community_title"][$language]); ?></h3>
                  <p><?php echo strip_tags($website_translations["carato_two"][$language]); ?>
                  </p>
                </div>
              </div>

              <div class="feature-box fbox-plain bottommargin-sm">
                <div class="fbox-icon">
                  <i class="icon-line-circle-check text-warning"></i>
                </div>
                <div class="fbox-content">
                  <h3 class="font-weight-normal nott"><?php echo strip_tags($website_translations["associazioni_title"][$language]); ?></h3>
                  <p><?php echo $website_translations["associazioni_desc"][$language]; ?>
                  </p>
                </div>
              </div>

              <div class="feature-box fbox-plain">
                <div class="fbox-icon">
                  <i class="icon-line-circle-check text-info"></i>
                </div>
                <div class="fbox-content">
                  <h3 class="font-weight-normal nott"><?php echo strip_tags($website_translations["esercenti_title"][$language]); ?></h3>
                  <p><?php echo strip_tags($website_translations["esercenti_desc"][$language]); ?></p>
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
                <div class="card">
                  <div class="card-body">
                    <img src="/contents/<?php echo $associazione['logo']; ?>" alt="<?php echo $associazione['nome']; ?>" class="mb-3" height="70">
                    <div class="d-flex align-items-baseline">
                      <h3><?php echo $associazione['nome']; ?></h3>
                      <?php if ($associazione['slug'] != "") { ?>
                        <a href="<?php if ($language == 'en') {
                                    echo '/en';
                                  } ?>/associazione/<?php echo $associazione['slug']; ?>">
                          <i class="icon-line-open ml-2"></i>
                        </a>
                      <?php } ?>
                    </div>
                    <?php echo $associazione['preview_' . $language]; ?>
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
              <?php echo strip_tags($website_translations["local_store"][$language]); ?><span><?php echo $website_translations["store_partner"][$language]; ?></span></h3>
            <p><?php echo strip_tags($website_translations["where_buy"][$language]); ?>
            </p>
          </div>
        </div>
        <div id="oc-teachers" class="owl-carousel owl-carousel-full image-carousel carousel-widget customjs">
          <?php $esercenti = returnDBObject("SELECT * FROM datatype_esercenti WHERE attivo=? ORDER BY id DESC", ["SI"], 1); ?>
          <?php
          foreach ($esercenti as $esercente) {
            include('components/esercente.php');
          }
          ?>
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
                  <h5 class="font-weight-normal color font-body text-uppercase ls1"><?php echo strip_tags($website_translations["event_title"][$language]); ?>
                  </h5>
                </div>
                <h2 class="font-weight-bold nott" style="font-size: 42px; letter-spacing: -1px;">
                  <?php echo $website_translations["cta_event"][$language]; ?></h2>
              </div>
              <p class="mb-5 lead mb-0" style="line-height: 1.7;"><?php echo strip_tags($website_translations["event_booking"][$language]); ?></p>
              <a href="https://www.facebook.com/caratomonetavirtuosa" target="_blank" class="button button-small button-light button-success button-rounded m-0"><?php echo $website_translations["follow_fb"][$language]; ?></a>
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
  <div v-if="showVideoControl" style="position:fixed; top:0; left:0; background-color:rgba(0,0,0,0.8); z-index:9999; width:100%; height:100%; padding:50px;">
    <img src="/assets/images/close.png" v-on:click="hideVideo" width="28" style="cursor:pointer; position:absolute; top:25px; right:25px;">
    <iframe width="100%" height="600" id="embedVideo" src="https://www.youtube.com/embed/kMuQPJe9KTg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  </div>
</div>
<script>
  $('#embedVideo').css('height', window.innerHeight - 100)
  var app = new Vue({
    el: '#app',
    data: {
      showVideoControl: false
    },
    methods: {
      showVideo() {
        this.showVideoControl = true
      },
      hideVideo() {
        this.showVideoControl = false
      }
    }
  })
</script>
<?php include('components/footer.php'); ?>