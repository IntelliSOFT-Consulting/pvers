$(function() {
    // Multi Drugs Handling
    $("#addSadrDescription").on("click", addSadrDescriptions);
    $(document).on('click', '.removeSadrDescription', removeSadrDescription);

    // Multi Drugs Handling
    function addSadrDescriptions() {
        var se = $("#sadr-descriptions .sadr-description-group").last().find('button').attr('id');
        if ( typeof se !== 'undefined' && se !== false && se !== "") {
            intId = parseFloat(se.replace('sadr_descriptionsButton', '')) + 1;
        } else {
            intId = 1;
        }
        if ($("#sadr-descriptions .sadr-description-group").length < 9) {
            var new_sadrdescription = $('<div class="sadr-description-group">\
                <div class="row-fluid">\
                    <div class="span12">\
                      <input type="hidden" name="data[SadrDescription][{i}][id]" class="" id="SadrDescription{i}Id">\
                      <div class="control-group">\
                        <div class="controls"><textarea name="data[SadrDescription][{i}][description]" class="span8" rows="2" id="SadrDescription{i}Description"></textarea></div>\
                      </div>\
                    </div>\
                    <div class="row-fluid">\
                      <div class="span12">\
                        <div class="controls"><button type="button" id="sadr_descriptionsButton{i}" class="btn btn-small btn-danger removeSadrDescription"><i class="icon-trash"></i> Remove Description</button></div> \
                        <hr id="SadrDescriptionHr{i}">\
                      </div>\
                    </div>\
                </div>\
              </div>\
            </div>'.replace(/{i}/g, intId));
            // console.log(se.replace(/\d/, '1441441'));
            $("#sadr-descriptions").append(new_sadrdescription);
        } else {
            alert("Sorry, cant add more than "+$("#sadr-descriptions .sadr-description-group").length+" descriptions!");
        }

    }

    function removeSadrDescription() {
        intId = parseFloat($(this).attr('id').replace('sadr_descriptionsButton', ''));
        
        var inputVal = $('#SadrDescription'+ intId +'Id').val();
        if (inputVal) {
            $.ajax({
                type:'POST',
                url:'/sadr_descriptions/delete/'+inputVal+'.json',
                data:{'id': inputVal},
                success : function(data) {
                    // console.log(data);
                }
            });
        }
        $(this).closest('div.sadr-description-group').remove();
    }
});
