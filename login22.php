<!doctype html>
<html lang="en" class="fullscreen-bg">
<?php
ini_set("display_errors","0");
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
?>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/vendor/icon-sets.css">
	<link rel="stylesheet" href="assets/css/main.min.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->	
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-touch-icon" />
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png" />	
	<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />	

</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content over">							
							<form class="form-auth-small" method="post" action="#" enctype="application/x-www-form-urlencoded" id="form_data">
								<div class="form-group">
									<label for="signup-email" class="control-label sr-only">Email</label>
									<input type="text" class="form-control" name="email" id="email" value="" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="signup-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" name="password" id="password" value="" placeholder="Password">
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox" id="remember">
										<span data-i18n="login_btn_remember">Remember me</span>
									</label>
								</div>
								<button type="button" name="btnLogin" onclick="return false;" class="btn btn-primary btn-lg btn-block" data-i18n="login_btn_login">LOGIN</button>
								<button type="button" name="btnRegister" onclick="return false;" class="btn btn-success btn-lg btn-block" data-i18n="login_btn_register">REGISTER</button>
								<div class="bottom">
								<!--	<span><i class="fa fa-lock"></i> <a href="recover.php" data-i18n="login_forgot">Forgot password?</a></span>-->
								</div>
								<img src="assets/img/icons/india.png" class="button_i8n" data-locale="hi" style="height: 32px; width: 32px; cursor: pointer" title="hindi"/>
								<img src="assets/img/icons/eua.png" class="button_i8n" data-locale="en" style="height: 32px; width: 32px;  cursor: pointer"  title="English"/>								
								<br />
								<a id="btnAppleStore" href="#" target="_blank"><img src="assets/img/apple-store.jpg" class="apple-store" /></a>
								<a id="btnPlayStore"  href="#" target="_blank"><img src="assets/img/play-store.png" class="play-store" /></a>
								
							</form>
						</div>
					</div>
					<div class="right">						
					</div>					
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	
			<footer>
				<div class="container-fluid">
					<p class="copyright">&copy; 2019. <a href="http://www.pigpstrackingsystem.com/" target="_blank"><span id="crighttitle"></span></a>. All Rights Reserved.</p>
				</div>
			</footer>	
	<!-- END WRAPPER -->
	<script src="assets/js/jquery/jquery-2.1.0.min.js"></script>
	<!--<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>-->
	
	<script src="assets/js/bootstrap/bootstrap.min.js"></script>
	<script src="assets/js/plugins/toastr/toastr.min.js"></script>	
	<script src="assets/js/klorofil.min.js"></script>
	<script src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
	<script src="assets/js/plugins/notifications/sweet_alert.min.js"></script>	
	<script src="assets/js/plugins/forms/validation/validate.min.js"></script>
	<script src="assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="assets/js/plugins/ui/moment/moment_locales.min.js"></script>       
	<script src="assets/js/plugins/i8n/jquery.i18n.js"></script>
	<script src="assets/js/plugins/i8n/jquery.i18n.messagestore.js"></script>
	<script src="assets/js/plugins/underscore-min.js"></script>
	<script src="assets/js/apps/i8n.js"></script>
    <script src="assets/js/plugins/jquery.cookie.js"></script>
	
	<script src="assets/js/apps/general.js"></script>
	<script src="assets/js/apps/commons/login.js"></script>
</body>

</html>
