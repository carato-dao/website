<?php 
	$permission_level=2;
	include('inc/initialize.php');
?>
<!DOCTYPE HTML>
<html>
	<?php include('layout/header.php'); ?>
	<body>
		<div class="bmt-container">
			<?php include('layout/menu.php'); ?>
			<div class="bmt-page-header">
				<?php if(isset($_GET['action'])){ ?>
					<a href="<?php echo $subdomain; ?>/bmt/<?php echo $internal_route; ?>" class="bmt-small-button">
						<li><i class="fa fa-chevron-left"></i></li>
					</a>
				<?php } ?>
				<?php echo $bmt_locales['info']['menu']; ?>
				<ul class="bmt-header-toolbar">
					
				</ul>
			</div>
			<div class="bmt-page">
				<div class="row">
					<div class="col-xs-12">
						<div class="portlet">
							<div class="row">
								<div class="col-xs-12">
									Basement CMS is a software developed by turing - innovation labs<br>
									Version 3.0.1<br>
									<a href="https://turinglabs.org" target="_blank">https://turinbglabs.org</a><br><br>
									<div id="updateResult"></div>
								</div><!--dx-->
							</div><!--row-fluid-->
						</div><!--content-->
					</div><!--span10-->
				</div><!--row-fluid-->
			</div>
		</div>
	<?php include('layout/footer.php'); ?>
	
	</body>
</html>