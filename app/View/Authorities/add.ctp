<div class="authorities form">
<?php echo $this->Form->create('Authority'); ?>
	<fieldset>
		<legend><?php echo __('Add Authority'); ?></legend>
	<?php
		echo $this->Form->input('mah_name');
		echo $this->Form->input('mah_company_name');
		echo $this->Form->input('mah_company_address');
		echo $this->Form->input('mah_company_telephone');
		echo $this->Form->input('mah_company_email');
		echo $this->Form->input('product');
		echo $this->Form->input('master_mah');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Authorities'), array('action' => 'index')); ?></li>
	</ul>
</div>
