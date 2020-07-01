$(document).ready(function() {
	count = 0;
	for(key in myarray.Pqmp) { 
	  count++; 
	}

    if (count > 0) {
		alert('The report could not be submitted. Please review the fields marked in red and then resubmit.');
	}
	var PqmpExpiryDate =  $('#PqmpExpiryDate').datepicker({
		minDate:"-100Y", dateFormat:'dd-mm-yy', showButtonPanel:true, changeMonth:true, changeYear:true, 
		showAnim:'show', buttonImageOnly:true, showOn:'both', buttonImage:'/img/calendar.gif'});
		
	var PqmpReceiptDate =  $('#PqmpReceiptDate').datepicker({
		minDate:"-100Y", maxDate:"-0D", dateFormat:'dd-mm-yy', showButtonPanel:true, changeMonth:true, 
		changeYear:true, showAnim:'show', buttonImageOnly:true, showOn:'both', buttonImage:'/img/calendar.gif'});

	var cache2 = {},	lastXhr;
	$( "#PqmpFacilityCode" ).autocomplete({
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
			$( "#PqmpFacilityName" ).val( ui.item.label );
			$( "#PqmpFacilityCode" ).val( ui.item.value );
			$( "#PqmpFacilityAddress" ).val( ui.item.addr );
			$("#PqmpCountyId").combobox('autocomplete', ui.item.desc);  
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
	$( "#PqmpFacilityName" ).autocomplete({
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
			$( "#PqmpFacilityName" ).val( ui.item.label );
			$( "#PqmpFacilityCode" ).val( ui.item.value );
			$( "#PqmpFacilityAddress" ).val( ui.item.addr );
			$("#PqmpCountyId").combobox('autocomplete', ui.item.desc);  
			
			return false;
		}
	})
	.data( "autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li></li>" )
				.data( "item.autocomplete", item )
				.append( "<a>" + item.value + " - " + item.label + "</a>" )
				.appendTo( ul );
	};
});
