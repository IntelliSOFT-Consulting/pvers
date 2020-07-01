<div class="designations form">
<?php echo $this->Form->create('Designation'); ?>
	<fieldset>
		<legend><?php echo __('Edit Designation'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('category', array('type' => 'select', 'options' => ['1' => 'Physician', '2' => 'Pharmacist', '3' => 'Other Health Professional', '4' => 'Lawyer', '5' => 'Consumer or other non-health professional']));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

