<?php
	error_reporting(E_ALL); ini_set('display_errors', 'On'); 
	
	include('bmt/inc/core.php');   
	
	$mode=returnConnectivityStat();
    require_once('bmt/inc/connect.php');
	foreach(scandir('bmt/classes/') as $file) {
		if($file!='.' && $file!='..' && $file!='.DS_Store'){
			if(strpos('class.', $file)!==-1){
				include('bmt/classes/'.$file);
			}
		}
	}
    include('bmt/inc/configurations.php');
	include('inc/mobiledetect.php');
	include('inc/define.php');
	include_once('bmt/scripts/locales/language_detection.php'); 
	include('inc/language_definition.php');
	include('inc/locales.php');
	include('inc/routing.php');
?>