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

});
