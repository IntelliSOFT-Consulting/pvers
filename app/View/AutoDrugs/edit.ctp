<div class="autoDrugs form">
<?php echo $this->Form->create('AutoDrug'); ?>
	<fieldset>
		<legend><?php echo __('Edit Auto Drug'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('AutoDrug.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('AutoDrug.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Auto Drugs'), array('action' => 'index')); ?></li>
	</ul>
</div>
