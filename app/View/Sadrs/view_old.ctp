<div class="sadrs view">
<h2><?php  echo __('Sadr');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sadr['User']['id'], array('controller' => 'users', 'action' => 'view', $sadr['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Initial Report'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['initial_report']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Follow Up Report'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['follow_up_report']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name Of Institution'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['name_of_institution']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Institution Code'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['institution_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['contact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Name'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['patient_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip No'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['ip_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Birth'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['date_of_birth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Address'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['patient_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ward'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['ward']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender Male'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['gender_male']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender Female'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['gender_female']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Known Allergy'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['known_allergy']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pregnancy Status'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['pregnancy_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Trimester'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['first_trimester']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Second Trimester'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['second_trimester']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Third Trimester'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['third_trimester']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weight'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['weight']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Height'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['height']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diagnosis'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['diagnosis']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description Of Reaction'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['description_of_reaction']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Severity Mild'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['severity_mild']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Severity Moderate'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['severity_moderate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Severity Severe'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['severity_severe']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Severity Fatal'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['severity_fatal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Severity Unknown'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['severity_unknown']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Drug Withdrawn'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['drug_withdrawn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dose Increased'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['dose_increased']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dose Reduced'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['dose_reduced']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dose Not Changed'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['dose_not_changed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Action Unknown'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['action_unknown']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recovering'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['recovering']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recovered'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['recovered']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Requires Hospitalization'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['requires_hospitalization']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Congenital Anomaly'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['congenital_anomaly']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prevent Permanent Damage'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['prevent_permanent_damage']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Outcome Unknown'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['outcome_unknown']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Certain'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['certain']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Probable'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['probable']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Possible'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['possible']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unlikely'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['unlikely']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conditional'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['conditional']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unassessable'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['unassessable']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Any Other Comment'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['any_other_comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reporter Name'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['reporter_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Report Date'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['report_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reporter Email'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['reporter_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reporter Phone'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['reporter_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reporter Designation'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['reporter_designation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reporter Signature'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['reporter_signature']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($sadr['Sadr']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sadr'), array('action' => 'edit', $sadr['Sadr']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sadr'), array('action' => 'delete', $sadr['Sadr']['id']), null, __('Are you sure you want to delete # %s?', $sadr['Sadr']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadrs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments'), array('controller' => 'attachments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachment'), array('controller' => 'attachments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadr Known Allergies'), array('controller' => 'sadr_known_allergies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr Known Allergy'), array('controller' => 'sadr_known_allergies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadr List Of Drugs'), array('controller' => 'sadr_list_of_drugs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr List Of Drug'), array('controller' => 'sadr_list_of_drugs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Attachments');?></h3>
	<?php if (!empty($sadr['Attachment'])):?>
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
		foreach ($sadr['Attachment'] as $attachment): ?>
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
	<h3><?php echo __('Related Sadr Known Allergies');?></h3>
	<?php if (!empty($sadr['SadrKnownAllergy'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Sadr Id'); ?></th>
		<th><?php echo __('Known Allergy Specify'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($sadr['SadrKnownAllergy'] as $sadrKnownAllergy): ?>
		<tr>
			<td><?php echo $sadrKnownAllergy['id'];?></td>
			<td><?php echo $sadrKnownAllergy['sadr_id'];?></td>
			<td><?php echo $sadrKnownAllergy['known_allergy_specify'];?></td>
			<td><?php echo $sadrKnownAllergy['created'];?></td>
			<td><?php echo $sadrKnownAllergy['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sadr_known_allergies', 'action' => 'view', $sadrKnownAllergy['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sadr_known_allergies', 'action' => 'edit', $sadrKnownAllergy['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sadr_known_allergies', 'action' => 'delete', $sadrKnownAllergy['id']), null, __('Are you sure you want to delete # %s?', $sadrKnownAllergy['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Sadr Known Allergy'), array('controller' => 'sadr_known_allergies', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Sadr List Of Drugs');?></h3>
	<?php if (!empty($sadr['SadrListOfDrug'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Sadr Id'); ?></th>
		<th><?php echo __('Drug Name'); ?></th>
		<th><?php echo __('Dose'); ?></th>
		<th><?php echo __('Route'); ?></th>
		<th><?php echo __('Frequency'); ?></th>
		<th><?php echo __('Start Date'); ?></th>
		<th><?php echo __('Stop Date'); ?></th>
		<th><?php echo __('Indication'); ?></th>
		<th><?php echo __('Suspected Drug'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($sadr['SadrListOfDrug'] as $sadrListOfDrug): ?>
		<tr>
			<td><?php echo $sadrListOfDrug['id'];?></td>
			<td><?php echo $sadrListOfDrug['sadr_id'];?></td>
			<td><?php echo $sadrListOfDrug['drug_name'];?></td>
			<td><?php echo $sadrListOfDrug['dose'];?></td>
			<td><?php echo $sadrListOfDrug['route'];?></td>
			<td><?php echo $sadrListOfDrug['frequency'];?></td>
			<td><?php echo $sadrListOfDrug['start_date'];?></td>
			<td><?php echo $sadrListOfDrug['stop_date'];?></td>
			<td><?php echo $sadrListOfDrug['indication'];?></td>
			<td><?php echo $sadrListOfDrug['suspected_drug'];?></td>
			<td><?php echo $sadrListOfDrug['created'];?></td>
			<td><?php echo $sadrListOfDrug['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sadr_list_of_drugs', 'action' => 'view', $sadrListOfDrug['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sadr_list_of_drugs', 'action' => 'edit', $sadrListOfDrug['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sadr_list_of_drugs', 'action' => 'delete', $sadrListOfDrug['id']), null, __('Are you sure you want to delete # %s?', $sadrListOfDrug['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Sadr List Of Drug'), array('controller' => 'sadr_list_of_drugs', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
