var dataSet = [];

var alarms_type = {
    "general": "General",
    "sos": "SOS",
    "vibration": "Vibration",
    "movement": "Movement",
    "lowspeed": "Low Speed",
    "overspeed": "Over Speed",
    "fallDown": "Fall Down",
    "lowPower": "Low Power",
    "lowBattery": "Low Battery",
    "fault": "Fault",
    "powerOff": "Power off",
    "powerOn": "Power on",
    "door": "Door",
    "lock": "Lock",
    "unlock": "Unlock",
    "geofence": "Geofence",
    "geofenceEnter": "Entering the Geofence",
    "geofenceExit": "Exiting Geofene",
    "gpsAntennaCut": "GPS antenna cut",
    "accident": "Accident",
    "tow": "Tow",
    "idle": "Idle",
    "highRpm": "High RPM",
    "hardAcceleration": "Hard Acceleration",
    "hardBraking": "Abrupt braking",
    "hardCornering": "Hard Cornering",
    "laneChange": "Lane Change",
    "gatigueDriving": "Tired Driver",
    "powerCut": "Power Cut",
    "powerRestored": "Power Restored",
    "jamming": "Interference",
    "temperature": "Temperature",
    "parking": "Parking",
    "shock": "Shock",
    "bonnet": "Cover´",
    "footBrake": "Hand brake",
    "fuelLeak": "Fuel leak",
    "tampering": "Tempering",
    "removing": "Removing"
}

$(document).ready(function () {

	/**
	 * Check status of session of user
	 */
	checkSession();
	
    localFormClear();

    loadSwitchery();

    /**
     * parameters this page
     */

     
    //Datetimepicker plugin
    $('.datetimepicker').bootstrapMaterialDatePicker({
        format: 'DD/MM/YYYY HH:mm:ss',
        clearButton: true,
        weekStart: 1,
        lang : (sessionStorage.getItem('language')=='en'?'pt-EN':sessionStorage.getItem('language'))
    });

	
    $('#form_report').validate({
        errorElement: 'span',        
        focusInvalid: false,
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        rules: {
            deviceId: {
                required: true
            },
            type: {
                required: true
            },
            from: {
                required: true
            },
            to: {
                required: true
            }
        },
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        validClass: "validation-valid-label",

        invalidHandler: function (event, validator) { //display error alert on form submit   
            $('.alert-error', $('.login-form')).show();
        },

        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
            $(element).closest('.select-search').addClass('border-warning');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
            $(element).closest('.select-search').removeClass('border-warning');
        },

        success: function (e) {
            $(e).closest('.form-group').removeClass('error').addClass('info');
            $(e).remove();
            // e.addClass("validation-valid-label").text("Success.");
        },

        errorPlacement: function (error, element) {
            if (element.is(':checkbox') || element.is(':radio')) {
                var controls = element.closest('.controls');
                if (controls.find(':checkbox,:radio').length > 1) controls.append(error);
                else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
            }
            else if (element.is('.select2')) {
                error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
            }
            else if (element.is('.chzn-select')) {
                error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
            }
                // Input group, styled file input
            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                error.appendTo(element.parent().parent());
            }
            else error.insertAfter(element);
        },

        submitHandler: function (form) {
        },
        invalidHandler: function (form) {
        }
    });

    $('button[name="btnGenerate"]').click(function () {
        if ($('#form_report').valid()) { 
        	
        	swal({
                title: $.i18n("title_generate_report"),
                text: "",
                type: "info",
                showCancelButton: true,
                confirmButtonClass: "btn-info",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false
            },
            function () {
                doPrepareEvents();
            });
        };
    });

    $('button[name="btnClear"]').click(function () {
        localFormClear();
    });
         
    $("#type").change(function() {
        $("#field_alarms_type").hide();
        $("#col_desc").html($.i18n("title_geofence"));
                    
        if($("#type").val() == "alarm") {
            $("#field_alarms_type").show();
            $("#col_desc").html($.i18n("title_description"));                    
        } 
    });

    getDevicesEvents();

    getGroups();
    
    getGeofences();
    
    getAlarmsType();

});


