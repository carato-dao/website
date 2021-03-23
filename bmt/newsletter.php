<?php 	
	include('inc/initialize.php');
	
	mysql_select_db($database_connect, $connect);
	$query_rs_vis_n = "SELECT * FROM newsletter_sent ORDER BY id DESC";
	$rs_vis_n = mysql_query($query_rs_vis_n, $connect) or die(mysql_error());
	$row_rs_vis_n = mysql_fetch_assoc($rs_vis_n);
	$totalRows_rs_vis_n = mysql_num_rows($rs_vis_n); 
	
	mysql_select_db($database_connect, $connect);
	$query_rs_vis_u = "SELECT * FROM newsletter_users ORDER BY id DESC";
	$rs_vis_u = mysql_query($query_rs_vis_u, $connect) or die(mysql_error());
	$row_rs_vis_u = mysql_fetch_assoc($rs_vis_u);
	$totalRows_rs_vis_u = mysql_num_rows($rs_vis_u);
	
	mysql_select_db($database_connect, $connect);
	$query_rs_lists = "SELECT * FROM newsletter_users ORDER BY id DESC";
	$rs_lists = mysql_query($query_rs_lists, $connect) or die(mysql_error());
	$row_rs_lists = mysql_fetch_assoc($rs_lists);
	$totalRows_rs_lists = mysql_num_rows($rs_lists);
	
	 $lists=Array();
		do{ $user_list=explode(',',strtolower($row_rs_lists['liste']));
			foreach($user_list as $list){
				if(!in_array(strtolower($list), $lists)){
					array_push($lists, strtolower($list));
				}
				}
		}while($row_rs_lists = mysql_fetch_assoc($rs_lists));
		
