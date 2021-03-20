<div class="reminders index">
	<h2><?php echo __('Reminders'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('foreign_key'); ?></th>
			<th><?php echo $this->Paginator->sort('model'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('reminder_type'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($reminders as $reminder): ?>
	<tr>
		<td><?php echo h($reminder['Reminder']['id']); ?>&nbsp;</td>
		<td><?php echo h($reminder['Reminder']['foreign_key']); ?>&nbsp;</td>
		<td><?php echo h($reminder['Reminder']['model']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($reminder['User']['name'], array('controller' => 'users', 'action' => 'view', $reminder['User']['id'])); ?>
		</td>
		<td><?php echo h($reminder['Reminder']['reminder_type']); ?>&nbsp;</td>
		<td><?php echo h($reminder['Reminder']['created']); ?>&nbsp;</td>
		<td><?php echo h($reminder['Reminder']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $reminder['Reminder']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $reminder['Reminder']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $reminder['Reminder']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $reminder['Reminder']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
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
		<li><?php echo $this->Html->link(__('New Reminder'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
