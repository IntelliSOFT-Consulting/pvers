$(function() {
    $(document).on('click', '.remove-product', remove_product);
    $(document).on('click', '#addMedicationProduct', reloadMedicationProducts);


    //Hapa Kazi tu    
    reloadMedicationProducts();
    function reloadMedicationProducts(){
      // $('.date-pick-field').datetimepicker({
      //   format: 'd-m-Y H:i'
      // });

    }


    // incremental development
    $("#addMedicationProduct").click(function() {

      if ($("#listOfMedicationProductsTable tbody td.sailor").length > 0) {
        var intId = parseInt($("#listOfMedicationProductsTable td.sailor:last").text())
      } else {
        var intId = 0;
      }
        
      //var intId = $("#listOfMedicationProductsTable tr").length - 1;
      if ($('#listOfMedicationProductsTable tbody td.sailor').length < 10) {            
          // trVar = $.parseHTML(constructLPRTr(intId));
          trVar = constructLPRTr(intId);
          $("#listOfMedicationProductsTable tbody").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" MedicationProducts at a time!");
      }
    });

    function constructLPRTr(intId) {
        var intId2 = intId + 1;
            
        var trWrapper = '\
                  <tr>\
                    <td rowspan="8" class="sailor">{i2}</td>\
                    <td><input type="hidden" name="data[MedicationProduct][{i}][id]" class="" id="MedicationProduct{i}Id"> Generic name (active ingredient) </td>\
                    <td>\
                        <div class="control-group"><input name="data[MedicationProduct][{i}][generic_name_i]" class="span11 autosave-ignore" maxlength="255" type="text" id="MedicationProduct{i}GenericNameI"></div> </td> \
                    <td>\
                        <div class="control-group"><input name="data[MedicationProduct][{i}][generic_name_ii]" class="span11 autosave-ignore" maxlength="255" type="text" id="MedicationProduct{i}GenericNameIi"></div></td>\
                    <td rowspan="8">\
                        <button type="button" class="btn btn-danger btn-sm remove-product" value=""> <i class="icon-minus"></i> </button></td>\
                  </tr>\
                  <tr>\
                    <td>Brand/ Product Name</td>\
                    <td>\
                        <div class="control-group"><input name="data[MedicationProduct][{i}][product_name_i]" class="span11 autosave-ignore" maxlength="255" type="text" id="MedicationProduct{i}ProductNameI"></div> </td>\
                    <td>\
                        <div class="control-group"><input name="data[MedicationProduct][{i}][product_name_ii]" class="span11 autosave-ignore" maxlength="255" type="text" id="MedicationProduct{i}ProductNameIi"></div> </td> \
                  </tr>\
                  <tr>\
                    <td>Dosage form</td>\
                    <td>\
                        <div class="control-group"><input name="data[MedicationProduct][{i}][dosage_form_i]" class="span11 autosave-ignore" maxlength="255" type="text" id="MedicationProduct{i}DosageFormI"></div> </td>\
                    <td>\
                        <div class="control-group"><input name="data[MedicationProduct][{i}][dosage_form_ii]" class="span11 autosave-ignore" maxlength="255" type="text" id="MedicationProduct{i}DosageFormIi"></div></td>\
                  </tr>\
                  <tr>\
                    <td>Dose, frequency, duration, route</td>\
                    <td>\
                        <div class="control-group"><input name="data[MedicationProduct][{i}][dosage_i]" class="span11 autosave-ignore" maxlength="255" type="text" id="MedicationProduct{i}DosageI"></div> </td>\
                    <td>\
                        <div class="control-group"><input name="data[MedicationProduct][{i}][dosage_ii]" class="span11 autosave-ignore" maxlength="255" type="text" id="MedicationProduct{i}DosageIi"></div> </td>\
                  </tr>\
                  <tr>\
                    <td colspan="3"><p><i>Please fill below if error involved look alike (similar) product packaging</i></p></td>\
                  </tr>\
                  <tr>\
                    <td>Manufacturer</td>\
                    <td>\
                        <div class="control-group"><input name="data[MedicationProduct][{i}][manufacturer_i]" class="span11 autosave-ignore" maxlength="255" type="text" id="MedicationProduct{i}ManufacturerI"></div> </td>\
                    <td>\
                        <div class="control-group"><input name="data[MedicationProduct][{i}][manufacturer_ii]" class="span11 autosave-ignore" maxlength="255" type="text" id="MedicationProduct{i}ManufacturerIi"></div> </td>\
                  </tr>\
                  <tr>\
                    <td>Strength/concentration</td>\
                    <td>\
                        <div class="control-group"><input name="data[MedicationProduct][{i}][strength_i]" class="span11 autosave-ignore" maxlength="255" type="text" id="MedicationProduct{i}StrengthI"></div>  </td> \
                    <td>\
                        <div class="control-group"><input name="data[MedicationProduct][{i}][strength_ii]" class="span11 autosave-ignore" maxlength="255" type="text" id="MedicationProduct{i}StrengthIi"></div> </td> \
                  </tr>\
                  <tr>\
                    <td>Type and size of container</td>\
                    <td>\
                        <div class="control-group"><input name="data[MedicationProduct][{i}][container_i]" class="span11 autosave-ignore" maxlength="255" type="text" id="MedicationProduct{i}ContainerI"></div> </td>\
                    <td>\
                        <div class="control-group"><input name="data[MedicationProduct][{i}][container_ii]" class="span11 autosave-ignore" maxlength="255" type="text" id="MedicationProduct{i}ContainerIi"></div> </td>\
                  </tr>\
        ';

        return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
    }

    function remove_product() {
      if ( typeof $(this).val() !== 'undefined' && $(this).val() !== false && $(this).val() !== "") {
        $.ajax({
          async:true, type:'POST', 
          url:'/medication_products/delete/'+$(this).val()+'.json',
          data:{'id': $(this).val(), 'medication_id': $('input[name="data[Medication][id]"]').text()}, //TODO:Use this to ensure the aefi belongs to the user
          success : function(data) {
             console.log(data);
          }
        }); 
      } 
      updateLPRTr($(this));         
    }

    function updateLPRTr(myobj){
      // console.log(myobj.closest('tr').remove);
      // console.log(myobj.closest('td').attr('rowspan'));
      rows = parseInt(myobj.closest('td').attr('rowspan'));
      $tr = myobj.closest('tr');
      for (var i = 0; i <= rows-2; i++) {
         $tr.next().remove();
      }
      $tr.slideUp(300, function(){
            $(this).remove();
      });
    };

});
