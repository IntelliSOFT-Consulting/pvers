<div class="listOfDevices index">
	<h2><?php echo __('List Of Devices'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('device_id'); ?></th>
			<th><?php echo $this->Paginator->sort('brand_name'); ?></th>
			<th><?php echo $this->Paginator->sort('serial_no'); ?></th>
			<th><?php echo $this->Paginator->sort('common_name'); ?></th>
			<th><?php echo $this->Paginator->sort('manufacturer'); ?></th>
			<th><?php echo $this->Paginator->sort('manufacture_date'); ?></th>
			<th><?php echo $this->Paginator->sort('expiry_date'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($listOfDevices as $listOfDevice): ?>
	<tr>
		<td><?php echo h($listOfDevice['ListOfDevice']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($listOfDevice['Device']['id'], array('controller' => 'devices', 'action' => 'view', $listOfDevice['Device']['id'])); ?>
		</td>
		<td><?php echo h($listOfDevice['ListOfDevice']['brand_name']); ?>&nbsp;</td>
		<td><?php echo h($listOfDevice['ListOfDevice']['serial_no']); ?>&nbsp;</td>
		<td><?php echo h($listOfDevice['ListOfDevice']['common_name']); ?>&nbsp;</td>
		<td><?php echo h($listOfDevice['ListOfDevice']['manufacturer']); ?>&nbsp;</td>
		<td><?php echo h($listOfDevice['ListOfDevice']['manufacture_date']); ?>&nbsp;</td>
		<td><?php echo h($listOfDevice['ListOfDevice']['expiry_date']); ?>&nbsp;</td>
		<td><?php echo h($listOfDevice['ListOfDevice']['created']); ?>&nbsp;</td>
		<td><?php echo h($listOfDevice['ListOfDevice']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $listOfDevice['ListOfDevice']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $listOfDevice['ListOfDevice']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $listOfDevice['ListOfDevice']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $listOfDevice['ListOfDevice']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New List Of Device'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Devices'), array('controller' => 'devices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device'), array('controller' => 'devices', 'action' => 'add')); ?> </li>
	</ul>
</div>
