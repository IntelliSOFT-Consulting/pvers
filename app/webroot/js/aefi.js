  $( function() {
    
    // $( "#AefiCountyId" ).combobox();
	// allow typing in the combobox 
	// $( "#AefiCountyId" ).combobox('option', 'forceSelect', false);
    $( "#toggle" ).on( "click", function() {
      // $( "#combobox" ).toggle();
      $( "#AefiCountyId" ).toggle();
	  console.log('toggle');
    });

    if($('#AefiReportType').val() == 'Followup') {
        $('#AefiReporterEditForm :input').attr('readonly', 'readonly');
        $('.editable :input').prop('disabled', false).attr('readonly', false);

		// Open up the lab results section 
    }
	// when done typing in the county field, get the sub-counties
	

	// when county is selected, populate the sub-counties
	$('#AefiCountyId').change(function() {
		var county_id = $(this).val();
		 
        $.ajax({
            url: '/sub_counties/autocomplete/' + county_id+'.json',
            success: function(data) {
               
                // get the select element
                var select = $('#AefiSubCountyId');
                // clear the select
                select.empty();
                // add the options
                $.each(data, function(key, value) {
                    select.append('<option value=' + key + '>' + value + '</option>');
                }
                );
            }
        });		 
	});

	// apply the same to the patient county
	// vaccination_county 
	$('#AefiVaccinationCounty').change(function() {
		var county_id = $(this).val();
		$.ajax({
            url: '/sub_counties/autocomplete/' + county_id+'.json',
            success: function(data) {
               
                // get the select patient_sub_county


                var select = $('#AefiPatientSubCounty');
                // clear the select
                select.empty();
                // add the options
                $.each(data, function(key, value) {
                    select.append('<option value=' + key + '>' + value + '</option>');
                }
                );
            }
        });	
	});


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
    if($("#AefiPersonSubmittingNo").is(':checked')){ $('.diff:input').prop('disabled',true); }

    $("#AefiComplaintOther").click(function(){   
	    $("#AefiComplaintOtherSpecify").attr('disabled', !this.checked)
	});
	if($("#AefiComplaintOther").is(':checked')){ $("#AefiComplaintOtherSpecify").attr('disabled', false); }

	$("#AefiAefiSymptoms").autocomplete({
			source: "/meddras/autocomplete.json"
	});

	 

	//If not serious disable criteria
    if(!$('input[name="data[Aefi][serious]"][value="Yes"]').is(':checked')){ $('input[name="data[Aefi][serious_yes]"]').attr('disabled', true).attr('checked', false); }
    $('input[name="data[Aefi][serious]"]').click(function(){ 
        if ($(this).val() == 'No') {
            $('input[name="data[Aefi][serious_yes]"]').attr('disabled', this.checked).attr('checked', !this.checked);
            $('#serious_yes_clear').hide();
        } else {
            $('input[name="data[Aefi][serious_yes]"]').attr('disabled', false);
            $('#serious_yes_clear').show();
        }
    });
    if($('input[name="data[Aefi][serious]"][value="No"]').is(':checked')){ $('input[name="data[Aefi][serious_yes]"]').attr('disabled', true).attr('checked', false); }
	
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