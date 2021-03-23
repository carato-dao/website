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
    require_once('../../classes/class.pclzip.php');	
	$crypted = returnDBObject("SELECT * FROM crypted_configs WHERE code=?",array('session_code')); 
	$session_code=decryptText($crypted['value']);
	define('session_code',$session_code);
	$permissionsErrors='';
	include('../../inc/validate.user.php');
	include('../../inc/permission.routing.php');
	
	if(isset($_POST)){
		echo '<pre>';
			$bakName=date('dmYHis');
			$archive = new PclZip('bak/'.$bakName.'.zip');
			
			foreach($_POST['fileToChange'] as $file){
				$archive->add('../../../bmt/'.$file,
	                          PCLZIP_OPT_REMOVE_PATH, 'bmt');
			}
			
			echo 'Created backup file on /bmt/scripts/updates/bak/'.$bakName.'.zip<br>';
			
			foreach($_POST['fileToChange'] as $file){
				if(is_file('update/bmt/'.$file)){
					if (!copy('update/bmt/'.$file, '../../../bmt/'.$file)) {
					    echo 'Failed to copy '.$file.'<br>';
					}else{
						echo $file.' successfully copied.<br>';
					}
				}else{
					echo $file.' is not a file!<br>';
				}
			}
			deleteDir('update');
			echo 'Successfully removed "update" folder.';
			$myfile = fopen("../../../.version", "w");
			$txt = '
				[
					{
						"version": "'.$_POST['version'].'",
						"author": "ZBD - Zeichen Business Development",
						"date": "'.date('Y-m-d').'"
					}
				]
			';
			fwrite($myfile, $txt);
			fclose($myfile);
			unlink('update.zip');
		echo '</pre>';
	}	
?>