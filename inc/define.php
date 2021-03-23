<?php
	$crypted = returnDBObject("SELECT * FROM crypted_configs WHERE code=?",array('session_code')); 
	$session_code=decryptText($crypted['value']);
	define('session_code',$session_code);
?>