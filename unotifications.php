<?php	
	include_once "header.php";
?>
			
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Notifications</h3>
					<div class="panel panel-headline">
						<div class="panel-body">												
							<div class="tab-content" style="height: 1200px">							  
							    <form id="form_data" method="post" action="#" enctype="application/x-www-form-urlencoded"  role="form" >
							    	
							    	<div class="row">
					            		<div class="col-md-4">                 					     
		            					    <div class="form-group">
							                    <label style="font-weight:normal" >Find User</label>
							                    <select class="select-find" id="userId" name="userId">											                    											                    											                    
									                    <option value="">Select an option</option>											                    
							                    </select>
						                    </div>
						                </div>    
								    </div>
								    <hr />
								    
								    <table class="table datatable-js" id="datatable">
			                            <thead>
				                            <tr>
	                                            <th>Type of Notification</th>					          
	                                            <th>Send via Web</th>
	                                            <th>Send via Mail</th>
												<th>Send via SMS</th>
	                                        </tr>
			                            </thead>
		                            </table>
								                                                                           
																					   
                                    <div class="text-right">                                        
									    <button class="btn" type="reset" name="btnClear" > <i class="icon-undo bigger-110"></i> Reset </button>                                                           
                                    </div>                                                                                            
			                    </form>							  						 
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
	<script src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>	
	<script src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/inputs/autosize.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/inputs/formatter.min.js"></script>
	<script src="assets/js/plugins/forms/validation/validate.min.js"></script>
	<script src="assets/js/plugins/i8n/jquery.i18n.js"></script>
	<script src="assets/js/plugins/i8n/jquery.i18n.messagestore.js"></script>
	<script src="assets/js/apps/i8n.js"></script>
	<script src="assets/js/plugins/yspeed.js"></script>		
	<script src="assets/js/plugins/underscore-min.js"></script>
	<script src="assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="assets/js/plugins/forms/styling/switch.min.js"></script>
		            	
	<script src="assets/js/apps/general.js"></script>			
	<script src="assets/js/apps/commons/unotifications.js"></script>
	

<?php
	include_once "footer.php";
?>