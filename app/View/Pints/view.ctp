<div class="pints view">
<h2><?php echo __('Pint'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pint['Pint']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transfusion'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pint['Transfusion']['id'], array('controller' => 'transfusions', 'action' => 'view', $pint['Transfusion']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Component Type'); ?></dt>
		<dd>
			<?php echo h($pint['Pint']['component_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pint No'); ?></dt>
		<dd>
			<?php echo h($pint['Pint']['pint_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expiry Date'); ?></dt>
		<dd>
			<?php echo h($pint['Pint']['expiry_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Volume Transfused'); ?></dt>
		<dd>
			<?php echo h($pint['Pint']['volume_transfused']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($pint['Pint']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($pint['Pint']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pint'), array('action' => 'edit', $pint['Pint']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pint'), array('action' => 'delete', $pint['Pint']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $pint['Pint']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Pints'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pint'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transfusions'), array('controller' => 'transfusions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transfusion'), array('controller' => 'transfusions', 'action' => 'add')); ?> </li>
	</ul>
</div>
