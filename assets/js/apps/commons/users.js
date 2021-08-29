var dataSet 		= [];
var language 		= "en";
var profile_photo 	= "assets/img/user.png";
var admin   		= false;
var server_attributes = [];
var created_at 		= moment().format('YYYY-MM-DD HH:mm:ss');
var gasoline,
	alcohol,
	gnv,
	diesel;
	
$(document).ready(function () {

	/**
	 * Check status of session of user
	 */
	checkSession();
	
	checkPermission();	
	
    $("#deviceLimitField").hide();
    
    if (sessionStorage.getItem('admin')=="0") {
        $("#adminField").hide();
        $("#permissionField").hide();
    }
	
    localFormClear();
    
    /** 
    *initial parameters
    */
	loadSwitchery();
    
    $('.datatable-js').dataTable({
        columnDefs: []
    });

    /**
        * parameters this page
        */
	
/**	$('[name="document"]').formatter({
	    'pattern': '{{99}}.{{999}}.{{9999}}/{{9999}}-{{99}}',
	    'persistent': true
	}); */
	
	$('[name="postal_code"]').formatter({
	    'pattern': '{{99}}.{{9999}}-{{999}}',
	    'persistent': false
	});
	
	$('[name="phone"]').formatter({
	    'pattern': '({{99}}) {{99999}}-{{9999}}',
	    'persistent': false
	});
	
    $('#form_data').validate({
        errorElement: 'span',        
        focusInvalid: false,
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        rules: {
            name: {
                required: true
            },
            administrator: {
                required: true
            },
            email: {
                required: true
            },
            password: {
                required: true
            },
            distanceUnit: {
                required: true
            },
            speedUnit: {
                required: true
            },
            zoom: {
                required: true
            },            
            disabled: {
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

    $('button[name="btnSave"]').click(function () {
        if ($('#form_data').valid()) { doSaveUsers(); };
    });

    $('button[name="btnClear"]').click(function () {
        localFormClear();
    });

    $('a[name="lnkRefreshGrid"]').click(function () {
        //doOpenAlertWait('Wait...', 'Loading data.');
        refreshGridUsers();
    });

    $("#administrator").select2({ allowClear: false, placeholder: $.i18n("title_select2"), language: "pt-BR" })
	.on('change', function () {	
	    if(this.value == "true") {
            $("#field_panel").show();
        } else {
            $("#field_panel").hide();
        }
	});	

    
        
    refreshGridUsers();    
        
});


function refreshGridUsers() {

   $.ajax({
		type : "get",
		url : sessionStorage.getItem('url') + "users/",		
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

            // Javascript sourced data
            dataSet.splice(0);            

            $.each(response, function (key, value) {

                var html = '<div class="btn-group">';
                html += '    <button type="button" class="btn btn-primary btn-icon dropdown-toggle" data-toggle="dropdown">';
                html += '    	<i class="icon-menu7"></i> &nbsp;<span class="caret"></span>';
                html += '    </button>';

                html += '    <ul class="dropdown-menu dropdown-menu-right">';
                html += '    	<li><a href="javascript:doEditUsers(' + value.id + ')"><i class="icon-cogs"></i> '+$.i18n("title_edit")+'</a></li>';
                html += '    	<li><a href="javascript:doDeleteUsers(' + value.id + ')"><i class="icon-trash"></i>' +$.i18n("title_delete")+'</a></li>';
                html += '    </ul>';
                html += '</div>';

                var city = ('city' in value.attributes) ? value.attributes.city : "";                
                var state = ('state' in value.attributes) ? value.attributes.state : "";
                
                var register = (value.deviceLimit == -1) || (value.userLimit == -1)?"yes":"no";
                
                if (parseInt(sessionStorage.getItem('version')) < 317) {
                    if (value.admin == true) register = "yes";
                } else {
                    if (value.administrator == true) register = "yes";
                }
                
                
                dataSet.push([value.id, value.name, value.email, city, state, (value.disabled?$.i18n("title_yes"):$.i18n("title_no")), (register=="yes"?$.i18n("title_yes"):$.i18n("title_no")), html]);
                
            });
            
            sessionStorage.setItem('clients', response);

            $('.datatable-js').dataTable().fnDestroy();

            $('.datatable-js').dataTable({
                data: dataSet,
                columnDefs: [],
                dom: 'Blfrtip',
                colReorder: true,
                responsive: true,
                buttons: [{
                    extend: 'excelHtml5',
                    title: $.i18n("mnu_users"),
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                }, {
                    extend: 'print',
                    text: $.i18n('button_print'),
                    title: $.i18n("mnu_users"),
                    customize: function (win) {
                        var header = '<img src="' + sessionStorage.getItem('logomark') + '" style="position:absolute; top:0; right:0;" />';

                        $(win.document.body)
                            .css('font-size', '10pt')
                            .css('background-color', '#fff')
                            .prepend(
                                header
                            );

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                }]
            });           

        }

    });


}


function doSaveUsers() {

    doOpenAlertWait($.i18n("title_wait"), $.i18n("title_saving"));

    var pars = $("#form_data").serializeObject();
		pars.id = (!$("#id").val()?null:$("#id").val());	
		
		pars.attributes = {master:false,
						   readonly:false,
						   admin:admin,						   
						   language: language,
						   profile_photo:profile_photo,
						   document:pars.document,
						   address:pars.address,
						   neighborhood:pars.neighborhood,
						   city:pars.city,
						   state:pars.state,
						   postal_code:pars.postal_code,
						   phone:pars.phone,						   
						   distanceUnit:$("#distanceUnit").val(),
                           speedUnit:$("#speedUnit").val(),
                           panel:$("#panel").val(),
						   created_at: created_at,
						   gasoline:gasoline,
						   alcohol:alcohol,
						   gnv:gnv,
						   diesel:diesel,
                           updated_at: moment().format('YYYY-MM-DD HH:mm:ss')};
        
        if (pars.register=="true") {
            if (sessionStorage.getItem('admin')=="1") { 
                pars.deviceLimit= -1;
                pars.userLimit= -1;
            } else {
                pars.deviceLimit= 0;
                pars.userLimit= 0;    
            }
        } else {
            pars.deviceLimit= 0;
            pars.userLimit= 0;
        }
                           
        pars.attributes = mergeAttributes(pars.attributes, server_attributes);                           

        if (sessionStorage.getItem('admin')=="0") {
            pars.administrator = false;            
        }

        if (parseInt(sessionStorage.getItem('version')) < 317) {
            pars.admin = pars.administrator;    
            delete pars.administrator;    
        }                
						   		
		delete pars.document;
		delete pars.address;
		delete pars.neighborhood;
		delete pars.city;
		delete pars.state;
		delete pars.postal_code;
		delete pars.phone;
		delete pars.distanceUnit;		
        delete pars.speedUnit;
        delete pars.panel;
        delete pars.register;
		
    $.ajax({
        type : (!$("#id").val()?"POST":"PUT"),
		url : sessionStorage.getItem('url') + "users/"+$("#id").val(),
		data:JSON.stringify(pars),
		contentType: 'application/json', 
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

            doOpenAlertSucess($.i18n("title_success"), $.i18n("title_saved"), 1500);                        

            localFormClear();

            setTimeout(function () {
                refreshGridUsers();
            }, 1500);


        }

    });

}


function doDeleteUsers(id) {

    swal({
        title: $.i18n("title_confirm_delete"),
        text: $.i18n("title_message_delete"),
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: $.i18n("title_yes"),
        cancelButtonText: $.i18n("title_no"),
        closeOnConfirm: false
    },
    function () {

        doOpenAlertWait($.i18n("title_wait"), $.i18n("title_deleting"));

        $.ajax({
            type: "DELETE",
            url : sessionStorage.getItem('url') + "users/"+id,			
			contentType: "application/json; charset=utf-8", 
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

          	  doOpenAlertSucess($.i18n("title_removed"), $.i18n("title_message_removed"), 1500);

          	  refreshGridUsers();

            }

        });
    });

}

function doEditUsers(id) {

    doOpenAlertWait($.i18n("title_wait"), $.i18n("title_loading_data"));

    localFormClear();

    $.ajax({
       type : "get",
		url : sessionStorage.getItem('url') + "users/",
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

            $.each( response, function( key, value ) {
            	
            	if (value.id == id) {

                    $('input[name="id"]').val($.trim(value.id));                            

                    $('input[name="name"]').val(value.name);
                    
                    $('input[name="email"]').val(value.email);                                    
                    
                    var adm = ($.parseJSON(('administrator' in value) ? value.administrator : value.admin)?"true":"false");

                    $("#administrator").select2("val",  adm);

                    if(adm == "true") {
                        $("#field_panel").show();
                    } else {
                        $("#field_panel").hide();
                    }

                    $("#readonly").select2("val", (value.readonly?"true":"false"));
                    
                    $("#disabled").select2("val", (value.disabled?"true":"false"));

                    $("#distanceUnit").select2("val", (!('distanceUnit' in value.attributes)?"km":value.attributes.distanceUnit));
            
            		$("#speedUnit").select2("val", (!('speedUnit' in value.attributes)?(!('speedUnit' in value)?"kmh":value.speedUnit):value.attributes.speedUnit));
                    
                    $('input[name="latitude"]').val(value.latitude);
                    
                    $('input[name="longitude"]').val(value.longitude);
                    
                    $('input[name="zoom"]').val(value.zoom);                    
                    
                    $('input[name="document"]').val((value.attributes.document== null?"":value.attributes.document));
                    
                    $('input[name="address"]').val((value.attributes.address== null?"":value.attributes.address));
                    
                    $('input[name="neighborhood"]').val((value.attributes.neighborhood== null?"":value.attributes.neighborhood));
                    
                    $('input[name="city"]').val((value.attributes.city== null?"":value.attributes.city));
                    
                    $('input[name="state"]').val((value.attributes.state== null?"":value.attributes.state));
                    
                    $('input[name="postal_code"]').val((value.attributes.postal_code== null?"":value.attributes.postal_code));
                    
                    $('input[name="phone"]').val((value.attributes.phone== null?"":value.attributes.phone));
                    
                    $("#panel").select2("val", (!('panel' in value.attributes)?"map":value.attributes.panel));
                    
                    $("#register").select2("val", "false");

                    if ((value.deviceLimit == -1) || (value.userLimit == -1)) {
                        $("#register").select2("val", "true");
                    }

                    admin			= admin;
                    
                    language		= (value.attributes.language== null?"en":value.attributes.language);
					
					profile_photo 	= (value.attributes.profile_photo== null?"assets/img/user.png":value.attributes.profile_photo);										
					
					created_at      = (value.attributes.created_at== null?moment().format('YYYY-MM-DD HH:mm:ss'):value.attributes.created_at);
					
					gasoline		= (value.attributes.gasoline== null?0:value.attributes.gasoline);
					
					alcohol			= (value.attributes.alcohol== null?0:value.attributes.alcohol);
					
					gnv				= (value.attributes.gnv== null?0:value.attributes.gnv);
					
					diesel			= (value.attributes.diesel== null?0:value.attributes.diesel);					                                        

                    server_attributes =value.attributes;
                    
            	}
                    
			});
            // finish fields

            doOpenAlertSucess($.i18n("title_success"), $.i18n("title_loaded"), 1500);
            
            $('#pane_form').click();


	   }

	});

}

function localFormClear() {
    doFormClear();

    $("#administrator").select2("val", "");
    $("#readonly").select2("val", "");
    $("#disabled").select2("val", "");
    
    $("#distanceUnit").select2("val", "");
    $("#speedUnit").select2("val", "");

    $("#panel").select2("val", "");    

    $("#register").select2("val", "");
    
}