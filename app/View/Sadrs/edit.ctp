<?php
	$this->assign('SADR', 'active');
	// $this->Html->script('jquery.ui.core', array('inline' => false));
	// $this->Html->script('jquery.ui.widget', array('inline' => false));
	// $this->Html->script('jquery.ui.mouse', array('inline' => false));
	// $this->Html->script('jquery.ui.draggable', array('inline' => false));
	// $this->Html->script('jquery.ui.button', array('inline' => false));
	// $this->Html->script('jquery.ui.position', array('inline' => false));
	// $this->Html->script('jquery.ui.autocomplete', array('inline' => false));
	// $this->Html->script('jquery.ui.dialog', array('inline' => false));
	// $this->Html->script('widgets', array('inline' => false));
	// $this->Html->script('sadr', array('inline' => false));
	$this->AssetCompress->addScript(array(
			'jquery.ui.core.js', 'jquery.ui.widget.js', 'jquery.ui.mouse.js', 'jquery.ui.draggable.js', 'jquery.ui.button.js',
			'jquery.ui.position.js', 'jquery.ui.autocomplete.js', 'jquery.ui.dialog.js', 'widgets.js', 'sadr.js'), 'sadr-edit.js'
	);
 ?>

      <!-- SADR
    ================================================== -->
    <section id="sadrsadd">
	<div class="row-fluid">
		<div class="span12">

		<ul class="nav nav-tabs">
			<li class="active"><a href="#" id="sadr_edit_tab1"><?php 	echo $help_infos['sadr_edit_tab1']['content'].' '.$this->data['Sadr']['id']; ?></a></li>
			<li id="sadr_edit_tab2"><?php 	echo $this->Html->link($help_infos['sadr_edit_tab2']['content'].'('.$followups.')', array('controller' => 'sadr_followups', 'action' => 'sadrIndex', $this->data['Sadr']['id'])); ?></li>
		</ul>

			<?php
				echo $this->Session->flash();
				echo $this->Form->create('Sadr', array(
					'type' => 'file',
					'class' => 'well form-horizontal formback',
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

			<?php
				echo $this->Form->input('Sadr.id', array());
				echo $this->Form->input('Sadr.report_type', array('type' => 'hidden'));
			?>

			<div class="row-fluid">
				<div class="span12">
					<?php
						echo $this->Html->image('sadr_header.gif', array('alt' => 'SADR'));
					?>
				</div>
			</div><br>
			<div class="row-fluid">
				<div class="span8">
				<p class="controls" id="sadr_edit_tip">	<?php echo $help_infos['sadr_edit_tip']['content']; ?></p>
				<?php
					echo $this->Form->input('report_title', array(
						'label' => array('class' => 'control-label required', 'text' => $help_infos['SadrReportTitle']['field_label'].' <span style="color:red;">*</span>'),
						'placeholder' => $help_infos['SadrReportTitle']['place_holder'] , 'title'=>$help_infos['SadrReportTitle']['title'],
						'data-content' => $help_infos['SadrReportTitle']['content'],
						'after'=>'<p class="help-block">	'.$help_infos['SadrReportTitle']['help_text'].' </p></div>',
						'class' => 'span9 '.$help_infos['SadrReportTitle']['help_type'].'',
					));
				 ?>
				</div>
				<div class="span4" id="sadr_edit_form_id">
				  <h2> <?php 	echo  $help_infos['sadr_edit_form_id']['title'].' '.$this->data['Sadr']['id']; ?></h2>
				  <?php echo $help_infos['sadr_edit_form_id']['content']; ?>
				</div>
			</div><!--/row-->
			 <hr>

			<div class="row-fluid">
				<div class="span6">
					<?php
						echo $this->Form->input('name_of_institution', array(
							'label' => array('class' => 'control-label', 'text' => $help_infos['SadrNameOfInstitution']['field_label']),
							'placeholder' => $help_infos['SadrNameOfInstitution']['place_holder'] ,
							'title'=>$help_infos['SadrNameOfInstitution']['title'], 'data-content' => $help_infos['SadrNameOfInstitution']['content'],
							'after'=>'<p class="help-block">	'.$help_infos['SadrNameOfInstitution']['help_text'].' </p></div>',
							'class' => $help_infos['SadrNameOfInstitution']['help_type'].'',
						));

						echo $this->Form->input('address', array(
							'label' => array('class' => 'control-label', 'text' => $help_infos['address']['field_label']),
							'placeholder' => $help_infos['address']['place_holder'] ,
							'title'=>$help_infos['address']['title'], 'data-content' => $help_infos['address']['content'],
							'after'=>'<p class="help-block">	'.$help_infos['address']['help_text'].' </p></div>',
							'class' => $help_infos['address']['help_type'].'',
						));

					?>
				</div><!--/span-->
				<div class="span6">
					<?php

						echo $this->Form->input('county_id', array(
									'label' => array('class' => 'control-label required',
									'text' => $help_infos['sadr_county_id']['field_label'].' <span style="color:red;">*</span>'),
									'empty' => true, 'between' => '<div class="controls ui-widget">',
								));
						echo $this->Form->input('sub_county_id', array(
							        'options' => $sub_counties,
									'label' => array('class' => 'control-label'),
									'empty' => true, 'between' => '<div class="controls ui-widget">',
								));
						// print_r($sub_counties);
						echo $this->Form->input('institution_code', array('label' => array('class' => 'control-label',
									'text' => $help_infos['institution_code']['field_label']), ));
						echo $this->Form->input('contact', array('label' => array('class' => 'control-label', 'text' => $help_infos['sadr_contact']['field_label']), ));
					?>
				</div><!--/span-->
			</div><!--/row-->
			 <hr>

			<div class="row-fluid">
				<div class="span6">
					<?php
						echo $this->Form->input('patient_name', array(
							'label' => array('class' => 'control-label required', 'text' =>  $help_infos['patient_name']['field_label'].' <span style="color:red;">*</span>'),
							'title'=>$help_infos['patient_name']['title'], 'data-content' => $help_infos['patient_name']['content'],
							'after'=>'<p class="help-block">	'.$help_infos['patient_name']['help_text'].' </p></div>',
							'class' => $help_infos['patient_name']['help_type'].'',
						));
						echo $this->Form->input('ip_no', array('label' => array('class' => 'control-label', 'text' => $help_infos['ip_no']['field_label']), ));
					?>
					<div class="well-mine">
					<?php
						// echo $this->Form->input('date_of_birth', array(
							// 'type' => 'text',
							// 'label' => array('class' => 'control-label required', 'text' => $help_infos['date_of_birth']['field_label'].' <span style="color:red;">*</span>'),
							// 'title'=>$help_infos['date_of_birth']['title'], 'data-content' => $help_infos['date_of_birth']['content'],
							// 'after'=>' <a style="font-weight:normal" onclick="$(\'#SadrDateOfBirth\').removeAttr(\'disabled\'); $(\'#SadrDateOfBirth\').val(\'\');
								// $(\'#SadrAgeGroup\').attr(\'disabled\',\'disabled\'); $(\'#SadrAgeGroup\').val(\'\');" >
							// <em class="accordion-toggle">clear!</em></a>
							// <p class="help-block">	'.$help_infos['date_of_birth']['help_text'].' </p></div>',
							// 'class' => $help_infos['date_of_birth']['help_type'].'',
						// ));

						echo $this->Form->input('date_of_birth', array(
							'type' => 'date',
							'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
							'label' => array('class' => 'control-label required', 'text' => $help_infos['date_of_birth']['field_label'].' <span style="color:red;">*</span>'),
							'title'=>$help_infos['date_of_birth']['title'], 'data-content' => $help_infos['date_of_birth']['content'],
							'after'=>' <a style="font-weight:normal" onclick="$(\'.birthdate\').removeAttr(\'disabled\'); $(\'.birthdate\').val(\'\');
								$(\'#SadrAgeGroup\').attr(\'disabled\',\'disabled\'); $(\'#SadrAgeGroup\').val(\'\');" >
								<em class="accordion-toggle">clear!</em></a>
								<p class="help-block">	'.$help_infos['date_of_birth']['help_text'].' </p></div>',
							'class' => $help_infos['date_of_birth']['help_type'].' birthdate autosave-ignore ',
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
							'label' => array('class' => 'control-label required', 'text' => $help_infos['age_group']['field_label']),
							'after' => '<a onclick="$(\'#SadrAgeGroup\').removeAttr(\'disabled\'); $(\'#SadrAgeGroup\').val(\'\');
									$(\'.birthdate\').attr(\'disabled\',\'disabled\'); $(\'.birthdate\').val(\'\');" >
								<em class="accordion-toggle">clear!</em></a> </div>',
						));

					?>
					</div>
					<?php

						echo $this->Form->input('known_allergy', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'known_allergy',
							'before' => '<div class="control-group">  <div>  <label class="control-label required">'.$help_infos['known_allergy']['field_label'].'</label> </div>
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
						echo $this->Form->input('ward', array('label' => array('class' => 'control-label required', 'text' => $help_infos['ward']['field_label']),
																'after'=>'<p class="help-block">	'.$help_infos['ward']['field_label'].' </p></div>'));
						echo $this->Form->input('patient_address', array(
							'label' => array('class' => 'control-label required', 'text' => $help_infos['patient_address']['field_label'].' '),
							'title'=>$help_infos['patient_address']['title'], 'data-content' => $help_infos['patient_address']['content'],
							'after'=>'<p class="help-block">	'.$help_infos['patient_address']['help_text'].' </p></div>',
							'class' => $help_infos['patient_address']['help_type'].'',
						));

						echo $this->Form->input('gender', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'gender',
							'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">SEX <span style="color:red;">*</span></label> </div>
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

						echo $this->Form->input('pregnant', array(
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
						echo $this->Form->input('diagnosis', array('class' => 'span8', 'rows' => '2',
																	'label' => array('class' => 'control-label required', 'text' => 'DIAGNOSIS'),
																	'after'=>'<p class="help-block"> (What was the patient treated for) </p></div>',
																	));


						echo $this->Form->input('description_of_reaction', array(
							'rows' => '2',
							'label' => array('class' => 'control-label required', 'text' => $help_infos['description_of_reaction']['field_label'].' <span style="color:red;">*</span>'),
							'title'=>$help_infos['description_of_reaction']['title'], 'data-content' => $help_infos['description_of_reaction']['content'],
							'after'=>'<p class="help-block">	'.$help_infos['description_of_reaction']['help_text'].' </p></div>',
							'class' => 'span8 '.$help_infos['description_of_reaction']['help_type'].'',

						));

						echo $this->Form->input('date_of_onset_of_reaction', array(
							'type' => 'date',
							'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
							'label' => array('class' => 'control-label required', 'text' => $help_infos['date_of_onset_of_reaction']['field_label'].' <span style="color:red;">*</span>'),
							'title'=>$help_infos['date_of_onset_of_reaction']['title'], 'data-content' => $help_infos['date_of_onset_of_reaction']['content'],
							'after'=>'<p class="help-block">	'.$help_infos['date_of_onset_of_reaction']['help_text'].' </p></div>',
							'class' => $help_infos['date_of_onset_of_reaction']['help_type'].' cakedate autosave-ignore ',
						));

					?>
				</div><!--/span-->
			</div><!--/row-->
			<hr>
			<?php echo $this->element('multi/list_of_drugs');?>

			<div class="row-fluid">
				<div class="span3">
					<h5>SEVERITY OF THE REACTION:</h5>
					<?php
						echo $this->Html->link('Click to view Severity scale below', '#assessment1',
												 array(	'class' => 'tooltipper', 'onclick' => '$("#assessment1").click()',
														'id' => 'SadrSeverityT', 'title'=>'Click here to expand content below'));

						echo $this->Form->input('severity', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'severity',
							'before' => '<div class="control-group"> <input type="hidden" value="" id="SadrSeverity_" name="data[Sadr][severity]">
										 <label class="radio">',
							'after' => '</label>',
							'options' => array('Mild' => 'Mild'),
						));
						echo $this->Form->input('severity', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'severity',
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Moderate' => 'Moderate'),
						));
						echo $this->Form->input('severity', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'severity',
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Severe' => 'Severe'),
						));
						echo $this->Form->input('severity', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'severity',
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Fatal' => 'Fatal'),
						));
						echo $this->Form->input('severity', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'severity',
							'format' => array('before', 'label', 'between', 'input','error', 'after'),
							'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
							'before' => '<label class="radio">',
							'after' => '</label>
								<a class="button"
										onclick="$(\'.severity\').removeAttr(\'checked\');" >
										<em class="accordion-toggle">clear!</em></a>
							</div>',
							'options' => array('Unknown' => 'Unknown'),
						));

					?>
				</div><!--/span-->
				<div class="span2">
					<div class="required"><label class="required"><strong>ACTION TAKEN:</strong><span style="color:red;">*</span></label></div>	<br/>
					<?php
						echo $this->Form->input('action_taken', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'action_taken',
							'before' => '<div class="control-group"> <input type="hidden" value="" id="SadrActionTaken_" name="data[Sadr][action_taken]"> <label class="radio">',
							'after' => '</label>',
							'options' => array('Drug withdrawn' => 'Drug withdrawn'),
						));
						echo $this->Form->input('action_taken', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'action_taken',
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Dose increased' => 'Dose increased'),
						));
						echo $this->Form->input('action_taken', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'action_taken',
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Dose reduced' => 'Dose reduced'),
						));
						echo $this->Form->input('action_taken', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'action_taken',
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Dose not changed' => 'Dose not changed'),
						));
						echo $this->Form->input('action_taken', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'action_taken',
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Not applicable' => 'Not applicable'),
						));
						echo $this->Form->input('action_taken', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'action_taken',
							'format' => array('before', 'label', 'between', 'input','error', 'after'),
							'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
							'before' => '<label class="radio">',
							'after' => '</label>
								<a class="button"
										onclick="$(\'.action_taken\').removeAttr(\'checked\');" >
										<em class="accordion-toggle">clear!</em></a>
							</div>',
							'options' => array('Unknown' => 'Unknown'),
						));

					?>
				</div><!--/span-->
				<div class="span4">
					<div class="required"><label class="required"><strong>OUTCOME:</strong><span style="color:red;">*</span></label></div>	<br/>
					<!-- <h5>OUTCOME:</h5>	<br> -->
					<?php
						echo $this->Form->input('outcome', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
							'before' => '<div class="control-group"> <input type="hidden" value="" id="SadrOutcome_" name="data[Sadr][outcome]"> <label class="radio">',
							'after' => '</label>',
							'options' => array('recovered/resolved' => 'Recovered/resolved'),
						));
						echo $this->Form->input('outcome', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('recovering/resolving' => 'Recovering/resolving'),
						));
						echo $this->Form->input('outcome', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('recovered/resolved with sequelae' => 'Recovered/resolved with sequelae'),
						));
						echo $this->Form->input('outcome', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('not recovered/not resolved' => 'Not recovered/not resolved'),
						));
						echo $this->Form->input('outcome', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('fatal - unrelated to reaction' => 'Fatal - unrelated to reaction'),
						));
						echo $this->Form->input('outcome', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('fatal - reaction may be contributory' => 'Fatal - reaction may be contributory'),
						));
						echo $this->Form->input('outcome', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('fatal - due to reaction' => 'Fatal - due to reaction'),
						));
						echo $this->Form->input('outcome', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'outcome',
							'format' => array('before', 'label', 'between', 'input','error', 'after'),
							'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
							'before' => '<label class="radio">',
							'after' => '</label>
								<a class="button"
										onclick="$(\'.outcome\').removeAttr(\'checked\');" >
										<em class="accordion-toggle">clear!</em></a>
							</div>',
							'options' => array('Unknown' => 'Unknown'),
						));
					?>
				</div><!--/span-->
				<div class="span3">
					<h5>CAUSALITY OF THE REACTION:</h5>
					<?php
						echo $this->Html->link('Click to view causality Scale below', '#assessment2',
													 array(	'class' => 'tooltipper', 'onclick' => '$("#assessment2").click()',));

						echo $this->Form->input('causality', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'causality',
							'before' => '<div class="control-group"> <input type="hidden" value="" id="SadrCausality_" name="data[Sadr][causality]"> <label class="radio">',
							'after' => '</label>',
							'options' => array('Certain' => 'Certain'),
						));
						echo $this->Form->input('causality', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'causality',
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Probable / Likely' => 'Probable / Likely'),
						));
						echo $this->Form->input('causality', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'causality',
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Possible' => 'Possible'),
						));
						echo $this->Form->input('causality', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'causality',
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Unlikely' => 'Unlikely'),
						));
						echo $this->Form->input('causality', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'causality',
							'before' => '<label class="radio">',	'after' => '</label>',
							'options' => array('Conditional / Unclassified' => 'Conditional / Unclassified'),
						));
						echo $this->Form->input('causality', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'causality',
							'format' => array('before', 'label', 'between', 'input','error', 'after'),
							'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
							'before' => '<label class="radio">',
							'after' => '</label>
								<a class="button"
										onclick="$(\'.causality\').removeAttr(\'checked\');" >
										<em class="accordion-toggle">clear!</em></a>
							</div>',
							'options' => array('Unassessable / Unclassifiable' => 'Unassessable / Unclassifiable'),
						));

					?>
				</div><!--/span-->
			</div><!--/row-->

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

			<?php echo $this->element('multi/attachments'); ?>

			<div class="row-fluid">
				<div class="span6">
					<?php
						echo $this->Form->input('reporter_name', array(
							'div' => array('class' => 'control-group required'),
							'label' => array('class' => 'control-label required', 'text' => $help_infos['reporter_name']['field_label'].' <span style="color:red;">*</span>'),
							'title'=>$help_infos['reporter_name']['title'], 'data-content' => $help_infos['reporter_name']['content'],
							'after'=>'<p class="help-block"> '.$help_infos['reporter_name']['help_text'].' </p></div>',
							'class' => $help_infos['reporter_name']['help_type'].''
						));
						echo $this->Form->input('reporter_email', array(
							'type' => 'email',
							'div' => array('class' => 'control-group required'),
							'label' => array('class' => 'control-label required', 'text' => $help_infos['reporter_email']['field_label'].' <span style="color:red;">*</span>'),
							'title'=>$help_infos['reporter_email']['title'], 'data-content' => $help_infos['reporter_email']['content'],
							'after'=>'<p class="help-block"> '.$help_infos['reporter_email']['help_text'].' </p></div>',
							'class' => $help_infos['reporter_email']['help_type'].''
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
									'onclick' => '$(\'#SadrEditForm\').validate().cancelSubmit = true;',
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
									'data-content' => 'Save the report and submit it to the Pharmacy and Poisons Board. You will also get a copy of this report.',
									'div' => false,
								));

						?>
					</div>
					<div class="span4">
						<?php
							echo $this->Form->button('Cancel', array(
									'name' => 'cancelReport',
									'class' => 'btn mapop',
									'id' => 'SadrCancelReport', 'title'=>'Cancel form',
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

			<!-- <div id="dialog-confirm" title="Form validation Errors!">
				<p><i class="icon-exclamation-sign" style="float:left; margin:0 7px 20px 0;"></i>
					Could not successfully submit form. Please review the fields marked in <code>red</code>.
					<div class="error"><span></span></div> </p>
			</div>

			<div id="dialog-savesubmit" title="Save and submit report!">
				<p><i class="icon-exclamation-sign" style="float:left; margin:0 7px 20px 0;"></i>
					Are you sure you wish to submit the form to PPB? You will <span class="label label-important">NOT</span> be able to edit it later.</p>
			</div> -->

		</div> <!-- /span -->
	</div> <!-- /row -->
</section> <!-- /row -->

<script type="text/javascript">
			var myarray = <?php echo json_encode($this->validationErrors); ?>;
			$(function() {
				if($(".alert-info:contains('saved')").length > 0) {
					$('<div></div>').appendTo('body')
					  .html('<div> <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Report successfully saved. Please submit the report to PPB if you have completed it.</p></div>')
					  .dialog({
					      modal: true, title: 'message', zIndex: 10000, autoOpen: true,
					      width: 'auto', resizable: false,
					      buttons: {
					          "Submit to PPB": function () {
					              // doFunctionForYes();
					              $('#SadrEditForm').append($('<input type="text" id="submitReport" value="1" name="submitReport">'));
					              $('#SadrEditForm').submit();
					              // $('#SadrSaveChanges').trigger('click');
					              $(this).dialog("close");
					          },
					          "Continue Editing": function () {
					              // doFunctionForNo();
					              $(".alert-info:contains('saved')").slideUp();
					              $(this).dialog("close");
					          }
					      },
					      close: function (event, ui) {
					          $(this).remove();
					      }
					  });
				}
			});
		</script>
