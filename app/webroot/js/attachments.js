$(function() {
    $(document).on('click', '.remove-row', remove_row);

    if ($("#buildattachmentsform tr").length == 1 ) { $("#attachmentsTableHeader").hide(); }
    
    // incremental development
    $("#addAttachment").click(function() {
        $("#attachmentsTableHeader").show();
        var intId = $("#buildattachmentsform tr").length - 1;
        if ($('#buildattachmentsform :input[type="file"]').length < 4) {
            $("#buildattachmentsform").append(constructATr(intId));
        } else {
            alert("Sorry, cant save more than Four Attachments at a time!");
        }
    });
    function constructATr(intId) {
        var intId2 = intId + 1;
        var trWrapper = '\
        <tr class="fieldwrapper" id="field{i}">\
        <td>{i2}</td>\
        <td><div class="control-group">\
            <input type="hidden" id="Attachment{i}Model" name="data[Attachment][{i}][model]" value="'+$('#buildattachmentsform').attr("data-model")+'">\
            <input type="hidden" id="Attachment{i}Group" name="data[Attachment][{i}][group]" value="'+$('#buildattachmentsform').attr("data-group")+'">\
            <input type="hidden" id="Attachment{i}Dirname" name="data[Attachment][{i}][dirname]">\
            <input type="hidden" id="Attachment{i}Basename" name="data[Attachment][{i}][basename]">\
            <input type="hidden" id="Attachment{i}Checksum" name="data[Attachment][{i}][checksum]">\
            <input type="hidden" id="Attachment{i}Id" class="" \
                name="data[Attachment][{i}][id]"><input type="file" id="Attachment{i}File" class="span12 input-file" \
                name="data[Attachment][{i}][file]"  data-items="4"  autocomplete="off" >\
        </div></td>\
        <td><div class="control-group"><textarea id="Attachment{i}Description"  rows="1" \
               name="data[Attachment][{i}][description]" class="span11"></textarea></div></td>\
        <td><button  type="button" class="btn btn-mini remove-row tiptip" data-original-title="Remove file">\
                      &nbsp;<i class="icon-minus"></i>&nbsp;</button></td></tr>';

       $('.tiptip').tooltip();
        return trWrapper.replace(/{i}/g, intId).replace(/{i2}/g, intId2);
    }

    function remove_row() {
      deleteButton = $(this);
      if($(this).closest('tr').find('input:file').length == 1) {
          // $(this).closest('tr').remove();
          updateATr(deleteButton);
      } else {
          if(confirm("are you sure you would like to delete this attachment?")) {
             fileThis = $(this);
             intId = parseInt(fileThis.val());
             if (!isNaN(intId)) {
                 $.ajax({
                     type:'POST',
                     url:'/attachments/delete/'+intId+'.json',
                     data:{'id': intId},
                     success : function(data) {
                          // fileThis.closest('div').remove();
                          //nimiweka but will definitely update
                          updateATr(deleteButton);
                     },
                     error: function(data) {
                      fileThis.closest('td').append('<div class="alert alert-error"> \
                                    <a class="close" data-dismiss="alert" href="#">&times;</a> \
                                    <p>Sorry! we could not complete this action. Please logout and login again to proceed..</p> </div>');
                     }
                  });
             } else {
                fileThis.closest('td').append('<div class="alert alert-error"> \
                                <a class="close" data-dismiss="alert" href="#">&times;</a> \
                                <p>Sorry! we could not complete this action. Please logout and login again to proceed</p> </div>');
             }
          }
      }
    }

      function updateATr(myobj){
        myobj
         .closest('td')
         .siblings()
         .wrapInner('<div style="display: block;" />')
         .closest('tr')
         .find('td > div')
         .slideUp(300, function(){
            $(this).closest('tr').siblings(function() {
              rowNo = parseInt($(this).find('td:first').text()) - 1;
              intId = rowNo - 1;
              $(this).find('td:first').text(rowNo);
              $(this).find('input').each(function() {
                  id = $(this).attr('id');
                  name = $(this).attr('name');
                  $(this).prop('id', id.replace(/\d+/, intId));
                  $(this).prop('name', name.replace(/\d+/, intId));
              });
            })

            $(this).closest('tr').remove();
         });
      };
});
