<div class="sadrListOfMedicines index">
	<h2><?php echo __('Sadr List Of Medicines'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('sadr_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sadr_followup_id'); ?></th>
			<th><?php echo $this->Paginator->sort('dose_id'); ?></th>
			<th><?php echo $this->Paginator->sort('route_id'); ?></th>
			<th><?php echo $this->Paginator->sort('frequency_id'); ?></th>
			<th><?php echo $this->Paginator->sort('drug_name'); ?></th>
			<th><?php echo $this->Paginator->sort('brand_name'); ?></th>
			<th><?php echo $this->Paginator->sort('batch_no'); ?></th>
			<th><?php echo $this->Paginator->sort('manufacturer'); ?></th>
			<th><?php echo $this->Paginator->sort('dose'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date'); ?></th>
			<th><?php echo $this->Paginator->sort('stop_date'); ?></th>
			<th><?php echo $this->Paginator->sort('indication'); ?></th>
			<th><?php echo $this->Paginator->sort('suspected_drug'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($sadrListOfMedicines as $sadrListOfMedicine): ?>
	<tr>
		<td><?php echo h($sadrListOfMedicine['SadrListOfMedicine']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($sadrListOfMedicine['Sadr']['id'], array('controller' => 'sadrs', 'action' => 'view', $sadrListOfMedicine['Sadr']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($sadrListOfMedicine['SadrFollowup']['id'], array('controller' => 'sadr_followups', 'action' => 'view', $sadrListOfMedicine['SadrFollowup']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($sadrListOfMedicine['Dose']['name'], array('controller' => 'doses', 'action' => 'view', $sadrListOfMedicine['Dose']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($sadrListOfMedicine['Route']['name'], array('controller' => 'routes', 'action' => 'view', $sadrListOfMedicine['Route']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($sadrListOfMedicine['Frequency']['name'], array('controller' => 'frequencies', 'action' => 'view', $sadrListOfMedicine['Frequency']['id'])); ?>
		</td>
		<td><?php echo h($sadrListOfMedicine['SadrListOfMedicine']['drug_name']); ?>&nbsp;</td>
		<td><?php echo h($sadrListOfMedicine['SadrListOfMedicine']['brand_name']); ?>&nbsp;</td>
		<td><?php echo h($sadrListOfMedicine['SadrListOfMedicine']['batch_no']); ?>&nbsp;</td>
		<td><?php echo h($sadrListOfMedicine['SadrListOfMedicine']['manufacturer']); ?>&nbsp;</td>
		<td><?php echo h($sadrListOfMedicine['SadrListOfMedicine']['dose']); ?>&nbsp;</td>
		<td><?php echo h($sadrListOfMedicine['SadrListOfMedicine']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($sadrListOfMedicine['SadrListOfMedicine']['stop_date']); ?>&nbsp;</td>
		<td><?php echo h($sadrListOfMedicine['SadrListOfMedicine']['indication']); ?>&nbsp;</td>
		<td><?php echo h($sadrListOfMedicine['SadrListOfMedicine']['suspected_drug']); ?>&nbsp;</td>
		<td><?php echo h($sadrListOfMedicine['SadrListOfMedicine']['created']); ?>&nbsp;</td>
		<td><?php echo h($sadrListOfMedicine['SadrListOfMedicine']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sadrListOfMedicine['SadrListOfMedicine']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sadrListOfMedicine['SadrListOfMedicine']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sadrListOfMedicine['SadrListOfMedicine']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $sadrListOfMedicine['SadrListOfMedicine']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Sadr List Of Medicine'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Sadrs'), array('controller' => 'sadrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr'), array('controller' => 'sadrs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadr Followups'), array('controller' => 'sadr_followups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr Followup'), array('controller' => 'sadr_followups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Doses'), array('controller' => 'doses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dose'), array('controller' => 'doses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Frequencies'), array('controller' => 'frequencies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Frequency'), array('controller' => 'frequencies', 'action' => 'add')); ?> </li>
	</ul>
</div>