if(isset($_GET['id'])){
	if($_GET['page']=='mod_u'){
		$currentTable='newsletter_users';
	}elseif(($_GET['page']=='send_n')||($_GET['page']=='mod_n')){
		$currentTable='newsletter_sent';
	}elseif($_GET['page']=='tracking'){
		$currentTable='newsletter_tracking';
	}
	
	mysql_select_db($database_connect, $connect);
	if($_GET['page']=='tracking'){
		$query_rs_single = "SELECT * FROM ".$currentTable." WHERE campaign='".$_GET['id']."'";
	}else{
		$query_rs_single = "SELECT * FROM ".$currentTable." WHERE id='".$_GET['id']."'";
	}
	$rs_single = mysql_query($query_rs_single, $connect) or die(mysql_error());
	$row_rs_single = mysql_fetch_assoc($rs_single);
	$totalRows_rs_single = mysql_num_rows($rs_single); 
	
	if($row_rs_single['id']!=''){
		extract($row_rs_single);
	}
}
if (isset($_POST["MM_save"])) {

  if(isset($_POST['liste'])){
  	$liste=implode(',',$_POST['liste']);
  }else{
	  $liste='';
  }
  if($_FILES['allegato']['name']!=''){
     $target='../contents/file_newsletter/';
	 $filename=str_replace(' ','',trim(basename($_FILES['allegato']['name'])));
	 $target = $target.$filename;
	 move_uploaded_file($_FILES['allegato']['tmp_name'], $target);
	 	
	}else{
		$filename='';	
	}
  $insertSQL = sprintf("INSERT INTO newsletter_sent (data, corpo, oggetto, allegato, utenti, campagna) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['data'], "date"),
                       GetSQLValueString(cleanText($_POST['corpo']), "text"),
                       GetSQLValueString($_POST['oggetto'], "text"),
                       GetSQLValueString($filename, "text"),
                       GetSQLValueString($liste, "text"),
                       GetSQLValueString($_POST['campagna'], "text"));
 
  
  mysql_select_db($database_connect, $connect);
  $Result1 = mysql_query($insertSQL, $connect);

?>
			<script type="text/javascript">
        		window.location = "<?php echo $subdomain."/bmt/".$route.$_POST['MM_save']; ?>";
        	</script> 
<?php 

}
if (isset($_POST["MM_update_newsletter"])) {

  if(isset($_POST['liste'])){
  	$liste=implode(',',$_POST['liste']);
  }else{
	  $liste='';
  }
  if($_FILES['allegato']['name']!=''){
     $target='../contents/file_newsletter/';
	 $filename=str_replace(' ','',trim(basename($_FILES['allegato']['name'])));
	 $target = $target.$filename;
	 move_uploaded_file($_FILES['allegato']['tmp_name'], $target);
	 	
	}else{
		$filename='';	
	}
  $insertSQL = sprintf("UPDATE newsletter_sent SET data=%s, corpo=%s, oggetto=%s, allegato=%s, utenti=%s, campagna=%s WHERE id=%s",
                       GetSQLValueString($_POST['data'], "date"),
                       GetSQLValueString(cleanText($_POST['corpo']), "text"),
                       GetSQLValueString($_POST['oggetto'], "text"),
                       GetSQLValueString($filename, "text"),
                       GetSQLValueString($liste, "text"),
                       GetSQLValueString($_POST['campagna'], "text"),
                       GetSQLValueString($_POST['id'], "int"));
 
  
  mysql_select_db($database_connect, $connect);
  $Result1 = mysql_query($insertSQL, $connect);
  
  if($_POST['MM_update_newsletter']!='sendCampaign'){

?>
			<script type="text/javascript">
        		window.location = "<?php echo $subdomain."/bmt/".$route.$_POST['MM_update_newsletter']; ?>";
        	</script> 
<?php 
}else{
?>
			<script type="text/javascript">
        		window.location = "<?php echo $subdomain."/bmt/".$route.'/send-newsletter/'.$_POST['id']; ?>";
        	</script> 
<?php 
}
}
if (isset($_POST["MM_send"])) {

 $liste=implode(',',$_POST['liste']);
  
  if($_FILES['allegato']['name']!=''){
     $target='../contents/file_newsletter/';
	 $filename=str_replace(' ','',trim(basename($_FILES['allegato']['name'])));
	 $target = $target.$filename;
	 move_uploaded_file($_FILES['allegato']['tmp_name'], $target);
	 	
	}else{
		$filename='';	
	}

  
  $insertSQL = sprintf("INSERT INTO newsletter_sent (data, corpo, oggetto, allegato, utenti, campagna) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['data'], "date"),
                       GetSQLValueString(cleanText($_POST['corpo']), "text"),
                       GetSQLValueString($_POST['oggetto'], "text"),
                       GetSQLValueString($filename, "text"),
                       GetSQLValueString($liste, "text"),
                       GetSQLValueString($_POST['campagna'], "text"));
 
  
  mysql_select_db($database_connect, $connect);
  $Result1 = mysql_query($insertSQL, $connect);
  
    mysql_select_db($database_connect, $connect);
	$query_rs_single = "SELECT * FROM newsletter_sent ORDER BY id DESC";
	$rs_single = mysql_query($query_rs_single, $connect) or die(mysql_error());
	$row_rs_single = mysql_fetch_assoc($rs_single);
	$totalRows_rs_single = mysql_num_rows($rs_single); 
	

?>
			<script type="text/javascript">
        		window.location = "<?php echo $subdomain."/bmt/".$route.'/send-newsletter/'.$row_rs_single['id']; ?>";
        	</script> 
<?php 

}

