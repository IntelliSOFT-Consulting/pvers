<div class="devices index">
	<h2><?php echo __('Devices'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('reference_no'); ?></th>
			<th><?php echo $this->Paginator->sort('county_id'); ?></th>
			<th><?php echo $this->Paginator->sort('designation_id'); ?></th>
			<th><?php echo $this->Paginator->sort('report_type'); ?></th>
			<th><?php echo $this->Paginator->sort('name_of_institution'); ?></th>
			<th><?php echo $this->Paginator->sort('institution_code'); ?></th>
			<th><?php echo $this->Paginator->sort('institution_address'); ?></th>
			<th><?php echo $this->Paginator->sort('institution_contact'); ?></th>
			<th><?php echo $this->Paginator->sort('patient_name'); ?></th>
			<th><?php echo $this->Paginator->sort('patient_address'); ?></th>
			<th><?php echo $this->Paginator->sort('patient_phone'); ?></th>
			<th><?php echo $this->Paginator->sort('pregnancy_status'); ?></th>
			<th><?php echo $this->Paginator->sort('trimester'); ?></th>
			<th><?php echo $this->Paginator->sort('ip_no'); ?></th>
			<th><?php echo $this->Paginator->sort('date_of_birth'); ?></th>
			<th><?php echo $this->Paginator->sort('age_years'); ?></th>
			<th><?php echo $this->Paginator->sort('allergy'); ?></th>
			<th><?php echo $this->Paginator->sort('allergy_specify'); ?></th>
			<th><?php echo $this->Paginator->sort('problem_noted'); ?></th>
			<th><?php echo $this->Paginator->sort('brand_name'); ?></th>
			<th><?php echo $this->Paginator->sort('serial_no'); ?></th>
			<th><?php echo $this->Paginator->sort('commmon_name'); ?></th>
			<th><?php echo $this->Paginator->sort('catalogue'); ?></th>
			<th><?php echo $this->Paginator->sort('manufacturer_name'); ?></th>
			<th><?php echo $this->Paginator->sort('manufacturer_address'); ?></th>
			<th><?php echo $this->Paginator->sort('manufacture_date'); ?></th>
			<th><?php echo $this->Paginator->sort('expiry_date'); ?></th>
			<th><?php echo $this->Paginator->sort('operator'); ?></th>
			<th><?php echo $this->Paginator->sort('operator_specify'); ?></th>
			<th><?php echo $this->Paginator->sort('device_usage'); ?></th>
			<th><?php echo $this->Paginator->sort('device_duration_type'); ?></th>
			<th><?php echo $this->Paginator->sort('device_duration'); ?></th>
			<th><?php echo $this->Paginator->sort('device_availability'); ?></th>
			<th><?php echo $this->Paginator->sort('device_unavailability'); ?></th>
			<th><?php echo $this->Paginator->sort('implant_date'); ?></th>
			<th><?php echo $this->Paginator->sort('explant_date'); ?></th>
			<th><?php echo $this->Paginator->sort('implant_duration_type'); ?></th>
			<th><?php echo $this->Paginator->sort('implant_duration'); ?></th>
			<th><?php echo $this->Paginator->sort('specimen_type'); ?></th>
			<th><?php echo $this->Paginator->sort('patients_involved'); ?></th>
			<th><?php echo $this->Paginator->sort('tests_done'); ?></th>
			<th><?php echo $this->Paginator->sort('false_positives'); ?></th>
			<th><?php echo $this->Paginator->sort('false_negatives'); ?></th>
			<th><?php echo $this->Paginator->sort('true_positives'); ?></th>
			<th><?php echo $this->Paginator->sort('true_negatives'); ?></th>
			<th><?php echo $this->Paginator->sort('date_onset_incident'); ?></th>
			<th><?php echo $this->Paginator->sort('serious'); ?></th>
			<th><?php echo $this->Paginator->sort('serious_yes'); ?></th>
			<th><?php echo $this->Paginator->sort('death_date'); ?></th>
			<th><?php echo $this->Paginator->sort('description_of_reaction'); ?></th>
			<th><?php echo $this->Paginator->sort('remedial_action'); ?></th>
			<th><?php echo $this->Paginator->sort('outcome'); ?></th>
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
	<?php foreach ($devices as $device): ?>
	<tr>
		<td><?php echo h($device['Device']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($device['User']['name'], array('controller' => 'users', 'action' => 'view', $device['User']['id'])); ?>
		</td>
		<td><?php echo h($device['Device']['reference_no']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($device['County']['county_name'], array('controller' => 'counties', 'action' => 'view', $device['County']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($device['Designation']['name'], array('controller' => 'designations', 'action' => 'view', $device['Designation']['id'])); ?>
		</td>
		<td><?php echo h($device['Device']['report_type']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['name_of_institution']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['institution_code']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['institution_address']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['institution_contact']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['patient_name']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['patient_address']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['patient_phone']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['pregnancy_status']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['trimester']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['ip_no']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['date_of_birth']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['age_years']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['allergy']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['allergy_specify']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['problem_noted']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['brand_name']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['serial_no']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['commmon_name']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['catalogue']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['manufacturer_name']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['manufacturer_address']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['manufacture_date']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['expiry_date']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['operator']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['operator_specify']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['device_usage']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['device_duration_type']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['device_duration']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['device_availability']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['device_unavailability']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['implant_date']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['explant_date']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['implant_duration_type']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['implant_duration']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['specimen_type']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['patients_involved']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['tests_done']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['false_positives']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['false_negatives']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['true_positives']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['true_negatives']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['date_onset_incident']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['serious']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['serious_yes']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['death_date']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['description_of_reaction']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['remedial_action']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['outcome']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['reporter_name']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['reporter_email']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['reporter_phone']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['submitted']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['active']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['created']); ?>&nbsp;</td>
		<td><?php echo h($device['Device']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $device['Device']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $device['Device']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $device['Device']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $device['Device']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Device'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Counties'), array('controller' => 'counties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New County'), array('controller' => 'counties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Designations'), array('controller' => 'designations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Designation'), array('controller' => 'designations', 'action' => 'add')); ?> </li>
	</ul>
</div>
