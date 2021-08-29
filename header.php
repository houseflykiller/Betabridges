<?php
    session_start();
ini_set("display_errors","0");

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); ?> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="img/icon.png">
    <link rel="stylesheet" type="text/css" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
    <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script>
    <script type='text/javascript' src='http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js'></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
        integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
        crossorigin="">

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

    <script src="betabridges2.js"></script>

    <title>Dashboard | Beta Bridges</title>
</head>

<body class="dashboard-body">
    <div class="sidebar__btn sidebar__open hidden">
        <svg class="sidebar__btn--svg">
            <use xlink:href="img/cedar.svg#icon-menu"></use>
        </svg>
    </div>
    <div class="sidebar__btn sidebar__close">
        <svg class="sidebar__btn--svg">
            <use xlink:href="img/cedar.svg#icon-cross"></use>
        </svg>
    </div>
    <section class="suite-header">
        <div class="suite-header__logo-box">
            <img src="img/betaB.png" alt="Beta Bridges-logo" class="suite-header__logo">
        </div>
        <ul class="suite-header__nav">
            <li class="suite-header__nav--item"><a href="#" class="suite-header__nav--link">Date</a></li>
            <li class="suite-header__nav--item"><a href="#" class="suite-header__nav--link">Time</a></li>
            <li class="suite-header__nav--item"><a href="landing.php" class="suite-header__nav--link"><svg
                        class="topnav-svg">
                        <use xlink:href="img/sprite.svg#icon-home"></use>
                    </svg></a></li>
            <li class="suite-header__nav--item"><svg class="topnav-svg">
                    <use xlink:href="img/sprite.svg#icon-location1"></use>
                </svg></li>
            <li class="suite-header__nav--item">
                <span class="drop-select-touch"><svg class="topnav-svg">
                        <use xlink:href="img/sprite.svg#icon-cogs"></use>
                    </svg></span>
            </li>
            <li class="suite-header__nav--item"><span class="drop-select-touch"><svg class="topnav-svg">
                        <use xlink:href="img/sprite.svg#icon-g_translate"></use>
                    </svg></span></li>
            <li class="suite-header__nav--item notification-box"><span class="drop-select-touch"><svg
                        class="topnav-svg">
                        <use xlink:href="img/sprite.svg#icon-bell"></use>
                    </svg>
                    <span class="notification">9</span></span>
            </li>
            <li class="suite-header__nav--item"><a href="#" class="suite-header__nav--link"><span
                        class="drop-select-touch"><svg class="topnav-svg">
                            <use xlink:href="img/sprite.svg#icon-user"></use>
                        </svg> username</span></a></li>
        </ul>
    </section>
    <section class="dashboard">
        <div class="sidebar">
            <div class="sidebar__list">
                <div class="sidebar__list--header">Map</div>
                <div class="sidebar__list--item"><a href="devices.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-phone-portrait"></use>
                        </svg><span>Devices</span></a></div>
                <div class="sidebar__list--item"><a href="map.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/beta2.svg#icon-reload"></use>
                        </svg><span>Replay</span></a></div>
                <div class="sidebar__list--item"><a href="geofences.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-globe"></use>
                        </svg><span>Geofences</span></a></div>
            </div>
            <div class="sidebar__list">
                <div class="sidebar__list--header">Reports</div>
                <div class="sidebar__list--item"><a href="routes.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/beta2.svg#icon-alt_route"></use>
                        </svg><span>Route</span></a></div>
                <div class="sidebar__list--item"><a href="trips.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-automobile"></use>
                        </svg><span>Trip</span></a></div>
                <div class="sidebar__list--item"><a href="stops.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/beta2.svg#icon-flag3"></use>
                        </svg><span>Stops</span></a></div>
                <div class="sidebar__list--item"><a href="summary.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/beta2.svg#icon-list"></use>
                        </svg><span>Summary</span></a></div>
                <div class="sidebar__list--item"><a href="status.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/beta2.svg#icon-graph"></use>
                        </svg><span>Status</span></a></div>
                <div class="sidebar__list--item"><a href="logon.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-calendar"></use>
                        </svg><span>Access</span></a></div>
                        <div class="sidebar__list--item"><a href="events.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/beta2.svg#icon-graph"></use>
                        </svg><span>Events</span></a></div>
                <div class="sidebar__list--item"><a href="inputs.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-calendar"></use>
                        </svg><span>Inputs</span></a></div>
                        <div class="sidebar__list--item"><a href="rusers.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/beta2.svg#icon-graph"></use>
                        </svg><span>Users</span></a></div>
                <div class="sidebar__list--item"><a href="rdevices.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-calendar"></use>
                        </svg><span>Devices</span></a></div>
            </div>
            <div class="sidebar__list">
                <div class="sidebar__list--header">Settings</div>
                <div class="sidebar__list--item"><a href="profile.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-user"></use>
                        </svg><span>My Account</span></a></div>
                <div class="sidebar__list--item"><a href="groups.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/beta2.svg#icon-folder"></use>
                        </svg><span>Groups</span></a></div>
                <div class="sidebar__list--item"><a href="ggeofences.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-user"></use>
                        </svg><span>Group geofences</span></a></div>
                <div class="sidebar__list--item"><a href="#" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-user"></use>
                        </svg><span>Drivers</span></a></div>
                <div class="sidebar__list--item"><a href="maintenance.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-tools"></use>
                        </svg><span>Maintenance</span></a></div>
                <div class="sidebar__list--item"><a href="#" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-clipboard1"></use>
                        </svg><span>Saved Commands</span></a></div>
                <div class="sidebar__list--item"><a href="purchase.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-fact_check"></use>
                        </svg><span>Payments</span></a></div>
                <div class="sidebar__list--item"><a href="aliases.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/beta2.svg#icon-server"></use>
                        </svg><span>Computed attributes</span></a></div>
                        
                <div class="sidebar__list--item"><a href="notifications4.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-bell-o"></use>
                        </svg><span>Account Notification</span></a></div>
                <div class="sidebar__list--item"><a href="commands.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-user"></use>
                        </svg><span>Commands</span></a></div>
            </div>
            <div class="sidebar__list">
                <div class="sidebar__list--header">Manager</div>
                <div class="sidebar__list--item"><a href="users.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-group"></use>
                        </svg><span>Users</span></a></div>
                <div class="sidebar__list--item"><a href="daliases.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-user"></use>
                        </svg><span>Device Aliases</span></a></div>
                <div class="sidebar__list--item"><a href="permissions.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-user"></use>
                        </svg><span>Permissions</span></a></div>
                <div class="sidebar__list--item"><a href="pdevice.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-user"></use>
                        </svg><span>Device Permissions</span></a></div>
                <div class="sidebar__list--item"><a href="pgroups.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-user"></use>
                        </svg><span>Group Permissions</span></a></div>
                <div class="sidebar__list--item"><a href="pgeofences.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-user"></use>
                        </svg><span>Geofences Permissions</span></a></div>
                <div class="sidebar__list--item"><a href="logon.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-calendar"></use>
                        </svg><span>Access</span></a></div>
            </div>
            <div class="sidebar__list">
                <div class="sidebar__list--header">Admin</div>
                <div class="sidebar__list--item"><a href="server.php" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/beta2.svg#icon-server"></use>
                        </svg><span>Server</span></a></div>
                <div class="sidebar__list--item"><a href="#" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/beta2.svg#icon-bars"></use>
                        </svg><span>Statistics</span></a></div>
                <div class="sidebar__list--item"><a href="#" class="sidebar__link"><svg class="sidebar__svg">
                            <use xlink:href="img/sprite.svg#icon-clipboard"></use>
                        </svg><span>Quotations</span></a></div>
            </div>
        </div>
        <main class="main-window">
            