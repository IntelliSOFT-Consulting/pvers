<div class="sadrListOfDrugs form">
<?php echo $this->Form->create('SadrListOfDrug');?>
	<fieldset>
		<legend><?php echo __('Edit Sadr List Of Drug'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('sadr_id');
		echo $this->Form->input('drug_name');
		echo $this->Form->input('dose');
		echo $this->Form->input('route');
		echo $this->Form->input('frequency');
		echo $this->Form->input('start_date');
		echo $this->Form->input('stop_date');
		echo $this->Form->input('indication');
		echo $this->Form->input('suspected_drug');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SadrListOfDrug.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('SadrListOfDrug.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sadr List Of Drugs'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Sadrs'), array('controller' => 'sadrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr'), array('controller' => 'sadrs', 'action' => 'add')); ?> </li>
	</ul>
</div>
