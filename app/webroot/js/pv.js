$(document).ready(function() {
	//<![CDATA[
	
	$('#viewSadr').bind('click', function(){ 
		$.ajax({
			async:true, 
			type:'post', 
			beforeSend:function(request) {$('#loading').show();}, 
			complete:function(request, json) {
				// console.log($(request.responseText).find('#printAreade').html());
				// $('#sadrViewContentpane').html(request.responseText);  
				$('#sadrViewContentpane').html($(request.responseText).find('#abonokode').html());  
				$('#loading').hide() 
			}, 
			url:'/sadrs/view/'+$('#SadrFollowupSadrId').val()
		}) 
	});
	
	
	//_____________________________________________FORMS SECTION________________________________________________
	
	$('#SadrCancelReport').click(function() {
		$('#SadrEditForm').validate().cancelSubmit = true; 
		return confirm('Are you sure you wish to cancel this form? You can access this form from the link sent in your email or from your reports section if you are logged in.');
	});	
	$('#PqmpCancelReport').click(function() {
		$('#PqmpEditForm').validate().cancelSubmit = true; 
		return confirm('Are you sure you wish to cancel this form? You will not be able to edit it later.');
	});
	// AUTO Save form
	$("#SadrEditForm").autosave({
		callbacks: {			
			scope: function(options, $inputs) {
				// Must return a jQuery Object.
				var self = this;
				$inputs.push($("#SadrId").get(0));
				return self.inputs($inputs).filter(function() {
					if($inputs.length > 1) return !$(this).hasClass(self.options.classes.ignore);
				});
			},
			save: {
				method: "ajax",
				options: {
					url:"/sadrs/edit/"+$("#SadrId").val()+".json",
					type: "POST",
					async:true, 
					// data:{'id': $("#SadrId").val()},
					success : function(data) {
						// console.log(data);
					}
				}
			}
		}
	});
	
	// AUTO Save form
	$("#PqmpEditForm").autosave({
		callbacks: {			
			scope: function(options, $inputs) {
				var self = this;				
				$inputs.push($("#PqmpId").get(0));
				return self.inputs($inputs).filter(function() {
					return !$(this).hasClass(self.options.classes.ignore);
				});
			},
			save: {
				method: "ajax",
				options: {
					url:"/pqmps/edit/"+$("#PqmpId").val()+".json",
					type: "POST",
					async:true, 
					success : function(data) {
						// console.log(data);
					}
				}
			}
		}
	});
	
	// tooltips and popovers
	
	//HIDE OR SHOW FORM ID INPUT FIELD
	if ($("#SadrReportTypeFollowUpReport:checked").val() == 'Follow-up Report') {
		$('#SadrFormId').removeAttr('disabled');
		$("#form_id").show();
	} else {
		$('#SadrFormId').attr('disabled', 'disabled');
		$("#form_id").hide();
	}
	
	if ($("#SadrPregnantYes:checked").val() == 'Yes') {
		$("#pstati").show();
	} else {
		$("#pstati").hide();
	}
	
	
	var cache = {},	lastXhr;
	$( ".autoComblete" ).autocomplete({
		source: function( request, response ) {
			var term = request.term;
			if ( term in cache ) {
				response( cache[ term ] );
				return;
			}

			lastXhr = $.getJSON( "/drug_dictionaries/autocomplete.json", request, function( data, status, xhr ) {
				cache[ term ] = data;
				if ( xhr === lastXhr ) {
					response( data );
				}
			});
		}
	});
	
	var cache_2 = {},	lastXhr;
	$( ".autoComblete2" ).autocomplete({
		source: function( request, response ) {
			var term = request.term;
			if ( term in cache_2 ) {
				response( cache_2[ term ] );
				return;
			}

			lastXhr = $.getJSON( "/drug_dictionaries/autocomblete.json", request, function( data, status, xhr ) {
				cache_2[ term ] = data;
				if ( xhr === lastXhr ) {
					response( data );
				}
			});
		}
	});
	
		
    $("#add").tooltip();
    $(".tooltipper").tooltip();    
	if (window.screen.width > 768) {
		$(".mapop").popover();
	}
	
	var SadrDateOfBirth = $('.birthdate');
	SadrDateOfBirth.change(function() { 
		if($(this).val()) {
			$('#SadrAgeGroup').attr('disabled', 'disabled');	
		} 
	});
	$('#SadrAgeGroup').change(function() {
		if($('#SadrAgeGroup option:selected').val()) {
			SadrDateOfBirth.val('');
			SadrDateOfBirth.attr('disabled', 'disabled');	
		}
	});
	
	// if (SadrDateOfBirth.val()) { $('#SadrAgeGroup').attr('disabled', 'disabled'); }
	SadrDateOfBirth.each(function() {
		if($(this).val()) { $('#SadrAgeGroup').attr('disabled', 'disabled'); };
	});

	if ($('#SadrAgeGroup').val()) { SadrDateOfBirth.attr('disabled', 'disabled'); }
	
	if ($("#SadrKnownAllergyYes:checked").val() == 'yes') {
		$("#SadrKnownAllergySpecify").removeAttr("disabled");
	}
	
	if ($("#PqmpProductFormulationOther:checked").val() == 'Other') {
		$("#PqmpProductFormulationSpecify").removeAttr("disabled");
	}
	
	if ($("#PqmpComplaintOther:checked").val() == '1') {
		$("#PqmpComplaintOtherSpecify").removeAttr("disabled");
	}	
	
	$('#SadrGenderMale').click(function() {
		$('#pregnancy_stati :input').attr('disabled', 'disabled');		
		$('#pregnancy_stati :input').attr('checked', false);
	});
	$('#SadrGenderFemale').click(function() {
		$('#pregnancy_stati :input').removeAttr('disabled');		
	});
	if ($("#SadrGenderMale:checked").val() == 'Male') {
		$('#pregnancy_stati :input').attr('disabled', 'disabled');
		$('#pregnancy_stati :input').attr('checked', false);
	}
	else if ($("#SadrGenderFemale:checked").val() == 'Female') {
		$('#pregnancy_stati :input').removeAttr('disabled');
	}
	
	$('#PqmpComplaintOther').click(function(){
	   if($(this).is(":checked")){
			$('#PqmpComplaintOtherSpecify').removeAttr("disabled");
		}
	   else {
			$('#PqmpComplaintOtherSpecify').attr("disabled", "disabled");
			$('#PqmpComplaintOtherSpecify').val('');
		}
	});
	
	var adates = $( "#SadrStartDate, #SadrEndDate" ).datepicker({
			minDate:"-100Y", 
			maxDate:"+1D", 
			dateFormat:'dd-mm-yy', 
			showButtonPanel:true, 
			changeMonth:true, 
			changeYear:true, 
			showAnim:'show',
			onSelect: function( selectedDate ) {
				var option = this.id == "SadrStartDate" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				adates.not( this ).datepicker( "option", option, date );
			}
		});	
	var bdates = $( "#AttachmentStartDate, #AttachmentEndDate" ).datepicker({
			minDate:"-100Y", 
			maxDate:"+1D", 
			dateFormat:'dd-mm-yy', 
			showButtonPanel:true, 
			changeMonth:true, 
			changeYear:true, 
			showAnim:'show',
			onSelect: function( selectedDate ) {
				var option = this.id == "AttachmentStartDate" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				bdates.not( this ).datepicker( "option", option, date );
			}
		});	
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
	
	$(".removeTr").tooltip();
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

    $("#add").click(function() {
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
		// var dose = $('<td><div class="control-group"><input type="text" id="SadrListOfDrug' + intId + 'Dose" maxlength="100" class="SadrListOfDrugDose autosave-ignore" name="data[SadrListOfDrug][' + intId + '][dose]"></div></td>');
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
	
	
//**************************************************************************************************************************
//**************************************************************************************************************************
								// CONSTRUCT TABLE FOR ATTACHMENTS
	
    $("#addAttachment").click(function() {
		$("#attachmentsTableHeader").show();
        var intId = $("#buildattachmentsform tr").length - 1;	
		if ($(':input[type="file"]').length < 4) {
			$("#buildattachmentsform").append(constructATr(intId));		
		} else {
			alert("Sorry, cant save more than Four Attachments at a time!");
		}
    });
	if ($("#buildattachmentsform tr").length == 1 ) { $("#attachmentsTableHeader").hide(); }
	
	$(".removeATr").tooltip();
	$(".removeATr").click(function() {
		if ( typeof $(this).attr('id') !== 'undefined' && $(this).attr('id') !== false && $(this).attr('id') !== "") {
			$.ajax({
				async:true, type:'POST', 
				url:'/attachments/delete.json',
				data:{'id': $(this).attr('id')},
				success : function(data) {
					// console.log(data);
				}
			}); 
		}
		updateATr($(this));
    });
	
	function constructATr(intId, field1) {
		var intId2 = intId + 1;
        var fieldWrapper = $("<tr class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
        var faName = $('<td>' + intId2 + '</td>');
        var mimetype = $('<input type="hidden" id="Attachment' + intId + 'Dirname" name="data[Attachment][' + intId + '][dirname]">');
        var filesize = $('<input type="hidden" id="Attachment' + intId + 'Basename" name="data[Attachment][' + intId + '][basename]">');
        var dir = $('<input type="hidden" id="Attachment' + intId + 'Checksum" name="data[Attachment][' + intId + '][checksum]">');
		var filename = $('<td><div class="control-group"><input type="file" id="Attachment' + intId + 'File" class="span12 autosave-ignore input-file" name="data[Attachment][' + intId + '][file]"  data-items="4"  autocomplete="off" ></div></td>');
		var description = $('<td><div class="control-group"><textarea id="Attachment' + intId + 'Description"  rows="1" cols="30" name="data[Attachment][' + intId + '][description]" class="span11 autosave-ignore"></textarea></div></td>');
        var removeButton_ = $('<button  type="button" class="btn-mini" title="click here to delete row" ><i class="icon-minus"></i></button>"');
		removeButton_.tooltip();
        removeButton_.click(function() {
			if ( typeof $(this).attr('id') !== 'undefined' && $(this).attr('id') !== false && $(this).attr('id') !== "") {
				$.ajax({
					url:'/attachments/delete.json',
					type:'POST', 
					async:true, 
					data:{'id': $(this).attr('id')},
					success : function(data) {
						// console.log(data);
					}
				});
			}
			updateATr($(this));
        });
		// var removeButton = $('<td/>').append(removeButton_);
		var removeButton = $('<td/>').append(mimetype);
		removeButton.append(filesize);
		removeButton.append(dir);
		removeButton.append(removeButton_);
        fieldWrapper.append(faName);
        fieldWrapper.append(filename);
        fieldWrapper.append(description);
        fieldWrapper.append(removeButton);
		
		return fieldWrapper;
	}
	
	function updateATr(myobj){
		myobj.tooltip('hide');
		
		myobj
		 .parent()
		 .parent()
		 .find('td')
		 .wrapInner('<div style="display: block;" />')
		 .parent()
		 .find('td > div')
		 .slideUp(300, function(){
				$(this).parent().parent().nextAll().each(function() {
					no = parseInt($(this).text())-1;
					intId = parseInt($(this).text())-2;
					$($(this).children().get(0)).text(no);
					$(this).prop('id', 'field' + intId );
					$($(this).children().get(1)).find('input').prop('id', 'Attachment' + intId + 'File');
					$($(this).children().get(1)).find('input').prop('name', 'data[Attachment][' + intId + '][file]');
					$($(this).children().get(2)).find('textarea').prop('id', 'Attachment' + intId + 'Description');
					$($(this).children().get(2)).find('textarea').prop('name', 'data[Attachment][' + intId + '][description]');
					
					$($(this).children().get(3)).find('input').prop('id', 'Attachment' + intId + 'Dirname');
					$($(this).children().get(3)).find('input').prop('name', 'data[Attachment][' + intId + '][dirname]');					
					$($(this).children().get(3)).find('input').prop('id', 'Attachment' + intId + 'Basename');
					$($(this).children().get(3)).find('input').prop('name', 'data[Attachment][' + intId + '][basename]');					
					$($(this).children().get(3)).find('input').prop('id', 'Attachment' + intId + 'Checksum');
					$($(this).children().get(3)).find('input').prop('name', 'data[Attachment][' + intId + '][checksum]');
					
					var field1 = $($(this).children().get(1)).find('input').val();
				});
				$(this).parent().parent().remove();
		 });
	};
});

//______________________________________________________________SOME THINGS TO CONSIDER
	// ,
	// onSelect: function( selectedDate ) {
		// var aclass = $(this).hasClass("date-pick-from");
		// console.log(aclass);
		// var option = aclass === true ? "minDate" : "maxDate",
			// instance = $( this ).data( "datepicker" ),
			// date = $.datepicker.parseDate(
				// instance.settings.dateFormat ||
				// $.datepicker._defaults.dateFormat,
				// selectedDate, instance.settings );
		// console.log(option);
		// dates2.not( this ).datepicker( "option", option, date );
	// }
	
	
	// $("#SadrAdminEditForm").live('submit', function(e) { 
		// e.preventDefault();
		// $.ajax({
			// async:true, 
			// type:'post', 
			// complete:function(request, json) {$('#showAreade').html(request.responseText); }, 
			// url:'/admin/sadrs/edit/'+$($("#SadrId").get(0)).val(), 
			// data:$(this).serialize()
		// }); 
	// });
	// $("#adminSadrSubmitReport").live('click', function(e){ 
		// e.preventDefault();
		// $.ajax({
			// async:true, 
			// type:'post', 
			// complete:function(request, json) {$('#showAreade').html(request.responseText); }, 
			// url:'/admin/sadrs/edit/'+$($("#SadrId").get(0)).val(), 
			// data:$(this).parents('form:first').serialize()
		// }) 
	// });
		// $('.date-pick-from').datepicker({minDate:"-100Y", maxDate:"-0D", dateFormat:'dd-mm-yy', showButtonPanel:true, changeMonth:true, changeYear:true, showAnim:'show'});
	// $('.date-pick-to').datepicker({minDate:"-100Y", maxDate:"-0D", dateFormat:'dd-mm-yy', showButtonPanel:true, changeMonth:true, changeYear:true, showAnim:'show'});

	// $('.btnEditSadr').bind('click', function(){
		// $.ajax({
			// async:true, 
			// type:'post', 
			// beforeSend:function(request) {$('#loading').show();}, 
			// complete:function(request, json) {
				// $('#printAreade').html($(request.responseText).find('#abonokode').html());  
				// $('#loading').hide() 
			// }, 
			// url:'/sadrs/view/'+$('#SadrFollowupSadrId').val()
		// }) 
	// });
	// scope: function(options, $inputs) {
				// Must return a jQuery Object.
				// var self = this;
				// console.log(self.options.classes.changed);
				// $("#SadrId").addClass(self.options.classes.changed);
				// $inputs.get(0).addClass(self.options.classes.ignore);
				// console.log(self.inputs($inputs));
				// console.log(self.inputs($("#SadrId")));
				// return self.inputs($inputs).filter(function() {
					// return !$(this).hasClass(self.options.classes.ignore);
				// });
				// $inputs.push($("#SadrId").get(0));
				// return self.inputs($inputs).filter(function() {
					// console.log($inputs.length);
					// if($inputs.length > 1) return !$(this).hasClass(self.options.classes.ignore);
				// });
				// return  $inputs;
			// },
			
			  
	// $(".typeahead").typeahead({
		// source: function (typeahead, query) {
			// // return $.post('/drug_dictionaries/autocomplete.json', { query: query }, function (data) {
				// //return typeahead.process(data);
			// //});
			// $.ajax ({
				// url : "/drug_dictionaries/autocomplete.json",
				// type : "POST",
				// data : { query: query },
				// dataType : "JSON",
				// async : false,
				// success : function(data) {
					// typeahead.process(data);
				// }
			// });
		// }
	// });
	 
	// $(".autoComblete").autocomplete({
		// source: "/drug_dictionaries/autocomplete.json"
	// });
	
	//ON FORM LOAD + EVENTS
	// var SadrListOfDrug0StartDate = $('#SadrListOfDrug0StartDate').datepicker(
		// {minDate:"-100Y", maxDate:"-0D", dateFormat:'dd-mm-yy', showButtonPanel:true, changeMonth:true, changeYear:true, showAnim:'show'});
	// var SadrListOfDrug0StopDate = $('#SadrListOfDrug0StopDate').datepicker(
		// {minDate:"-100Y", maxDate:"-0D", dateFormat:'dd-mm-yy', showButtonPanel:true, changeMonth:true, changeYear:true, showAnim:'show'});
	// var d = new Date(1990, 05, 15); 
	// var SadrDateOfBirth = $('#SadrDateOfBirth').datepicker({
			// minDate:"-130Y", defaultDate:d, maxDate:"-0D", dateFormat:'dd-mm-yy', 
			// changeMonth:true, changeYear:true, showAnim:'show'
		// });
		
	// var PqmpManufactureDate = $('#PqmpManufactureDate').datepicker({
		// minDate:"-100Y", maxDate:"-0D", dateFormat:'dd-mm-yy', 	showButtonPanel:true, 	changeMonth:true, 
		// changeYear:true, showAnim:'show', buttonImageOnly:true, showOn:'both', 
		// buttonImage:'/img/calendar.gif'});
		
	// var SadrDateOfOnsetOfReaction = $('#SadrDateOfOnsetOfReaction').datepicker({
		// minDate:"-100Y", maxDate:"-0D", defaultDate:"-1D", dateFormat:'dd-mm-yy', 	showButtonPanel:true, 	changeMonth:true, 
		// changeYear:true, showAnim:'show', buttonImageOnly:true, showOn:'both', 
		// buttonImage:'/img/calendar.gif'});
	// $('#SadrDateOfOnsetOfReactionYear option:empty').remove();
	// $('#SadrDateOfBirthYear option:empty').remove();
