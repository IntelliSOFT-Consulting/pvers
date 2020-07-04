<div class="concomittantDrugs index">
	<h2><?php echo __('Concomittant Drugs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('sae_id'); ?></th>
			<th><?php echo $this->Paginator->sort('generic_name'); ?></th>
			<th><?php echo $this->Paginator->sort('dose'); ?></th>
			<th><?php echo $this->Paginator->sort('route_id'); ?></th>
			<th><?php echo $this->Paginator->sort('indication'); ?></th>
			<th><?php echo $this->Paginator->sort('date_from'); ?></th>
			<th><?php echo $this->Paginator->sort('date_to'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('deleted'); ?></th>
			<th><?php echo $this->Paginator->sort('deleted_date'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($concomittantDrugs as $concomittantDrug): ?>
	<tr>
		<td><?php echo h($concomittantDrug['ConcomittantDrug']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($concomittantDrug['Sae']['id'], array('controller' => 'saes', 'action' => 'view', $concomittantDrug['Sae']['id'])); ?>
		</td>
		<td><?php echo h($concomittantDrug['ConcomittantDrug']['generic_name']); ?>&nbsp;</td>
		<td><?php echo h($concomittantDrug['ConcomittantDrug']['dose']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($concomittantDrug['Route']['name'], array('controller' => 'routes', 'action' => 'view', $concomittantDrug['Route']['id'])); ?>
		</td>
		<td><?php echo h($concomittantDrug['ConcomittantDrug']['indication']); ?>&nbsp;</td>
		<td><?php echo h($concomittantDrug['ConcomittantDrug']['date_from']); ?>&nbsp;</td>
		<td><?php echo h($concomittantDrug['ConcomittantDrug']['date_to']); ?>&nbsp;</td>
		<td><?php echo h($concomittantDrug['ConcomittantDrug']['description']); ?>&nbsp;</td>
		<td><?php echo h($concomittantDrug['ConcomittantDrug']['deleted']); ?>&nbsp;</td>
		<td><?php echo h($concomittantDrug['ConcomittantDrug']['deleted_date']); ?>&nbsp;</td>
		<td><?php echo h($concomittantDrug['ConcomittantDrug']['created']); ?>&nbsp;</td>
		<td><?php echo h($concomittantDrug['ConcomittantDrug']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $concomittantDrug['ConcomittantDrug']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $concomittantDrug['ConcomittantDrug']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $concomittantDrug['ConcomittantDrug']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $concomittantDrug['ConcomittantDrug']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Concomittant Drug'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Saes'), array('controller' => 'saes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sae'), array('controller' => 'saes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
	</ul>
</div>
