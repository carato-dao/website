<?php include('components/header.php'); ?>
<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">

					<div class="grid-filter-wrap">
                        <?php $esercenti = returnDBObject("SELECT * FROM datatype_esercenti WHERE attivo=? ORDER BY nome ASC", ["SI"], 1); ?>
                        <?php 
                            $categorie = [];
                            foreach($esercenti as $esercente){
                                if(!in_array($esercente['categoria'], $categorie)){
                                    array_push($categorie, $esercente['categoria']);
                                }
                            }
                            asort($categorie);
                        ?>
						<!-- Portfolio Filter
						============================================= -->
						<ul class="grid-filter" data-container="#portfolio">
							<li class="activeFilter"><a href="#" data-filter="*">Mostra tutti</a></li>
                            <?php foreach($categorie as $categoria){ ?>
							    <li><a href="#" data-filter=".pf-<?php echo $categoria; ?>"><?php echo $categoria; ?></a></li>
                            <?php } ?>
						</ul><!-- .grid-filter end -->

					</div>

					<!-- Portfolio Items
					============================================= -->
					<div id="portfolio" class="portfolio row grid-container gutter-20" data-layout="fitRows">
                        <?php foreach($esercenti as $esercente){ ?>
                            <!-- Portfolio Item: Start -->
                            <article class="portfolio-item col-lg-3 col-md-4 col-sm-6 col-12 pf-<?php echo $esercente['categoria']; ?>">
                                <!-- Grid Inner: Start -->
                                <div class="grid-inner">
                                    <!-- Image: Start -->
                                    <div class="portfolio-image">
                                        <img src="/contents/<?php echo $esercente['banner']; ?>" alt="<?php echo $esercente['nome']; ?>">
                                    </div>
                                    <!-- Image: End -->
                                    <!-- Decription: Start -->
                                    <div class="portfolio-desc">
                                        <h3><?php echo $esercente['categoria']; ?> - <?php echo $esercente['nome']; ?></h3>
                                        <span><a href="#"><?php echo $esercente['comune']; ?></a>, <a href="#"><?php echo $esercente['indirizzo']; ?></a></span>
                                    </div>
                                    <!-- Description: End -->
                                </div>
                                <!-- Grid Inner: End -->
                            </article>
                            <!-- Portfolio Item: End -->
                        <?php } ?>
					</div><!-- #portfolio end -->

				</div>
			</div>
		</section><!-- #content end -->
<?php include('components/footer.php'); ?>