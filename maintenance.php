	<?php	
	include_once "header.php";
?>
<!-- datatables buttons-->
			<link href="assets/js/plugins/tables/datatables3/datatables.min.css" rel="stylesheet" type="text/css">					

			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title" data-i18n="mnu_maintenance">Maintenance</h3>
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
											<input type="text" id="type" name="type" value="odometer" style="display: none">
                					     
                					    <div class="form-group">
										    <label for="name" style="font-weight:normal" data-i18n="title_name">Name</label>
											<input type="text" id="name" name="name" class="form-control" maxlength="80" placeholder="" />
									    </div>
									    
										<div class="form-group">
										    <label for="description" style="font-weight:normal" data-i18n="title_description">Description</label>
											<textarea id="description" name="description" class="form-control" maxlength="250" rows="4"></textarea>
									    </div>	    			
									    
					              <div class="row">
								            <div class="col-md-2">                                                       
									            <div class="form-group">
										            <label for="start" style="font-weight:normal" data-i18n="title_period">From</label>
										            <div class="input-group mb-2 mr-sm-2 mb-sm-0">										            	
	                                <input type="text" id="start" name="start" class="form-control" maxlength="9" placeholder=""  pattern= "[0-9]"/>
	                              <div class="input-group-addon"><span class="distanceUnit"></span></div>
	                            </div>
									          </div>
									        </div>
                        </div>                                             									    																										                                                                             

												<div class="row">
								            <div class="col-md-2">                                                       
									            <div class="form-group">
										            <label for="period" style="font-weight:normal" data-i18n="title_to">To</label>
										            <div class="input-group mb-2 mr-sm-2 mb-sm-0">										            	
	                                <input type="text" id="period" name="period" class="form-control" maxlength="9" placeholder=""  pattern= "[0-9]"/>
	                              <div class="input-group-addon"><span class="distanceUnit"></span></div>
	                            </div>
									          </div>
									        </div>
                        </div> 

												<div class="form-group">
													<label style="font-weight:normal" data-i18n="title_device">Device</label>
													<select class="select-search" id="deviceId" name="deviceId">											                    											                    											                    
															<option value="" data-i18n="title_select2">Select a vehicle...</option>											                    
													</select>
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
																						<th data-i18n="title_device">Device</th>
																						<th data-i18n="title_start">Start</th>
																						<th data-i18n="title_period">Period</th>
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
	<script src="assets/js/klorofil.min.js"></script>
	<script src="assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="assets/js/plugins/ui/moment/moment_locales.min.js"></script>
	<!-- datatable export -->	
	<script src="assets/js/plugins/tables/datatables3/datatables.min.js"></script>
	<script src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/inputs/autosize.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/inputs/formatter.min.js"></script>
	<script src="assets/js/plugins/forms/validation/validate.min.js"></script>
	<script src="assets/js/plugins/i8n/jquery.i18n.js"></script>
	<script src="assets/js/plugins/i8n/jquery.i18n.messagestore.js"></script>
	<script src="assets/js/apps/i8n.js"></script>
	            	
	<script src="assets/js/apps/general.js"></script>			
	<script src="assets/js/apps/commons/maintenance.js"></script>
	
	
	<?php
	include_once "footer.php";
?>