<div class="padrListOfMedicines index">
	<h2><?php echo __('Padr List Of Medicines'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('padr_id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_name'); ?></th>
			<th><?php echo $this->Paginator->sort('manufacturer'); ?></th>
			<th><?php echo $this->Paginator->sort('expiry_date'); ?></th>
			<th><?php echo $this->Paginator->sort('start_date'); ?></th>
			<th><?php echo $this->Paginator->sort('end_date'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modifed'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($padrListOfMedicines as $padrListOfMedicine): ?>
	<tr>
		<td><?php echo h($padrListOfMedicine['PadrListOfMedicine']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($padrListOfMedicine['Padr']['id'], array('controller' => 'padrs', 'action' => 'view', $padrListOfMedicine['Padr']['id'])); ?>
		</td>
		<td><?php echo h($padrListOfMedicine['PadrListOfMedicine']['product_name']); ?>&nbsp;</td>
		<td><?php echo h($padrListOfMedicine['PadrListOfMedicine']['manufacturer']); ?>&nbsp;</td>
		<td><?php echo h($padrListOfMedicine['PadrListOfMedicine']['expiry_date']); ?>&nbsp;</td>
		<td><?php echo h($padrListOfMedicine['PadrListOfMedicine']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($padrListOfMedicine['PadrListOfMedicine']['end_date']); ?>&nbsp;</td>
		<td><?php echo h($padrListOfMedicine['PadrListOfMedicine']['created']); ?>&nbsp;</td>
		<td><?php echo h($padrListOfMedicine['PadrListOfMedicine']['modifed']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $padrListOfMedicine['PadrListOfMedicine']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $padrListOfMedicine['PadrListOfMedicine']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $padrListOfMedicine['PadrListOfMedicine']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $padrListOfMedicine['PadrListOfMedicine']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Padr List Of Medicine'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Padrs'), array('controller' => 'padrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Padr'), array('controller' => 'padrs', 'action' => 'add')); ?> </li>
	</ul>
</div>
