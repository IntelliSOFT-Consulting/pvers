$(document).ready(function() {
	count = 0;
	
	$('.date-pick-expire').datepicker({
        minDate:"-100Y", maxDate:"+7Y", 
        dateFormat:'dd-mm-yy', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
        showAnim:'show'
  	});
	$( "#MedicationCountyId" ).combobox();

    $('.date-pick-field').datepicker({
        minDate:"-100Y", maxDate:"0", 
        dateFormat:'dd-mm-yy'
    });

 	var cache2 = {},	lastXhr;
	$( "#MedicationInstitutionCode" ).autocomplete({
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
			$( "#MedicationNameOfInstitution" ).val( ui.item.label );
			$( "#MedicationInstitutionCode" ).val( ui.item.value );
			$( "#MedicationInstitutionContact" ).val( ui.item.phone );
			$("#MedicationCountyId").combobox('autocomplete', ui.item.desc);  
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
	$( "#MedicationNameOfInstitution" ).autocomplete({
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
			$( "#MedicationNameOfInstitution" ).val( ui.item.label );
			$( "#MedicationInstitutionCode" ).val( ui.item.value );
			$( "#MedicationInstitutionContact" ).val( ui.item.phone );
			$("#MedicationCountyId").combobox('autocomplete', ui.item.desc);  
			
			return false;
		}
	})
	.data( "autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li></li>" )
				.data( "item.autocomplete", item )
				.append( "<a>" + item.value + " - " + item.label + "</a>" )
				.appendTo( ul );
	};

	// if ($("#AefiComplaintOther:checked").val() == '1') {
	// 	$("#AefiComplaintOtherSpecify").removeAttr("disabled");
	// }	
	// $('#AefiComplaintOther').click(function(){
	//    if($(this).is(":checked")){
	// 		$('#AefiComplaintOtherSpecify').removeAttr("disabled");
	// 	}
	//    else {
	// 		$('#AefiComplaintOtherSpecify').attr("disabled", "disabled");
	// 		$('#AefiComplaintOtherSpecify').val('');
	// 	}
	// });
	// $('#AefiPatientName').datetimepicker({
 //        format: 'd-m-Y H:i'
 //      });
	// console.log('kariss');
});
