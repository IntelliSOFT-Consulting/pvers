
<div class="span3">
  <div class="well sidebar-nav">	
	<ul class="nav nav-list">
		<li class="nav-header">Links</li>
		<li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'home'));?></li>
		<li class="active"><?php echo $this->Html->link(__('Report Suspected Adverse Drug Reaction'), array('controller' => 'sadrs', 'action' => 'add'));?></li>
		<li><?php echo $this->Html->link(__('Report a Poor Quality Medicinal Product'), array('controller' => 'pqmps', 'action' => 'add')); ?> </li>
	</ul>
  </div><!--/.well -->
</div><!--/span-->

<div class="span9">
	   	
	<?php	
		echo $this->element('banner');
		echo $this->Session->flash();
	?>
	
	 <div class="row-fluid">
		<div class="span12">
		  <h2>Suspected Adverse Drug Reaction Reporting Form</h2>
		  <p>Some good description here.</p>
		  <p><a class="btn" href="/pv/sadrs/add">View details &raquo;</a></p>
		</div><!--/span-->
	  </div><!--/row-->	
	 
	 <?php	
		//echo $this->element('banner');

		echo $this->Session->flash();		
		
	 ?>
	 <div class="row-fluid">
		<div class="span6">
		 <?php 	
			echo $this->Form->create('Sadr', array(
				'action' => 'add',
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
		
			echo $this->Form->input('reporter_email', array(
						'type' => 'email', 
						'div' => array('class' => 'control-group required'),
						'label' => array('class' => 'control-label required', 'text' => 'E-MAIL ADDRESS')
					));
		
			echo $this->Form->end(array(
					'label' => 'Submit',
					'value' => 'Save',
					'class' => 'btn btn-primary',
					'id' => 'SadrSubmitEmail', 'title'=>'Start a New SADR', 
					'data-content' => 'Please provide us with your email address to start filling in the SADR.',
					'div' => array(
						'class' => 'form-actions',
					)
				));
		?>
		</div><!--/span-->
		<div class="span6">
		   <?php 	
			echo $this->Form->create('Sadr', array(
				'url' => '/sadrs/find',
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
		
			echo $this->Form->input('search', array(
						'div' => array('class' => 'control-group required'),
						'label' => array('class' => 'control-label required', 'text' => 'FORM ID')
					));
		
			echo $this->Form->end(array(
					'label' => 'Submit',
					'value' => 'Save',
					'class' => 'btn btn-primary',
					'id' => 'SadrSearchForm', 
					'title'=>'Search for an SADR', 
					'data-content' => 'Input a Form Id to search for.',
					'div' => array(
						'class' => 'form-actions',
					)
				));
		?>
		</div><!--/span-->
	  </div><!--/row-->
	  
	  <div class="row-fluid">
		<div class="span12">
		  <h2>Poor Quality Medicinal Products Reporting Form</h2>
		  <p>Some other good description here as well. </p>
		  <p><a class="btn" href="/pv/pqmp/add">View details &raquo;</a></p>
		</div><!--/span-->
	  </div><!--/row-->
	
</div>

