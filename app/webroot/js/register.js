  $( function() {
    
    $( "#UserCountyId" ).combobox();
    $( "#UserCountryId" ).combobox();
    $( "#toggle" ).on( "click", function() {
      // $( "#combobox" ).toggle();
      $( "#UserCountyId" ).toggle();
     $( "#UserCountryId" ).toggle();
    });

    //If not serious disable criteria
    $('#UserUserType').click(function(){
        $('.ribidi').toggle();
    });
    if(!$('#UserUserType').is(':checked')){ $('.ribidi').hide(); }
    
    var cache2 = {},    lastXhr;
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
      $( "#UserInstitutionContact" ).val( ui.item.phone );
            return false;
        }
    });

    var cache3 = {},    lastXhr;
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
            $( "#UserInstitutionContact" ).val( ui.item.phone );
            return false;
        }
    })
  });