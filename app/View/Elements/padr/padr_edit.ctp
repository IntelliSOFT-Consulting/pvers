<?php
	$this->assign('PADR', 'active');
	$this->Html->script('jquery/combobox', array('inline' => false));
	$this->Html->script('padr', array('inline' => false));
	$this->Html->css('padr', false, array('inline' => false));
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

            <div style="background-color: lightseagreen;"><h5 style="text-align: center; text-decoration: underline;">DETAILS OF THE PERSON REPORTING</h5></div>
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
                            'label' => array('class' => 'control-label required', 'text' => 'Email Address <span style="color:red;">*</span>')
                        ));
                        
                    ?>
                </div><!--/span-->
                <div class="span6">
                    <?php
                        echo $this->Form->input('relation', array(
                        	'type' => 'select', 'empty'=>true ,
                        	'label' => array('class' => 'control-label required', 'text' => 'Relation'), 
                        	'options' => array('Self' => 'Self', 'Parent' => 'Parent', 'Guardian' => 'Guardian', 'Other' => 'Other')
                        	));
                        echo $this->Form->input('reporter_phone', array(
                            'div' => array('class' => 'control-group'),
                            'label' => array('class' => 'control-label required', 'text' => 'Mobile No.')
                        ));
                        
                        echo $this->Form->input('county_id', array(
									'label' => array('class' => 'control-label required',
									'text' => 'County <span style="color:red;">*</span>'),
									'empty' => true, 'between' => '<div class="controls ui-widget">',
								));
                    ?>
                </div><!--/span-->
            </div><!--/row-->

            <div style="background-color: lightblue;"><h5 style="text-align: center; text-decoration: underline;">DETAILS OF THE PATIENT</h5></div>
			<div class="row-fluid">
				<div class="span6">
					<?php
						echo $this->Form->input('patient_name', array(
							'label' => array('class' => 'control-label required', 'text' =>  'Patient\'s Name <span style="color:red;">*</span>'),
							// 'after'=>'<span class="muted"> or initials e.g E.O.O </span></div>',
							'placeholder' => 'Name or Initials' ,'class' => 'tooltipper',
						));
					?>
				</div><!--/span-->
				<div class="span6">
					<?php
						
						echo $this->Form->input('gender', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'gender',
							'before' => '<div class="control-group"> <div class="required"> <label class="control-label required">Gender <span style="color:red;">*</span></label> </div>
											<div class="controls">  <input type="hidden" value="" id="PadrGender_" name="data[Padr][gender]"> <label class="radio inline">',
							'after' => '</label>',
							'options' => array('Male' => 'Male'),
						));
						echo $this->Form->input('gender', array(
							'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'gender',
							'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
							'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
							'before' => '<label class="radio inline">',
							'after' => '</label>
										<a class="tooltipper" data-original-title="Clears the checked value"
										onclick="$(\'.gender\').removeAttr(\'checked disabled\')">
										<em class="accordion-toggle">clear!</em></a> 
										</div> </div>',
							'options' => array('Female' => 'Female'),
						));

					?>
				</div><!--/span-->
			</div><!--/row-->
			<div class="row-fluid">
				<div class="span7">					
					
					<?php
						
						echo $this->Form->input('date_of_birth', array(
							'type' => 'date',
							// 'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => true,
							'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => array('day' => '(day)', 'month' => '(month)', 'year' => '(year)'),
							'label' => array('class' => 'control-label required', 'text' => 'Date of Birth <span style="color:red;">*</span>'),
							'title'=> 'select beginning of the month if unsure', 'data-content' => 'If selected, year is mandatory.',
							'after'=>' <a style="font-weight:normal" onclick="$(\'.birthdate\').removeAttr(\'disabled\'); $(\'.birthdate\').val(\'\');
								$(\'#PadrAgeGroup\').attr(\'disabled\',\'disabled\'); $(\'#PadrAgeGroup\').val(\'\');" >
								<em class="accordion-toggle">clear!</em></a>
								<p class="help-block">	If selected, year is mandatory.  </p></div>',
							'class' => 'tooltipper span3',
						));

					?>
				</div>
				<div class="span5"></div>
			</div>

			<div style="background-color: lightpink;"><h5 style="text-align: center; text-decoration: underline;">SIDE EFFECT</h5></div>
			<div style="padding: 10px;">
				<div class="row-fluid">
					<div class="span4">
						<?php
							
							echo $this->Form->input('description_of_reaction', array(
								'class' => 'span11', 'rows' => '2', 'between' => false, 'div' => false,
								'label' => array('class' => 'required', 'text' => 'Describe the reaction <span style="color:red;">*</span>'),
								'after'=>'<span class="help-block">What were the signs of the side effect?</span>',
							));

						?>
					</div><!--/span-->
					<div class="span4">
						<?php
							echo $this->Form->input('date_of_onset_of_reaction', array(
								'type' => 'date', 'between' => false, 'div' => false, 'after' => false,
								'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => array('day' => '(day)', 'month' => '(month)', 'year' => '(year)'),
								'label' => array('class' => 'required', 'text' => 'When did the reaction start?'),
								'class' => 'span4',
							));
						?>
					</div>
					<div class="span4">
						<?php
							echo $this->Form->input('date_of_end_of_reaction', array(
								'type' => 'date', 'between' => false, 'div' => false, 'after' => false,
								'dateFormat' => 'DMY',   'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'empty' => array('day' => '(day)', 'month' => '(month)', 'year' => '(year)'),
								'label' => array('class' => 'required', 'text' => 'When did the reaction end? <span class="muted">(if it ended)</span>'),
								'class' => 'span4',
							));
						?>
					</div>
				</div><!--/row-->
			</div>
                      
            <?php echo $this->element('multi/padr_list_of_medicines');?>
            <?php echo $this->element('multi/attachments', ['model' => 'Padr', 'group' => 'attachment']); ?>

            <div class="row-fluid">
            	<div class="span4">            		
		            <label class="required pull-right" style="color: purple;">Please solve the riddle <i class="fa fa-smile-o" aria-hidden="true"></i></label>
            	</div>
            	<div class="span8">
            		<?php
		            	echo $this->Captcha->input('Padr', array('label' => false, 'type' => 'number'));
		            ?>
            	</div>
            </div>
            
		</div> <!-- /span -->
		<div class="span2">
			<div class="my-sidebar" data-spy="affix" >
	          <div class="awell">
	            <?php
	              echo $this->Form->button('<i class="fa fa-paper-plane-o" aria-hidden="true"></i> Submit Report', array(
	                  'name' => 'saveChanges',
	                  'class' => 'btn btn-primary mapop',
	                  'id' => 'PadrSaveChanges', 	                  
	                  'onclick'=>"return confirm('Are you sure you wish to submit the report?');",
	                  'div' => false,
	                ));
	            ?>
	            <br>
	            <hr>
	            <?php
					
					echo $this->Html->link('<i class="fa fa-times" aria-hidden="true"></i> Cancel', array('controller' => 'pages', 'action' => 'home'),
                              array('escape' => false, 'class' => 'btn btn-block btn-danger'));  
				?>
	           </div>
	        </div>
	    </div>
	</div> <!-- /row -->
    <?php echo $this->Form->end(); ?>
</section> <!-- /row -->

