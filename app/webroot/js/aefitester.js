$( function() {
    $('#AefiCountyId').change(function() {
		var county_id = $(this).val();
		console.log(county_id);
        $.ajax({
            url: '/sub_counties/autocomplete/' + county_id+'.json',
            success: function(data) {
                console.log(data); 
                // get the select element
                var select = $('#AefiSubCountyId');
                // clear the select
                select.empty();
                // add the options
                $.each(data, function(key, value) {
                    select.append('<option value=' + key + '>' + value + '</option>');
                }
                );
            }
        });		 
	});
});
