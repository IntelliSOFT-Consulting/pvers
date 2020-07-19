$(function() {
    $(document).on('click', '.remove-device', remove_device);
    $(document).on('click', '#addDevice', reloadDevices);

    //$('#-list-of-devices-0-vaccination-date').datetimepicker();

    //Hapa Kazi tu    
    reloadDevices();
    function reloadDevices(){
      //console.log('reload stuff called!!');
      var dates2 = $('.date-pick-expire').datepicker({
        minDate:"-100Y", maxDate:"+5Y", 
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
    $("#addDevice").click(function() {
      //console.log($("#listOfDevicesTable tbody tr").length);

      if ($("#listOfDevicesTable tbody tr").length > 0) {
        var intId = parseInt($("#listOfDevicesTable tr:last").find('td:first').text())
      } else {
        var intId = 0;
      }
        
      //var intId = $("#listOfDevicesTable tr").length - 1;
      if ($('#listOfDevicesTable tbody tr').length < 10) {            
          // trVar = $.parseHTML(constructLODTr(intId));
          trVar = constructLODTr(intId);
          $("#listOfDevicesTable tbody").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" Devices at a time!");
      }
    });

    function constructLODTr(intId) {
        var intId2 = intId + 1;
        // <div class="col-xs-6"> <input class="form-control date-pick-field" name="_list_of_devices[{i}][vaccination_date]" id="-list-of-devices-{i}-vaccination-date" type="text"></div>\
                // <div class="col-xs-6"> <input class="form-control " name="_list_of_devices[{i}][vaccination_time]" id="-list-of-devices-{i}-vaccination-time" placeholder="14:00" type="text" ></div> </td>\
            
        var trWrapper = '\
          <tr>\
            <td>{i2}</td>\
            <td><input type="hidden" name="data[ListOfDevice][{i}][id]" id="ListOfDevice{i}Id">\
                <div class="control-group"><input name="data[ListOfDevice][{i}][brand_name]" class="span11" required="required" maxlength="200" type="text" id="ListOfDevice{i}BrandName"></div></td>\
            <td>\
              <div class="control-group"><input name="data[ListOfDevice][{i}][serial_no]" class="span11" maxlength="255" type="text" id="ListOfDevice{i}SerialNo"></div> </td>\
            <td>\
              <div class="control-group"><input name="data[ListOfDevice][{i}][common_name]" class="span11" type="text" id="ListOfDevice{i}CommonName"></div> </td>\
            <td>\
              <div class="control-group"><input name="data[ListOfDevice][{i}][manufacturer]" class="span11" maxlength="255" type="text" id="ListOfDevice{i}Manufacturer"></div> </td>\
            <td>\
              <div class="control-group"><input name="data[ListOfDevice][{i}][manufacture_date]" class="span11 date-pick-field" type="text" id="ListOfDevice{i}ManufactureDate"></div> </td>\
            <td>\
              <div class="control-group"><input name="data[ListOfDevice][{i}][expiry_date]" class="span11 date-pick-expire" type="text" id="ListOfDevice{i}ExpiryDate"></div> </td>\
            <td>\
              <button type="button" class="btn btn-danger btn-sm remove-device" value=""> <i class="icon-minus"></i> </button>\
            </td>\
          </tr>\
        ';

        return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
    }

    function remove_device() {
      if ( typeof $(this).val() !== 'undefined' && $(this).val() !== false && $(this).val() !== "") {
        $.ajax({
          async:true, type:'POST', 
          url:'/list_of_devices/delete/'+$(this).val()+'.json',
          data:{'id': $(this).val(), 'device_id': $('input[name="data[Device][id]"]').text()}, //TODO:Use this to ensure the aefi belongs to the user
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
