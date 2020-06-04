<?php 
	$this->assign('SADR', 'active'); 
	$this->Html->script('bootstrap-tab', array('inline' => false));
	$this->Html->script('jqprint.0.3', array('inline' => false));
 ?>

  <!-- FOLLOW UPS EDIT
================================================== -->
<section id="followupsedit">  
	<div class="row-fluid">
	<div class="span12">		
	<?php	
		echo $this->Session->flash(); 
		// pr($this->validationErrors);
		?>

	
		<div class="page-header">
				<div class="styled_title"><h2>FOLLOW UP REPORT </h2></div>
		  <p>To view the initial report click on the next tab labeled <span class="label label-info">Initial Report</span> </p>
		</div>		
			  <div class="tab-pane active" id="tab1">
				<p>Follow up report contents.</p>
				
				<!-- REAL SADR FOLLOW UP FORM-->
				<?php 		
					echo $this->Form->create('SadrFollowup', array(
							'type' => 'file',
							'class' => ' form-horizontal well formback',
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
					echo $this->Form->input('id');
					
				?><br>
				<div class="row-fluid">
					<div class="span12">						
						<?php
							echo $this->Form->input('description_of_reaction', array('class' => 'span8',  'rows' => '3', 'label' => array('class' => 'control-label required',
																	'text' => 'FOLLOW UP BRIEF DESCRIPTION OF REACTION: <span style="color:red;">*</span>')));	
							
						?>						
					</div><!--/span-->
				</div><!--/row-->
				<div class="row-fluid">
					<div class="span6">
						<?php
							echo $this->Form->input('reporter_email', array(
								'type' => 'email', 
								'div' => array('class' => 'control-group required'),
								'label' => array('class' => 'control-label required', 'text' => 'Reporter Email <span style="color:red;">*</span>'),
								'after'=>'<p class="help-block">  </p></div>',
								'class' => ''
							));
							
						?>
					</div><!--/span-->
					<div class="span6">
						<?php
							echo $this->Form->input('sadr_id', array( 'value' => 325167));
							
						?>
					</div><!--/span-->
				</div><!--/span-->
				<hr>
				<?php echo $this->element('multi/list_of_drugs');?>
				<div class="row-fluid">					
					<div class="span12">
						<h5>OUTCOME:</h5>	<br>							
						<?php
							echo $this->Form->input('outcome', array(
								'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
								'before' => '<div class="control-group"> <input type="hidden" value="" id="SadrFollowupOutcome_" name="data[SadrFollowup][outcome]"> <label class="radio inline">',
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
								'options' => array('fatal - unrelated to reaction' => 'Fatal - unrelated to reaction'),
							));
							echo $this->Form->input('outcome', array(
								'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
								'before' => '<label class="radio inline">',	'after' => '</label>',
								'options' => array('fatal - reaction may be contributory' => 'Fatal - reaction may be contributory'),
							));
							echo $this->Form->input('outcome', array(
								'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'error' => false, 'class' => 'outcome',
								'before' => '<label class="radio inline">',	'after' => '</label>',
								'options' => array('fatal - due to reaction' => 'Fatal - due to reaction'),
							));
							echo $this->Form->input('outcome', array(
								'type' => 'radio',	'label' => false, 'legend' => false, 'div' => false, 'hiddenField' => false, 'class' => 'outcome',
								'format' => array('before', 'label', 'between', 'input','error', 'after'),
								'error' => array('attributes' => array('wrap' => 'p', 'class' => 'required error')),
								'before' => '<label class="radio inline">',
								'after' => '</label> 
									<a class="button" 
											onclick="$(\'.outcome\').removeAttr(\'checked\');" >										
											<em>clear</em></a> 
								</div>',	
								'options' => array('Unknown' => 'Unknown'),
							));				
							
						?>
					</div><!--/span-->
				</div><!--/row-->
				<hr>
				<?php echo $this->element('multi/attachments'); ?>
				
				<div class="form-actions">
					<div class="row-fluid">
							<div class="span6">
								<?php
									echo $this->Form->button('Save and Submit', array(
											'name' => 'submitReport',
											'onclick'=>"return confirm('Are you sure you wish to submit the form to PPB? You will not be able to edit it later.');",
											'class' => 'btn btn-primary mapop',
											'id' => 'SadrSubmitReport', 'title'=>'Submit form to PPB', 
											'data-content' => 'Submit form to PPB.',
											'div' => false,
										));

								?>
							</div>
							<div class="span6">
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
				<!-- REAL SADR FOLLOW UP FORM-->				
				
				
			  </div>
			</div>
	</div>
</section>