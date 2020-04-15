<div class="messages view">
<h2><?php  echo __('Message');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($message['Message']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sadr'); ?></dt>
		<dd>
			<?php echo $this->Html->link($message['Sadr']['id'], array('controller' => 'sadrs', 'action' => 'view', $message['Sadr']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pqmp'); ?></dt>
		<dd>
			<?php echo $this->Html->link($message['Pqmp']['id'], array('controller' => 'pqmps', 'action' => 'view', $message['Pqmp']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sadr Followup'); ?></dt>
		<dd>
			<?php echo $this->Html->link($message['SadrFollowup']['id'], array('controller' => 'sadr_followups', 'action' => 'view', $message['SadrFollowup']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sender'); ?></dt>
		<dd>
			<?php echo h($message['Message']['sender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Receiver'); ?></dt>
		<dd>
			<?php echo h($message['Message']['receiver']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Message'); ?></dt>
		<dd>
			<?php echo h($message['Message']['message']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sent'); ?></dt>
		<dd>
			<?php echo h($message['Message']['sent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($message['Message']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($message['Message']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Message'), array('action' => 'edit', $message['Message']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Message'), array('action' => 'delete', $message['Message']['id']), null, __('Are you sure you want to delete # %s?', $message['Message']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Messages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Message'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadrs'), array('controller' => 'sadrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr'), array('controller' => 'sadrs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pqmps'), array('controller' => 'pqmps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pqmp'), array('controller' => 'pqmps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadr Followups'), array('controller' => 'sadr_followups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr Followup'), array('controller' => 'sadr_followups', 'action' => 'add')); ?> </li>
	</ul>
</div>
