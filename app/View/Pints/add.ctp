<div class="pints form">
<?php echo $this->Form->create('Pint'); ?>
	<fieldset>
		<legend><?php echo __('Add Pint'); ?></legend>
	<?php
		echo $this->Form->input('transfusion_id');
		echo $this->Form->input('component_type');
		echo $this->Form->input('pint_no');
		echo $this->Form->input('expiry_date');
		echo $this->Form->input('volume_transfused');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pints'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Transfusions'), array('controller' => 'transfusions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transfusion'), array('controller' => 'transfusions', 'action' => 'add')); ?> </li>
	</ul>
</div>
