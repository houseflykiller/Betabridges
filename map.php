<!doctype html>
<html lang="en">
    <!-- <?php
//    session_start();
//ini_set("display_errors","0");

//header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
//header("Cache-Control: post-check=0, pre-check=0", false);
//header("Pragma: no-cache"); ?> -->

<?php	
	include_once "header.php";
?>
		
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

	<!--	<link rel="stylesheet" href="assets/js/plugins/leaflet/leaflet.css">-->
		<link rel="stylesheet" href="assets/js/plugins/leaflet/Icon.Label.css">
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">		
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin=""/>
    

		<link rel="stylesheet" href="assets/js/plugins/Leafletmarkercluster/dist/MarkerCluster.Default.css">

		<!-- datatables buttons-->
		<link href="assets/js/plugins/tables/datatables3/datatables.min.css" rel="stylesheet" type="text/css">
		<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $google_key ?>&v=3"></script>
		
		<style>	
.leaflet-touch .leaflet-control-layers, .leaflet-touch .leaflet-bar {
  border: 2px solid rgb(255, 89, 0) !important;
}

.leaflet-touch .leaflet-control-layers-toggle {
  width: 40px;
  height: 40px;
}

.leaflet-control-layers {
  border-radius: 5px !important; 
}

.leaflet-top {
  z-index: 1049;
}
			.sweet-deal-label {				
				background-color: #336442;
				-moz-box-shadow: none;
				-webkit-box-shadow: none;
				box-shadow: none;
				color: #fff;
				font-weight: bold;
				z-index: 2000;
				}

				.sweet-blue-label {				
				background-color: #0016B0;
				-moz-box-shadow: none;
				-webkit-box-shadow: none;
				box-shadow: none;
				color: #fff;
				font-weight: bold;
				z-index: 2000;
				}

				.sweet-orange-label {				
				background-color: #ED6F09;
				-moz-box-shadow: none;
				-webkit-box-shadow: none;
				box-shadow: none;
				color: #fff;
				font-weight: bold;
				z-index: 2000;
				}

				.sweet-red-label {				
				background-color: #B71D1C;
				-moz-box-shadow: none;
				-webkit-box-shadow: none;
				box-shadow: none;
				color: #fff;
				font-weight: bold;
				z-index: 2000;

				
				}

				
				.modal-dialog-report {
				width: 100%;
				height: 100%;
				margin: 0;
				padding: 0;
				}

				.modal-content-report {
				height: auto;
				min-height: 100%;
				border-radius: 0;
				}
		</style>
		

		<!-- <div id="loader_site">			
			<img src="assets/img/loader.gif"/>			
			<div id="divElement" data-i18n="title_loading" style="margin-top: -30px">
				Loading please wait...
			</div>			
		</div> -->
		<!-- WRAPPER -->
		<div id="wrapper" class="map">

			<div id="mapid"></div>

			<div class="circle_container">
				<div class="circle_common"  title="Vehicles"    id="btnDevices"   style="background-image: url(assets/img/icons/list_car.png); "></div>
				<div class="circle_common"  title="Alerts"     id="btnAlerts"    style="background-image: url(assets/img/icons/notification.png); "></div>
				<div class="circle_common"  title="Geofence"      id="btnFences"    style="background-image: url(assets/img/icons/geofence_off.png); "></div>
				<div class="circle_common"  title="Live Route" id="btnRoutes"   style="background-image: url(assets/img/icons/route_off.png); "></div>
				<div class="circle_common"  title="StreetView"  id="btnStreetView" style="background-image: url(assets/img/icons/street-view.png); "></div>
				<div class="circle_common"  title="Admin Panel" id="btnAdmin"     style="background-image: url(assets/img/icons/gears.png); "></div>			
				<div class="circle_common"  title="Logout"        id="btnExit"      style="background-image: url(assets/img/icons/powerroff.png); "></div>

				<div class="circle_online"  title="Online"      id="countOnline"  style=" margin-top: 18px;">0</div>
				<div class="circle_offline"  title="Offline"     id="countOffline">0</div>

			</div>		

		</div>			

		<!-- Modal info window-->
		<!-- Button trigger modal -->
		
		<button id="btnViewDevice" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#viewInfoDevice"  style="display: none">
			&nbsp;
		</button>
		<div class="modal fade" id="viewInfoDevice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel"><span id="titleViewDevice"></span></h4>
					</div>
					<div class="modal-body">

						<ul id="mytabs" class="nav nav-tabs nav-tabs-responsive  nav-pills" role="tablist">
							<li class="nav-item active">
								<a id="mnu_info" class="nav-link active" data-toggle="tab" href="#menu_1"> <i class="fa fa-question-circle"></i> </a>
							</li>
							<li class="nav-item next">
								<a id="mnu_photo" class="nav-link" data-toggle="tab" href="#menu_2"> <i class="fa fa-camera"></i></a>
							</li>
							<li class="nav-item">
								<a id="mnu_command" class="nav-link" data-toggle="tab" href="#menu_3"><i class="fa fa-gear"></i></a>
							</li>
							<li class="nav-item" style="display:none">
								<a id="mnu_history" class="nav-link" data-toggle="tab" href="#menu_4"> <i class="fa fa-history"></i></a>
							</li>

							<li class="nav-item" style="display:none">
								<a id="mnu_alarms" class="nav-link" data-toggle="tab" href="#menu_5"> <i class="fa fa-bell"></i></a>
							</li>

						</ul>

						<div class="tab-content">
							<div class="tab-pane active" id="menu_1">
								<div class="row">
									<div class="col-md-10">
										<div id="bodyViewDevice"  style="font-size: 12px;"></div>
									</div>									
								</div>

								<div class="col-md-14">
										<img class="iconStatus statusCar" src="assets/img/icons/car_off.png"  />
										
										<img class="iconStatus lockCar"   src="assets/img/icons/car_unlock.png"  />
										
										<img class="iconStatus sirenCar"  src="assets/img/icons/car_siren_off.png"  />
										
										<img class="iconStatus panicCar"  src="assets/img/icons/car_panic_off.png"  />
										
										<span id="iconStatus inputsViewDevice">
											<span class="label label-default" id="deviceInput1" data-i18n="title_input1">Input 1</span>											
											<span class="label label-default" id="deviceInput2" data-i18n="title_input2">Input 2</span>
										</span>
								</div>

							</div>
							<div class="tab-pane next" id="menu_2">								
									<img src="" id="device_photo"/>								
							</div>
							<div class="tab-pane" id="menu_3">
								<div class="tab-content">							  
									<form id="form_send_command" method="post" action="#" enctype="application/x-www-form-urlencoded"  role="form" >										

										<div class="form-group">
											<label style="font-weight:normal"  data-i18n="title_command">Command</label>
											<select class="select-search" id="type_command" name="type_command">											                    											                    											                    
													<option value="" data-i18n="title_select2">Select an option...</option>											                    
											</select>
										</div>		                    		                    
									
										<div class="form-group" id="custom_command" style="display: none">
											<label for="name" style="font-weight:normal" data-i18n="title_string">String</label>
											<input type="text" id="custom" name="custom" class="form-control" maxlength="250" placeholder="" />
										</div>								                                                                                                                                                      
																						
										<div class="text-right">
											<button type="button" class="btn btn-primary" name="btnSendCommand"><span data-i18n="button_send">Send</span><i class="icon-arrow-right14 position-right"></i></button>
											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset" name="btnClearCommand" > <i class="icon-undo bigger-110"></i> <span data-i18n="button_clear">Clear</span> </button>                                                           
										</div>                                                                                            
									</form>
								</div>	
							</div>
							<div class="tab-pane" id="menu_4" title="Historico">

							</div>

							<div class="tab-pane" id="menu_5" title="Alertas">

							</div>
						</div>

					</div>
					<div class="modal-footer">
						<button id="device_lock" type="button" class="btn btn-danger" data-i18n="title_lock" style="float: left;">
							Block
						</button>
						<button id="device_unlock" type="button" class="btn btn-info" data-i18n="title_unlock" style="float: left;">
							UnBlock
						</button>
						<button id="device_close" type="button" class="btn btn-default" data-dismiss="modal" data-i18n="title_close">
							Close
						</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal report window-->
		<!-- Button trigger modal -->
		<button id="btnViewReport" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#viewInfoReport"  style="display: none">
			&nbsp;
		</button>
		<div class="modal fade" id="viewInfoReport" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel">
			<div class="modal-dialog modal-dialog-report modal-lg" role="document">
				<div class="modal-content modal-content-report">
					<div class="modal-header">
						<button t	ype="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="reportModalLabel"><span id="titleViewReport">Reports</span></h4>
					</div>
					<div class="modal-body">

					<!-- form -->
						<div id="panel_report" class="table-responsive">
							<div id="panel_form">
								<form id="form_report" method="post" action="#" enctype="application/x-www-form-urlencoded"  role="form"  style="width:95%" >
																	
									<div class="form-group">
										<label style="font-weight:normal" data-i18n="title_type">type</label>
										<select class="select-search" id="report_id" name="report_id" >
												<option value="" data-i18n="title_select2">Select an option ...</option>
												<option value="0" >Summary</option>
												<option value="1" >Events</option>
												<option value="2" >Trips</option>
												<option value="3" >Routes</option>
												<option value="4" >Stops</option>
												<option value="5" >Peripherals</option>
												<option value="6" id="opt_report_user" style="display:none">Users</option>
												<option value="7">Vehicles</option>
										</select>
									</div>

									<div class="form-group" id="field_device" style="display:none">
										<label style="font-weight:normal" data-i18n="title_device">Device</label>
										<select class="select-search" id="report_device" name="report_device" multiple="multiple">
												<option value="" data-i18n="title_select2">Select an option ...</option>											                    
										</select>
									</div>
									
									<div class="form-group" id="field_group" style="display:none">
										<label style="font-weight:normal" data-i18n="title_group">Group</label>
										<select class="select-search" id="report_group" name="report_group" multiple="multiple">											                    											                    											                    
												<option value="" data-i18n="title_select2">Select an option ...</option>											                    
										</select>
									</div>

									<div class="form-group" id="field_event"  style="display:none">
										<label style="font-weight:normal" data-i18n="title_event_type">Event Type</label>
										<select class="select-search" id="report_type" name="report_type" multiple="multiple">											                    											                    											                    
												<option value="" data-i18n="title_select2">Select an option ...</option>
												<option value="allEvents" data-i18n="title_allEvents">All Events</option>												                    
												<option value="commandResult" data-i18n="title_commandResult">Command Result</option>
												<option value="deviceOnline" data-i18n="title_deviceOnline">Device is online</option>
												<option value="deviceUnknown" data-i18n="title_deviceUnknown">Device status is unknown</option>
												<option value="deviceOffline" data-i18n="title_deviceOffline">Device is offline</option>
												<option value="deviceMoving" data-i18n="title_deviceMoving">Device is moving</option>
												<option value="deviceStopped" data-i18n="title_deviceStopped">Device has stopped</option>
												<option value="deviceOverspeed" data-i18n="title_deviceOverspeed">Device exceeds the speed</option>
												<option value="geofenceEnter" data-i18n="title_geofenceEnter">Device as entered geofence</option>
												<option value="geofenceExit" data-i18n="title_geofenceExit">Device as exited geofence</option>
												<option value="alarm" data-i18n="title_alarm">Alarms</option>
												<option value="ignitionOn" data-i18n="title_ignitionOn">Ignition is ON</option>
												<option value="ignitionOff" data-i18n="title_ignitionOff">Ignition is OFF</option>
												<option value="maintenance" data-i18n="title_maintenance">Maintenance required</option>					                    
										</select>
									</div>

									<div class="row" id="field_period" style="display:none">
										<div class="col-md-4">                                                       
											<div class="form-group">
												<label style="font-weight:normal" data-i18n="title_period">Period</label>
												<select class="select-search" id="report_period" name="report_period" >
														<option value="" data-i18n="title_select2">Select an option ...</option>
														<option value="0" >Today</option>
														<option value="1" >Yesterday</option>
														<option value="2" >This week</option>
														<option value="3" >Last week</option>
														<option value="4" >This month</option>
														<option value="5" >Personalized</option>													
												</select>
											</div>
										</div>
									</div>

									<div class="row" id="field_period_custom" style="display:none">
										<div class="col-md-4">                                                       
											<div class="form-group">
												<label for="report_from" style="font-weight:normal" data-i18n="title_period">Period</label>
												<input type="text" id="report_from" name="report_from" class="form-control datetime" maxlength="20" placeholder="" style="float:left"/>											
											</div>
										</div>

										<div class="col-md-4">                                                       
											<div class="form-group">																
												<label for="report_to" style="font-weight:normal">&nbsp;</label>					
												<input type="text" id="report_to" name="report_to" class="form-control datetime" maxlength="20" placeholder=""  /> 
											</div>
										</div>
									</div>							

									<div class="form-group" id="field_disabled" style="display:none">
										<label style="font-weight:normal" data-i18n="title_disabled">Disabled</label>
										<select class="select-search" id="report_disabled" name="report_disabled">
												<option value="" data-i18n="title_select2">Select an option ...</option>
												<option value="yes" data-i18n="title_yes">Yes</option>
												<option value="no" data-i18n="title_no">No</option>
												<option value="all" data-i18n="title_all">All</option>
										</select>
									</div>		                                                                                                                                                      
																					
									<div class="text-right" id="field_buttons" style="display:none">
										<button type="submit" class="btn btn-primary" name="btnGenerateReport"><span data-i18n="button_generate">Generate</span><i class="icon-arrow-right14 position-right"></i></button>
										&nbsp; &nbsp; &nbsp;
										<button class="btn" type="reset" name="btnClearReport" > <i class="icon-undo bigger-110"></i> <span data-i18n="button_clear">Clear</span> </button>                                                           
									</div>                                                                                            
								</form>
							</div>
							<div id="panel_table" style="display:none">
								<table class="table datatable-js" id="datatable_report">
									<thead id="datatable_report_header">
										<tr>                                			         
											<th data-i18n="title_device_name">Device Name</th>
											<th data-i18n="title_distance">Distance</th>
											<th data-i18n="title_engine_hours">Engine Hours</th>
											<th data-i18n="title_max_speed">Max Speed</th>
											<th data-i18n="title_average_speed">Average Speed</th>
											<th data-i18n="title_fuel_spent">Average Speed</th>                                  		                                                                                                                                             
										</tr>
									</thead>
								</table>							  							
							</div>

						</div>

					<!-- /form -->												

					</div>
					<div class="modal-footer">						
						<button id="report_back" type="button" class="btn btn-info" data-i18n="button_back" style="display:none">
							Back
						</button>
						<button id="report_close" type="button" class="btn btn-default" data-dismiss="modal" data-i18n="title_close">
							Close
						</button>
					</div>
				</div>
			</div>
		</div>

		<div id="pano"></div>			

		<div id="container_footer" class="container_footer" >					
			<div style="margin-right:5px; margin-top:3px; bottom: 0px; width: 350px; height: 160px; float:right; background-color:#fff; background-color: rgba(255, 255, 255, 0.1);">
				<table class="footer_info">
					<tr>
						<td colspan="3">							
							<span id="panel_device_name" style="font-size:16px; font-weight: bold">-</span>
						</td>
						<td>							
							<span id="panel_device_status">-</span>&nbsp;&nbsp;&nbsp;
							<span id="btnCloseFooter">X</span>&nbsp;&nbsp;&nbsp;
						</td>
					</tr>
					<tr>							
						<td width="15%">
							<img src="assets/img/icons/odometer_level.png" style="height: 16px; width: 16px" />
							<span data-i18n="title_speed">Speed</span>
						</td>
						<td width="35%">
							<span id="panel_device_speed">-</span>
						</td>
						<td width="15%" style="border-left-style:solid; border-width: 1px; padding-left:4px">
							<img src="assets/img/icons/navigation.png" style="height: 16px; width: 16px" />
							<span data-i18n="title_course">Direction</span>
						</td>
						<td>
							<span id="panel_device_course">-</span>
						</td>
					</tr>
					<tr>
						<td width="15%">							
							<img src="assets/img/icons/battery_level.png" style="height: 16px; width: 16px" />
							<span data-i18n="title_battery">Battery</span>
						</td>
						<td width="35%">
							<span id="panel_device_battery">-</span>
						</td>
						<td width="15%" style="border-left-style:solid; border-width: 1px; padding-left:4px">
							<img src="assets/img/icons/information.png" style="height: 16px; width: 16px" />
							<span data-i18n="title_protocol">Protocol</span>
						</td>
						<td>
							<span id="panel_device_protocol">-</span>
						</td>												
					</tr>
					<tr>
						<td width="15%">							
							<img src="assets/img/icons/clock.png" style="height: 16px; width: 16px" />
							<span data-i18n="title_time">Time</span>
						</td>
						<td colspan="3">
							<span id="panel_device_time">-</span>		
						</td>												
					</tr>
					<tr>
						<td width="15%">							
							<img src="assets/img/icons/placeholder.png" style="height: 16px; width: 16px" />
							<span data-i18n="title_address">Local</span>
						</td>
						<td colspan="3">
							<span id="panel_device_address">-</span>
						</td>												
					</tr>
					<tr>
						<td width="15%">							
							<img src="assets/img/icons/movement-off.png" style="height: 16px; width: 16px" />
							<span data-i18n="title_movement">Movement</span>
						</td>
						<td width="35%">
							<span id="panel_device_movement">-</span>
						</td>
						<td width="15%" style="border-left-style:solid; border-width: 1px; padding-left:4px">
							<img src="assets/img/icons/alarm.png" style="height: 16px; width: 16px" />
							<span data-i18n="title_alarm">Alarm</span>
						</td>
						<td>
						<span id="panel_device_alarm">-</span>
						</td>												
					</tr>
				</table>
			</div>			
		</div>
		
		<div id="list_info" class="table-responsive container_list">

			<table id="list_table" class="table table-hover">
				<thead id="list_info_table" class="thead-dark">
					<tr>
					<th scope="col" colspan="3" style="width:100%;text-align: center; font-size:14px; font-weight: bold" id="list_info_title">Vehicles</th>
					<th scope="col">
						<img id="btnClearAlerts" src="assets/img/icons/trash.png" style="height: 16px; width: 16px; cursor:pointer; margin-right:10px" />
					</th>
					</tr>
				</thead>
				<tbody id="list_info_body"></tbody>
				<tfoot>
					<input type="text" id="list_info_search" name="list_info_search" class="form-control" maxlength="20" placeholder="Search..."  /> 
				</tfoot>
			</table>

		</div>		

		<!-- /Modal -->
		<!-- END MAIN CONTENT -->

				
			<!-- Javascript -->
			<script src="assets/js/jquery/jquery-2.1.0.min.js"></script>
			<script src="assets/js/bootstrap/bootstrap.min.js"></script>
			<script src="assets/js/plugins/toastr/toastr.min.js"></script>
			<script src="assets/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
			<script src="assets/js/klorofil.min.js"></script>
	
			<!-- datatable export -->	
			<script src="assets/js/plugins/tables/datatables3/datatables.min.js"></script>
			
			
			<script src="assets/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
			<script src="assets/js/plugins/forms/selects/select2.min.js"></script>
			<script src="assets/js/plugins/notifications/sweet_alert.min.js"></script>
			<script src="assets/js/plugins/forms/styling/switchery.min.js"></script>
			<script src="assets/js/plugins/forms/styling/switch.min.js"></script>
			<script src="assets/js/plugins/forms/validation/validate.min.js"></script>
			<script src="assets/js/plugins/i8n/jquery.i18n.js"></script>
			<script src="assets/js/plugins/i8n/jquery.i18n.messagestore.js"></script>
			<script charset="UTF-8" src="assets/js/apps/i8n.js"></script>
			<script src="assets/js/plugins/forms/styling/uniform.min.js"></script>
			<script src="assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
			<script src="assets/js/plugins/forms/inputs/autosize.min.js"></script>
			<script src="assets/js/plugins/forms/inputs/formatter.min.js"></script>
			<script src="assets/js/plugins/ui/moment/moment.min.js"></script>
			<script src="assets/js/plugins/ui/moment/moment_locales.min.js"></script>
			<script src="assets/js/plugins/ui/moment/moment-timezone.js"></script>
			<!-- moment-duration-format plugin -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-duration-format/1.3.0/moment-duration-format.min.js"></script>			
			<script src="assets/js/plugins/pickers/daterangepicker.js"></script>
			<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>
