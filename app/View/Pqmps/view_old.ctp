<div class="pqmps view">
<h2><?php  echo __('Pqmp');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pqmp['User']['id'], array('controller' => 'users', 'action' => 'view', $pqmp['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facility Name'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['facility_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('District Name'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['district_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Province Name'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['province_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facility Address'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['facility_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facility Phone'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['facility_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brand Name'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['brand_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Generic Name'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['generic_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Batch Number'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['batch_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufacture Date'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['manufacture_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expiry Date'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['expiry_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Receipt Date'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['receipt_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name Of Manufacturer'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['name_of_manufacturer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country Of Origin'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['country_of_origin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Supplier Name'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['supplier_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Supplier Address'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['supplier_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Oral Tablets'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['oral_tablets']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Oral Suspension'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['oral_suspension']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Injection'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['injection']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diluent'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['diluent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Suspension Powder'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['suspension_powder']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Injection Powder'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['injection_powder']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Eye Drops'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['eye_drops']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ear Drops'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['ear_drops']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nebuliser Solution'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['nebuliser_solution']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cream'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['cream']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ointment'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['ointment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Liniment'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['liniment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paste'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['paste']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Colour Change'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['colour_change']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Separating'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['separating']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Powdering'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['powdering']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Caking'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['caking']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Moulding'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['moulding']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Odour Change'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['odour_change']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mislabeling'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['mislabeling']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Incomplete Pack'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['incomplete_pack']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Complaint Description'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['complaint_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Require Refrigeration Yes'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['require_refrigeration_yes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Require Refrigeration No'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['require_refrigeration_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product At Facility Yes'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['product_at_facility_yes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product At Facility No'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['product_at_facility_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Returned By Client Yes'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['returned_by_client_yes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Returned By Client No'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['returned_by_client_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stored To Recommendations Yes'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['stored_to_recommendations_yes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stored To Recommendations No'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['stored_to_recommendations_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reporter Name'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['reporter_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact Number'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['contact_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Job Title'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['job_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Signature'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['signature']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($pqmp['Pqmp']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pqmp'), array('action' => 'edit', $pqmp['Pqmp']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pqmp'), array('action' => 'delete', $pqmp['Pqmp']['id']), null, __('Are you sure you want to delete # %s?', $pqmp['Pqmp']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pqmps'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pqmp'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Attachments');?></h3>
	<?php if (!empty($pqmp['Attachment'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Sadr Id'); ?></th>
		<th><?php echo __('Pqmp Id'); ?></th>
		<th><?php echo __('File Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('File Type'); ?></th>
		<th><?php echo __('File Size'); ?></th>
		<th><?php echo __('Storage Location'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($pqmp['Attachment'] as $attachment): ?>
		<tr>
			<td><?php echo $attachment['id'];?></td>
			<td><?php echo $attachment['sadr_id'];?></td>
			<td><?php echo $attachment['pqmp_id'];?></td>
			<td><?php echo $attachment['file_name'];?></td>
			<td><?php echo $attachment['description'];?></td>
			<td><?php echo $attachment['file_type'];?></td>
			<td><?php echo $attachment['file_size'];?></td>
			<td><?php echo $attachment['storage_location'];?></td>
			<td><?php echo $attachment['created'];?></td>
			<td><?php echo $attachment['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'attachments', 'action' => 'view', $attachment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'attachments', 'action' => 'edit', $attachment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'attachments', 'action' => 'delete', $attachment['id']), null, __('Are you sure you want to delete # %s?', $attachment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Attachment'), array('controller' => 'attachments', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Pqmp Complaints');?></h3>
	<?php if (!empty($pqmp['PqmpComplaint'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Pqmp Id'); ?></th>
		<th><?php echo __('Complaint'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($pqmp['PqmpComplaint'] as $pqmpComplaint): ?>
		<tr>
			<td><?php echo $pqmpComplaint['id'];?></td>
			<td><?php echo $pqmpComplaint['pqmp_id'];?></td>
			<td><?php echo $pqmpComplaint['complaint'];?></td>
			<td><?php echo $pqmpComplaint['created'];?></td>
			<td><?php echo $pqmpComplaint['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pqmp_complaints', 'action' => 'view', $pqmpComplaint['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pqmp_complaints', 'action' => 'edit', $pqmpComplaint['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pqmp_complaints', 'action' => 'delete', $pqmpComplaint['id']), null, __('Are you sure you want to delete # %s?', $pqmpComplaint['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pqmp Complaint'), array('controller' => 'pqmp_complaints', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Pqmp Product Formulations');?></h3>
	<?php if (!empty($pqmp['PqmpProductFormulation'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Pqmp Id'); ?></th>
		<th><?php echo __('Product Formulation'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($pqmp['PqmpProductFormulation'] as $pqmpProductFormulation): ?>
		<tr>
			<td><?php echo $pqmpProductFormulation['id'];?></td>
			<td><?php echo $pqmpProductFormulation['pqmp_id'];?></td>
			<td><?php echo $pqmpProductFormulation['product_formulation'];?></td>
			<td><?php echo $pqmpProductFormulation['created'];?></td>
			<td><?php echo $pqmpProductFormulation['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pqmp_product_formulations', 'action' => 'view', $pqmpProductFormulation['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pqmp_product_formulations', 'action' => 'edit', $pqmpProductFormulation['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pqmp_product_formulations', 'action' => 'delete', $pqmpProductFormulation['id']), null, __('Are you sure you want to delete # %s?', $pqmpProductFormulation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pqmp Product Formulation'), array('controller' => 'pqmp_product_formulations', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Pqmp Storage Conditions');?></h3>
	<?php if (!empty($pqmp['PqmpStorageCondition'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Pqmp Id'); ?></th>
		<th><?php echo __('Storage Conditions'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($pqmp['PqmpStorageCondition'] as $pqmpStorageCondition): ?>
		<tr>
			<td><?php echo $pqmpStorageCondition['id'];?></td>
			<td><?php echo $pqmpStorageCondition['pqmp_id'];?></td>
			<td><?php echo $pqmpStorageCondition['storage_conditions'];?></td>
			<td><?php echo $pqmpStorageCondition['created'];?></td>
			<td><?php echo $pqmpStorageCondition['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pqmp_storage_conditions', 'action' => 'view', $pqmpStorageCondition['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pqmp_storage_conditions', 'action' => 'edit', $pqmpStorageCondition['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pqmp_storage_conditions', 'action' => 'delete', $pqmpStorageCondition['id']), null, __('Are you sure you want to delete # %s?', $pqmpStorageCondition['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pqmp Storage Condition'), array('controller' => 'pqmp_storage_conditions', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
