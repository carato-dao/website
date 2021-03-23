<script>
	function validateRestore(filename){
		bootbox.confirm("Sei sicuro di voler eliminare il backup: "+filename+"<br><span style='color:#f00'>Ti ricordo che l'operazione è irreversibile.</span>", 
			function(result) {
				if(result===true){
					window.location='/bmt/manage-database/'+filename+'/restore';
				}
			}
		); 
	}	
	function previewBackup(filename) {
		$.ajax({
			type: "POST",
			url: subdomain + '/bmt/scripts/database/previewBackup.php',
			data:{filename: filename}
		}).done(function(response) {
			console.log(response);
			$('#backup-name').html(filename);
			$('#preview-backup-content').html(response);
			$('#preview-backup').modal('show');
		});
	}
</script>
<div class="modal fade" id="preview-backup" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Backup preview</h4>
      </div>
      <div class="modal-body">
	    <h4>You're looking: <span id="backup-name"></span></h4>
        <pre id="preview-backup-content"></pre>
      </div>
    </div>
  </div>
</div>