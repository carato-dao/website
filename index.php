<?php 
	error_reporting(E_ALL); ini_set('display_errors', 'On'); 
	if(!isset($_SESSION)){
		ini_set('session.cookie_httponly', 1);
		ini_set('session.use_only_cookies', 1);
		ini_set('session.cookie_secure', 1);
		session_start();
		session_regenerate_id();
	}
	header("strict-transport-security: max-age=10");
	require_once 'inc/purify/HTMLPurifier.auto.php';
	
	$actual_link = "http://$_SERVER[HTTP_HOST]";
	$full_link = $_SERVER['REQUEST_URI'];
	preg_match('#%3Cscript(.*?)%3E(.*?)%3C/script%3E#is',$full_link, $matches, PREG_OFFSET_CAPTURE);
	
	if(count($matches)>0){
		die();
	}
	if (strpos($full_link, 'script') !== false) {
		die();
	}
	
	$config = HTMLPurifier_Config::createDefault();
	$purifier = new HTMLPurifier($config);
	include('inc/initialize.php'); 
	
	$purified=$purifier->purify($_SERVER['REQUEST_URI']); 
	if($purified!=$_SERVER['REQUEST_URI']){
		die();
	}

	$page = returnDBObject("SELECT * FROM pages WHERE permalink=? AND language=?",array($route,$language)); 

	if(isset($_SESSION['success_message']) && $_SESSION['success_message']!=''){
		$successToShow=$_SESSION['success_message'];
		$_SESSION['success_message']='';
	}
	
	if(isset($_SESSION['error_message']) && $_SESSION['error_message']!=''){
		$errorToShow=$_SESSION['error_message'];
		$_SESSION['error_message']='';
	}
	
	if(isset($page['id'])){
		include('pages/'.$page['ref_page']);
	}else{
		$page = returnDBObject("SELECT * FROM pages WHERE permalink=? AND language=?",array($route,$selected_languages[0])); 
		include('pages/'.$page['ref_page']);
	}
?>