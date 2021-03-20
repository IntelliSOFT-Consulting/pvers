<div class="vaccines view">
<h2><?php echo __('Vaccine'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($vaccine['Vaccine']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aefi'); ?></dt>
		<dd>
			<?php echo $this->Html->link($vaccine['Aefi']['id'], array('controller' => 'aefis', 'action' => 'view', $vaccine['Aefi']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vaccine Name'); ?></dt>
		<dd>
			<?php echo h($vaccine['Vaccine']['vaccine_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($vaccine['Vaccine']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($vaccine['Vaccine']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($vaccine['Vaccine']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Vaccine'), array('action' => 'edit', $vaccine['Vaccine']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Vaccine'), array('action' => 'delete', $vaccine['Vaccine']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $vaccine['Vaccine']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Vaccines'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vaccine'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aefis'), array('controller' => 'aefis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aefi'), array('controller' => 'aefis', 'action' => 'add')); ?> </li>
	</ul>
</div>
