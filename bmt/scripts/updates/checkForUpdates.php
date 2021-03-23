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
    require_once('../../classes/class.curl.php');	
	$crypted = returnDBObject("SELECT * FROM crypted_configs WHERE code=?",array('session_code')); 
	$session_code=decryptText($crypted['value']);
	define('session_code',$session_code);
	$permissionsErrors='';
	include('../../inc/validate.user.php');
	include('../../inc/permission.routing.php');
	
	use \Curl\Curl;
	$gitUser='coodeit';
	$gitPassword='macbook81';
	
	$curl = new Curl();
	$curl->setBasicAuthentication($gitUser, $gitPassword);
	$curl->get('https://api.github.com/repos/coodeit/BasementCMS/releases/latest');
	
	$actualVersion=json_decode(file_get_contents('../../../.version'),1);	
	
	if ($curl->error) {
	    echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage;
	} else { 
	   $version=$curl->response->tag_name;
	   if($version!=$actualVersion[0]['version']){
		   $versionArray=explode('.',$version);
		   $actualVersionArray=explode('.',$actualVersion[0]['version']);
		   $update='no';
		   
		   if($actualVersionArray[0]<=$versionArray[0]){
		   	   $update='yes';
		   }else{
			   $update='no';
		   }  
		   if($actualVersionArray[1]<=$versionArray[1] && $update=='no'){
		   	 $update='no';
		   }else{
			 $update='yes';
		   } 
		   if($actualVersionArray[2]<=$versionArray[2] && $update=='no'){
		   	  $update='no';
		   }else{
			  $update='yes';
		   }   
		   
		   if($update=='yes'){
			  echo 'Your version is different.<br>You can make an upgrade from '.$actualVersion[0]['version'].'->'.$version.'<br>';
			  $release=$curl->response;
			  $curl = new Curl();
			  $curl->setBasicAuthentication($gitUser, $gitPassword);
			  $curl->get('https://github.com/coodeit/BasementCMS/archive/'.$release->tag_name.'.zip');	   
			  if ($curl->error) {
			  	echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage;
			  }else{
				$xml = simplexml_load_string($curl->response);
			    $list = $xml->xpath("//@href");
			
			    $preparedUrls = array();
			    foreach($list as $item) {
			        $item = parse_url($item);
			        $downloadURL = $item['scheme'] . '://' .  $item['host'] . '/coodeit/BasementCMS/zip/'.$version.'?' .$item['query'];
			    }
			    $curl = new Curl();
			    $curl->setBasicAuthentication($gitUser, $gitPassword);
			    $curl->setHeader('Content-Type', 'application/octet-stream');
			    $curl->get($downloadURL);
				
				$fp = fopen('update.zip', 'w');
				fwrite($fp, $curl->response);
				
				echo '<br>New version has been downloaded correctly.<br><br>
				<a href="javascript:runBasementUpdate(\''.$version.'\');">Click here to run the update</a>.';
			  }			  
			}else{
				echo '<br>You have an higher version.'; 	
			}	
	   }else{
		   echo '<br>No update is required.';
	   }
	}
	
?>