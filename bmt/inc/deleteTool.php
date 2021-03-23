<?php 
	include('initialize.php');
	include('core.php');
	include('validate.user.php');  
	
	$deleteSQL = sprintf("DELETE FROM ".$_POST['table']." WHERE id=%s",
                       GetSQLValueString($_POST['del_id'], "int"));

    mysql_select_db($database_connect, $connect);
    $Result1 = mysql_query($deleteSQL, $connect) or die(mysql_error());
?>