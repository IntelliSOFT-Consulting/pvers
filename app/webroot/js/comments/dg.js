$(function() {
    $(document).on('click', '.remove-attachment', remove_attachment);
    var intId = 0;
    var trWrapper = '\
          <div class="row attacho">\
            <div class="col-xs-10"><input name="dg_reviews[100][attachments][{i}][id]" id="dg_reviews[100]-attachments-{i}-id" type="hidden"> \
                <input name="dg_reviews[100][attachments][{i}][file]" id="dg_reviews[100]-attachments-{i}-file" type="file" class="firo"> \
                <input type="hidden" id="dg_reviews[100]-attachments-{i}-model" value="{n}" name="dg_reviews[100][attachments][{i}][model]" style="display: inline;">\
                <input type="hidden" id="dg_reviews[100]-attachments-{i}-category" value="{p}" name="dg_reviews[100][attachments][{i}][category]" style="display: inline;">\
                <textarea name="dg_reviews[100][attachments][{i}][description]" id="dg_reviews[100]-attachments-{i}-description" class="flow"\
                          placeholder="descripton" cols="16" rows="1"></textarea> \
            </div>\
            <div class="col-xs-2">\
                <br> <button type="button" class="btn btn-default btn-xs remove-attachment"><i class="fa fa-minus"></i></button>\
            </div>\
          </div><hr>\ ';
    // incremental development
    $(".addAuthLetter").click(function() {
      intId = intId + 1;
      $('#dg-reviews-100-authorization-letter').prop('checked', true);
      name = 'DgReviews';
      pi = $(this).attr('id');

      if ($(this).closest('div.checkcontrols').find('.uploadsTable .attacho').length < 7) {            
          trVar = $.parseHTML(trWrapper.replace(/{i}/g, intId).replace(/{n}/g, name).replace(/{p}/g, pi));
          $(this).closest('div.checkcontrols').find(".uploadsTable").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" attachments at a time!");
      }
    });

    $(".addApprovalLetter").click(function() {
      intId = intId + 1;
      $('#dg-reviews-100-approval-letter').prop('checked', true);
      name = 'DgReviews';
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
