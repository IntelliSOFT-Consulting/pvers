	(function( $ ) {
		$.widget( "ui.combobox", {
			_create: function() {
				var input,
					self = this,
					select = this.element.hide(),
					selected = select.children( ":selected" ),
					value = selected.val() ? selected.text() : "",
					wrapper = this.wrapper = $( "<span>" )
						.addClass( "ui-combobox" )
						.insertAfter( select );

				input = this.input = $( "<input>" )
					.appendTo( wrapper )
					.val( value )
					.addClass( "ui-state-default ui-combobox-input" )
					.autocomplete({
						delay: 0,
						minLength: 0,
						source: function( request, response ) {
							var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
							response( select.children( "option" ).map(function() {
								var text = $( this ).text();
								if ( this.value && ( !request.term || matcher.test(text) ) )
									return {
										label: text.replace(
											new RegExp(
												"(?![^&;]+;)(?!<[^<>]*)(" +
												$.ui.autocomplete.escapeRegex(request.term) +
												")(?![^<>]*>)(?![^&;]+;)", "gi"
											), "<strong>$1</strong>" ),
										value: text,
										option: this
									};
							}) );
						},
						select: function( event, ui ) {
							ui.item.option.selected = true;
							self._trigger( "selected", event, {
								item: ui.item.option
							});
						},
						change: function( event, ui ) {
								// console.log($.ui.autocomplete.escapeRegex( $(this).val() ));
							if ( !ui.item ) {
								var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( $(this).val() ) + "$", "i" ),
									valid = false;
								select.children( "option" ).each(function() {
									if ( $( this ).text().match( matcher ) ) {
										this.selected = valid = true;
										return false;
									}
								});
								if ( !valid ) {
									// remove invalid value, as it didn't match anything
									$( this ).val( "" );
									select.val( "" );
									input.data( "autocomplete" ).term = "";
									return false;
								}
							}
						}
					})
					.addClass( "ui-widget ui-widget-content ui-corner-left" );

				input.data( "autocomplete" )._renderItem = function( ul, item ) {
					return $( "<li></li>" )
						.data( "item.autocomplete", item )
						.append( "<a>" + item.label + "</a>" )
						.appendTo( ul );
				};

				$( "<a>" )
					.attr( "tabIndex", -1 )
					.attr( "title", "Show All Items" )
					.appendTo( wrapper )
					.button({
						icons: {
							primary: "ui-icon-triangle-1-s"
						},
						text: false
					})
					.removeClass( "ui-corner-all" )
					.addClass( "ui-corner-right ui-combobox-toggle" )
					.click(function() {
						// close if already visible
						if ( input.autocomplete( "widget" ).is( ":visible" ) ) {
							input.autocomplete( "close" );
							return;
						}

						// work around a bug (likely same cause as #5265)
						$( this ).blur();

						// pass empty string as value to search for, displaying all results
						input.autocomplete( "search", "" );
						input.focus();
					});
			},

			destroy: function() {
				this.wrapper.remove();
				this.element.show();
				$.Widget.prototype.destroy.call( this );
			},
			autocomplete : function(value) {
				// this.element.val(value);
				var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( value ), "i" ),
					 val2 = '';
				this.element.children("option").each( function() {
					if ( $( this ).text().match( matcher ) ) {
						this.selected = true;
						val2 = $( this ).text();
						return false;
					}
					// console.log($( this ).text());
				});
				this.input.val(val2);
			}
		});
	})( jQuery );

	$(document).ready(function() {
		$( "#SadrCountyId" ).combobox();
		$( "#SadrSubCountyId" ).combobox();
		$( "#PqmpCountyId" ).combobox();
		$( "#PqmpSubCountyId" ).combobox();
		$( "#UserCountyId" ).combobox();
		$( "#PqmpCountryId" ).combobox();

		// $( "#dialog-confirm" ).dialog({
			// autoOpen: false,
			// modal: true,
			// buttons: {
				// "Ok": function() {
					// $( this ).dialog( "close" );
				// }
			// }
		// });

		// $( "#dialog-savesubmit" ).dialog({
			// autoOpen: false,
			// modal: true,
			// buttons: {
				// "Ok": function() {
					// $( this ).dialog( "close" );
				// }
			// }
		// });

		$('#SadrEditForm, #SadrAdminEditForm').validate({
			// submitHandler: function(form) {
				// form.submit();
				// $("#dialog-savesubmit").dialog('open');
			// },
			// invalidHandler: function(form, validator) {
				// $("#dialog-confirm").dialog('open');
			  // var errors = validator.numberOfInvalids();
			  // if (errors) {
				// var message = errors == 1
				  // ? 'You missed 1 field. It has been highlighted'
				  // : 'You missed ' + errors + ' fields. They have been highlighted';
				// $("div.error span").html(message);
				// $("div.error").show();
			  // } else {
				// $("div.error").hide();
			  // }
			// },
			rules: {
				"data[Sadr][report_title]": "required",
				"data[Sadr][weight]": {
					number: true
				},
				"data[Sadr][height]": {
					number: true
				},
				"data[Sadr][county_id]": "required",
				"data[Sadr][patient_name]": "required",
				"data[Sadr][description_of_reaction]": "required",
				"data[Sadr][date_of_onset_of_reaction]": "required",
				"data[Sadr][reporter_name]": "required",
				"data[Sadr][designation]": "required",
				"data[SadrListOfDrug][0][drug_name]": "required",
				"data[SadrListOfDrug][0][dose]": {
					required: true,
					number: true
				},
				"data[Sadr][reporter_email]": {
					required: true,
					email: true
				}
			},
			messages: {
				"data[Sadr][report_title]": "Please enter the title for the report",
				"data[Sadr][county_id]": "Please select a county",
				"data[Sadr][patient_name]": "Please provide the patient's initials",
				"data[Sadr][description_of_reaction]": "Please provide a description of the reaction",
				"data[Sadr][date_of_onset_of_reaction]": "please provide the date of onset of the reaction",
				"data[Sadr][reporter_name]": "Please provide the reporter's name",
				"data[Sadr][designation]": "Please select the reporter's designation",
				"data[SadrListOfDrug][0][drug_name]": "Please select enter a drug name (<em>wait for suggestions to load!</em>)",
				"data[SadrListOfDrug][0][dose]": "Numeric dose",
				"data[Sadr][reporter_email]": {
					required: "Please provide the reporter's email address",
					email: "The email must be valid email address"
				}
			},
			highlight: function(label) {
				$(label).closest('.control-group').addClass('error');
			},
			success: function(label) {
				label
					.text('').addClass('valid')
					.closest('.control-group').addClass('success');
			}
		});

		$('#PqmpEditForm').validate({
			rules: {
				"data[Pqmp][brand_name]": "required",
				"data[Pqmp][name_of_manufacturer]": "required",
				"data[Pqmp][expiry_date]": "required",
				"data[Pqmp][reporter_name]": "required",
				"data[Pqmp][complaint_description]": "required",
				"data[Pqmp][designation]": "required"
			},
			messages: {
				"data[Pqmp][brand_name]": "Please enter the brand name for the product",
				"data[Pqmp][name_of_manufacturer]": "Please enter the name of the manufacturer",
				"data[Pqmp][expiry_date]": "Please provide the product's expiry date",
				"data[Pqmp][reporter_name]": "Please provide the reporter's name",
				"data[Pqmp][complaint_description]": "Please describe the complaint in detail",
				"data[Pqmp][designation]": "Please select the reporter's designation"
			},
			highlight: function(label) {
				$(label).closest('.control-group').addClass('error');
			},
			success: function(label) {
				label
					.text('').addClass('valid')
					.closest('.control-group').addClass('success');
			}
		});
	});