<!--			<script src="assets/js/plugins/leaflet/leaflet.js"></script> -->
			<script src="assets/js/plugins/leaflet/Icon.Label.js"></script>
			<script src="assets/js/plugins/leaflet/Icon.Label.Default.js"></script>

			<script src="assets/js/plugins/toastr/toastr.min.js"></script>
			<script src="assets/js/plugins/yspeed.js"></script>			
			<script src="assets/js/plugins/md5/jquery.md5.js"></script>			

<!--			<script src="assets/js/plugins/leaflet/google.js"></script>-->
			<script src="assets/js/plugins/leaflet/Leaflet.GoogleMutant.js"></script>

			<script src="assets/js/apps/commons/commons.js"></script>
			<script src="assets/js/plugins/underscore-min.js"></script>
			<script src="assets/js/plugins/notifications/notify.js"></script>
			<script src="assets/js/plugins/ui/moment/moment-timezone.js"></script>
			<script src="assets/js/plugins/ui/moment/moment-timezone-with-data.min.js"></script>
			
			<script src="assets/js/plugins/Leafletmarkercluster/dist/leaflet.markercluster.js"></script>							
			<script src="assets/js/plugins/leaflet/jquery.geo-1.0.0-b2.min.js"></script>			

			<script src="assets/js/plugins/jquery.mask.min.js"></script>					

			<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.10.1/lodash.min.js"></script>

			<script src="assets/js/apps/general.js"></script>
			
			<script src="assets/js/plugins/jquery.cookie.js"></script>

			<script src="assets/js/apps/dashboards/dashboard.js"></script>

			<footer style="display:none">
				<div class="container-fluid">
					<p class="copyright">
						&copy; 2019. <a href="http://pigpstracker.com" target="_blank">PiGPS Tracking System</a>
					</p>
				</div>
			</footer>
		</div>
		<!-- END MAIN -->
		</div>
		<!-- END WRAPPER -->
	</body>

</html>
