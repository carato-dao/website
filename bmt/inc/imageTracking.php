<?php
$name='../images/tracking.png';
$fp = fopen($name, 'rb');

header("Content-Type: image/png");
header("Content-Length: " . filesize($name));

fpassthru($fp);

	include('initialize.php');
	include('core.php');
$openEmail= $_GET['email'];
$campaign= $_GET['campaign'];
$ip=getUserIp();
$browser = $_SERVER["HTTP_USER_AGENT"];
	 
$insertSQL = sprintf("INSERT INTO newsletter_tracking (ip, email, browser, campaign) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($ip, "text"),
                       GetSQLValueString($openEmail, "text"),
                       GetSQLValueString($browser, "text"),
                       GetSQLValueString($campaign, "text"));

mysql_select_db($database_connect, $connect);
$Result1 = mysql_query($insertSQL, $connect) or die(mysql_error());
exit;
?>