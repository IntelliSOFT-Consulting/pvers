<div class="sadrs index">
	<h2><?php echo __('Sadrs');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('initial_report');?></th>
			<th><?php echo $this->Paginator->sort('follow_up_report');?></th>
			<th><?php echo $this->Paginator->sort('name_of_institution');?></th>
			<th><?php echo $this->Paginator->sort('institution_code');?></th>
			<th><?php echo $this->Paginator->sort('address');?></th>
			<th><?php echo $this->Paginator->sort('contact');?></th>
			<th><?php echo $this->Paginator->sort('patient_name');?></th>
			<th><?php echo $this->Paginator->sort('ip_no');?></th>
			<th><?php echo $this->Paginator->sort('date_of_birth');?></th>
			<th><?php echo $this->Paginator->sort('patient_address');?></th>
			<th><?php echo $this->Paginator->sort('ward');?></th>
			<th><?php echo $this->Paginator->sort('gender_male');?></th>
			<th><?php echo $this->Paginator->sort('gender_female');?></th>
			<th><?php echo $this->Paginator->sort('known_allergy');?></th>
			<th><?php echo $this->Paginator->sort('pregnancy_status');?></th>
			<th><?php echo $this->Paginator->sort('first_trimester');?></th>
			<th><?php echo $this->Paginator->sort('second_trimester');?></th>
			<th><?php echo $this->Paginator->sort('third_trimester');?></th>
			<th><?php echo $this->Paginator->sort('weight');?></th>
			<th><?php echo $this->Paginator->sort('height');?></th>
			<th><?php echo $this->Paginator->sort('diagnosis');?></th>
			<th><?php echo $this->Paginator->sort('description_of_reaction');?></th>
			<th><?php echo $this->Paginator->sort('severity_mild');?></th>
			<th><?php echo $this->Paginator->sort('severity_moderate');?></th>
			<th><?php echo $this->Paginator->sort('severity_severe');?></th>
			<th><?php echo $this->Paginator->sort('severity_fatal');?></th>
			<th><?php echo $this->Paginator->sort('severity_unknown');?></th>
			<th><?php echo $this->Paginator->sort('drug_withdrawn');?></th>
			<th><?php echo $this->Paginator->sort('dose_increased');?></th>
			<th><?php echo $this->Paginator->sort('dose_reduced');?></th>
			<th><?php echo $this->Paginator->sort('dose_not_changed');?></th>
			<th><?php echo $this->Paginator->sort('action_unknown');?></th>
			<th><?php echo $this->Paginator->sort('recovering');?></th>
			<th><?php echo $this->Paginator->sort('recovered');?></th>
			<th><?php echo $this->Paginator->sort('requires_hospitalization');?></th>
			<th><?php echo $this->Paginator->sort('congenital_anomaly');?></th>
			<th><?php echo $this->Paginator->sort('prevent_permanent_damage');?></th>
			<th><?php echo $this->Paginator->sort('outcome_unknown');?></th>
			<th><?php echo $this->Paginator->sort('certain');?></th>
			<th><?php echo $this->Paginator->sort('probable');?></th>
			<th><?php echo $this->Paginator->sort('possible');?></th>
			<th><?php echo $this->Paginator->sort('unlikely');?></th>
			<th><?php echo $this->Paginator->sort('conditional');?></th>
			<th><?php echo $this->Paginator->sort('unassessable');?></th>
			<th><?php echo $this->Paginator->sort('any_other_comment');?></th>
			<th><?php echo $this->Paginator->sort('reporter_name');?></th>
			<th><?php echo $this->Paginator->sort('report_date');?></th>
			<th><?php echo $this->Paginator->sort('reporter_email');?></th>
			<th><?php echo $this->Paginator->sort('reporter_phone');?></th>
			<th><?php echo $this->Paginator->sort('reporter_designation');?></th>
			<th><?php echo $this->Paginator->sort('reporter_signature');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($sadrs as $sadr): ?>
	<tr>
		<td><?php echo h($sadr['Sadr']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($sadr['User']['id'], array('controller' => 'users', 'action' => 'view', $sadr['User']['id'])); ?>
		</td>
		<td><?php echo h($sadr['Sadr']['initial_report']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['follow_up_report']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['name_of_institution']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['institution_code']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['address']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['contact']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['patient_name']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['ip_no']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['date_of_birth']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['patient_address']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['ward']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['gender_male']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['gender_female']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['known_allergy']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['pregnancy_status']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['first_trimester']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['second_trimester']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['third_trimester']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['weight']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['height']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['diagnosis']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['description_of_reaction']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['severity_mild']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['severity_moderate']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['severity_severe']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['severity_fatal']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['severity_unknown']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['drug_withdrawn']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['dose_increased']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['dose_reduced']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['dose_not_changed']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['action_unknown']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['recovering']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['recovered']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['requires_hospitalization']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['congenital_anomaly']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['prevent_permanent_damage']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['outcome_unknown']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['certain']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['probable']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['possible']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['unlikely']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['conditional']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['unassessable']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['any_other_comment']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['reporter_name']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['report_date']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['reporter_email']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['reporter_phone']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['reporter_designation']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['reporter_signature']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['created']); ?>&nbsp;</td>
		<td><?php echo h($sadr['Sadr']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sadr['Sadr']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sadr['Sadr']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sadr['Sadr']['id']), null, __('Are you sure you want to delete # %s?', $sadr['Sadr']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Sadr'), array('action' => 'add')); ?></li>
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
