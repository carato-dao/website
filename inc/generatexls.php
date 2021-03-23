<?php
	session_start();
	if(isset($_POST['filename'])){
		$_SESSION['requestedDownloadName']=date('d_m_y').'_'.$_POST['filename'];
		$_SESSION['requestDonwloadURI']=$_POST['data'];
	}else{
		include('../bmt/inc/core.php');
		$base64strImg=$_SESSION['requestDonwloadURI']; 
	 	header('Content-Disposition: attachment;filename="'.$_SESSION['requestedDownloadName'].'"');
	 	header('Content-Type: application/force-download; charset=utf-8'); 
		echo cleanText(str_replace('€','&euro;',base64_decode($base64strImg)));
	}
?>