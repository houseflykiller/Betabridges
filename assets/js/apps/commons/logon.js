var dataSet = [];
var ulSpeed = new ySpeed();

$(document).ready(function () {

	/**
	 * Check status of session of user
	 */
	checkSession();	        

    /** 
    *initial parameters
    */

    loadSwitchery();


    $('.datatable-js').dataTable({
        columnDefs: [],
        dom: 'Bfrtip',
		        buttons: []
    });

    /**
     * parameters this page
     */

    localFormClear();

	
    $('#form_report').validate({
        errorElement: 'span',        
        focusInvalid: false,
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        rules: {
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

    $('button[name="btnGenerate"]').click(function () {
        if ($('#form_report').valid()) { 
        	
        	swal({
                title: $.i18n("title_generate_report"),
                text: "",
                type: "info",
                showCancelButton: true,
                confirmButtonClass: "btn-info",
                confirmButtonText: $.i18n("title_yes"),
                cancelButtonText: $.i18n("title_no"),
                closeOnConfirm: false
            },
            function () {
                doPrepareReport();
            });
        };
    });

    $('button[name="btnClear"]').click(function () {
        localFormClear();
    });
             
});


function doPrepareReport() {
	
	doOpenAlertWait($.i18n("title_wait"), $.i18n("title_wait_report"));

    var form = $("#form_report").serializeObject();    	        	
    
	$.ajax({
		type : "GET",    
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

            $.each(response, function (key, value) {
                var last_login = ('last_login' in value.attributes) ? moment(value.attributes.last_login).format("DD/MM/YYYY HH:mm:ss") : "-";                
                var count_login = ('count_login' in value.attributes) ? value.attributes.count_login : "0";                                
                var phone = ('phone' in value.attributes) ? value.attributes.phone : "-";                

                var disabled = (value.disabled?'yes':'no');
                
                dataSet.push([value.id, value.name, value.email,phone, $.i18n("title_"+disabled), count_login, last_login]);                
                
            });

            $('.datatable-js').dataTable().fnDestroy();

            $('.datatable-js').dataTable({
                data: dataSet,
                columnDefs: [],
                colReorder: true,
                dom: 'Blfrtip',
		        buttons: [{extend: 'excelHtml5',
			               title:  $.i18n("title_reports_access")
			              },{
                            extend: 'print',
                            text: $.i18n('button_print'), 
                            title:  $.i18n("title_reports_access")+"<br />",
                            customize: function ( win ) {
                                var header = '<img src="'+sessionStorage.getItem('logomark')+'" style="position:absolute; top:0; right:0;" />';
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

function localFormClear() {
    doFormClear();

    $("#disabled").select2("val", "");    

    dataSet.splice(0);

    $('.datatable-js').dataTable().fnDestroy();

    $('.datatable-js').dataTable({
        data: dataSet,
        columnDefs: [],
        dom: 'Bfrtip',
        buttons: []
    }); 
        
}