<?php	
	include_once "header.php";
?>			
		<!-- datatables buttons-->
		<link href="assets/js/plugins/tables/datatables3/datatables.min.css" rel="stylesheet" type="text/css">					

		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="container-fluid">
				<h3 class="page-title" data-i18n="mnu_users">Users</h3>
				<div class="panel panel-headline">
					<div class="panel-body">
						<ul class="nav nav-tabs">
						  <li class="active"><a data-toggle="tab" href="#tab_form" id="pane_form" data-i18n="title_data">Data</a></li>							  
						  <li><a data-toggle="tab" href="#tab_list" data-i18n="title_list">List</a></li>
						</ul>						
						<div class="tab-content">
						  <div id="tab_form" class="tab-pane fade in active">
						    <form id="form_data" method="post" action="#" enctype="application/x-www-form-urlencoded"  role="form" >

                                    <input type="text" id="id" name="id" style="display: none">									

            					    <div class="form-group">
									    <label for="name" style="font-weight:normal" data-i18n="title_name">Name</label>
										<input type="text" id="name" name="name" class="form-control" maxlength="80" placeholder="" />
								    </div>								    							   
								    
								    <div class="form-group">
									    <label for="email" style="font-weight:normal">Email</label>
										<input type="text" id="email" name="email" class="form-control" maxlength="120" placeholder="" />
								    </div>

									<div class="row">
							            <div class="col-md-4">								    
										    <div class="form-group">
											    <label for="password" style="font-weight:normal" data-i18n="title_password">Password</label>
												<input type="password" id="password" name="password" class="form-control" maxlength="20" placeholder="" />
										    </div>
										</div>
									</div>

									<div class="row">
							            <div class="col-md-3">										    
										    <div class="form-group">
							                    <label style="font-weight:normal" data-i18n="title_readonly">ReadOnly</label>
							                    <select class="select-search" id="readonly" name="readonly">	
							                    		<option value="" data-i18n="title_select2">Select an option...</option>										                    											                    											                    
									                    <option value="true" data-i18n="title_yes">Yes</option>											                    							                    
									                    <option value="false" data-i18n="title_no">No</option>							                    
							                    </select>
						                    </div>                                                                      
										</div>
									</div>

									<div class="row">
							            <div class="col-md-3">                                    
		                                    <div class="form-group" id="adminField">
							                    <label style="font-weight:normal" >Admin</label>
							                    <select class="select-search" id="administrator" name="administrator">	
							                    		<option value=""  data-i18n="title_select2">Select an option...</option>										                    											                    											                    
									                    <option value="true" data-i18n="title_yes">Yes</option>											                    							                    
									                    <option value="false" data-i18n="title_no">No</option>							                    
							                    </select>
						                    </div>										                                           
										</div>
									</div>

									<div class="row">
							            <div class="col-md-3">		
		                                    <div class="form-group">
							                    <label style="font-weight:normal" data-i18n="title_distance">Distance</label>
							                    <select class="select-search" id="distanceUnit" name="distanceUnit">		
							                    		<option value="" data-i18n="title_select2">Select an option...</option>									                    											                    											                    
									                    <option value="km" data-i18n="title_km">Kilometers</option>											                    
									                    <option value="mi" data-i18n="title_miles">Miles</option>
									                    <option value="nmi" data-i18n="title_nmi">Nautical mile</option>							                    
							                    </select>
						                    </div>
										</div>																				
										<div class="col-md-2">&nbsp;</div>
										<div class="col-md-4">
		                                    <div class="form-group">
											    <label for="document" style="font-weight:normal" data-i18n="title_document">CPF</label>
												<input type="text" id="document" name="document" class="form-control" maxlength="20" placeholder="" />
										    </div>
										</div>
										<div class="col-md-3">&nbsp;</div>
									</div>

									<div class="row">
							            <div class="col-md-3">						                    
						                    <div class="form-group">
							                    <label style="font-weight:normal" data-i18n="title_speed">Speed</label>
							                    <select class="select-search" id="speedUnit" name="speedUnit">	
							                    		<option value="" data-i18n="title_select2">Select an option...</option>										                    											                    											                    
									                    <option value="kn">Knots</option>											                    
									                    <option value="kmh">Km/h</option>
									                    <option value="mph">Mph</option>							                    
							                    </select>
						                    </div>
										</div>
										<div class="col-md-2">&nbsp;</div>
										<div class="col-md-7">
		                                    <div class="form-group">
											    <label for="address" style="font-weight:normal" data-i18n="title_address">Address</label>
												<input type="text" id="address" name="address" class="form-control" maxlength="50" placeholder="" />
										    </div>
										</div>
									</div>

								    <div class="row">
							            <div class="col-md-3">                                                       
								            <div class="form-group">
									            <label for="latitude" style="font-weight:normal" data-i18n="title_latitude">Latitude</label>
                                                <input type="text" id="latitude" name="latitude" class="form-control" maxlength="11" placeholder="" data-mask="(99) 9999-9999"/>
								            </div>
								        </div>
								        <div class="col-md-2">&nbsp;</div>
										<div class="col-md-7">
		                                    <div class="form-group">
											    <label for="neighborhood" style="font-weight:normal" data-i18n="title_neighborhood">Neighborhood</label>
												<input type="text" id="neighborhood" name="neighborhood" class="form-control" maxlength="50" placeholder="" />
										    </div>
										</div>
                                    </div>

									<div class="row">
							            <div class="col-md-3">
		                                    <div class="form-group">
											    <label for="model" style="font-weight:normal" data-i18n="title_longitude">Longitude</label>
												<input type="text" id="longitude" name="longitude" class="form-control" maxlength="11" placeholder="" />
										    </div>
										</div>
										<div class="col-md-2">&nbsp;</div>
										<div class="col-md-7">
		                                    <div class="form-group">
											    <label for="city" style="font-weight:normal" data-i18n="title_city">City</label>
												<input type="text" id="city" name="city" class="form-control" maxlength="50" placeholder="" />
										    </div>
										</div>
									</div>
									
									<div class="row">
							            <div class="col-md-2">
		                                    <div class="form-group">
											    <label for="contact" style="font-weight:normal">Zoom</label>
												<input type="text" id="zoom" name="zoom" class="form-control" maxlength="2" placeholder="" />
										    </div>
										</div>
										<div class="col-md-3">&nbsp;</div>
										<div class="col-md-2">
		                                    <div class="form-group">
											    <label for="state" style="font-weight:normal" data-i18n="title_state">State</label>
												<input type="text" id="state" name="state" class="form-control" maxlength="2" placeholder="" />
										    </div>
										</div>
										<div class="col-md-3">&nbsp;</div>
									</div>
																		
									<div class="row">
							            <div class="col-md-3">						                    						                    

											<div class="form-group" id="permissionField">
							                    <label style="font-weight:normal" data-i18n="title_register">register</label>
							                    <select class="select-search" id="register" name="register">	
							                    		<option value="" data-i18n="title_select2">Select an option...</option>										                    											                    											                    
									                    <option value="true" data-i18n="title_yes">Yes</option>											                    							                    
									                    <option value="false" data-i18n="title_no">No</option>							                    
							                    </select>
						                    </div>		     

											<div class="form-group" id="field_panel" style="display:none">
							                    <label style="font-weight:normal" data-i18n="title_app_default">App Default</label>
							                    <select class="select-search" id="panel" name="panel">	
							                    		<option value="" data-i18n="title_select2">Select an option...</option>										                    											                    											                    
									                    <option value="map" data-i18n="mnu_dashboard">Dashboard</option>
									                    <option value="communication" data-i18n="mnu_communication">Communicatiom</option>
							                    </select>
						                    </div>		     
										</div>
										<div class="col-md-2">&nbsp;</div>
										<div class="col-md-3">
		                                    <div class="form-group">
											    <label for="postal_code" style="font-weight:normal" data-i18n="title_postalcode">Postal Code</label>
												<input type="text" id="postal_code" name="postal_code" class="form-control" maxlength="7" placeholder="" />
										    </div>
										</div>
										<div class="col-md-4">&nbsp;</div>
									</div>

									<div class="row">
							            <div class="col-md-3">
		                                    <div class="form-group">
							                    <label style="font-weight:normal" data-i18n="title_disabled">Disabled</label>
							                    <select class="select-search" id="disabled" name="disabled">	
							                    		<option value="" data-i18n="title_select2">Select an option...</option>										                    											                    											                    
									                    <option value="true" data-i18n="title_yes">Yes</option>											                    							                    
									                    <option value="false" data-i18n="title_no">No</option>							                    
							                    </select>
						                    </div>		     
										</div>
										<div class="col-md-2">&nbsp;</div>
										<div class="col-md-3">
		                                    <div class="form-group">
											    <label for="phone" style="font-weight:normal" data-i18n="title_phone">Phone</label>
												<input type="text" id="phone" name="phone" class="form-control" maxlength="15" placeholder="" />
										    </div>
										</div>
										<div class="col-md-4">&nbsp;</div>
									</div>
                                    
                                    <div class="row" id="deviceLimitField">
							            <div class="col-md-2">							            	
		                                    <div class="form-group">
											    <label for="contact" style="font-weight:normal" data-i18n="title_device_limit">Device Limit</label>
												<input type="text" id="deviceLimit" name="deviceLimit" class="form-control" maxlength="11" placeholder="" />
										    </div>                                                                         
										</div>
									</div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary" name="btnSave"><span data-i18n="button_save">Save</span><i class="icon-arrow-right14 position-right"></i></button>
                                        &nbsp; &nbsp; &nbsp;
									    <button class="btn" type="reset" name="btnClear" > <i class="icon-undo bigger-110"></i> <span data-i18n="button_clear">Clear</span> </button>                                                           
                                    </div>                                                                                            
		                    </form>
						  </div>
						  <div id="tab_list" class="tab-pane fade">
						    <!--
						    <div class="panel-heading">							                            
	                            <div class="heading-elements">
		                            <ul class="icons-list">
    		                            <li><a data-action="reload" name="lnkRefreshGrid" title="Update"></a></li>
    	                            </ul>
	                            </div>
                         </div>-->

                            <table class="table datatable-js" id="datatable">
	                            <thead>
		                            <tr>
                                        <th data-i18n="title_list_id">ID</th>					          
                                        <th data-i18n="title_name">Name</th>
                                        <th>Email</th>                                                                                                                      
										<th data-i18n="title_city">City</th>                                                                                                 
										<th data-i18n="title_state">State</th>
                                        <th data-i18n="title_disabled">Disabled</th>                                        
										<th data-i18n="title_register">Register</th>                                        
                                        <th>&nbsp;</th>
                                    </tr>
	                            </thead>
                            </table>
						  </div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<!-- END MAIN CONTENT -->

	<!-- Javascript -->
	<script src="assets/js/jquery/jquery-2.1.0.min.js"></script>
	<script src="assets/js/bootstrap/bootstrap.min.js"></script>
	<script src="assets/js/plugins/toastr/toastr.min.js"></script>
	<script src="assets/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="assets/js/plugins/ui/moment/moment_locales.min.js"></script>
	<script src="assets/js/klorofil.min.js"></script>
	<!-- datatable export -->	
	<script src="assets/js/plugins/tables/datatables3/datatables.min.js"></script>
	<script src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<script src="assets/js/plugins/forms/inputs/autosize.min.js"></script>
	<script src="assets/js/plugins/forms/inputs/formatter.min.js"></script>
	<script src="assets/js/plugins/forms/validation/validate.min.js"></script>
	<script src="assets/js/plugins/i8n/jquery.i18n.js"></script>
	<script src="assets/js/plugins/i8n/jquery.i18n.messagestore.js"></script>
	<script src="assets/js/apps/i8n.js"></script>
	<script src="assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="assets/js/plugins/forms/styling/switch.min.js"></script>

	<script src="assets/js/plugins/yspeed.js"></script>		
	<script src="assets/js/plugins/underscore-min.js"></script>
		            	
	<script src="assets/js/apps/general.js"></script>			
	<script src="assets/js/apps/commons/users.js"></script>
	

<?php
	include_once "footer.php";
?>