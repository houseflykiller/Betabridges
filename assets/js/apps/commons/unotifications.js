var dataSet = [];
var actualUserId = 0;

$(document).ready(function () {
		
	/**
	 * Check status of session of user
	 */
	checkSession();
	
	checkPermission();
	
	
    /** 
    *initial parameters
    */
    
    $('.datatable-js').dataTable({
        columnDefs: []
    });

    localFormClear();

    /**
        * parameters this page
        */

//    $('[name="mark"]').formatter({
//	    pattern: '{{(99)9999}}'
//	});
	
    $('#form_data').validate({
        errorElement: 'span',        
        focusInvalid: false,
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        rules: {
            
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
        if ($('#form_data').valid()) { doSaveUNotifications(); };
    });

    $('button[name="btnClear"]').click(function () {
        localFormClear();
    });    
    
    $(".select-find").select2({ allowClear: false, placeholder: $.i18n("title_select2"), language: "pt-BR" })
	.on('change', function () {
		doOpenAlertWait('Wait...', 'Loading data.');
	    doListUNotifications(this.value);
	});	
    
    getUsers();

});


function doListUNotifications(userId) {
	
	var params = new Object();
    	params.userId = userId;    

    actualUserId = userId;
    doOpenAlertWait('Wait ...', 'Loading record.');

    //localFormClear();    
    
    $.ajax({
       type : "get",
		url : sessionStorage.getItem('url') + "notifications/",			
		data:JSON.stringify(params),
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
					doOpenAlertError($.i18n("message_error_performing")+response.statusText);
					break;
			}
		},
        success: function (response) {
        	
        	// Javascript sourced data
            dataSet.splice(0);

            $.each( response, function( key, value ) {
                
                var web = '<div class="checkbox checkbox-switchery" data-animated="true">';
	                web += '  <label>';
	                web += '      <input type="checkbox" class="switchery" id="' + value.type + '_web" value="' + value.web + '" onclick="doSaveUNotifications(\'' + value.type + '\')" ' + (value.web?'checked':'') + ' />';
	                web += '      &nbsp;';
	                web += '  </label>';
	                web += '</div>';
	                
	            var mail = '<div class="checkbox checkbox-switchery" data-animated="true">';
	                mail += '  <label>';
	                mail += '      <input type="checkbox" class="switchery" id="' + value.type + '_mail" value="' + value.mail + '" onclick="doSaveUNotifications(\'' + value.type + '\')" ' + (value.mail?'checked':'') + ' />';
	                mail += '      &nbsp;';
	                mail += '  </label>';
                    mail += '</div>';    
                    
                var sms = '<div class="checkbox checkbox-switchery" data-animated="true">';
                    sms += '  <label>';
	                sms += '      <input type="checkbox" class="switchery" id="' + value.type + '_sms" value="' + value.sms + '" onclick="doSaveUNotifications(\'' + value.type + '\')" ' + (value.sms?'checked':'') + ' />';
	                sms += '      &nbsp;';
	                sms += '  </label>';
	                sms += '</div>';    

                dataSet.push([$.i18n(findEventType(value.type)).name, web, mail]);

            });

            $('#datatable').dataTable().fnDestroy();

            $('#datatable').dataTable({
                data: dataSet,
                lengthMenu: [1000],
                pageLength: 1000,
                columnDefs: []
            });            

            initializeSwitchery();

            doOpenAlertSucess('Success!', 'Programs Loaded Successfully', 500);        

	   }

	});

}


function doSaveUNotifications(type) {
	
	var webCheckbox = document.querySelector('#'+type+'_web');
	
    var mailCheckbox = document.querySelector('#'+type+'_mail');
    
    var smsCheckbox = document.querySelector('#'+type+'_sms');

    var params = new Object();
        params.userId = actualUserId;    
        params.type = type;
        params.web = webCheckbox.checked;
        params.mail = mailCheckbox.checked;
        params.sms = mailCheckbox.checked;
        params.attributes = {};
						
    $.ajax({
        type : "POST",
		url : sessionStorage.getItem('url') + "notifications",
		data:JSON.stringify(params),
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
					doOpenAlertError($.i18n("message_error_performing")+response.statusText);
					break;
			}
		},
        success: function (response) {

            doOpenAlertSucess('Success!', 'Data successfully saved', 1000);

        }

    });

}



function localFormClear() {
    doFormClear();
    
    $("#userId").select2("val", "");
    
    dataSet.splice(0);
    
    $('#datatable').dataTable().fnDestroy();

    $('#datatable').dataTable({
        data: dataSet,
        lengthMenu: [1000],
        pageLength: 1000,
        columnDefs: []
    });   
           
}