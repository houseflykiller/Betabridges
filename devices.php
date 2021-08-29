<?php
	include_once "header.php"; ?>
			<!-- datatables buttons-->
			<link href="assets/js/plugins/tables/datatables3/datatables.min.css" rel="stylesheet" type="text/css">
			
<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title" data-i18n="mnu_devices">Devices</h3>
					<div class="panel panel-headline">
						<div class="panel-body">
							
							<ul class="nav nav-tabs">
							  <li class="active"><a data-toggle="tab" href="#tab_form" id="pane_form" 
data-i18n="title_data">Data</a></li>
							  <li><a data-toggle="tab" href="#tab_list" data-i18n="title_list">List</a></li>
							</ul>
							<div class="tab-content">
							  <div id="tab_form" class="tab-pane fade in active">
							    <form id="form_data" method="post" action="#" enctype="application/x-www-form-urlencoded" 
role="form" >
                                        <input type="text" id="id" name="id" style="display: none">
										<div class="row">
											<div class="col-md-4" id="field_photo">
												<div class="form-group">
													<img id="preview_photo" src="#" title="Click to upload a 
photo." style="float: right;"/>
													<input type="file" id="fileUpload" value="" 
style="display:none; height:65px; "/>
												</div>
											</div>
										</div>
									    <div class="row">
								            <div class="col-md-8">
												<div class="form-group">
													<label for="name" style="font-weight:normal" 
data-i18n="title_name">Name</label>
													<input type="text" id="name" name="name" 
class="form-control" maxlength="80" placeholder="" />
												</div>
											</div>
										</div>
									    
									    <div class="row">
								            <div class="col-md-4">
									            <div class="form-group">
										            <label for="uniqueId" style="font-weight:normal" 
data-i18n="title_identifier">Identifier</label>
	                                                <input type="text" id="uniqueId" name="uniqueId" class="form-control" maxlength="50" placeholder="" />
									            </div>
									        </div>
                                        </div>
									    <div class="row">
								            <div class="col-md-3">
									            <div class="form-group">
										            <label for="phone" style="font-weight:normal" 
data-i18n="title_phone">Phone</label>
	                                                <input type="text" id="phone" name="phone" class="form-control" maxlength="15" placeholder="" 
data-mask="(99) 9999-9999"/>
									            </div>
									        </div>
                                        </div>
                                        <div class="form-group">
										    <label for="model" style="font-weight:normal" 
data-i18n="title_model">Model</label>
											<input type="text" id="model" name="model" class="form-control" 
maxlength="50" placeholder="" />
									    </div>
										<div class="row">
								            <div class="col-md-2">
									            <div class="form-group">
										            <label for="plate" style="font-weight:normal" 
data-i18n="title_plate">Plate</label>
	                                                <input type="text" id="plate" name="plate" class="form-control" maxlength="15" placeholder="" />
									            </div>
									        </div>
                                        </div>
                                        <div class="form-group">
										    <label for="contact" style="font-weight:normal" 
data-i18n="title_contact">Contact</label>
											<input type="text" id="contact" name="contact" class="form-control" 
maxlength="50" placeholder="" />
									    </div>
                                        <div class="form-group">
						                    <label style="font-weight:normal" data-i18n="title_category">Category</label>
						                    <select class="select-search" id="category" name="category">
								                    <option value="" data-i18n="title_select2">Select an option ...</option>
						                    </select>
					                    </div>
					                    
					                    <div class="form-group">
						                    <label style="font-weight:normal" data-i18n="title_group">Group</label>
						                    <select class="select-search" id="groupId" name="groupId">
								                    <option value="" data-i18n="title_select2">Select an option ...</option>
						                    </select>
					                    </div>
					                    					                    
					                    <div class="row">
					                    	<div class="col-md-4">
							                    <div class="form-group">
								                    <label style="font-weight:normal" data-i18n="title_fuel">Fuel</label>
								                    <select class="select-search" id="fuel" name="fuel">
										                    <option value="" data-i18n="title_select2">Select an option 
...</option>
															<option value="flex" >Flex</option>
										                    <option value="gasoline" 
data-i18n="title_gasoline">Gasoline</option>
										                    <option value="alcohol" 
data-i18n="title_alcohol">Alcohol</option>
										                    <option value="diesel" 
data-i18n="title_diesel">Diesel</option>
										                    <option value="gnv" data-i18n="title_gnv">GNV</option>
								                    </select>
							                    </div>
						                    </div>
						                    
								            <div class="col-md-2">
									            <div class="form-group">
										            <label for="autonomy" style="font-weight:normal" 
data-i18n="title_autonomy">Autonomy</label>
										            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
	                                                	<input type="text" id="autonomy" name="autonomy" class="form-control" maxlength="2" 
placeholder=""/>
	                                                	<div class="input-group-addon"><span>Km/l</span></div>
	                                                </div>
									            </div>
									        </div>
                                        </div>
					                    
					                    <div class="row">
					                    	<div class="col-md-4">
							                    <div class="form-group">
								                    <label style="font-weight:normal" data-i18n="title_input1">Input 1</label>
								                    <select class="select-search" id="input1" name="input1">
										                    <option value="" data-i18n="title_select2">Select an option 
