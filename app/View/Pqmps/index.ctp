<div class="pqmps index">
	<h2><?php echo __('Pqmps');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('facility_name');?></th>
			<th><?php echo $this->Paginator->sort('district_name');?></th>
			<th><?php echo $this->Paginator->sort('province_name');?></th>
			<th><?php echo $this->Paginator->sort('facility_address');?></th>
			<th><?php echo $this->Paginator->sort('facility_phone');?></th>
			<th><?php echo $this->Paginator->sort('brand_name');?></th>
			<th><?php echo $this->Paginator->sort('generic_name');?></th>
			<th><?php echo $this->Paginator->sort('batch_number');?></th>
			<th><?php echo $this->Paginator->sort('manufacture_date');?></th>
			<th><?php echo $this->Paginator->sort('expiry_date');?></th>
			<th><?php echo $this->Paginator->sort('receipt_date');?></th>
			<th><?php echo $this->Paginator->sort('name_of_manufacturer');?></th>
			<th><?php echo $this->Paginator->sort('country_of_origin');?></th>
			<th><?php echo $this->Paginator->sort('supplier_name');?></th>
			<th><?php echo $this->Paginator->sort('supplier_address');?></th>
			<th><?php echo $this->Paginator->sort('oral_tablets');?></th>
			<th><?php echo $this->Paginator->sort('oral_suspension');?></th>
			<th><?php echo $this->Paginator->sort('injection');?></th>
			<th><?php echo $this->Paginator->sort('diluent');?></th>
			<th><?php echo $this->Paginator->sort('suspension_powder');?></th>
			<th><?php echo $this->Paginator->sort('injection_powder');?></th>
			<th><?php echo $this->Paginator->sort('eye_drops');?></th>
			<th><?php echo $this->Paginator->sort('ear_drops');?></th>
			<th><?php echo $this->Paginator->sort('nebuliser_solution');?></th>
			<th><?php echo $this->Paginator->sort('cream');?></th>
			<th><?php echo $this->Paginator->sort('ointment');?></th>
			<th><?php echo $this->Paginator->sort('liniment');?></th>
			<th><?php echo $this->Paginator->sort('paste');?></th>
			<th><?php echo $this->Paginator->sort('colour_change');?></th>
			<th><?php echo $this->Paginator->sort('separating');?></th>
			<th><?php echo $this->Paginator->sort('powdering');?></th>
			<th><?php echo $this->Paginator->sort('caking');?></th>
			<th><?php echo $this->Paginator->sort('moulding');?></th>
			<th><?php echo $this->Paginator->sort('odour_change');?></th>
			<th><?php echo $this->Paginator->sort('mislabeling');?></th>
			<th><?php echo $this->Paginator->sort('incomplete_pack');?></th>
			<th><?php echo $this->Paginator->sort('complaint_description');?></th>
			<th><?php echo $this->Paginator->sort('require_refrigeration_yes');?></th>
			<th><?php echo $this->Paginator->sort('require_refrigeration_no');?></th>
			<th><?php echo $this->Paginator->sort('product_at_facility_yes');?></th>
			<th><?php echo $this->Paginator->sort('product_at_facility_no');?></th>
			<th><?php echo $this->Paginator->sort('returned_by_client_yes');?></th>
			<th><?php echo $this->Paginator->sort('returned_by_client_no');?></th>
			<th><?php echo $this->Paginator->sort('stored_to_recommendations_yes');?></th>
			<th><?php echo $this->Paginator->sort('stored_to_recommendations_no');?></th>
			<th><?php echo $this->Paginator->sort('comments');?></th>
			<th><?php echo $this->Paginator->sort('reporter_name');?></th>
			<th><?php echo $this->Paginator->sort('contact_number');?></th>
			<th><?php echo $this->Paginator->sort('job_title');?></th>
			<th><?php echo $this->Paginator->sort('signature');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($pqmps as $pqmp): ?>
	<tr>
		<td><?php echo h($pqmp['Pqmp']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pqmp['User']['id'], array('controller' => 'users', 'action' => 'view', $pqmp['User']['id'])); ?>
		</td>
		<td><?php echo h($pqmp['Pqmp']['facility_name']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['district_name']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['province_name']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['facility_address']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['facility_phone']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['brand_name']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['generic_name']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['batch_number']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['manufacture_date']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['expiry_date']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['receipt_date']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['name_of_manufacturer']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['country_of_origin']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['supplier_name']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['supplier_address']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['oral_tablets']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['oral_suspension']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['injection']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['diluent']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['suspension_powder']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['injection_powder']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['eye_drops']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['ear_drops']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['nebuliser_solution']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['cream']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['ointment']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['liniment']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['paste']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['colour_change']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['separating']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['powdering']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['caking']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['moulding']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['odour_change']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['mislabeling']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['incomplete_pack']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['complaint_description']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['require_refrigeration_yes']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['require_refrigeration_no']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['product_at_facility_yes']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['product_at_facility_no']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['returned_by_client_yes']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['returned_by_client_no']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['stored_to_recommendations_yes']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['stored_to_recommendations_no']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['comments']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['reporter_name']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['contact_number']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['job_title']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['signature']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['created']); ?>&nbsp;</td>
		<td><?php echo h($pqmp['Pqmp']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $pqmp['Pqmp']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pqmp['Pqmp']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $pqmp['Pqmp']['id']), null, __('Are you sure you want to delete # %s?', $pqmp['Pqmp']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Pqmp'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments'), array('controller' => 'attachments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachment'), array('controller' => 'attachments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pqmp Complaints'), array('controller' => 'pqmp_complaints', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pqmp Complaint'), array('controller' => 'pqmp_complaints', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pqmp Product Formulations'), array('controller' => 'pqmp_product_formulations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pqmp Product Formulation'), array('controller' => 'pqmp_product_formulations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pqmp Storage Conditions'), array('controller' => 'pqmp_storage_conditions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pqmp Storage Condition'), array('controller' => 'pqmp_storage_conditions', 'action' => 'add')); ?> </li>
	</ul>
</div>
