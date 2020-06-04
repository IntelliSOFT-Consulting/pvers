<div class="frequencies form">
<?php echo $this->Form->create('Frequency');?>
	<fieldset>
		<legend><?php echo __('Add Frequency'); ?></legend>
	<?php
		echo $this->Form->input('value');
		echo $this->Form->input('name');
		echo $this->Form->input('icsr_code');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Frequencies'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Sadr List Of Drugs'), array('controller' => 'sadr_list_of_drugs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr List Of Drug'), array('controller' => 'sadr_list_of_drugs', 'action' => 'add')); ?> </li>
	</ul>
</div>
