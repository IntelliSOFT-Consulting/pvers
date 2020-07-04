<div class="suspectedDrugs form">
<?php echo $this->Form->create('SuspectedDrug'); ?>
	<fieldset>
		<legend><?php echo __('Add Suspected Drug'); ?></legend>
	<?php
		echo $this->Form->input('sae_id');
		echo $this->Form->input('generic_name');
		echo $this->Form->input('dose');
		echo $this->Form->input('route_id');
		echo $this->Form->input('indication');
		echo $this->Form->input('date_from');
		echo $this->Form->input('date_to');
		echo $this->Form->input('therapy_duration');
		echo $this->Form->input('reaction_abate');
		echo $this->Form->input('reaction_reappear');
		echo $this->Form->input('deleted');
		echo $this->Form->input('deleted_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Suspected Drugs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Saes'), array('controller' => 'saes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sae'), array('controller' => 'saes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
	</ul>
</div>
