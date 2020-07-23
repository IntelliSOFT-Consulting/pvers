$(function() {
    $(document).on('click', '.remove-attachment', remove_attachment);
    var intId = 0;
    var trWrapper = '\
          <div class="row attacho">\
            <div class="col-xs-10"><input name="final_stages[100][attachments][{i}][id]" id="final_stages[100]-attachments-{i}-id" type="hidden"> \
                <input name="final_stages[100][attachments][{i}][file]" id="final_stages[100]-attachments-{i}-file" type="file" class="firo"> \
                <input type="hidden" id="final_stages[100]-attachments-{i}-model" value="{n}" name="final_stages[100][attachments][{i}][model]" style="display: inline;">\
                <input type="hidden" id="final_stages[100]-attachments-{i}-category" value="{p}" name="final_stages[100][attachments][{i}][category]" style="display: inline;">\
                <textarea name="final_stages[100][attachments][{i}][description]" id="final_stages[100]-attachments-{i}-description" class="flow"\
                          placeholder="descripton" cols="16" rows="1"></textarea> \
            </div>\
            <div class="col-xs-2">\
                <br> <button type="button" class="btn btn-default btn-xs remove-attachment"><i class="fa fa-minus"></i></button>\
            </div>\
          </div><hr>\ ';
    // incremental development
    $(".addFinal").click(function() {
      intId = intId + 1;
      name = 'FinalStages';
      pi = $(this).attr('id');

      if ($(this).closest('div.checkcontrols').find('.uploadsTable .attacho').length < 7) {            
          trVar = $.parseHTML(trWrapper.replace(/{i}/g, intId).replace(/{n}/g, name).replace(/{p}/g, pi));
          $(this).closest('div.checkcontrols').find(".uploadsTable").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" attachments at a time!");
      }
    });

    function remove_attachment() {
      $(this).closest('.attacho').remove();        
    }
    

});
