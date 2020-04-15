<div class="sadrsFollowups index">
	<h2><?php echo __('Sadrs Followups');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('county_id');?></th>
			<th><?php echo $this->Paginator->sort('sadr_id');?></th>
			<th><?php echo $this->Paginator->sort('designation_id');?></th>
			<th><?php echo $this->Paginator->sort('report_title');?></th>
			<th><?php echo $this->Paginator->sort('report_type');?></th>
			<th><?php echo $this->Paginator->sort('initial_report');?></th>
			<th><?php echo $this->Paginator->sort('follow_up_report');?></th>
			<th><?php echo $this->Paginator->sort('name_of_institution');?></th>
			<th><?php echo $this->Paginator->sort('institution_code');?></th>
			<th><?php echo $this->Paginator->sort('address');?></th>
			<th><?php echo $this->Paginator->sort('contact');?></th>
			<th><?php echo $this->Paginator->sort('patient_name');?></th>
			<th><?php echo $this->Paginator->sort('ip_no');?></th>
			<th><?php echo $this->Paginator->sort('date_of_birth');?></th>
			<th><?php echo $this->Paginator->sort('age_group');?></th>
			<th><?php echo $this->Paginator->sort('patient_address');?></th>
			<th><?php echo $this->Paginator->sort('ward');?></th>
			<th><?php echo $this->Paginator->sort('gender');?></th>
			<th><?php echo $this->Paginator->sort('gender_male');?></th>
			<th><?php echo $this->Paginator->sort('gender_female');?></th>
			<th><?php echo $this->Paginator->sort('known_allergy');?></th>
			<th><?php echo $this->Paginator->sort('known_allergy_specify');?></th>
			<th><?php echo $this->Paginator->sort('pregnancy_status');?></th>
			<th><?php echo $this->Paginator->sort('not_pregnant');?></th>
			<th><?php echo $this->Paginator->sort('first_trimester');?></th>
			<th><?php echo $this->Paginator->sort('second_trimester');?></th>
			<th><?php echo $this->Paginator->sort('third_trimester');?></th>
			<th><?php echo $this->Paginator->sort('weight');?></th>
			<th><?php echo $this->Paginator->sort('height');?></th>
			<th><?php echo $this->Paginator->sort('diagnosis');?></th>
			<th><?php echo $this->Paginator->sort('date_of_onset_of_reaction');?></th>
			<th><?php echo $this->Paginator->sort('description_of_reaction');?></th>
			<th><?php echo $this->Paginator->sort('severity');?></th>
			<th><?php echo $this->Paginator->sort('severity_mild');?></th>
			<th><?php echo $this->Paginator->sort('severity_moderate');?></th>
			<th><?php echo $this->Paginator->sort('severity_severe');?></th>
			<th><?php echo $this->Paginator->sort('severity_fatal');?></th>
			<th><?php echo $this->Paginator->sort('severity_unknown');?></th>
			<th><?php echo $this->Paginator->sort('action_taken');?></th>
			<th><?php echo $this->Paginator->sort('drug_withdrawn');?></th>
			<th><?php echo $this->Paginator->sort('dose_increased');?></th>
			<th><?php echo $this->Paginator->sort('dose_reduced');?></th>
			<th><?php echo $this->Paginator->sort('dose_not_changed');?></th>
			<th><?php echo $this->Paginator->sort('action_unknown');?></th>
			<th><?php echo $this->Paginator->sort('outcome');?></th>
			<th><?php echo $this->Paginator->sort('recovering');?></th>
			<th><?php echo $this->Paginator->sort('recovered');?></th>
			<th><?php echo $this->Paginator->sort('requires_hospitalization');?></th>
			<th><?php echo $this->Paginator->sort('congenital_anomaly');?></th>
			<th><?php echo $this->Paginator->sort('prevent_permanent_damage');?></th>
			<th><?php echo $this->Paginator->sort('outcome_unknown');?></th>
			<th><?php echo $this->Paginator->sort('causality');?></th>
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
			<th><?php echo $this->Paginator->sort('submitted');?></th>
			<th><?php echo $this->Paginator->sort('emails');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($sadrsFollowups as $sadrsFollowup): ?>
	<tr>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($sadrsFollowup['User']['name'], array('controller' => 'users', 'action' => 'view', $sadrsFollowup['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($sadrsFollowup['County']['county_name'], array('controller' => 'counties', 'action' => 'view', $sadrsFollowup['County']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($sadrsFollowup['Sadr']['id'], array('controller' => 'sadrs', 'action' => 'view', $sadrsFollowup['Sadr']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($sadrsFollowup['Designation']['name'], array('controller' => 'designations', 'action' => 'view', $sadrsFollowup['Designation']['id'])); ?>
		</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['report_title']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['report_type']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['initial_report']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['follow_up_report']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['name_of_institution']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['institution_code']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['address']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['contact']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['patient_name']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['ip_no']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['date_of_birth']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['age_group']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['patient_address']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['ward']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['gender']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['gender_male']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['gender_female']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['known_allergy']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['known_allergy_specify']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['pregnancy_status']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['not_pregnant']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['first_trimester']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['second_trimester']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['third_trimester']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['weight']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['height']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['diagnosis']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['date_of_onset_of_reaction']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['description_of_reaction']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['severity']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['severity_mild']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['severity_moderate']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['severity_severe']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['severity_fatal']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['severity_unknown']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['action_taken']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['drug_withdrawn']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['dose_increased']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['dose_reduced']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['dose_not_changed']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['action_unknown']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['outcome']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['recovering']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['recovered']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['requires_hospitalization']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['congenital_anomaly']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['prevent_permanent_damage']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['outcome_unknown']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['causality']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['certain']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['probable']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['possible']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['unlikely']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['conditional']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['unassessable']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['any_other_comment']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['reporter_name']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['report_date']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['reporter_email']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['reporter_phone']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['reporter_designation']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['reporter_signature']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['submitted']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['emails']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['created']); ?>&nbsp;</td>
		<td><?php echo h($sadrsFollowup['SadrsFollowup']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $sadrsFollowup['SadrsFollowup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $sadrsFollowup['SadrsFollowup']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $sadrsFollowup['SadrsFollowup']['id']), null, __('Are you sure you want to delete # %s?', $sadrsFollowup['SadrsFollowup']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Sadrs Followup'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Counties'), array('controller' => 'counties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New County'), array('controller' => 'counties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sadrs'), array('controller' => 'sadrs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sadr'), array('controller' => 'sadrs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Designations'), array('controller' => 'designations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Designation'), array('controller' => 'designations', 'action' => 'add')); ?> </li>
	</ul>
</div>
