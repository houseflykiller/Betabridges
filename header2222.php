<!doctype html>
<html lang="en">
<head>
	<title data-i18n="header_title">&nbsp;</title>
	<meta charset="utf-8">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- CSS -->
	<link rel="stylesheet" href="assets/css/icons/icomoon/styles.css" type="text/css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/vendor/icon-sets.css">
	<link rel="stylesheet" href="assets/css/main.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-touch-icon" />
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png" />	
	<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />	
	
</head>

<body>
<div id="loader_site">			
			<img src="assets/img/loader.gif"/>			
			<div id="divElement" data-i18n="title_loading" style="margin-top: -30px">
				Loading...
			</div>			
		</div>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- SIDEBAR -->
		<div class="sidebar">
			<div class="brand over"></div>
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">						
						
						<li class="resource_track">
							<a href="#subPagesDashboard" data-toggle="collapse" class="collapsed"><i class="lnr lnr-home"></i> <span data-i18n="mnu_dashboard">Dashboard</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPagesDashboard" class="collapse ">
								<ul class="nav">
									<li class="resource_track"><a href="dashboard.php" class="" data-i18n="mnu_livetracking">Live Tracking</a></li>
									<li class="resource_track"><a href="main.php" class="" data-i18n="mnu_communication">Communication</a></li>
								</ul>
							</div>
						</li>
						
						<li class="resource_track">
							<a href="#subPagesDevice" data-toggle="collapse" class="collapsed"><i class="lnr lnr-car"></i> <span data-i18n="mnu_devices">Devices</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPagesDevice" class="collapse ">
								<ul class="nav">
									<li><a href="devices.php" class="" data-i18n="mnu_registration">Registration</a></li>
									<li><a href="share.php" class="" data-i18n="mnu_share">Share</a></li>
									<li><a href="dgeofences.php" class="" data-i18n="mnu_geofences">GeoFences</a></li>
									<li class="resource_admin"><a href="daliases.php" class="" data-i18n="mnu_attribute">Aliases</a></li>																	
								</ul>
							</div>
						</li>

						<li class="resource_track">
							<a href="#subPagesGroups" data-toggle="collapse" class="collapsed"><i class="lnr lnr-location"></i> <span data-i18n="mnu_groups">Groups</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPagesGroups" class="collapse ">
								<ul class="nav">
									<li><a href="groups.php" class="" data-i18n="mnu_registration">Registration</a></li>
									<li><a href="ggeofences.php" class="" data-i18n="mnu_geofences">GeoFences</a></li>																	
								</ul>
							</div>
						</li>	

						<!--<li class="resource_track">
							<a href="#subPagesMaintenances" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span data-i18n="mnu_maintenance">Maintenance</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPagesMaintenances" class="collapse ">
								<ul class="nav">
									<li><a href="maintenance.php" class="" data-i18n="mnu_registration">Registration</a></li>									
								</ul>
							</div>
						</li>-->															
						
						<li class="resource_track"><a href="geofences.php" class=""><i class="lnr lnr-map-marker"></i> <span data-i18n="mnu_geofences">GeoFences</span></a></li>						
						
						<li class="resource_admin resource_manager" id="mnu_permissions">
							<a href="#subPagesPermission" data-toggle="collapse" class="collapsed"><i class="lnr lnr-eye"></i> <span data-i18n="mnu_permission">Permission</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPagesPermission" class="collapse ">
								<ul class="nav">
									<li><a href="pdevices.php" class="" data-i18n="mnu_devices">Devices</a></li>
									<li><a href="pgroups.php" class="" data-i18n="mnu_groups">Groups</a></li>
									<li><a href="pgeofences.php" class="" data-i18n="mnu_geofences">GeoFences</a></li>									
								</ul>
							</div>
						</li>						
						<li class="resource_track" ><a href="commands.php" class=""><i class="lnr lnr-dice"></i> <span data-i18n="mnu_commands">Commands</span></a></li>
						
						<li id="noty4" class="resource_track"><a id="mnu_notifications" href="notifications4.php" class=""><i class="lnr lnr-alarm"></i> <span data-i18n="mnu_notifications">Notifications</span></a></li>
						<li id="noty3" class="resource_track"><a id="mnu_notifications" href="notifications.php" class=""><i class="lnr lnr-alarm"></i> <span data-i18n="mnu_notifications">Notifications</span></a></li>

						<li class="resource_track">
							<a href="#subPagesReports" data-toggle="collapse" class="collapsed"><i class="lnr lnr-text-format"></i> <span data-i18n="mnu_reports">Reports</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPagesReports" class="collapse ">
								<ul class="nav">
									<li><a href="status.php" class="" data-i18n="mnu_status">Status</a></li>
									<li><a href="logon.php" class="" data-i18n="mnu_access">Access</a></li>
									<li><a href="summary.php" class="" data-i18n="mnu_summary">Summary</a></li>
									<li><a href="events.php" class="" data-i18n="mnu_events">Events</a></li>
									<li><a href="trips.php" class="" data-i18n="mnu_trips">Trips</a></li>
									<li><a href="routes.php" class="" data-i18n="mnu_route">Route</a></li>									
									<li><a href="stops.php" class="" data-i18n="mnu_stops">Stops</a></li>
									<li><a href="inputs.php" class="" data-i18n="mnu_inputs">Inputs</a></li>
									<li class="resource_admin"><a href="rusers.php" class="" data-i18n="mnu_users">Inputs</a></li>
									<li><a href="rdevices.php" class="" data-i18n="mnu_devices">Inputs</a></li>									
								</ul>
							</div>
						</li>						
						<li class="resource_admin resource_manager" id="mnu_users">
							<a href="#subPagesUsers" data-toggle="collapse" class="collapsed"><i class="lnr lnr-users"></i> <span data-i18n="mnu_users">Users</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPagesUsers" class="collapse ">
								<ul class="nav">
									<li><a href="users.php" class="" data-i18n="mnu_registration">Registration</a></li>			
								</ul>
							</div>
						</li>						
						<li class="resource_admin" ><a id="mnu_server" href="server.php" class=""><i class="lnr lnr-cloud-sync"></i> <span data-i18n="mnu_server">Server</span></a></li>
						<li class="resource_admin" ><a id="mnu_attributes" href="aliases.php" class=""><i class="lnr lnr-construction"></i> <span data-i18n="mnu_attribute">Attribute Aliases</span></a></li>																						
						
					</ul>
				</nav>
			</div>						
						
		</div>
		<!-- END SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- NAVBAR -->
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-btn">
						<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
					</div>
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu">
							<span class="sr-only" data-i18n="mnu_toggle_navigation">Toggle Navigation</span>
							<i class="fa fa-bars icon-nav"></i>
						</button>
					</div>
					<div id="navbar-menu" class="navbar-collapse collapse">												
                        <ul class="nav navbar-nav">
							<li class="resource_track"><a href="dashboard.php" class="dropdown-toggle"><i class="lnr lnr-map-marker"></i> <span data-i18n="mnu_livetracking">Live Tracking</span> </a></li>
							</ul>
							
							<ul class="nav navbar-nav">
							<li class="resource_track"><a href="purchase.php" class="dropdown-toggle"><i class="fa fa-credit-card"></i>  <span data-i18n="mnu_rechargenow">Recharge Now! </span></a></li>
							</ul>
							<ul class="nav navbar-nav">
							<li class="resource_track"><a href="list_devices.php" class="dropdown-toggle"><i class="fa fa-list"></i>  <span data-i18n="mnu_devicelist">Device List </span></a></li>
							</ul>
						<ul class="nav navbar-nav navbar-right">
														
							<li class="dropdown" style="display:none">
								<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
									<i class="lnr lnr-alarm"></i>
									<span class="badge bg-danger" id="notifications_count">0</span>
								</a>
								<ul class="dropdown-menu notifications" id="notifications_list">
								</ul>
							</li>							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-earth"></i> <span data-i18n="mnu_language">Language</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
								<ul class="dropdown-menu">									
										<li class="button_i8n" data-locale="en" >
										<!--<img src="assets/img/icons/eua.png" style="height: 22px; width: 22px;  cursor: pointer; float: left"  title="English"/>-->										
										<a href="#" data-i18n="mnu_english">English</a>
									</li>
									<li class="button_i8n" data-locale="hi">
										<!--<img src="assets/img/icons/india.png" style="height: 22px; width: 22px; cursor: pointer; float: left" title="Portugu&ecirc;s"/>-->										
										<a href="#" data-i18n="mnu_hindi">Hindi</a>
									</li>
														
								</ul>
							</li>
							<li class="dropdown resource_track">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span data-i18n="mnu_help">Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
								<ul class="dropdown-menu">
								<li><a href="../support" data-i18n="mnu_guide" target="_blank">Portal Guide</a></li>	
								<!--<li><a href="terms.php" data-i18n="mnu_terms">Terms Use</a></li>-->								
								<li><a href="http://api.whatsapp.com/send?1=pt_EN&phone=917303326163" data-i18n="mnu_whatsapphelp" target="_blank">Whatsapp help</a></li>
								<li><a href="mailto:support@pigpstracker.com" data-i18n="mnu_mailto" target="_blank">Send Email</a></li>								
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<img id="user_photo" src="assets/img/users/" class="img-circle" alt="Avatar" style="height: 24px; width: 24px"> 
									<span id="user_name">&nbsp;</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
								<ul class="dropdown-menu">
									<li><a href="profile.php"><i class="lnr lnr-user"></i> <span data-i18n="mnu_profile">My Profile</span></a></li>
									<li><a href="purchase.php"><i class="fa fa-credit-card"></i> <span data-i18n="mnu_paynow">Pay Now</span></a></li>								
									<li><a id="lnkLogOut" href="#"><i class="lnr lnr-exit"></i> <span data-i18n="mnu_logout">Logout</span></a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<!-- END NAVBAR -->
