$(function() {
    $(document).on('click', '.remove-vaccine', remove_vaccine);
    $(document).on('click', '.remove-diluent', remove_diluent);
    $(document).on('click', '#addAefiVaccine', reloadVaccines);
    $(document).on('click', '#addAefiDiluent', reloadVaccines);

    //$('#aefi-list-of-vaccines-0-vaccination-date').datetimepicker();

    //Hapa Kazi tu    
    reloadVaccines();
    function reloadVaccines(){
      //console.log('reload stuff called!!');
      var dates2 = $('.date-pick-expire').datepicker({
        minDate:"-100Y", maxDate:"+5Y", 
        dateFormat:'dd-mm-yy', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
        showAnim:'show'
      });

      var dates4 = $('.date-pick-field').datepicker({
        minDate:"-100Y", maxDate:"-0D", 
        dateFormat:'dd-mm-yy', 
        showButtonPanel:true, 
        changeMonth:true, 
        changeYear:true, 
        showAnim:'show'
      });
      // $('.date-pick-field').datetimepicker({
      //   format: 'd-m-Y H:i'
      // });

      var availableVax = [
        "BCG",
        "bOPV (Bivalent Oral Polio Vaccine)",
        "Pentavalent (DTP-HepB-Hib)",
        "PCV (Pneumoccocal Conjugate Vaccine)",
        "IPV (Inactivated Polio Vaccine)",
        "Measles Rubella (MR)",
        "Yellow Fever",
        "Rotavirus",
        "Malaria Vaccine (RTSS)",
        "HPV (Human Papilloma Virus)",
        "Tetanus Diphtheria",
        "Anti-Rabies Vaccine",
        "Typhoid Vaccine",
        "Hepatitis B vaccine",
        "Influenza vaccine"
      ];
      $('.vaxname').autocomplete({
        source: availableVax
      });

      var dates3 = 0;     //TODO:search for date time fields and use
      // $('.datetime-field').datetimepicker({
      //   //format: 'd-m-Y'
      //   format: 'd-m-Y H:i'
      // });

    }


    // incremental development
    $("#addAefiVaccine").click(function() {
      //console.log($("#listOfVaccinesTable tbody tr").length);

      if ($("#listOfVaccinesTable tbody tr").length > 0) {
        var intId = parseInt($("#listOfVaccinesTable tr:last").find('td:first').text())
      } else {
        var intId = 0;
      }
        
      //var intId = $("#listOfVaccinesTable tr").length - 1;
      if ($('#listOfVaccinesTable tbody tr').length < 10) {            
          // trVar = $.parseHTML(constructLOVTr(intId));
          trVar = constructLOVTr(intId);
          $("#listOfVaccinesTable tbody").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" Vaccines at a time!");
      }
    });

    function constructLOVTr(intId) {
        var intId2 = intId + 1;
        // <div class="col-xs-6"> <input class="form-control date-pick-field" name="aefi_list_of_vaccines[{i}][vaccination_date]" id="aefi-list-of-vaccines-{i}-vaccination-date" type="text"></div>\
                // <div class="col-xs-6"> <input class="form-control " name="aefi_list_of_vaccines[{i}][vaccination_time]" id="aefi-list-of-vaccines-{i}-vaccination-time" placeholder="14:00" type="text" ></div> </td>\
            
        var trWrapper = '\
          <tr>\
            <td>{i2}</td>\
            <td><input type="hidden" name="data[AefiListOfVaccine][{i}][id]" id="AefiListOfVaccine{i}Id">\
                <div class="control-group"><input name="data[AefiListOfVaccine][{i}][vaccine_name]" class="span11 vaxname" required="required" maxlength="200" type="text" id="AefiListOfVaccine{i}VaccineName"></div></td>\
            <td>\
              <div class="control-group"><input name="data[AefiListOfVaccine][{i}][dosage]" class="span11" maxlength="255" type="text" id="AefiListOfVaccine{i}Dosage"></div> </td>\
            <td>\
              <div class="control-group"><input name="data[AefiListOfVaccine][{i}][vaccination_date]" class="span11 date-pick-field" type="text" required="required" id="AefiListOfVaccine{i}VaccinationDate"></div> </td>\
            <td>\
              <div class="control-group"><input name="data[AefiListOfVaccine][{i}][vaccination_route]" class="span11" maxlength="255" type="text" id="AefiListOfVaccine0VaccinationRoute"></div> </td>\
            <td><div class="control-group"><input name="data[AefiListOfVaccine][{i}][batch_number]" class="span11"   maxlength="255" type="text" id="AefiListOfVaccine{i}BatchNumber"></div> </td>\
            <td><div class="control-group"><input name="data[AefiListOfVaccine][{i}][vaccine_manufacturer]" class="span11"   maxlength="255" type="text" id="AefiListOfVaccine{i}VaccineManufacturer"></div> </td>\
            <td>\
              <div class="control-group"><input name="data[AefiListOfVaccine][{i}][expiry_date]" class="span11 date-pick-expire" type="text" id="AefiListOfVaccine{i}ExpiryDate"></div> </td>\
            <td>\
              <div class="control-group"><input name="data[AefiListOfVaccine][{i}][diluent_batch_number]" class="span11"  maxlength="55" type="text" id="AefiListOfVaccine{i}DiluentBatchNumber"></div> </td>\
            <td>\
              <div class="control-group"><input name="data[AefiListOfVaccine][{i}][diluent_manufacturer]" class="span11" maxlength="255" type="text" id="AefiListOfVaccine{i}DiluentManufacturer"></div> </td>\
            <td>\
              <div class="control-group"><input name="data[AefiListOfVaccine][{i}][diluent_expiry_date]" class="span11 date-pick-expire" type="text" id="AefiListOfVaccine{i}DiluentExpiryDate"></div> </td>\
            <td>\
              <button type="button" class="btn btn-danger btn-sm remove-vaccine" value=""> <i class="icon-minus"></i> </button>\
            </td>\
          </tr>\
        ';

        return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
    }

    function remove_vaccine() {
      if ( typeof $(this).val() !== 'undefined' && $(this).val() !== false && $(this).val() !== "") {
        $.ajax({
          async:true, type:'POST', 
          url:'/aefi-list-of-vaccines/delete.json',
          data:{'id': $(this).val(), 'aefi_id': $('#aefi_pr_id').text()}, //TODO:Use this to ensure the sadr belongs to the user
          success : function(data) {
             console.log(data);
          }
        }); 
      } 
      updateLOVTr($(this));         
    }

    function updateLOVTr(myobj){
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
    
    //Diluents 
    $("#addAefiDiluent").click(function() {
      if ($("#listOfDiluentsTable tbody tr").length > 0) {
        var intId = parseInt($("#listOfDiluentsTable tr:last").find('td:first').text())
      } else {
        var intId = 0;
      }
        
      if ($('#listOfDiluentsTable tbody tr').length < 10) {            
          // trVar = $.parseHTML(constructLDTr(intId));
          trVar = constructLDTr(intId);
          $("#listOfDiluentsTable tbody").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" Diluents at a time!");
      }
    });

    function constructLDTr(intId) {
        var intId2 = intId + 1;
        var trWrapper = '\
          <tr>\
            <td>{i2}</td>\
            <td><input class="form-control" name="aefi_list_of_diluents[{i}][id]" id="aefi-list-of-diluents-{i}-id" type="hidden"> \
                <input class="form-control" name="aefi_list_of_diluents[{i}][diluent_name]" id="aefi-list-of-diluents--{i}-diluent-name" type="text">  </td>\
            <td>\
                <div class="col-xs-6"> <input class="form-control date-pick-field" name="aefi_list_of_diluents[{i}][diluent_date]" id="aefi-list-of-diluents-{i}-diluent-date" type="text"> </div>\
                <div class="col-xs-6"> <input class="form-control " name="aefi_list_of_diluents[{i}][diluent_time]" id="aefi-list-of-diluents-{i}-diluent-time" type="text" placeholder="14:00"> </div></td>\
            <td>\
                <input class="form-control" name="aefi_list_of_diluents[{i}][batch_number]" id="aefi-list-of-diluents-{i}-batch-number" type="text">  </td>\
            <td>\
              <input class="form-control date-pick-expire" name="aefi_list_of_diluents[{i}][expiry_date]" id="aefi-list-of-diluents-{i}-expiry-date" type="text">   </td>\
            <td>\
                <button type="button" class="btn btn-default btn-sm remove-diluent"><i class="fa fa-minus"></i> Remove</button>\
            </td>\
          </tr>\
        ';

        return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
    }

    function remove_diluent() {
      if ( typeof $(this).val() !== 'undefined' && $(this).val() !== false && $(this).val() !== "") {
        $.ajax({
          async:true, type:'POST', 
          url:'/aefi-list-of-diluents/delete.json',
          data:{'id': $(this).val(), 'aefi_id': $('#aefi_pr_id').text()}, //TODO:Use this to ensure the aefi belongs to the user
          success : function(data) {
             console.log(data);
          }
        }); 
      } 
      updateLDTr($(this));         
    }

    function updateLDTr(myobj){
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
