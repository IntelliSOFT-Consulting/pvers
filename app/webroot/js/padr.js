$(document).ready(function() {

	$( "#PadrCountyId" ).combobox();
	var dates2 = $('.date-pick-from, .date-pick-to').datepicker({
        minDate:"-100Y", maxDate:"-0D", 
        dateFormat:'dd-mm-yy', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
        showAnim:'show'
      });

      $('.date-pick-field').datepicker({
          minDate:"-100Y", maxDate:"0", 
          dateFormat:'dd-mm-yy'
      });
      
	var cache2 = {},	lastXhr;
	$( "#PadrInstitutionCode" ).autocomplete({
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
			$( "#PadrNameOfInstitution" ).val( ui.item.label );
			$( "#PadrInstitutionCode" ).val( ui.item.value );
			$( "#PadrAddress" ).val( ui.item.addr );
      $( "#PadrInstitutionContact" ).val( ui.item.phone );
			return false;
		}
	});

	var cache3 = {},	lastXhr;
	$( "#PadrNameOfInstitution" ).autocomplete({
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
			$( "#PadrNameOfInstitution" ).val( ui.item.label );
			$( "#PadrInstitutionCode" ).val( ui.item.value );
      		$( "#PadrAddress" ).val( ui.item.addr );
			$( "#PadrInstitutionContact" ).val( ui.item.phone );
			return false;
		}
	})
});
