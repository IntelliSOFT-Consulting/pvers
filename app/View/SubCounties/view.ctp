<div class="subCounties view">
<h2><?php echo __('Sub County'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('County'); ?></dt>
		<dd>
			<?php echo $this->Html->link($subCounty['County']['county_name'], array('controller' => 'counties', 'action' => 'view', $subCounty['County']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sub County Name'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['sub_county_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('County Name'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['county_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Province'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['Province']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pop 2009'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['Pop_2009']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('RegVoters'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['RegVoters']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('AreaSqKms'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['AreaSqKms']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CAWards'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['CAWards']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('MainEthnicGroup'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['MainEthnicGroup']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($subCounty['SubCounty']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sub County'), array('action' => 'edit', $subCounty['SubCounty']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sub County'), array('action' => 'delete', $subCounty['SubCounty']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $subCounty['SubCounty']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Sub Counties'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sub County'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Counties'), array('controller' => 'counties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New County'), array('controller' => 'counties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aefis'), array('controller' => 'aefis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aefi'), array('controller' => 'aefis', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Padrs'), array('controller' => 'padrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Padr'), array('controller' => 'padrs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pqmps'), array('controller' => 'pqmps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pqmp'), array('controller' => 'pqmps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadrs'), array('controller' => 'sadrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr'), array('controller' => 'sadrs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Aefis'); ?></h3>
	<?php if (!empty($subCounty['Aefi'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Reference No'); ?></th>
		<th><?php echo __('Aefi Id'); ?></th>
		<th><?php echo __('County Id'); ?></th>
		<th><?php echo __('Sub County Id'); ?></th>
		<th><?php echo __('Vigiflow Ref'); ?></th>
		<th><?php echo __('Designation Id'); ?></th>
		<th><?php echo __('Report Type'); ?></th>
		<th><?php echo __('Name Of Institution'); ?></th>
		<th><?php echo __('Institution Code'); ?></th>
		<th><?php echo __('Patient Name'); ?></th>
		<th><?php echo __('Guardian Name'); ?></th>
		<th><?php echo __('Patient Address'); ?></th>
		<th><?php echo __('Patient Phone'); ?></th>
		<th><?php echo __('Patient Village'); ?></th>
		<th><?php echo __('Ip No'); ?></th>
		<th><?php echo __('Date Of Birth'); ?></th>
		<th><?php echo __('Age Months'); ?></th>
		<th><?php echo __('Patient Ward'); ?></th>
		<th><?php echo __('Patient County'); ?></th>
		<th><?php echo __('Patient Sub County'); ?></th>
		<th><?php echo __('Vaccination Center'); ?></th>
		<th><?php echo __('Vaccination County'); ?></th>
		<th><?php echo __('Vaccination Type'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Bcg'); ?></th>
		<th><?php echo __('Convulsion'); ?></th>
		<th><?php echo __('Urticaria'); ?></th>
		<th><?php echo __('High Fever'); ?></th>
		<th><?php echo __('Abscess'); ?></th>
		<th><?php echo __('Local Reaction'); ?></th>
		<th><?php echo __('Anaphylaxis'); ?></th>
		<th><?php echo __('Meningitis'); ?></th>
		<th><?php echo __('Paralysis'); ?></th>
		<th><?php echo __('Toxic Shock'); ?></th>
		<th><?php echo __('Complaint Other'); ?></th>
		<th><?php echo __('Complaint Other Specify'); ?></th>
		<th><?php echo __('Description Of Reaction'); ?></th>
		<th><?php echo __('Date Aefi Started'); ?></th>
		<th><?php echo __('Time Aefi Started'); ?></th>
		<th><?php echo __('Aefi Symptoms'); ?></th>
		<th><?php echo __('Serious'); ?></th>
		<th><?php echo __('Serious Yes'); ?></th>
		<th><?php echo __('Serious Other'); ?></th>
		<th><?php echo __('Medical History'); ?></th>
		<th><?php echo __('Treatment Given'); ?></th>
		<th><?php echo __('Specimen Collected'); ?></th>
		<th><?php echo __('Outcome'); ?></th>
		<th><?php echo __('Reporter Name'); ?></th>
		<th><?php echo __('Reporter Email'); ?></th>
		<th><?php echo __('Reporter Phone'); ?></th>
		<th><?php echo __('Submitted'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Device'); ?></th>
		<th><?php echo __('Copied'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
		<th><?php echo __('Deleted Date'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($subCounty['Aefi'] as $aefi): ?>
		<tr>
			<td><?php echo $aefi['id']; ?></td>
			<td><?php echo $aefi['user_id']; ?></td>
			<td><?php echo $aefi['reference_no']; ?></td>
			<td><?php echo $aefi['aefi_id']; ?></td>
			<td><?php echo $aefi['county_id']; ?></td>
			<td><?php echo $aefi['sub_county_id']; ?></td>
			<td><?php echo $aefi['vigiflow_ref']; ?></td>
			<td><?php echo $aefi['designation_id']; ?></td>
			<td><?php echo $aefi['report_type']; ?></td>
			<td><?php echo $aefi['name_of_institution']; ?></td>
			<td><?php echo $aefi['institution_code']; ?></td>
			<td><?php echo $aefi['patient_name']; ?></td>
			<td><?php echo $aefi['guardian_name']; ?></td>
			<td><?php echo $aefi['patient_address']; ?></td>
			<td><?php echo $aefi['patient_phone']; ?></td>
			<td><?php echo $aefi['patient_village']; ?></td>
			<td><?php echo $aefi['ip_no']; ?></td>
			<td><?php echo $aefi['date_of_birth']; ?></td>
			<td><?php echo $aefi['age_months']; ?></td>
			<td><?php echo $aefi['patient_ward']; ?></td>
			<td><?php echo $aefi['patient_county']; ?></td>
			<td><?php echo $aefi['patient_sub_county']; ?></td>
			<td><?php echo $aefi['vaccination_center']; ?></td>
			<td><?php echo $aefi['vaccination_county']; ?></td>
			<td><?php echo $aefi['vaccination_type']; ?></td>
			<td><?php echo $aefi['gender']; ?></td>
			<td><?php echo $aefi['bcg']; ?></td>
			<td><?php echo $aefi['convulsion']; ?></td>
			<td><?php echo $aefi['urticaria']; ?></td>
			<td><?php echo $aefi['high_fever']; ?></td>
			<td><?php echo $aefi['abscess']; ?></td>
			<td><?php echo $aefi['local_reaction']; ?></td>
			<td><?php echo $aefi['anaphylaxis']; ?></td>
			<td><?php echo $aefi['meningitis']; ?></td>
			<td><?php echo $aefi['paralysis']; ?></td>
			<td><?php echo $aefi['toxic_shock']; ?></td>
			<td><?php echo $aefi['complaint_other']; ?></td>
			<td><?php echo $aefi['complaint_other_specify']; ?></td>
			<td><?php echo $aefi['description_of_reaction']; ?></td>
			<td><?php echo $aefi['date_aefi_started']; ?></td>
			<td><?php echo $aefi['time_aefi_started']; ?></td>
			<td><?php echo $aefi['aefi_symptoms']; ?></td>
			<td><?php echo $aefi['serious']; ?></td>
			<td><?php echo $aefi['serious_yes']; ?></td>
			<td><?php echo $aefi['serious_other']; ?></td>
			<td><?php echo $aefi['medical_history']; ?></td>
			<td><?php echo $aefi['treatment_given']; ?></td>
			<td><?php echo $aefi['specimen_collected']; ?></td>
			<td><?php echo $aefi['outcome']; ?></td>
			<td><?php echo $aefi['reporter_name']; ?></td>
			<td><?php echo $aefi['reporter_email']; ?></td>
			<td><?php echo $aefi['reporter_phone']; ?></td>
			<td><?php echo $aefi['submitted']; ?></td>
			<td><?php echo $aefi['active']; ?></td>
			<td><?php echo $aefi['device']; ?></td>
			<td><?php echo $aefi['copied']; ?></td>
			<td><?php echo $aefi['deleted']; ?></td>
			<td><?php echo $aefi['deleted_date']; ?></td>
			<td><?php echo $aefi['created']; ?></td>
			<td><?php echo $aefi['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'aefis', 'action' => 'view', $aefi['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'aefis', 'action' => 'edit', $aefi['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'aefis', 'action' => 'delete', $aefi['id']), array('confirm' => __('Are you sure you want to delete # %s?', $aefi['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Aefi'), array('controller' => 'aefis', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Padrs'); ?></h3>
	<?php if (!empty($subCounty['Padr'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Padr Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('County Id'); ?></th>
		<th><?php echo __('Sub County Id'); ?></th>
		<th><?php echo __('Designation Id'); ?></th>
		<th><?php echo __('Reference No'); ?></th>
		<th><?php echo __('Token'); ?></th>
		<th><?php echo __('Relation'); ?></th>
		<th><?php echo __('Vigiflow Id'); ?></th>
		<th><?php echo __('Report Title'); ?></th>
		<th><?php echo __('Report Type'); ?></th>
		<th><?php echo __('Report Sadr'); ?></th>
		<th><?php echo __('Report Therapeutic'); ?></th>
		<th><?php echo __('Medicinal Product'); ?></th>
		<th><?php echo __('Blood Products'); ?></th>
		<th><?php echo __('Herbal Product'); ?></th>
		<th><?php echo __('Cosmeceuticals'); ?></th>
		<th><?php echo __('Product Other'); ?></th>
		<th><?php echo __('Product Specify'); ?></th>
		<th><?php echo __('Name Of Institution'); ?></th>
		<th><?php echo __('Institution Code'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Contact'); ?></th>
		<th><?php echo __('Patient Name'); ?></th>
		<th><?php echo __('Ip No'); ?></th>
		<th><?php echo __('Date Of Birth'); ?></th>
		<th><?php echo __('Age Group'); ?></th>
		<th><?php echo __('Patient Address'); ?></th>
		<th><?php echo __('Ward'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Known Allergy'); ?></th>
		<th><?php echo __('Known Allergy Specify'); ?></th>
		<th><?php echo __('Pregnant'); ?></th>
		<th><?php echo __('Pregnancy Status'); ?></th>
		<th><?php echo __('Weight'); ?></th>
		<th><?php echo __('Height'); ?></th>
		<th><?php echo __('Diagnosis'); ?></th>
		<th><?php echo __('Medical History'); ?></th>
		<th><?php echo __('Date Of Onset Of Reaction'); ?></th>
		<th><?php echo __('Date Of End Of Reaction'); ?></th>
		<th><?php echo __('Description Of Reaction'); ?></th>
		<th><?php echo __('Reaction Resolve'); ?></th>
		<th><?php echo __('Reaction Reappear'); ?></th>
		<th><?php echo __('Lab Investigation'); ?></th>
		<th><?php echo __('Severity'); ?></th>
		<th><?php echo __('Serious'); ?></th>
		<th><?php echo __('Serious Reason'); ?></th>
		<th><?php echo __('Action Taken'); ?></th>
		<th><?php echo __('Outcome'); ?></th>
		<th><?php echo __('Causality'); ?></th>
		<th><?php echo __('Any Other Comment'); ?></th>
		<th><?php echo __('Reporter Name'); ?></th>
		<th><?php echo __('Reporter Email'); ?></th>
		<th><?php echo __('Reporter Phone'); ?></th>
		<th><?php echo __('Submitted'); ?></th>
		<th><?php echo __('Emails'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Device'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
		<th><?php echo __('Deleted Date'); ?></th>
		<th><?php echo __('Notified'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Reporter Date'); ?></th>
		<th><?php echo __('Reporter Name Diff'); ?></th>
		<th><?php echo __('Reporter Designation Diff'); ?></th>
		<th><?php echo __('Reporter Email Diff'); ?></th>
		<th><?php echo __('Reporter Phone Diff'); ?></th>
		<th><?php echo __('Reporter Date Diff'); ?></th>
		<th><?php echo __('Reaction On'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($subCounty['Padr'] as $padr): ?>
		<tr>
			<td><?php echo $padr['id']; ?></td>
			<td><?php echo $padr['padr_id']; ?></td>
			<td><?php echo $padr['user_id']; ?></td>
			<td><?php echo $padr['county_id']; ?></td>
			<td><?php echo $padr['sub_county_id']; ?></td>
			<td><?php echo $padr['designation_id']; ?></td>
			<td><?php echo $padr['reference_no']; ?></td>
			<td><?php echo $padr['token']; ?></td>
			<td><?php echo $padr['relation']; ?></td>
			<td><?php echo $padr['vigiflow_id']; ?></td>
			<td><?php echo $padr['report_title']; ?></td>
			<td><?php echo $padr['report_type']; ?></td>
			<td><?php echo $padr['report_sadr']; ?></td>
			<td><?php echo $padr['report_therapeutic']; ?></td>
			<td><?php echo $padr['medicinal_product']; ?></td>
			<td><?php echo $padr['blood_products']; ?></td>
			<td><?php echo $padr['herbal_product']; ?></td>
			<td><?php echo $padr['cosmeceuticals']; ?></td>
			<td><?php echo $padr['product_other']; ?></td>
			<td><?php echo $padr['product_specify']; ?></td>
			<td><?php echo $padr['name_of_institution']; ?></td>
			<td><?php echo $padr['institution_code']; ?></td>
			<td><?php echo $padr['address']; ?></td>
			<td><?php echo $padr['contact']; ?></td>
			<td><?php echo $padr['patient_name']; ?></td>
			<td><?php echo $padr['ip_no']; ?></td>
			<td><?php echo $padr['date_of_birth']; ?></td>
			<td><?php echo $padr['age_group']; ?></td>
			<td><?php echo $padr['patient_address']; ?></td>
			<td><?php echo $padr['ward']; ?></td>
			<td><?php echo $padr['gender']; ?></td>
			<td><?php echo $padr['known_allergy']; ?></td>
			<td><?php echo $padr['known_allergy_specify']; ?></td>
			<td><?php echo $padr['pregnant']; ?></td>
			<td><?php echo $padr['pregnancy_status']; ?></td>
			<td><?php echo $padr['weight']; ?></td>
			<td><?php echo $padr['height']; ?></td>
			<td><?php echo $padr['diagnosis']; ?></td>
			<td><?php echo $padr['medical_history']; ?></td>
			<td><?php echo $padr['date_of_onset_of_reaction']; ?></td>
			<td><?php echo $padr['date_of_end_of_reaction']; ?></td>
			<td><?php echo $padr['description_of_reaction']; ?></td>
			<td><?php echo $padr['reaction_resolve']; ?></td>
			<td><?php echo $padr['reaction_reappear']; ?></td>
			<td><?php echo $padr['lab_investigation']; ?></td>
			<td><?php echo $padr['severity']; ?></td>
			<td><?php echo $padr['serious']; ?></td>
			<td><?php echo $padr['serious_reason']; ?></td>
			<td><?php echo $padr['action_taken']; ?></td>
			<td><?php echo $padr['outcome']; ?></td>
			<td><?php echo $padr['causality']; ?></td>
			<td><?php echo $padr['any_other_comment']; ?></td>
			<td><?php echo $padr['reporter_name']; ?></td>
			<td><?php echo $padr['reporter_email']; ?></td>
			<td><?php echo $padr['reporter_phone']; ?></td>
			<td><?php echo $padr['submitted']; ?></td>
			<td><?php echo $padr['emails']; ?></td>
			<td><?php echo $padr['active']; ?></td>
			<td><?php echo $padr['device']; ?></td>
			<td><?php echo $padr['deleted']; ?></td>
			<td><?php echo $padr['deleted_date']; ?></td>
			<td><?php echo $padr['notified']; ?></td>
			<td><?php echo $padr['created']; ?></td>
			<td><?php echo $padr['modified']; ?></td>
			<td><?php echo $padr['reporter_date']; ?></td>
			<td><?php echo $padr['reporter_name_diff']; ?></td>
			<td><?php echo $padr['reporter_designation_diff']; ?></td>
			<td><?php echo $padr['reporter_email_diff']; ?></td>
			<td><?php echo $padr['reporter_phone_diff']; ?></td>
			<td><?php echo $padr['reporter_date_diff']; ?></td>
			<td><?php echo $padr['reaction_on']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'padrs', 'action' => 'view', $padr['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'padrs', 'action' => 'edit', $padr['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'padrs', 'action' => 'delete', $padr['id']), array('confirm' => __('Are you sure you want to delete # %s?', $padr['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Padr'), array('controller' => 'padrs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Pqmps'); ?></h3>
	<?php if (!empty($subCounty['Pqmp'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Pqmp Id'); ?></th>
		<th><?php echo __('County Id'); ?></th>
		<th><?php echo __('Sub County Id'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Designation Id'); ?></th>
		<th><?php echo __('Reference No'); ?></th>
		<th><?php echo __('Facility Name'); ?></th>
		<th><?php echo __('Facility Code'); ?></th>
		<th><?php echo __('Facility Address'); ?></th>
		<th><?php echo __('Facility Phone'); ?></th>
		<th><?php echo __('Brand Name'); ?></th>
		<th><?php echo __('Generic Name'); ?></th>
		<th><?php echo __('Batch Number'); ?></th>
		<th><?php echo __('Manufacture Date'); ?></th>
		<th><?php echo __('Expiry Date'); ?></th>
		<th><?php echo __('Receipt Date'); ?></th>
		<th><?php echo __('Name Of Manufacturer'); ?></th>
		<th><?php echo __('Country Of Origin'); ?></th>
		<th><?php echo __('Supplier Name'); ?></th>
		<th><?php echo __('Supplier Address'); ?></th>
		<th><?php echo __('Product Formulation'); ?></th>
		<th><?php echo __('Product Formulation Specify'); ?></th>
		<th><?php echo __('Colour Change'); ?></th>
		<th><?php echo __('Separating'); ?></th>
		<th><?php echo __('Powdering'); ?></th>
		<th><?php echo __('Caking'); ?></th>
		<th><?php echo __('Moulding'); ?></th>
		<th><?php echo __('Odour Change'); ?></th>
		<th><?php echo __('Mislabeling'); ?></th>
		<th><?php echo __('Incomplete Pack'); ?></th>
		<th><?php echo __('Therapeutic Ineffectiveness'); ?></th>
		<th><?php echo __('Particulate Matter'); ?></th>
		<th><?php echo __('Complaint Other'); ?></th>
		<th><?php echo __('Complaint Other Specify'); ?></th>
		<th><?php echo __('Complaint Description'); ?></th>
		<th><?php echo __('Require Refrigeration'); ?></th>
		<th><?php echo __('Product At Facility'); ?></th>
		<th><?php echo __('Returned By Client'); ?></th>
		<th><?php echo __('Stored To Recommendations'); ?></th>
		<th><?php echo __('Other Details'); ?></th>
		<th><?php echo __('Comments'); ?></th>
		<th><?php echo __('Reporter Name'); ?></th>
		<th><?php echo __('Reporter Email'); ?></th>
		<th><?php echo __('Contact Number'); ?></th>
		<th><?php echo __('Emails'); ?></th>
		<th><?php echo __('Submitted'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Device'); ?></th>
		<th><?php echo __('Copied'); ?></th>
		<th><?php echo __('Notified'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Medicinal Product'); ?></th>
		<th><?php echo __('Blood Products'); ?></th>
		<th><?php echo __('Herbal Product'); ?></th>
		<th><?php echo __('Medical Device'); ?></th>
		<th><?php echo __('Cosmeceuticals'); ?></th>
		<th><?php echo __('Product Other'); ?></th>
		<th><?php echo __('Product Specify'); ?></th>
		<th><?php echo __('Product Vaccine'); ?></th>
		<th><?php echo __('Packaging'); ?></th>
		<th><?php echo __('Labelling'); ?></th>
		<th><?php echo __('Sampling'); ?></th>
		<th><?php echo __('Mechanism'); ?></th>
		<th><?php echo __('Electrical'); ?></th>
		<th><?php echo __('Device Data'); ?></th>
		<th><?php echo __('Software'); ?></th>
		<th><?php echo __('Environmental'); ?></th>
		<th><?php echo __('Failure To Calibrate'); ?></th>
		<th><?php echo __('Results'); ?></th>
		<th><?php echo __('Readings'); ?></th>
		<th><?php echo __('Cold Chain'); ?></th>
		<th><?php echo __('Reporter Date'); ?></th>
		<th><?php echo __('Person Submitting'); ?></th>
		<th><?php echo __('Reporter Name Diff'); ?></th>
		<th><?php echo __('Reporter Designation Diff'); ?></th>
		<th><?php echo __('Reporter Email Diff'); ?></th>
		<th><?php echo __('Reporter Phone Diff'); ?></th>
		<th><?php echo __('Reporter Date Diff'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($subCounty['Pqmp'] as $pqmp): ?>
		<tr>
			<td><?php echo $pqmp['id']; ?></td>
			<td><?php echo $pqmp['user_id']; ?></td>
			<td><?php echo $pqmp['pqmp_id']; ?></td>
			<td><?php echo $pqmp['county_id']; ?></td>
			<td><?php echo $pqmp['sub_county_id']; ?></td>
			<td><?php echo $pqmp['country_id']; ?></td>
			<td><?php echo $pqmp['designation_id']; ?></td>
			<td><?php echo $pqmp['reference_no']; ?></td>
			<td><?php echo $pqmp['facility_name']; ?></td>
			<td><?php echo $pqmp['facility_code']; ?></td>
			<td><?php echo $pqmp['facility_address']; ?></td>
			<td><?php echo $pqmp['facility_phone']; ?></td>
			<td><?php echo $pqmp['brand_name']; ?></td>
			<td><?php echo $pqmp['generic_name']; ?></td>
			<td><?php echo $pqmp['batch_number']; ?></td>
			<td><?php echo $pqmp['manufacture_date']; ?></td>
			<td><?php echo $pqmp['expiry_date']; ?></td>
			<td><?php echo $pqmp['receipt_date']; ?></td>
			<td><?php echo $pqmp['name_of_manufacturer']; ?></td>
			<td><?php echo $pqmp['country_of_origin']; ?></td>
			<td><?php echo $pqmp['supplier_name']; ?></td>
			<td><?php echo $pqmp['supplier_address']; ?></td>
			<td><?php echo $pqmp['product_formulation']; ?></td>
			<td><?php echo $pqmp['product_formulation_specify']; ?></td>
			<td><?php echo $pqmp['colour_change']; ?></td>
			<td><?php echo $pqmp['separating']; ?></td>
			<td><?php echo $pqmp['powdering']; ?></td>
			<td><?php echo $pqmp['caking']; ?></td>
			<td><?php echo $pqmp['moulding']; ?></td>
			<td><?php echo $pqmp['odour_change']; ?></td>
			<td><?php echo $pqmp['mislabeling']; ?></td>
			<td><?php echo $pqmp['incomplete_pack']; ?></td>
			<td><?php echo $pqmp['therapeutic_ineffectiveness']; ?></td>
			<td><?php echo $pqmp['particulate_matter']; ?></td>
			<td><?php echo $pqmp['complaint_other']; ?></td>
			<td><?php echo $pqmp['complaint_other_specify']; ?></td>
			<td><?php echo $pqmp['complaint_description']; ?></td>
			<td><?php echo $pqmp['require_refrigeration']; ?></td>
			<td><?php echo $pqmp['product_at_facility']; ?></td>
			<td><?php echo $pqmp['returned_by_client']; ?></td>
			<td><?php echo $pqmp['stored_to_recommendations']; ?></td>
			<td><?php echo $pqmp['other_details']; ?></td>
			<td><?php echo $pqmp['comments']; ?></td>
			<td><?php echo $pqmp['reporter_name']; ?></td>
			<td><?php echo $pqmp['reporter_email']; ?></td>
			<td><?php echo $pqmp['contact_number']; ?></td>
			<td><?php echo $pqmp['emails']; ?></td>
			<td><?php echo $pqmp['submitted']; ?></td>
			<td><?php echo $pqmp['active']; ?></td>
			<td><?php echo $pqmp['device']; ?></td>
			<td><?php echo $pqmp['copied']; ?></td>
			<td><?php echo $pqmp['notified']; ?></td>
			<td><?php echo $pqmp['created']; ?></td>
			<td><?php echo $pqmp['modified']; ?></td>
			<td><?php echo $pqmp['medicinal_product']; ?></td>
			<td><?php echo $pqmp['blood_products']; ?></td>
			<td><?php echo $pqmp['herbal_product']; ?></td>
			<td><?php echo $pqmp['medical_device']; ?></td>
			<td><?php echo $pqmp['cosmeceuticals']; ?></td>
			<td><?php echo $pqmp['product_other']; ?></td>
			<td><?php echo $pqmp['product_specify']; ?></td>
			<td><?php echo $pqmp['product_vaccine']; ?></td>
			<td><?php echo $pqmp['packaging']; ?></td>
			<td><?php echo $pqmp['labelling']; ?></td>
			<td><?php echo $pqmp['sampling']; ?></td>
			<td><?php echo $pqmp['mechanism']; ?></td>
			<td><?php echo $pqmp['electrical']; ?></td>
			<td><?php echo $pqmp['device_data']; ?></td>
			<td><?php echo $pqmp['software']; ?></td>
			<td><?php echo $pqmp['environmental']; ?></td>
			<td><?php echo $pqmp['failure_to_calibrate']; ?></td>
			<td><?php echo $pqmp['results']; ?></td>
			<td><?php echo $pqmp['readings']; ?></td>
			<td><?php echo $pqmp['cold_chain']; ?></td>
			<td><?php echo $pqmp['reporter_date']; ?></td>
			<td><?php echo $pqmp['person_submitting']; ?></td>
			<td><?php echo $pqmp['reporter_name_diff']; ?></td>
			<td><?php echo $pqmp['reporter_designation_diff']; ?></td>
			<td><?php echo $pqmp['reporter_email_diff']; ?></td>
			<td><?php echo $pqmp['reporter_phone_diff']; ?></td>
			<td><?php echo $pqmp['reporter_date_diff']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pqmps', 'action' => 'view', $pqmp['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pqmps', 'action' => 'edit', $pqmp['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pqmps', 'action' => 'delete', $pqmp['id']), array('confirm' => __('Are you sure you want to delete # %s?', $pqmp['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pqmp'), array('controller' => 'pqmps', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Sadrs'); ?></h3>
	<?php if (!empty($subCounty['Sadr'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Sadr Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('County Id'); ?></th>
		<th><?php echo __('Sub County Id'); ?></th>
		<th><?php echo __('Designation Id'); ?></th>
		<th><?php echo __('Reference No'); ?></th>
		<th><?php echo __('Vigiflow Id'); ?></th>
		<th><?php echo __('Report Title'); ?></th>
		<th><?php echo __('Report Type'); ?></th>
		<th><?php echo __('Report Sadr'); ?></th>
		<th><?php echo __('Report Therapeutic'); ?></th>
		<th><?php echo __('Medicinal Product'); ?></th>
		<th><?php echo __('Blood Products'); ?></th>
		<th><?php echo __('Herbal Product'); ?></th>
		<th><?php echo __('Cosmeceuticals'); ?></th>
		<th><?php echo __('Product Other'); ?></th>
		<th><?php echo __('Product Specify'); ?></th>
		<th><?php echo __('Name Of Institution'); ?></th>
		<th><?php echo __('Institution Code'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Contact'); ?></th>
		<th><?php echo __('Patient Name'); ?></th>
		<th><?php echo __('Ip No'); ?></th>
		<th><?php echo __('Date Of Birth'); ?></th>
		<th><?php echo __('Age Group'); ?></th>
		<th><?php echo __('Patient Address'); ?></th>
		<th><?php echo __('Ward'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Known Allergy'); ?></th>
		<th><?php echo __('Known Allergy Specify'); ?></th>
		<th><?php echo __('Pregnant'); ?></th>
		<th><?php echo __('Pregnancy Status'); ?></th>
		<th><?php echo __('Weight'); ?></th>
		<th><?php echo __('Height'); ?></th>
		<th><?php echo __('Diagnosis'); ?></th>
		<th><?php echo __('Medical History'); ?></th>
		<th><?php echo __('Date Of Onset Of Reaction'); ?></th>
		<th><?php echo __('Description Of Reaction'); ?></th>
		<th><?php echo __('Reaction Resolve'); ?></th>
		<th><?php echo __('Reaction Reappear'); ?></th>
		<th><?php echo __('Lab Investigation'); ?></th>
		<th><?php echo __('Severity'); ?></th>
		<th><?php echo __('Serious'); ?></th>
		<th><?php echo __('Serious Reason'); ?></th>
		<th><?php echo __('Action Taken'); ?></th>
		<th><?php echo __('Outcome'); ?></th>
		<th><?php echo __('Causality'); ?></th>
		<th><?php echo __('Any Other Comment'); ?></th>
		<th><?php echo __('Reporter Name'); ?></th>
		<th><?php echo __('Reporter Email'); ?></th>
		<th><?php echo __('Reporter Phone'); ?></th>
		<th><?php echo __('Submitted'); ?></th>
		<th><?php echo __('Emails'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Device'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
		<th><?php echo __('Deleted Date'); ?></th>
		<th><?php echo __('Notified'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Reporter Date'); ?></th>
		<th><?php echo __('Person Submitting'); ?></th>
		<th><?php echo __('Reporter Name Diff'); ?></th>
		<th><?php echo __('Reporter Designation Diff'); ?></th>
		<th><?php echo __('Reporter Email Diff'); ?></th>
		<th><?php echo __('Reporter Phone Diff'); ?></th>
		<th><?php echo __('Reporter Date Diff'); ?></th>
		<th><?php echo __('Vigiflow Message'); ?></th>
		<th><?php echo __('Vigiflow Ref'); ?></th>
		<th><?php echo __('Copied'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($subCounty['Sadr'] as $sadr): ?>
		<tr>
			<td><?php echo $sadr['id']; ?></td>
			<td><?php echo $sadr['sadr_id']; ?></td>
			<td><?php echo $sadr['user_id']; ?></td>
			<td><?php echo $sadr['county_id']; ?></td>
			<td><?php echo $sadr['sub_county_id']; ?></td>
			<td><?php echo $sadr['designation_id']; ?></td>
			<td><?php echo $sadr['reference_no']; ?></td>
			<td><?php echo $sadr['vigiflow_id']; ?></td>
			<td><?php echo $sadr['report_title']; ?></td>
			<td><?php echo $sadr['report_type']; ?></td>
			<td><?php echo $sadr['report_sadr']; ?></td>
			<td><?php echo $sadr['report_therapeutic']; ?></td>
			<td><?php echo $sadr['medicinal_product']; ?></td>
			<td><?php echo $sadr['blood_products']; ?></td>
			<td><?php echo $sadr['herbal_product']; ?></td>
			<td><?php echo $sadr['cosmeceuticals']; ?></td>
			<td><?php echo $sadr['product_other']; ?></td>
			<td><?php echo $sadr['product_specify']; ?></td>
			<td><?php echo $sadr['name_of_institution']; ?></td>
			<td><?php echo $sadr['institution_code']; ?></td>
			<td><?php echo $sadr['address']; ?></td>
			<td><?php echo $sadr['contact']; ?></td>
			<td><?php echo $sadr['patient_name']; ?></td>
			<td><?php echo $sadr['ip_no']; ?></td>
			<td><?php echo $sadr['date_of_birth']; ?></td>
			<td><?php echo $sadr['age_group']; ?></td>
			<td><?php echo $sadr['patient_address']; ?></td>
			<td><?php echo $sadr['ward']; ?></td>
			<td><?php echo $sadr['gender']; ?></td>
			<td><?php echo $sadr['known_allergy']; ?></td>
			<td><?php echo $sadr['known_allergy_specify']; ?></td>
			<td><?php echo $sadr['pregnant']; ?></td>
			<td><?php echo $sadr['pregnancy_status']; ?></td>
			<td><?php echo $sadr['weight']; ?></td>
			<td><?php echo $sadr['height']; ?></td>
			<td><?php echo $sadr['diagnosis']; ?></td>
			<td><?php echo $sadr['medical_history']; ?></td>
			<td><?php echo $sadr['date_of_onset_of_reaction']; ?></td>
			<td><?php echo $sadr['description_of_reaction']; ?></td>
			<td><?php echo $sadr['reaction_resolve']; ?></td>
			<td><?php echo $sadr['reaction_reappear']; ?></td>
			<td><?php echo $sadr['lab_investigation']; ?></td>
			<td><?php echo $sadr['severity']; ?></td>
			<td><?php echo $sadr['serious']; ?></td>
			<td><?php echo $sadr['serious_reason']; ?></td>
			<td><?php echo $sadr['action_taken']; ?></td>
			<td><?php echo $sadr['outcome']; ?></td>
			<td><?php echo $sadr['causality']; ?></td>
			<td><?php echo $sadr['any_other_comment']; ?></td>
			<td><?php echo $sadr['reporter_name']; ?></td>
			<td><?php echo $sadr['reporter_email']; ?></td>
			<td><?php echo $sadr['reporter_phone']; ?></td>
			<td><?php echo $sadr['submitted']; ?></td>
			<td><?php echo $sadr['emails']; ?></td>
			<td><?php echo $sadr['active']; ?></td>
			<td><?php echo $sadr['device']; ?></td>
			<td><?php echo $sadr['deleted']; ?></td>
			<td><?php echo $sadr['deleted_date']; ?></td>
			<td><?php echo $sadr['notified']; ?></td>
			<td><?php echo $sadr['created']; ?></td>
			<td><?php echo $sadr['modified']; ?></td>
			<td><?php echo $sadr['reporter_date']; ?></td>
			<td><?php echo $sadr['person_submitting']; ?></td>
			<td><?php echo $sadr['reporter_name_diff']; ?></td>
			<td><?php echo $sadr['reporter_designation_diff']; ?></td>
			<td><?php echo $sadr['reporter_email_diff']; ?></td>
			<td><?php echo $sadr['reporter_phone_diff']; ?></td>
			<td><?php echo $sadr['reporter_date_diff']; ?></td>
			<td><?php echo $sadr['vigiflow_message']; ?></td>
			<td><?php echo $sadr['vigiflow_ref']; ?></td>
			<td><?php echo $sadr['copied']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sadrs', 'action' => 'view', $sadr['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sadrs', 'action' => 'edit', $sadr['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sadrs', 'action' => 'delete', $sadr['id']), array('confirm' => __('Are you sure you want to delete # %s?', $sadr['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Sadr'), array('controller' => 'sadrs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
