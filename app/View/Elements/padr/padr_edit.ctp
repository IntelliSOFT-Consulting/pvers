<?php
	$this->assign('PADR', 'active');
	$this->Html->script('jquery/combobox', array('inline' => false));
	$this->Html->script('padr', array('inline' => false));
 ?>

      <!-- PADR
    ================================================== -->
    <section id="padrsadd">

	<?php
		echo $this->Session->flash();
		echo $this->Form->create('Padr', array(
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
		<div class="span10 pformback">

			<?php
				echo $this->Form->input('Padr.id', array());
			?>

            <div class="row-fluid">
                <div class="span12" style="text-align: center;">
                    <?php
                        echo $this->Html->image('confidence.png', array('alt' => 'COA'));
                    ?>
                </div>
            </div>

            <div style="background-color: lightseagreen;"><h5 style="text-align: center; text-decoration: underline;">REPORTER INFORMATION</h5></div>
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
                        echo $this->Form->input('relation', array(
                        	'type' => 'select', 'empty'=>true ,
                        	'label' => array('class' => 'control-label required', 'text' => 'Relation'.' <span style="color:red;">*</span>'), 
                        	'options' => array('Self' => 'Self', 'Parent' => 'Parent', 'Guardian' => 'Guardian')
                        	));
                        echo $this->Form->input('reporter_phone', array(
                            'div' => array('class' => 'control-group'),
                            'label' => array('class' => 'control-label required', 'text' => 'PHONE NO.')
                        ));
                        
                        echo $this->Form->input('county_id', array(
									'label' => array('class' => 'control-label required',
									'text' => 'COUNTY'),
									'empty' => true, 'between' => '<div class="controls ui-widget">',
								));
                    ?>
                </div><!--/span-->
            </div><!--/row-->

            <div style="background-color: lightblue;"><h5 style="text-align: center; text-decoration: underline;">PATIENT INFORMATION</h5></div>
			<div class="row-fluid">
				<div class="span6">
					<?php
						echo $this->Form->input('patient_name', array(
							'label' => array('class' => 'control-label required', 'text' =>  'PATIENT\'S INITIALS <span style="color:red;">*</span>'),
							'after'=>'<p class="help-block"> e.g E.O.O </p></div>',
							'class' => 'tooltipper',
						));
					?>
				</div><!--/span-->
				<div class="span6">
					<?php
						
						echo $this->Form->input('gender', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'gender',
							'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">GENDER <span style="color:red;">*</span></label> </div>
											<div class="controls">  <input type="hidden" value="" id="PadrGender_" name="data[Padr][gender]"> <label class="radio inline">',
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

					?>
				</div><!--/span-->
			</div><!--/row-->
			<div class="row-fluid">
				<div class="span12">					
					<div class="well">
					<div class="row-fluid">
					<div class="span6">
					<?php
						
						echo $this->Form->input('date_of_birth', array(
							'type' => 'date',
							// 'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
							'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => array('day' => '(day)', 'month' => '(month)', 'year' => '(year)'),
							'label' => array('class' => 'control-label required', 'text' => 'DATE OF BIRTH <span style="color:red;">*</span>'),
							'title'=> 'select beginning of the month if unsure', 'data-content' => 'If selected, year is mandatory.',
							'after'=>' <a style="font-weight:normal" onclick="$(\'.birthdate\').removeAttr(\'disabled\'); $(\'.birthdate\').val(\'\');
								$(\'#PadrAgeGroup\').attr(\'disabled\',\'disabled\'); $(\'#PadrAgeGroup\').val(\'\');" >
								<em class="accordion-toggle">clear!</em></a>
								<p class="help-block">	If selected, year is mandatory.  </p></div>',
							'class' => 'tooltipper span4',
						));

					?>
					</div>
					<div class="span1">
					<h5 class="text-success text-center">--OR--</h5>
					</div>
					<div class="span5">
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
							'after' => '<a onclick="$(\'#PadrAgeGroup\').removeAttr(\'disabled\'); $(\'#PadrAgeGroup\').val(\'\');
									$(\'.birthdate\').attr(\'disabled\',\'disabled\'); $(\'.birthdate\').val(\'\');" >
								<em class="accordion-toggle">clear!</em></a> </div>',
						));

					?>
					</div>
					</div>
					</div>
				</div>
			</div>

			<div style="background-color: lightpink;"><h5 style="text-align: center; text-decoration: underline;">SIDE EFFECT</h5></div>
			<div class="row-fluid">
				<div class="span6">
					<?php
						
						echo $this->Form->input('description_of_reaction', array(
							'class' => 'span11', 'rows' => '4',
							'label' => array('class' => 'control-label required', 'text' => 'Describe the reaction <span style="color:red;">*</span>'),
							'after'=>'<p class="help-block">What were the signs of the side effect?</p></div>',
						));

					?>
				</div><!--/span-->
				<div class="span6">
					<?php
						echo $this->Form->input('date_of_onset_of_reaction', array(
							'type' => 'date',
							'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => array('day' => '(day)', 'month' => '(month)', 'year' => '(year)'),
							'label' => array('class' => 'control-label required', 'text' => 'When did the reaction start?'),
							'after'=>'<p class="help-block"> When did the reaction start? </p></div>',
						));
						echo $this->Form->input('date_of_end_of_reaction', array(
							'type' => 'date',
							'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => array('day' => '(day)', 'month' => '(month)', 'year' => '(year)'),
							'label' => array('class' => 'control-label required', 'text' => 'When did the reaction end?'),
							'after'=>'<p class="help-block"> When the side effect ended (if it ended) </p></div>',
						));
					?>
				</div>
			</div><!--/row-->
			<hr>
                      
            <?php echo $this->element('multi/padr_list_of_medicines');?>

            

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

			

			

		</div> <!-- /span -->
		<div class="span2">
			<div class="my-sidebar" data-spy="affix" >
	          <div class="awell">
	            <?php
	              echo $this->Form->button('<i class="fa fa-floppy-o" aria-hidden="true"></i> Save Changes', array(
	                  'name' => 'saveChanges',
	                  'class' => 'btn btn-success mapop',
					  'formnovalidate' => 'formnovalidate',
	                  'id' => 'PadrSaveChanges', 'title'=>'Save & continue editing',
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
	                  'onclick'=>"return confirm('Are you sure you wish to submit the protocol review report?');",
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

