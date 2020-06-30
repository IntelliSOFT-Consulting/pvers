<div class="reminders form">
<?php echo $this->Form->create('Reminder'); ?>
	<fieldset>
		<legend><?php echo __('Add Reminder'); ?></legend>
	<?php
		echo $this->Form->input('foreign_key');
		echo $this->Form->input('model');
		echo $this->Form->input('user_id');
		echo $this->Form->input('reminder_type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Reminders'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
