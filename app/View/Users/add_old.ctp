
<div class="span3">
  <div class="well sidebar-nav">	
	<ul class="nav nav-list">
		<li class="nav-header">Links</li>
		<li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'home'));?></li>
		<li class="active"><?php echo $this->Html->link(__('Report a Suspected Adverse Drug Reaction'), array('action' => 'add'));?></li>
		<li><?php echo $this->Html->link(__('Report a Poor Quality Medicinal Product'), array('controller' => 'pqmps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pqmps'), array('controller' => 'pqmps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pqmp'), array('controller' => 'pqmps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadrs'), array('controller' => 'sadrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr'), array('controller' => 'sadrs', 'action' => 'add')); ?> </li>
	</ul>
  </div><!--/.well -->
</div><!--/span-->

<div class="span9">
	   	
	<?php	
		//echo $this->element('banner');
		echo $this->Session->flash();
		
		echo $this->Form->create('User', array(
			'class' => 'well form-horizontal formback',
			'action' => 'login',
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
		
		// echo $this->Form->error('SadrListOfDrug.1.drug_name');
		// print_r( $this->request->data['SadrListOfDrug']);
	?>
		  

	
	<div class="row-fluid">
		<div class="span12">
			<?php
				echo $this->Form->input('username', array('label' => array('class' => 'control-label', 'text' => 'Username'),));
				echo $this->Form->input('password', array('label' => array('class' => 'control-label', 'text' => 'Password'),));			
			?>
		</div><!--/span-->
	</div><!--/row-->
	 <hr>
	
	
	
	<?php echo $this->Form->end(array(
		'label' => 'Login',
		'value' => 'Save',
		'class' => 'btn btn-primary',
		'id' => 'SadrSaveChanges', 'title'=>'Save & continue editing', 
		'data-content' => 'Save changes to form without submitting it. 
																The form will still be available for further editing.',
		'div' => array(
			'class' => 'form-actions',
		)
	));?>
	
</div>

