<div class="designations view">
<h2><?php echo __('Designation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($designation['Designation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($designation['Designation']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($designation['Designation']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($designation['Designation']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Designation'), array('action' => 'edit', $designation['Designation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Designation'), array('action' => 'delete', $designation['Designation']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $designation['Designation']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Designations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Designation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pqmps'), array('controller' => 'pqmps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pqmp'), array('controller' => 'pqmps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadrs'), array('controller' => 'sadrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr'), array('controller' => 'sadrs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Pqmps'); ?></h3>
	<?php if (!empty($designation['Pqmp'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
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
		<th><?php echo __('Notified'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Medicinal Product'); ?></th>
		<th><?php echo __('Blood Products'); ?></th>
		<th><?php echo __('Herbal Product'); ?></th>
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
		<th><?php echo __('Reporter Name Diff'); ?></th>
		<th><?php echo __('Reporter Designation Diff'); ?></th>
		<th><?php echo __('Reporter Email Diff'); ?></th>
		<th><?php echo __('Reporter Phone Diff'); ?></th>
		<th><?php echo __('Reporter Date Diff'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($designation['Pqmp'] as $pqmp): ?>
		<tr>
			<td><?php echo $pqmp['id']; ?></td>
			<td><?php echo $pqmp['user_id']; ?></td>
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
			<td><?php echo $pqmp['notified']; ?></td>
			<td><?php echo $pqmp['created']; ?></td>
			<td><?php echo $pqmp['modified']; ?></td>
			<td><?php echo $pqmp['medicinal_product']; ?></td>
			<td><?php echo $pqmp['blood_products']; ?></td>
			<td><?php echo $pqmp['herbal_product']; ?></td>
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
	<?php if (!empty($designation['Sadr'])): ?>
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
		<th><?php echo __('Reporter Name Diff'); ?></th>
		<th><?php echo __('Reporter Designation Diff'); ?></th>
		<th><?php echo __('Reporter Email Diff'); ?></th>
		<th><?php echo __('Reporter Phone Diff'); ?></th>
		<th><?php echo __('Reporter Date Diff'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($designation['Sadr'] as $sadr): ?>
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
			<td><?php echo $sadr['reporter_name_diff']; ?></td>
			<td><?php echo $sadr['reporter_designation_diff']; ?></td>
			<td><?php echo $sadr['reporter_email_diff']; ?></td>
			<td><?php echo $sadr['reporter_phone_diff']; ?></td>
			<td><?php echo $sadr['reporter_date_diff']; ?></td>
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
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($designation['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Designation Id'); ?></th>
		<th><?php echo __('County Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Confirm Password'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Name Of Institution'); ?></th>
		<th><?php echo __('Institution Address'); ?></th>
		<th><?php echo __('Institution Code'); ?></th>
		<th><?php echo __('Institution Contact'); ?></th>
		<th><?php echo __('Ward'); ?></th>
		<th><?php echo __('Phone No'); ?></th>
		<th><?php echo __('Forgot Password'); ?></th>
		<th><?php echo __('Initial Email'); ?></th>
		<th><?php echo __('Is Active'); ?></th>
		<th><?php echo __('Is Admin'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
		<th><?php echo __('Deleted Date'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($designation['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['designation_id']; ?></td>
			<td><?php echo $user['county_id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['confirm_password']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['group_id']; ?></td>
			<td><?php echo $user['name_of_institution']; ?></td>
			<td><?php echo $user['institution_address']; ?></td>
			<td><?php echo $user['institution_code']; ?></td>
			<td><?php echo $user['institution_contact']; ?></td>
			<td><?php echo $user['ward']; ?></td>
			<td><?php echo $user['phone_no']; ?></td>
			<td><?php echo $user['forgot_password']; ?></td>
			<td><?php echo $user['initial_email']; ?></td>
			<td><?php echo $user['is_active']; ?></td>
			<td><?php echo $user['is_admin']; ?></td>
			<td><?php echo $user['deleted']; ?></td>
			<td><?php echo $user['deleted_date']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