if(isset($_POST['sendCampaign'])){
	
		mysql_select_db($database_connect, $connect);
		$query_rs_single = "SELECT * FROM newsletter_sent WHERE id='".$_POST['sendCampaign']."'";
		$rs_single = mysql_query($query_rs_single, $connect) or die(mysql_error());
		$row_rs_single = mysql_fetch_assoc($rs_single);
		$totalRows_rs_single = mysql_num_rows($rs_single); 
		
		mysql_select_db($database_connect, $connect);
		$query_rs_user = "SELECT * FROM newsletter_users WHERE id='".$_POST['id_user']."'";
		$rs_user = mysql_query($query_rs_user, $connect) or die(mysql_error());
		$row_rs_user = mysql_fetch_assoc($rs_user);
		$totalRows_rs_user = mysql_num_rows($rs_user); 

		include('scripts/phpmailer/class.phpmailer.php');
		include('inc/convertcss.php');
		//$testo=$_POST['testo'];
		$template=file_get_contents('inc/newsletter_template.php');
		$html=str_replace('<!!!---CORPO---!!!>',$row_rs_single['corpo'],str_replace('<!!!---TITOLO---!!!>',$row_rs_single['oggetto'],str_replace('<!!!---SITEURL--!!!>',$siteurl,$template)));
		$subject=$row_rs_single['oggetto'];
		
		$cssToInlineStyles = new CssToInlineStyles();
		
		$css = file_get_contents('css/mail-theme.css');
		$cssToInlineStyles->setHTML(utf8_decode($html));
		$cssToInlineStyles->setCSS($css);
		
		$testo= $cssToInlineStyles->convert();

	 	$mail= new PHPMailer();	 
		$mail->CharSet="ISO-8859-1";
		
		$testo.='<img src="'.$siteurl.'/newsletter-tracking/'.$row_rs_user['email'].'/'.$row_rs_single['id'].'">';
				
		$mail->SetFrom($newsletter_mail, $newsletter_from);
		$mail->AddAddress($row_rs_user['email'],$row_rs_user['nome'].' '.$row_rs_user['cognome']);
		if($row_rs_single['allegato']!=''){
			$mail->AddAttachment('../contents/file_newsletter/'.$row_rs_single['allegato']);
		}
		$mail->Subject = $subject;
		$mail->IsHtml(true);
		$mail->Body =$testo;
		$mail->AltBody =strip_tags(str_replace('<br>','\n', $testo));
		
		if($mail->Send()){
			die('sent');
		}
}
if (isset($_POST["MM_insert"])) {

  if( ($_POST['new_list']!='') && ($_POST['liste']!='') ){
  	$liste=implode(',',$_POST['liste']);
  	$liste.=','.$_POST['new_list'];
  
  }elseif($_POST['new_list']==''){
  	$liste=implode(',',$_POST['liste']);
  }else{
	  $liste=$_POST['new_list'];
  }
  
  $insertSQL = sprintf("INSERT INTO newsletter_users (nome, cognome, email, liste, verificato) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['cognome'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($liste, "text"),
                       GetSQLValueString($_POST['verificato'], "int"));

  mysql_select_db($database_connect, $connect);
  $Result1 = mysql_query($insertSQL, $connect) or die(mysql_error());


  ?>
			<script type="text/javascript">
        		window.location = "<?php echo $subdomain."/bmt/".$route.$_POST['MM_insert']; ?>";
        	</script> 
<?php 
}

