<?php 
	$this->assign('REPORTS', 'active'); 
	$this->Html->script('bootstrap-tab', array('inline' => false));
	$this->Html->script('jqprint.0.3', array('inline' => false));
 ?>

  <!-- FOLLOW UPS EDIT
================================================== -->
<section id="followupsedit">  
	<div class="row-fluid">
	<div class="span12">		
	<?php	echo $this->Session->flash(); ?>

	
		<div class="page-header">
				<div class="styled_title"><h2>FOLLOW UP REPORT NO : <?php echo $this->data['SadrFollowup']['id'] ?></h2></div>
		  <p>To view the initial report click on the next tab labeled <span class="label label-info">Initial Report</span> </p>
		</div>		
		  <div class="tabbable" style="margin-bottom: 18px;">
			<ul class="nav nav-tabs">
			  <li>
				<?php 
					echo $this->Html->link('Initial Report ID: '.$this->data['SadrFollowup']['sadr_id'], array('controller' => 'sadrs', 'action' => 'edit', $this->data['SadrFollowup']['sadr_id'])); 
				?> 
			  </li>
			  <li class="active"><a href="#tab1" data-toggle="tab">Follow UP report <?php echo $this->data['SadrFollowup']['id'] ?></a></li>
			</ul>
			<div class="tab-content" style="padding-bottom: 9px; border-bottom: 1px solid #ddd;">
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
					echo $this->Form->input('sadr_id', array('type' => 'hidden'));
				?><br>
				<div class="row-fluid">
					<div class="span12">						
						<?php
							echo $this->Form->input('description_of_reaction', array('class' => 'span8',  'rows' => '3', 'label' => array('class' => 'control-label required',
																	'text' => 'FOLLOW UP BRIEF DESCRIPTION OF REACTION: <span style="color:red;">*</span>')));	
							
						?>						
					</div><!--/span-->
				</div><!--/row-->
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
			  <div class="tab-pane" id="tab2">
				<?php echo $this->Html->image('indicator.gif', array('id' => 'loading')); ?>
				<div id="sadrViewContentpane"></div>
			  </div>
			</div>
		  </div> <!-- /tabbable -->

		</div>
	</div>
</section>