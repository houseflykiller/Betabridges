<?php
	include_once "header.php"; ?>
		
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
		<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
		<!-- MAIN CONTENT -->
		<div class="main-content">
			<div class="container-fluid">
				<h3 class="page-title">Server</h3>
				<div class="panel panel-headline">
					<div class="panel-body">
						<ul class="nav nav-tabs">
						  <li class="active"><a data-toggle="tab" href="#tab_form" id="pane_form" data-i18n="title_data">Data</a></li>
						  <li><a data-toggle="tab" href="#tab_terms" data-i18n="title_terms">Terms</a></li>
						</ul>
						<div class="tab-content">
							<div id="tab_form" class="tab-pane fade in active">
								<form id="form_data" method="post" action="#" enctype="application/x-www-form-urlencoded" 
role="form" >
										<input type="text" id="id" name="id" style="display: none">
										
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label style="font-weight:normal; 
font-size:xx-large">Server</label>
													<span id="version"></span>
												</div>
											</div>
											
											<div class="col-md-2">
												&nbsp;
											</div>
											
											<div class="col-md-6">
												<div class="form-group">
													<label style="font-weight:normal; 
font-size:xx-large">Licence Details</label><br />
													<!--<span id="app_version"></span>-->
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label style="font-weight:normal" >Registration</label>
													<select class="select-search" id="registration" 
name="registration">
															<option value="">Select an 
option</option>
															<option value="true">Yes</option>
															<option value="false">No</option>
													</select>
												</div>
											</div>
											<div class="col-md-2"></div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="name" 
style="font-weight:normal">Name</label>
													<input type="text" id="name" name="name" 
class="form-control" maxlength="60" placeholder="" readonly="readonly" />
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label style="font-weight:normal" >ReadOnly</label>
													<select class="select-search" id="readonly" 
name="readonly">
															<option value="">Select an 
option</option>
															<option value="true">Yes</option>
															<option value="false">No</option>
													</select>
												</div>
											</div>
											<div class="col-md-2">&nbsp;</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="city" 
style="font-weight:normal">City</label>
													<input type="text" id="city" name="city" 
class="form-control" maxlength="60" placeholder="" readonly="readonly"/>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label style="font-weight:normal" >Distance</label>
													<select class="select-search" id="distanceUnit" 
name="distanceUnit">
															<option value="">Select an 
option</option>
															<option value="km">Kilometers</option>
															<option value="mi">Miles</option>
															<option value="nmi">Nautical 
mile</option>
													</select>
												</div>
											</div>
											<div class="col-md-2">&nbsp;</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="state" 
style="font-weight:normal">State</label>
													<input type="text" id="state" name="state" 
class="form-control" maxlength="2" placeholder="" readonly="readonly"/>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label style="font-weight:normal" >Speed</label>
													<select class="select-search" id="speedUnit" 
name="speedUnit">
															<option value="">Select an 
option</option>
															<option value="kn">Knots</option>
															<option value="kmh">Km/h</option>
															<option value="mph">Mph</option>
													</select>
												</div>
											</div>
											<div class="col-md-2">&nbsp;</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="phone" 
style="font-weight:normal">Phone</label>
													<input type="text" id="phone" name="phone" 
class="form-control" maxlength="15" placeholder="" readonly="readonly"/>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="latitude" 
style="font-weight:normal">Latitude</label>
													<input type="text" id="latitude" name="latitude" 
class="form-control" maxlength="11" placeholder="" data-mask="(99) 9999-9999"/>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<img src='assets/img/icons/default.png' 
onclick="getLocation()" style="height: 32px; width: 32px; vertical-align:sub" title="Get Geolocation" />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="email" 
style="font-weight:normal">Email</label>
													<input type="text" id="email" name="email" 
class="form-control" maxlength="150" placeholder="" readonly="readonly"/>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="model" 
style="font-weight:normal">Longitude</label>
													<input type="text" id="longitude" name="longitude" 
class="form-control" maxlength="11" placeholder="" />
												</div>
											</div>
											<div class="col-md-2">&nbsp;</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="logomark" 
style="font-weight:normal">Logo</label><br />
													<img id="preview_logomark" src="#" style="cursor: 
pointer; width: 175px; height: 45px;" /><br />
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="contact" 
style="font-weight:normal">Zoom</label>
													<input type="text" id="zoom" name="zoom" 
class="form-control" maxlength="2" placeholder="" />
												</div>
											</div>
											<div class="col-md-2">&nbsp;</div>
											<div class="col-md-6">
											<div class="form-group">
													<label for="appkey" style="font-weight:normal">App 
Key</label>
													<textarea type="text" id="appkey" name="appkey" 
class="form-control" rows="2" ></textarea>
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-4">
											<div class="form-group">
													<label style="font-weight:normal" >Message Load 
Position</label>
													<select class="select-search" 
id="message_load_positions" name="message_load_positions">
															<option value="">Select an 
option</option>
															<option value="1">Yes</option>
															<option value="0">No</option>
													</select>
												</div>
											</div>
											<div class="col-md-2">&nbsp;</div>
											<div class="col-md-6">
												
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="facebook" 
style="font-weight:normal">Facebook</label>
													<input type="text" id="facebook" name="facebook" 
class="form-control" maxlength="80" placeholder="" /><br />
													<span style="font-size: 10px">* 
https://www.facebook.com/</span>
												</div>
											</div>
											<div class="col-md-2">&nbsp;</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="smtp_server" style="font-weight:normal">Smtp 
Server</label>
													<input type="text" id="smtp_server" name="smtp_server" 
class="form-control" maxlength="150" placeholder="" />
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="support" style="font-weight:normal">Support 
App</label>
													<input type="text" id="support" name="support" 
