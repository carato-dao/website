<div class="bmt-page filemanager-page">
	<iframe width="100%" id="phpmyadmin" height="800" scrolling="auto" frameborder="0" src="<?php echo $subdomain; ?>/bmt/scripts/phpmyadmin/index.php?target=index.php&lang=it&collation_connection=utf8_general_ci"></iframe>
</div>
<script>
	$(document).ready(function(){
		$('#phpmyadmin').css('height',window.innerHeight-68);	
	});
	$(window).resize(function(){
		$('#phpmyadmin').css('height',window.innerHeight-68);	
	});
</script>