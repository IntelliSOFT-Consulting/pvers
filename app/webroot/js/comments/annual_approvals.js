$(function() {
    $(document).on('click', '.remove-attachment', remove_nangos);
    var intId = 0;
    var trWrapper = '\
          <div class="row nangos">\
            <div class="col-xs-10"><input name="annual_approvals[100][attachments][{i}][id]" id="annual_approvals[100]-attachments-{i}-id" type="hidden"> \
                <input name="annual_approvals[100][attachments][{i}][file]" id="annual_approvals[100]-attachments-{i}-file" type="file" class="firo"> \
                <input type="hidden" id="annual_approvals[100]-attachments-{i}-model" value="{n}" name="annual_approvals[100][attachments][{i}][model]" style="display: inline;">\
                <input type="hidden" id="annual_approvals[100]-attachments-{i}-category" value="{p}" name="annual_approvals[100][attachments][{i}][category]" style="display: inline;">\
                <textarea name="annual_approvals[100][attachments][{i}][description]" id="annual_approvals[100]-attachments-{i}-description" class="flow"\
                          placeholder="descripton" cols="16" rows="1"></textarea> \
            </div>\
            <div class="col-xs-2">\
                <br> <button type="button" class="btn btn-default btn-xs remove-attachment"><i class="fa fa-minus"></i></button>\
            </div>\
          </div><hr>\ ';
    // incremental development
    $(".addAnnual").click(function() {
      intId = intId + 1;
      name = 'AnnualApprovals';
      pi = $(this).attr('id');

      if ($(this).closest('div.checkcontrols').find('.annualsTable .nangos').length < 7) {            
          trVar = $.parseHTML(trWrapper.replace(/{i}/g, intId).replace(/{n}/g, name).replace(/{p}/g, pi));
          $(this).closest('div.checkcontrols').find(".annualsTable").append(trVar);
      } else {
          alert("Sorry, can't add more than "+intId+" attachments at a time!");
      }
    });

    function remove_nangos() {
      $(this).closest('.nangos').remove();        
    }
    

});