function doPrepareEvents() {
		
	doOpenAlertWait($.i18n("title_wait"), $.i18n("title_wait_report"));

    var form = $("#form_report").serializeObject();    	    
    var params = "";				
        
    //prepare list devices
    var deviceIds = $('#deviceId option:selected');    
    $(deviceIds).each(function(index, deviceId){
        if ($(this).val() != "") {
            params += "deviceId="+$(this).val()+"&";
        }        
    });

    //prepare list groups
	var groups = $('#groupId option:selected');    
    $(groups).each(function(index, group){
        if ($(this).val() != "") {
            params += "groupId="+$(this).val()+"&";
        }
    });
			
	//prepare list type events
	var types = $('#type option:selected');    
    $(types).each(function(index, type){
        if ($(this).val() != "") {
            params += "type="+$(this).val()+"&";
        }
    });
			 	
	var data_ini = moment(form.from, "DD/MM/YYYY hh:mm:ss");
    var data_end = moment(form.to, "DD/MM/YYYY hh:mm:ss");
    
	params += "from="+data_ini.tz("Etc/GMT+0").format().substr(0, 19) + ".000Z&"; 
   	params += "to="+data_end.tz("Etc/GMT+0").format().substr(0, 19) + ".000Z";    		   	
   	
	$.ajax({
		type : "GET",
		url : sessionStorage.getItem('url') + "reports/events",
		data:params,
		contentType: "application/json",									
		cache: false,		
		headers: {		
        	"Authorization": "Basic " + btoa(sessionStorage.getItem('email')+":"+sessionStorage.getItem('password')),
        	"Accept":"application/json"        	                	
        },
		error: function (response) {		
			switch(response.status) {			
				case 400:
					doOpenAlertError($.i18n("message_user_not_permission"));
					break;
				case 401:
					doOpenAlertError($.i18n("message_user_unauthorized"));
					break;	
				case 404:
					doOpenAlertError($.i18n("message_user_no_matching"));
					break;					
			 	default:
					doOpenAlertError($.i18n("message_error_performing"));
					break;									
			}
		},
        success: function (response) {

            // Javascript sourced data
            dataSet.splice(0);            
            
            var alarms_selected = [];
            var types = $('#alarms_type option:selected');    
                    
            $(types).each(function(index, type){
                if ($(this).val() != "") {
                    alarms_selected.push($(this).val());
                }
            });
            
            $.each(response, function (key, value) {

                if($("#type").val() == "alarm") {                                                                            
                    if ("alarm" in value.attributes) {                        
                        if (alarms_selected.indexOf(value.attributes.alarm) > -1) {                            
                            dataSet.push([moment(value.serverTime).format('DD/MM/YYYY HH:mm:ss'), findDevice(value.deviceId).name, $.i18n(findEventType(value.type).name), alarms_type[value.attributes.alarm]]);
                        }

                    }                    

                } else {
                    dataSet.push([moment(value.serverTime).format('DD/MM/YYYY HH:mm:ss'), findDevice(value.deviceId).name, $.i18n(findEventType(value.type).name), (value.geofenceId>0?findGeofence(value.geofenceId).name:"")]);
                }
                
            });

            $('.datatable-js').dataTable().fnDestroy();

            $('.datatable-js').dataTable({
                data: dataSet,
                columnDefs: [],
                responsive: true,
                dom: 'Blfrtip',
                colReorder: true,
		        buttons: [{extend: 'excelHtml5',
			               title: $.i18n("title_reports_events")
			              },{
                            extend: 'print',
                            text: $.i18n('button_print'), 
                            title:  $.i18n("title_reports_events")+"<br />",
                            customize: function ( win ) {
                                var header = '<span style="position:absolute;top:56px;left:0;">'+$.i18n('title_period')+':'+$("#from").val() + " => " + $("#to").val()+'</span>'+
                                             '<img src="'+sessionStorage.getItem('logomark')+'" style="position:absolute; top:0; right:0;" />';

                                $(win.document.body)
                                    .css( 'font-size', '10pt' )
                                    .css( 'background-color', '#fff' )
                                    .prepend(
                                        header
                                    );
             
                                $(win.document.body).find( 'table' )
                                    .addClass( 'compact' )
                                    .css( 'font-size', 'inherit' );
                            }
                        }
		        ]
            }); 
                        
            doOpenAlertSucess($.i18n("title_success"), $.i18n("title_message_generated"), 1500);

        }

    });


}


function getDevicesEvents() {
	
	$.ajax({
		type : "get",
		url : sessionStorage.getItem('url') + "devices/",
		cache: false,		
		headers: {
        	"Authorization": "Basic " + btoa(sessionStorage.getItem('email')+":"+sessionStorage.getItem('password'))
        },
		error: function (response) {		
			switch(response.status) {			
				case 400:
					doOpenAlertError($.i18n("message_user_not_permission"));
					break;
				case 401:
					doOpenAlertError($.i18n("message_user_unauthorized"));
					break;	
			 	default:
					doOpenAlertError($.i18n("message_error_performing"));
					break;
			}
		},
		success: function (response) {
			
			limpaSelect("deviceId");
			devices.splice(0);
			
			$.each( response, function( key, value ) {  				
				insertOption("deviceId", value.id, value.name);
				
				devices.push({deviceId : value.id,
							  name     : value.name,
							  category : value.category,
							  uniqueId : value.uniqueId});
			});
						
		}
	});	    
	
}

function getAlarmsType() {
            limpaSelect("alarms_type");			
			
			$.each( alarms_type , function( key, value ) {  				
				insertOption("alarms_type", key, value);				
			});
}

function localFormClear() {
    doFormClear();

    $("#deviceId").select2("val", "");
    $("#groupId").select2("val", "");
    $("#type").select2("val", "");
 
    if (dataSet.length > 0) { $('.datatable-js').dataTable().fnDestroy(); }

    dataSet.splice(0);    

    $('.datatable-js').dataTable({
        data: dataSet,
        columnDefs: [],
        dom: 'Bfrtip',
        buttons: []
    }); 
 
}