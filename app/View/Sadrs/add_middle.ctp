<?php
$this->extend('/Sadrs/sadr');

$this->assign('edit', '');

$this->start('sidebar');
?>
	<li><?php echo $this->Html->link(__('Home'), array('controller' => 'pages', 'action' => 'home'));?></li>
	<li class="active"><?php echo $this->Html->link(__('Report a Suspected Adverse Drug Reaction'), array('action' => 'add'));?></li>
	<li><?php echo $this->Html->link(__('Report a Poor Quality Medicinal Product'), array('controller' => 'pqmps', 'action' => 'add')); ?> </li>
	<li><?php //echo $this->Html->link(__('List Sadrs'), array('action' => 'index'));?></li>
<?php 
$this->end(); 


$this->start('form.submit');
echo $this->Form->end(array(
		'label' => 'Save changes',
		'value' => 'Save',
		'class' => 'btn btn-primary',
		'id' => 'SadrSaveChanges', 'title'=>'Save & continue editing', 
		'data-content' => 'Save changes to form without submitting it. 
																The form will still be available for further editing.',
		'div' => array(
			'class' => 'form-actions',
		)
	));
$this->end();
?>

