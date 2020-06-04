$(document).ready(function() {
	count = 0;
	//MUST DO: FIND OUT WAY OF CHECKING IF VARIABLE EXISTS
	for(key in myarray.Sadr) { 
		count++; 
	}

    if (count > 0) {
		alert('The report could not be submitted. Please review the fields marked in red and then resubmit.');
	}
		
	var cache2 = {},	lastXhr;
	$( "#SadrInstitutionCode" ).autocomplete({
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
			$( "#SadrNameOfInstitution" ).val( ui.item.label );
			$( "#SadrInstitutionCode" ).val( ui.item.value );
			$( "#SadrAddress" ).val( ui.item.addr );
			$("#SadrCountyId").combobox('autocomplete', ui.item.desc);  
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
	$( "#SadrNameOfInstitution" ).autocomplete({
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
			$( "#SadrNameOfInstitution" ).val( ui.item.label );
			$( "#SadrInstitutionCode" ).val( ui.item.value );
			$( "#SadrAddress" ).val( ui.item.addr );
			$("#SadrCountyId").combobox('autocomplete', ui.item.desc);  
			
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
