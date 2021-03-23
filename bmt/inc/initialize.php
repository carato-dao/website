<?php
	// error_reporting(E_ALL); ini_set('display_errors', 'On'); 
	if (!isset($_SESSION)) {
	  session_start();
	}
   	include('core.php');
   
   	$mode=returnConnectivityStat();
   	
    require_once('connect.php');	
	
	$crypted = returnDBObject("SELECT * FROM crypted_configs WHERE code=?",array('session_code')); 
	$session_code=decryptText($crypted['value']);
	define('session_code',$session_code);
	$permissionsErrors='';
	
	if(is_dir('classes/')){
		foreach(scandir('classes/') as $file) {
			if($file!='.' && $file!='..' && $file!='.DS_Store'){
				if(strpos('class.', $file)!==-1){
					include('classes/'.$file);
				}
			}
		}
	}
	
	if(isset($_SESSION['success_message'])){
		$success_notice=$_SESSION['success_message'];
		unset($_SESSION['success_message']);
	}
	if(isset($_SESSION['error_message'])){
		$error_notice=$_SESSION['error_message'];
		unset($_SESSION['error_message']);
	}
	
	$labels = [ 
		"creato" => "creato",
		"eliminato" => "eliminato",
		"modificato" => "modificato"
	];
	
	include('configurations.php');
	include('setpermissions.php');
	include('navigation.php');	
	include('validate.user.php');
	include('scripts/locales/define_user_language.php'); 
	include('write_htaccess.php');   
	include('write_sitemap.php');  
	include('write_rss.php'); 
	include('permission.routing.php');
	if($debug_mode=='on'){error_reporting(E_ALL); ini_set('display_errors', 'On'); }
	setlocale(LC_MONETARY, 'it_IT');	
	
?>