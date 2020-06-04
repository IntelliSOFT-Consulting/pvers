<?php 
	$this->start('banner');
?>
<div id="subheader">
	<div class="inner">
		<div class="container">
			<h1>Suspected Adverse Drug Report NO : <?php echo $this->data['Sadr']['id'] ?></h1>
		</div> <!-- /.container -->
	</div> <!-- /inner -->
</div> <!-- /subheader -->
<?php
	$this->end(); 
	$this->assign('Home', 'active');
 ?>


<div class="row">
		
	<div class="span12">
			
		<?php	
			//echo $this->element('banner');

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
			echo $this->fetch('form.id'); 
			// pr( $this->validationErrors);
			// pr( $this->data['Attachment']);
		?>
		
		<div class="row-fluid">
			<div class="span8">
			<?php
				echo $this->Form->input('report_title', array(
					'label' => array('class' => 'control-label required', 'text' => 'REPORT TITLE'),
					'class' => 'span9'));
			 ?>
			</div>
			<div class="span4">
			  <h2>Form ID: <?php 	echo $this->data['Sadr']['id']; ?></h2>
			  <h6><span class="label label-important">Important</span> Unique Form ID</h6>		  
			</div>
		</div><!--/row-->
		 <hr>	
		<div class="row-fluid">
			<div class="span6">	
				<?php
					echo $this->Form->input('report_type', array(
						'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'report_type',
						'before' => '<div class="control-group"> <label class="control-label"> </label>
										<div class="controls"> <input type="hidden" value="" id="SadrReportType_" name="data[Sadr][report_type]"> <label class="radio">',
						'after' => '</label>',
						'options' => array('Initial Report' => 'Initial Report'),
					));
					echo $this->Form->input('report_type', array(
						'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'report_type',
						'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
						'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
						'before' => '<label class="radio">',
						'after' => '</label> 
									<a class="tooltipper" data-original-title="Clears the checked value"
									onclick="$(\'.report_type\').removeAttr(\'checked disabled\')">
									<em>clear</em></a>
									</div> </div>',	
						'options' => array('Follow-up Report' => 'Follow-up Report'),
					));
				?>
			</div><!--/span-->
			<div class="span6">
				<?
					echo $this->Form->input('county_id', array('label' => array('class' => 'control-label required', 'text' => 'COUNTY'), ));
				?>
			</div><!--/span-->
		</div><!--/row-->
		 <hr>

		<div class="row-fluid">
			<div class="span6">
				<?php
					echo $this->Form->input('name_of_institution', array('label' => array('class' => 'control-label', 'text' => 'NAME OF INSTITUTION'),));
					echo $this->Form->input('address', array('label' => array('class' => 'control-label', 'text' => 'ADDRESS'),));			
				?>
			</div><!--/span-->
			<div class="span6">
				<?php
					echo $this->Form->input('institution_code', array('label' => array('class' => 'control-label', 'text' => 'INSTITUTION CODE'), ));
					echo $this->Form->input('contact', array('label' => array('class' => 'control-label', 'text' => 'CONTACT'), ));
				?>
			</div><!--/span-->
		</div><!--/row-->
		 <hr>
		
		<div class="row-fluid">
			<div class="span6">
				<?php
					echo $this->Form->input('patient_name', array('label' => array('class' => 'control-label required', 'text' => 'PATIENT\'S INITIALS'), ));
				?>
				<div class="well-mine">
				<?php
					echo $this->Form->input('date_of_birth', array(
												'type' => 'text', 
												'label' => array('class' => 'control-label required', 'text' => 'DATE OF BIRTH'),
												'after'=>'<p class="help-block">	Date format dd-mm-yyyy e.g (18-05-2012) </p></div>'
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
					));
				
				?>
				</div>
				<?php
					
					echo $this->Form->input('ward', array('label' => array('class' => 'control-label required', 'text' => 'WARD / CLINIC'), 
															'after'=>'<p class="help-block">	(Name/ Number) </p></div>'));
					
					echo $this->Form->input('known_allergy', array(
						'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'known_allergy',
						'before' => '<div class="control-group">  <div class="required">  <label class="control-label required">ANY KNOWN ALLERGY</label> </div>
										<div class="controls"> <input type="hidden" value="" id="SadrKnownAllergy_" name="data[Sadr][known_allergy]"> <label class="radio">',
						'after' => '</label>',
						'options' => array('No' => 'No'),
						'onclick' => '$("#SadrKnownAllergySpecify").attr("disabled","disabled")',
					));				
					echo $this->Form->input('known_allergy', array(
						'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'known_allergy',
						'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
						'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
						'before' => '<label class="radio">', 
						'after' => '</label> <a class="button" 
									onclick="$(\'.known_allergy\').removeAttr(\'checked\'); $(\'#SadrKnownAllergySpecify\').attr(\'disabled\',\'disabled\');" >										
									<em>clear</em></a> </div> </div>',	
						'options' => array('yes' => 'yes'),
						'onclick' => '$("#SadrKnownAllergySpecify").removeAttr("disabled")',
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
					echo $this->Form->input('ip_no', array('label' => array('class' => 'control-label', 'text' => 'IP/OP. NO.'), ));
					echo $this->Form->input('patient_address', array('label' => array('class' => 'control-label required', 'text' => 'PATIENT\'S ADDRESS'), ));		
					
					echo $this->Form->input('gender', array(
						'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'gender',
						'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">GENDER</label> </div>
										<div class="controls">  <input type="hidden" value="" id="SadrGender_" name="data[Sadr][gender]"> <label class="radio">',
						'after' => '</label>',
						'options' => array('Male' => 'Male'),
					));
					echo $this->Form->input('gender', array(
						'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'gender',
						'before' => '<label class="radio">',	'after' => '</label>',	
						'options' => array('Female' => 'Female'),
					));
					echo $this->Form->input('gender', array(
						'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'gender',
						'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
						'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
						'before' => '<label class="radio">', 
						'after' => '</label> 
									<a class="tooltipper" data-original-title="Clears the checked value"
									onclick="$(\'.gender, #pregnancy_stati :input\').removeAttr(\'checked disabled\')">
									<em>clear</em></a> 
									</div> </div>',	
						'options' => array('Unknown' => 'Unknown'),
					));
					
					echo $this->Form->input('pregnancy_status', array(
						'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnancy_status',
						'before' => '<div class="control-group"> <label class="control-label">PREGNANCY STATUS</label>
										<div class="controls" id="pregnancy_stati">  <input type="hidden" value="" id="SadrPregnancyStatus_" name="data[Sadr][pregnancy_status]"> <label class="radio">',
						'after' => '</label>',
						'options' => array('Not Applicable' => 'Not Applicable'),
					));								
					echo $this->Form->input('pregnancy_status', array(
						'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnancy_status',
						'before' => '<label class="radio">',	'after' => '</label>',	
						'options' => array('Not Pregnant' => 'Not Pregnant'),
					));
					echo $this->Form->input('pregnancy_status', array(
						'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnancy_status',
						'before' => '<label class="radio">',	'after' => '</label>',	
						'options' => array('1st Trimester' => '1st Trimester'),
					));				
					echo $this->Form->input('pregnancy_status', array(
						'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnancy_status',
						'before' => '<label class="radio">',	'after' => '</label>',
						'options' => array('2nd Trimester' => '2nd Trimester'),
					));
					echo $this->Form->input('pregnancy_status', array(
						'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'pregnancy_status',
						'before' => '<label class="radio">',
						'after' => '</label> 
						<a class="button" 
									onclick="$(\'.pregnancy_status\').removeAttr(\'checked\')" >										
									<em>clear</em></a> 
						</div> </div>',	
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
			
		<div class="row-fluid">
			<div class="span12">
				<?php
					echo $this->Form->input('diagnosis', array('class' => 'span8', 'rows' => '3', 
																'label' => array('class' => 'control-label required', 'text' => 'DIAGNOSIS'),
																'after'=>'<p class="help-block"> (What was the patient treated for) </p></div>',
																));
					
					
					echo $this->Form->input('description_of_reaction', array('class' => 'span8',  'rows' => '3', 'label' => array('class' => 'control-label required',
																				'text' => 'BRIEF DESCRIPTION OF REACTION')));	
					
					echo $this->Form->input('date_of_onset_of_reaction', array('type' => 'text', 
												'label' => array('class' => 'control-label required', 'text' => 'DATE OF ONSET OF REACTION'),
												'after'=>'<p class="help-block">	Date format dd-mm-yyyy e.g (18-05-2012) </p></div>'
					));
																
					echo $this->Ajax->datepicker('SadrDateOfOnsetOfReaction', array(
						'minDate' => '"-70Y"', 
						'defaultDate' => '"-1D"',
						'maxDate' => '"-0D"',
						'dateFormat' => 'dd-mm-yy',
						'showButtonPanel' => true,
						'changeMonth' => true,
						'changeYear' => true,
						'showAnim' => 'show',
						'buttonImageOnly' => true,
						'showOn' => 'both',
						'buttonImage' => '/pv/img/calendar.gif'
					));
				?>
			</div><!--/span-->
		</div><!--/row-->
		
		<?php echo $this->element('multi/list_of_drugs'); ?>
				  
		<div class="row-fluid">
			<div class="span3">
				<h5>SEVERITY OF THE REACTION:</h5>		
				<?php
					echo $this->Html->link('Refer to scale overleaf', '#collapseOne', 
											 array('class' => 'accordion-toggle', 'data-toggle'=>"collapse", 'data-parent'=>'#accordion1',
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
									<em>clear</em></a> 
						</div>',	
						'options' => array('Unknown' => 'Unknown'),
					));
					
				?>
			</div><!--/span-->
			<div class="span2">
				<div class="required"><label class="required"><strong>ACTION TAKEN:</strong></label></div>	<br/>	
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
									<em>clear</em></a> 
						</div>',	
						'options' => array('Unknown' => 'Unknown'),
					));
		
				?>
			</div><!--/span-->
			<div class="span4">
				<h5>OUTCOME:</h5>	<br>
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
									<em>clear</em></a> 
						</div>',	
						'options' => array('Unknown' => 'Unknown'),
					));				
				?>
			</div><!--/span-->
			<div class="span3">
				<h5>CAUSALITY OF THE REACTION:</h5>		
				<?php				
					echo $this->Html->link('Refer to scale overleaf', '#collapseTwo', 
												 array('class' => 'accordion-toggle', 'data-toggle'=>"collapse", 'data-parent'=>'#accordion1'));
												 
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
									<em>clear</em></a> 
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
					echo $this->Form->input('any_other_comment', array('class' => 'span8',  'rows' => '3', 'label' => array('class' => 'control-label',
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
						'label' => array('class' => 'control-label required', 'text' => 'NAME OF PERSON REPORTING')
					));
					echo $this->Form->input('reporter_email', array(
						'type' => 'email', 
						'div' => array('class' => 'control-group required'),
						'label' => array('class' => 'control-label required', 'text' => 'E-MAIL ADDRESS')
					));
					
				?>
			</div><!--/span-->
			<div class="span6">
				<?php
					// echo $this->Form->input('reporter_designation', array(
						// 'type' => 'select', 
						// 'empty' => true, 
						// 'options' => array('health worker' => 'health worker'),
						// 'div' => array('class' => 'control-group'),
						// 'label' => array('class' => 'control-label', 'text' => 'DESIGNATION')
					// ));		
					echo $this->Form->input('designation_id', array('label' => array('class' => 'control-label required', 'text' => 'DESIGNATION'), ));
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
						echo $this->Form->button('Submit', array(
								'name' => 'submitReport',
								'class' => 'btn btn-success mapop',
								'id' => 'SadrSubmitReport', 'title'=>'Submit form to PPB', 
								'data-content' => 'Submit form to PPB.',
								'div' => false,
							));

					?>
				</div>
				<div class="span4">
					<?php
						echo $this->Form->button('Cancel', array(
								'name' => 'cancelReport',
								'onclick'=>"return confirm('Are you sure you wish to delete this form? You will not be able to edit it later.');",
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
	</div>

<?php echo $this->fetch('content'); ?>
</div> <!-- /row -->
