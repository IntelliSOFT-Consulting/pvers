<div class="padrListOfMedicines form">
<?php echo $this->Form->create('PadrListOfMedicine'); ?>
	<fieldset>
		<legend><?php echo __('Add Padr List Of Medicine'); ?></legend>
	<?php
		echo $this->Form->input('padr_id');
		echo $this->Form->input('product_name');
		echo $this->Form->input('manufacturer');
		echo $this->Form->input('expiry_date');
		echo $this->Form->input('start_date');
		echo $this->Form->input('end_date');
		echo $this->Form->input('modifed');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Padr List Of Medicines'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Padrs'), array('controller' => 'padrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Padr'), array('controller' => 'padrs', 'action' => 'add')); ?> </li>
	</ul>
</div>
