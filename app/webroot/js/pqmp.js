  $( function() {
    
    $( "#PqmpCountyId" ).combobox();
    $( "#toggle" ).on( "click", function() {
        $( "#PqmpCountyId" ).toggle();
    });

    var dates2 = $('.date-pick-expire').datepicker({
        minDate:"-100Y", maxDate:"+5Y", 
        dateFormat:'dd-mm-yy', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
        showAnim:'show'
      });

	var dates4 = $('.date-pick-field').datepicker({
		minDate:"-100Y", maxDate:"-0D", 
		dateFormat:'dd-mm-yy', 
		showButtonPanel:true, 
		changeMonth:true, 
		changeYear:true, 
		showAnim:'show'
	});
	
	//Disable all md until md checkbox is active
	$("#mdactivate :input").attr("disabled", true);
	$("#PqmpMedicalDevice").click(function(){   
	    $("#mdactivate :input").attr('disabled', !this.checked)
	});
	if($("#PqmpMedicalDevice").is(':checked')){ $("#mdactivate :input").attr('disabled', false); }

	$(".make_radio").click(function(){
	    $(".make_radio").not(this).attr("checked",false); 
	});

	$('.person-submit').on('change',function() {
        var pilih = $(this).val();
        if (pilih == 'Yes') {
        	$('.diff:input').prop('disabled',false);
        } else {
        	$('.diff:input').val('');
        	$('.diff:input').prop('disabled',true);
        }
    });
    if($("#PqmpPersonSubmittingNo").is(':checked')){ $('.diff:input').prop('disabled',true); }

    $("#PqmpComplaintOther").click(function(){   
	    $("#PqmpComplaintOtherSpecify").attr('disabled', !this.checked)
	});
	if($("#PqmpComplaintOther").is(':checked')){ $("#PqmpComplaintOtherSpecify").attr('disabled', false); }

    $("#PqmpProductOther").click(function(){   
	    $("#PqmpProductSpecify").attr('disabled', !this.checked)
	});
	if($("#PqmpProductOther").is(':checked')){ $("#PqmpProductSpecify").attr('disabled', false); }

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
			$( "#PqmpFacilityPhone" ).val( ui.item.phone );
			$( "#PqmpFacilityAddress" ).val( ui.item.addr );
			return false;
		}
	});

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
      		$( "#PqmpFacilityPhone" ).val( ui.item.phone );
      		$( "#PqmpFacilityAddress" ).val( ui.item.addr );
			return false;
		}
	});
  });