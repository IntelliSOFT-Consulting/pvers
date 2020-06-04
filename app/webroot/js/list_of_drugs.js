$(document).ready(function() {
//**************************************************************************************************************************
//**************************************************************************************************************************
								// CONSTRUCT TABLE FOR LIST OF DRUGS
	
	var dates = $( "#SadrListOfDrug0StartDate, #SadrListOfDrug0StopDate" ).datepicker({
			minDate:"-100Y", 
			maxDate:"-0D", 
			dateFormat:'dd-mm-yy', 
			showButtonPanel:true, 
			changeMonth:true, 
			changeYear:true, 
			showAnim:'show',
			onSelect: function( selectedDate ) {
				var option = this.id == "SadrListOfDrug0StartDate" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});	
		
	reloadStuff();
	function reloadStuff(){
		var dates2 = $('.date-pick-from, .date-pick-to').datepicker({
			minDate:"-100Y", maxDate:"-0D", 
			dateFormat:'dd-mm-yy', 
			showButtonPanel:true, 
			changeMonth:true, 
			changeYear:true, 
			showAnim:'show'
		});
		// $('.date-pick-to').datepicker({minDate:"-100Y", maxDate:"-0D", dateFormat:'dd-mm-yy', showButtonPanel:true, changeMonth:true, changeYear:true, showAnim:'show'});
		$(".autoComblete").autocomplete({
			source: "/drug_dictionaries/autocomplete.json"
		});
		$(".autoComblete2").autocomplete({
			source: "/drug_dictionaries/autocomblete.json"
		});
	}
	
	$(".removeTr").click(function() {
			if ( typeof $(this).attr('id') !== 'undefined' && $(this).attr('id') !== false && $(this).attr('id') !== "") {
			$.ajax({
				async:true, type:'POST', 
				// beforeSend:function(request) {$('#loading').show();}, 
				// complete:function(request, json) {$('#post7').html(request.responseText); 
				// $('#loading').hide()}, 
				url:'/sadr_list_of_drugs/delete.json',
				data:{'id': $(this).attr('id')},
				success : function(data) {
					// console.log(data);
				}
			}); 
		}
		updateTr($(this));
    });

    $("#addListOfDrug").click(function() {
        var intId = $("#buildyourform tr").length - 1;	
		if (intId < 15) {
			$("#buildyourform").append(constructTr(intId));		
			reloadStuff();
		} else {
			alert("Sorry, cant add more than "+intId+" rows at a time!");
		}
    });
	
	function constructTr(intId, field1) {
		var intId2 = intId + 1;
        var fieldWrapper = $("<tr class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
        var fName = $("<td>" + intId2 + "</td>");
		var drugName = $('<td data-title="Generic Name *"><div class="control-group"><input type="text" id="SadrListOfDrug' + intId + 'DrugName" maxlength="100" class="span11 autoComblete autosave-ignore" name="data[SadrListOfDrug][' + intId + '][drug_name]"  data-items="4"  autocomplete="off", ></div></td>');
		var brandName = $('<td data-title="Brand Name"><div class="control-group"><input type="text" id="SadrListOfDrug' + intId + 'BrandName" maxlength="100" class="span11 autoComblete2 autosave-ignore" name="data[SadrListOfDrug][' + intId + '][brand_name]"></div></td>');
		var batchNo = $('<td><div class="control-group"><input type="text" id="SadrListOfDrug' + intId + 'BatchNo" maxlength="100" class="span11" name="data[SadrListOfDrug][' + intId + '][batch_no]"></div></td>');
		var manufacturer = $('<td><div class="control-group"><input type="text" id="SadrListOfDrug' + intId + 'Manufacturer" maxlength="100" class="span11" name="data[SadrListOfDrug][' + intId + '][manufacturer]"></div></td>');

		var dose = $('<td/>').attr("data-title", "Dose *").append($('<div class="control-group"/>').append($('#SadrListOfDrug0Dose').clone()
						.attr({'id': 'SadrListOfDrug' + intId + 'Dose', 'name': 'data[SadrListOfDrug][' + intId + '][dose]'}).val('')));
		var dose_id = $('<td style="border-left:0px;"/>').append($('<div class="control-group"/>').append($('#SadrListOfDrug0DoseId').clone()
						.attr({'id': 'SadrListOfDrug' + intId + 'DoseId', 'name': 'data[SadrListOfDrug][' + intId + '][dose_id]'}).val('')));
		// var route = $('<td><div class="control-group"><input type="text" id="SadrListOfDrug' + intId + 'Route" maxlength="100" class="span7" name="data[SadrListOfDrug][' + intId + '][route]"></div>');
		var route = $('<td/>').attr("data-title", "Route *").append($('<div class="control-group"/>').append($('#SadrListOfDrug0RouteId').clone()
						.attr({'id': 'SadrListOfDrug' + intId + 'RouteId', 'name': 'data[SadrListOfDrug][' + intId + '][route_id]'}).val('')));
		var frequency = $('<td/>').attr("data-title", "Frequency *").append($('<div class="control-group"/>').append($('#SadrListOfDrug0FrequencyId').clone()
						.attr({'id': 'SadrListOfDrug' + intId + 'FrequencyId', 'name': 'data[SadrListOfDrug][' + intId + '][frequency_id]'}).val('')));
		// var route = $('<td><div class="control-group"><select id="SadrListOfDrug' + intId + 'Route" class="span12 autosave-ignore" name="data[SadrListOfDrug][' + intId + '][route]">'+ routeOptions +'</select></div>');
		// var frequency = $('<td><div class="control-group"><input type="text" id="SadrListOfDrug' + intId + 'Frequency" maxlength="100" class="span7" name="data[SadrListOfDrug][' + intId + '][frequency]"></div></td>');
		// var frequency = $('<td><div class="control-group"><select id="SadrListOfDrug' + intId + 'Frequency" class="span12 autosave-ignore" name="data[SadrListOfDrug][' + intId + '][frequency]">'+ frequencyOptions +'</select></div></td>');
		var startDate = $('<td data-title="Date Started (dd-mm-yyyy) *">	<div class="control-group"><input type="text" id="SadrListOfDrug' + intId + 'StartDate" class="span11 date-pick-from autosave-ignore" name="data[SadrListOfDrug][' + intId + '][start_date]"></div> </td>');


		var stopDate = $('<td data-title="Date Stopped (dd-mm-yyyy)"><div class="control-group"><input type="text" id="SadrListOfDrug' + intId + 'StopDate" class="span11 date-pick-to autosave-ignore" name="data[SadrListOfDrug][' + intId + '][stop_date]"></div></td>');
		

		var indication = $('<td data-title="Indication"><div class="control-group"><input type="text" id="SadrListOfDrug' + intId + 'Indication" maxlength="100" class="span9 autosave-ignore" name="data[SadrListOfDrug][' + intId + '][indication]"></div></td>');
		var suspectedDrug = $('<td data-title="Suspected Drug?"><div class="control-group"><label class="checkbox"><input type="hidden" value="0" id="SadrListOfDrug' + intId + 'SuspectedDrug_" name="data[SadrListOfDrug][' + intId + '][suspected_drug]"><input type="checkbox" id="SadrListOfDrug' + intId + 'SuspectedDrug" value="1" class="" name="data[SadrListOfDrug][' + intId + '][suspected_drug]"></label></div></td>');

        // var removeButton = $("<td><input type=\"button\" class=\"remove\" value=\"&#8722;\" /></td>");
        var removeButton_ = $('<button  type="button" class="btn-mini" title="click here to delete row" ><i class="icon-minus"></i></button>"');
		removeButton_.tooltip();
        removeButton_.click(function() {
			if ( typeof $(this).attr('id') !== 'undefined' && $(this).attr('id') !== false && $(this).attr('id') !== "") {
				$.ajax({
					url:'/sadr_list_of_drugs/delete.json',
					type:'POST', 
					async:true, 
					data:{'id': $(this).attr('id')},
					success : function(data) {
						// console.log(data);
					}
				});
			}
			updateTr($(this));
        });
		var removeButton = $('<td/>').attr("data-title", "Remove Drug - ").append(removeButton_);
        fieldWrapper.append(fName);
        fieldWrapper.append(drugName);
        fieldWrapper.append(brandName);
        fieldWrapper.append(batchNo);
        fieldWrapper.append(manufacturer);
        fieldWrapper.append(dose);
        fieldWrapper.append(dose_id);
        fieldWrapper.append(route);
        fieldWrapper.append(frequency);
        fieldWrapper.append(startDate);
        fieldWrapper.append(stopDate);
        fieldWrapper.append(indication);
        fieldWrapper.append(suspectedDrug);
        // fieldWrapper.append(fType);
        fieldWrapper.append(removeButton);
		
		return fieldWrapper;
	}
	
	function updateTr(myobj){
		// updateTr($(this).parent().parent().nextAll());
		myobj.tooltip('hide');
		// $(this).parent().nextAll().remove();
		
		myobj
		 .parent()
		 .parent()
		 .find('td')
		 .wrapInner('<div style="display: block;" />')
		 .parent()
		 .find('td > div')
		 .slideUp(300, function(){
				$(this).parent().parent().nextAll().each(function() {
					// console.log($($(this).children().get(0)).text());
					// $($(this).children().get(0)).replaceWith("<td>"+no+"</td>");
					no = parseInt($(this).text())-1;
					intId = parseInt($(this).text())-2;
					$($(this).children().get(0)).text(no);
					$(this).prop('id', 'field' + intId );
					$($(this).children().get(1)).find('input').prop('id', 'SadrListOfDrug' + intId + 'DrugName');
					$($(this).children().get(1)).find('input').prop('name', 'data[SadrListOfDrug][' + intId + '][drug_name]');
					$($(this).children().get(2)).find('input').prop('id', 'SadrListOfDrug' + intId + 'BrandName');
					$($(this).children().get(2)).find('input').prop('name', 'data[SadrListOfDrug][' + intId + '][brand_name]');
					$($(this).children().get(2)).find('input').prop('id', 'SadrListOfDrug' + intId + 'BatchNo');
					$($(this).children().get(2)).find('input').prop('name', 'data[SadrListOfDrug][' + intId + '][batch_no]');
					$($(this).children().get(2)).find('input').prop('id', 'SadrListOfDrug' + intId + 'Manufacturer');
					$($(this).children().get(2)).find('input').prop('name', 'data[SadrListOfDrug][' + intId + '][manufacturer]');
					$($(this).children().get(3)).find('input').prop('id', 'SadrListOfDrug' + intId + 'Dose');
					$($(this).children().get(3)).find('input').prop('name', 'data[SadrListOfDrug][' + intId + '][dose]');
					$($(this).children().get(4)).find('select').prop('id', 'SadrListOfDrug' + intId + 'DoseId');
					$($(this).children().get(4)).find('select').prop('name', 'data[SadrListOfDrug][' + intId + '][dose_id]');
					$($(this).children().get(5)).find('select').prop('id', 'SadrListOfDrug' + intId + 'RouteId');
					$($(this).children().get(5)).find('select').prop('name', 'data[SadrListOfDrug][' + intId + '][route_id]');
					$($(this).children().get(6)).find('select').prop('id', 'SadrListOfDrug' + intId + 'Frequency');
					$($(this).children().get(6)).find('select').prop('name', 'data[SadrListOfDrug][' + intId + '][frequency]');
					$($(this).children().get(7)).find('input').prop('id', 'SadrListOfDrug' + intId + 'StartDate');
					$($(this).children().get(7)).find('input').prop('name', 'data[SadrListOfDrug][' + intId + '][start_date]');
					$($(this).children().get(7)).find('input').removeClass('hasDatepicker');
					$($(this).children().get(8)).find('input').prop('id', 'SadrListOfDrug' + intId + 'StopDate');
					$($(this).children().get(8)).find('input').prop('name', 'data[SadrListOfDrug][' + intId + '][stop_date]');
					$($(this).children().get(8)).find('input').removeClass('hasDatepicker');
					$($(this).children().get(9)).find('input').prop('id', 'SadrListOfDrug' + intId + 'Indication');
					$($(this).children().get(9)).find('input').prop('name', 'data[SadrListOfDrug][' + intId + '][indication]');
					$($(this).children().get(10)).find('input[type="hidden"]').prop('id', 'SadrListOfDrug' + intId + 'SuspectedDrug_');
					$($(this).children().get(10)).find('input[type="hidden"]').prop('name', 'data[SadrListOfDrug][' + intId + '][suspected_drug]');
					$($(this).children().get(10)).find('input[type="checkbox"]').prop('id', 'SadrListOfDrug' + intId + 'SuspectedDrug');
					$($(this).children().get(10)).find('input[type="checkbox"]').prop('name', 'data[SadrListOfDrug][' + intId + '][suspected_drug]');
					var field1 = $($(this).children().get(1)).find('input').val();
					// $(this).replaceWith(constructTr(parseInt($(this).text())-2));
					//console.log($(this).text());
				});
				$(this).parent().parent().remove();
				reloadStuff();
		 });
	};
});
