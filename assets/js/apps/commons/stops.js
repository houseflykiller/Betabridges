var dataSet = [];
var markers = [];
var ulSpeed = new ySpeed();
var defaultProjection = "EPSG:4326";
var mymap;
var colors = ["#0000FF","#8A2BE2","#A52A2A","#5F9EA0","#7FFF00","#D2691E","#6495ED","#DC143C","#00008B","#006400","#A9A9A9","#2F4F4F","#FF00FF","#DAA520","#FF69B4","#B0C4DE","#00FF00","#FFA500","#3CB371","#90EE90","#008000"];
var mapRendered = false;

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
            from: {
                required: true
            },
            to: {
                required: true
            },
            type: {
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
                doPrepareStops();
            });
        };
    });

    $('button[name="btnClear"]').click(function () {
        localFormClear();
    });
         
    getDevicesStops();

    getGroups();
    
    $("#map").hide();
    
    $("#datatable").hide();

});

/**
    * Carrega listagem de dados
    *
    * @return void
    */

function doPrepareStops() {
	
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
					 	
	var data_ini = moment(form.from, "DD/MM/YYYY hh:mm:ss");
    var data_end = moment(form.to, "DD/MM/YYYY hh:mm:ss");
    
	params += "from="+data_ini.tz("Etc/GMT+0").format().substr(0, 19) + ".000Z&"; 
   	params += "to="+data_end.tz("Etc/GMT+0").format().substr(0, 19) + ".000Z";    		   	
   	
	$.ajax({
		type : "GET",
		url : sessionStorage.getItem('url') + "reports/stops",
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

            $.each(response, function (key, value) {            	
               	dataSet.push([value.deviceName, 
               				  moment(value.startTime).format('DD/MM/YYYY HH:mm:ss'), 
               				  value.address, 
               				  moment(value.endTime).format('DD/MM/YYYY HH:mm:ss'), 
               				  hhmmss(value.duration, 'milliseconds'),
               				  value.deviceId,                				  
               				  value.latitude, 
               				  value.longitude/*, 
               				  hhmmss(value.engineHours, 'milliseconds')/*, 
               				  value.spentFuel+' L'*/
               				]);               	
            });
            
            $('.datatable-js').dataTable().fnDestroy();

            switch($("#type").val()) {
            	
            	case "R":
            		$("#map").hide();
            		$("#datatable").show();
            		renderReport(dataSet);
            		break;
            		
            	case "M":
            		$("#map").show();
            		$("#datatable").hide();
            		createMap(dataSet);            		
            		break;
            		
            	default:
            		$("#map").show();
            		$("#datatable").show();
            		createMap(dataSet)
            		renderReport(dataSet);            		
            		break;
	                        
            }
            
            doOpenAlertSucess($.i18n("title_success"), $.i18n("title_message_generated"), 1500);

        }

    });


}

function renderReport(dataSet) {
	
		$('.datatable-js').dataTable({
                data: dataSet,
				columnDefs: [{ targets: [0, 1, 2, 3, 4], visible: true}],
				dom: 'Blfrtip',
				colReorder: true,
                responsive: true,
		        buttons: [{extend: 'excelHtml5',
						   title: $.i18n("title_reports_stop"),
						   exportOptions: {
							columns: [0, 1, 2, 3, 4]
						   }
			              },{
                            extend: 'print',
                            text: $.i18n('button_print'), 
                            title:  $.i18n("title_reports_stop"),
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
                            },
							exportOptions: {
							 columns: [0, 1, 2, 3, 4]
							}
                        }
		        ]
            });	
}

