$(function() {
    $(document).on('click', '.remove-medicine', remove_medicine);
    $(document).on('click', '#addMedicine', reloadMedicines);

    //$('#-list-of-medicines-0-vaccination-date').datetimepicker();

    //Hapa Kazi tu    
    reloadMedicines();
    function reloadMedicines(){
      //console.log('reload stuff called!!');
      var dates2 = $('.date-pick-from, .date-pick-to').datepicker({
        minDate:"-100Y", maxDate:"-0D", 
        dateFormat:'dd-mm-yy', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
        showAnim:'show'
      });

      $('.date-pick-field').datepicker({
          minDate:"-100Y", maxDate:"0", 
          dateFormat:'dd-mm-yy'
      });

    }


    // incremental development
    $("#addMedicine").click(function() {
      //console.log($("#listOfMedicinesTable tbody tr").length);

      if ($("#listOfMedicinesTable tbody tr").length > 0) {
        var intId = parseInt($("#listOfMedicinesTable tr:last").find('td:first').text())
      } else {
        var intId = 0;
      }
        
      //var intId = $("#listOfMedicinesTable tr").length - 1;
      if ($('#listOfMedicinesTable tbody tr').length < 10) {            
          trVar = $.parseHTML(constructLODTr(intId));
          // trVar = constructLODTr(intId);
          $(trVar).find('[name*="dose_id"]').append($("#SadrListOfDrug0DoseId > option").clone()).val('');
          $(trVar).find('[name*="route_id"]').append($("#SadrListOfDrug0RouteId > option").clone()).val('');
          $(trVar).find('[name*="frequency_id"]').append($("#SadrListOfDrug0FrequencyId > option").clone()).val('');

          $("#listOfMedicinesTable tbody").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" Medicines at a time!");
      }
    });

    function constructLODTr(intId) {
        var intId2 = intId + 1;
        // <div class="col-xs-6"> <input class="span11 date-pick-field" name="_list_of_medicines[{i}][vaccination_date]" id="-list-of-medicines-{i}-vaccination-date" type="text"></div>\
                // <div class="col-xs-6"> <input class="span11 " name="_list_of_medicines[{i}][vaccination_time]" id="-list-of-medicines-{i}-vaccination-time" placeholder="14:00" type="text" ></div> </td>\
            
        var trWrapper = '\
          <tr>\
            <td>{i2}</td>\
            <td><input class="span11" name="data[SadrListOfMedicine][{i}][id]" id="SadrListOfMedicine{i}-id" type="hidden"> \
                <input class="span11" name="data[SadrListOfMedicine][{i}][drug_name]" id="SadrListOfMedicine{i}DrugName" type="text">  </td>\
            <td>\
                <input class="span11" name="data[SadrListOfMedicine][{i}][brand_name]" id="SadrListOfMedicine{i}BrandName" type="text"> </td>\
            <td>\
                <input class="span11" name="data[SadrListOfMedicine][{i}][batch_no]" maxlength="255" id="SadrListOfMedicine{i}BatchNo" type="text"> </td>\
            <td>\
                <input class="span11" name="data[SadrListOfMedicine][{i}][manufacturer]" maxlength="255" id="SadrListOfMedicine{i}Manufacturer" type="text"> </td>\
            <td><input class="span11" name="data[SadrListOfMedicine][{i}][dose]" id="SadrListOfMedicine{i}Dose" type="text"> </td>\
            <td>\
                 <select class="span11" name="data[SadrListOfMedicine][{i}][dose_id]" id="SadrListOfMedicine{i}DoseId"></select>    </td>\
            <td> <select class="span11" name="data[SadrListOfMedicine][{i}][route_id]" id="SadrListOfMedicine{i}RouteId"></select>  </td>\
            <td> <select class="span11" name="data[SadrListOfMedicine][{i}][frequency_id]" id="SadrListOfMedicine{i}FrequencyId"></select>     </td>\
            <td>\
              <input class="span11 date-pick-from" name="data[SadrListOfMedicine][{i}][start_date]" id="SadrListOfMedicine{i}StartDate" type="text">   </td>\
            <td>\
              <input class="span11 date-pick-to" name="data[SadrListOfMedicine][{i}][stop_date]" id="SadrListOfMedicine{i}StopDate" type="text">  </td>\
            <td> <input class="span11" name="data[SadrListOfMedicine][{i}][indication]" id="SadrListOfMedicine{i}Indication" type="text"> </td>\
            <td>\
                <button type="button" class="btn btn-danger btn-small remove-medicine" ><i class="fa fa-minus"></i> </button>\
            </td>\
          </tr>\
        ';

        return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
    }

    function remove_medicine() {
      if ( typeof $(this).val() !== 'undefined' && $(this).val() !== false && $(this).val() !== "") {
        $.ajax({
          async:true, type:'POST', 
          url:'/sadr_list_of_medicines/delete/'+$(this).val()+'.json',
          data:{'id': $(this).val(), '_id': $('input[name="data[Sadr][id]"]').val()}, //TODO:Use this to ensure the sadr belongs to the user
          success : function(data) {
             console.log(data);
          }
        }); 
      } 
      updateLODTr($(this));         
    }

    function updateLODTr(myobj){
      myobj
       .closest('td')
       .siblings()
       .wrapInner('<div style="display: block;" />')
       .closest('tr')
       .find('td > div')
       .slideUp(300, function(){
          $(this).closest('tr').remove();
       });
    };

});
