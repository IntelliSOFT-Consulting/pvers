$(document).ready(function() {

	// $( "#PadrCountyId" ).combobox();
	var dates2 = $('.date-pick-from, .date-pick-to').datepicker({
        minDate:"-100Y", maxDate:"-0D", 
        dateFormat:'dd-mm-yy', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
        showAnim:'show'
      });

      $('.date-pick-field').datepicker({
          minDate:"-100Y", 
          dateFormat:'dd-mm-yy'
      });
      
	//If SADR disable PQHPT and vice versa
	$('#pqmp').hide();
	$('#sadr').hide();
    $('input[name="data[Padr][report_sadr]"]').click(function(){ 
        if ($(this).val() == 'Adverse Reaction') {
            $('#pqmp').hide();
            $('#sadr').show("slow");
        } else {
            $('#pqmp').show("slow");
            $('#sadr').hide();
        }
    });
    if($('input[name="data[Padr][report_sadr]"][value="Adverse Reaction"]').is(':checked')) { 
    	$('#pqmp').hide(); $('#sadr').show("slow"); 
    } 
    if($('input[name="data[Padr][report_sadr]"][value="Poor Quality Medicine"]').is(':checked')) {
    	$('#sadr').hide(); $('#pqmp').show("slow");
    }
});
