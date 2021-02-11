$(document).ready(function() {
	$('.date-pick-field').datepicker({
          minDate:"-100Y", maxDate:"0", 
          dateFormat:'dd-mm-yy'
    });


    //If Donor disable Patient specific fields and vice versa
    $('input[name="data[Transfusion][form_type]"]').click(function(){ 
        if ($(this).val() == 'Patient') {
            $('.donor :input').prop('disabled', true);
            $('.uliwahifadhi :input').prop('disabled', false);

        } else {
            $('.donor :input').prop('disabled', false);
            $('.uliwahifadhi :input').prop('disabled', true);
            // console.log('Damu ya thamani');
        }
    });
    if($('input[name="data[Transfusion][form_type]"][value="Patient"]').is(':checked')) { 
        $('.donor :input').prop('disabled', true);
        $('.uliwahifadhi :input').prop('disabled', false);
    } 
    if($('input[name="data[Transfusion][form_type]"][value="Donor"]').is(':checked')) {
        $('.donor :input').prop('disabled', false);
        $('.uliwahifadhi :input').prop('disabled', true);
    }

    //Person submitting
	$('.person-submit').on('change',function() {
        var pilih = $(this).val();
        if (pilih == 'Yes') {
        	$('.diff :input').prop('disabled',false);
        } else {
        	$('.diff :input').val('');
        	$('.diff :input').prop('disabled',true);
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
