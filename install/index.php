<?php
/*error_reporting(E_ALL);
ini_set('display_errors', 'On');*/
include('../bmt/inc/core.php');

if (isset($_POST['saveConfigs'])) {

	$filename = 'base.sql';
	$connectFile = '<?php
			$hostname_connect = "' . $_POST['hostname_connect'] . '";
			$database_connect = "' . $_POST['database_connect'] . '";
			$username_connect = "' . $_POST['username_connect'] . '";
			$password_connect = "' . $_POST['password_connect'] . '";
			define("salt",str_replace("www.","",$_SERVER["SERVER_NAME"]));
			define("hostname_connect", $hostname_connect);
			define("database_connect", $database_connect);
			define("username_connect", $username_connect);
			define("password_connect", $password_connect);
		?>';
	$file = '../bmt/inc/connect.php';
	unlink($file);
	$fp = fopen($file, 'w');
	fwrite($fp, $connectFile);
	fclose($fp);
	include('../bmt/inc/connect.php');

	$templine = '';
	$lines = file($filename);
	foreach ($lines as $line) {
		if (substr($line, 0, 2) == '--' || $line == '')
			continue;

		$templine .= $line;
		if (substr(trim($line), -1, 1) == ';') {
			runRawQuery($templine);
			$templine = '';
		}
	}

	$password = encryptText($_POST['admin_password']);
	runDBQuery("INSERT INTO admins (username, email, password, image, level) VALUES (?, ?, ?, ?, ?)", [$_POST['admin_username'], $_POST['admin_email'], $password, "", "SUPERUSER"]);

	//check if variables exists

	$query_rs_all = "SELECT * FROM crypted_configs WHERE code='session_code'";
	$row_rs_all = returnDBObject($query_rs_all);
	if ($row_rs_all['id'] != '') {
		runDBQuery("DELETE FROM crypted_configs WHERE id=?", [$row_rs_all['id']]);
	}

	$query_rs_all = "SELECT * FROM crypted_configs WHERE code='engine_locked'";
	$row_rs_all = returnDBObject($query_rs_all);
	if ($row_rs_all['id'] != '') {
		runDBQuery("DELETE FROM crypted_configs WHERE id=?", [$row_rs_all['id']]);
	}

	//then creates all crypted variables
	runDBQuery("INSERT INTO crypted_configs (code, value) VALUES (?,?)", ['session_code', encryptText($_POST['session_code'])]);
	runDBQuery("INSERT INTO crypted_configs (code, value) VALUES (?, ?)", ['engine_locked', encryptText('0')])

?>
	<script>
		window.location = "/bmt";
	</script>
<?php
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Basement | Install</title>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" href="/bmt/images/favicon.png">
	<!-- css -->
	<link href="/install/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="/install/css/style.css" rel="stylesheet" media="screen">
	<link href="/install/color/default.css" rel="stylesheet" media="screen">
	<link href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" media="screen">
	<script src="/install/js/modernizr.custom.js"></script>
</head>

<body>
	<div class="menu-area">
		<div id="dl-menu" class="dl-menuwrapper">
			<button class="dl-trigger">Open Menu</button>
			<ul class="dl-menu">
				<li><a href="#intro">Intro</a></li>
				<li><a href="#database">Setup Database</a></li>
				<li><a href="#user">Setup User</a></li>
				<li><a href="#settings">Other settings</a></li>
				<li><a href="#rocks">Rocks</a></li>
			</ul>
		</div><!-- /dl-menuwrapper -->
	</div>

	<!-- intro area -->
	<div id="intro">

		<div class="intro-text">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="brand">
							<h1><a href="http://basementcms.com">Basement CMS®</a></h1>
							<div class="line-spacer"></div>
							<p><span>A Rock-Solid CMS for Web Developers</span></p>
							<a style="width:120px; margin:30px auto 0 auto;" href="#database" class="btn btn-success btn-lg btn-block smooth">START</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<form class="form-horizontal" role="form" method="post" id="install-form">

		<!-- Database -->
		<section id="database" class="home-section bg-white">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-2 col-md-8">
						<div class="section-heading">
							<h2>Setup Database</h2>
							<p>Insert database infos</p>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-offset-1 col-md-10">
						<div class="form-group">
							<div class="col-md-offset-2 col-md-8">
								<input type="text" class="form-control" value="localhost" name="hostname_connect" required placeholder="Hostname">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-2 col-md-8">
								<input type="text" class="form-control" name="database_connect" required placeholder="Database">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-2 col-md-8">
								<input type="text" class="form-control" name="username_connect" required placeholder="Database's user">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-2 col-md-8">
								<input type="text" class="form-control" name="password_connect" required placeholder="Database's password">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-2 col-md-8">
								<a href="#user" class="btn btn-theme btn-lg btn-block smooth">Go ahead</a>
							</div>
						</div>

					</div>

				</div>
			</div>
		</section>
		<!-- Database -->
		<hr>
		<!-- user -->
		<section id="user" class="home-section bg-white">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-2 col-md-8">
						<div class="section-heading">
							<h2>Setup admin</h2>
							<p>Insert admin infos</p>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-offset-1 col-md-10">
						<div class="form-group">
							<div class="col-md-offset-2 col-md-8">
								<input type="text" class="form-control" name="admin_username" required placeholder="Username">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-2 col-md-8">
								<input type="text" class="form-control" name="admin_email" required placeholder="E-Mail">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-2 col-md-8">
								<input type="password" class="form-control" name="admin_password" required placeholder="Password">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-2 col-md-8">
								<a href="#settings" class="btn btn-theme btn-lg btn-block smooth">Go ahead</a>
							</div>
						</div>

					</div>

				</div>
			</div>
		</section>
		<!-- user -->
		<hr>
		<!-- user -->
		<section id="settings" class="home-section bg-white">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-2 col-md-8">
						<div class="section-heading">
							<h2>Other settings</h2>
							<p>Insert other settings</p>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-offset-1 col-md-10">
						<div class="form-group">
							<div class="col-md-offset-2 col-md-8">
								<input type="text" class="form-control" name="session_code" required placeholder="Session code">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-2 col-md-8">
								<a href="#rocks" class="btn btn-theme btn-lg btn-block smooth">Go ahead</a>
							</div>
						</div>

					</div>

				</div>
			</div>
		</section>
		<!-- user -->
		<hr>
		<!--rocks-->
		<section id="rocks" class="home-section bg-white">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-2 col-md-8">
						<div class="section-heading">
							<h2>Well done</h2>
							<p>This install will autodestroy after saving, please check all informations or you'll need to reinstall everything.</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-offset-2 col-md-8">
							<div type="button" onClick="validateForm('install-form')" class="btn btn-theme btn-lg btn-block">Rocks!</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--rocks-->
		<input type="hidden" name="saveConfigs" value="yes">
	</form>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p>Copyright &copy;<?php echo date('Y'); ?> Futuring. All rights reserved. By <a href="https://futuring.com">Futuring</a></p>
				</div>
			</div>
		</div>
	</footer>

	<!-- js -->
	<script src="/install/js/jquery.js"></script>
	<script src="/install/js/bootstrap.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script src="/install/js/jquery.smooth-scroll.min.js"></script>
	<script src="/install/js/jquery.dlmenu.js"></script>
	<script src="/install/js/wow.min.js"></script>
	<script src="/install/js/custom.js"></script>

</html>