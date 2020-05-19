<div class="devices view">
<h2><?php echo __('Device'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($device['Device']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($device['User']['name'], array('controller' => 'users', 'action' => 'view', $device['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reference No'); ?></dt>
		<dd>
			<?php echo h($device['Device']['reference_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('County'); ?></dt>
		<dd>
			<?php echo $this->Html->link($device['County']['county_name'], array('controller' => 'counties', 'action' => 'view', $device['County']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Designation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($device['Designation']['name'], array('controller' => 'designations', 'action' => 'view', $device['Designation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Report Type'); ?></dt>
		<dd>
			<?php echo h($device['Device']['report_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name Of Institution'); ?></dt>
		<dd>
			<?php echo h($device['Device']['name_of_institution']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Institution Code'); ?></dt>
		<dd>
			<?php echo h($device['Device']['institution_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Institution Address'); ?></dt>
		<dd>
			<?php echo h($device['Device']['institution_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Institution Contact'); ?></dt>
		<dd>
			<?php echo h($device['Device']['institution_contact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Name'); ?></dt>
		<dd>
			<?php echo h($device['Device']['patient_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Address'); ?></dt>
		<dd>
			<?php echo h($device['Device']['patient_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Phone'); ?></dt>
		<dd>
			<?php echo h($device['Device']['patient_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pregnancy Status'); ?></dt>
		<dd>
			<?php echo h($device['Device']['pregnancy_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trimester'); ?></dt>
		<dd>
			<?php echo h($device['Device']['trimester']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip No'); ?></dt>
		<dd>
			<?php echo h($device['Device']['ip_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Birth'); ?></dt>
		<dd>
			<?php echo h($device['Device']['date_of_birth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age Years'); ?></dt>
		<dd>
			<?php echo h($device['Device']['age_years']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Allergy'); ?></dt>
		<dd>
			<?php echo h($device['Device']['allergy']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Allergy Specify'); ?></dt>
		<dd>
			<?php echo h($device['Device']['allergy_specify']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Problem Noted'); ?></dt>
		<dd>
			<?php echo h($device['Device']['problem_noted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brand Name'); ?></dt>
		<dd>
			<?php echo h($device['Device']['brand_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Serial No'); ?></dt>
		<dd>
			<?php echo h($device['Device']['serial_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Commmon Name'); ?></dt>
		<dd>
			<?php echo h($device['Device']['commmon_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Catalogue'); ?></dt>
		<dd>
			<?php echo h($device['Device']['catalogue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufacturer Name'); ?></dt>
		<dd>
			<?php echo h($device['Device']['manufacturer_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufacturer Address'); ?></dt>
		<dd>
			<?php echo h($device['Device']['manufacturer_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manufacture Date'); ?></dt>
		<dd>
			<?php echo h($device['Device']['manufacture_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expiry Date'); ?></dt>
		<dd>
			<?php echo h($device['Device']['expiry_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Operator'); ?></dt>
		<dd>
			<?php echo h($device['Device']['operator']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Operator Specify'); ?></dt>
		<dd>
			<?php echo h($device['Device']['operator_specify']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device Usage'); ?></dt>
		<dd>
			<?php echo h($device['Device']['device_usage']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device Duration Type'); ?></dt>
		<dd>
			<?php echo h($device['Device']['device_duration_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device Duration'); ?></dt>
		<dd>
			<?php echo h($device['Device']['device_duration']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device Availability'); ?></dt>
		<dd>
			<?php echo h($device['Device']['device_availability']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Device Unavailability'); ?></dt>
		<dd>
			<?php echo h($device['Device']['device_unavailability']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Implant Date'); ?></dt>
		<dd>
			<?php echo h($device['Device']['implant_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Explant Date'); ?></dt>
		<dd>
			<?php echo h($device['Device']['explant_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Implant Duration Type'); ?></dt>
		<dd>
			<?php echo h($device['Device']['implant_duration_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Implant Duration'); ?></dt>
		<dd>
			<?php echo h($device['Device']['implant_duration']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Specimen Type'); ?></dt>
		<dd>
			<?php echo h($device['Device']['specimen_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patients Involved'); ?></dt>
		<dd>
			<?php echo h($device['Device']['patients_involved']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tests Done'); ?></dt>
		<dd>
			<?php echo h($device['Device']['tests_done']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('False Positives'); ?></dt>
		<dd>
			<?php echo h($device['Device']['false_positives']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('False Negatives'); ?></dt>
		<dd>
			<?php echo h($device['Device']['false_negatives']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('True Positives'); ?></dt>
		<dd>
			<?php echo h($device['Device']['true_positives']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('True Negatives'); ?></dt>
		<dd>
			<?php echo h($device['Device']['true_negatives']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Onset Incident'); ?></dt>
		<dd>
			<?php echo h($device['Device']['date_onset_incident']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Serious'); ?></dt>
		<dd>
			<?php echo h($device['Device']['serious']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Serious Yes'); ?></dt>
		<dd>
			<?php echo h($device['Device']['serious_yes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Death Date'); ?></dt>
		<dd>
			<?php echo h($device['Device']['death_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description Of Reaction'); ?></dt>
		<dd>
			<?php echo h($device['Device']['description_of_reaction']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remedial Action'); ?></dt>
		<dd>
			<?php echo h($device['Device']['remedial_action']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Outcome'); ?></dt>
		<dd>
			<?php echo h($device['Device']['outcome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reporter Name'); ?></dt>
		<dd>
			<?php echo h($device['Device']['reporter_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reporter Email'); ?></dt>
		<dd>
			<?php echo h($device['Device']['reporter_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reporter Phone'); ?></dt>
		<dd>
			<?php echo h($device['Device']['reporter_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Submitted'); ?></dt>
		<dd>
			<?php echo h($device['Device']['submitted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($device['Device']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($device['Device']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($device['Device']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Device'), array('action' => 'edit', $device['Device']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Device'), array('action' => 'delete', $device['Device']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $device['Device']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Devices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Device'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Counties'), array('controller' => 'counties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New County'), array('controller' => 'counties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Designations'), array('controller' => 'designations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Designation'), array('controller' => 'designations', 'action' => 'add')); ?> </li>
	</ul>
</div>
