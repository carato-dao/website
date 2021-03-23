<?php
	session_start();
	include('../../inc/core.php');
	$mode=returnConnectivityStat();
    require_once('../../inc/connect_'.$mode.'.php');	
	
	$crypted = returnDBObject("SELECT * FROM crypted_configs WHERE code=?",array('session_code')); 
	$session_code=decryptText($crypted['value']);
	define('session_code',$session_code);
	include('../../inc/validate.user.php');
	
	if(isset($_POST['filename'])){
		$backup=file_get_contents('../../inc/db_backup/'.$_POST['filename']);
		echo $backup;
	}
?>