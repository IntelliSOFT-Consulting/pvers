<div class="subCounties form">
<?php echo $this->Form->create('SubCounty'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Sub County'); ?></legend>
	<?php
		echo $this->Form->input('county_id');
		echo $this->Form->input('sub_county_name');
		echo $this->Form->input('county_name');
		echo $this->Form->input('Province');
		echo $this->Form->input('Pop_2009');
		echo $this->Form->input('RegVoters');
		echo $this->Form->input('AreaSqKms');
		echo $this->Form->input('CAWards');
		echo $this->Form->input('MainEthnicGroup');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sub Counties'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Counties'), array('controller' => 'counties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New County'), array('controller' => 'counties', 'action' => 'add')); ?> </li>
	</ul>
</div>
