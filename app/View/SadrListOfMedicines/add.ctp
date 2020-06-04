<div class="sadrListOfMedicines form">
<?php echo $this->Form->create('SadrListOfMedicine'); ?>
	<fieldset>
		<legend><?php echo __('Add Sadr List Of Medicine'); ?></legend>
	<?php
		echo $this->Form->input('sadr_id');
		echo $this->Form->input('sadr_followup_id');
		echo $this->Form->input('dose_id');
		echo $this->Form->input('route_id');
		echo $this->Form->input('frequency_id');
		echo $this->Form->input('drug_name');
		echo $this->Form->input('brand_name');
		echo $this->Form->input('batch_no');
		echo $this->Form->input('manufacturer');
		echo $this->Form->input('dose');
		echo $this->Form->input('start_date');
		echo $this->Form->input('stop_date');
		echo $this->Form->input('indication');
		echo $this->Form->input('suspected_drug');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sadr List Of Medicines'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Sadrs'), array('controller' => 'sadrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr'), array('controller' => 'sadrs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadr Followups'), array('controller' => 'sadr_followups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr Followup'), array('controller' => 'sadr_followups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Doses'), array('controller' => 'doses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dose'), array('controller' => 'doses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Frequencies'), array('controller' => 'frequencies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Frequency'), array('controller' => 'frequencies', 'action' => 'add')); ?> </li>
	</ul>
</div>