function renderMap(dataSet) {
	
	clearMarkers(mymap);
	var count = 1;
	var lastDeviceId = 0;
	$.each(dataSet, function (key, value) {
		
		var device = findDevice(value[5]);
		
		if (lastDeviceId != value[5]) {count = 1;}
		
		lastDeviceId = value[5];
		var text   = "<span style='font-size:8px'><b>"+device.name+"</b><span style='float: right;font-size:10px'><b>#"+count+"</b></span><br />" +
		 			 "<b>Arrival: </b>" + value[1]+ "<br />"+
					 "<b>Duration: </b>" + value[4]+ "<br />"+
					 "<b>Exit: </b>" + value[3]+ "<br />"+
					 "</span>"
		
		var marker = L.marker([value[6], value[7]], 
							 {icon: stopIcon('assets/img/icons/'+device.category+'.png', text, colors[device.id])}
							 ).addTo(mymap);		
		
		markers.push(marker);
		
		count++;
		
    });
    
    var group = new L.featureGroup(markers);
				
 	mymap.fitBounds(group.getBounds());
	
}


function getDevicesStops() {
	
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
				case 404:
					doOpenAlertError($.i18n("message_user_no_matching"));
					break;			
			 	default:
					doOpenAlertError($.i18n("message_error_performing"));
					break;
			}
		},
		success: function (response) {
			
			limpaSelect("deviceId");
			var count = 0;
			
			$.each( response, function( key, value ) {  				
				insertOption("deviceId", value.id, value.name);  		
				
				devices.push({id       : count,
							  deviceId : value.id,
							  name     : value.name,
							  category : value.category,
							  uniqueId : value.uniqueId});
							  
				count++;
			});
						
		}
	});	    
	
}

function stopIcon(url, label, colorLabel) {

	return new L.Icon.Label({
			shadowUrl: null,
			iconSize: new L.Point(40, 40),
			iconAnchor: new L.Point(0, 1),
			labelAnchor: new L.Point(36, 5),
			wrapperAnchor: new L.Point(12, 13),
			labelText: label,
			iconUrl: url,
			labelClassName: colorLabel
		});
}

function createMap(dataSet) {
	
	if(mapRendered == true) { mymap.remove() };
	
	var node  = document.getElementById("mapid2");
	node.parentNode.removeChild(node);
	
	var div = document.createElement("div");
	div.setAttribute("id", "mapid2");

	document.getElementById("map").appendChild(div);
	
	mymap = L.map('mapid2',{ projection: defaultProjection }).setView([0, -0], 2, {maxZoom:13, minZoom:5});
	
	var osm	= L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiZGV2ZWxvcGVyYXJ2aW5kZ3VwdGEiLCJhIjoiY2sxN2ZuMXNyMDNvbzNlcGptbGFrY2U0NCJ9.u56rMTjkxnvBndpzGRFZEw', {
// maxZoom: sessionStorage.getItem('zoom'),
		attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
			'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery Â© <a href="http://mapbox.com">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mymap);
 
	var ggl = new L.Google();
	var ggl2 = new L.Google('TERRAIN');	
	
	mymap.addLayer(ggl);
	mymap.addControl(new L.Control.Layers( {'Google Sattelite':ggl, 'OpenStreet':osm, 'Google Terrain':ggl2}, {}));	
	
	// watermark
	L.Control.Watermark = L.Control.extend({
	    onAdd: function(map) {
	        var img = L.DomUtil.create('img');
	
	        img.src = sessionStorage.getItem('logomark');
	        img.style.width = '175px';
	
	        return img;
	    },
	
	    onRemove: function(map) {
	        // Nothing to do here
	    }
	});
	
	L.control.watermark = function(opts) {
    	return new L.Control.Watermark(opts);
	};

	L.control.watermark({ position: 'bottomleft' }).addTo(mymap); 
	
	mapRendered = true;
	
	renderMap(dataSet);
}


function localFormClear() {
    doFormClear();

    $("#deviceId").select2("val", "");
    $("#groupId").select2("val", "");
    $("#type").select2("val", "");
    
    $("#map").hide();    
    $("#datatable").hide();

	if (dataSet.length > 0) { $('.datatable-js').dataTable().fnDestroy(); }

    dataSet.splice(0);    

    $('.datatable-js').dataTable({
        data: dataSet,
        columnDefs: [],
        dom: 'Bfrtip',
        buttons: []
    }); 
 
}

function clearMarkers(map) {

}
