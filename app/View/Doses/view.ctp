<div class="doses view">
<h2><?php  echo __('Dose');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dose['Dose']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($dose['Dose']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Icsr Code'); ?></dt>
		<dd>
			<?php echo h($dose['Dose']['icsr_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($dose['Dose']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($dose['Dose']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($dose['Dose']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dose'), array('action' => 'edit', $dose['Dose']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Dose'), array('action' => 'delete', $dose['Dose']['id']), null, __('Are you sure you want to delete # %s?', $dose['Dose']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Doses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dose'), array('action' => 'add')); ?> </li>
	</ul>
</div>
