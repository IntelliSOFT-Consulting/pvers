<div class="doses form">
<?php echo $this->Form->create('Dose');?>
	<fieldset>
		<legend><?php echo __('Add Dose'); ?></legend>
	<?php
		echo $this->Form->input('value');
		echo $this->Form->input('icsr_code');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Doses'), array('action' => 'index'));?></li>
	</ul>
</div>
