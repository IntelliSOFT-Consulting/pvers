<?php
	$this->assign('PQHPT', 'active');
	$this->Html->script('jquery.ui.core', array('inline' => false));
	$this->Html->script('jquery.ui.widget', array('inline' => false));
	$this->Html->script('jquery.ui.button', array('inline' => false));
	$this->Html->script('jquery.ui.position', array('inline' => false));
	$this->Html->script('jquery.ui.autocomplete', array('inline' => false));
 	$this->Html->script('widgets', array('inline' => false));
 	$this->Html->script('pqmp', array('inline' => false));
?>
  <!-- PQHPT EDIT
================================================== -->
<section id="pqmpsedit">
	<div class="row-fluid">
		<div class="span12">

			<?php
				//echo $this->element('banner');
				echo $this->Session->flash();

				echo $this->Form->create('Pqmp', array(
					 'type' => 'file',
					 'class' => 'well form-horizontal formbackp',
					 'inputDefaults' => array(
						'div' => array('class' => 'control-group'),
						'label' => array('class' => 'control-label'),
						'between' => '<div class="controls">',
						'after' => '</div>',
						'class' => '',
						'format' => array('before', 'label', 'between', 'input', 'after','error'),
						'error' => array('attributes' => array('class' => 'controls help-block')),
					 ),
				));
			?>

			<?php echo $this->Form->input('id'); ?>

			<div class="row-fluid">
				<div class="span12">
					<?php
						echo $this->Html->image('pqmp_header.gif', array('alt' => 'PQHPT'));
					?>
				</div>
			</div><br>

			<div class="row-fluid">
				<div class="span8">
				</div>
				<div class="span4">
				  <h2>Form ID: <?php 	echo $this->data['Pqmp']['id']; ?></h2>
				  <h6><span class="label label-important">Important</span> Unique Form ID</h6>
				</div><!--/span-->
			</div><!--/row-->
			 <hr>

			<div class="row-fluid">
				<div class="span6">
					<?php
						echo $this->Form->input('facility_name', array('label' => array('class' => 'control-label', 'text' => 'Name of Facility'),));
						echo $this->Form->input('facility_address', array('label' => array('class' => 'control-label', 'text' => 'Facility Address'),));
						echo $this->Form->input('facility_code', array('label' => array('class' => 'control-label', 'text' => 'Facility Code'),));
					?>
				</div><!--/span-->
				<div class="span6">
					<?php
						// echo $this->Form->input('district_name', array('label' => array('class' => 'control-label', 'text' => 'District Name'), ));
						// echo $this->Form->input('province_name', array('label' => array('class' => 'control-label', 'text' => 'Province Name'), ));
						echo $this->Form->input('facility_phone', array('label' => array('class' => 'control-label', 'text' => 'Facility Telephone'), ));
						// echo $this->Form->input('county_id', array('label' => array('class' => 'control-label required', 'text' => 'County'), ));
						echo $this->Form->input('county_id', array(
									'label' => array('class' => 'control-label required', 'text' => 'COUNTY '),
									'empty' => true, 'between' => '<div class="controls ui-widget">',
								));
						
						echo $this->Form->input('sub_county_id', array(
							        'options' => $sub_counties,
									'label' => array('class' => 'control-label'),
									'empty' => true, 'between' => '<div class="controls ui-widget">',
								));
						// print_r($sub_counties);
					?>
				</div><!--/span-->
			</div><!--/row-->
			 <hr>

			<div class="row-fluid">
				<div class="span12">
					<h4 class="well pqmpbanner" style="text-align:center;">PRODUCT IDENTITY</h4>
				</div><!--/span-->
			</div><!--/row-->

			<div class="row-fluid">
				<div class="span6">
					<?php
						echo $this->Form->input('brand_name', array(
							'label' => array('class' => 'control-label required', 'text' => 'Brand Name'.' <span style="color:red;">*</span> '),
							'class' => 'autoComblete2'));
						echo $this->Form->input('batch_number', array('label' => array('class' => 'control-label required', 'text' => 'Batch/Lot Number'), ));
						// echo $this->Form->input('manufacture_date', array(
							// 'div' => array('class' => 'control-group'),
							// 'type' => 'text',
							// 'label' => array('class' => 'control-label required', 'text' => 'Date of Manufacture'),
							// 'after'=>'<p class="help-block">	Format dd-mm-yyyy e.g (18-05-2012) <br> If day is not present select first</p></div>',
						// ));

						echo $this->Form->input('manufacture_date', array(
							'type' => 'date',
							'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
							'label' => array('class' => 'control-label required', 'text' => 'Date of Manufacture'),
							'after'=>'<p class="help-block">	Date, Month & Year or Year of Manufacture </p></div>',
							'class' => ' autosave-ignore ',
						));

						echo $this->Form->input('name_of_manufacturer', array('label' => array('class' => 'control-label required', 'text' => 'Name of Manufacturer'.' <span style="color:red;">*</span> '), ));
						echo $this->Form->input('supplier_name', array('label' => array('class' => 'control-label', 'text' => 'Name of Distributor / Supplier'), ));
					?>
				</div><!--/span-->
				<div class="span6">
					<?php
						echo $this->Form->input('generic_name',
												array('label' => array('class' => 'control-label required', 'text' => 'Generic Name'),
												'class' => ' autoComblete'
												));

						echo $this->Form->input('expiry_date', array(
							'div' => array('class' => 'control-group'),
							'type' => 'text',
							'label' => array('class' => 'control-label required', 'text' => 'Date of Expiry'.' <span style="color:red;">*</span> '),
							'after'=>'<p class="help-block">	Date format (dd-mm-yyyy) </p></div>',
						));

						echo $this->Form->input('receipt_date', array(
							'div' => array('class' => 'control-group required'),
							'type' => 'text',
							'label' => array('class' => 'control-label required', 'text' => 'Date of Receipt'.' <span style="color:red;">*</span> '),
							'after'=>'<p class="help-block">	Date format (dd-mm-yyyy) </p></div>',
						));

						echo $this->Form->input('country_id', array(
							'empty' => true,
							'after'=>'<p class="help-block">	start typing for options</p></div>',
							'label' => array('class' => 'control-label', 'text' => 'Country of Origin'), ));

						echo $this->Form->input('supplier_address', array('label' => array('class' => 'control-label', 'text' => 'Distributor/ Supplier\'s Address'), ));
					?>
				</div><!--/span-->
			</div><!--/row-->
			 <hr>

			<div class="row-fluid">
				<div class="span6">
					<div class="pqmpbanner">
					<h4><label class="required">PRODUCT FORMULATION <span style="color:red;">*</span> </label></h4>
					<h5>(select appropriate option)</h5>
					</div>
				</div><!--/span-->
				<div class="span6">
					<div class="pqmpbanner">
					<h4><label class="required">COMPLAINT <span style="color:red;">*</span>  </label></h4>
					<h5>(Tick appropriate box / boxes)</h5>
					</div>
				</div><!--/span-->
			</div><!--/row-->

			<div class="row-fluid">
				<div class="span6">
					<?php
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
							'before' => '<div class="control-group"> <input type="hidden" value="" id="PqmpProductFormulation_" name="data[Pqmp][product_formulation]">
										 <label class="radio">',
							'after' => '</label>',
							'options' => array('Oral tablets / capsules' => $help_infos['product_formulation_1']['field_label']),
							'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
						));
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Oral suspension / syrup' => $help_infos['product_formulation_2']['field_label']),
							'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
						));
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Injection' => $help_infos['product_formulation_3']['field_label']),
							'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
						));
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Diluent' => $help_infos['product_formulation_4']['field_label']),
							'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
						));
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Powder for Reconstitution of Suspension' => $help_infos['product_formulation_5']['field_label']),
							'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
						));
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Powder for Reconstitution of Injection' => $help_infos['product_formulation_6']['field_label']),
							'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
						));
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Eye drops' => $help_infos['product_formulation_7']['field_label']),
							'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
						));
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Ear drops' => $help_infos['product_formulation_8']['field_label']),
							'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
						));
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Nebuliser solution' => $help_infos['product_formulation_9']['field_label']),
							'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
						));
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Cream / Ointment / Liniment / Paste' => $help_infos['product_formulation_10']['field_label']),
							'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
						));
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false,
							'format' => array('before', 'label', 'between', 'input','error', 'after'),
							'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
							'before' => '<label class="radio">',
							'after' => '</label>',
							'options' => array('Other' => $help_infos['product_formulation_11']['field_label']),
							'onclick' => '$("#PqmpProductFormulationSpecify").removeAttr("disabled")',
						));
						echo $this->Form->input('product_formulation_specify', array(
									// 'label' => array('class' => 'control-label', 'text' => '(specify)'),
									'label' => false, 'disabled' => true, 'between' => false, 'div' => false, 'class' => 'span7',
									'placeholder' => 'If other, specify',
									'after'=>'<p class="help-block">  </p>  </div>'
								));
					?>
				</div><!--/span-->
				<div class="span6">
					<?php
						echo $this->Form->input('colour_change', array(
													'before' => '<div class="control-group">',
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpColourChange_" name="data[Pqmp][colour_change]">
																	<label class="checkbox">',
													'after' => 'Colour change </label>',));
						echo $this->Form->input('separating', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpSeparating_" name="data[Pqmp][separating]">
																	<label class="checkbox">',
													'after' => 'separating	</label>',));
						echo $this->Form->input('powdering', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpPowdering_" name="data[Pqmp][powdering]">
																	<label class="checkbox">',
													'after' => 'Powdering / crumbling </label>',));
						echo $this->Form->input('caking', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpCaking_" name="data[Pqmp][caking]">
																	<label class="checkbox">',
													'after' => 'caking	</label>',));
						echo $this->Form->input('moulding', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpMoulding_" name="data[Pqmp][moulding]">
																	<label class="checkbox">',
													'after' => 'Moulding </label>',));
						echo $this->Form->input('odour_change', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpOdourChange_" name="data[Pqmp][odour_change]">
																	<label class="checkbox">',
													'after' => 'Change of odour	</label>',));
						echo $this->Form->input('mislabeling', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpMislabeling_" name="data[Pqmp][mislabeling]">
																	<label class="checkbox">',
													'after' => 'Mislabeling </label>',));
						echo $this->Form->input('incomplete_pack', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpIncompletePack_" name="data[Pqmp][incomplete_pack]">
																	<label class="checkbox">',
													'after' => 'Incomplete pack	</label>',));
						echo $this->Form->input('complaint_other', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpComlaintOther_" name="data[Pqmp][complaint_other]">
																	<label class="checkbox">',
													'after' => 'Other	</label>',
													));
						echo $this->Form->input('complaint', array('type' => 'hidden', 'value' => ''));
						echo $this->Form->error('Pqmp.complaint', array('wrap' => 'span', 'class' => 'control-group required error'));
						echo $this->Form->input('complaint_other_specify', array(
													'class' => 'span6',  'rows' => '3', 'label' => false, 'between' => false,
													'after'=>'<p class="help-block">  </p>',
													'disabled' => true, 'placeholder' => 'If other, specify', ));
					?>
				</div><!--/span-->
			</div><!--/row-->
			 <hr>

			<div class="row-fluid">
				<div class="span12">
					<?php
						echo $this->Form->input('complaint_description', array('class' => 'span8', 'rows' => '2',
																	'label' => array('class' => 'control-label required', 'text' => 'Describe the complaint in detail'.' <span style="color:red;">*</span> '),
																	'after'=>'<p class="help-block">  </p></div>',
																	));

					?>
				</div><!--/span-->
			</div><!--/row-->
			<hr>

			<div class="row-fluid">
				<div class="span12">
					<table class="table table-bordered  table-condensed table-pvborderless">
						<tbody>
						  <tr>
							<td><h4>Does the product require refrigeration?</h4>
							   </td>
							<td>
								<?php
									echo $this->Form->input('require_refrigeration', array(
										'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
										'before' => '<div class="form-inline">
													<input type="hidden" value="" id="PqmpRequireRefrigeration_" name="data[Pqmp][require_refrigeration]">
													<label class="radio">',
										'after' => '</label>&nbsp;&nbsp;',
										'options' => array('Yes' => 'Yes'),
									));
									echo $this->Form->input('require_refrigeration', array(
										'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false,
										'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
										'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
										'before' => '<label class="radio">', 'after' => '</label> </div>',
										'options' => array('No' => 'No'),
									));
								?>
							</td>

							<td rowspan="4">
								<?php
									echo $this->Form->label('Other details if necessary');
									echo $this->Form->input('other_details', array(
												'class' => 'span10',  'rows' => '4', 'label' => false, 'between' => false, 'div' => false,
												'after'=>'<p class="help-block">  </p>',
												'placeholder' => 'Other details if necessary', ));
								?>
							</td>
						  </tr>

						  <tr>
							<td><h4>Was the product available at the facility?</h4>
							   </td>
							<td>
								<?php
									echo $this->Form->input('product_at_facility', array(
										'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
										'before' => ' <div class="form-inline">
													<input type="hidden" value="" id="PqmpProductAtFacility_" name="data[Pqmp][product_at_facility]"> <label class="radio">',
										'after' => '</label>&nbsp;&nbsp;',
										'options' => array('Yes' => 'Yes'),
									));
									echo $this->Form->input('product_at_facility', array(
										'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false,
										'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
										'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
										'before' => '<label class="radio">', 'after' => '</label> </div> ',
										'options' => array('No' => 'No'),
									));
								?>
							</td>
						  </tr>

						  <tr>
							<td><h4>Was the product dispensed and returned by client?</h4>
							   </td>
							<td>
								<?php
									echo $this->Form->input('returned_by_client', array(
										'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
										'before' => ' <div class="form-inline">
													<input type="hidden" value="" id="PqmpReturnedByClient_" name="data[Pqmp][returned_by_client]"> <label class="radio">',
										'after' => '</label>&nbsp;&nbsp;',
										'options' => array('Yes' => 'Yes'),
									));
									echo $this->Form->input('returned_by_client', array(
										'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false,
										'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
										'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
										'before' => '<label class="radio">', 'after' => '</label> </div> ',
										'options' => array('No' => 'No'),
									));
								?>
							</td>
						  </tr>

						  <tr>
							<td><h4>Was the product stored according to Manufacturer / MOH recommendations?</h4>
							   </td>
							<td>
								<?php
									echo $this->Form->input('stored_to_recommendations', array(
										'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
										'before' => ' <div class="form-inline">
													<input type="hidden" value="" id="PqmpStoredToRecommendations_" name="data[Pqmp][stored_to_recommendations]"> <label class="radio">',
										'after' => '</label>&nbsp;&nbsp;',
										'options' => array('Yes' => 'Yes'),
									));
									echo $this->Form->input('stored_to_recommendations', array(
										'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false,
										'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
										'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
										'before' => '<label class="radio">', 'after' => '</label> </div> ',
										'options' => array('No' => 'No'),
									));
								?>
							</td>
						  </tr>

						</tbody>
				  </table>

				</div><!--/span-->
			</div><!--/row-->

			<div class="row-fluid">
				<div class="span12">
					<?php
						echo $this->Form->input('comments', array('class' => 'span8', 'rows' => '2',
																	'label' => array('class' => 'control-label required', 'text' => 'Comments (if any)'),
																	'after'=>'<p class="help-block">  </p></div>',
																	));

					?>
				</div><!--/span-->
			</div><!--/row-->
			<hr>

			<?php echo $this->element('multi/attachments'); ?>

			<div class="row-fluid">
				<div class="span6">
					<?php
						echo $this->Form->input('reporter_name', array(
							'div' => array('class' => 'control-group required'),
							'label' => array('class' => 'control-label required', 'text' => 'Name of Reporter'.' <span style="color:red;">*</span> ')
						));

						echo $this->Form->input('designation_id', array('label' => array('class' => 'control-label required', 'text' => 'Cadr / Job title'), ));

					?>
				</div><!--/span-->
				<div class="span6">
					<?php
						echo $this->Form->input('contact_number', array(
							'div' => array('class' => 'control-group required'),
							'label' => array('class' => 'control-label required', 'text' => 'Contact Number'.' <span style="color:red;">*</span> ')
						));

						echo $this->Form->input('reporter_email', array(
							'type' => 'email',
							'div' => array('class' => 'control-group required'),
							'label' => array('class' => 'control-label required', 'text' => 'Reporter\'s email <span style="color:red;">*</span>'),
							'title'=>'', 'data-content' => '',
							'after'=>'<p class="help-block">  </p></div>',
							'class' => ''
						));

					?>
				</div><!--/span-->
			</div><!--/row-->

			<?php echo $this->element('help/explanatory'); ?>

			<div class="form-actions">
					<div class="row-fluid">
						<div class="span4">
							<?php

								echo $this->Form->button('Save Changes', array(
										'name' => 'saveChanges',
										'onclick' => '$(\'#PqmpEditForm\').validate().cancelSubmit = true;',
										'class' => 'btn btn-primary mapop',
										'id' => 'SadrSaveChanges', 'title'=>'Save & continue editing',
										'data-content' => 'Save changes to form without submitting it.
																								The form will still be available for further editing.',
										'div' => false,
									));
							?>
						</div>
						<div class="span4">
							<?php

								echo $this->Form->button('Save and Submit Report', array(
									'name' => 'submitReport',
									'onclick'=>"return confirm('Are you sure you wish to submit the form to PPB? You will not be able to edit it later.');",
									'class' => 'btn btn-success mapop',
									'id' => 'SadrSubmitReport', 'title'=>'Save and Submit Report',
									'data-content' => 'Save the report and submit it to the pharmacy and Poisons Board. You will also get a copy of this report.',
									'div' => false,
								));

							?>
						</div>
						<div class="span4">
							<?php
								echo $this->Form->button('Cancel', array(
										'name' => 'cancelReport',
										'class' => 'btn mapop',
										'id' => 'PqmpCancelReport', 'title'=>'Cancel form',
										'data-content' => 'Cancel form and go back to home page.',
										'div' => false,
									));

							?>
						</div>
					</div>
				</div>
				<?php
					echo $this->Form->end();
				?>

		</div>
		</div>
	</div>
</section>

<script type="text/javascript">
			var myarray = <?php echo json_encode($this->validationErrors); ?>;
		</script>
