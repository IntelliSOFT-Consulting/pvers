$(document).ready(function() {

	$('.date-pick-field').datepicker({
		minDate: new Date(), 
		dateFormat:'yy-mm-dd'
	});

	var cache2 = {},	lastXhr;
	$( "#UserInstitutionCode" ).autocomplete({
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
			$( "#UserNameOfInstitution" ).val( ui.item.label );
			$( "#UserInstitutionCode" ).val( ui.item.value );
			$( "#UserInstitutionAddress" ).val( ui.item.addr );
			$("#UserCountyId").combobox('autocomplete', ui.item.desc);
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
	$( "#UserNameOfInstitution" ).autocomplete({
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
			$( "#UserNameOfInstitution" ).val( ui.item.label );
			$( "#UserInstitutionCode" ).val( ui.item.value );
			$( "#UserInstitutionAddress" ).val( ui.item.addr );
			$("#UserCountyId").combobox('autocomplete', ui.item.desc);
			return false;
		}
	})
	.data( "autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li></li>" )
				.data( "item.autocomplete", item )
				.append( "<a>" + item.value + " - " + item.label + "</a>" )
				.appendTo( ul );
	};

	var cache4 = {},	lastXhr;
	$( "#UserWard" ).autocomplete({
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
			$( "#UserWard" ).val( ui.item.value );
			$( "#UserNameOfInstitution" ).val( ui.item.label );
			$( "#UserInstitutionCode" ).val( ui.item.value );
			$( "#UserInstitutionAddress" ).val( ui.item.addr );
			$("#UserCountyId").combobox('autocomplete', ui.item.desc);
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
