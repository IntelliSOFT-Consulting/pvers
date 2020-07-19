$(document).ready(function() {

	$( "#SadrCountyId" ).combobox();

	//Person submitting
	$('.person-submit').on('change',function() {
        var pilih = $(this).val();
        if (pilih == 'Yes') {
        	$('.diff:input').prop('disabled',false);
        } else {
        	$('.diff:input').val('');
        	$('.diff:input').prop('disabled',true);
        }
    });
    if($("#SadrPersonSubmittingNo").is(':checked')){ $('.diff:input').prop('disabled',true); }

    //If Male disable
    $('input[name="data[Sadr][gender]"]').click(function(){ 
	    if ($(this).val() == 'Male') {
	    	$('input[name="data[Sadr][pregnancy_status]"]').attr('disabled', this.checked).attr('checked', !this.checked);
	    } else {
	    	$('input[name="data[Sadr][pregnancy_status]"]').attr('disabled', false);
	    }
	});
	if($('input[name="data[Sadr][gender]"][value="Male"]').is(':checked')){ $('input[name="data[Sadr][pregnancy_status]"]').attr('disabled', true).attr('checked', false); }

	//If not serious disable criteria
    $('input[name="data[Sadr][serious]"]').click(function(){ 
	    if ($(this).val() == 'No') {
	    	$('input[name="data[Sadr][serious_reason]"]').attr('disabled', this.checked).attr('checked', !this.checked);
	    	$('#serious_reason_clear').hide();
	    } else {
	    	$('input[name="data[Sadr][serious_reason]"]').attr('disabled', false);
	    	$('#serious_reason_clear').show();
	    }
	});
	if($('input[name="data[Sadr][serious]"][value="No"]').is(':checked')){ $('input[name="data[Sadr][serious_reason]"]').attr('disabled', true).attr('checked', false); }

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
      $( "#SadrInstitutionContact" ).val( ui.item.phone );
			return false;
		}
	});

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
			$( "#SadrInstitutionContact" ).val( ui.item.phone );
			return false;
		}
	})
});
