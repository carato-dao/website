<?php 
	include('initialize.php');
	include('core.php');
	include('validate.user.php');  
	
	mysql_select_db($database_connect, $connect);
	$query_rs_single = "SELECT * FROM locales WHERE id='".$_POST['del_id']."'";
	$rs_single = mysql_query($query_rs_single, $connect) or die(mysql_error());
	$row_rs_single = mysql_fetch_assoc($rs_single);
	$totalRows_rs_single = mysql_num_rows($rs_single); 
	
	mysql_select_db($database_connect, $connect);
	$query_rs_toDel = "SELECT * FROM locales WHERE globale='".$row_rs_single['globale']."'";
	$rs_toDel = mysql_query($query_rs_toDel, $connect) or die(mysql_error());
	$row_rs_toDel = mysql_fetch_assoc($rs_toDel);
	$totalRows_rs_toDel = mysql_num_rows($rs_toDel);
	do{
		$deleteSQL = sprintf("DELETE FROM locales WHERE id=%s",
                       GetSQLValueString($row_rs_toDel['id'], "int"));

                       mysql_select_db($database_connect, $connect);
                       $Result1 = mysql_query($deleteSQL, $connect) or die(mysql_error());
	}while($row_rs_toDel = mysql_fetch_assoc($rs_toDel));
?>