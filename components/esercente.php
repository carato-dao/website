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