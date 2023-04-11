$(function() {
    // Multi Drugs Handling
    $("#addAefiDescription").on("click", addAefiDescriptions);
    $(document).on('click', '.removeAefiDescription', removeAefiDescription);
    $(document).on("click", "#addAefiDescription", reloadStuff);
    // Multi reactions Handling
    reloadStuff();
    function reloadStuff() {
        var cache001 = {},
            lastXhr001;
        $(".other_reactions").autocomplete({
            source: function (request, response) {
                var term = request.term;
                if (term in cache001) {
                    response(cache001[term]);
                    return;
                }

                lastXhr001 = $.getJSON(
                    "/meddras/autocomplete.json",
                    request,
                    function (data, status, xhr) {
                        cache001[term] = data;
                        if (xhr === lastXhr001) {
                            response(data);
                        }
                    }
                );
            },
        });
    }
    	 
    // Multi Drugs Handling
     
    // Multi Drugs Handling
    function addAefiDescriptions() {
        var se = $("#aefi-descriptions .aefi-description-group").last().find('button').attr('id');
        if ( typeof se !== 'undefined' && se !== false && se !== "") {
            intId = parseFloat(se.replace('aefi_descriptionsButton', '')) + 1;
        } else {
            intId = 1;
        }
        if ($("#aefi-descriptions .aefi-description-group").length < 9) {
            var new_aefidescription = $('<div class="aefi-description-group">\
                <div class="row-fluid">\
                    <div class="span12">\
                      <input type="hidden" name="data[AefiDescription][{i}][id]" class="" id="AefiDescription{i}Id">\
                      <div class="control-group">\
                        <textarea name="data[AefiDescription][{i}][description]" class="span12 other_reactions" rows="2" id="AefiDescription{i}Description"></textarea>\
                      </div>\
                    </div>\
                    <div class="row-fluid">\
                      <div class="span12">\
                        <div class="controls"><button type="button" id="aefi_descriptionsButton{i}" class="btn btn-small btn-danger removeAefiDescription"><i class="icon-trash"></i> Remove Description</button></div> \
                        <hr id="AefiDescriptionHr{i}">\
                      </div>\
                    </div>\
                </div>\
              </div>\
            </div>'.replace(/{i}/g, intId));
            // console.log(se.replace(/\d/, '1441441'));
            $("#aefi-descriptions").append(new_aefidescription);
        } else {
            alert("Sorry, cant add more than "+$("#aefi-descriptions .aefi-description-group").length+" descriptions!");
        }

    }

    function autocomplete() {
        $("#Description").autocomplete({
            source: "/meddras/autocomplete.json"
        });
    }
    function removeAefiDescription() {
        intId = parseFloat($(this).attr('id').replace('aefi_descriptionsButton', ''));
        
        var inputVal = $('#AefiDescription'+ intId +'Id').val();
        if (inputVal) {
            $.ajax({
                type:'POST',
                url:'/aefi_descriptions/delete/'+inputVal+'.json',
                data:{'id': inputVal},
                success : function(data) {
                    // console.log(data);
                }
            });
        }
        $(this).closest('div.aefi-description-group').remove();
    }
});
