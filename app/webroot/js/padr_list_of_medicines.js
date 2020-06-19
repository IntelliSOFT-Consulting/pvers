$(function() {
    $(document).on('click', '.remove-padr-product', remove_padr_medicine);
    $(document).on('click', '#addPadrListOfMedicine', reloadPublicmediCations);


    //Hapa Kazi tu    
    reloadPublicmediCations();
    function reloadPublicmediCations(){
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
    }


    // incremental development
    $("#addPadrListOfMedicine").click(function() {
      if ($("#listOfPadrListOfMedicinesTable tbody td.sailor").length > 0) {
        var intId = parseInt($("#listOfPadrListOfMedicinesTable td.sailor:last").text());
      } else {
        var intId = 0;
      }
        
      //var intId = $("#listOfPadrListOfMedicinesTable tr").length - 1;
      if ($('#listOfPadrListOfMedicinesTable tbody td.sailor').length < 10) {            
          trVar = $.parseHTML(constructLPRTr(intId));
          $("#listOfPadrListOfMedicinesTable tbody").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" Medicines at a time!");
      }
    });

    function constructLPRTr(intId) {
        var intId2 = intId + 1;
            
        var trWrapper = '\
                  <tr>\
                    <td rowspan="3" class="sailor">{i2}</td>\
                    <td><input type="hidden" name="data[PadrListOfMedicine][{i}][id]" class="" id="PadrListOfMedicine{i}Id"> Name of Medicine </td>\
                    <td>\
                        <input name="data[PadrListOfMedicine][{i}][product_name]" class="span11" type="text" id="PadrListOfMedicine{i}ProductName"> </td>\
                    <td>Manufacturer </td>\
                    <td>\
                        <input name="data[PadrListOfMedicine][{i}][manufacturer]" class="span11" type="text" id="PadrListOfMedicine{i}Manufacturer"> </td>\
                    <td rowspan="3">\
                        <button type="button" class="btn btn-danger btn-small remove-padr-product" value=""> <i class="icon-minus"></i></button>\
                    </td>\
                  </tr>\
                  <tr>\
                    <td>When did you start taking the medicine?</td>\
                    <td>\
                        <input name="data[PadrListOfMedicine][{i}][start_date]" class="span11 date-pick-from" type="text" id="PadrListOfMedicine{i}StartDate"> </td>\
                    <td>When did you stop taking the medicine?</td>\
                    <td>\
                        <input name="data[PadrListOfMedicine][{i}][end_date]" class="span11 date-pick-to" type="text" id="PadrListOfMedicine{i}EndDate"> </td>\
                  </tr>\
                  <tr>\
                    <td>Expiry date of the medicine</td>\
                    <td><input name="data[PadrListOfMedicine][{i}][expiry_date]" class="span11 date-pick-field" type="text" id="PadrListOfMedicine{i}ExpiryDate"> </td>\
                    <td>  </td>\
                    <td>  </td>\
                  </tr>\
        ';

        return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
    }

    function remove_padr_medicine() {
      if ( typeof $(this).val() !== 'undefined' && $(this).val() !== false && $(this).val() !== "") {
        $.ajax({
          async:true, type:'POST', 
          url:'/padr-list-of-medicines/delete.json',
          data:{'id': $(this).val(), 'medication_id': $('#medication_pr_id').text()}, //TODO:Use this to ensure the sadr belongs to the user
          success : function(data) {
             console.log(data);
          }
        }); 
      } 
      updateLPRTr($(this));         
    }

    function updateLPRTr(myobj){
      // console.log(myobj.closest('tr').remove);
      console.log(myobj.closest('td').attr('rowspan'));
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