...</option>
										                    <option value="door" data-i18n="title_door">Door</option>
										                    <option value="bucket" 
data-i18n="title_bucket">Bucket</option>
										                    <option value="winch" data-i18n="title_winch">Whinc</option>
										                    <option value="chest" data-i18n="title_chest">Chest</option>
										                    <option value="fuel_port" data-i18n="title_fuel_port">Fuel 
Port</option>
										                    <option value="press" data-i18n="title_press">Hydraulic 
press</option>
								                    </select>
							                    </div>
						                    </div>
						                    
								            <div class="col-md-4">
									            <div class="form-group">
										            <label style="font-weight:normal" 
data-i18n="title_input2">Input2</label>
								                    <select class="select-search" id="input2" name="input2">
										                    <option value="" data-i18n="title_select2">Select an option 
...</option>
										                    <option value="door" data-i18n="title_door">Door</option>
										                    <option value="bucket" 
data-i18n="title_bucket">Bucket</option>
										                    <option value="winch" data-i18n="title_winch">Whinc</option>
										                    <option value="chest" data-i18n="title_chest">Chest</option>
										                    <option value="fuel_port" data-i18n="title_fuel_port">Fuel 
Port</option>
										                    <option value="press" data-i18n="title_press">Hydraulic 
press</option>
								                    </select>
									            </div>
									        </div>
                                        </div>
					                    
					                    <div class="row">
								            <div class="col-md-2">
									            <div class="form-group">
										            <label for="speedLimit" style="font-weight:normal" 
data-i18n="title_speedlimit">Speed Limit</label>
										            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
	                                                	<input type="text" id="speedLimit" name="speedLimit" class="form-control" maxlength="3" 
placeholder="" pattern= "[0-9]"/>
	                                                	<div class="input-group-addon"><span id="speedUnit"></span></div>
	                                                </div>
									            </div>
									        </div>
                                        </div>
										<div class="row">
											<h2>Attributes</h2>
										</div>
										<div class="row">
					                    	<div class="col-md-4">
							                    <div class="form-group">
								                    <label style="font-weight:normal">GT06 Alternativo</label>
								                    <select class="select-search" id="gt06" name="gt06">
										                    <option value="" data-i18n="title_select2">Select an option 
...</option>
										                    <option value="true" >Yes</option>
										                    <option value="false" >No</option>
								                    </select>
							                    </div>
						                    </div>
						                    
								            <div class="col-md-4">
									            <div class="form-group">
													<label style="font-weight:normal">G05 
Alternativo</label>
								                    <select class="select-search" id="h02" name="h02">
										                    <option value="" data-i18n="title_select2">Select an option 
...</option>
										                    <option value="true" >Yes</option>
										                    <option value="false" >No</option>
								                    </select>
									            </div>
									        </div>
											
                                        </div>
										<div class="row">
											<hr />
										</div>
										<div class="row">
					                    	<div class="col-md-4">
							                    <div class="form-group">
								                    <label style="font-weight:normal">Lock on entering the fence</label>
								                    <select class="select-search" id="lockOnEnter" name="lockOnEnter">
										                    <option value="" data-i18n="title_select2">Select an option 
...</option>
										                    <option value="true" >Yes</option>
										                    <option value="false" >No</option>
								                    </select>
							                    </div>
						                    </div>
						                    
								            <div class="col-md-4">
												<div class="form-group">
								                    <label style="font-weight:normal">Lock out of the fence</label>
								                    <select class="select-search" id="lockOnExit" name="lockOnExit">
										                    <option value="" data-i18n="title_select2">Select an option 
...</option>
										                    <option value="true" >Yes</option>
										                    <option value="false" >No</option>
								                    </select>
							                    </div>
									        </div>
											
                                        </div>
																						   
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary" name="btnSave"><span data-i18n="button_save">Save</span><i 
class="icon-arrow-right14 position-right"></i></button>
                                            &nbsp; &nbsp; &nbsp;
										    <button class="btn" type="reset" name="btnClear" > <i class="icon-undo 
bigger-110"></i> <span data-i18n="button_clear">Clear</span> </button>
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
											<th data-i18n="title_group">Group</th>
                                            <th data-i18n="title_identifier">UniqueId</th>
                                            <th data-i18n="title_category">Category</th>
                                            <th data-i18n="title_model">Model</th>
											<th data-i18n="title_plate">Plate</th>
                                            <th data-i18n="title_phone">Phone</th>
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
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" id="displayPhoto" data-target="#displayPhotoModal" 
style="display:none">&nbsp;</button>
			<!-- Modal -->
			<div class="modal fade" id="displayPhotoModal" tabindex="-1" role="dialog" aria-labelledby="displayPhotoModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h2 class="modal-title" id="displayPhotoTitle"></h2>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<img id="displayPhotoPreview" src="" />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
	<script src="assets/js/plugins/yspeed.js"></script>
	<script src="assets/js/plugins/underscore-min.js"></script>
		            	
	<script src="assets/js/apps/general.js"></script>
	<script src="assets/js/apps/commons/devices.js"></script>
	
<?php
	include_once "footer.php";
?>
