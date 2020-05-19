<div class="medications view">
<h2><?php echo __('Medication'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($medication['User']['name'], array('controller' => 'users', 'action' => 'view', $medication['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reference No'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['reference_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('County'); ?></dt>
		<dd>
			<?php echo $this->Html->link($medication['County']['county_name'], array('controller' => 'counties', 'action' => 'view', $medication['County']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Designation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($medication['Designation']['name'], array('controller' => 'designations', 'action' => 'view', $medication['Designation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Event'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['date_of_event']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time Of Event'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['time_of_event']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name Of Institution'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['name_of_institution']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Institution Code'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['institution_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Institution Contact'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['institution_contact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Name'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['patient_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Phone'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['patient_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Birth'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['date_of_birth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age Years'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['age_years']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ward'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['ward']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Clinic'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['clinic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pharmacy'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['pharmacy']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accident'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['accident']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location Other'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['location_other']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description Of Error'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['description_of_error']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Process Occur'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['process_occur']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reach Patient'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['reach_patient']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Correct Medication'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['correct_medication']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direct Result'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['direct_result']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Outcome'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['outcome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Outcome Error'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['outcome_error']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Outcome Death'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['outcome_death']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Staff Factors'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['staff_factors']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medication Related'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['medication_related']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Work Environment'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['work_environment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task Technology'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['task_technology']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task Other'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['task_other']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recommendations'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['recommendations']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reporter Name'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['reporter_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reporter Email'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['reporter_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reporter Phone'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['reporter_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Submitted'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['submitted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($medication['Medication']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Medication'), array('action' => 'edit', $medication['Medication']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Medication'), array('action' => 'delete', $medication['Medication']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $medication['Medication']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Medications'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medication'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Counties'), array('controller' => 'counties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New County'), array('controller' => 'counties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Designations'), array('controller' => 'designations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Designation'), array('controller' => 'designations', 'action' => 'add')); ?> </li>
	</ul>
</div>
