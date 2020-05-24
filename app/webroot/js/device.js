$(document).ready(function() {
	count = 0;
	//MUST DO: FIND OUT WAY OF CHECKING IF VARIABLE EXISTS
	$('.date-pick-expire').datepicker({
        minDate:"-100Y", maxDate:"+7Y", 
        dateFormat:'dd-mm-yy', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
        showAnim:'show'
  	});
	$( "#DeviceCountyId" ).combobox();

    $('.date-pick-field').datepicker({
        minDate:"-100Y", maxDate:"0", 
        dateFormat:'dd-mm-yy'
    });
		
	var cache2 = {},	lastXhr;
	$( "#DeviceInstitutionCode" ).autocomplete({
		source: function( request, response ) {
			var term = request.term;
			if ( term in cache2 ) {
				response( cache2[ term ] );
				return;
			}

			lastXhr = $.getJSON( "/facility_codes/autocomplete.json", request, function( data, status, xhr ) {
				cache2[ term ] = data;
				if ( xhr === lastXhr ) {
					response( data );
				}
			});
		},
		select: function( event, ui ) {
			$( "#DeviceNameOfInstitution" ).val( ui.item.label );
			$( "#DeviceInstitutionCode" ).val( ui.item.value );
			$("#DeviceCountyId").combobox('autocomplete', ui.item.desc);  
			return false;
		}
	})
	.data( "autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li></li>" )
				.data( "item.autocomplete", item )
				.append( "<a>" + item.value + " - " + item.label + "</a>" )
				.appendTo( ul );
	};
	
	var cache3 = {},	lastXhr;
	$( "#DeviceNameOfInstitution" ).autocomplete({
		source: function( request, response ) {
			var term = request.term;
			if ( term in cache3 ) {
				response( cache3[ term ] );
				return;
			}

			lastXhr = $.getJSON( "/facility_codes/autocomplete.json", request, function( data, status, xhr ) {
				cache3[ term ] = data;
				if ( xhr === lastXhr ) {
					response( data );
				}
			});
		},
		select: function( event, ui ) {
			$( "#DeviceNameOfInstitution" ).val( ui.item.label );
			$( "#DeviceInstitutionCode" ).val( ui.item.value );
			$("#DeviceCountyId").combobox('autocomplete', ui.item.desc);  
			
			return false;
		}
	})
	.data( "autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li></li>" )
				.data( "item.autocomplete", item )
				.append( "<a>" + item.value + " - " + item.label + "</a>" )
				.appendTo( ul );
	};


	/*if ($("#DeviceComplaintOther:checked").val() == '1') {
		$("#DeviceComplaintOtherSpecify").removeAttr("disabled");
	}	
	$('#DeviceComplaintOther').click(function(){
	   if($(this).is(":checked")){
			$('#DeviceComplaintOtherSpecify').removeAttr("disabled");
		}
	   else {
			$('#DeviceComplaintOtherSpecify').attr("disabled", "disabled");
			$('#DeviceComplaintOtherSpecify').val('');
		}
	});*/
	// $('#DevicePatientName').datetimepicker({
 //        format: 'd-m-Y H:i'
 //      });
	// console.log('kariss');
});
