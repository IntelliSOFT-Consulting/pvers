  $( function() {
    
    $( "#AefiCountyId" ).combobox();
    $( "#toggle" ).on( "click", function() {
      // $( "#combobox" ).toggle();
      $( "#AefiCountyId" ).toggle();
    });

    $("#AefiComplaintOther").click(function(){   
	    $("#AefiComplaintOtherSpecify").attr('disabled', !this.checked)
	});
	if($("#AefiComplaintOther").is(':checked')){ $("#AefiComplaintOtherSpecify").attr('disabled', false); }

    var cache2 = {},	lastXhr;
	$( "#AefiInstitutionCode" ).autocomplete({
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
			$( "#AefiNameOfInstitution" ).val( ui.item.label );
			$( "#AefiInstitutionCode" ).val( ui.item.value );
			$( "#AefiVaccinationCenter" ).val( ui.item.label );
			return false;
		}
	});

	var cache3 = {},	lastXhr;
	$( "#AefiNameOfInstitution" ).autocomplete({
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
			$( "#AefiNameOfInstitution" ).val( ui.item.label );
			$( "#AefiInstitutionCode" ).val( ui.item.value );
      		$( "#AefiVaccinationCenter" ).val( ui.item.label );
			return false;
		}
	});

	var cache3 = {},	lastXhr;
	$( "#AefiVaccinationCenter" ).autocomplete({
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
      		$( "#AefiVaccinationCenter" ).val( ui.item.label );
			return false;
		}
	})
  });