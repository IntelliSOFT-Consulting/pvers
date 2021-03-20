<?php
	$this->assign('PQMP', 'active');
	$this->Html->script('jquery/combobox', array('inline' => false));
	$this->Html->script('pqmp', array('inline' => false));
 ?>
<?php
				//echo $this->element('banner');
		echo $this->Session->flash();

		echo $this->Form->create('Pqmp', array(
			 'type' => 'file',
			 'class' => 'form-horizontal',
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

  <!-- PQMP EDIT
================================================== -->
	<div class="row-fluid">
		<div class="span10 formbackp">

			

			<?php 
				echo $this->Form->input('id');
				echo $this->Form->input('Pqmp.reference_no', array('type' => 'hidden'));
			?>

			<p><b>(FOM001/MIP/PMS/SOP/001)</b></p>
            <div class="row-fluid">
                <div class="span12">
                    <?php
                        echo $this->Html->image('confidence.png', array('alt' => 'in confidence', 'class' => 'pull-right'));
	                    echo $this->Html->image('coa.png', array('alt' => 'COA', 'style' => 'margin-left: 45%;'));
                    ?>
                    <div class="babayao" style="text-align: center;">
	                    <h4>MINISTRY OF HEALTH</h4>
	                    <h5>PHARMACY AND POISONS BOARD</h5>
	                    <h5>P.O. Box 27663-00506 NAIROBI</h5>
	                    <h5>Tel: +254 709 770 100/+254 709 770 xxx (Replace xxx with extension)</h5>
	                    <h5><b>Email:</b> pv@pharmacyboardkenya.org</h5>
	                    <h5 style="background-color: #F7A3D8;">FORM FOR REPORTING SUSPECTED POOR-QUALITY MEDICAL PRODUCTS AND HEALTH TECHNOLOGIES</h5>
                    </div>
                </div>
            </div>

			<div class="row-fluid">
				<div class="span8">
				</div>
				<div class="span4">
				  <h5>Form ID: <?php 	echo $pqmp['Pqmp']['reference_no']; ?></h5>
				  <h6><span class="label label-important">Important</span> Unique Form ID</h6>
				</div><!--/span-->
			</div><!--/row-->
			 <hr>

			 	<h5>Product category (Tick appropriate box)</h5>
			 <div class="row-fluid">
			 	<div class="span6">
			 		<?php
                    echo $this->Form->input('medicinal_product', array(
                            'type' => 'checkbox',  'label' => false, 'div' => false, 'class' => 'make_radio', 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Pqmp_medicinal_product_" name="data[Pqmp][medicinal_product]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Medicinal product </label>',));
                    echo $this->Form->input('blood_products', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => 'make_radio', 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Pqmp_blood_products_" name="data[Pqmp][blood_products]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Blood and blood products </label>',));
                    echo $this->Form->input('herbal_product', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => 'make_radio', 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Pqmp_herbal_product_" name="data[Pqmp][herbal_product]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Herbal product </label>',));
                    echo $this->Form->input('medical_device', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => 'make_radio', 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Pqmp_medical_device_" name="data[Pqmp][medical_device]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Medical device </label>',));
						
                ?>
			 	</div>
			 	<div class="span6">
			 		<?php

                    echo $this->Form->input('product_vaccine', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => 'make_radio', 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Pqmp_product_vaccine_" name="data[Pqmp][product_vaccine]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Vaccine </label>',));
                    echo $this->Form->input('cosmeceuticals', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => 'make_radio', 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Pqmp_cosmeceuticals_" name="data[Pqmp][cosmeceuticals]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Cosmeceuticals </label>',));
                    echo $this->Form->input('product_other', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => 'make_radio', 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Pqmp_product_other_" name="data[Pqmp][product_other]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Others </label>',));
					echo $this->Form->input('product_specify', array(
							'label' => false, 'placeholder' => '(If others, specify)', 'div' => false, 'between' => false, 'after' => false, 'class' => false,
							'disabled' => true
							));
			 		?>
			 	</div>
			 </div>
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
					<h5 class="pqmpbanner" style="text-align:left;">PRODUCT IDENTITY</h5>
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
							'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true, 'empty' => array('day' => '(choose day)', 'month' => '(choose month)', 'year' => '(choose year)'),
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
							'type' => 'text', 'class' => 'date-pick-expire',
							'label' => array('class' => 'control-label required', 'text' => 'Date of Expiry'.' <span style="color:red;">*</span> '),
							'after'=>'<p class="help-block">	Date format (dd-mm-yyyy) <br> If day is missing, use last day of the month. </p></div>',
						));

						echo $this->Form->input('receipt_date', array(
							'div' => array('class' => 'control-group required'),
							'type' => 'text',
							'label' => array('class' => 'control-label required', 'text' => 'Date of Receipt'.' '),
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
					<h5>(Tick appropriate box)</h5>
					</div>
				</div><!--/span-->
				<div class="span6">
					<div class="pqmpbanner">
					<h4><label class="required">COMPLAINT <span style="color:red;">*</span>  </label></h4>
					<h5>(Tick appropriate box/boxes)</h5>
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
							'options' => array('Oral tablets / capsules' => 'Oral tablets / capsules'),
							'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
						));
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Oral suspension / syrup' => 'Oral suspension / syrup'),
							'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
						));
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Injection' => 'Injection'),
							'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
						));
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Diluent' => 'Diluent'),
							'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
						));
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Powder for Reconstitution of Suspension' => 'Powder for Reconstitution of Suspension'),
							'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
						));
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Powder for Reconstitution of Injection' => 'Powder for Reconstitution of Injection'),
							'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
						));
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Eye drops' => 'Eye drops'),
							'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
						));
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Ear drops' => 'Ear drops'),
							'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
						));
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Nebuliser solution' => 'Nebuliser solution'),
							'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
						));
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Cream / Ointment / Liniment / Paste' => 'Cream / Ointment / Liniment / Paste'),
							'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
						));
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Anticoagulant' => 'Anticoagulant (for blood and blood products)'),
							'onclick' => '$("#PqmpProductFormulationSpecify").attr("disabled","disabled")',
						));
						echo $this->Form->input('product_formulation', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false,
							'format' => array('before', 'label', 'between', 'input','error', 'after'),
							'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
							'before' => '<label class="radio">',
							'after' => '</label>',
							'options' => array('Other' => 'Other'),
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
													// 'before' => '<div class="control-group">',
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpColourChange_" name="data[Pqmp][colour_change]">
																	<label class="checkbox">',
													'after' => 'Colour change </label>',));
						echo $this->Form->input('separating', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpSeparating_" name="data[Pqmp][separating]">
																	<label class="checkbox">',
													'after' => 'Separating	</label>',));
						echo $this->Form->input('powdering', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpPowdering_" name="data[Pqmp][powdering]">
																	<label class="checkbox">',
													'after' => 'Powdering / crumbling </label>',));
						echo $this->Form->input('caking', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpCaking_" name="data[Pqmp][caking]">
																	<label class="checkbox">',
													'after' => 'Caking	</label>',));
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
						echo $this->Form->input('therapeutic_ineffectiveness', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpTherapeuticIneffectiveness_" name="data[Pqmp][therapeutic_ineffectiveness]">
																	<label class="checkbox">',
													'after' => 'Therapeutic ineffectiveness	</label>',));
						echo $this->Form->input('particulate_matter', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpParticulateMatter_" name="data[Pqmp][particulate_matter]">
																	<label class="checkbox">',
													'after' => 'Particulate matter in infusions/injectables	</label>',));
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
					<div class="pqmpbanner">
					<h4><label class="required">FOR MEDICAL DEVICE AND INVITRO DIAGNOSTIC <span style="color:red;">*</span> </label></h4>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6">
					<?php
						echo $this->Form->input('packaging', array(
													'before' => '<div class="control-group">',
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpPackaging_" name="data[Pqmp][packaging]">
																	<label class="checkbox">',
													'after' => 'Packaging </label>',));
						echo $this->Form->input('labelling', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpLabelling_" name="data[Pqmp][labelling]">
																	<label class="checkbox">',
													'after' => 'Labelling	</label>',));
						echo $this->Form->input('sampling', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpSampling_" name="data[Pqmp][sampling]">
																	<label class="checkbox">',
													'after' => 'Sampling </label>',));
						echo $this->Form->input('mechanism', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpMechanism_" name="data[Pqmp][mechanism]">
																	<label class="checkbox">',
													'after' => 'Mechanism	</label>',));
						echo $this->Form->input('electrical', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpElectrical_" name="data[Pqmp][electrical]">
																	<label class="checkbox">',
													'after' => 'Electrical </label>',));
						echo $this->Form->input('device_data', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpDeviceData_" name="data[Pqmp][device_data]">
																	<label class="checkbox">',
													'after' => 'Data	</label></div>',));
					?>
				</div><!--/span-->
				<div class="span6">
					<?php
						echo $this->Form->input('software', array(
													'before' => '<div class="control-group">',
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpSoftware_" name="data[Pqmp][software]">
																	<label class="checkbox">',
													'after' => 'Software </label>',));
						echo $this->Form->input('environmental', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpEnvironmental_" name="data[Pqmp][environmental]">
																	<label class="checkbox">',
													'after' => 'Environmental	</label>',));
						echo $this->Form->input('failure_to_calibrate', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpFailureToCalibrate_" name="data[Pqmp][failure_to_calibrate]">
																	<label class="checkbox">',
													'after' => 'Failure to calibrate </label>',));
						echo $this->Form->input('results', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpResults_" name="data[Pqmp][results]">
																	<label class="checkbox">',
													'after' => 'Results	</label>',));
						echo $this->Form->input('readings', array(
													'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
													'between' => '<input type="hidden" value="0" id="PqmpReadings_" name="data[Pqmp][readings]">
																	<label class="checkbox">',
													'after' => 'Readings </label></div>',));
					?>
				</div><!--/span-->
			</div>
			<hr>

			<div class="row-fluid">
				<div class="span12">
					<?php
						echo $this->Form->input('complaint_description', array('class' => 'span8', 'rows' => '2',
																	'label' => array('class' => 'control-label required', 'text' => 'Describe the complaint in detail'.' <span style="color:red;">*</span> '),
																	'after'=>'<p class="help-block">  </p></div>',
																	));

						// echo $this->Form->input('cold_chain', array('class' => 'span8', 'rows' => '2',
						// 											'label' => array('class' => 'control-label required', 'text' => 'Was the cold chain maintained for both transportation and storage?'),
						// 											'after'=>'<p class="help-block">  </p></div>',
						// 											));
						echo "<h5>Was the cold chain maintained for both transportation and storage?</h5>";
						echo $this->Form->input('cold_chain', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'cold_chain',
                          'before' => '<div class="control-group ">   <label class="control-label required">
                              </label>  <div class="controls">
                            <input type="hidden" value="" id="PqmpColdChain_" name="data[Pqmp][cold_chain]"> <label class="radio inline">',
                          'after' => '</label>',
                          'options' => array('Yes' => 'Yes'),
                        )); 
                        echo $this->Form->input('cold_chain', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'cold_chain',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('No' => 'No')
                        )); 
                        echo $this->Form->input('cold_chain', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'cold_chain',
                          'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                          'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                          'before' => '<label class="radio inline">',
                          'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.cold_chain\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>

                                </div> </div>',
                          'options' => array('Not sure' => 'Not sure'),
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
							<td><h5>Does the product require refrigeration?</h5>
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
							<td><h5>Was the product available at the facility?</h5>
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
							<td><h5>Was the product dispensed and returned by client?</h5>
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
							<td><h5>Was the product stored according to Manufacturer / MOH recommendations?</h5>
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
			
			<?php echo $this->element('multi/attachments', ['model' => 'Pqmp', 'group' => 'attachment']); ?>

			<div class="row-fluid">
                <div class="span6">
                    <?php
                        echo $this->Form->input('reporter_name', array(
                            'div' => array('class' => 'control-group required'),
                            'label' => array('class' => 'control-label required', 'text' => 'Name of Person Reporting <span style="color:red;">*</span>'),
                        ));
                        echo $this->Form->input('reporter_email', array(
                            'type' => 'email',
                            'div' => array('class' => 'control-group required'),
                            'label' => array('class' => 'control-label required', 'text' => 'E-MAIL ADDRESS <span style="color:red;">*</span>')
                        ));
                        
                    ?>
                </div><!--/span-->
                <div class="span6">
                    <?php
                        echo $this->Form->input('designation_id',
                                array('label' => array('class' => 'control-label required', 'text' => 'DESIGNATION'.' <span style="color:red;">*</span>'), 'empty'=>true ));
                        echo $this->Form->input('reporter_phone', array(
                            'div' => array('class' => 'control-group'),
                            'label' => array('class' => 'control-label required', 'text' => 'PHONE NO.')
                        ));
                        
                        echo $this->Form->input('reporter_date', array(
                            'type' => 'text', 'class' => 'date-pick-field',
                            'label' => array('class' => 'control-label required', 'text' => 'Date'),
                        ));
                    ?>
                </div><!--/span-->
            </div><!--/row-->
            <!-- <h5 style="text-align: center; color: #884805;">If Person Submitting is Different from Reporter</h5> <br/> -->
            <table class="table table-bordered  table-condensed table-pvborderless">
				<tbody>
  				  <tr>
					<td width="45%"><h5 class="pull-right text-success">Is the person submitting different from reporter?&nbsp;</h5></td>
					<td>
						<?php
								echo $this->Form->input('person_submitting', array(
									'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'person-submit',
									'before' => '<div class="form-inline">
												<input type="hidden" value="" id="PqmpPersonSubmitting_" name="data[Pqmp][person_submitting]">
												<label class="radio">',
									'after' => '</label>&nbsp;&nbsp;',
									'options' => array('Yes' => 'Yes'),
								));
								echo $this->Form->input('person_submitting', array(
									'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'person-submit',
									'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
									'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
									'before' => '<label class="radio">', 'after' => '</label> </div>',
									'options' => array('No' => 'No'),
								));
						?>
					</td>
					</tr>
				</tbody>
			</table>

            <div class="row-fluid">
                <div class="span6">
                    <?php
                        echo $this->Form->input('reporter_name_diff', array(
                            'div' => array('class' => 'control-group required'), 'class' => 'diff',
                            'label' => array('class' => 'control-label required', 'text' => 'Name <span style="color:red;">*</span>'),
                        ));
                        echo $this->Form->input('reporter_email_diff', array(
                            'type' => 'email',
                            'div' => array('class' => 'control-group required'), 'class' => 'diff',
                            'label' => array('class' => 'control-label required', 'text' => 'E-MAIL ADDRESS <span style="color:red;">*</span>')
                        ));
                    ?>
                </div><!--/span-->
                <div class="span6">
                    <?php
                        echo $this->Form->input('reporter_designation_diff', array(
                            'type' => 'select', 'options' => $designations, 'empty' => true,  'class' => 'diff',
                            'label' => array('class' => 'control-label required', 'text' => 'Designation'.' <span style="color:red;">*</span>'), 'empty'=>true ));
                        echo $this->Form->input('reporter_phone_diff', array(
                            'div' => array('class' => 'control-group'), 'class' => 'diff',
                            'label' => array('class' => 'control-label required', 'text' => 'PHONE NO.')
                        ));                        
                        echo $this->Form->input('reporter_date_diff', array(
                            'type' => 'text', 'class' => 'date-pick-field diff', 
                            'label' => array('class' => 'control-label required', 'text' => 'Date'),
                        ));
                    ?>
                </div><!--/span-->
            </div><!--/row-->

			<?php echo $this->element('help/product_problems'); ?>
				<?php
					echo $this->Form->end();
				?>

		</div>
		<div class="span2">
            <div class="my-sidebar" data-spy="affix" >
            <div class="awell">
                <?php
                  echo $this->Form->button('<i class="fa fa-floppy-o" aria-hidden="true"></i> Save Changes', array(
                      'name' => 'saveChanges',
                      'class' => 'btn btn-success mapop',
                      'formnovalidate' => 'formnovalidate',
                      'id' => 'SadrSaveChanges', 'title'=>'Save & continue editing',
                      'data-content' => 'Save changes to form without submitting it.
                                                  The form will still be available for further editing.',
                      'div' => false,
                    ));
                ?>
                <br>
                <hr>
                <?php
                  echo $this->Form->button('<i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit', array(
                      'name' => 'submitReport',
                      'onclick'=>"return confirm('Are you sure you wish to submit the report?');",
                      'class' => 'btn btn-primary btn-block mapop',
                      'id' => 'SiteInspectionSubmitReport', 'title'=>'Save and Submit Report',
                      'data-content' => 'Submit report for peer review and approval.',
                      'div' => false,
                    ));

                ?>
                <br>
                <hr>
                <?php
                    echo $this->Html->link('<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download PDF', array('action'=>'view', 'ext'=> 'pdf', $this->request->data['Pqmp']['id']),
                        array('escape' => false, 'class' => 'btn btn-info btn-block mapop', 'title'=>'Download PDF',
                        'data-content' => 'Download the pdf version of the report',));
                ?>
                <br>
                <hr>
                <?php
                    echo $this->Html->link('<i class="fa fa-times" aria-hidden="true"></i> Cancel', array('controller' => 'users', 'action' => 'dashboard'),
                              array('escape' => false, 'class' => 'btn btn-danger btn-block'));  

                ?>
               </div>
            </div>
        </div>
	 </div>
