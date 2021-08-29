var language 		= "en";
var profile_photo 	= "assets/img/user.png";
var admin   		= false;
var ip  			= '0.0.0.0';
var generate_password = "";

$(document).ready(function() {
	
	$('#form_data').validate({
        errorElement: 'span',        
        focusInvalid: false,
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        rules: {
            email: {
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
            // e.addClass("validation-valid-label").text("Sucesso.");
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

    $('button[name="btnRecover"]').click(function () {
        if ($('#form_data').valid()) { doRecover(); };
    });
    
    $('button[name="btnBack"]').click(function () {
        $(location).attr('href', 'login.php');
    });    
    
    $.getJSON("http://jsonip.com/?callback=?", function (data) {        
        ip = data.ip;
    });

    $("#password").generatePassword({numeroCaracteres:8,
    								 showPasswordInAlertBox:false,
    								 showPasswordAfterInputPassword:false
    								}
    								);
    var generate_password = "";
	
});


function getRecoveryMessage(pars) {
	
	generate_password = pars.password;
	
	var html  = "<html>";		
		html += "<body>";
		 	    
        html += '<table dir="ltr">';
        html += '<tbody>';
        html += '<tr><td><img src="data:image/png;base64,'+sessionStorage.getItem('logomark')+'" style="width:175px; height:45px" /></td></tr>';
        html += '<tr><td style="padding:0;font-family:\'Segoe UI Light\',\'Segoe UI\',\'Helvetica Neue Medium\',Arial,sans-serif;font-size:41px;color:#707070">'+$.i18n("title_account")+' '+sessionStorage.getItem("provider_name")+'</td></tr>';
        html += '<tr><td style="padding:0;font-family:\'Segoe UI Light\',\'Segoe UI\',\'Helvetica Neue Medium\',Arial,sans-serif;font-size:17px;color:#2672ec">'+$.i18n("title_password_changed")+'</td></tr>';
        html += '<tr><td style="padding:0; padding-top:25px; font-family:\'Segoe UI\',Tahoma,Verdana,Arial,sans-serif; font-size:14px; color:#2a2a2a;">'+$.i18n("title_password_changed_for")+' <a dir="ltr" style="color:#2672ec;text-decoration:none" href="#" >'+generate_password+'</a> </td></tr>';
        html += '<tr><td style="padding:0; padding-top:25px; font-family:\'Segoe UI\',Tahoma,Verdana,Arial,sans-serif; font-size:14px; color:#2a2a2a;">'+$.i18n("title_user_change")+'</td></tr>';
        html += '<tr><td style="padding:0; padding-top:25px; font-family:\'Segoe UI\',Tahoma,Verdana,Arial,sans-serif; font-size:14px; color:#2a2a2a;">'+$.i18n("title_security_info")+'</td></tr>';
        html += '<tr><td style="padding:0; padding-top:6px; font-family:\'Segoe UI\',Tahoma,Verdana,Arial,sans-serif; font-size:14px; color:#2a2a2a;">'+$.i18n("title_date_time")+': '+ moment().format('DD/MM/YYYY - hh:mm:ss') +' (GMT)</td></tr>';
//        html += '<tr><td class="size2">Country/region: India</td></tr>
		html += '<tr><td style="padding:0; padding-top:6px; font-family:\'Segoe UI\',Tahoma,Verdana,Arial,sans-serif; font-size:14px; color:#2a2a2a;">'+$.i18n("title_plataform")+': '+OSName+'</td></tr>';
        html += '<tr><td style="padding:0; padding-top:6px; font-family:\'Segoe UI\',Tahoma,Verdana,Arial,sans-serif; font-size:14px; color:#2a2a2a;">'+$.i18n("title_browser")+': '+navigator.userAgent.toLowerCase()+'</td></tr>';
        html += '<tr><td style="padding:0; padding-top:6px; font-family:\'Segoe UI\',Tahoma,Verdana,Arial,sans-serif; font-size:14px; color:#2a2a2a;">'+$.i18n("title_address_ip")+': '+ip+'<br /><br /></td></tr>';        
        html += '<tr><td style="padding:0; padding-top:6px; font-family:\'Segoe UI\',Tahoma,Verdana,Arial,san$this->users-serif; font-size:14px; color:#2a2a2a;">'+$.i18n("title_not_user_changed")+' <br /><br /></td></tr>';
        
        html += '<tr><td style="padding:0; padding-top:25px; font-family:\'Segoe UI\',Tahoma,Verdana,Arial,sans-serif; font-size:14px; color:#2a2a2a;">'+$.i18n("title_thankyou")+',</td></tr>';
        html += '<tr><td style="padding:0; font-family:\'Segoe UI\',Tahoma,Verdana,Arial,sans-serif; font-size:14px; color:#2a2a2a;">'+$.i18n("title_equip")+' '+sessionStorage.getItem("provider_name")+'</td></tr>';
        html += '</tbody></table></body></html>';           
			
	return html;
}


function doRecover() {

	doOpenAlertWait($.i18n("message_new_pw_generate"));

	var pars = $("#form_data").serializeObject();	
		pars.from 	   = sessionStorage.getItem("provider_email");
		pars.from_name = sessionStorage.getItem("provider_name");
				
		pars.to	 	   = pars.email;
		pars.subject   = '['+sessionStorage.getItem("provider_name")+'] '+$.i18n("message_password_recovery");
		
		pars.body	   = getRecoveryMessage(pars);		
		
		pars.smtp_server = sessionStorage.getItem("provider_smtp_server");
		pars.smtp_auth = sessionStorage.getItem("provider_smtp_auth");
		pars.smtp_username = sessionStorage.getItem("provider_smtp_username");
		pars.smtp_password = sessionStorage.getItem("provider_smtp_password"); 
		pars.smtp_ssl = sessionStorage.getItem("provider_smtp_ssl");
		pars.smtp_port = sessionStorage.getItem("provider_smtp_port");
        
        Email.send({
			SecureToken : "303efc7c-3bd6-4b50-80d0-a84e28c1c982",
            Host : pars.smtp_server,
            Username : pars.smtp_username,
            Password : pars.smtp_password,
            To : pars.to,
            From : pars.from,
            Subject : pars.subject,
            Body : pars.body
        }).then(
          message => confirmMail(message)
        );
        
	$.ajax({
		type : "POST",
		url : "assets/apps/commons/send_email.php",
		data:pars,
		//contentType: "application/json",
		cache: false,		
		error: function (response) {		
			switch(response.status) {							
			 	default:
					doOpenAlertError($.i18n("message_error_performing"));
					break;
			}
		},
		success: function (response, status, jXHR) {			
			//UPDATE
			if (response.indexOf("success") >= 0) {								
				doChangePassword(pars.password);							
			} else {
				doOpenAlertError($.i18n("message_error_performing"));
			}		    			

		}
	});

}

function confirmMail(message) {
    if (message.indexOf("OK") >= 0) {								
        doChangePassword(generate_password);							
    } else {
        doOpenAlertError("Oops!Error generating new password. \ n \ r Contact customer service.");
    }
}


function doChangePassword(pass) {
	
	var pars = new Object();	
		pars.option    = "check";
        pars.email 	   = $("#email").val();	
		
	$.ajax({
		type : "GET",
		url : "assets/apps/commons/recover.php",		
		cache: false,		
		data:pars,
		headers: {
        	"Authorization": "Basic " + btoa(sessionStorage.getItem('user_admin')+":"+sessionStorage.getItem('pass_admin'))
        },
		error: function (response) {						
			doOpenAlertError($.i18n("message_error_performing"));								
		},
		success: function (response) {
							
			if (response.indexOf("OK") >= 0) {					
				doUpdatePassword($("#email").val(),pass);
			} else {
				doOpenAlertError($.i18n("message_user_no_matching"));
			}											
		}
	});	    
	
}


function doUpdatePassword(email, pass) {

	var pars = new Object();	
		pars.option    = "save";
		pars.email 	   = email;						   
		pars.pass 	   = pass;
		
    $.ajax({
        type : "POST",
		url : "assets/apps/commons/recover.php",
		data:pars,
		cache: false,					
		headers: {
        	"Authorization": "Basic " + btoa(sessionStorage.getItem('user_admin')+":"+sessionStorage.getItem('pass_admin'))
        },
		error: function (response) {					
			doOpenAlertError($.i18n("message_error_performing"));
		},
        success: function (response) {
            doOpenAlertSucess($.i18n("title_success"), $.i18n("message_new_pw_created"), 4000);
        }

    });

}
