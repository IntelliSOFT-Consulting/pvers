$(document).ready(function() {
	$('.date-pick-field').datepicker({
          minDate:"-100Y", maxDate:"0", 
          dateFormat:'dd-mm-yy'
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
    if($("#TransfusionPersonSubmittingNo").is(':checked')){ $('.diff:input').prop('disabled',true); }


    //If Hemolysis absent disable present
    $('input[name="data[Transfusion][lab_hemolysis]"]').click(function(){ 
        if ($(this).val() == 'Absent') {
            $('input[name="data[Transfusion][lab_hemolysis_present]"]').attr('disabled', this.checked).attr('checked', !this.checked);
        } else {
            $('input[name="data[Transfusion][lab_hemolysis_present]"]').attr('disabled', false);
        }
    });
    if($('input[name="data[Transfusion][lab_hemolysis]"][value="Absent"]').is(':checked')){ $('input[name="data[Transfusion][lab_hemolysis_present]"]').attr('disabled', true).attr('checked', false); }

});
