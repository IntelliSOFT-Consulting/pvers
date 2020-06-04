<div class="counties view">
<h2><?php  echo __('County');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($county['County']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('County Name'); ?></dt>
		<dd>
			<?php echo h($county['County']['county_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($county['County']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($county['County']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit County'), array('action' => 'edit', $county['County']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete County'), array('action' => 'delete', $county['County']['id']), null, __('Are you sure you want to delete # %s?', $county['County']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Counties'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New County'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadrs'), array('controller' => 'sadrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr'), array('controller' => 'sadrs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Sadrs');?></h3>
	<?php if (!empty($county['Sadr'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('County Id'); ?></th>
		<th><?php echo __('Report Title'); ?></th>
		<th><?php echo __('Report Type'); ?></th>
		<th><?php echo __('Initial Report'); ?></th>
		<th><?php echo __('Follow Up Report'); ?></th>
		<th><?php echo __('Name Of Institution'); ?></th>
		<th><?php echo __('Institution Code'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Contact'); ?></th>
		<th><?php echo __('Patient Name'); ?></th>
		<th><?php echo __('Ip No'); ?></th>
		<th><?php echo __('Date Of Birth'); ?></th>
		<th><?php echo __('Patient Address'); ?></th>
		<th><?php echo __('Ward'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Gender Male'); ?></th>
		<th><?php echo __('Gender Female'); ?></th>
		<th><?php echo __('Known Allergy'); ?></th>
		<th><?php echo __('Known Allergy Specify'); ?></th>
		<th><?php echo __('Pregnancy Status'); ?></th>
		<th><?php echo __('Not Pregnant'); ?></th>
		<th><?php echo __('First Trimester'); ?></th>
		<th><?php echo __('Second Trimester'); ?></th>
		<th><?php echo __('Third Trimester'); ?></th>
		<th><?php echo __('Weight'); ?></th>
		<th><?php echo __('Height'); ?></th>
		<th><?php echo __('Diagnosis'); ?></th>
		<th><?php echo __('Date Of Onset Of Reaction'); ?></th>
		<th><?php echo __('Description Of Reaction'); ?></th>
		<th><?php echo __('Severity'); ?></th>
		<th><?php echo __('Severity Mild'); ?></th>
		<th><?php echo __('Severity Moderate'); ?></th>
		<th><?php echo __('Severity Severe'); ?></th>
		<th><?php echo __('Severity Fatal'); ?></th>
		<th><?php echo __('Severity Unknown'); ?></th>
		<th><?php echo __('Action Taken'); ?></th>
		<th><?php echo __('Drug Withdrawn'); ?></th>
		<th><?php echo __('Dose Increased'); ?></th>
		<th><?php echo __('Dose Reduced'); ?></th>
		<th><?php echo __('Dose Not Changed'); ?></th>
		<th><?php echo __('Action Unknown'); ?></th>
		<th><?php echo __('Outcome'); ?></th>
		<th><?php echo __('Recovering'); ?></th>
		<th><?php echo __('Recovered'); ?></th>
		<th><?php echo __('Requires Hospitalization'); ?></th>
		<th><?php echo __('Congenital Anomaly'); ?></th>
		<th><?php echo __('Prevent Permanent Damage'); ?></th>
		<th><?php echo __('Outcome Unknown'); ?></th>
		<th><?php echo __('Causality'); ?></th>
		<th><?php echo __('Certain'); ?></th>
		<th><?php echo __('Probable'); ?></th>
		<th><?php echo __('Possible'); ?></th>
		<th><?php echo __('Unlikely'); ?></th>
		<th><?php echo __('Conditional'); ?></th>
		<th><?php echo __('Unassessable'); ?></th>
		<th><?php echo __('Any Other Comment'); ?></th>
		<th><?php echo __('Reporter Name'); ?></th>
		<th><?php echo __('Report Date'); ?></th>
		<th><?php echo __('Reporter Email'); ?></th>
		<th><?php echo __('Reporter Phone'); ?></th>
		<th><?php echo __('Reporter Designation'); ?></th>
		<th><?php echo __('Reporter Signature'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($county['Sadr'] as $sadr): ?>
		<tr>
			<td><?php echo $sadr['id'];?></td>
			<td><?php echo $sadr['user_id'];?></td>
			<td><?php echo $sadr['county_id'];?></td>
			<td><?php echo $sadr['report_title'];?></td>
			<td><?php echo $sadr['report_type'];?></td>
			<td><?php echo $sadr['initial_report'];?></td>
			<td><?php echo $sadr['follow_up_report'];?></td>
			<td><?php echo $sadr['name_of_institution'];?></td>
			<td><?php echo $sadr['institution_code'];?></td>
			<td><?php echo $sadr['address'];?></td>
			<td><?php echo $sadr['contact'];?></td>
			<td><?php echo $sadr['patient_name'];?></td>
			<td><?php echo $sadr['ip_no'];?></td>
			<td><?php echo $sadr['date_of_birth'];?></td>
			<td><?php echo $sadr['patient_address'];?></td>
			<td><?php echo $sadr['ward'];?></td>
			<td><?php echo $sadr['gender'];?></td>
			<td><?php echo $sadr['gender_male'];?></td>
			<td><?php echo $sadr['gender_female'];?></td>
			<td><?php echo $sadr['known_allergy'];?></td>
			<td><?php echo $sadr['known_allergy_specify'];?></td>
			<td><?php echo $sadr['pregnancy_status'];?></td>
			<td><?php echo $sadr['not_pregnant'];?></td>
			<td><?php echo $sadr['first_trimester'];?></td>
			<td><?php echo $sadr['second_trimester'];?></td>
			<td><?php echo $sadr['third_trimester'];?></td>
			<td><?php echo $sadr['weight'];?></td>
			<td><?php echo $sadr['height'];?></td>
			<td><?php echo $sadr['diagnosis'];?></td>
			<td><?php echo $sadr['date_of_onset_of_reaction'];?></td>
			<td><?php echo $sadr['description_of_reaction'];?></td>
			<td><?php echo $sadr['severity'];?></td>
			<td><?php echo $sadr['severity_mild'];?></td>
			<td><?php echo $sadr['severity_moderate'];?></td>
			<td><?php echo $sadr['severity_severe'];?></td>
			<td><?php echo $sadr['severity_fatal'];?></td>
			<td><?php echo $sadr['severity_unknown'];?></td>
			<td><?php echo $sadr['action_taken'];?></td>
			<td><?php echo $sadr['drug_withdrawn'];?></td>
			<td><?php echo $sadr['dose_increased'];?></td>
			<td><?php echo $sadr['dose_reduced'];?></td>
			<td><?php echo $sadr['dose_not_changed'];?></td>
			<td><?php echo $sadr['action_unknown'];?></td>
			<td><?php echo $sadr['outcome'];?></td>
			<td><?php echo $sadr['recovering'];?></td>
			<td><?php echo $sadr['recovered'];?></td>
			<td><?php echo $sadr['requires_hospitalization'];?></td>
			<td><?php echo $sadr['congenital_anomaly'];?></td>
			<td><?php echo $sadr['prevent_permanent_damage'];?></td>
			<td><?php echo $sadr['outcome_unknown'];?></td>
			<td><?php echo $sadr['causality'];?></td>
			<td><?php echo $sadr['certain'];?></td>
			<td><?php echo $sadr['probable'];?></td>
			<td><?php echo $sadr['possible'];?></td>
			<td><?php echo $sadr['unlikely'];?></td>
			<td><?php echo $sadr['conditional'];?></td>
			<td><?php echo $sadr['unassessable'];?></td>
			<td><?php echo $sadr['any_other_comment'];?></td>
			<td><?php echo $sadr['reporter_name'];?></td>
			<td><?php echo $sadr['report_date'];?></td>
			<td><?php echo $sadr['reporter_email'];?></td>
			<td><?php echo $sadr['reporter_phone'];?></td>
			<td><?php echo $sadr['reporter_designation'];?></td>
			<td><?php echo $sadr['reporter_signature'];?></td>
			<td><?php echo $sadr['created'];?></td>
			<td><?php echo $sadr['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sadrs', 'action' => 'view', $sadr['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sadrs', 'action' => 'edit', $sadr['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sadrs', 'action' => 'delete', $sadr['id']), null, __('Are you sure you want to delete # %s?', $sadr['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Sadr'), array('controller' => 'sadrs', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
