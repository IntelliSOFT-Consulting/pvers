<div class="subCounties form">
<?php echo $this->Form->create('SubCounty'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Sub County'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SubCounty.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('SubCounty.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Sub Counties'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Counties'), array('controller' => 'counties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New County'), array('controller' => 'counties', 'action' => 'add')); ?> </li>
	</ul>
</div>
