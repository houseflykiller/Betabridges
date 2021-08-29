<?php	
	include_once "header.php";
?>
	<!-- Bootstrap Material Datetime Picker Css -->
	<link href="assets/js/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
	
	<!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    
    <!-- datatables buttons-->
	<link href="assets/js/plugins/tables/datatables3/datatables.min.css" rel="stylesheet" type="text/css">
	
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title" data-i18n="title_reports_events">Reports Events</h3>
			<div class="panel panel-headline">
				<div class="panel-body">
					
					<div class="tab-content">							  
					    <form id="form_report" method="post" action="#" enctype="application/x-www-form-urlencoded"  role="form" >
    					     
    					    <div class="form-group">
			                    <label style="font-weight:normal"  data-i18n="title_device">Device</label>
			                    <select class="select-search" id="deviceId" name="deviceId" multiple="multiple">											                    											                    											                    
					                    <option value=""  data-i18n="title_select2">Select an option</option>											                    
			                    </select>
		                    </div>
		                    
		                    <div class="form-group">
			                    <label style="font-weight:normal"  data-i18n="title_group">Group</label>
			                    <select class="select-search" id="groupId" name="groupId" multiple="multiple">											                    											                    											                    
					                    <option value="" data-i18n="title_select2">Select an option</option>											                    
			                    </select>
		                    </div>
		                    
		                    <div class="form-group">
			                    <label style="font-weight:normal" data-i18n="title_event_type">Event Type</label>
			                    <select class="select-search" id="type" name="type" multiple="multiple">											                    											                    											                    
					                    <option value="" data-i18n="title_select2">Select an option</option>
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
		                  
						    <div class="row">
					            <div class="col-md-4">                                                       
						            <div class="form-group">
							            <label for="from" style="font-weight:normal" data-i18n="title_period">From</label>
                                        <input type="text" id="from" name="from" class="form-control datetimepicker" maxlength="20" placeholder="" data-mask="99/99/9999 99:99:99" /> To
                                        <input type="text" id="to" name="to" class="form-control datetimepicker" maxlength="20" placeholder=""  data-mask="99/99/9999 99:99:99" /> 
						            </div>
						        </div>
                            </div>									                                                                                                                                                      
																			   
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary" name="btnGenerate"><span data-i18n="button_generate">Generate</span><i class="icon-arrow-right14 position-right"></i></button>
                                &nbsp; &nbsp; &nbsp;
							    <button class="btn" type="reset" name="btnClear" > <i class="icon-undo bigger-110"></i> <span data-i18n="button_clear">Clear</span> </button>                                                           
                            </div>                                                                                            
                    </form>
                    <hr />
                    
				    <table class="table datatable-js" id="datatable">
                        <thead>
                            <tr>                   
                            	<th data-i18n="title_time">Time</th>					          
                                <th data-i18n="title_device_name">Device Name</th>
                                <th data-i18n="title_type">Type</th>                                                                              
                                <th data-i18n="title_geofence">Geofence</th>                             	                                                                                                                                         
                            </tr>
                        </thead>
                    </table>							  							
				</div>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->

	<!-- Javascript -->
	<script src="assets/js/jquery/jquery-2.1.0.min.js"></script>
	<script src="assets/js/bootstrap/bootstrap.min.js"></script>
	<script src="assets/js/plugins/toastr/toastr.min.js"></script>
	<script src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="assets/js/plugins/forms/styling/uniform.min.js"></script>                	           
	<script src="assets/js/plugins/forms/inputs/autosize.min.js"></script>
	<script src="assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="assets/js/plugins/ui/moment/moment_locales.min.js"></script>
    <script src="assets/js/plugins/ui/moment/moment-timezone.js"></script>
	<!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="assets/js/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>	            	
	<script src="assets/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/js/plugins/forms/inputs/formatter.min.js"></script>		
	<script src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<script src="assets/js/plugins/forms/inputs/autosize.min.js"></script>
	<script src="assets/js/plugins/forms/inputs/formatter.min.js"></script>
	<script src="assets/js/plugins/yspeed.js"></script>		
	<script src="assets/js/plugins/underscore-min.js"></script>	            			
	<script src="assets/js/plugins/forms/validation/validate.min.js"></script>
	<script src="assets/js/plugins/i8n/jquery.i18n.js"></script>
	<script src="assets/js/plugins/i8n/jquery.i18n.messagestore.js"></script>
	<script src="assets/js/apps/i8n.js"></script>
	<script src="assets/js/klorofil.min.js"></script>
	
	<!-- datatable export -->	
	<script src="assets/js/plugins/tables/datatables3/datatables.min.js"></script>
	
	<script src="assets/js/apps/general.js"></script>	
	<script src="assets/js/apps/commons/events.js"></script>
	

<?php
	include_once "footer.php";
?>