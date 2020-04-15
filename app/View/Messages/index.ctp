<div class="messages index">
	<h2><?php echo __('Messages');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('sadr_id');?></th>
			<th><?php echo $this->Paginator->sort('pqmp_id');?></th>
			<th><?php echo $this->Paginator->sort('sadr_followup_id');?></th>
			<th><?php echo $this->Paginator->sort('sender');?></th>
			<th><?php echo $this->Paginator->sort('receiver');?></th>
			<th><?php echo $this->Paginator->sort('message');?></th>
			<th><?php echo $this->Paginator->sort('sent');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($messages as $message): ?>
	<tr>
		<td><?php echo h($message['Message']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($message['Sadr']['id'], array('controller' => 'sadrs', 'action' => 'view', $message['Sadr']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($message['Pqmp']['id'], array('controller' => 'pqmps', 'action' => 'view', $message['Pqmp']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($message['SadrFollowup']['id'], array('controller' => 'sadr_followups', 'action' => 'view', $message['SadrFollowup']['id'])); ?>
		</td>
		<td><?php echo h($message['Message']['sender']); ?>&nbsp;</td>
		<td><?php echo h($message['Message']['receiver']); ?>&nbsp;</td>
		<td><?php echo h($message['Message']['message']); ?>&nbsp;</td>
		<td><?php echo h($message['Message']['sent']); ?>&nbsp;</td>
		<td><?php echo h($message['Message']['created']); ?>&nbsp;</td>
		<td><?php echo h($message['Message']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $message['Message']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $message['Message']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $message['Message']['id']), null, __('Are you sure you want to delete # %s?', $message['Message']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Message'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Sadrs'), array('controller' => 'sadrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr'), array('controller' => 'sadrs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pqmps'), array('controller' => 'pqmps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pqmp'), array('controller' => 'pqmps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadr Followups'), array('controller' => 'sadr_followups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr Followup'), array('controller' => 'sadr_followups', 'action' => 'add')); ?> </li>
	</ul>
</div>
