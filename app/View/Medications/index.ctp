<div class="medications index">
	<h2><?php echo __('Medications'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('reference_no'); ?></th>
			<th><?php echo $this->Paginator->sort('county_id'); ?></th>
			<th><?php echo $this->Paginator->sort('designation_id'); ?></th>
			<th><?php echo $this->Paginator->sort('date_of_event'); ?></th>
			<th><?php echo $this->Paginator->sort('time_of_event'); ?></th>
			<th><?php echo $this->Paginator->sort('name_of_institution'); ?></th>
			<th><?php echo $this->Paginator->sort('institution_code'); ?></th>
			<th><?php echo $this->Paginator->sort('institution_contact'); ?></th>
			<th><?php echo $this->Paginator->sort('patient_name'); ?></th>
			<th><?php echo $this->Paginator->sort('gender'); ?></th>
			<th><?php echo $this->Paginator->sort('patient_phone'); ?></th>
			<th><?php echo $this->Paginator->sort('date_of_birth'); ?></th>
			<th><?php echo $this->Paginator->sort('age_years'); ?></th>
			<th><?php echo $this->Paginator->sort('ward'); ?></th>
			<th><?php echo $this->Paginator->sort('clinic'); ?></th>
			<th><?php echo $this->Paginator->sort('pharmacy'); ?></th>
			<th><?php echo $this->Paginator->sort('accident'); ?></th>
			<th><?php echo $this->Paginator->sort('location_other'); ?></th>
			<th><?php echo $this->Paginator->sort('description_of_error'); ?></th>
			<th><?php echo $this->Paginator->sort('process_occur'); ?></th>
			<th><?php echo $this->Paginator->sort('reach_patient'); ?></th>
			<th><?php echo $this->Paginator->sort('correct_medication'); ?></th>
			<th><?php echo $this->Paginator->sort('direct_result'); ?></th>
			<th><?php echo $this->Paginator->sort('outcome'); ?></th>
			<th><?php echo $this->Paginator->sort('outcome_error'); ?></th>
			<th><?php echo $this->Paginator->sort('outcome_death'); ?></th>
			<th><?php echo $this->Paginator->sort('staff_factors'); ?></th>
			<th><?php echo $this->Paginator->sort('medication_related'); ?></th>
			<th><?php echo $this->Paginator->sort('work_environment'); ?></th>
			<th><?php echo $this->Paginator->sort('task_technology'); ?></th>
			<th><?php echo $this->Paginator->sort('task_other'); ?></th>
			<th><?php echo $this->Paginator->sort('recommendations'); ?></th>
			<th><?php echo $this->Paginator->sort('reporter_name'); ?></th>
			<th><?php echo $this->Paginator->sort('reporter_email'); ?></th>
			<th><?php echo $this->Paginator->sort('reporter_phone'); ?></th>
			<th><?php echo $this->Paginator->sort('submitted'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($medications as $medication): ?>
	<tr>
		<td><?php echo h($medication['Medication']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($medication['User']['name'], array('controller' => 'users', 'action' => 'view', $medication['User']['id'])); ?>
		</td>
		<td><?php echo h($medication['Medication']['reference_no']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($medication['County']['county_name'], array('controller' => 'counties', 'action' => 'view', $medication['County']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($medication['Designation']['name'], array('controller' => 'designations', 'action' => 'view', $medication['Designation']['id'])); ?>
		</td>
		<td><?php echo h($medication['Medication']['date_of_event']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['time_of_event']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['name_of_institution']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['institution_code']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['institution_contact']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['patient_name']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['gender']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['patient_phone']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['date_of_birth']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['age_years']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['ward']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['clinic']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['pharmacy']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['accident']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['location_other']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['description_of_error']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['process_occur']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['reach_patient']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['correct_medication']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['direct_result']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['outcome']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['outcome_error']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['outcome_death']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['staff_factors']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['medication_related']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['work_environment']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['task_technology']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['task_other']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['recommendations']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['reporter_name']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['reporter_email']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['reporter_phone']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['submitted']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['active']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['created']); ?>&nbsp;</td>
		<td><?php echo h($medication['Medication']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $medication['Medication']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $medication['Medication']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $medication['Medication']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $medication['Medication']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Medication'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Counties'), array('controller' => 'counties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New County'), array('controller' => 'counties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Designations'), array('controller' => 'designations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Designation'), array('controller' => 'designations', 'action' => 'add')); ?> </li>
	</ul>
</div>
