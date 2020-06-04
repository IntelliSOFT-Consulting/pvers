<div class="facilityCodes form">
<?php echo $this->Form->create('FacilityCode');?>
	<fieldset>
		<legend><?php echo __('Add Facility Code'); ?></legend>
	<?php
		echo $this->Form->input('facility_code');
		echo $this->Form->input('facility_name');
		echo $this->Form->input('type');
		echo $this->Form->input('owner');
		echo $this->Form->input('province');
		echo $this->Form->input('district');
		echo $this->Form->input('division');
		echo $this->Form->input('location');
		echo $this->Form->input('sub_location');
		echo $this->Form->input('constituency');
		echo $this->Form->input('nearest_town');
		echo $this->Form->input('keph_level');
		echo $this->Form->input('plot_number');
		echo $this->Form->input('open_24hrs');
		echo $this->Form->input('open_weekends');
		echo $this->Form->input('beds');
		echo $this->Form->input('cots');
		echo $this->Form->input('operational_status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Facility Codes'), array('action' => 'index'));?></li>
	</ul>
</div>
