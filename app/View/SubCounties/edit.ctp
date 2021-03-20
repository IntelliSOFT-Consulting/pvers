<div class="subCounties form">
<?php echo $this->Form->create('SubCounty'); ?>
	<fieldset>
		<legend><?php echo __('Edit Sub County'); ?></legend>
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
		<li><?php echo $this->Html->link(__('List Aefis'), array('controller' => 'aefis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aefi'), array('controller' => 'aefis', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Padrs'), array('controller' => 'padrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Padr'), array('controller' => 'padrs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pqmps'), array('controller' => 'pqmps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pqmp'), array('controller' => 'pqmps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadrs'), array('controller' => 'sadrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr'), array('controller' => 'sadrs', 'action' => 'add')); ?> </li>
	</ul>
</div>
