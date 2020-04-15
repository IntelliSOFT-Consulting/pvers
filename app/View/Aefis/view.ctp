<div class="aefis view">
<h2><?php  echo __('Aefi');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($aefi['Aefi']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aefi['User']['name'], array('controller' => 'users', 'action' => 'view', $aefi['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('County'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aefi['County']['county_name'], array('controller' => 'counties', 'action' => 'view', $aefi['County']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sub County'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aefi['SubCounty']['sub_county_name'], array('controller' => 'sub_counties', 'action' => 'view', $aefi['SubCounty']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Designation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aefi['Designation']['name'], array('controller' => 'designations', 'action' => 'view', $aefi['Designation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Report Type'); ?></dt>
		<dd>
			<?php echo h($aefi['Aefi']['report_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name Of Institution'); ?></dt>
		<dd>
			<?php echo h($aefi['Aefi']['name_of_institution']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Institution Code'); ?></dt>
		<dd>
			<?php echo h($aefi['Aefi']['institution_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Patient Name'); ?></dt>
		<dd>
			<?php echo h($aefi['Aefi']['patient_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip No'); ?></dt>
		<dd>
			<?php echo h($aefi['Aefi']['ip_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Birth'); ?></dt>
		<dd>
			<?php echo h($aefi['Aefi']['date_of_birth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ward'); ?></dt>
		<dd>
			<?php echo h($aefi['Aefi']['ward']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($aefi['Aefi']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Onset Of Reaction'); ?></dt>
		<dd>
			<?php echo h($aefi['Aefi']['date_of_onset_of_reaction']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description Of Reaction'); ?></dt>
		<dd>
			<?php echo h($aefi['Aefi']['description_of_reaction']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Action Taken'); ?></dt>
		<dd>
			<?php echo h($aefi['Aefi']['action_taken']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Outcome'); ?></dt>
		<dd>
			<?php echo h($aefi['Aefi']['outcome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reporter Name'); ?></dt>
		<dd>
			<?php echo h($aefi['Aefi']['reporter_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reporter Email'); ?></dt>
		<dd>
			<?php echo h($aefi['Aefi']['reporter_email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reporter Phone'); ?></dt>
		<dd>
			<?php echo h($aefi['Aefi']['reporter_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Submitted'); ?></dt>
		<dd>
			<?php echo h($aefi['Aefi']['submitted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($aefi['Aefi']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($aefi['Aefi']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Aefi'), array('action' => 'edit', $aefi['Aefi']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Aefi'), array('action' => 'delete', $aefi['Aefi']['id']), null, __('Are you sure you want to delete # %s?', $aefi['Aefi']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Aefis'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aefi'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Counties'), array('controller' => 'counties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New County'), array('controller' => 'counties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sub Counties'), array('controller' => 'sub_counties', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sub County'), array('controller' => 'sub_counties', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Designations'), array('controller' => 'designations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Designation'), array('controller' => 'designations', 'action' => 'add')); ?> </li>
	</ul>
</div>
