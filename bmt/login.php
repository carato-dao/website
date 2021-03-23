<?php 
	
	include('inc/initialize.php');
	if (!isset($_SESSION)) {
	  session_start();
	}
	$host=$_SERVER['HTTP_HOST'];
	if(isset($_POST['login'])){	
		$loginFormAction = $_SERVER['PHP_SELF'];
		if (isset($_GET['accesscheck'])) {
		  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
		 }
	   $loginEmail=$_POST['username'];
	   $password=encryptText($_POST['password']);
	   $MM_redirectLoginSuccess = "/bmt";
	   $MM_redirectLoginFailed = "/bmt/login/errore";
	   
	   $row_rs_admin = returnDBObject("SELECT * FROM admins WHERE username=? AND password=?",array($loginEmail,$password));
		  
	   if($row_rs_admin['id']!=''){
		  	$loginFoundUser='yes';
		  	$userType=$row_rs_admin['level'];
	   }else{
			$loginFoundUser='no';
	   }
	   
	  if ($loginFoundUser=='yes') {
	    $_SESSION[$session_code]['Level'] = $userType;
	    $_SESSION[$session_code]['Username'] = $loginEmail;
	    $_SESSION[$session_code]['id'] = $row_rs_admin['id'];
	    
		$updateSQL = runDBQuery("UPDATE admins SET lastLogin=? WHERE id=?", [date('Y-m-d H:i:s'), $row_rs_admin['id']]);
		
		if(isset($_POST['remember'])){
			setcookie($session_code."_Username", $loginEmail, time()+2592500, '/', '.'.$host);
			setcookie($session_code."_Level", $userType, time()+2592500, '/', '.'.$host);
			setcookie($session_code."_id", $row_rs_admin['id'], time()+2592500, '/', '.'.$host);
		}
			header('location:'.$MM_redirectLoginSuccess);
		}else{
			header('location:'.$MM_redirectLoginFailed);
		}
	  }	
	
	if(isset($_POST['rescuePassword'])){	
		$row_rs_check = returnDBObject("SELECT * FROM admins WHERE username=?",array($_POST['username']));
		
		if($row_rs_check['id']!=''){
		sendMail(
			array("name" => "Notifiche - BasementCMS", "email" => "notification@asementcms.com"), 
			array("name" => $row_rs_check['nome'].' '.$row_rs_check['cognome'], "email" => $row_rs_check['email']),
			"Richiesta di recupero password", 
			"E' stata richiesto il recupero della password per l'account associato a questa e-mail<br>Se ritieni di non essere stato tu a fare questa richiesta comunicalo subito al gestore del software.<br><br>Password: ".decryptText($row_rs_check['password']));	
			$success='Password inviata correttamente all\'indirizzo e-mail.';
		}else{
			$error='Non esiste alcun account con questa e-mail.';
		}	
	}
?>
<?php include('layout/header.php'); ?>
<body>
	<div class="container wrap-login">
		<div class="form-signin" id="login-form">
			<div id="wrap-login">
				<img src="<?php echo $subdomain; ?>/bmt/layout/images/logo.png" width="60%">
				<form method="post">
					<div class="primary-form">
						<label class="control-label">Username</label>
						<input class="input-block-level" type="text" autocomplete="off" placeholder="Username" name="username"/>
						<label class="control-label">Password</label>
						<input class="input-block-level" type="password" autocomplete="off" placeholder="Password" name="password"/>
						<button type="submit" class="btn btn-primary btn-block uppercase">Login</button>
						<div class="form-actions">
							<div class="pull-left">
								<label class="rememberme check">
								<input type="checkbox" name="remember" value="1"/>Mantieni login</label>
							</div>
							<div class="pull-right forget-password-block">
								<a href="javascript:showForgetForm();" id="forget-password" class="forget-password">Recupera password.</a>
							</div>
						</div>
						<input type="hidden" name="login" value="yes">
					</div>
				</form>
			<div class="forget-form">
				<form method="post">
					<div class="form-title">
						<h2>Dimenticato la password?</h2><br>
						<h4>Inserisci la tua e-mail per recuperarla.</h4>
					</div>
					<div class="form-group">
						<input class="input-block-level" type="text" autocomplete="off" placeholder="E-mail" name="email"/>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary uppercase pull-right wide-button">Recupera</button>
					</div>
					<a href="javascript:hideForgetForm();">Indietro</a>
					<input type="hidden" value="yes" name="rescuePassword">
				</form>
				<!-- END FORGOT PASSWORD FORM --><br><br><br>
				<?php if(isset($success)){echo '<span style="color:#fff">'.$success.'</span>';} ?>
				<?php if(isset($error)){echo '<span style="color:#f00">'.$error.'</span>';} ?>
			</div><!--forget-form-->
	</div>

<?php include('layout/footer.php'); ?>
<script>
	
	var unsaved=false;
	$(window).load(function(){
			h=window.innerHeight;
			h2=h/2;
		$('.form-signin').css('height',h+'px');
		$('#wrap-login').css('margin-top',h2-190+'px');
	});
	$(window).resize(function(){
			h=window.innerHeight;
			h2=h/2;
		$('.form-signin').css('height',h+'px');
		$('#wrap-login').css('margin-top',h2-190+'px');
	});
	function showForgetForm(){
		$('.primary-form').css('display','none');
		$('.forget-form').css('display','block');
	}
	function hideForgetForm(){
		$('.primary-form').css('display','block');
		$('.forget-form').css('display','none');
	}
</script>
</body>
</html>