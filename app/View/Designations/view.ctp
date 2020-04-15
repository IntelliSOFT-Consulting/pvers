<div class="designations view">
<h2><?php  echo __('Designation');?></h2>
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
		<li><?php echo $this->Form->postLink(__('Delete Designation'), array('action' => 'delete', $designation['Designation']['id']), null, __('Are you sure you want to delete # %s?', $designation['Designation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Designations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Designation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pqmps'), array('controller' => 'pqmps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pqmp'), array('controller' => 'pqmps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadrs'), array('controller' => 'sadrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr'), array('controller' => 'sadrs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Pqmps');?></h3>
	<?php if (!empty($designation['Pqmp'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Designation Id'); ?></th>
		<th><?php echo __('Facility Name'); ?></th>
		<th><?php echo __('District Name'); ?></th>
		<th><?php echo __('Province Name'); ?></th>
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
		<th><?php echo __('Oral Tablets'); ?></th>
		<th><?php echo __('Oral Suspension'); ?></th>
		<th><?php echo __('Injection'); ?></th>
		<th><?php echo __('Diluent'); ?></th>
		<th><?php echo __('Suspension Powder'); ?></th>
		<th><?php echo __('Injection Powder'); ?></th>
		<th><?php echo __('Eye Drops'); ?></th>
		<th><?php echo __('Ear Drops'); ?></th>
		<th><?php echo __('Nebuliser Solution'); ?></th>
		<th><?php echo __('Cream'); ?></th>
		<th><?php echo __('Ointment'); ?></th>
		<th><?php echo __('Liniment'); ?></th>
		<th><?php echo __('Paste'); ?></th>
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
		<th><?php echo __('Require Refrigeration Yes'); ?></th>
		<th><?php echo __('Require Refrigeration No'); ?></th>
		<th><?php echo __('Product At Facility'); ?></th>
		<th><?php echo __('Product At Facility Yes'); ?></th>
		<th><?php echo __('Product At Facility No'); ?></th>
		<th><?php echo __('Returned By Client'); ?></th>
		<th><?php echo __('Returned By Client Yes'); ?></th>
		<th><?php echo __('Returned By Client No'); ?></th>
		<th><?php echo __('Stored To Recommendations'); ?></th>
		<th><?php echo __('Stored To Recommendations Yes'); ?></th>
		<th><?php echo __('Stored To Recommendations No'); ?></th>
		<th><?php echo __('Other Details'); ?></th>
		<th><?php echo __('Comments'); ?></th>
		<th><?php echo __('Reporter Name'); ?></th>
		<th><?php echo __('Contact Number'); ?></th>
		<th><?php echo __('Job Title'); ?></th>
		<th><?php echo __('Signature'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($designation['Pqmp'] as $pqmp): ?>
		<tr>
			<td><?php echo $pqmp['id'];?></td>
			<td><?php echo $pqmp['user_id'];?></td>
			<td><?php echo $pqmp['designation_id'];?></td>
			<td><?php echo $pqmp['facility_name'];?></td>
			<td><?php echo $pqmp['district_name'];?></td>
			<td><?php echo $pqmp['province_name'];?></td>
			<td><?php echo $pqmp['facility_address'];?></td>
			<td><?php echo $pqmp['facility_phone'];?></td>
			<td><?php echo $pqmp['brand_name'];?></td>
			<td><?php echo $pqmp['generic_name'];?></td>
			<td><?php echo $pqmp['batch_number'];?></td>
			<td><?php echo $pqmp['manufacture_date'];?></td>
			<td><?php echo $pqmp['expiry_date'];?></td>
			<td><?php echo $pqmp['receipt_date'];?></td>
			<td><?php echo $pqmp['name_of_manufacturer'];?></td>
			<td><?php echo $pqmp['country_of_origin'];?></td>
			<td><?php echo $pqmp['supplier_name'];?></td>
			<td><?php echo $pqmp['supplier_address'];?></td>
			<td><?php echo $pqmp['product_formulation'];?></td>
			<td><?php echo $pqmp['product_formulation_specify'];?></td>
			<td><?php echo $pqmp['oral_tablets'];?></td>
			<td><?php echo $pqmp['oral_suspension'];?></td>
			<td><?php echo $pqmp['injection'];?></td>
			<td><?php echo $pqmp['diluent'];?></td>
			<td><?php echo $pqmp['suspension_powder'];?></td>
			<td><?php echo $pqmp['injection_powder'];?></td>
			<td><?php echo $pqmp['eye_drops'];?></td>
			<td><?php echo $pqmp['ear_drops'];?></td>
			<td><?php echo $pqmp['nebuliser_solution'];?></td>
			<td><?php echo $pqmp['cream'];?></td>
			<td><?php echo $pqmp['ointment'];?></td>
			<td><?php echo $pqmp['liniment'];?></td>
			<td><?php echo $pqmp['paste'];?></td>
			<td><?php echo $pqmp['colour_change'];?></td>
			<td><?php echo $pqmp['separating'];?></td>
			<td><?php echo $pqmp['powdering'];?></td>
			<td><?php echo $pqmp['caking'];?></td>
			<td><?php echo $pqmp['moulding'];?></td>
			<td><?php echo $pqmp['odour_change'];?></td>
			<td><?php echo $pqmp['mislabeling'];?></td>
			<td><?php echo $pqmp['incomplete_pack'];?></td>
			<td><?php echo $pqmp['complaint_other'];?></td>
			<td><?php echo $pqmp['complaint_other_specify'];?></td>
			<td><?php echo $pqmp['complaint_description'];?></td>
			<td><?php echo $pqmp['require_refrigeration'];?></td>
			<td><?php echo $pqmp['require_refrigeration_yes'];?></td>
			<td><?php echo $pqmp['require_refrigeration_no'];?></td>
			<td><?php echo $pqmp['product_at_facility'];?></td>
			<td><?php echo $pqmp['product_at_facility_yes'];?></td>
			<td><?php echo $pqmp['product_at_facility_no'];?></td>
			<td><?php echo $pqmp['returned_by_client'];?></td>
			<td><?php echo $pqmp['returned_by_client_yes'];?></td>
			<td><?php echo $pqmp['returned_by_client_no'];?></td>
			<td><?php echo $pqmp['stored_to_recommendations'];?></td>
			<td><?php echo $pqmp['stored_to_recommendations_yes'];?></td>
			<td><?php echo $pqmp['stored_to_recommendations_no'];?></td>
			<td><?php echo $pqmp['other_details'];?></td>
			<td><?php echo $pqmp['comments'];?></td>
			<td><?php echo $pqmp['reporter_name'];?></td>
			<td><?php echo $pqmp['contact_number'];?></td>
			<td><?php echo $pqmp['job_title'];?></td>
			<td><?php echo $pqmp['signature'];?></td>
			<td><?php echo $pqmp['created'];?></td>
			<td><?php echo $pqmp['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pqmps', 'action' => 'view', $pqmp['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pqmps', 'action' => 'edit', $pqmp['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pqmps', 'action' => 'delete', $pqmp['id']), null, __('Are you sure you want to delete # %s?', $pqmp['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pqmp'), array('controller' => 'pqmps', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Sadrs');?></h3>
	<?php if (!empty($designation['Sadr'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('County Id'); ?></th>
		<th><?php echo __('Designation Id'); ?></th>
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
		<th><?php echo __('Age Group'); ?></th>
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
		foreach ($designation['Sadr'] as $sadr): ?>
		<tr>
			<td><?php echo $sadr['id'];?></td>
			<td><?php echo $sadr['user_id'];?></td>
			<td><?php echo $sadr['county_id'];?></td>
			<td><?php echo $sadr['designation_id'];?></td>
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
			<td><?php echo $sadr['age_group'];?></td>
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
