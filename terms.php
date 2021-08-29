<?php	
	include_once "header.php";
?>			
		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="container-fluid">
				<h3 class="page-title" data-i18n="register_title_terms">Terms of Use</h3>
				<div class="panel panel-headline">
					<div class="panel-body">											
						<div class="tab-content">						  
						    <p align="justify">
							<?php 
								$filename = "eula.txt";
								$fp = fopen($filename, "r");

								$content = fread($fp, filesize($filename));
								echo str_replace('\n', '<br />', $content);
								fclose($fp);
								//print_r($lines);
							
							?>
							</p>				  						 
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
	<script src="assets/js/plugins/forms/inputs/autosize.min.js"></script>
	<script src="assets/js/plugins/forms/inputs/formatter.min.js"></script>
	<script src="assets/js/plugins/forms/validation/validate.min.js"></script>
	<script src="assets/js/plugins/i8n/jquery.i18n.js"></script>
	<script src="assets/js/plugins/i8n/jquery.i18n.messagestore.js"></script>
	<script src="assets/js/apps/i8n.js"></script>

	<script src="assets/js/plugins/yspeed.js"></script>		
	<script src="assets/js/plugins/underscore-min.js"></script>
		            	
	<script src="assets/js/apps/general.js"></script>			
	<script src="assets/js/apps/commons/terms.js"></script>
	

<?php
	include_once "footer.php";
?>