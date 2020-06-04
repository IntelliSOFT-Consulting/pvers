<div class="helpInfos index">
	<h2><?php echo __('Help Infos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('field_name');?></th>
			<th><?php echo $this->Paginator->sort('field_label');?></th>
			<th><?php echo $this->Paginator->sort('help_type');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('content');?></th>
			<th><?php echo $this->Paginator->sort('help_text');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($helpInfos as $helpInfo): ?>
	<tr>
		<td><?php echo h($helpInfo['HelpInfo']['id']); ?>&nbsp;</td>
		<td><?php echo h($helpInfo['HelpInfo']['field_name']); ?>&nbsp;</td>
		<td><?php echo h($helpInfo['HelpInfo']['field_label']); ?>&nbsp;</td>
		<td><?php echo h($helpInfo['HelpInfo']['help_type']); ?>&nbsp;</td>
		<td><?php echo h($helpInfo['HelpInfo']['title']); ?>&nbsp;</td>
		<td><?php echo h($helpInfo['HelpInfo']['content']); ?>&nbsp;</td>
		<td><?php echo h($helpInfo['HelpInfo']['help_text']); ?>&nbsp;</td>
		<td><?php echo h($helpInfo['HelpInfo']['created']); ?>&nbsp;</td>
		<td><?php echo h($helpInfo['HelpInfo']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $helpInfo['HelpInfo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $helpInfo['HelpInfo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $helpInfo['HelpInfo']['id']), null, __('Are you sure you want to delete # %s?', $helpInfo['HelpInfo']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Help Info'), array('action' => 'add')); ?></li>
	</ul>
</div>
