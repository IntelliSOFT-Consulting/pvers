<?php
	$this->assign('SADR', 'active');
	$this->Html->script('jquery/combobox', array('inline' => false));      
	// $this->Html->script('jUpload/vendor/jquery.ui.widget.js', array('inline' => false));
 //    $this->Html->script('jUpload/jquery.iframe-transport.js', array('inline' => false));
 //    $this->Html->script('jUpload/jquery.fileupload.js', array('inline' => false));
 //    $this->Html->script('jquery/jquery.blockUI.js', array('inline' => false));
	$this->Html->script('sadr', array('inline' => false));
 ?>

      <!-- SADR
    ================================================== -->
    <section id="sadrsadd">

	<?php
		echo $this->Session->flash();
		echo $this->Form->create('Sadr', array(
			'type' => 'file',
			'class' => 'form-horizontal',
			'inputDefaults' => array(
				'div' => array('class' => 'control-group'),
				'label' => array('class' => 'control-label'),
				'between' => '<div class="controls">',
				'after' => '</div>',
				'class' => '',
				'format' => array('before', 'label', 'between', 'input', 'after','error'),
				'error' => array('attributes' => array( 'class' => 'controls help-block')),
			 ),
		));
	?>
	<div class="row-fluid">
		<div class="span10 formback">

			<?php
				echo $this->Form->input('Sadr.id', array());
				echo $this->Form->input('Sadr.report_type', array('type' => 'hidden'));
				echo $this->Form->input('Sadr.reference_no', array('type' => 'hidden'));
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
	                    <h5 style="color: red;">SUSPECTED ADVERSE DRUG REACTION REPORTING FORM</h5>
                    </div>
                </div>
            </div>
            <hr>

			<div class="row-fluid">
				<div class="span8">
				<p class="controls" id="sadr_edit_tip">	<span class="label label-important">Tip:</span> Fields marked with <span style="color:red;">*</span> are mandatory</p>
				<?php
					echo $this->Form->input('report_title', array(
						'label' => array('class' => 'control-label required', 'text' => 'REPORT TITLE'),
						'placeholder' => 'this content title..' , 'title' => 'Report Title',
						'data-content' => 'Appropriate title for the report e.g Nevirapine related Rash',
						'after'=>'<p class="help-block"> e.g Nevirapine related rash </p></div>',
						'class' => 'span9 mapop',
					));
				 ?>
				</div>
				<div class="span4" id="sadr_edit_form_id">
				  <h4> <?php 	echo  'Form ID: '.$this->data['Sadr']['reference_no']; ?></h4>
				  <h5> <?php 	echo  'Form Type: '.$this->data['Sadr']['report_type']; ?></h5>
				</div>
			</div><!--/row-->
			 <hr>

			<div class="row-fluid">
				<div class="span6">
				 <?php
                    echo "<h4>The report is on  <span style='color:red;'>*</span>:</h4>";
                    echo $this->Form->input('report_sadr', array(
                    	'format' => array('error', 'before', 'label', 'between', 'input', 'after'),
                            'type' => 'checkbox',  'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Sadr_report_sadr_" name="data[Sadr][report_sadr]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Suspected adverse drug reaction </label>',));
                    echo $this->Form->input('report_therapeutic', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Sadr_report_therapeutic_" name="data[Sadr][report_therapeutic]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Suspected Therapeutic ineffectiveness </label>',));
                ?>
				</div>
				<div class="span6">	
				<?php
                    echo "<h4>Product category (Tick appropriate box) <span style='color:red;'>*</span></h4>";
                    echo $this->Form->input('medicinal_product', array(
                    	'format' => array('error', 'before', 'label', 'between', 'input', 'after'),
                            'type' => 'checkbox',  'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Sadr_medicinal_product_" name="data[Sadr][medicinal_product]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Medicinal product </label>',));
                    echo $this->Form->input('blood_products', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Sadr_blood_products_" name="data[Sadr][blood_products]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Blood and blood products </label>',));
                    echo $this->Form->input('herbal_product', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Sadr_herbal_product_" name="data[Sadr][herbal_product]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Herbal product </label>',));
                    echo $this->Form->input('cosmeceuticals', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Sadr_cosmeceuticals_" name="data[Sadr][cosmeceuticals]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Cosmeceuticals </label>',));
                    echo $this->Form->input('product_other', array(
                            'type' => 'checkbox',   'label' => false, 'div' => false, 'class' => false, 'hiddenField' => false,
                                                    'between' => '<input type="hidden" value="0" id="Sadr_product_other_" name="data[Sadr][product_other]">
                                                                    <label class="checkbox">',
                                                    'after' => 'Others </label>',));
					echo $this->Form->input('product_specify', array(
							'label' => false, 'placeholder' => '(If others, specify)', 'div' => false, 'between' => false, 'after' => false, 'class' => false,
						));
                ?>
				</div>
			</div>
			<hr>

			<div class="row-fluid">
				<div class="span6">
					<?php
						echo $this->Form->input('name_of_institution', array(
							'label' => array('class' => 'control-label', 'text' => 'NAME OF INSTITUTION'),
							'placeholder' => '' ,
							'title'=> '', 'data-content' => '',
							'after'=>'<p class="help-block">	 </p></div>',
						));

						echo $this->Form->input('address', array(
							'label' => array('class' => 'control-label', 'text' => 'ADDRESS <span style="color:red;">*</span>'),
						));
						echo $this->Form->input('institution_code', array('label' => array('class' => 'control-label',
									'text' => 'INSTITUTION CODE'), ));

					?>
				</div><!--/span-->
				<div class="span6">
					<?php

						echo $this->Form->input('county_id', array(
									'label' => array('class' => 'control-label required',
									'text' => 'COUNTY <span style="color:red;">*</span>'),
									'empty' => true, 'between' => '<div class="controls ui-widget">',
								));
						echo $this->Form->input('sub_county_id', array(
							        'options' => $sub_counties,
									'label' => array('class' => 'control-label'),
									'empty' => true, 'between' => '<div class="controls ui-widget">',
								));
						// print_r($sub_counties);
						echo $this->Form->input('contact', array('label' => array('class' => 'control-label', 'text' => 'INSTITUTION CONTACT'), ));
					?>
				</div><!--/span-->
			</div><!--/row-->
			 <hr>

            <h5 style="text-align: center; color: #884805;">PATIENT INFORMATION</h5>
			<div class="row-fluid">
				<div class="span6">
					<?php
						echo $this->Form->input('patient_name', array(
							'label' => array('class' => 'control-label required', 'text' =>  'PATIENT\'S INITIALS <span style="color:red;">*</span>'),
							'after'=>'<p class="help-block"> e.g E.O.O </p></div>',
							'class' => 'tooltipper',
						));
						echo $this->Form->input('ip_no', array('label' => array('class' => 'control-label', 'text' => 'IP/OP. NO.'), ));
					?>
					<div class="well-mine">
					<?php
						
						echo $this->Form->input('date_of_birth', array(
							'type' => 'date',
							// 'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
							'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => array('day' => '(choose day)', 'month' => '(choose month)', 'year' => '(choose year)'),
							'label' => array('class' => 'control-label required', 'text' => 'DATE OF BIRTH <span style="color:red;">*</span>'),
							'title'=> 'select beginning of the month if unsure', 'data-content' => 'If selected, year is mandatory.',
							'after'=>' <a style="font-weight:normal" onclick="$(\'.birthdate\').removeAttr(\'disabled\'); $(\'.birthdate\').val(\'\');
								$(\'#SadrAgeGroup\').attr(\'disabled\',\'disabled\'); $(\'#SadrAgeGroup\').val(\'\');" >
								<em class="accordion-toggle">clear!</em></a>
								<p class="help-block">	If selected, year is mandatory.  </p></div>',
							'class' => 'tooltipper birthdate autosave-ignore ',
						));

					?>
					<h5 class="controls">--OR--</h5>
					<?php
						echo $this->Form->input('age_group', array(
							'type' => 'select',
							'empty' => true,
							'options' => array(
												'neonate'=>'neonate',
												'infant' => 'infant',
												'child' => 'child',
												'adolescent' => 'adolescent',
												'adult' => 'adult',
												'elderly' => 'elderly',
												),
							'label' => array('class' => 'control-label required', 'text' => 'AGE GROUP'),
							'after' => '<a onclick="$(\'#SadrAgeGroup\').removeAttr(\'disabled\'); $(\'#SadrAgeGroup\').val(\'\');
									$(\'.birthdate\').attr(\'disabled\',\'disabled\'); $(\'.birthdate\').val(\'\');" >
								<em class="accordion-toggle">clear!</em></a> </div>',
						));

					?>
					</div>
					<?php

						echo $this->Form->input('known_allergy', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'known_allergy',
							'before' => '<div class="control-group">  <div>  <label class="control-label required">ANY KNOWN ALLERGY</label> </div>
											<div class="controls"> <input type="hidden" value="" id="SadrKnownAllergy_" name="data[Sadr][known_allergy]"> <label class="radio inline">',
							'after' => '</label>',
							'options' => array('yes' => 'yes'),
							'onclick' => '$("#SadrKnownAllergySpecify").removeAttr("disabled")',
						));
						echo $this->Form->input('known_allergy', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'known_allergy',
							'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
							'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
							'before' => '<label class="radio inline">',
							'after' => '</label> <label><a class="button"
										onclick="$(\'.known_allergy\').removeAttr(\'checked\'); $(\'#SadrKnownAllergySpecify\').attr(\'disabled\',\'disabled\');" >
										<em class="accordion-toggle">clear!</em></a></label> </div> </div>',
							'options' => array('No' => 'No'),
							'onclick' => '$("#SadrKnownAllergySpecify").attr("disabled","disabled")',
						));

						echo $this->Form->input('known_allergy_specify', array(
													// 'label' => array('class' => 'control-label', 'text' => '(specify)'),
													'label' => false, 'disabled' => true, 'placeholder' => 'If yes, specify',
													'after'=>'<p class="help-block"> (specify) </p></div>'
												));
					?>
				</div><!--/span-->
				<div class="span6">
					<?php
						echo $this->Form->input('ward', array('label' => array('class' => 'control-label required', 'text' => 'WARD / CLINIC'),
																'after'=>'<p class="help-block">	(Name/ Number) </p></div>'));
						echo $this->Form->input('patient_address', array(
							'label' => array('class' => 'control-label required', 'text' => 'PATIENT\'S ADDRESS'),
							'title'=> 'Where does the patient reside', 'data-content' => 'Where does the patient reside',
							'class' => 'tooltipper',
						));

						echo $this->Form->input('gender', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'gender',
							'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">GENDER <span style="color:red;">*</span></label> </div>
											<div class="controls">  <input type="hidden" value="" id="SadrGender_" name="data[Sadr][gender]"> <label class="radio inline">',
							'after' => '</label>',
							'options' => array('Male' => 'Male'),
						));
						echo $this->Form->input('gender', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'gender',
							'before' => '<label class="radio inline">',	'after' => '</label>',
							'options' => array('Female' => 'Female'),
						));
						echo $this->Form->input('gender', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'gender',
							'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
							'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
							'before' => '<label class="radio inline">',
							'after' => '</label> <label>
										<a class="tooltipper" data-original-title="Clears the checked value"
										onclick="$(\'.gender, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
										<em class="accordion-toggle">clear!</em></a> </label>
										</div> </div>',
							'options' => array('Unknown' => 'Unknown'),
						));

						/*echo $this->Form->input('pregnant', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnancy_status',
							'before' => '<div class="control-group"> <label class="control-label">PREGNANCY STATUS</label>
											<div class="controls" id="pregnancy_stati">  <input type="hidden" value="" id="SadrPregnancyStatus_" name="data[Sadr][pregnancy_status]"> <label class="radio inline">',
							'after' => '</label>',
							'onclick' => '$(\'#pstati\').show();',
							'options' => array('Yes' => 'Yes'),
						));
						echo $this->Form->input('pregnant', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnancy_status',
							'before' => '<label class="radio inline">',	'after' => '</label>',
							'onclick' => '$(\'#pstati\').hide(); $(\'#pstati input:radio\').removeAttr(\'checked\');',
							'options' => array('No' => 'No'),
						));
						echo $this->Form->input('pregnancy_status', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnancy_status',
							'before' => '<br><div id="pstati"><label class="radio inline">',	'after' => '</label>',
							'options' => array('1st Trimester' => '1st Trimester'),
						));
						echo $this->Form->input('pregnancy_status', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnancy_status',
							'before' => '<label class="radio inline">',	'after' => '</label>',
							'options' => array('2nd Trimester' => '2nd Trimester'),
						));
						echo $this->Form->input('pregnancy_status', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnancy_status',
							'before' => '<label class="radio inline">',
							'after' => '</label> <label>
							<a class="button"
										onclick="$(\'.pregnancy_status\').removeAttr(\'checked\')" >
										<em class="accordion-toggle">clear!</em></a> </label>
							</div> </div> </div>',
							'options' => array('3rd Trimester' => '3rd Trimester'),
						));*/
						echo $this->Form->input('pregnancy_status', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnancy_status',
                            'before' => '<div class="control-group"> <label class="control-label">PREGNANCY STATUS</label>
                                            <div class="controls" id="pregnancy_stati">  <input type="hidden" value="" id="SadrPregnancyStatus_" name="data[Sadr][pregnancy_status]"> <label class="radio inline">',
                            'after' => '</label>',
                            // 'onclick' => '$(\'#pstati\').show();',
                            'options' => array('Not Applicable' => 'Not Applicable'),
                        ));
                        echo $this->Form->input('pregnancy_status', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnancy_status',
                            'before' => '<label class="radio inline">', 'after' => '</label>',
                            // 'onclick' => '$(\'#pstati\').hide(); $(\'#pstati input:radio\').removeAttr(\'checked\');',
                            'options' => array('Not pregnant' => 'Not pregnant'),
                        ));
                        echo $this->Form->input('pregnancy_status', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnancy_status',
                            'before' => '<br><div><label class="radio inline">',    'after' => '</label>',
                            'options' => array('1st Trimester' => '1st Trimester'),
                        ));
                        echo $this->Form->input('pregnancy_status', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnancy_status',
                            'before' => '<label class="radio inline">', 'after' => '</label>',
                            'options' => array('2nd Trimester' => '2nd Trimester'),
                        ));
                        echo $this->Form->input('pregnancy_status', array(
                            'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnancy_status',
                            'before' => '<label class="radio inline">',
                            'after' => '</label> <label>
                            <a class="button"
                                        onclick="$(\'.pregnancy_status\').removeAttr(\'checked\')" >
                                        <em class="accordion-toggle">clear!</em></a> </label>
                            </div> </div> </div>',
                            'options' => array('3rd Trimester' => '3rd Trimester'),
                        ));

						echo $this->Form->input('weight', array(
										'label' => array('class' => 'control-label required', 'text' => 'WEIGHT (kg)'),
										'between' => '<div class="controls"><div class="input-append">',
										'after' => '<span class="add-on">Kg</span></div></div>'));
						echo $this->Form->input('height', array(
										'label' => array('class' => 'control-label required', 'text' => 'HEIGHT (cm)'),
										'between' => '<div class="controls"><div class="input-append">',
										'after' => '<span class="add-on">cm</span></div></div>'));

					?>
				</div><!--/span-->
			</div><!--/row-->
				<hr>
			<div class="row-fluid">
				<div class="span12">
					<?php
						echo $this->Form->input('date_of_onset_of_reaction', array(
							'type' => 'date',
							'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
							'label' => array('class' => 'control-label required', 'text' => 'DATE OF ONSET OF REACTION <span style="color:red;">*</span>'),
							'after'=>'<p class="help-block"> When did the reaction start </p></div>',
						));

						echo $this->Form->input('description_of_reaction', array(
							'class' => 'span8', 'rows' => '2',
							'label' => array('class' => 'control-label required', 'text' => 'BRIEF DESCRIPTION OF REACTION <span style="color:red;">*</span>'),
							'after'=>'<p class="help-block">	Please describe the reaction in terms of symptoms </p></div>',
						));

						/*echo $this->Form->input('diagnosis', array('class' => 'span8', 'rows' => '2',
																	'label' => array('class' => 'control-label required', 'text' => 'DIAGNOSIS'),
																	'after'=>'<p class="help-block"> (What was the patient treated for) </p></div>',
																	));*/

						echo $this->Form->input('medical_history', array(
							'class' => 'span8', 'rows' => '2',
							'label' => array('class' => 'control-label required', 'text' => 'MEDICAL HISTORY'),
							'after'=>'<p class="help-block">(Other relevant history including pre-existing medical conditions e.g. allergies, smoking, alcohol use, hepatic/ renal dysfunction etc)  </p></div>',
						));
					?>
				</div><!--/span-->
			</div><!--/row-->
			<hr>
			<?php echo $this->element('multi/list_of_drugs');?>
                      
            <?php echo $this->element('multi/list_of_medicines');?>

            <div class="row-fluid">
            	<div class="span6">
            		<h5 style="color: #884805;">Dechallenge/Rechallenge</h5>
            		<?php
            			echo "<p>Did the reaction resolve after the drug was stopped or when the dose was reduced?</p>";
                        echo $this->Form->input('reaction_resolve', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'reaction_resolve',
                          'before' => '<div class="control-group ">  <div>
                            <input type="hidden" value="" id="TransfusionReactionResolve_" name="data[Sadr][reaction_resolve]"> <label class="radio inline">',
                          'after' => '</label>',
                          'options' => array('Yes' => 'Yes'),
                        )); 
                        echo $this->Form->input('reaction_resolve', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'reaction_resolve',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('No' => 'No')
                        )); 
                        echo $this->Form->input('reaction_resolve', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'reaction_resolve',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Unknown' => 'Unknown')
                        ));
                        echo $this->Form->input('reaction_resolve', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reaction_resolve',
                          'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                          'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                          'before' => '<label class="radio inline">',
                          'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.reaction_resolve\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>

                                </div> </div>',
                          'options' => array('N/A' => 'N/A'),
                        ));

            			echo "<p>Did the reaction reappear after the drug was reintroduced?</p>";
                        echo $this->Form->input('reaction_reappear', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'reaction_reappear',
                          'before' => '<div class="control-group ">  <div>
                            <input type="hidden" value="" id="TransfusionReactionResolve_" name="data[Sadr][reaction_reappear]"> <label class="radio inline">',
                          'after' => '</label>',
                          'options' => array('Yes' => 'Yes'),
                        )); 
                        echo $this->Form->input('reaction_reappear', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'reaction_reappear',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('No' => 'No')
                        )); 
                        echo $this->Form->input('reaction_reappear', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'reaction_reappear',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Unknown' => 'Unknown')
                        ));
                        echo $this->Form->input('reaction_reappear', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'reaction_reappear',
                          'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                          'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                          'before' => '<label class="radio inline">',
                          'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a class="tooltipper" data-original-title="Clear selection"
                                onclick="$(\'.reaction_reappear\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>

                                </div> </div>',
                          'options' => array('N/A' => 'N/A'),
                        ));

                        echo $this->Form->input('lab_investigation', array(
                            'rows' => 2, 'label' => array('class' => 'control-label required', 'text' => 'Any lab investigations and results'),
                        ));

                    ?>
                    <p class="required">Outcome <span style="color:red;">*</span></p>
					<?php
						echo $this->Form->input('outcome', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
							'before' => '<div class="control-group"> <input type="hidden" value="" id="SadrOutcome_" name="data[Sadr][outcome]"> <label class="radio inline">',
							'after' => '</label>',
							'options' => array('recovered/resolved' => 'Recovered/resolved'),
						));
						echo $this->Form->input('outcome', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
							'before' => '<label class="radio inline">',	'after' => '</label>',
							'options' => array('recovering/resolving' => 'Recovering/resolving'),
						));
						echo $this->Form->input('outcome', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
							'before' => '<label class="radio inline">',	'after' => '</label>',
							'options' => array('recovered/resolved with sequelae' => 'Recovered/resolved with sequelae'),
						));
						echo $this->Form->input('outcome', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
							'before' => '<label class="radio inline">',	'after' => '</label>',
							'options' => array('not recovered/not resolved' => 'Not recovered/not resolved'),
						));
						echo $this->Form->input('outcome', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
							'before' => '<label class="radio inline">',	'after' => '</label>',
							'options' => array('fatal' => 'Fatal'),
						));
						echo $this->Form->input('outcome', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'outcome',
							'format' => array('before', 'label', 'between', 'input','error', 'after'),
							'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
							'before' => '<label class="radio inline">',
							'after' => '</label>
								<a class="button"
										onclick="$(\'.outcome\').removeAttr(\'checked\');" >
										<em class="accordion-toggle">clear!</em></a>
							</div>',
							'options' => array('Unknown' => 'Unknown'),
						));
					?>
            	</div>
            	<div class="span6">            		
            		<h5 style="color: #884805;">Grading of the reaction /event</h5>
            		<p class="required">Severity of reaction</p>
            		<?php
						echo $this->Html->link('Click to view Severity scale below', '#assessment1',
												 array(	'class' => 'tooltipper', 'onclick' => '$("#assessment1").click()',
														'id' => 'SadrSeverityT', 'title'=>'Click here to expand content below'));

						echo $this->Form->input('severity', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'severity',
							'before' => '<div class="control-group"> <input type="hidden" value="" id="SadrSeverity_" name="data[Sadr][severity]">
										 <label class="radio inline">',
							'after' => '</label>',
							'options' => array('Mild' => 'Mild'),
						));
						echo $this->Form->input('severity', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'severity',
							'before' => '<label class="radio inline">',	'after' => '</label>',
							'options' => array('Moderate' => 'Moderate'),
						));
						echo $this->Form->input('severity', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'severity',
							'before' => '<label class="radio inline">',	'after' => '</label>',
							'options' => array('Severe' => 'Severe'),
						));
						echo $this->Form->input('severity', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'severity',
							'before' => '<label class="radio inline">',	'after' => '</label>',
							'options' => array('Fatal' => 'Fatal'),
						));
						echo $this->Form->input('severity', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'severity',
							'format' => array('before', 'label', 'between', 'input','error', 'after'),
							'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
							'before' => '<label class="radio inline">',
							'after' => '</label>
								<a class="button"
										onclick="$(\'.severity\').removeAttr(\'checked\');" >
										<em class="accordion-toggle">clear!</em></a>
							</div>',
							'options' => array('Unknown' => 'Unknown'),
						));

					
                        echo $this->Form->input('serious', array(
                         'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'serious',
                         'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Is the reaction serious <span style="color:red;">*</span></label> </div>
                                         <div class="controls">  <input type="hidden" value="" id="Serious_" name="data[Sadr][serious]"> <label class="radio inline">',
                         'after' => '</label>',
                         'options' => array('Yes' => 'Yes'),
                        ));
                        echo $this->Form->input('serious', array(
                         'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'serious',
                         'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                         'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
                         'before' => '<label class="radio inline">',
                         'after' => '</label> 
                                     <span class="help-inline" style="padding-top: 5px;"> <a class="tooltipper" data-original-title="Clears the checked value"
                                     onclick="$(\'.serious,.serious_reason\').removeAttr(\'checked disabled\')">
                                     <em class="accordion-toggle">clear!</em></a> </span>
                                     </div> </div>',
                         'options' => array('No' => 'No'),
                        ));
                    ?>
                   	<p class="required">Criteria/reason for seriousness</p>
                    <?php
                        echo $this->Form->input('serious_reason', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'serious_reason',
                          'before' => '<div>  <div>
                            <input type="hidden" value="" id="SadrSerious_" name="data[Sadr][serious_reason]"> <label class="radio inline">',
                          'after' => '</label>',
                          'options' => array('Hospitalization/ Prolonged Hospitalization' => 'Hospitalization/ Prolonged Hospitalization'),
                        )); 
                        echo $this->Form->input('serious_reason', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'serious_reason',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Disability' => 'Disability')
                        )); 
                        echo $this->Form->input('serious_reason', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'serious_reason',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Congenital anomality' => 'Congenital anomality')
                        )); 
                        echo $this->Form->input('serious_reason', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false,
                          'class' => 'serious_reason',
                          'before' => '<label class="radio inline">', 'after' => '</label>',
                          'options' => array('Life threatening' => 'Life threatening')
                        )); 

                        echo $this->Form->input('serious_reason', array(
                          'type' => 'radio',  'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'serious_reason',
                          'format' => array('before', 'label', 'between', 'input', 'after', 'error'),
                          'error' => array('attributes' => array('wrap' => 'p', 'class' => 'controls required error')),
                          'before' => '<label class="radio inline">',
                          'after' => '</label>
                                <span class="help-inline" style="padding-top: 5px;"><a class="tooltipper" id="serious_reason_clear" data-original-title="Clear selection"
                                onclick="$(\'.serious_reason\').removeAttr(\'checked disabled\')">
                                <em class="accordion-toggle">clear!</em></a> </span>

                                </div> </div>',
                          'options' => array('Death' => 'Death'),
                        ));
                    ?>

                    <p class="required">Action taken <span style="color:red;">*</span></p>
					<?php
						echo $this->Form->input('action_taken', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'action_taken',
							'before' => '<div class="control-group"> <input type="hidden" value="" id="SadrActionTaken_" name="data[Sadr][action_taken]"> <label class="radio inline">',
							'after' => '</label>',
							'options' => array('Drug withdrawn' => 'Drug withdrawn'),
						));
						echo $this->Form->input('action_taken', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'action_taken',
							'before' => '<label class="radio inline">',	'after' => '</label>',
							'options' => array('Dose increased' => 'Dose increased'),
						));
						echo $this->Form->input('action_taken', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'action_taken',
							'before' => '<label class="radio inline">',	'after' => '</label>',
							'options' => array('Dose reduced' => 'Dose reduced'),
						));
						echo $this->Form->input('action_taken', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'action_taken',
							'before' => '<label class="radio inline">',	'after' => '</label>',
							'options' => array('Dose not changed' => 'Dose not changed'),
						));
						echo $this->Form->input('action_taken', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'action_taken',
							'before' => '<label class="radio inline">',	'after' => '</label>',
							'options' => array('Not applicable' => 'Not applicable'),
						));
						echo $this->Form->input('action_taken', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'action_taken',
							'format' => array('before', 'label', 'between', 'input','error', 'after'),
							'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
							'before' => '<label class="radio inline">',
							'after' => '</label>
								<a class="button"
										onclick="$(\'.action_taken\').removeAttr(\'checked\');" >
										<em class="accordion-toggle">clear!</em></a>
							</div>',
							'options' => array('Unknown' => 'Unknown'),
						));
					?>

					
            	</div>
            </div>

			<?php echo $this->element('help/assessment'); ?>

			<div class="row-fluid">
				<div class="span12">
					<?php
						echo $this->Form->input('any_other_comment', array('class' => 'span8',  'rows' => '2', 'label' => array('class' => 'control-label',
																					'text' => 'ANY OTHER COMMENT')));
					?>
				</div><!--/span-->
			</div><!--/row-->
			 <hr>

			<?php echo $this->element('multi/attachments', ['model' => 'Sadr', 'group' => 'attachment']); ?>

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
            <table class="table table-bordered  table-condensed table-pvborderless">
				<tbody>
  				  <tr>
					<td width="45%"><h5 class="pull-right text-success">Is the person submitting different from reporter?&nbsp;</h5></td>
					<td>
						<?php
								echo $this->Form->input('person_submitting', array(
									'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'person-submit',
									'before' => '<div class="form-inline">
												<input type="hidden" value="" id="SadrPersonSubmitting_" name="data[Sadr][person_submitting]">
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
                            'type' => 'select', 'options' => $designations, 'empty' => true, 'class' => 'diff',
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

			<?php echo $this->element('help/explanatory'); ?>
			

		</div> <!-- /span -->
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
					
					echo $this->Html->link('<i class="fa fa-times" aria-hidden="true"></i> Cancel', array('controller' => 'users', 'action' => 'dashboard'),
                              array('escape' => false, 'class' => 'btn btn-danger btn-block'));  
				?>
	           </div>
	        </div>
	    </div>
	</div> <!-- /row -->
    <?php echo $this->Form->end(); ?>
</section> <!-- /row -->

