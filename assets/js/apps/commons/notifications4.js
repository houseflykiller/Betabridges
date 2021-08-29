var dataSet = [];
var clearSwitch = false;
var listAlarms  = [];
var whatsapp_habilited = false;
$(document).ready(function () {

	/**
	 * Check status of session of user
	 */
	checkSession();
	
	checkPermission();
	
	//prefix_url = (sessionStorage.getItem('version')=="315"?"":"users/");
	
	
    /** 
    *initial parameters
    */
    // Setting datatable defaults
    $.extend($.fn.dataTable.defaults, {
        autoWidth: false,
        columnDefs: [{
            orderable: false,
            width: '100px',
            targets: [5]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            "decimal": "",
            "emptyTable": "No data available in table",
            "info": "Showing from _START_ to _END_ of _TOTAL_ records",
            "infoEmpty": "Displaying 0 to 0 of 0 records",
            "infoFiltered": "(filtering of _MAX_ records)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": '<span>Show:</span> _MENU_',
            "loadingRecords": "Loading...",
            "processing": "Processing...",
            "search": '<span>Search:</span> _INPUT_',
            "zeroRecords": "No matching records found",
            "paginate": { 'first': 'first', 'last': 'last', 'next': 'next', 'previous': 'previous' },
            "aria": {
                "sortAscending": ": enable to sort ascending column",
                "sortDescending": ": enable to sort descending column"
            }
        },
        drawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function () {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        }
    });

    // External table additions
    // ------------------------------

    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder', 'Type to filter...');


    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: "-1"
    });

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
        if ($('#form_data').valid()) { doSaveNotifications(); };
    });

    $('button[name="btnReset"]').click(function () {
    	clearSwitch = true;
        resetSwitch();
    });    
    
	doListNotifications();

});


function doListNotifications() {
	
	    doOpenAlertWait('Wait ...', 'Loading record.');

    //localFormClear();

    $.ajax({
       type : "get",
		url : sessionStorage.getItem('url') + "notifications/types",					
		contentType: 'application/json', 
		cache: false,
		headers: {
        	"Authorization": "Basic " + btoa(sessionStorage.getItem('email')+":"+sessionStorage.getItem('password'))
        },
		error: function (response) {		
			switch(response.status) {			
				case 400:
					doOpenAlertError('User does not have permission for this operation.');
					break;
				case 401:
					doOpenAlertError('Unauthorized User.');
					break;	
			 	default:
					doOpenAlertError('Error performing operation! \n Contact technical support. \n Error:'+response.statusText);
					break;
			}
		},
        success: function (response) {
        	
        	// Javascript sourced data
            
            $.each( response, function( key, value ) {
                
                
                var web = '<div class="checkbox checkbox-switchery" data-animated="true">';
	                web += '  <label>';
	                web += '      <input type="checkbox" class="switchery" id="' + value.type + '_web" value="' + value.web + '" onclick="doSaveNotifications(\'' + value.type + '\')" ' + (value.web?'checked':'') + ' />';
	                web += '      &nbsp;';
	                web += '  </label>';
	                web += '</div>';
	                
	            var mail = '<div class="checkbox checkbox-switchery" data-animated="true">';
	                mail += '  <label>';
	                mail += '      <input type="checkbox" class="switchery" id="' + value.type + '_mail" value="' + value.mail + '" onclick="doSaveNotifications(\'' + value.type + '\')" ' + (value.mail?'checked':'') + ' />';
	                mail += '      &nbsp;';
	                mail += '  </label>';
                    mail += '</div>';    
                    
                var sms = '<div class="checkbox checkbox-switchery" data-animated="true">';
                    sms += '  <label>';
	                sms += '      <input type="checkbox" class="switchery" id="' + value.type + '_sms" value="' + value.sms + '" onclick="doSaveNotifications(\'' + value.type + '\')" ' + (value.sms?'checked':'') + ' />';
	                sms += '      &nbsp;';
	                sms += '  </label>';
                    sms += '</div>';       
                    
                var firebase = '<div class="checkbox checkbox-switchery" data-animated="true">';
                    firebase += '  <label>';
                    firebase += '      <input type="checkbox" class="switchery" id="' + value.type + '_firebase" value="' + value.firebase + '" onclick="doSaveNotifications(\'' + value.type + '\')" ' + (value.firebase?'checked':'') + ' />';
                    firebase += '      &nbsp;';
	                firebase += '  </label>';
                    firebase += '</div>';           

                var whatsapp = '<div class="checkbox checkbox-switchery " data-animated="true">';
                    whatsapp += '  <label>';
                    whatsapp += '      <input type="checkbox" class="switchery whatsapp_opt" id="' + value.type + '_whatsapp" value="' + value.whatsapp + '" onclick="doSaveNotifications(\'' + value.type + '\')" ' + (value.whatsapp?'checked':'') + ' />';
                    whatsapp += '      &nbsp;';
                    whatsapp += '  </label>';
                    whatsapp += '</div>';               
                    
                //if (value.whatsapp != null){
                    //whatsapp_habilited = true;
                    dataSet.push([ $.i18n(findEventType(value.type).name), web, mail, sms, firebase, whatsapp]);
                //} else {
                  //  dataSet.push([ $.i18n(findEventType(value.type).name), web, mail, sms, firebase,"-"]);
                //}

                

            });

            $('#datatable').dataTable().fnDestroy();

            $('#datatable').dataTable({
                data: dataSet,
                lengthMenu: [1000],
                pageLength: 1000,
                columnDefs: []
            });            
            
            doListUserNotify();

	   }

	});

}


