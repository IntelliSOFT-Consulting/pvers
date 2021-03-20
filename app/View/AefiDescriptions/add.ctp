<div class="aefiDescriptions form">
<?php echo $this->Form->create('AefiDescription'); ?>
	<fieldset>
		<legend><?php echo __('Add Aefi Description'); ?></legend>
	<?php
		echo $this->Form->input('aefi_id');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Aefi Descriptions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Aefis'), array('controller' => 'aefis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aefi'), array('controller' => 'aefis', 'action' => 'add')); ?> </li>
	</ul>
</div>
