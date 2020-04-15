<div class="whoDrugs form">
<?php echo $this->Form->create('WhoDrug');?>
	<fieldset>
		<legend><?php echo __('Edit Who Drug'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('MedId');
		echo $this->Form->input('drug_record_number');
		echo $this->Form->input('sequence_no_1');
		echo $this->Form->input('sequence_no_2');
		echo $this->Form->input('sequence_no_3');
		echo $this->Form->input('sequence_no_4');
		echo $this->Form->input('generic');
		echo $this->Form->input('drug_name');
		echo $this->Form->input('name_specifier');
		echo $this->Form->input('market_authorization_number');
		echo $this->Form->input('market_authorization_date');
		echo $this->Form->input('market_authorization_withdrawal_date');
		echo $this->Form->input('country');
		echo $this->Form->input('company');
		echo $this->Form->input('marketing_authorization_holder');
		echo $this->Form->input('source_code');
		echo $this->Form->input('source_country');
		echo $this->Form->input('source_year');
		echo $this->Form->input('product_type');
		echo $this->Form->input('product_group');
		echo $this->Form->input('create_date');
		echo $this->Form->input('date_changed');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('WhoDrug.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('WhoDrug.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Who Drugs'), array('action' => 'index'));?></li>
	</ul>
</div>