function doListUserNotify() {
	
	var params = new Object();
        params.userId = sessionStorage.getItem('userid');

	
    $.ajax({
       type : "get",
		url : sessionStorage.getItem('url') + "notifications",					
		contentType: 'application/json', 
		cache: false,
		headers: {
        	"Authorization": "Basic " + btoa(sessionStorage.getItem('email')+":"+sessionStorage.getItem('password'))
        },
		error: function (response) {		
			switch(response.status) {			
				case 400:
					doOpenAlertError('User does not have permission for this operation.');
					break;
				case 401:
					doOpenAlertError('Unauthorized User.');
					break;	
			 	default:
					doOpenAlertError('Error performing operation! \n Contact technical support. \n Error:'+response.statusText);
					break;
			}
		},
        success: function (response) {
        	
			listAlarms.splice(0);
        	
            $.each( response, function( key, value ) {                				
				var type         = value.type;
				var webCheckbox  = document.querySelector('#'+type+'_web');	
                var mailCheckbox = document.querySelector('#'+type+'_mail');
                var smsCheckbox   = document.querySelector('#'+type+'_sms');
                var firebaseCheckbox   = document.querySelector('#'+type+'_firebase');                                
                var whatsappCheckbox   = document.querySelector('#'+type+'_whatsapp');                
                                
				listAlarms.push({id: value.id,
				                 type:type});
                                 
                firebaseCheckbox.checked = (value.notificators!=null)?value.notificators.indexOf("firebase") !== -1:false;
				webCheckbox.checked =  (value.notificators!=null)?value.notificators.indexOf("web") !== -1:false;
                mailCheckbox.checked = (value.notificators!=null)?value.notificators.indexOf("mail") !== -1:false;
                smsCheckbox.checked = (value.notificators!=null)?value.notificators.indexOf("sms") !== -1:false;                
                whatsappCheckbox.checked = (value.notificators!=null)?value.notificators.indexOf("whatsapp") !== -1:false;                
				
            });

            initializeSwitchery();
            
            doOpenAlertSucess('Sucess!', 'Successfully Loaded', 500);        

	   }

	});

}

function changeSwitcheryState(el,value){
	if($(el).is(':checked')!=value){
		$(el).trigger("click")
	}
}
 

function doSaveNotifications(type) {
	
	var method = "POST";
	var id     = "";
			
	var webCheckbox  = document.querySelector('#'+type+'_web');	
    var mailCheckbox = document.querySelector('#'+type+'_mail');
    var smsCheckbox  = document.querySelector('#'+type+'_sms');
    var firebaseCheckbox  = document.querySelector('#'+type+'_firebase');    
    var whatsappCheckbox  = document.querySelector('#'+type+'_whatsapp');
        
    var notificators = ((webCheckbox.checked==true)?"web,":"")+
                    ((mailCheckbox.checked==true)?"mail,":"")+
                    ((smsCheckbox.checked==true)?"sms,":"")+        
                    ((whatsappCheckbox.checked==true)?"whatsapp,":"")+        
                    ((firebaseCheckbox.checked==true)?"firebase,":"");

    notificators     = (notificators.length > 0)?notificators.substr(0,notificators.length-1):"";
    
    var params = new Object();    	
        params.type = type;
        params.always = true;
        params.notificators  = notificators;        
        params.attributes = {};
						        	
	if (alarmExists(type) != "") {
		method = "PUT";	
		id = findAlarmNotifications(type).id;
		params.id = id;
	}
	
    $.ajax({
        type : method,
		url : sessionStorage.getItem('url') + "notifications/"+id,
		data:JSON.stringify(params),
		contentType: 'application/json', 
		cache: false,					
		headers: {
            "Authorization": "Basic " + btoa(sessionStorage.getItem('email')+":"+sessionStorage.getItem('password'))
        },
		error: function (response) {					
			switch(response.status) {			
				case 400:
					doOpenAlertError('User does not have permission for this operation.');
					break;
				case 401:
					doOpenAlertError('Unauthorized User.');
					break;	
			 	default:
					doOpenAlertError('Error performing operation! \n Contact technical support. \n Error:'+response.statusText);
					break;
			}
		},
        success: function (response) {

            doOpenAlertSucess('Sucess!', 'Successfully Save Data', 1000);
            
            doListUserNotify();

        }

    });

}


function resetSwitch() {
	
	var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));

	elems.forEach(function(html) {
  		
  		if($(html).is(':checked')!=true){
			$(html).trigger("click")
		}
	});
	
	/*$('.cd-types, .img-frame, .img-content-container, .list-items').each(function () {
        var $set = $(this);
        var interval = setInterval(function () {
            var $cur = $set.find('.active').removeClass('active');
            var $next = $cur.next().length ? $cur.next() : $set.children().eq(0);
            $next.addClass('active');
        }, 1000);
        $set.data('loop', interval);

        $set.on('click', '> *', function () {
            $(this).addClass('active').siblings('.active').removeClass('active');
            clearInterval($set.data('loop'));
            $set.removeData('loop')
        });
    });*/
	
}

function findAlarmNotifications(alarm) {
	return _.find(listAlarms, function(obj) { return obj.type == alarm; });
}

function alarmExists(alarm){
    return $.grep(listAlarms, function(item){
      return item.type == alarm;
    });
};

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