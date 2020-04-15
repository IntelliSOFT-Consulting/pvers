<div class="whoDrugs index">
	<h2><?php echo __('Who Drugs');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('MedId');?></th>
			<th><?php echo $this->Paginator->sort('drug_record_number');?></th>
			<th><?php echo $this->Paginator->sort('sequence_no_1');?></th>
			<th><?php echo $this->Paginator->sort('sequence_no_2');?></th>
			<th><?php echo $this->Paginator->sort('sequence_no_3');?></th>
			<th><?php echo $this->Paginator->sort('sequence_no_4');?></th>
			<th><?php echo $this->Paginator->sort('generic');?></th>
			<th><?php echo $this->Paginator->sort('drug_name');?></th>
			<th><?php echo $this->Paginator->sort('name_specifier');?></th>
			<th><?php echo $this->Paginator->sort('market_authorization_number');?></th>
			<th><?php echo $this->Paginator->sort('market_authorization_date');?></th>
			<th><?php echo $this->Paginator->sort('market_authorization_withdrawal_date');?></th>
			<th><?php echo $this->Paginator->sort('country');?></th>
			<th><?php echo $this->Paginator->sort('company');?></th>
			<th><?php echo $this->Paginator->sort('marketing_authorization_holder');?></th>
			<th><?php echo $this->Paginator->sort('source_code');?></th>
			<th><?php echo $this->Paginator->sort('source_country');?></th>
			<th><?php echo $this->Paginator->sort('source_year');?></th>
			<th><?php echo $this->Paginator->sort('product_type');?></th>
			<th><?php echo $this->Paginator->sort('product_group');?></th>
			<th><?php echo $this->Paginator->sort('create_date');?></th>
			<th><?php echo $this->Paginator->sort('date_changed');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($whoDrugs as $whoDrug): ?>
	<tr>
		<td><?php echo h($whoDrug['WhoDrug']['id']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['MedId']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['drug_record_number']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['sequence_no_1']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['sequence_no_2']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['sequence_no_3']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['sequence_no_4']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['generic']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['drug_name']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['name_specifier']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['market_authorization_number']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['market_authorization_date']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['market_authorization_withdrawal_date']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['country']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['company']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['marketing_authorization_holder']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['source_code']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['source_country']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['source_year']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['product_type']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['product_group']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['create_date']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['date_changed']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['created']); ?>&nbsp;</td>
		<td><?php echo h($whoDrug['WhoDrug']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $whoDrug['WhoDrug']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $whoDrug['WhoDrug']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $whoDrug['WhoDrug']['id']), null, __('Are you sure you want to delete # %s?', $whoDrug['WhoDrug']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Who Drug'), array('action' => 'add')); ?></li>
	</ul>
</div>
