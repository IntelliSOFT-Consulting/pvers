<div class="listOfDevices form">
<?php echo $this->Form->create('ListOfDevice'); ?>
	<fieldset>
		<legend><?php echo __('Edit List Of Device'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('device_id');
		echo $this->Form->input('brand_name');
		echo $this->Form->input('serial_no');
		echo $this->Form->input('common_name');
		echo $this->Form->input('manufacturer');
		echo $this->Form->input('manufacture_date');
		echo $this->Form->input('expiry_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ListOfDevice.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('ListOfDevice.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List List Of Devices'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Devices'), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device'), array('controller' => 'devices', 'action' => 'add')); ?> </li>
	</ul>
</div>
