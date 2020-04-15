<div class="doses index">
	<h2><?php echo __('Doses');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('value');?></th>
			<th><?php echo $this->Paginator->sort('icsr_code');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($doses as $dose): ?>
	<tr>
		<td><?php echo h($dose['Dose']['id']); ?>&nbsp;</td>
		<td><?php echo h($dose['Dose']['value']); ?>&nbsp;</td>
		<td><?php echo h($dose['Dose']['icsr_code']); ?>&nbsp;</td>
		<td><?php echo h($dose['Dose']['name']); ?>&nbsp;</td>
		<td><?php echo h($dose['Dose']['created']); ?>&nbsp;</td>
		<td><?php echo h($dose['Dose']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $dose['Dose']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $dose['Dose']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $dose['Dose']['id']), null, __('Are you sure you want to delete # %s?', $dose['Dose']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Dose'), array('action' => 'add')); ?></li>
	</ul>
</div>
