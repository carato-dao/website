<?php 
	include('inc/initialize.php');
?>
<!DOCTYPE HTML>
<html>
<?php include('layout/header.php'); ?>
<body>
	<div class="bmt-container">
		<?php include('layout/menu.php'); ?>
		<div class="bmt-page-header">
			<?php echo $bmt_locales['dashboard']['menu']; ?>
		</div>
		<div class="bmt-page" style="padding:30px 0;">
			<iframe width="100%" id="analytics" height="800" src="https://datastudio.google.com/embed/reporting/1d5aac6e-37fd-492b-96e5-b09f6cd17231/page/1M" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
	<?php include('layout/footer.php'); ?>

</body>
</html>