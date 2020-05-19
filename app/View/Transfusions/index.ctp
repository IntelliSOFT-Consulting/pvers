<div class="transfusions index">
	<h2><?php echo __('Transfusions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('reference_no'); ?></th>
			<th><?php echo $this->Paginator->sort('county_id'); ?></th>
			<th><?php echo $this->Paginator->sort('designation_id'); ?></th>
			<th><?php echo $this->Paginator->sort('patient_name'); ?></th>
			<th><?php echo $this->Paginator->sort('gender'); ?></th>
			<th><?php echo $this->Paginator->sort('patient_address'); ?></th>
			<th><?php echo $this->Paginator->sort('patient_phone'); ?></th>
			<th><?php echo $this->Paginator->sort('date_of_birth'); ?></th>
			<th><?php echo $this->Paginator->sort('age_years'); ?></th>
			<th><?php echo $this->Paginator->sort('diagnosis'); ?></th>
			<th><?php echo $this->Paginator->sort('ward'); ?></th>
			<th><?php echo $this->Paginator->sort('pre_hb'); ?></th>
			<th><?php echo $this->Paginator->sort('transfusion_reason'); ?></th>
			<th><?php echo $this->Paginator->sort('current_medications'); ?></th>
			<th><?php echo $this->Paginator->sort('obstetric_history'); ?></th>
			<th><?php echo $this->Paginator->sort('previous_transfusion'); ?></th>
			<th><?php echo $this->Paginator->sort('transfusion_comment'); ?></th>
			<th><?php echo $this->Paginator->sort('previous_reactions'); ?></th>
			<th><?php echo $this->Paginator->sort('reaction_comment'); ?></th>
			<th><?php echo $this->Paginator->sort('reaction_general'); ?></th>
			<th><?php echo $this->Paginator->sort('reaction_dermatological'); ?></th>
			<th><?php echo $this->Paginator->sort('reaction_cardiac'); ?></th>
			<th><?php echo $this->Paginator->sort('reaction_renal'); ?></th>
			<th><?php echo $this->Paginator->sort('reaction_haematological'); ?></th>
			<th><?php echo $this->Paginator->sort('reaction_other'); ?></th>
			<th><?php echo $this->Paginator->sort('vital_start_bp'); ?></th>
			<th><?php echo $this->Paginator->sort('vital_start_t'); ?></th>
			<th><?php echo $this->Paginator->sort('vital_start_p'); ?></th>
			<th><?php echo $this->Paginator->sort('vital_start_r'); ?></th>
			<th><?php echo $this->Paginator->sort('vital_during_bp'); ?></th>
			<th><?php echo $this->Paginator->sort('vital_during_t'); ?></th>
			<th><?php echo $this->Paginator->sort('vital_during_p'); ?></th>
			<th><?php echo $this->Paginator->sort('vital_during_r'); ?></th>
			<th><?php echo $this->Paginator->sort('vital_stop_bp'); ?></th>
			<th><?php echo $this->Paginator->sort('vital_stop_t'); ?></th>
			<th><?php echo $this->Paginator->sort('vital_stop_p'); ?></th>
			<th><?php echo $this->Paginator->sort('vital_stop_r'); ?></th>
			<th><?php echo $this->Paginator->sort('lab_hemolysis'); ?></th>
			<th><?php echo $this->Paginator->sort('lab_hemolysis_present'); ?></th>
			<th><?php echo $this->Paginator->sort('recipient_blood'); ?></th>
			<th><?php echo $this->Paginator->sort('hae_wbc'); ?></th>
			<th><?php echo $this->Paginator->sort('hae_hb'); ?></th>
			<th><?php echo $this->Paginator->sort('hae_rbc'); ?></th>
			<th><?php echo $this->Paginator->sort('hae_hct'); ?></th>
			<th><?php echo $this->Paginator->sort('hae_mcv'); ?></th>
			<th><?php echo $this->Paginator->sort('hae_mch'); ?></th>
			<th><?php echo $this->Paginator->sort('hae_mchc'); ?></th>
			<th><?php echo $this->Paginator->sort('hae_plt'); ?></th>
			<th><?php echo $this->Paginator->sort('film_rbc'); ?></th>
			<th><?php echo $this->Paginator->sort('film_wbc'); ?></th>
			<th><?php echo $this->Paginator->sort('film_plt'); ?></th>
			<th><?php echo $this->Paginator->sort('donor_hemolysis'); ?></th>
			<th><?php echo $this->Paginator->sort('donor_age'); ?></th>
			<th><?php echo $this->Paginator->sort('culture_donor_pack'); ?></th>
			<th><?php echo $this->Paginator->sort('culture_recipient_blood'); ?></th>
			<th><?php echo $this->Paginator->sort('compatible_saline_rt'); ?></th>
			<th><?php echo $this->Paginator->sort('compatible_saline_ii'); ?></th>
			<th><?php echo $this->Paginator->sort('compatible_ahg'); ?></th>
			<th><?php echo $this->Paginator->sort('compatible_albumin'); ?></th>
			<th><?php echo $this->Paginator->sort('incompatible_saline_rt'); ?></th>
			<th><?php echo $this->Paginator->sort('incompatible_saline_ii'); ?></th>
			<th><?php echo $this->Paginator->sort('incompatible_ahg'); ?></th>
			<th><?php echo $this->Paginator->sort('incompatible_albumin'); ?></th>
			<th><?php echo $this->Paginator->sort('negative_result'); ?></th>
			<th><?php echo $this->Paginator->sort('anti_a'); ?></th>
			<th><?php echo $this->Paginator->sort('anti_b'); ?></th>
			<th><?php echo $this->Paginator->sort('urinalysis'); ?></th>
			<th><?php echo $this->Paginator->sort('evaluation'); ?></th>
			<th><?php echo $this->Paginator->sort('adverse_reaction'); ?></th>
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
	<?php foreach ($transfusions as $transfusion): ?>
	<tr>
		<td><?php echo h($transfusion['Transfusion']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transfusion['User']['name'], array('controller' => 'users', 'action' => 'view', $transfusion['User']['id'])); ?>
		</td>
		<td><?php echo h($transfusion['Transfusion']['reference_no']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transfusion['County']['county_name'], array('controller' => 'counties', 'action' => 'view', $transfusion['County']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transfusion['Designation']['name'], array('controller' => 'designations', 'action' => 'view', $transfusion['Designation']['id'])); ?>
		</td>
		<td><?php echo h($transfusion['Transfusion']['patient_name']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['gender']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['patient_address']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['patient_phone']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['date_of_birth']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['age_years']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['diagnosis']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['ward']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['pre_hb']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['transfusion_reason']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['current_medications']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['obstetric_history']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['previous_transfusion']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['transfusion_comment']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['previous_reactions']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['reaction_comment']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['reaction_general']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['reaction_dermatological']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['reaction_cardiac']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['reaction_renal']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['reaction_haematological']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['reaction_other']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['vital_start_bp']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['vital_start_t']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['vital_start_p']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['vital_start_r']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['vital_during_bp']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['vital_during_t']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['vital_during_p']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['vital_during_r']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['vital_stop_bp']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['vital_stop_t']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['vital_stop_p']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['vital_stop_r']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['lab_hemolysis']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['lab_hemolysis_present']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['recipient_blood']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['hae_wbc']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['hae_hb']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['hae_rbc']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['hae_hct']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['hae_mcv']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['hae_mch']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['hae_mchc']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['hae_plt']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['film_rbc']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['film_wbc']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['film_plt']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['donor_hemolysis']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['donor_age']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['culture_donor_pack']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['culture_recipient_blood']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['compatible_saline_rt']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['compatible_saline_ii']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['compatible_ahg']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['compatible_albumin']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['incompatible_saline_rt']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['incompatible_saline_ii']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['incompatible_ahg']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['incompatible_albumin']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['negative_result']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['anti_a']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['anti_b']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['urinalysis']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['evaluation']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['adverse_reaction']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['reporter_name']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['reporter_email']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['reporter_phone']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['submitted']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['active']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['created']); ?>&nbsp;</td>
		<td><?php echo h($transfusion['Transfusion']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transfusion['Transfusion']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transfusion['Transfusion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transfusion['Transfusion']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transfusion['Transfusion']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Transfusion'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Counties'), array('controller' => 'counties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New County'), array('controller' => 'counties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Designations'), array('controller' => 'designations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Designation'), array('controller' => 'designations', 'action' => 'add')); ?> </li>
	</ul>
</div>
