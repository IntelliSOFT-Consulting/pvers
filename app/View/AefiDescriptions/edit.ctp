<div class="aefiDescriptions form">
<?php echo $this->Form->create('AefiDescription'); ?>
	<fieldset>
		<legend><?php echo __('Edit Aefi Description'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('aefi_id');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AefiDescription.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('AefiDescription.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Aefi Descriptions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Aefis'), array('controller' => 'aefis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aefi'), array('controller' => 'aefis', 'action' => 'add')); ?> </li>
	</ul>
</div>
