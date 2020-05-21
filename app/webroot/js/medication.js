$(document).ready(function() {
	count = 0;
	//MUST DO: FIND OUT WAY OF CHECKING IF VARIABLE EXISTS
	// for(key in myarray.Aefi) { 
	// 	count++; 
	// }

 //    if (count > 0) {
	// 	alert('The report could not be submitted. Please review the fields marked in red and then resubmit.');
	// }
		
	// var cache2 = {},	lastXhr;
	// $( "#AefiInstitutionCode" ).autocomplete({
	// 	source: function( request, response ) {
	// 		var term = request.term;
	// 		if ( term in cache2 ) {
	// 			response( cache2[ term ] );
	// 			return;
	// 		}

	// 		lastXhr = $.getJSON( "/facility_codes/autocomplete.json", request, function( data, status, xhr ) {
	// 			cache2[ term ] = data;
	// 			if ( xhr === lastXhr ) {
	// 				response( data );
	// 			}
	// 		});
	// 	},
	// 	select: function( event, ui ) {
	// 		$( "#AefiNameOfInstitution" ).val( ui.item.label );
	// 		$( "#AefiInstitutionCode" ).val( ui.item.value );
	// 		$( "#AefiSubCountyId" ).val( ui.item.sub_county );
	// 		$("#AefiCountyId").combobox('autocomplete', ui.item.desc);  
	// 		return false;
	// 	}
	// })
	// .data( "autocomplete" )._renderItem = function( ul, item ) {
	// 		return $( "<li></li>" )
	// 			.data( "item.autocomplete", item )
	// 			.append( "<a>" + item.value + " - " + item.label + "</a>" )
	// 			.appendTo( ul );
	// };
	
	// var cache3 = {},	lastXhr;
	// $( "#AefiNameOfInstitution" ).autocomplete({
	// 	source: function( request, response ) {
	// 		var term = request.term;
	// 		if ( term in cache3 ) {
	// 			response( cache3[ term ] );
	// 			return;
	// 		}

	// 		lastXhr = $.getJSON( "/facility_codes/autocomplete.json", request, function( data, status, xhr ) {
	// 			cache3[ term ] = data;
	// 			if ( xhr === lastXhr ) {
	// 				response( data );
	// 			}
	// 		});
	// 	},
	// 	select: function( event, ui ) {
	// 		$( "#AefiNameOfInstitution" ).val( ui.item.label );
	// 		$( "#AefiInstitutionCode" ).val( ui.item.value );
	// 		$( "#AefiSubCountyId" ).val( ui.item.sub_county );
	// 		$("#AefiCountyId").combobox('autocomplete', ui.item.desc);  
			
	// 		return false;
	// 	}
	// })
	// .data( "autocomplete" )._renderItem = function( ul, item ) {
	// 		return $( "<li></li>" )
	// 			.data( "item.autocomplete", item )
	// 			.append( "<a>" + item.value + " - " + item.label + "</a>" )
	// 			.appendTo( ul );
	// };

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