if (isset($_POST["MM_update"])) {

  if( ($_POST['new_list']!='') && ($_POST['liste']!='') ){
  	$liste=implode(',',$_POST['liste']);
  	$liste.=','.$_POST['new_list'];
  
  }elseif($_POST['new_list']==''){
  	$liste=implode(',',$_POST['liste']);
  }else{
	  $liste=$_POST['new_list'];
  }
  
  $insertSQL = sprintf("UPDATE newsletter_users SET nome=%s, cognome=%s, email=%s, liste=%s, verificato=%s WHERE id=%s",
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['cognome'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($liste, "text"),
                       GetSQLValueString($_POST['verificato'], "int"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_connect, $connect);
  $Result1 = mysql_query($insertSQL, $connect) or die(mysql_error());

  ?>
			<script type="text/javascript">
        		window.location = "<?php echo $subdomain."/bmt/".$route.$_POST['MM_update']; ?>";
        	</script> 
<?php 
}

?>
<!DOCTYPE HTML>
<html lang="it">
<?php include('inc/header.php'); ?>
<body>
<style>
.mod-tile{background:#ccc;}
<?php if((isset($_GET['page']))&&($_GET['page']!='send_n')){ ?>
/*NEWSLETTER*/
.mail-col{background: #f6f6f6!important; min-height:150px; border:1px solid #ccc!important; color:#000!important; position: relative;}
.mail-col i{color:#000; display:block!important;}
.mod-tile{position:relative}
.wrap-image{position: relative;}
.wrap-image:hover .remove-big-image{display:block; cursor:pointer;}
.remove-big-image{position:absolute; display:none; top:0px; left:0; width:100%; height:100%; background:rgba(0,0,0,0.85); }
.remove-image-icon{font-size:50px; width:50px; height:50px; position:absolute; color:#fff!important; top:50%; left:50%; margin-top:-25px; margin-left:-25px;}
.text-control i{color:#fff!important;}
.mail-tile{ min-height:150px!important; margin:10px; }
.mail-col{background: #fff; min-height:150px!important; border:none; color:#000!important; position: relative;}
<?php } ?>
</style>
<?php include('inc/top_menu.php'); ?>
<div class="row">
	<div class="col-xs-12">
		<div class="pad20">
		<div class="row">
				<div class="col-xs-12">
			<?php  if(!isset($_GET['page'])){
			
				$currentTable='newsletter_sent'; ?>
				<div class="primary-head">
								<h1 class="page-header">Newsletter</h1>
								<ul class="top-right-toolbar">
								<a  href="<?php echo $subdomain; ?>/bmt/<?php echo $route; ?>/new" class="green" ><li data-placement="bottom" data-toggle="tooltip" data-title="Nuova newsletter"><i class="fa fa-envelope"></i></li></a>											
									<a href="<?php echo $subdomain; ?>/bmt/<?php echo $route; ?>/utenti" class="bondi-blue" ><li data-placement="bottom" data-toggle="tooltip" data-title="Utenti"><i class="fa fa-group"></i></li></a>
								
								</ul>
							</div>
						</div>
					</div>		
					<table cellpadding="0" cellspacing="0" border="0" class="responsive table table-striped table-bordered dataTable" id="dataTable">
					<thead>
						<tr>
							<th>Data</th>
							<th>Oggetto</th>
							<th>Corpo</th>
							<th>Allegato</th>
							<th>Utenti</th>
							<th>Azioni</th>
						</tr>
					</thead>
					<tbody class="rowElements">
					  <?php  if($row_rs_vis_n['id']!=''){
					  do{ extract($row_rs_vis_n); ?>
						    <tr id="<?php echo $id; ?>">
							<td><?php $data_it=explode(' ',$data); echo data_it($data_it[0]); ?></td>
							<td><?php echo $oggetto; ?></td>
							<td><?php echo strip_tags($corpo); ?></td>
							<td><?php echo $allegato; ?></td>
							<td><?php echo $utenti; ?></td>
							<td class="center">
										<div class="btn-toolbar row-action">
							                <div class="btn-group">
							                 <a class="btn btn-info" href="<?php echo $subdomain; ?>/bmt/<?php echo $route; ?>/tracking/<?php echo $id; ?>"><i class="fa fa-bar-chart"></i></a>

							                 <a class="btn btn-info" href="<?php echo $subdomain; ?>/bmt/<?php echo $route; ?>/<?php echo $id; ?>/mod"><i class="fa fa-edit"></i></a>
							                  <a class="btn btn-danger"  href="javascript:deleteElement(<?php echo $id; ?>,'<?php echo $currentTable; ?>');"><i class="fa fa-remove"></i></a>
							                </div>
							            </div>
						            </td>
						</tr>
					<?php }while($row_rs_vis_n = mysql_fetch_assoc($rs_vis_n)); } ?>
				</tbody>
				</table>

					
			<?php }else{ 
			switch ($_GET['page']){ 
				case "vis_u":
				$currentTable='newsletter_users';
			?>
			<div class="primary-head">
								<h1 class="page-header">Utenti</h1>
								<ul class="top-right-toolbar">
								<a href="<?php echo $subdomain; ?>/bmt/<?php echo $route; ?>" class="blue" ><li data-placement="bottom" data-toggle="tooltip" data-title="Indietro"><i class="fa fa-chevron-left"></i></li></a>			
								<a href="<?php echo $subdomain; ?>/bmt/<?php echo $route; ?>/inserisci-utente" class="bondi-blue" ><li data-placement="bottom" data-toggle="tooltip" data-title="Inserisci utente"><i class="fa fa-plus"></i></li></a>
									
								
								</ul>
							</div>
						</div>
					</div>	
					<table cellpadding="0" cellspacing="0" border="0" class="responsive table table-striped table-bordered dataTable" id="dataTable">
					<thead>
						<tr>
							<th>Liste</th>
							<th>Nome</th>
							<th>Cognome</th>
							<th>E-Mail</th>
							<th width="30px">Verificato</th>
							<th>Azioni</th>
						</tr>
					</thead>
					<tbody class="rowElements">
					  <?php  if($row_rs_vis_u['id']!=''){
					  do{ extract($row_rs_vis_u); ?>
						    <tr id="<?php echo $id; ?>">
							<td><?php echo $liste; ?></td>
							<td><?php echo $nome; ?></td>
							<td><?php echo $cognome; ?></td>
							<td><?php echo $email; ?></td>
							<td><?php if($verificato==1){echo 'SI';}else{echo 'NO';} ?></td>
							<td class="center">
										<div class="btn-toolbar row-action">
							                <div class="btn-group">
							               							                 <a class="btn btn-info" href="<?php echo $subdomain; ?>/bmt/<?php echo $route; ?>/utenti/<?php echo $id; ?>/mod"><i class="fa fa-edit"></i></a>
							                  <a class="btn btn-danger"  href="javascript:deleteElement(<?php echo $id; ?>,'<?php echo $currentTable; ?>');"><i class="fa fa-remove"></i></a>
							                </div>
							            </div>
						            </td>
						</tr>
					<?php }while($row_rs_vis_u = mysql_fetch_assoc($rs_vis_u)); } ?>
				</tbody>
				</table>
			<?php break;
			
			case "ins_u": ?>
			
			<div class="primary-head">
								<h3 class="page-header">Utenti > Inserisci</h3>
										<ul class="top-right-toolbar">
						<a href="<?php echo $subdomain; ?>/bmt/<?php echo $route; ?>/utenti" class="blue" ><li data-placement="bottom" data-toggle="tooltip" data-title="Indietro"><i class="fa fa-chevron-left"></i></li></a>
						<a href="javascript:void(0);" onClick="validateAndSubmit('/utenti')"  id="inserisciButton" class="green" ><li data-placement="bottom" data-toggle="tooltip" data-title="Salva"><i class="fa fa-save"></i></li></a>
						<a href="javascript:void(0);"  onClick="validateAndSubmit('/inserisci-utente')" class="green" ><li data-placement="bottom" data-toggle="tooltip" data-title="Salva e inserisci ancora"><i class="fa fa-plus"></i></li></a>
							
						</ul>
						</div>
						</div>
					</div>
					
					<form class="form-horizontal" method="post" id="Form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
							    
							    <div class="control-group">
									<label class="control-label">Nome</label>
									<div class="controls">
										<input type="text" name="nome" class="col-xs-12">
									</div>
								</div>
								 <div class="control-group">
									<label class="control-label">Cognome</label>
									<div class="controls">
										<input type="text" name="cognome" class="col-xs-12">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">E-Mail</label>
									<div class="controls">
										<input type="email" name="email" class="col-xs-12">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Liste</label>
									<div class="controls">
										<select multiple="multiple" id="liste" name="liste[]">
									      <?php foreach($lists as $print_list){ ?>
										      <option value='<?php echo $print_list; ?>'><?php echo strtoupper($print_list); ?></option> 
									     <?php } ?>
									    </select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">inserisci nuove liste<br>
										<span style="font-size:10px">(separate da una virgola)</span>
									</label>
									<div class="controls">
										<input id="tagsinput" class="tagsinput" type="text" name="new_list" placeholder="">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Verificato</label>
									<div class="controls">
										<select class="select-block" name="verificato">
											<option value="1" selected>Si</option>
											<option value="0">No</option>
										</select>
									</div>
								</div>
								
								<input type="hidden" id="locationInput" name="MM_insert" value="">
						</form>
		<?php break; 
		case "ins_n": ?>
			
			<div class="primary-head">
								<h3 class="page-header">Newsletter > Crea campagna</h3>
										<ul class="top-right-toolbar">
						<a href="<?php echo $subdomain; ?>/bmt/<?php echo $route; ?>" class="blue" ><li data-placement="bottom" data-toggle="tooltip" data-title="Indietro"><i class="fa fa-chevron-left"></i></li></a>
						<a href="javascript:void(0);" onClick="validateAndSave('')"  id="inserisciButton" class="green" ><li data-placement="bottom" data-toggle="tooltip" data-title="Salva"><i class="fa fa-save"></i></li></a>
						<a href="javascript:void(0);"  onClick="validateAndSend('')" class="green" ><li data-placement="bottom" data-toggle="tooltip" data-title="Salva e invia newsletter"><i class="fa fa-rocket"></i></li></a>
							
						</ul>
						</div>
						</div>
					</div>
					
					<form class="form-horizontal" method="post" id="Form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
					   
							    <div class="control-group">
									<label class="control-label">Nome campagna</label>
									<div class="controls">
										<input type="text" name="campagna" class="col-xs-12">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Data</label>
									<div class="controls">
										<input type="date" value="<?php echo date('Y-m-d'); ?>" name="data" class="col-xs-12">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Oggetto</label>
									<div class="controls">
										<input type="text" name="oggetto" class="col-xs-12">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Allegato</label>
									<div class="controls">
										<input type="file" name="allegato" class="col-xs-12">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Liste</label>
									<div class="controls">
										<select multiple="multiple" id="liste" name="liste[]">
									      <?php foreach($lists as $print_list){ ?>
										      <option value='<?php echo $print_list; ?>'><?php echo strtoupper($print_list); ?></option> 
									     <?php } ?>
									    </select>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label">Corpo</label>
									<div class="controls">
										<textarea name="corpo"></textarea>
										
									</div></div>
								
					<input type="hidden" id="locationInput" name="MM_save" value="">
				</form>
		<?php break;
		case "mod_n": 
		$newsletter_list_mod=explode(',',$row_rs_single['utenti']);?>
			
			<div class="primary-head">
								<h3 class="page-header">Newsletter > Modifica campagna</h3>
										<ul class="top-right-toolbar">
						<a href="<?php echo $subdomain; ?>/bmt/<?php echo $route; ?>" class="blue" ><li data-placement="bottom" data-toggle="tooltip" data-title="Indietro"><i class="fa fa-chevron-left"></i></li></a>
						<a href="javascript:void(0);" onClick="validateAndSave('')"  id="inserisciButton" class="green" ><li data-placement="bottom" data-toggle="tooltip" data-title="Salva"><i class="fa fa-save"></i></li></a>
						<a href="javascript:void(0);"  onClick="updateAndSend('')" class="green" ><li data-placement="bottom" data-toggle="tooltip" data-title="Salva e invia newsletter"><i class="fa fa-rocket"></i></li></a>
							
						</ul>
						</div>
						</div>
					</div>
					
					<form class="form-horizontal" method="post" id="Form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
					   
							    <div class="control-group">
									<label class="control-label">Nome campagna</label>
									<div class="controls">
										<input type="text" name="campagna" value="<?php echo  $row_rs_single['campagna']; ?>" class="col-xs-12">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Data</label>
									<div class="controls">
										<input type="date" value="<?php $data=explode(' ',$row_rs_single['data']); echo $data[0]; ?>" name="data" class="col-xs-12">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Oggetto</label>
									<div class="controls">
										<input type="text" name="oggetto" value="<?php echo $row_rs_single['oggetto']; ?>" class="col-xs-12">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Allegato</label>
									<div class="controls">
										<?php if($row_rs_single['allegato']!=''){echo 'Allegato: '.$row_rs_single['allegato']; } ?>
										<input type="file" name="allegato" class="col-xs-12">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Liste</label>
									<div class="controls">
										<select multiple="multiple" id="liste" name="liste[]">
									      <?php foreach($lists as $print_list){ ?>
										      <option <?php if(in_array($print_list,$newsletter_list_mod)){echo 'selected'; } ?> value='<?php echo $print_list; ?>'><?php echo strtoupper($print_list); ?></option> 
									     <?php } ?>
									    </select>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label">Design</label>
									<div class="controls">
											<textarea name="corpo"><?php echo $row_rs_single['corpo']; ?></textarea>
									</div></div>
								<input type="hidden" name="id" value="<?php echo $row_rs_single['id']; ?>">
					<input type="hidden" id="locationInput" name="MM_update_newsletter" value="">
				</form>
		<?php break;
		case "send_n":?>
		
		<div class="primary-head">
								<h3 class="page-header">Newsletter > Invia campagna</h3>
										<ul class="top-right-toolbar">
						<a href="<?php echo $subdomain; ?>/bmt/<?php echo $route.'/'.$_GET['id'].'/mod'; ?>" class="blue" ><li data-placement="bottom" data-toggle="tooltip" data-title="Indietro"><i class="fa fa-chevron-left"></i></li></a>
							
						</ul>
						</div>
						</div>
					</div>
		<div class="row">
		<div class="col-xs-8">
			<h4>Preview</h4>
			
			<?php 	
				include('inc/convertcss.php');
				$template=file_get_contents('inc/newsletter_template.php');
				
				$html=str_replace('<!!!---CORPO---!!!>',$row_rs_single['corpo'],str_replace('<!!!---TITOLO---!!!>',$row_rs_single['oggetto'],str_replace('<!!!---SITEURL--!!!>',$siteurl,$template)));
					
				$cssToInlineStyles = new CssToInlineStyles();
				
				$css = file_get_contents('css/mail-theme.css');
				$cssToInlineStyles->setHTML(utf8_decode($html));
				$cssToInlineStyles->setCSS($css);
		
				$testo= $cssToInlineStyles->convert();
					
				?>
				<div id="wrap-tiles"><?php echo $testo; ?></div>	
		</div>
		<div class="col-sm-4">
			<h4>Liste</h4>
			<script>
				var sendToUsers = new Array();
			</script>
			<?php echo $row_rs_single['utenti']; 
				$liste=explode(',',$row_rs_single['utenti']);
				$usersN=0;
				do{
				$utente=0;
				 $user_list=explode(',',$row_rs_vis_u['liste']);
				 foreach($liste as $lista){
					 if(in_array($lista, $user_list)){
					 	$utente=1;
					 }
				 }
				 if($utente==1){ 
					 $usersN++;
				 ?>
					 <script>sendToUsers.push("<?php echo $row_rs_vis_u['id']; ?>");</script>
					 <?php 
				 }
				 
				 }while($row_rs_vis_u = mysql_fetch_assoc($rs_vis_u));
				 
				 echo '<hr><h4>Totale utenti: '.$usersN.'</h4>';
			?>
			<hr>
			<a href="javascript:void(0);" onClick="confirmSendCampaign(<?php echo $row_rs_single['id']; ?>)" class="btn btn-large btn-block btn-success">Invia campagna</a>
			<hr>
			Inviate: <span id="resultSent"></span>
		</div>
		</div>
		
	<?php break;
		case "mod_u": 
		
		$user_list_mod=explode(',',$liste);?>
			
			<div class="primary-head">
								<h3 class="page-header">Utenti > Modifica</h3>
										<ul class="top-right-toolbar">
						<a href="<?php echo $subdomain; ?>/bmt/<?php echo $route; ?>/utenti" class="blue" ><li data-placement="bottom" data-toggle="tooltip" data-title="Indietro"><i class="fa fa-chevron-left"></i></li></a>
						<a href="javascript:void(0);" onClick="validateAndSubmit('/utenti')"  id="inserisciButton" class="green" ><li data-placement="bottom" data-toggle="tooltip" data-title="Salva"><i class="fa fa-save"></i></li></a>
						<a href="javascript:void(0);"  onClick="validateAndSubmit('/inserisci-utente')" class="green" ><li data-placement="bottom" data-toggle="tooltip" data-title="Salva e inserisci ancora"><i class="fa fa-plus"></i></li></a>
							
						</ul>
						</div>
						</div>
					</div>
					
					<form class="form-horizontal" method="post" id="Form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
							    
							    <div class="control-group">
									<label class="control-label">Nome</label>
									<div class="controls">
										<input type="text" name="nome" value="<?php echo $nome; ?>" class="col-xs-12">
									</div>
								</div>
								 <div class="control-group">
									<label class="control-label">Cognome</label>
									<div class="controls">
										<input type="text" name="cognome" value="<?php echo $cognome; ?>" class="col-xs-12">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">E-Mail</label>
									<div class="controls">
										<input type="email" name="email"  value="<?php echo $email; ?>" class="col-xs-12">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Liste</label>
									<div class="controls">
										<select multiple="multiple" id="liste" name="liste[]">
									      <?php foreach($lists as $print_list){ ?>
										      <option <?php if(in_array($print_list,$user_list_mod)){echo 'selected'; } ?> value='<?php echo $print_list; ?>'><?php echo strtoupper($print_list); ?></option> 
									     <?php } ?>
									    </select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">inserisci nuove liste<br>
										<span style="font-size:10px">(separate da una virgola)</span>
									</label>
									<div class="controls">
										<input id="tagsinput" class="tagsinput" type="text" name="new_list" placeholder="">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Verificato</label>
									<div class="controls">
										<select class="select-block" name="verificato">
											<option value="1" <?php if($verificato==1){echo 'selected';} ?>>Si</option>
											<option value="0" <?php if($verificato==0){echo 'selected';} ?>>No</option>
										</select>
									</div>
								</div>
								
								<input type="hidden" id="locationInput" name="MM_update" value="">
								<input type="hidden" name="id" value="<?php echo $id; ?>">
						</form>
		<?php break;
		case "tracking":
		
		mysql_select_db($database_connect, $connect);
		$query_rs_vis_n = "SELECT * FROM newsletter_sent WHERE id='".$_GET['id']."'";
		$rs_vis_n = mysql_query($query_rs_vis_n, $connect) or die(mysql_error());
		$row_rs_vis_n = mysql_fetch_assoc($rs_vis_n);
		$totalRows_rs_vis_n = mysql_num_rows($rs_vis_n);
		
		$liste=explode(',',$row_rs_vis_n['utenti']);
				$usersN=0;
				do{
				$utente=0;
				 $user_list=explode(',',$row_rs_vis_u['liste']);
				 foreach($liste as $lista){
					 if(in_array($lista, $user_list)){
					 	$utente=1;
					 }
				 }
				 if($utente==1){ 
					 $usersN++;
				 ?>
					 <script>sendToUsers.push("<?php echo $row_rs_vis_u['id']; ?>");</script>
					 <?php 
				 }
				 
				 }while($row_rs_vis_u = mysql_fetch_assoc($rs_vis_u));
				 
		
	?>
	<style>#dataTable_info{display:none;} .table{margin-bottom:-15px;} </style>
		<div class="primary-head">
					<h3 class="page-header">Newsletter > Analytics</h3>
										<ul class="top-right-toolbar">
						<a href="<?php echo $subdomain; ?>/bmt/<?php echo $route; ?>" class="blue" ><li data-placement="bottom" data-toggle="tooltip" data-title="Indietro"><i class="fa fa-chevron-left"></i></li></a>
						
						</ul>
						</div>
						</div>
					</div>
					<?php 
					
				 
						do{
							$users[$row_rs_single['email']]['mail']=$row_rs_single['email'];
							if(!isset($users[$row_rs_single['email']]['ip'])){
								$users[$row_rs_single['email']]['ip']=Array($row_rs_single['ip']);
							}else{
								if(!in_array($row_rs_single['ip'], $users[$row_rs_single['email']]['ip'])){
									array_push($users[$row_rs_single['email']]['ip'], $row_rs_single['ip']);
								}
							}
							if(!isset($users[$row_rs_single['email']]['timestamp'])){
								$users[$row_rs_single['email']]['timestamp']=Array($row_rs_single['timestamp']);
							}else{
								if(!in_array($row_rs_single['timestamp'], $users[$row_rs_single['email']]['timestamp'])){
									array_push($users[$row_rs_single['email']]['timestamp'], $row_rs_single['timestamp']);
								}
							}
							if(!isset($users[$row_rs_single['email']]['browser'])){
								$users[$row_rs_single['email']]['browser']=Array($row_rs_single['browser']);
							}else{
								if(!in_array($row_rs_single['browser'], $users[$row_rs_single['email']]['browser'])){
									array_push($users[$row_rs_single['email']]['browser'], $row_rs_single['browser']);
								}
							}
						
							if(!isset($users[$row_rs_single['email']]['open'])){
								$users[$row_rs_single['email']]['open']=1;
							}else{
								$users[$row_rs_single['email']]['open']=$users[$row_rs_single['email']]['open']+1;
							}
						}while($row_rs_single = mysql_fetch_assoc($rs_single));
						
						
						?>
						<table cellpadding="0" style="font-size:11px;" cellspacing="0" border="0" class="responsive table table-striped table-bordered dataTable" id="dataTable">
					<thead>
						<tr>
							<th>Aperto</th>
							<th>E-Mail</th>
							<th>IP</th>
							<th>Timestamp</th>
							<th>Browser</th>
						</tr>
					</thead>
					<tbody class="rowElements">
					<?php
					$totaleAperte=0;
					 foreach ($users as $user){
					$totaleAperte++;  ?>
					<tr>
						<td>
							<?php echo count($user['timestamp']); ?>
						</td>
						<td>
							<?php echo $user['mail']; ?>
						</td>
						<td>
							<?php foreach($user['ip'] as $ip){echo '-'.$ip.'<br>';}?>
						</td>
						<td>
							<?php foreach($user['timestamp'] as $timestamp){echo '-'.$timestamp.'<br>';} ?>

						</td>
						<td>
							<?php foreach($user['browser'] as $browser){echo '-'.$browser.'<br>';} ?>
						</td>
					</tr>
					<?php } ?>
					
					</tbody>
				</table>
				<?php  echo '<hr><h4>Utenti coinvolti: '.$usersN.'</h4>'; ?>
				<?php  echo '<h4>Totale aperte dagli utenti: '.$usersN.'</h4>'; ?>
		<?php break; ?>
			<?php }} ?>
				</div></div>
		</div><!--content-->
	</div><!--span10-->
</div><!--row-fluid-->

<?php 
	include('inc/footer.php');
?>
<?php if((isset($_GET['page']))&&($_GET['page']=='send_n')){ ?>
<script>
$(document).ready(function(){
	cleanNewsletter();
});
</script>
<?php } ?>
<script>$('#liste').multiSelect();</script>
</body>
</html>