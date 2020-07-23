$(function() {
    $(document).on('click', '.remove-meeting-date', remove_meeting_date);
    var trWrapper = '\
          <tr>\
            <td>{i}</td>\
            <td>{i2}</td>\
            <td>{i3}</td>\
            <td>{i4}</td>\
            <td><button class="btn btn-defualt btn-xs remove-meeting-date" value="{i5}"><i class="fa fa-minus"></i></button></td>\
          </tr>\ ';

    $( "#meeting-date" ).datepicker({
      minDate:"-100Y", maxDate:"+2Y", dateFormat:'dd-mm-yy', showButtonPanel:true, changeMonth:true, changeYear:true,
      buttonImageOnly:true, showAnim:'show', showOn:'both', buttonImage:'/img/calendar.gif'
    });

    /*$('#saveDate').click(function() {
      var frm = $('#meeting-form');
      $.ajax({
            async:true,
            type: 'POST',
            url: '/meeting-dates/add.json',
            data: frm.serialize(),
            success: function (data) {
                $('#committee-dates tbody tr:first').after($.parseHTML(
                    trWrapper.replace(/{i}/g, data.message.meeting_date).replace(/{i2}/g, data.message.meeting_day)
                             .replace(/{i3}/g, data.message.start_time).replace(/{i4}/g, data.message.end_time)
                             .replace(/{i5}/g, data.message.id)
                  ));
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data.responseJSON);                
            },
        });
    });*/

    function remove_meeting_date() {
      if ( typeof $(this).val() !== 'undefined' && $(this).val() !== false && $(this).val() !== "") {
        $.ajax({
          async:true, type:'POST', 
          url:'/meeting-dates/delete.json',
          data:{'id': $(this).val() }, 
          success : function(data) {
             console.log(data);
          }
        }); 

        //Remove row
        $(this).closest('td')
          .siblings()
          .wrapInner('<div style="display: block;" />')
          .closest('tr')
          .find('td > div')
          .slideUp(300, function(){
            $(this).closest('tr').remove();
          });

      } 
    }

});