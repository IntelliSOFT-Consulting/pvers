<div class="aefiDescriptions view">
<h2><?php echo __('Aefi Description'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($aefiDescription['AefiDescription']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aefi'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aefiDescription['Aefi']['id'], array('controller' => 'aefis', 'action' => 'view', $aefiDescription['Aefi']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($aefiDescription['AefiDescription']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($aefiDescription['AefiDescription']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($aefiDescription['AefiDescription']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Aefi Description'), array('action' => 'edit', $aefiDescription['AefiDescription']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Aefi Description'), array('action' => 'delete', $aefiDescription['AefiDescription']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $aefiDescription['AefiDescription']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Aefi Descriptions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aefi Description'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aefis'), array('controller' => 'aefis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aefi'), array('controller' => 'aefis', 'action' => 'add')); ?> </li>
	</ul>
</div>
