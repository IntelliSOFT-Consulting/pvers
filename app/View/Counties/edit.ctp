<div class="counties form">
<?php echo $this->Form->create('County');?>
	<fieldset>
		<legend><?php echo __('Edit County'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('county_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('County.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('County.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Counties'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Sadrs'), array('controller' => 'sadrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr'), array('controller' => 'sadrs', 'action' => 'add')); ?> </li>
	</ul>
</div>
