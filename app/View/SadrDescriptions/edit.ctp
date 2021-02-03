<div class="sadrDescriptions form">
<?php echo $this->Form->create('SadrDescription'); ?>
	<fieldset>
		<legend><?php echo __('Edit Sadr Description'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('sadr_id');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SadrDescription.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('SadrDescription.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Sadr Descriptions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Sadrs'), array('controller' => 'sadrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr'), array('controller' => 'sadrs', 'action' => 'add')); ?> </li>
	</ul>
</div>
