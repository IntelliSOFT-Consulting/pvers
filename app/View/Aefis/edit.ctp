<div class="aefis form">
<?php echo $this->Form->create('Aefi');?>
	<fieldset>
		<legend><?php echo __('Edit Aefi'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('county_id');
		echo $this->Form->input('sub_county_id');
		echo $this->Form->input('designation_id');
		echo $this->Form->input('report_type');
		echo $this->Form->input('name_of_institution');
		echo $this->Form->input('institution_code');
		echo $this->Form->input('patient_name');
		echo $this->Form->input('ip_no');
		echo $this->Form->input('date_of_birth');
		echo $this->Form->input('ward');
		echo $this->Form->input('gender');
		echo $this->Form->input('date_of_onset_of_reaction');
		echo $this->Form->input('description_of_reaction');
		echo $this->Form->input('action_taken');
		echo $this->Form->input('outcome');
		echo $this->Form->input('reporter_name');
		echo $this->Form->input('reporter_email');
		echo $this->Form->input('reporter_phone');
		echo $this->Form->input('submitted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Aefi.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Aefi.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Aefis'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Counties'), array('controller' => 'counties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New County'), array('controller' => 'counties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sub Counties'), array('controller' => 'sub_counties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sub County'), array('controller' => 'sub_counties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Designations'), array('controller' => 'designations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Designation'), array('controller' => 'designations', 'action' => 'add')); ?> </li>
	</ul>
</div>
