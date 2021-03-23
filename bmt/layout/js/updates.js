	function checkForUpdates(){
		$('#updateResult').html('Checking for the lastest version, don\'t refresh or close the page...<br>');
		$.ajax({
		  type: "POST",
		  url: subdomain+'/bmt/scripts/updates/checkForUpdates.php'
		}).done(function( msg ) {
			$('#updateResult').append(msg);
		});
	}	
	function runBasementUpdate(version){
		$.ajax({
		  type: "POST",
		  data:{"version":version},
		  url: subdomain+'/bmt/scripts/updates/runUpdate.php'
		}).done(function( msg ) {
			$('#updateResult').append(msg);
		});
	}
	function confirmUpdate(){
		$.ajax({
		  type: "POST",
		  data:$('#changedFiles').serialize(),
		  url: subdomain+'/bmt/scripts/updates/confirmUpdate.php'
		}).done(function( msg ) {
			$('#updateResult').append(msg);
		});
	}