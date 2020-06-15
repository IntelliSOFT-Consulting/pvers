  $( function() {
    
    $('.tooltipper').tooltip();
    $('.alert').bind('close', function (e) {
        e.preventDefault();
        console.log($("div.alert", this).attr('id'));
        var intId = parseInt($($(this)[0]).attr('id'));
        var me = $(this);
        $('<div></div>').appendTo('body')
            .html('<div> <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Are you sure you \
             want to delete this Notification? </p></div>')
            .dialog({
                modal: true, title: 'message', zIndex: 10000, autoOpen: true,
                width: 'auto', resizable: false,
                buttons: {
                    Yes: function () {
                        if (intId) {
                          $.ajax({
                            type:'POST',
                            url:'/notifications/delete/'+intId+'.json',
                            data:{'id': intId},
                            success : function(data) {
                              me.slideUp();
                            },
                            error : function(data) {
                              alert("Something went wrong. Could not delete notification. Please logout and login again.");
                            }
                          });
                        }
                        $(this).dialog("close");
                    },
                    No: function () {
                        $(this).dialog("close");
                    }
                },
                close: function (event, ui) {
                    $(this).remove();
                }
            });
    });
    
  });