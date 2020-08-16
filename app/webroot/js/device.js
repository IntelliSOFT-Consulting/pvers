$(document).ready(function() {

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
    if($("#DevicePersonSubmittingNo").is(':checked')){ $('.diff:input').prop('disabled',true); }

    
    //If Male disable
    $('input[name="data[Device][gender]"]').click(function(){ 
        if ($(this).val() == 'Male') {
            $('input[name="data[Device][pregnancy_status]"]').attr('disabled', this.checked).attr('checked', !this.checked);
        } else {
            $('input[name="data[Device][pregnancy_status]"]').attr('disabled', false);
        }
    });
    if($('input[name="data[Device][gender]"][value="Male"]').is(':checked')){ $('input[name="data[Device][pregnancy_status]"]').attr('disabled', true).attr('checked', false); }

    //Event classification
    $('input[name="data[Device][serious]"]').click(function(){ 
        if (['Fatal','Serious'].indexOf($(this).val()) == -1) {
            $('input[name="data[Device][serious_yes]"]').attr('disabled', this.checked).attr('checked', !this.checked);
            $('input[name="data[Device][death_date]"]').attr('disabled', this.checked).val('');
        } else {
            $('input[name="data[Device][serious_yes]"]').attr('disabled', false);
            $('input[name="data[Device][death_date]"]').attr('disabled', false);
        }
    });
    if($('input[name="data[Device][serious]"][value="Moderate"], input[name="data[Device][serious]"][value="Mild"]').is(':checked')){
        $('input[name="data[Device][serious_yes]"]').attr('disabled', true).attr('checked', false); 
        $('input[name="data[Device][death_date]"]').attr('disabled', true).val('');
    }
});