class="form-control" maxlength="150" placeholder="" /><br />
													<span style="font-size: 10px">* Address of Platform Wiki 
/ Support</span>
												</div>
											</div>
											<div class="col-md-2">&nbsp;</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="smtp_port" style="font-weight:normal">SMTP 
Port</label>
													<input type="text" id="smtp_port" name="smtp_port" 
class="form-control" maxlength="5" placeholder="" />
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="googleplus" 
style="font-weight:normal">Google+</label>
													<input type="text" id="googleplus" name="googleplus" 
class="form-control" maxlength="150" placeholder="" /><br />
													<span style="font-size: 10px">* 
https://plus.google.com/</span>
												</div>
											</div>
											<div class="col-md-2">&nbsp;</div>
											<div class="col-md-6">
												<div class="form-group">
													<label style="font-weight:normal" >SMTP AUTH?</label>
													<select class="select-search" id="smtp_auth" 
name="smtp_auth">
															<option value="">Select an 
option</option>
															<option value="true">YES</option>
															<option value="false">NO</option>
													</select>
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="twitter" 
style="font-weight:normal">Twitter</label>
													<input type="text" id="twitter" name="twitter" 
class="form-control" maxlength="80" placeholder="" /><br />
													<span style="font-size: 10px">* 
https://twitter.com/</span>
												</div>
											</div>
											<div class="col-md-2">&nbsp;</div>
											<div class="col-md-6">
												<div class="form-group">
													<label style="font-weight:normal" >SMTP SECURE</label>
													<select class="select-search" id="smtp_ssl" 
name="smtp_ssl">
															<option value="">Select an 
option</option>
															<option value="ssl">SSL</option>
															<option value="tls">TLS</option>
															<option value="">NONE</option>
													</select>
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="website" 
style="font-weight:normal">Website</label>
													<input type="text" id="website" name="website" 
class="form-control" maxlength="180" placeholder="" /><br />
												</div>
											</div>
											<div class="col-md-2">&nbsp;</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="smtp_username" 
style="font-weight:normal">SMTP Username</label>
													<input type="text" id="smtp_username" 
name="smtp_username" class="form-control" maxlength="150" placeholder="" />
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="playstore" style="font-weight:normal">App 
PlayStore</label>
													<input type="text" id="playstore" name="playstore" 
class="form-control" maxlength="150" placeholder="" /><br />
												</div>
											</div>
											<div class="col-md-2">&nbsp;</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="smtp_password" 
style="font-weight:normal">SMTP Password</label>
													<input type="password" id="smtp_password" 
name="smtp_password" class="form-control" maxlength="20" placeholder="" />
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="applestore" style="font-weight:normal">App 
AppleStore</label>
													<input type="text" id="applestore" name="applestore" 
class="form-control" maxlength="150" placeholder="" /><br />
												</div>
											</div>
											<div class="col-md-2">&nbsp;</div>
											<div class="col-md-6">
												<!--<div class="form-group">
													<span style="font-size: 10px" 
data-i18n="title_user_admin_sub"> Used in administrative functions for ordinary users.</span><br />
													<label for="user_admin" style="font-weight:normal">Email 
Admin</label>
													<input type="text" id="user_admin" name="user_admin" 
class="form-control" maxlength="150" placeholder="" /><br />
												</div>-->
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-4">
											<div class="form-group">
													<label for="playstore" style="font-weight:normal">Time 
Update</label>
													<input type="text" id="map_refresh" name="map_refresh" 
class="form-control" maxlength="2" placeholder="" /><br />
													<span style="font-size: 10px">* In seconds</span>
												</div>
											</div>
											<div class="col-md-2">&nbsp;</div>
											<div class="col-md-6">
												<!--<div class="form-group">
													<label for="pass_admin" 
style="font-weight:normal">Password Admin</label>
													<input type="password" id="pass_admin" name="pass_admin" 
class="form-control" maxlength="20" placeholder="" />
												</div>-->
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
											<div class="form-group">
												<label style="font-weight:normal" >Enable Google Maps</label>
													<select class="select-search" id="google_maps" 
name="google_maps">
															<option value="">Select an 
option</option>
															<option value="true" 
data-i18n="title_yes">Yes</option>
															<option value="false" 
data-i18n="title_no">No</option>
													</select>
												</div>
											</div>
											<div class="col-md-2">&nbsp;</div>
											<div class="col-md-6">
												&nbsp;
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-4">&nbsp;</div>
											<div class="col-md-2">&nbsp;</div>
											<div class="col-md-6">
												<div class="text-right">
													<button type="submit" class="btn btn-primary" 
name="btnSave">Save<i class="icon-arrow-right14 position-right"></i></button>
													&nbsp; &nbsp; &nbsp;
													<button class="btn" type="reset" name="btnClear" > <i 
class="icon-undo bigger-110"></i> Clear </button>
												</div>
											</div>
										</div>
								</form>
							</div>
							<div id="tab_terms" class="tab-pane fade">
							<form id="form_terms" method="post" action="#" enctype="application/x-www-form-urlencoded" role="form" >
									
									<div class="row">
										<div class="form-group">
											<textarea id="term" name="term" class="form-control" rows="20" 
placeholder=""></textarea>
										</div>
									</div>
									
									<div class="row">
										<div class="text-right">
											<button type="button" class="btn btn-primary" name="btnSaveTerm">Save<i 
class="icon-arrow-right14 position-right"></i></button>
										</div>
									</div>
								</form>
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
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
		            	
	<script src="assets/js/apps/general.js"></script>
	<script src="assets/js/apps/commons/server.js"></script>
	
<?php
	include_once "footer.php";
?>
