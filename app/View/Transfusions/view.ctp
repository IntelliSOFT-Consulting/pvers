<div class="transfusions view">
<h2><?php echo __('Transfusion'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transfusion['User']['name'], array('controller' => 'users', 'action' => 'view', $transfusion['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reference No'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['reference_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('County'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transfusion['County']['county_name'], array('controller' => 'counties', 'action' => 'view', $transfusion['County']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Designation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transfusion['Designation']['name'], array('controller' => 'designations', 'action' => 'view', $transfusion['Designation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Name'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['patient_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Address'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['patient_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Phone'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['patient_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Birth'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['date_of_birth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age Years'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['age_years']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diagnosis'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['diagnosis']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ward'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['ward']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pre Hb'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['pre_hb']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transfusion Reason'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['transfusion_reason']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Current Medications'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['current_medications']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Obstetric History'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['obstetric_history']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Previous Transfusion'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['previous_transfusion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transfusion Comment'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['transfusion_comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Previous Reactions'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['previous_reactions']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reaction Comment'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['reaction_comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reaction General'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['reaction_general']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reaction Dermatological'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['reaction_dermatological']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reaction Cardiac'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['reaction_cardiac']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reaction Renal'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['reaction_renal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reaction Haematological'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['reaction_haematological']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reaction Other'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['reaction_other']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vital Start Bp'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['vital_start_bp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vital Start T'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['vital_start_t']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vital Start P'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['vital_start_p']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vital Start R'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['vital_start_r']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vital During Bp'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['vital_during_bp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vital During T'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['vital_during_t']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vital During P'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['vital_during_p']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vital During R'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['vital_during_r']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vital Stop Bp'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['vital_stop_bp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vital Stop T'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['vital_stop_t']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vital Stop P'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['vital_stop_p']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vital Stop R'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['vital_stop_r']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lab Hemolysis'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['lab_hemolysis']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lab Hemolysis Present'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['lab_hemolysis_present']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recipient Blood'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['recipient_blood']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hae Wbc'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['hae_wbc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hae Hb'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['hae_hb']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hae Rbc'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['hae_rbc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hae Hct'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['hae_hct']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hae Mcv'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['hae_mcv']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hae Mch'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['hae_mch']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hae Mchc'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['hae_mchc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hae Plt'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['hae_plt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Film Rbc'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['film_rbc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Film Wbc'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['film_wbc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Film Plt'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['film_plt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Donor Hemolysis'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['donor_hemolysis']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Donor Age'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['donor_age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Culture Donor Pack'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['culture_donor_pack']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Culture Recipient Blood'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['culture_recipient_blood']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Compatible Saline Rt'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['compatible_saline_rt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Compatible Saline Ii'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['compatible_saline_ii']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Compatible Ahg'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['compatible_ahg']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Compatible Albumin'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['compatible_albumin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Incompatible Saline Rt'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['incompatible_saline_rt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Incompatible Saline Ii'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['incompatible_saline_ii']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Incompatible Ahg'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['incompatible_ahg']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Incompatible Albumin'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['incompatible_albumin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Negative Result'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['negative_result']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Anti A'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['anti_a']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Anti B'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['anti_b']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Urinalysis'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['urinalysis']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Evaluation'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['evaluation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Adverse Reaction'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['adverse_reaction']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reporter Name'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['reporter_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reporter Email'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['reporter_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reporter Phone'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['reporter_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Submitted'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['submitted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($transfusion['Transfusion']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transfusion'), array('action' => 'edit', $transfusion['Transfusion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transfusion'), array('action' => 'delete', $transfusion['Transfusion']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $transfusion['Transfusion']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Transfusions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transfusion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Counties'), array('controller' => 'counties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New County'), array('controller' => 'counties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Designations'), array('controller' => 'designations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Designation'), array('controller' => 'designations', 'action' => 'add')); ?> </li>
	</ul>
</div>
