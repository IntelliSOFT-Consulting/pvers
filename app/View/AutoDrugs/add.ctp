<div class="autoDrugs form">
<?php echo $this->Form->create('AutoDrug'); ?>
	<fieldset>
		<legend><?php echo __('Add Auto Drug'); ?></legend>
	<?php
		echo $this->Form->input('drugName');
		echo $this->Form->input('drugCode');
		echo $this->Form->input('isGeneric');
		echo $this->Form->input('isPreferred');
		echo $this->Form->input('countryOfSales');
		echo $this->Form->input('activeIngredients');
		echo $this->Form->input('atcs');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Auto Drugs'), array('action' => 'index')); ?></li>
	</ul>
</div>
