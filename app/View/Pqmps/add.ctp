<?php
	$this->assign('PQHPT', 'active');
	// pr($this->Session->read('Auth.User.initial_email'));
 ?>
 
  <!-- SADR
================================================== -->
<section id="pqmpsadd">
	<div class="page-header" id="pqmp_add_header">
		<?php echo $help_infos['pqmp_add_header']['content'];?>  
	</div>	 
	
	<div class="row-fluid">
		<div class="span5 columns">
			<div class="row-fluid">
				<div class="span12" id="pqmp_add_left_content">
					<?php echo $help_infos['pqmp_add_left_content']['content']; ?> 
				</div><!--/span-->
			</div><!--/row-->
	
		</div> <!-- /span5 -->

		<div class="span3 columns">
			<div class="page-header" id="pqmp_add_middle_header">
				<?php echo $help_infos['pqmp_add_middle_header']['content']; ?> 
			</div>	
			 <?php 	
				echo $this->Form->create('Pqmp', array(
					'url' => 'add',
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
			
				echo $this->Form->input('reporter_email', array(
							'type' => 'email', 'value' => $this->Session->read('Auth.User.email'), 
							'div' => array('class' => 'control-group required'),
							'label' => array('class' => 'control-label required', 'text' => 'E-MAIL ADDRESS')
						));
				if($this->Session->read('Auth.User.initial_email')) echo $this->Form->input('emails', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User.initial_email')));
				echo $this->Form->input('bot_stop', array(
							'div' => array('style' => 'display:none')
						));
				echo $this->Form->end(array(
						'label' => 'Go to report',
						'value' => 'Save',
						'class' => 'btn btn-primary',
						'id' => 'SadrSubmitEmail', 'title'=>'Start a New PQHPT', 
						'data-content' => 'Please provide us with your email address to start filling in the PQHPT.',
						'div' => array(
							'class' => 'form-actions',
						)
					));
			?>	
		</div> <!-- /span4 -->
		<div class="span4 columns">
			<div class="page-header" id="pqmp_add_right_contentq">
				<?php echo $help_infos['pqmp_add_right_content1']['content']; ?> 				
			</div>	 
			<?php 	
				echo $this->Form->create('Pqmp', array(
					'url' => 'find',
					'class' => 'well', 	
				));
			
				echo $this->Form->input('search', array(
							'div' => false,	'label' => false, 'class' => "input-medium search-query", 'placeholder' => 'Report ID...'
						));
			
				echo $this->Form->end(array(
						'label' => 'Submit',
						'value' => 'Save',
						'class' => 'btn',
						'id' => 'SadrSearchForm', 
						'title'=>'Search for an SADR', 
						'data-content' => 'Input a Form Id to search for.',
						'div' => false,
					));
			?>
			<div class="page-header" id="pqmp_add_request">
				<?php echo $help_infos['pqmp_add_request']['content']; ?>					
			</div>	 
			<?php 	
				echo $this->Form->create('Message', array(
					'url' => array('controller' => 'messages', 'action' => 'add'),
					'class' => 'well', 	
				));
			
				echo $this->Form->email('receiver', array(
							'div' => false,	'label' => false, 'class' => "input-medium search-query", 'placeholder' => 'Email...'
						));
				echo $this->Form->input('sent', array('type' => 'hidden', 'value' => 2));
				
				echo $this->Form->end(array(
						'label' => 'Submit',
						'value' => 'Save',
						'class' => 'btn',
						'id' => 'SadrFollowupSearchForm', 
						'title'=>'Search for a Follow up SADR report', 
						'data-content' => 'Input a Form Id to search for.',
						'div' => false,
					));
			?>
		</div> <!-- /span6 -->
	</div> <!-- /row -->
</section> <!-- /section -->
