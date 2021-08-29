<?php
ini_set("display_errors","0");
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
?>
<!doctype html>
<html lang="en" class="fullscreen-bg">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="img/icon.png">
    <title>Login | Beta Bridges</title>
</head>

<body>

    <div class="background-holder">
        <div class="fe-brown">
            &nbsp;
        </div>
        <div class="form-box">
            <form method="POST" enctype="application/x-www-form-urlencoded" id="form_data" action="#" class="form__login column-n-center">

                <div class="form__logo-box">
                    <img src="img/betaB.png" alt="beta-bridges-logo" class="form__logo">
                </div>

                <div class="form__heading">Login</div>

                <div class="form__group column-n-center">
                    <label for="username" class="form__label">username</label>
                    <input type="text" name="email" id="email" value="" class="form__input" placeholder="Username" required>
                </div>

                <div class="form_group column-n-center">
                    <label for="username" class="form__label" required>password</label>
                    <input type="password" class="form__input" name="password" id="password" value=""  placeholder="Password" required>
                </div>

                <div class="form__group">
                    <button type="submit" name="btnLogin" id="btnLogin" onclick="return false;"  class="form__button">Login</button>
                </div>

                <div class="form__group">
                    <a href="landing.html" class="form__forgot-password">Forgot Your Password</a>
                </div>

                <div class="form__group">
                    <a href="#" class="form__link">Register</a>
                </div>
            </form>
        </div>
    </div>


    <!-- END WRAPPER -->
	<script src="assets/js/jquery/jquery-2.1.0.min.js"></script>
	<!--<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>-->
	
	<script src="assets/js/bootstrap/bootstrap.min.js"></script>
	<script src="assets/js/plugins/toastr/toastr.min.js"></script>	
	<script src="assets/js/klorofil.min.js"></script>
	<script src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
	<!-- <script src="assets/js/plugins/notifications/sweet_alert.min.js"></script>	 -->
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