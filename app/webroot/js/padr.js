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
      
	//If SADR disable PQMP and vice versa
    $('input[name="data[Padr][report_sadr]"]').click(function(){ 
        if ($(this).val() == 'Drug Reaction') {
            $('#pqmp').hide();
            $('#sadr').show("slow");
        } else {
            $('#pqmp').show("slow");
            $('#sadr').hide();
        }
    });
    if($('input[name="data[Padr][report_sadr]"][value="Drug Reaction"]').is(':checked')){ $('#pqmp').hide(); $('#sadr').show("slow"); }
});
