<?php include('components/header.php'); ?>
<?php $associazione = returnDBObject("SELECT * FROM datatype_associazioni WHERE slug=? AND attiva=?",[$_GET['slug'], "SI"]); ?>
<!-- Page Title
		============================================= -->
<section id="page-title" class="page-title-parallax page-title-dark include-header" style="padding: 250px 0; background-image: url('/contents/<?php echo $associazione['banner']; ?>'); background-size: cover; background-position: center center;" data-bottom-top="background-position:0px 400px;" data-top-bottom="background-position:0px -500px;">

  <div class="container clearfix">
    <div class="d-flex align-items-center">
      <div class="mt-0 mb-0 p-0">
        <img style="height: 100px; margin-right: 20px;" src="/contents/<?php echo $associazione['logo']; ?>">
      </div>
      <div class="m-0">
        <span>Associazione</span>
        <h1><?php echo $associazione['nome']; ?></h1>
      </div>
    </div>
  </div>

</section><!-- #page-title end -->

<!-- Content
		============================================= -->
<section id="content">
  <div class="content-wrap">
    <div class="row align-items-stretch">
      <div class="col-md-5 p-5 min-vh-75">
        <iframe src="<?php echo $associazione['facebook_embed']; ?>" width="700" height="800" style="border:none; overflow:hidden;" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
      </div>
      <div class="col-md-7 col-padding" style="border-left: 1px solid black;">
        <div>
          <div class="heading-block">
            <span class="before-heading color">Associazione</span>
            <h3><?php echo $associazione['nome']; ?></h3>
          </div>
          <div class="row col-mb-50">

            <div class="col-lg-12">
              <p><?php echo $associazione['descrizione']; ?></p>
              <?php if($associazione['facebook'] != ""){ ?>
                <a href="<?php echo $associazione['facebook']; ?>" class="social-icon inline-block si-small si-light si-rounded si-facebook">
                  <i class="icon-facebook"></i>
                  <i class="icon-facebook"></i>
                </a>
              <?php } ?>
              <?php if($associazione['instagram'] != ""){ ?>
                <a href="<?php echo $associazione['instagram']; ?>" class="social-icon inline-block si-small si-light si-rounded si-instagram">
                  <i class="icon-instagram"></i>
                  <i class="icon-instagram"></i>
                </a>
              <?php } ?>
            </div>
            <div class="col-lg-6">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- #content end -->
<?php include('components/footer.php'); ?>