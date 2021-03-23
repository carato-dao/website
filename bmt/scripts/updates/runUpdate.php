<?php 
	//error_reporting(E_ALL); ini_set('display_errors', 'On'); 
	$permission_level=5;
	if (!isset($_SESSION)) {
	  session_start();
	}
   	include('../../inc/core.php');
   	$mode=returnConnectivityStat();
   	$subdomain='';
    require_once('../../inc/connect_'.$mode.'.php');
    require_once('../../classes/class.curl.php');	
    require_once('../../classes/class.pclzip.php');	
	$crypted = returnDBObject("SELECT * FROM crypted_configs WHERE code=?",array('session_code')); 
	$session_code=decryptText($crypted['value']);
	define('session_code',$session_code);
	$permissionsErrors='';
	include('../../inc/validate.user.php');
	include('../../inc/permission.routing.php');
	
	if (!extension_loaded('ZipArchive')) {
	    $archive = new PclZip("update.zip");
	    $archive->extract(PCLZIP_OPT_PATH, "update",
                          PCLZIP_OPT_REMOVE_PATH, "BasementCMS-".$_POST['version']);
        echo '<br><br>Update extracted, now see what\'s changed.<br><br>';
    }else{
		$zip = new ZipArchive;
		if ($zip->open('update.zip') === TRUE) {
		  $zip->extractTo('update/');
		  $zip->close();
		  echo '<br>Update extracted.';
		}else{
			echo '<br>Error with zip file.';
		}
	}
	
	$folder_tree=dirToArray('update'); ?>
	<h4>Changed files</h4>
	<form id="changedFiles">
		<input type="hidden" name="version" value="<?php echo $_POST['version']; ?>">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>File</th>
					<th>Old size</th>
					<th>New size</th>
					<th style="text-align:center">Confirm</th>
				</tr>
			</thead>
		<?php
		
			foreach($folder_tree as $key => $value){
				if(is_array($value)){
					if($key=='bmt'){
						foreach($value as $sub => $contents){
							checkFolderFiles($sub, $contents,'');
						}
					}
				}
			}
		?>
		</table>
	</form>
	<div class="btn btn-primary" onClick="confirmUpdate()">Confirm Update</div>