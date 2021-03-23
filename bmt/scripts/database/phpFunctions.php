<?php
	if(isset($_GET['restore'])){
		$fileToRestore=str_replace('---','/',$_GET['restore']);
		backupDB(false, 'inc/db_backup/'.date('d-m-y').'/'.session_id().'/db_'.date($backup_pattern).'.sql');
		importDB('inc/db_backup/'.$fileToRestore);
		$_SESSION['success_message']='Backup restored correctly, a backup was done first.';
		?>
		    <script type="text/javascript">
	       		window.location = "<?php echo '/bmt/manage-database'; ?>";
	       	</script>
		<?php
	}	
?>