$(document).ready(function () {

    $("#Ce2bCountyId").combobox();

    if ($('#Ce2bReportType').val() == 'Followup') {
        $('#Ce2bReporterEditForm :input').attr('readonly', 'readonly');  
        $('.editable :input').prop('disabled', false).attr('readonly', false); 
        if ($('#Ce2bSeriousYes').is(':checked')) {
            console.log('Yes was selected initially'); 
            $('#Ce2bSeriousNo').prop('disabled', true); // disable the "No" option
            $('#clearButton').prop('disabled', true);
        } 

        // Handle the scale for severity
        if ($('#Ce2bSeverityMild').is(':checked')) {
            $('#Ce2bSeverityMild').prop('disabled', false); 
            $('#Ce2bSeverityModerate').prop('disabled', false); 
            $('#Ce2bSeveritySevere').prop('disabled', false);
            $('#Ce2bSeverityFatal').prop('disabled', false);
            $('#Ce2bSeverityUnknown').prop('disabled', true);
        }
        if ($('#Ce2bSeverityModerate').is(':checked')) {
            $('#Ce2bSeverityMild').prop('disabled', true); 
            $('#Ce2bSeverityModerate').prop('disabled', false); 
            $('#Ce2bSeveritySevere').prop('disabled', false);
            $('#Ce2bSeverityFatal').prop('disabled', false);
            $('#Ce2bSeverityUnknown').prop('disabled', true);
        }
        if ($('#Ce2bSeveritySevere').is(':checked')) {
            $('#Ce2bSeverityMild').prop('disabled', true); 
            $('#Ce2bSeverityModerate').prop('disabled', true); 
            $('#Ce2bSeveritySevere').prop('disabled', false);
            $('#Ce2bSeverityFatal').prop('disabled', false);
            $('#Ce2bSeverityUnknown').prop('disabled', true);
        }
        if ($('#Ce2bSeverityFatal').is(':checked')) {
            $('#Ce2bSeverityMild').prop('disabled', true); 
            $('#Ce2bSeverityModerate').prop('disabled', true); 
            $('#Ce2bSeveritySevere').prop('disabled', true);
            $('#Ce2bSeverityFatal').prop('disabled', false);
            $('#Ce2bSeverityUnknown').prop('disabled', true);
        }
        if ($('#Ce2bSeverityUnknown').is(':checked')) {
            $('#Ce2bSeverityMild').prop('disabled', false); 
            $('#Ce2bSeverityModerate').prop('disabled', false); 
            $('#Ce2bSeveritySevere').prop('disabled', false);
            $('#Ce2bSeverityFatal').prop('disabled', false);
            $('#Ce2bSeverityUnknown').prop('disabled', false);
        }

        

    }

    //Person submitting
    $('.person-submit').on('change', function () {
        var pilih = $(this).val();
        if (pilih == 'Yes') {
            $('.diff:input').prop('disabled', false);
        } else {
            $('.diff:input').val('');
            $('.diff:input').prop('disabled', true);
        }
    });
    if ($("#Ce2bPersonSubmittingNo").is(':checked')) { $('.diff:input').prop('disabled', true); }

    //If Male disable
    $('input[name="data[Ce2b][gender]"]').click(function () {
        if ($(this).val() == 'Male') {
            $('input[name="data[Ce2b][pregnancy_status]"]').attr('disabled', this.checked).attr('checked', !this.checked);
        } else {
            $('input[name="data[Ce2b][pregnancy_status]"]').attr('disabled', false);
        }
    });
    if ($('input[name="data[Ce2b][gender]"][value="Male"]').is(':checked')) { $('input[name="data[Ce2b][pregnancy_status]"]').attr('disabled', true).attr('checked', false); }

    //If not serious disable criteria
    $('input[name="data[Ce2b][serious]"]').click(function () {
        if ($(this).val() == 'No') {
            $('input[name="data[Ce2b][serious_reason]"]').attr('disabled', this.checked).attr('checked', !this.checked);
            $('#serious_reason_clear').hide();
        } else {
            $('input[name="data[Ce2b][serious_reason]"]').attr('disabled', false);
            $('#serious_reason_clear').show();
        }
    });
    if ($('input[name="data[Ce2b][serious]"][value="No"]').is(':checked')) { $('input[name="data[Ce2b][serious_reason]"]').attr('disabled', true).attr('checked', false); }

    $("#Ce2bReaction").autocomplete({
        source: "/meddras/autocomplete.json"
    });

    var cache2 = {}, lastXhr;
    $("#Ce2bInstitutionCode").autocomplete({
        source: function (request, response) {
            var term = request.term;
            if (term in cache2) {
                response(cache2[term]);
                return;
            }

            lastXhr = $.getJSON("/facility_codes/autocomplete.json", request, function (data, status, xhr) {
                cache2[term] = data;
                if (xhr === lastXhr) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            $("#Ce2bNameOfInstitution").val(ui.item.label);
            $("#Ce2bInstitutionCode").val(ui.item.value);
            $("#Ce2bAddress").val(ui.item.addr);
            $("#Ce2bInstitutionContact").val(ui.item.phone);
            return false;
        }
    });

    var cache3 = {}, lastXhr;
    $("#Ce2bNameOfInstitution").autocomplete({
        source: function (request, response) {
            var term = request.term;
            if (term in cache3) {
                response(cache3[term]);
                return;
            }

            lastXhr = $.getJSON("/facility_codes/autocomplete.json", request, function (data, status, xhr) {
                cache3[term] = data;
                if (xhr === lastXhr) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            $("#Ce2bNameOfInstitution").val(ui.item.label);
            $("#Ce2bInstitutionCode").val(ui.item.value);
            $("#Ce2bAddress").val(ui.item.addr);
            $("#Ce2bInstitutionContact").val(ui.item.phone);
            return false;
        }
    })
    // get the id of Ce2b_medicinal_product_ 
    $('#Ce2bMedicinalProduct').change(function () {  
        $('#Ce2bHerbalProduct').attr("checked", false);
        $('#Ce2bCosmeceuticals').attr("checked", false);
        $('#Ce2bProductOther').attr("checked", false); 

        
    }
    );
    // get the Ce2b_herbal_product_ 
    $('#Ce2bHerbalProduct').change(function () {
        $('#Ce2bMedicinalProduct').attr("checked", false);
        $('#Ce2bCosmeceuticals').attr("checked", false);
        $('#Ce2bProductOther').attr("checked", false); 
    }
    );
    // Ce2b_cosmeceuticals_
    $('#Ce2bCosmeceuticals').change(function () {
        $('#Ce2bHerbalProduct').attr("checked", false);
        $('#Ce2bMedicinalProduct').attr("checked", false);
        $('#Ce2bProductOther').attr("checked", false); 
    }
    );
    // Ce2b_product_other_
    $('#Ce2bProductOther').change(function () {
        $('#Ce2bHerbalProduct').attr("checked", false);
        $('#Ce2bCosmeceuticals').attr("checked", false);
        $('#Ce2bMedicinalProduct').attr("checked", false); 
    }
    
    );
    $('.date-pick-field').datepicker({
        minDate:"-100Y", maxDate:"0", 
        dateFormat:'yy-mm-dd', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
        showAnim:'show'
    });
   
});
