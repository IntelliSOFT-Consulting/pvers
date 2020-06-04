$(function() {
    $(document).on('click', '.remove-pint', remove_pint);
    $(document).on('click', '#addPint', reloadPints);


    //Hapa Kazi tu    
    reloadPints();
    function reloadPints(){
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
    $("#addPint").click(function() {
      //console.log($("#listOfPintsTable tbody tr").length);

      if ($("#listOfPintsTable tbody tr").length > 0) {
        var intId = parseInt($("#listOfPintsTable tr:last").find('td:first').text())
      } else {
        var intId = 0;
      }
        
      //var intId = $("#listOfPintsTable tr").length - 1;
      if ($('#listOfPintsTable tbody tr').length < 10) {            
          // trVar = $.parseHTML(constructLOPTr(intId));
          trVar = constructLOPTr(intId);
          $("#listOfPintsTable tbody").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" Pints at a time!");
      }
    });

    function constructLOPTr(intId) {
        var intId2 = intId + 1;
            
        var trWrapper = '\
          <tr>\
            <td>{i2}</td>\
            <td><input type="hidden" name="data[Pint][{i}][id]" id="Pint{i}Id">\
                <div class="control-group"><input name="data[Pint][{i}][component_type]" class="span11" required="required" maxlength="200" type="text" id="Pint{i}ComponentType"></div></td>\
            <td>\
              <div class="control-group"><input name="data[Pint][{i}][pint_no]" class="span11" maxlength="255" type="text" id="Pint{i}PintNo"></div> </td>\
            <td>\
              <div class="control-group"><input name="data[Pint][{i}][expiry_date]" class="span11 date-pick-expire" type="text" id="Pint{i}ExpiryDate"></div> </td>\
            <td>\
              <div class="control-group"><input name="data[Pint][{i}][volume_transfused]" class="span11" maxlength="55" id="Pint{i}VolumeTransfused"></div> </td>\
            <td>\
              <button type="button" class="btn btn-danger btn-sm remove-pint" value=""> <i class="icon-minus"></i> </button>\
            </td>\
          </tr>\
        ';

        return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
    }

    function remove_pint() {
      if ( typeof $(this).val() !== 'undefined' && $(this).val() !== false && $(this).val() !== "") {
        $.ajax({
          async:true, type:'POST', 
          url:'/pints/delete.json',
          data:{'id': $(this).val(), 'transfusion_id': $('#transfusion_pr_id').text()}, //TODO:Use this to ensure the sadr belongs to the user
          success : function(data) {
             console.log(data);
          }
        }); 
      } 
      updateLOPTr($(this));         
    }

    function updateLOPTr(myobj){
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
