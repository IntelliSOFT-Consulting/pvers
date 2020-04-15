<div class="drugDictionaries form">
<?php echo $this->Form->create('DrugDictionary');?>
	<fieldset>
		<legend><?php echo __('Edit Drug Dictionary'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('drug_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DrugDictionary.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('DrugDictionary.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Drug Dictionaries'), array('action' => 'index'));?></li>
	</ul>
</div>
