<div class="sadrDescriptions view">
<h2><?php echo __('Sadr Description'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sadrDescription['SadrDescription']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sadr'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sadrDescription['Sadr']['id'], array('controller' => 'sadrs', 'action' => 'view', $sadrDescription['Sadr']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($sadrDescription['SadrDescription']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($sadrDescription['SadrDescription']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($sadrDescription['SadrDescription']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sadr Description'), array('action' => 'edit', $sadrDescription['SadrDescription']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sadr Description'), array('action' => 'delete', $sadrDescription['SadrDescription']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $sadrDescription['SadrDescription']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadr Descriptions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr Description'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadrs'), array('controller' => 'sadrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr'), array('controller' => 'sadrs', 'action' => 'add')); ?> </li>
	</ul>
</div>
